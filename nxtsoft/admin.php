<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Other Files --> 
<?php 
    include_once('admin-ajax.php');
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
                        <h2>Admins</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Admin</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                        <button class="btn btn-success btn-icon float-right" type="button" data-toggle="modal" data-target="#popaddnewadmin"><i class="zmdi zmdi-plus"></i></button>
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
                        
                        <!--Displaying the  contents-->
                        <?php
		                $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
		                $q = "SELECT user_id,tb_name,tb_email,tb_mob,CASE tb_status WHEN 1 THEN 'Active' WHEN 0 THEN 'Inactive' END AS tb_status,tb_created_date,tb_updated_date FROM tb_admin";
      
                        $r = mysqli_query($con, $q);
        
                        $num = mysqli_num_rows($r);
		                if(!mysqli_num_rows($r) > 0)
		                    {
                        ?>
			            <div class="container center">
			                <h5 class="card conta">No Admin added </h5>
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
                                        <tr>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Mobile</th>
                                            <th>Created Date</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>';
                                while($row = mysqli_fetch_array($r))
                                    {
                                    $user_id=$row['user_id'];
                                    $tb_name=$row['tb_name'];
                                    $tb_email = $row['tb_email'];
                                    $tb_mobile = $row['tb_mob'];
                                    $tb_status = $row['tb_status'];
                                   
                                    $tb_created_date = strtotime($row['tb_created_date']);
                                    $tb_created_date = date("d-m-Y", $tb_created_date);

                                    $tb_updated_date = strtotime($row['tb_updated_date']);
                                    $tb_updated_date = date("d-m-Y", $tb_updated_date);

                                    $name=explode(" ",$tb_name);
                                    
                        echo' 
                                    <tbody>
                                    <tr>
                                       
                                        <td><strong>'.$tb_name.'</strong></td>
                                        <td><strong>'.$tb_email.'</strong></td>
                                        <td><strong>'.$tb_mobile.'</strong></td>
                                        <td><strong>'.$tb_created_date.'</strong></td>
                                        <td><strong>'.$tb_status.'</strong></td>';

                                      
                        echo' 
                                        <td class="aligncenter">
                                            <div class="btn-group dropleft">
                                                <a id="btndropdown'.$user_id.'" class="mousehand" data-toggle="dropdown" href="javascript:void()" data-activates="dropdown'.$user_id.'" aria-expanded="false"><i class="zmdi zmdi-hc-fw"></i></a>
                                                <div id="dropdown'.$user_id.'"class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick="openAdminViewpop('."'".$tb_name."'".','."'".$tb_email."'".','."'".$tb_mobile."'".','."'".$tb_created_date."'".','."'".$tb_updated_date."'".','."'".$tb_status."'".')" title="View">
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>View
                                                        </a>
                                                <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="javascript:void(0);" onClick="openAdminEditpop('.$user_id.','."'".$tb_name."'".','."'".$tb_email."'".','."'".$tb_mobile."'".','."'".$tb_created_date."'".','."'".$tb_updated_date."'".','."'".$tb_status."'".')" title="Edit">
                                                    <i class="zmdi zmdi-hc-fw margin-right10"></i>Edit
                                                    </a>
                                                <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="javascript:void(0);" onClick="openAdminChangePasswordpop('.$user_id.','."'".$tb_name."'".')" title="Change Password">
                                                    <i class="zmdi zmdi-hc-fw margin-right10"></i>Change Password
                                                    </a>
                                             
                                                <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href=javascript:void(0);" onClick=javascript:showConfirmMessage1("admin",'."'".$name[0]."'".','.$user_id.','."'".$tb_status."'".'); title="Status">
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

<!-- Add New Admin/Manager -->
    <div class="modal fade" id="popaddnewadmin" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addAdminPopTitle">Add New Admin/Manager</h4>
                </div>
                <form id="FrmeaddAdminPop"name="FrmeaddAdminPop" action="admin.php" method="POST">
                <div class="modal-body"> 
                    <div class="row clearfix">
                        <div class="col-sm-12">
                        <strong>Name*</strong>
                            <div class="form-group">
                            <input id="admin_name" name="admin_name" type="text" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Email* </strong> 
                            <div class="form-group">
                                <input id="admin_email" name="admin_email" type="email" class="form-control" onblur="CheckEmail(admin_email)" required/>
                            </div>                           
                        </div>
                        <div class="col-sm-12">
                            <div style='font-size: 15px;font-weight: bold;color:red' id="emailmessageadmin"></div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Password* </strong> 
                            <div class="form-group">
                                <input id="admin_password" name="admin_password" type="password" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Mobile* </strong> 
                            <div class="form-group">
                                <input id="admin_mobile" name="admin_mobile" type="text" class="form-control" onblur="CheckContact(admin_mobile)"  required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div style='font-size: 15px;font-weight: bold;color:red' id="mobilemessageadmin"></div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                        <div style='font-size: 15px;font-weight: bold;color:red' id="adminregmessage"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('admin','FrmeaddAdminPop',event);">SAVE CHANGES</button>
                        <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!-- Edit Popup -->
    <div class="modal fade" id="editAdminPop" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="largeModalLabel">Edit Admin</h4>
                </div>
                <form name="FrmeEditAdminPop" id="FrmeEditAdminPop" method="POST">
                <div id="addAdmin" class="modal-body"> 
                    <div class="row clearfix">                     
                        <div class="form-group">
                            <input id="admin_edit_id" name="admin_edit_id" type="hidden" class="form-control" required/>
                        </div>
                        <div class="col-sm-12">
                        <strong>Name</strong>
                            <div class="form-group">
                                <input id="admin_edit_name" name="admin_edit_name" type="text" class="form-control" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <strong>Email</strong> 
                            <div class="form-group">
                                <input id="admin_edit_email" name="admin_edit_email" type="email" class="form-control" disabled>
                            </div>
                        </div>
                         <!--   <div class="col-sm-12">
                                <strong>Password* </strong> (INR)
                                <div class="form-group">
                                    <input id="admin_edit_password" name="admin_password" type="text" class="form-control" required/>
                                </div>
                            </div>-->
                        <div class="col-sm-12">
                        <strong>Mobile</strong> 
                            <div class="form-group">
                                <input id="admin_edit_mobile" name="admin_edit_mobile" type="text" class="form-control" onblur="CheckContactEdit(admin_edit_mobile)" required/>
                            </div>
                        </div>
                        <div class="col-sm-12">
                        <div style='font-size: 15px;font-weight: bold;color:red' id="mobilemessageadminedit"></div>
                    </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('admin_edit','FrmeEditAdminPop',event);">UPDATE CHANGES</button>
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

<!-- Change Password Popup -->
    <div id="AdminChangePasswordPop" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Change Password</h4>
                </div>
                <form name="AdminChangePassword" id="AdminChangePassword" method="POST">
                <div id="displayCustomerPlan" class="modal-body"> 
                   
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <strong>Name</strong>
                            <div class="form-group">
                                <input id="admin_pass_name" name="admin_pass_name" type="text" class="form-control" disabled>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <strong>ID</strong>
                            <div class="form-group">
                                <input id="admin_pass_id" name="admin_pass_id" type="text" class="form-control" disabled>
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <div id="oldpasswordadmin">
                            </div>
                        </div>  
                        <div class="col-sm-12">
                        <strong>New Password </strong> 
                            <div class="form-group">
                                <input id="admin_pass_new" name="admin_pass_new" type="password" class="form-control" required/>
                            </div>
                        </div>      
                        <div class="col-sm-12">
                        <strong>Confirm Password </strong> 
                            <div class="form-group">
                                <input id="admin_pass_new_confirm" name="admin_pass_new_confirm" type="password" class="form-control" required/>
                            </div>
                        </div> 
                        <div class="col-sm-12">
                            <div id="passwordmessageadmin">
                            </div>
                        </div>
                    </div>      
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:formIsValid('admin_chgpass','AdminChangePassword',event);">PROCEED</button>
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