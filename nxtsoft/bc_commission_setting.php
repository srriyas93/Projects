<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Other Files --> 
<?php 
    include_once('bc_commission_setting-ajax.php');
?>
<!-- Include Left Side Bar -->
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
?>

   
<!--Main Content -->
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Commissions</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Commissions</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                        <button class="btn btn-success btn-icon float-right" type="button" data-toggle="modal" data-target="#popaddnewcommission"><i class="zmdi zmdi-plus"></i></button>
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
                        
                        <!--Displaying the  contents-->
                        <?php
		                $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
		                $q = "SELECT bcm.sno AS sno,p.name AS plan_name,cat.name AS category,bcm.amount AS amount,bcm.created_date AS created_date
                                FROM tb_plans p,tb_categories cat,tb_bc_comm_setting bcm 
                                WHERE p.id=bcm.plan_id AND cat.id=bcm.category";
      
                        $r = mysqli_query($con, $q);
        
                        $num = mysqli_num_rows($r);
		                if(!mysqli_num_rows($r) > 0)
		                    {
                        ?>
			            <div class="container center">
			                <h5 class="card conta">No Commision added </h5>
			            </div>
		                <?php
		                    }
                        else{
			            echo'
                            <div class="card project_list">
                                <div class="table-responsive">
                                <h6><strong><i class="zmdi zmdi-chart"></i> Total Record(s):</strong> '.$num.'</h6>
                                    <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr class="aligncenter">
                                            <th>Name</th>
                                            <th>Category</th>
                                            <th>Amount</th>
                                            <th>Created Date</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>';
                                while($row = mysqli_fetch_array($r))
                                    {
                                    $sno=$row['sno'];
                                    $plan_name=$row['plan_name'];
                                    $category = $row['category'];
                                    $amount = $row['amount'];
                                   
                                    $bcm_created_date = strtotime($row['created_date']);
                                    $bcm_created_date = date("d-m-Y", $bcm_created_date);
                                    
                        echo' 
                                    <tbody>
                                    <tr class="aligncenter">
                                       
                                        <td><strong>'.$plan_name.'</strong></td>
                                        <td><strong>'.$category.'</strong></td>
                                        <td><strong>'.$amount.'</strong></td>
                                        <td><strong>'.$bcm_created_date.'</strong></td>
                            

                                        <td class="aligncenter">
                                            <div class="btn-group dropleft">
                                                <a id="btndropdown'.$sno.'" class="mousehand" data-toggle="dropdown" href="javascript:void()" data-activates="dropdown'.$sno.'" aria-expanded="false"><i class="zmdi zmdi-hc-fw"></i></a>
                                                <div id="dropdown'.$sno.'"class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick="openAdminEditpop('.$sno.','."'".$plan_name."'".','."'".$category."'".','."'".$amount."'".')" title="Edit">
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Edit
                                                        </a>
                                             
                                                <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href=javascript:void(0);" onClick=javascript:showConfirmMessage1(); title="Status">
                                                    <i class="zmdi zmdi-hc-fw margin-right10"></i>Status
                                                    </a>
                                                </div>
                                               
                                            </div>
                                        </td>
                         
                                        </tr>
                                    </tbody>';
                                    }
                        echo'            
                                    </table>
                                </div>
                            </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Add New Commission -->
    <div class="modal fade" id="popaddnewcommission" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addAdminPopTitle">Add New Commission</h4>
                </div>
                <form id="FrmeaddCommissionPop"name="FrmeaddCommissionPop" action="admin.php" method="POST">
                <div class="modal-body"> 
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <strong>Plan* </strong>
                            <div class="form-group">
                                <select name="comm_plan" id="comm_plan" class="form-control show-tick" required>
                                <option value="-1">-- Please select --</option>
                                <?php
                                $select="plan";
                                if(isset($select)&&$select!=""){
                                    $select=$_POST['comm_plan']; 
                                }
                                $q = "SELECT id,name FROM tb_plans WHERE status=1";

                                $r = mysqli_query($con, $q);
                                while($row_list=mysqli_fetch_assoc($r)){
                                ?>
                                <option value="<?php echo $row_list['id']; ?>"><?php if($row_list['id']==$select){ echo "selected"; } ?><?php echo $row_list['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>                  
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <strong>Category* </strong>
                            <div class="form-group">
                                <select name="comm_category" id="comm_category" class="form-control show-tick" required>
                                <option value="-1">-- Please select --</option>
                                <?php
                                $select="category";
                                if(isset($select)&&$select!=""){
                                    $select=$_POST['comm_category']; 
                                }
                                $q = "SELECT id,name FROM tb_categories";

                                $r = mysqli_query($con, $q);
                                while($row_list=mysqli_fetch_assoc($r)){
                                ?>
                                <option value="<?php echo $row_list['id']; ?>"><?php if($row_list['id']==$select){ echo "selected"; } ?><?php echo $row_list['name']; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>                  
                    </div>
                
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <strong>Amount* </strong>
                            <div class="form-group">
                                <div class="form-group">
                                    <input id="comm_amount" name="comm_amount" type="text" class="form-control" required/>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('commission','FrmeaddCommissionPop',event);">SAVE CHANGES</button>
                        <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Edit Popup -->
<div class="modal fade" id="popeditcommission" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addAdminPopTitle">Edit Commission</h4>
                </div>
                <form id="FrmeeditCommissionPop"name="FrmeeditCommissionPop" action="admin.php" method="POST">
                <div class="modal-body"> 
                    <div class="row clearfix">
                        <div class="col-sm-12">
                        <div class="form-group">
                                    <input id="comm_edit_sno" name="comm_edit_sno" type="hidden" class="form-control">
                                </div>
                            <strong>Plan* </strong>
                            <div class="form-group">
                                <div class="form-group">
                                    <input id="comm_edit_plan" name="comm_edit_plan" type="text" class="form-control" disabled>
                                </div>
                            </div>
                        </div>                  
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <strong>Category* </strong>
                            <div class="form-group">
                                <div class="form-group">
                                    <input id="comm_edit_category" name="comm_edit_category" type="text" class="form-control" disabled>
                                </div>
                            </div>
                        </div>                  
                    </div>
                
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <strong>Amount* </strong>
                            <div class="form-group">
                                <div class="form-group">
                                    <input id="comm_edit_amount" name="comm_edit_amount" type="text" class="form-control" required/>
                                </div>
                            </div>
                        </div>                  
                    </div>
                </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('commission_edit','FrmeeditCommissionPop',event);">SAVE CHANGES</button>
                        <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- View Popup -->
    <div class="modal fade" id="ViewAdminPop" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Admin Details</h4>
                </div>
                <form name="FrmeEditAdminPop" id="FrmeEditAdminPop" method="POST">
                <div id="addAdmin" class="modal-body"> 
                    <div class="row clearfix">                     
                        <div class="col-sm-12">
                            <strong>Admin Name</strong>
                            <div class="form-group">
                                <input id="admin_view_name" name="admin_view_name" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Email </strong>
                            <div class="form-group">
                                <input id="admin_view_email" name="admin_view_email" type="email" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Contact Number </strong>
                            <div class="form-group">
                                <input id="admin_view_mobile" name="admin_view_mobile" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Joining Date </strong>
                            <div class="form-group">
                                <input id="admin_view_created_date" name="admin_view_created_date" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Last Updated On </strong>
                            <div class="form-group">
                                <input id="admin_view_updated_date" name="admin_view_updated_date" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Current Status </strong>
                            <div class="form-group">
                                <input id="admin_view_status" name="admin_view_status" type="text" class="form-control" disabled>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
              <!--      <button type="submit" class="btn btn-danger waves-effect" onClick="this.disabled=true; this.value='Processing…'; EditAdmin(event);">UPDATE CHANGES</button>-->
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