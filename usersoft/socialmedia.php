<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Database Configuration -->
<?php 
    include('../_includes/dbconfig.php');
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
                        <h2>Social Media</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Social Media</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
               <!--         <button class="btn btn-success btn-icon float-right" type="button" data-toggle="modal" data-target="#popaddnewplan"><i class="zmdi zmdi-plus"></i></button>-->
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row clearfix">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <form name="DisplayProfileForm" id="DisplayProfileForm" action="socialmedia-action.php" method="POST">
                                <div id="DisplayProfile" class="modal-body">
                                        <?php
                                        $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
                                        
                                        
                                        $cust_bus_id=$_GET['cust_bus_id'];
                                        $q = "SELECT facebook_page AS fb,twitter_page AS twitter,youtube_page As youtube,instagram_page AS insta FROM tb_customers_business cb WHERE cb.cust_bus_id=$cust_bus_id";
                                        $r3 = mysqli_query($con, $q);
                                        $num1=mysqli_num_rows($r3);
                                        
                                        if (mysqli_num_rows($r3) > 0){
                                            while ($row = mysqli_fetch_array($r3)) 
                                            {
                                                $fb=$row['fb'];
                                                $twitter=$row['twitter'];
                                                $youtube=$row['youtube'];
                                                $insta=$row['insta'];
                                                                                
                            echo'       <div class="body row">
                                            <div class="form-group">
                                                <input id="username" name="username" type="hidden" value="'.$cust_bus_id.'" class="form-control">
                                            </div>
                                            <div class="col-sm-6">
                                                <strong>Facebook Page</strong>
                                                <div class="form-group">
                                                    <input id="cust_buss_fb" name="cust_buss_fb" type="text" value="'.$fb.'" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <strong>Twitter</strong> 
                                                <div class="form-group">
                                                    <input id="cust_buss_twitter" name="cust_buss_twitter" type="text" value="'.$twitter.'" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <strong>Youtube</strong> 
                                                <div class="form-group">
                                                    <input id="cust_buss_youtube" name="cust_buss_youtube" type="text" value="'.$youtube.'" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <strong>Instagram</strong> 
                                                <div class="form-group">
                                                    <input id="cust_buss_insta" name="cust_buss_insta" type="text" value="'.$insta.'" class="form-control">
                                                </div>
                                            </div>
                                        </div>';
                                    }
                                } ?>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="edit" class="btn btn-danger waves-effect">UPDATE</button>
                            <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
           </div>
        </div>
    </section>';

<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>