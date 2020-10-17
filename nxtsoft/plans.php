<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Other Files -->
<?php 
    include('plans-ajax.php');
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
                        <h2>Plans</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Plans</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                        <button class="btn btn-success btn-icon float-right" type="button" data-toggle="modal" data-target="#popAddNewPlan"><i class="zmdi zmdi-plus"></i></button>
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Displaying the  contents -->
                        <?php
                            $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
                            $q = "SELECT sno,id,name,description,amount,product_limit,created_date,updated_date,CASE status WHEN 1 THEN 'Active' WHEN 0 THEN 'Inactive' END AS status FROM tb_plans";
                            
                            $r = mysqli_query($con, $q);
                           

                            $num = mysqli_num_rows($r);
                            if(!mysqli_num_rows($r) > 0)
                            { ?>
                            
                            <div class="card">
                                <div class="body">
                                    <br>
                                    <p>No Plan(s) Found</p>
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
                                                    <th>Name</th>
                                                    <th>Description</th>
                                                    <th>Amount</th>
                                                    <th>Product Limit</th>
                                                    <th>Created Date</th>
                                                    <th>Status</th>   
                                                    <th>Options</th>
                                                </tr>
                                            </thead>';
                                    while ($row = mysqli_fetch_array($r)) {
                                       
                                            $sno = $row['sno'];
                                            $id = $row['id'];
                                            $plan_name = $row['name'];
                                            $plan_description = $row['description'];
                                            $amount = $row['amount'];
                                            $product_limit = $row['product_limit'];
                                            // Convert data format to DD-MM-YYYY
                                            $plan_created_date = strtotime($row['created_date']);
                                            $plan_created_date = date("d-m-Y", $plan_created_date);
                                            
                                            $plan_updated_date = strtotime($row['updated_date']);
                                            $plan_updated_date = date("d-m-Y", $plan_updated_date);

                                            $plan_status= $row['status'];
                                            $pname=explode(" ",$plan_name);
                                        
                            echo'       <tbody>
                                            <tr style="text-align:center;">
                                                <td><strong>'.$plan_name.'</strong></td>
                                                <td><strong>'.$plan_description.'</strong></td>
                                                <td><strong>'.$amount.'</strong></td>
                                                <td><strong>'.$product_limit.'</strong></td>    
                                                <td><strong>'.$plan_created_date.'</strong></td>
                                                <td><strong>'.$plan_status.'</strong></td>';
                                            
                                                                                 
                                        
                                        
                            echo'           <td class="aligncenter">
                                                <div class="btn-group dropleft">
                                                    <a id="btndropdown'.$sno.'" class="mousehand" data-toggle="dropdown" href="javascript:void()" data-activates="dropdown'.$sno.'" aria-expanded="false"><i class="zmdi zmdi-hc-fw"></i></a>
                                                    <div id="dropdown'.$sno.'"class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick="javascript:openPlanViewpop('.$id.','."'".$plan_name."'".','."'".$amount."'".','."'".$plan_status."'".','."'".$plan_created_date."'".','."'".$plan_updated_date."'".');" title="View">
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>View
                                                        </a>';
                                            
                            echo'                   <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick="javascript:openPlanEditpop('.$id.','."'".$plan_name."'".','."'".$plan_description."'".','."'".$product_limit."'".','."'".$amount."'".');" title="Edit">
                                                        <i class="zmdi zmdi-hc-fw margin-right10"></i>Edit
                                                        </a>
                                                    <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick="javascript:openAssignFeaturePop('.$id.','."'".$plan_name."'".');" title="Assign Plan">
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Assign Features
                                                        </a>';
                                            
                            echo'                   <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick=javascript:showConfirmMessage1("plan",'."'".$pname[0]."'".','.$id.','."'".$plan_status."'".');>
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
 
<!-- Add New Popup -->
    <div id="popAddNewPlan"  class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Add New Customer</h4>
                </div>
                <form name="FrmeaddPlanPop" id="FrmeaddPlanPop" method="POST">
                <div class="modal-body"> 
                    <div class="row clearfix">
                            <div class="form-group">
                                <input id="p_id" name="p_id" type="hidden"  class="form-control">
                            </div>
                        <div class="col-sm-12">
                        <strong>Plan Name*</strong>
                            <div class="form-group">
                                <input id="p_name" name="p_name" type="text" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Plan Description*</strong>
                            <div class="form-group">
                                <input id="p_description" name="p_description" type="text" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Amount*</strong> 
                            <div class="form-group">
                                <input id="p_amount" name="p_amount" type="text" class="form-control"  required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Product_limit*</strong> 
                            <div class="form-group">
                            <select id="p_product_limit" name="p_product_limit" class="form-control" required>
                                <option value="-1" selected>--- SELECT A PRODUCT LIMIT ---</option>
                                <?php
                                    for ($i=1; $i<=100; $i++)
                                    {
                                    ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>      
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect" onClick="getPlanid();javascript:formIsValid('plans','FrmeaddPlanPop',event);">SAVE CHANGES</button>
                    <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
            </div>
        </div>
    </div>
 
<!-- Edit Popup -->
    <div id="editPlansPop" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Edit Plan</h4>
                </div>
                <form name="FrmeEditPlansPop" id="FrmeEditPlansPop" method="POST">
                <div class="modal-body"> 
                <div class="row clearfix">
                            <div class="form-group">
                                <input id="p_edit_id" name="p_edit_id" type="hidden"  class="form-control">
                            </div>
                        <div class="col-sm-12">
                        <strong>Plan Name*</strong>
                            <div class="form-group">
                                <input id="p_edit_name" name="p_edit_name" type="text" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Plan Description*</strong>
                            <div class="form-group">
                                <input id="p_edit_description" name="p_edit_description" type="text" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Amount*</strong> 
                            <div class="form-group">
                                <input id="p_edit_amount" name="p_edit_amount" type="text" class="form-control"  required/>
                            </div>
                        </div> 
                        <div class="col-sm-12">
                        <strong>Product_limit*</strong> 
                            <div class="form-group">
                            <select id="p_edit_product_limit" name="p_edit_product_limit" class="form-control" required>
                                <option value="-1" selected>--- SELECT A PRODUCT LIMIT ---</option>
                                <?php
                                    for ($i=1; $i<=100; $i++)
                                    {
                                    ?>
                                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                    <?php
                                    }
                                    ?>
                            </select>
                            </div>
                        </div>     
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('plans_edit','FrmeEditPlansPop',event); ">UPDATE CHANGES</button>
                    <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
            </div>
        </div>
    </div>

<!-- View Popup -->
    <div id="ViewCustomersPop" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Plan Details</h4>
                </div>
                <form name="FrmeViewPlanPop" id="FrmeViewPlanPop" method="POST">
                <div class="modal-body"> 
                    <div class="row clearfix">
                        <div class="col-sm-12">
                        <strong>Plan ID</strong>
                            <div class="form-group">
                                <input id="plan_view_id" name="plan_view_id" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Plan Name</strong>
                            <div class="form-group">
                                <input id="plan_view_name" name="plan_view_name" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Amount</strong> 
                            <div class="form-group">
                        <!--   <textarea  id="cust_view_address" name ="cust_view_address" cols="54" disabled></textarea>-->
                            <input id="plan_view_amount" name="plan_view_amount" type="text" class="form-control" disabled>
                            </div>
                        </div>                        
                        <div class="col-sm-12">
                        <strong>Current Status </strong> 
                            <div class="form-group">
                                <input id="plan_view_status" name="plan_view_status" type="text" class="form-control" disabled>
                            </div>
                        </div>      
                        <div class="col-sm-12">
                        <strong>Created Date </strong> 
                            <div class="form-group">
                                <input id="plan_view_created_date" name="plan_view_created_date" type="text" class="form-control" disabled>
                            </div>
                        </div>   
                        <div class="col-sm-12">
                        <strong>Last Updated </strong> 
                            <div class="form-group">
                                <input id="plan_view_updated_date" name="plan_view_updated_date" type="text" class="form-control" disabled>
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

<!-- Assign Features Popup -->
    <div id="popAssignFeatures"  class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Assign Plan</h4>
                </div>
                <form name="FrmAssignFeaturesPop" id="FrmAssignFeaturesPop" method="POST">
                    <div class="modal-body">
                    <div class="row clearfix">
                                <div class="input-group">
                                    <input type="hidden" name="plan_id" id="plan_id" class="form-control">
                                </div>
                            <div class="col-sm-12">
                                <strong>Plan Name </strong>
                                    <div class="input-group">
                                        <input type="text" name="plan_name" id="plan_name" class="form-control">
                                    </div>
                                </div>
                            </div> 
                        <div class="row clearfix">
                            <div class="col-sm-12">
                                <strong>Feature* </strong>
                                <div class="form-group">
                                    <select name="features_id" id="features_id" class="form-control" required>
                                        <option value="-1">-- Please select --</option>
                                        <?php
                                        $select="features";
                                        if(isset($select)&&$select!=""){
                                            $select=$_POST['features']; 
                                            }
                                        $q = "SELECT id,name FROM tb_plans_features WHERE status=1";

                                        $r = mysqli_query($con, $q);
                                        while($row_list=mysqli_fetch_assoc($r)){
                                        ?>
                                        <option value="<?php echo $row_list['id']; ?>"><?php if($row_list['id']==$select){ echo "selected"; } ?><?php echo $row_list['name']; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('plan_assign_feature','FrmAssignFeaturesPop',event);">SAVE CHANGES</button>
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