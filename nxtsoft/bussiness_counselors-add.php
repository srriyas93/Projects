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
?>
 
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add New Business Counselor</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Add New Business Counselor</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <form id="addBc" name="addBc" action="bussiness_counselor-add-action.php" enctype="multipart/form-data" method="POST">
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Business Counselor</strong> Details</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Name*</strong>
                                        <div class="form-group">
                                            <input id="bname" name="bname" type="text" class="form-control" placeholder="Enter name"required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Email*</strong>
                                        <div class="form-group">
                                            <input id="bemail" name="bemail" type="text" class="form-control" placeholder="Enter email" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Phone Number*</strong>
                                        <div class="form-group">
                                            <input id="bphone" name="bphone" type="text" class="form-control" placeholder="Enter Phone Number" required/>
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
                                            <input id="baadhar" name="baadhar" type="text" class="form-control" placeholder="Enter Aadhar Number" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Bank Account Number*</strong>
                                        <div class="form-group">
                                            <input id="bacc_num" name="bacc_num" type="text" class="form-control" placeholder="Enter Account Number" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Bank Name</strong>
                                        <div class="form-group">
                                            <input id="bbankname" name="bbankname" type="text" class="form-control" placeholder="Enter bank name"/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>IFSC Code*</strong>
                                        <div class="form-group">
                                            <input id="bifsc" name="bifsc" type="text" class="form-control" placeholder="Enter IFSC Code" required/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-danger waves-effect">Add Business Counselor</button>
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