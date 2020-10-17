<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Other Files -->
<?php 
    include('customers-ajax.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php'); 
?>

<!-- Main Content -->
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Customers</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Customers</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                       <a class="btn btn-success btn-icon float-right" href="customers-add.php"><i class="zmdi zmdi-plus"></i></a>
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
                       
                        <!-- Displaying the  contents -->
                        <?php
                            $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
                            $q = "SELECT sno,id,name,email_id,phone_no,created_date,updated_date,CASE status WHEN 1 THEN 'Active' WHEN 0 THEN 'Inactive' END AS status FROM tb_customers GROUP BY created_date DESC";
                            
                            $r = mysqli_query($con, $q);
                           

                            $num = mysqli_num_rows($r);
                            if(!mysqli_num_rows($r) > 0)
                            { ?>
                            
                            <div class="card">
                                <div class="body">
                                    <br>
                                    <p>No Customer(s) Found</p>
                                    <br>
                                </div>
                            </div>
                            <?php }
                            
                            else
                            {
			                echo'
                                <div class="card project_list">
                                    <div class="table-responsive">
                                    <h6><strong><i class="zmdi zmdi-chart"></i> Total Record(s):</strong> '.$num.'</h6>
                                        <table class="table table-hover c_table theme-color">
                                            <thead>
                                                <tr style="text-align:center;">
                                                    <th>Cust ID</th>
                                                    <th>Name</th>
                                                    <th style="display:none;">Email</th>
                                                    <th>Contact</th>
                                                    <th>Join Date</th>
                                                    <th>Status</th>   
                                                    <th>Options</th>
                                                </tr>
                                            </thead>';
                                    while ($row = mysqli_fetch_array($r)) {
                                       
                                            $cust_sno = $row['sno'];
                                            $cust_id = $row['id'];
                                            $cust_name = $row['name'];
                                            $cust_email = $row['email_id'];
                                            $cust_mobile = $row['phone_no'];
                                            // Convert data format to DD-MM-YYYY
                                            $cust_created_date = strtotime($row['created_date']);
                                            $cust_created_date = date("d-m-Y", $cust_created_date);

                                            $cust_updated_date = strtotime($row['updated_date']);
                                            $cust_updated_date = date("d-m-Y", $cust_updated_date);
                                            
                                            $cust_status= $row['status'];

                                            $custname=explode(" ",$cust_name);
                                        
                            echo'       <tbody>
                                            <tr style="text-align:center;">
                                                <td><strong>'.$cust_id.'</strong></td>
                                                <td><strong>'.$cust_name.'</strong></td>
                                                <td style="display:none;"><strong>'.$cust_email.'</strong></td>
                                                <td><strong>'.$cust_mobile.'</strong></td>      
                                            <!--  <td><strong><a onclick="javascript:openPlansPop();" href="javascript:void(0);"></a></strong></td>-->
                                                <td><strong>'.$cust_created_date.'</strong></td>
                                                <td><strong>'.$cust_status.'</strong></td>';
                                            
                                                                                 
                                        
                                        
                            echo'           <td class="aligncenter">
                                                <div class="btn-group dropleft">
                                                    <a id="btndropdown'.$cust_sno.'" class="mousehand" data-toggle="dropdown" href="javascript:void()" data-activates="dropdown'.$cust_sno.'" aria-expanded="false"><i class="zmdi zmdi-hc-fw"></i></a>
                                                    <div id="dropdown'.$cust_sno.'"class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick="javascript:openCustomerViewpop('."'".$cust_id."'".','."'".$cust_name."'".','."'".$cust_email."'".','."'".$cust_mobile."'".','."'".$cust_status."'".','."'".$cust_created_date."'".','."'".$cust_updated_date."'".');" title="View">
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>View
                                                        </a>
                                           
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="customers-edit.php?id='.$cust_id.'" title="Edit">
                                                        <i class="zmdi zmdi-hc-fw margin-right10"></i>Edit Profile
                                                        </a>

                                    
                                            
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick=javascript:showConfirmMessage1("customer",'."'".$custname[0]."'".','."'".$cust_sno."'".','."'".$cust_status."'".');>
                                                        <i class="zmdi zmdi-hc-fw margin-right10"></i>Status
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>';
                            echo'       </tr>
                                    </tbody>';
                                        }
                                    
                            echo' </table>
                            </div>
                        </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- View Popup -->
    <div id="ViewCustomersPop" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Customer Details</h4>
                </div>
                <form name="FrmeEditCustomersPop" id="FrmeEditCustomersPop" method="POST">
                <div class="modal-body"> 
                    <div class="row clearfix">
                        <div class="col-sm-12">
                        <strong>Customer ID</strong>
                            <div class="form-group">
                                <input id="cust_view_id" name="cust_view_id" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Customer Name*</strong>(Capital)
                            <div class="form-group">
                                <input id="cust_view_name" name="cust_view_name" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Email </strong> 
                            <div class="form-group">
                                <input id="cust_view_email" name="cust_view_email" type="email" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Contact Number </strong> 
                            <div class="form-group">
                                <input id="cust_view_mobile" name="cust_view_mobile" type="text" class="form-control" disabled>
                            </div>
                        </div>                         
                        <div class="col-sm-12">
                        <strong>Current Status </strong> 
                            <div class="form-group">
                                <input id="cust_view_status" name="cust_view_status" type="text" class="form-control" disabled>
                            </div>
                        </div>     
                        <div class="col-sm-12">
                        <strong>Joining Date </strong> 
                            <div class="form-group">
                                <input id="cust_view_created_date" name="cust_view_created_date" type="text" class="form-control" disabled>
                            </div>
                        </div>   
                        <div class="col-sm-12">
                        <strong>Last Updated </strong> 
                            <div class="form-group">
                                <input id="cust_view_updated_date" name="cust_view_updated_date" type="text" class="form-control" disabled>
                            </div>
                        </div>   
                    </div>
                </div>
            <div class="modal-footer">
                <!--<button type="submit" class="btn btn-danger waves-effect" onClick="this.disabled=true; this.value='Processing…'; EditCustomers(event);">UPDATE CHANGES</button>-->
                    <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
            </div>
        </div>
    </div>

<!-- Assign Plan Popup -->
    <div id="popAssignPlan"  class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Assign Plan</h4>
                </div>
                <form name="FrmAssignPlanPop" id="FrmAssignPlanPop" method="POST">
                    <div class="modal-body">
                    <div class="row clearfix">
                            <div class="col-sm-12">
                                <strong>Customer ID* </strong>
                                <div class="input-group">
                                    <input type="text" name="cust_plan_id" id="cust_plan_id" class="form-control datepicker" disabled>
                                </div>
                            </div>
                        </div> 
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <strong>Plans* </strong>
                                <div class="form-group">
                                    <select name="cust_plans" id="cust_plans" class="form-control show-tick" required>
                                        <option value="-1">-- Please select --</option>
                                        <?php
                                        $select="plan";
                                        if(isset($select)&&$select!=""){
                                            $select=$_POST['cust_plans']; 
                                            }
                                        $q = "SELECT * FROM plans WHERE status=1";

                                        $r = mysqli_query($con, $q);
                                        while($row_list=mysqli_fetch_assoc($r)){
                                        ?>
                                        <option value="<?php echo $row_list['id']; ?>"><?php if($row_list['id']==$select){ echo "selected"; } ?><?php echo $row_list['title']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <strong>No.Plans* </strong>
                                <div class="form-group">
                                    <select name="cust_no_plans" id="cust_no_plans" class="form-control show-tick" required>
                                        <option value="-1">-- Please select --</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <strong>Join Date* </strong>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                    </div>
                                    <input type="text" name="cust_joining" id="cust_joining" class="form-control datepicker" placeholder="Please choose date ..." required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('customers_assign_plan','FrmAssignPlanPop',event);">SAVE CHANGES</button>
                        <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
 
<!-- View CustomerPlan Popup -->
    <div id="ViewCustomerPlans" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Customer Plan Details</h4>
                </div>
                

            <form name="ViewCustomerPlans" id="ViewCustomerPlans" method="POST">
                <div id="displayCustomerPlan" class="modal-body"> 
                </div>
            </form>    
            </div>
        </div>
    </div>

<!-- Change Password Popup -->
    <div id="CustomerChangePasswordPop" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Change Password</h4>
                </div>
                <form name="CustomerChangePassword" id="CustomerChangePassword" method="POST">
                <div id="displayCustomerPlan" class="modal-body"> 
                   
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <strong>Customer Name</strong>
                            <div class="form-group">
                                <input id="cust_pass_name" name="cust_pass_name" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <strong>Customer ID</strong>
                            <div class="form-group">
                                <input id="cust_pass_id" name="cust_pass_id" type="text" class="form-control" disabled>
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <div id="oldpassword">
                            </div>
                        </div>  
                        <div class="col-sm-12">
                        <strong>New Password*</strong> 
                            <div class="form-group">
                                <input id="cust_pass_new" name="cust_pass_new" type="password" class="form-control" required/>
                            </div>
                        </div>      
                        <div class="col-sm-12">
                        <strong>Confirm Password*</strong> 
                            <div class="form-group">
                                <input id="cust_pass_new_confirm" name="cust_pass_new_confirm" type="password" class="form-control" required/>
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <div id="passwordmessage">
                            </div>
                        </div>
                    </div>      
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('customers_chg_pass','CustomerChangePassword',event);">PROCEED</button>
                    <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>



<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>

<script>
   
    if(window.location.href.indexOf("status") > -1) {
    var status=window.location.href.split('=')[1];
    
    if (status == 1)
    {
         showNotification('Customer added succesfully !!!','bg-green');
    }
    if (status == 0)
    {
         showNotification('Error !!!','bg-red');
    }

    }

    if(window.location.href.indexOf("editdet") > -1) {
    var editdet=window.location.href.split('=')[1];
    
    if (editdet == 1)
    {
        showNotification('Customers Updated succesfully !!!','bg-green');
    }
    if (editdet == 0)
    {
        showNotification('Error !!!','bg-red');
    }
    
    }
    if(window.location.href.indexOf("editpass") > -1) {
    var editpass=window.location.href.split('=')[1];
    
    if (editpass == 1)
    {
        showNotification('Password Changed succesfully !!!','bg-green');
    }
    if (editpass == 0)
    {
        showNotification('Error !!!','bg-red');
    }
    
    }
</script>