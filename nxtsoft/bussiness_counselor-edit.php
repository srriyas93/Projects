<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
    require_once '../_includes/dbconfig.php';
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
    $bc_id=$_GET['bc_id'];
?>
 
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Business Counselor</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Business Counselor</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
                <?php 
                $q="SELECT name,email_id,phone_no,raz_account_id,aadhar_num,bank_acc_num,bank_name,ifsc_code FROM tb_bussiness_counsellors WHERE id='$bc_id'";
                $r=mysqli_query($con,$q);
                if($row=mysqli_fetch_array($r)){
                    $name=$row['name'];
                    $email_id=$row['email_id'];
                    $phone_no=$row['phone_no'];
                    $raz_account_id=$row['raz_account_id'];
                    $aadhar_num=$row['aadhar_num'];
                    $bank_acc_num=$row['bank_acc_num'];
                    $bank_name=$row['bank_name'];
                    $ifsc_code=$row['ifsc_code'];
                }
                ?>
            <form id="addBc" name="addBc" action="bussiness_counselor-edit-action.php" enctype="multipart/form-data" method="POST">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Business Counselor</strong> Details</h2>
                                </div>
                                <div class="body row">
                                        <div class="form-group">
                                            <input id="b_edit_id" name="b_edit_id" type="hidden" class="form-control" value="<?php echo $bc_id ?>" required/>
                                        </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Name*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_name" name="b_edit_name" type="text" class="form-control" value="<?php echo $name ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Email*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_email" name="b_edit_email" type="text" class="form-control" value="<?php echo $email_id ?>" disabled>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Phone Number*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_phone" name="b_edit_phone" type="text" class="form-control" value="<?php echo $phone_no ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Bank</strong> Details</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6">
                                        <strong>Aadhar Number*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_aadhar" name="b_edit_aadhar" type="text" class="form-control" value="<?php echo $aadhar_num ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Bank Account Number*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_acc_num" name="b_edit_acc_num" type="text" class="form-control" value="<?php echo $bank_acc_num ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Bank Name</strong>
                                        <div class="form-group">
                                            <input id="b_edit_bankname" name="b_edit_bankname" type="text" class="form-control" value="<?php echo $bank_name ?>"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>IFSC Code*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_ifsc" name="b_edit_ifsc" type="text" class="form-control" value="<?php echo $ifsc_code ?>" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Razer</strong> Pay Account</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6">
                                        <strong>Razer ID*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_raz_id" name="b_edit_raz_id" type="text" class="form-control" value="<?php echo $raz_account_id ?>" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-danger waves-effect">Edit Business Counselor</button>
                <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
            <form id="editBcPass" name="editBcPass"  method="POST">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Old</strong> Password</h2>
                                </div>
                                <div class="body row">
                                        <div class="form-group">
                                            <input id="b_edit_id" name="b_edit_id" type="hidden" class="form-control" value="<?php echo $bc_id ?>" >
                                        </div>
                                    <div class="col-sm-6">
                                        <strong>Old Password*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_old_pass" name="b_edit_old_pass" type="password" class="form-control" onblur="CheckOldPass(b_edit_id,b_edit_old_pass)"  placeholder="Enter Existing Password">
                                        </div>
                                        <div style='font-size: 13px;font-weight: bold;color:red' id="oldpasswordmessage"></div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>New Password*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_new_pass" name="b_edit_new_pass" type="password" class="form-control" placeholder="Enter New Password" >
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Confirm Password*</strong>
                                        <div class="form-group">
                                            <input id="b_edit_confirm_pass" name="b_edit_confirm_pass" type="password" class="form-control" placeholder="Confirm New Password" >
                                        </div>
                                        <div style='font-size: 13px;font-weight: bold;color:red' id="conpasswordmessage"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-danger waves-effect" onclick="javascript:formIsValid('bc_chgpass','editBcPass',event);">Change Password</button>
                <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</section>

<!-- Include Footer -->

<?php
    include('page_footer.php');
?>