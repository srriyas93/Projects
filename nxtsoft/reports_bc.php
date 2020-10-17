<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- DB Configuration --> 
<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<!-- Include Other Files -->
<?php 
    include('reports_bc-ajax.php');
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
                    <h2>Reports</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Reports</li>
                        <li class="breadcrumb-item active">Bussiness Counsellors</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
<!-- Advanced Search Fields -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div id="BcSearch" class="report_card">
                    <div class="header">
                        <h2><strong>Bussiness Counsellors</strong> Report</h2>
                    </div>
                    <div class="body">
                        <div class="row clearfix">
                            <div class="col-lg-4 col-md-4">
                                <strong>Bussiness Counsellors </strong> 
                                <div class="form-group">
                                    <input id="bc_report_name" name="bc_report_name" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <strong>Status </strong> 
                                <div class="form-group">
                                    <select id="bc_report_status" name="bc_report_status" class="form-control">
                                        <option value="-1" selected>--- SELECT STATUS ---</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <strong>Start Date </strong> 
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                    </div>
                                    <input type="text" name="bc_report_start_date" id="bc_report_start_date" class="form-control datepicker" placeholder="Please choose date ...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <strong>End Date </strong> 
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="zmdi zmdi-calendar"></i></span>
                                    </div>
                                    <input type="text" name="bc_report_end_date" id="bc_report_end_date" class="form-control datepicker" placeholder="Please choose date ...">
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4" style="margin-top:20px;">
                            <button class="btn btn-primary btn-round"  onClick="BcReport(event);"> Generate Report </button>
                            </div>
                        </div>
                        <div class="row clearfix m-t-30"></div>
                    </div>
                </div>
            </div>
        </div>

    <!-- Search Results -->
        <div class="container-fluid">
            <div id="displayBcReport"></div>
       
        </div>
    </div>
</section>
 
<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>