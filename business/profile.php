<!--Include Header-->
<?php
    include('../_includes/header-buss-profile.php');
?>
<!-- Include Database Configuration-->
<?php
    include('../_includes/dbconfig.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<!-- Include Global Configuration-->
<?php
    include('../_includes/nxtconfig.php');
    $bslug = $_GET['slugid'];

?>
<?php
                        
    $q = "SELECT cb.cust_bus_id,cb.customer_id,cb.name AS bussiness_name,cb.cover_image AS coverimage,cb.logo AS logo, cb.vision, cb.mission, cb.building_name,cb.street_name,cb.po_number,cb.city,cb.state,cb.country,cb.google_map,cat.name AS category_name FROM tb_customers_business cb, tb_categories cat WHERE cat.id =cb.category_id AND cb.slug='$bslug'";
    $r = mysqli_query($con, $q);
    if ($row = mysqli_fetch_array($r)) 
     {
        $cust_bus_id = $row['cust_bus_id'];
        $cust_id = $row['customer_id'];
        $bussiness_name=$row['bussiness_name'];
        $coverimage=$row['coverimage'];
        $logo=$row['logo'];
        $vision=$row['vision'];
        $mission=$row['mission'];
        $building_name=$row['building_name'];
        $street_name=$row['street_name'];
        $po_number=$row['po_number'];
        $city=$row['city'];
        $state=$row['state'];
        $country=$row['country'];
        $google_map=$row['google_map'];
        $category_name = $row['category_name'];
        $path_cover=$GLOBALS['BASE_URL'].$GLOBALS['COVER_FOLDER'].$coverimage;
        $path_logo = $GLOBALS['BASE_URL'].$GLOBALS['LOGO_FOLDER'].$logo;
        
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
                    <img src=<?php echo $path_logo; ?> width="200px" alt=""><br><br>
                    <h1 class="uppercase text-white less-mar-1 titletext"><?php echo $bussiness_name; ?> </h1>
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
            <img style="float: right;" src=<?php echo  $path_cover; ?> width="820px" alt="" /> 
            </div>
        </div>
    </div>
    </div>
</section>

<div class=" clearfix"></div>
<!-- Product Details -->
<?php
                        
        $q = "SELECT cust_prod_id,prod_name,brand_name,category,image,price,description,slug FROM tb_customers_products WHERE cust_bus_id='$cust_bus_id'";
        $r = mysqli_query($con, $q);
       
?>
<section id="products" class="sec-padding-6">
    <div class="container">
        <div class="title-line-3 ce-title-line"></div>
        <h4 class="uppercase font-weight-7 less-mar-1 typography-title-9H">Products</h4>
        <?php
        while ($row = mysqli_fetch_array($r))
        {
            $sno=$row['cust_prod_id'];
            $prod_name=$row['prod_name'];
            $brandname=$row['brand_name'];
            $image=$row['image'];
            $category = $row['category'];
            $price = $row['price'];
            $description = $row['description'];
            $pslug = $row['slug'];
            $path = $GLOBALS['BASE_URL'].$GLOBALS['PROD_FOLDER'].$image;
            
        ?>

    <div class="clearfix"></div>
        <br><br>
        <div class="row">
            <div class="col-md-6 col-sm-12 col-xs-12  margin-bottom"> <img src=<?php echo $path; ?> alt="" class="img-responsive" width="900px"/> 
            </div>
            <div class="col-md-6 margin-bottom">
                <h3 class="uppercase"><?php echo $prod_name; ?> </h3>
                <h4><?php echo $category; ?></h4>
                <h4><?php echo $brandname; ?></h4>
                <h4><?php echo $price; ?> INR </h4>
                <p><?php echo $description; ?></p>
                <div class="clearfix"></div>
                <br /><br />
                <a class="btn btn-blue uppercase" href=<?php echo $GLOBALS['BASE_URL'];?>products/<?php echo $bslug; ?>/<?php echo $pslug; ?>>View Details</a>
            </div>
        </div>
<?php
    }
?>
<div class="clearfix"></div>
              <br /><br /><br /><br />
          </div>
</section>
<div class="clearfix"></div>
<!-- Vision & Mission -->
<?php
if($vision or $mission)
{
?>
<section id="vision" class="sec-padding-6">
    <div class="container">
    <div class="row">';
        <div class="col-md-8 col-centered">
        <div class="ce-feature-box-42 text-center">
            <h2 class="font-weight-6 less-mar-1 line-height-4">Mission & Vision</h2>
            <div class="ce-title-line"></div>
            <br />
            <p><?php echo $vision; ?></p>
            <p><?php echo $mission; ?></p>
            <div class="clearfix"></div>
        </div>
        </div>
    </div>
    </div>
</section>
<?php
}
else
{
?>
<div class="col-md-8 col-centered">
    <div class="ce-feature-box-42 text-center">
        <h5 class="font-weight-6 less-mar-1 line-height-4">No Mission & Vision Available</h5>
    </div>
</div>
<?php
}
?>
<div class="clearfix"></div>
<!-- Business Address -->

<section id="baddress" class="sec-padding section-light-4">
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
                        
    $q = "SELECT c.name AS custname,c.email_id AS custemail,c.phone_no AS phone,cb.website_url AS website FROM tb_customers c,tb_customers_business cb
            WHERE c.id=cb.customer_id AND c.id='$cust_id'";
    $r = mysqli_query($con, $q);
    if($row = mysqli_fetch_array($r))
     {
        $custname=$row['custname'];
        $custemail=$row['custemail'];
        $phone = $row['phone'];
        $website = $row['website'];
    }
?>
<div id="contact" class="col-md-12 col-sm-12 col-xs-12"><br>
    <div class="text-box secondary padding-6">
    <div class="sec-title-container less-padding-3 text-center">
        <div class="title-line-3 ce-title-line"></div>
        <h4 class="uppercase font-weight-7 less-mar-1 typography-title-9H">Contact Details</h4>
        <div class="clearfix"></div>
        <br><br>';
        <p class="by-sub-title typography-title-9">
        <?php echo $custname; ?> <br>
        <?php echo $phone; ?> <br>
        <?php echo $custemail; ?> <br>
        <?php echo $website; ?> 
        </p>
    </div>
    </div>
</div>
<div class="clearfix"></div>


<!--Include Footer-->
<?php
    include('../_includes/footer-buss.php');
?>