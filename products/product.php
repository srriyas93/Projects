<!--Include Header-->
<?php
    include('../_includes/header-buss-products.php');
?>
<!-- Include Database Configuration-->
<?php
    include('../_includes/dbconfig.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<!-- Include Global Configuration-->
<?php
    include('../_includes/nxtconfig.php');
     $bslug = $_GET['bslug'];
     $pslug = $_GET['pslug'];
?>
<!-- header section -->
<?php
		                
    $q = "SELECT cb.cust_bus_id,cb.customer_id,cb.name AS bussiness_name,cb.cover_image AS coverimage,cb.logo AS logo,cat.name AS category_name, cb.building_name, cb.street_name, cb.po_number,cb.city,cb.state,cb.country,cb.google_map, cb.website_url FROM tb_customers_business cb,tb_categories cat 
            WHERE cat.id =cb.category_id AND cb.slug='$bslug'";
    $r = mysqli_query($con, $q);
    if($row = mysqli_fetch_array($r)) 
    {
        $cust_bus_id = $row['cust_bus_id'];
        $cust_id = $row['customer_id'];
        $bussiness_name=$row['bussiness_name'];
        $coverimage=$row['coverimage'];
        $logo=$row['logo'];
        $building_name=$row['building_name'];
        $street_name=$row['street_name'];
        $po_number=$row['po_number'];
        $city=$row['city'];
        $state=$row['state'];
        $country=$row['country'];
        $google_map=$row['google_map'];
        $website_url = $row['website_url'];
        $category_name = $row['category_name'];
        $pathlogo = $GLOBALS['BASE_URL'].$GLOBALS['LOGO_FOLDER'].$logo;
        $pathcover = $GLOBALS['BASE_URL'].$GLOBALS['COVER_FOLDER'].$coverimage;
    }
?>
<section class="section-side-image clearfix" >
<div class="container-fluid">
    <div class="row">
        <!-- <div class="col-md-8 col-sm-12 col-xs-12"></div> -->
        <div class="logo-wrapper col-md-4 col-sm-12 col-xs-12">
            <div class="center">
            <div class="header-inner less-height">
                <div class="text text-center">
                <img src=<?php echo $pathlogo; ?> width="200px" alt="">
                <h1 class="uppercase text-white less-mar-1 titletext"><?php echo $bussiness_name; ?></h1>
                <h6 class="uppercase text-white sub-titletext">
                    <ol class="breadcrumb" style="background: transparent;">
                        <li><h4 class="text-dark"><?php echo $category_name; ?></h4></li>
                    </ol>
                </h6>
                </div>
            </div>
            </div>
        </div>
        <div class="img-holderX col-md-8 col-sm-12 col-xs-12">
        <div class="background-imgholder">
            <img style="float: right;" src=<?php echo  $pathcover; ?> width="820px" alt="" /> 
        </div>
        </div>
    </div>
</div>
</section>
<div class=" clearfix"></div>
<!-- Product Details -->
<?php
		               
    $q = "SELECT cust_prod_id, prod_name,brand_name,category,image,price,description FROM  tb_customers_products  WHERE cust_bus_id='$cust_bus_id' AND slug='$pslug'";
    $r = mysqli_query($con, $q);
    if ($row = mysqli_fetch_array($r)) 
     {
        $main_prod_id = $row['cust_prod_id'];
        $prod_name=$row['prod_name'];
        $brandname=$row['brand_name'];
        $image=$row['image'];
        $category = $row['category'];
        $price = $row['price'];
        $description = $row['description'];
        $main_img_path = $GLOBALS['BASE_URL'].$GLOBALS['PROD_FOLDER'].$image;
        
     }
                           
?>

<section id="product" class="sec-padding-2">
    <div class="container">
        <div class="col-md-6 col-sm-12 col-xs-12  margin-bottom">
            <div id="owl-demo7" class="owl-carousel">
                <div class="item"><img src=<?php echo $main_img_path; ?> alt="" class="img-responsive"></div>
                <?php
                //getting 2nd and 3rd image of the main product
                $q1="SELECT  image_id, image from tb_customers_products_image where cust_prod_id =$main_prod_id";
                 $r1 = mysqli_query($con, $q1);
                while ($row1 = mysqli_fetch_array($r1)) 
                 {
                    $image_id = $row1["image_id"];
                    $next_image = $row1["image"];
                    $next_img_path = $GLOBALS['BASE_URL'].$GLOBALS['PROD_FOLDER'].$next_image;
                ?>
                <div class="item"><img src=<?php echo $next_img_path; ?> alt="" class="img-responsive"></div>
                <?php
                }
                ?>
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12">
            <br>
            <h2 class=" font-weight-7"><?php echo $prod_name; ?></h2>
            <div class="divider-line solid light"></div>
            <br />
            <h5 class="font-weight-4"><?php echo $category; ?></h5>
            <h5 class="font-weight-4"><?php echo $brandname; ?></h5>
            <h5 class="font-weight-4">Product Description</h5>
            <p><?php echo $description; ?></p>
            <br><br>
            <h4 class="font-weight-4"><?php echo $price; ?> INR</h4>
            <br /><br />
            <a class="btn btn-blue uppercase" href="#">Get a Quote</a>
        </div>
    </div>
</section>
<div class="clearfix"></div>
<!-- Other Products -->
<?php
		                
    $q = "SELECT cust_prod_id,prod_name,brand_name,category,image,price,description,slug
            FROM tb_customers_products WHERE cust_bus_id='$cust_bus_id' AND cust_prod_id != $main_prod_id ";
    $r = mysqli_query($con, $q);
    $num = mysqli_num_rows($r);
    if($num > 0)
    {

?>
<section class="sec-bpadding-2 section-light-4">
<div class="container">
    <div class="row">
        <div class="col-xs-12 nopadding">
            <div class="sec-title-container less-padding-1 text-center">
                <br><br>
            <h4 class="font-weight-7 less-mar-1">Other Products</h4>
            </div>
        </div>
        <div class="clearfix"></div>
        <!--end title-->
        <?php
            
              while ($row = mysqli_fetch_array($r)) 
              {
               
                $cust_prod_id=$row['cust_prod_id'];
                $prod_name=$row['prod_name'];
                $brandname=$row['brand_name'];
                $image=$row['image'];
                $category = $row['category'];
                $price = $row['price'];
                $description = $row['description'];
                $pslug = $row['slug'];
                $path = $GLOBALS['BASE_URL'].$GLOBALS['PROD_FOLDER'].$image;
            ?>
                            
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="sp-feature-box-3 margin-bottom">
                <div class="img-box">
                    <img src=<?php echo $path; ?> alt="" class="img-responsive" />
                </div>
                <div class="clearfix"></div>
                <br />
                <div class="margin-left-1">
                    <h5 class="less-mar-1"><?php echo $brandname; ?></h5>
                    <p><?php echo $description; ?></p>
                    <h5 class="text-primary"><?php echo $price; ?> INR</h5>
                </div>
                <a class="btn btn-border light btn-small" href=<?php echo $GLOBALS['BASE_URL'];?>products/<?php echo $bslug; ?>/<?php echo $pslug; ?>>View Details</a>
            </div>
        </div>
        <?php
        }
        }
        else
        {
        ?>

            <h5 lass="font-weight-7 less-mar-1">NO Other Products Available</h4>
            
       <?php

        }
        ?>

    </div>
</div>
</section>
<div class="clearfix"></div>
<!-- Business Address -->

<section id="baddress" class="sec-padding">
    <div class="container">
    <div class="row">
        <div class="col-md-4 col-sm-12 col-xs-12">
        <h3>Business Address</h3>
        <h6><?php echo $building_name;?></h6>
        <h6><?php echo $street_name;?></h6>
        <h6><?php echo $po_number; ?></h6>
        <h6><?php echo $city; ?></h6>
        <h6><?php echo $state; ?></h6>
        <h6><?php echo $country; ?></h6>
        <br /><br />

        </div>
        <div class="col-md-8 col-sm-12 col-xs-12 text-left margin-bottom">
            <h4>Google Map Location</h4>
            <div id="map_controls" class="map">
            <p><?php echo $google_map;?></p>
        </div>
        <br /><br />
        </div>
    </div>
    </div>
</section>
<div class="clearfix"></div>

<!-- Contact -->
<?php
		                
    $q = "SELECT c.name AS custname,c.email_id AS custemail,c.phone_no AS phone FROM tb_customers c WHERE c.id='$cust_id'";
    $r = mysqli_query($con, $q);
    if($row = mysqli_fetch_array($r))
     {
                $custname=$row['custname'];
                $custemail=$row['custemail'];
                $phone = $row['phone'];
               
    }

?>
<div id="contact" class="col-md-12 col-sm-12 col-xs-12 section-light-4"><br>
    <div class="text-box secondary padding-6">
        <div class="sec-title-container less-padding-3 text-center">
            <div class="title-line-3 ce-title-line"></div>
            <h4 class="uppercase font-weight-7 less-mar-1 typography-title-9H">Contact Details</h4>
            <div class="clearfix"></div>
            <br><br>
            <p class="by-sub-title typography-title-9">
                 <?php echo $custname; ?> <br>
                <?php echo $phone; ?> <br>
                <?php echo $custemail; ?> <br>
               <?php echo $website_url; ?>
            </p>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="divider-line solid light-2"></div>

<!--Include Footer-->
<?php
    include('../_includes/footer-buss.php');
?>