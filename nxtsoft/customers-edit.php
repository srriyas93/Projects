<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('customers-ajax.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
    require_once '../_includes/dbconfig.php';
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<!-- IncludeGlobal Configuration --> 
<?php
    include('../_includes/nxtconfig.php');
?>
 
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Customer</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Customer</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <?php
            $cust_id=$_GET['id'];
            $q="SELECT name,email_id FROM tb_customers WHERE id='$cust_id'";
            $r=mysqli_query($con,$q);
            if ($row=mysqli_fetch_array($r)) {
                $name=$row['name'];
                $email_id=$row['email_id'];
            }
        ?>
        <div class="container-fluid">
            <form id="editCustomer" name="editCustomer" action="customers-edit-action.php" enctype="multipart/form-data" method="POST">
                <div class="row clearfix">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>Customer</strong> Details</h2>
                                    </div>
                                    <div class="body row">
                                        <div class="form-group">
                                                <input id="cust_edit_id" name="cust_edit_id" type="hidden" class="form-control" value="<?php echo $cust_id ?>" required/>
                                            </div>
                                        <div class="col-sm-6">
                                            <strong>Customer ID</strong>
                                            <div class="form-group">
                                                <input id="cust_id" name="cust_id" type="text" class="form-control" value="<?php echo $cust_id ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <strong>Name</strong>
                                            <div class="form-group">
                                                <input id="cust_edit_name" name="cust_edit_name" type="text" class="form-control" value="<?php echo $name ?>" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <strong>Email</strong>
                                            <div class="form-group">
                                            <input id="b_edit_email" name="b_edit_email" type="text" class="form-control" value="<?php echo $email_id ?>" disabled>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <div class="modal-footer">
                        <button type="submit" name="edit_detail" class="btn btn-danger waves-effect" >UPDATE DETAIL</button>
                    <!--    <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>-->                    
                    </div>
                </div>
            </div>
            </form>        
        </div>

        <div class="container-fluid">
            <form id="editCustomerPass" name="editCustomerPass" method="POST">
                <div class="row clearfix">
                    <div class="container-fluid">
                        <div class="row clearfix">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="header">
                                        <h2><strong>CHANGE</strong> PASSWORD</h2>
                                    </div>
                                    <div class="body row">
                                            <div class="form-group">
                                                <input id="cust_edit_id" name="cust_edit_id" type="hidden" class="form-control" value="<?php echo $cust_id ?>" required/>
                                            </div>
                                        <div class="col-sm-6">
                                            <strong>Old Password</strong>
                                            <div class="form-group">
                                            <input id="cust_edit_old_pass" name="cust_edit_old_pass" type="password" class="form-control" onblur="CheckOldPass(cust_edit_id,cust_edit_old_pass)" required/>
                                            </div>                                           
                                            <div style='font-size: 13px;font-weight: bold;color:red' id="oldpasswordmessage"></div>
                                        </div>
                                        
                                        <div class="col-sm-6">
                                            <strong>New Password</strong>
                                            <div class="form-group">
                                            <input id="cust_edit_new_pass" name="cust_edit_new_pass" type="password" class="form-control" required/>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <strong>Confirm Password</strong>
                                            <div class="form-group">
                                            <input id="cust_edit_confirm_pass" name="cust_edit_confirm_pass" type="password" class="form-control" required/>
                                            </div>
                                            <div style='font-size: 13px;font-weight: bold;color:red' id="conpasswordmessage"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="modal-footer">
                        <button type="submit" name="edit_pass" class="btn btn-danger waves-effect" onclick="javascript:formIsValid('customer-edit','editCustomerPass',event);">UPDATE PASSWORD</button>
                   <!--     <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>-->                
                    </div>
                </div>
            </div>
            </form>        
        </div>
    </div>
</section>

<!-- Include Footer -->

<?php
    include('page_footer.php');
?>

