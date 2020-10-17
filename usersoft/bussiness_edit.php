<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<?php
    include('../_includes/nxtconfig.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
    require_once '../_includes/dbconfig.php';
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
    $cust_bus_id=$_GET['cust_bus_id'];
?>
 
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Business Profile</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Business Profile</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <?php                  
                        $q = "SELECT cb.cust_bus_id AS cust_bus_id,cb.name AS bname,cb.cover_image AS coverimage,cb.logo AS blogo,
                                cb.building_name AS building_name,cb.street_name AS street_name,cb.city AS city,cb.po_number AS po_number
                                ,cb.state AS state,cb.country AS country,cb.buss_phone AS phone,cb.buss_email AS email,
                                cb.google_map AS google_map,cb.website_url AS website_url
                                ,cb.holiday AS holiday,cb.working_time AS working_time,cb.created_date AS created_date,cb.updated_date 
                                AS updated_date 
                                FROM tb_customers_business cb,tb_customers c 
                                WHERE cb.customer_id = c.id AND cb.cust_bus_id='$cust_bus_id'";

                        //echo $q;
                        $r3 = mysqli_query($con, $q);
                        $num1=mysqli_num_rows($r3);
        ?>

        <div class="container-fluid">
            <form id="addCustomer" name="addCustomer" action="bussiness_profile-action.php" enctype="multipart/form-data" method="POST">            
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Business</strong> Profile</h2>
                                </div>
                                <div class="body row">
                                    <?php
                                     if ($row = mysqli_fetch_array($r3)) {
                                         $bname=$row['bname'];
                                         $coverimage=$row['coverimage'];
                                         $blogo=$row['blogo'];
                                         $building_name=$row['building_name'];
                                         $street_name=$row['street_name'];
                                         $city=$row['city'];
                                         $po_number=$row['po_number'];
                                         $state=$row['state'];
                                         $country=$row['country'];
                                         $google_map=$row['google_map'];
                                         $website_url=$row['website_url'];
                                         $holiday=$row['holiday'];
                                         $working_time=$row['working_time'];
                                         $phone=$row['phone'];
                                         $email=$row['email'];

                                         $path1 = $GLOBALS['BASE_URL'].$GLOBALS['COVER_FOLDER'].$coverimage;
                                         $path2 = $GLOBALS['BASE_URL'].$GLOBALS['LOGO_FOLDER'].$blogo; ?>
                                         <div class="form-group">
                                            <input id="b_edit_busid" name="b_edit_busid" type="hidden" class="form-control" placeholder="Enter business name" value="<?php echo  $cust_bus_id; ?>" required/>
                                        </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Business Name</strong>
                                        <div class="form-group">
                                            <input id="b_edit_name" name="b_edit_name" type="text" class="form-control" placeholder="Enter business name" value="<?php echo  $bname; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Business Logo</strong>
                                        <div class="form-group">
                                            <input id="b_edit_logo" name="b_edit_logo" type="file" class="form-control"  >
                                        </div>
                                        <img class="img-fluid img-thumbnail" src="<?php echo $path2 ?>" style="width:20%;" alt="">
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Cover Image</strong>
                                        <div class="form-group">
                                            <input id="b_edit_cover_img" name="b_edit_cover_img" type="file" class="form-control" >
                                        </div>
                                        <img class="img-fluid img-thumbnail" src="<?php echo $path1 ?>" style="width:20%;" alt="">
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
                                    <h2><strong>Business</strong> Address</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6">
                                        <strong>Building Name</strong>
                                        <div class="form-group">
                                        <input id="b_edit_buname" name="b_edit_buname" type="text" class="form-control" placeholder="Enter Building Name" value="<?php echo  $building_name; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Street Name</strong>
                                        <div class="form-group">
                                        <input id="b_edit_bstreet" name="b_edit_bstreet" type="text" class="form-control" placeholder="Enter Street Name" value="<?php echo  $street_name; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>P.O Number</strong>
                                        <div class="form-group">
                                        <input id="b_edit_bpo" name="b_edit_bpo" type="text" class="form-control" placeholder="Enter P.O Number" value="<?php echo  $po_number; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>City</strong>
                                        <div class="form-group">
                                        <input id="b_edit_bcity" name="b_edit_bcity" type="text" class="form-control"  placeholder="Enter city" value="<?php echo  $city; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>State</strong>
                                        <div class="form-group">
                                        <input id="b_edit_bstate" name="b_edit_bstate" type="text" class="form-control"  placeholder="Enter state" value="<?php echo  $state; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Country</strong>
                                        <div class="form-group">
                                        <input id="b_edit_bcountry" name="b_edit_bcountry" type="text" class="form-control" placeholder="Enter country" value="<?php echo  $country; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Google Map Location</strong>
                                        <div class="form-group">
                                        <textarea id="b_edit_gmap" name="b_edit_gmap" class="form-control" required=""><?php echo  $google_map; ?></textarea>  
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
                                    <h2><strong>Contact</strong> Details</h2>
                                </div>
                                <div class="body row">
                                     <div class="col-sm-6">
                                        <strong>Business Contact Number</strong>
                                        <div class="form-group">
                                        <input id="b_edit_phone" name="b_edit_phone" type="text" class="form-control" placeholder="Enter Customer Name" value="<?php echo $phone; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Business E-mail </strong>&nbsp;&nbsp;<span id="emailid" class="errorform"></span>
                                        <div class="form-group">
                                            <input id="b_edit_email" name="b_edit_email" type="text" class="form-control"  placeholder="Enter E-mail" onblur="checkEmail()" value="<?php echo  $email; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Business Holidays</strong>
                                        <div class="form-group">
                                        <input id="b_edit_holi" name="b_edit_holi" type="text" class="form-control" placeholder="Enter holiday - ex:Sunday" value="<?php echo  $holiday; ?>" required/>
                                        </div>
                                    </div> 
                                    <div class="col-sm-6">
                                        <strong>Business Hours</strong>()
                                        <div class="form-group">
                                        <input id="b_edit_bushrs" name="b_edit_bushrs" type="text" class="form-control" placeholder="Enter business hours - ex:9.00 AM to 6 PM" value="<?php echo  $working_time; ?>" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong> Website URL</strong>
                                            <div class="form-group">
                                            <input id="b_edit_website" name="b_edit_website" type="text" class="form-control" placeholder="Enter wesite url" value="<?php echo  $website_url; ?>"required/>
                                        </div>
                                    </div>
                                    <?php
                                     } ?>
                            </div>
                        </div>
                    </div>
                </div>
         
            <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-danger waves-effect">EDIT BUSINESS PROFILE</button>
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