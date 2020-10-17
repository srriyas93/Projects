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
    include('../_includes/nxtconfig.php');
    require_once '../_includes/dbconfig.php';
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
    $cust_bus_id = $_GET['cust_bus_id'];
    $cust_prod_id = $_GET['cust_prod_id'];
?>
 
<!-- Main Content -->
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Edit Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
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
                            $q = "SELECT category,prod_name,brand_name,image,description,keywords,price,created_date,updated_date,
                            CASE status WHEN 1 THEN 'Active' WHEN 0 THEN 'Inactive' END AS status FROM tb_customers_products WHERE cust_prod_id='$cust_prod_id'";
                            $r3 = mysqli_query($con, $q);
                            $num1=mysqli_num_rows($r3);
                            
                            if (mysqli_num_rows($r3) > 0) {
                                if ($row = mysqli_fetch_array($r3)) {
                                    $category=$row['category'];
                                    $prod_name=$row['prod_name'];
                                    $brand_name=$row['brand_name'];
                                    $image=$row['image'];
                                    $description=$row['description'];
                                    $price=$row['price'];
                                    $prod_keywords=$row['keywords'];
                                    $prod_status=$row['status'];
                        
                                    $prod_created_date = strtotime($row['created_date']);
                                    $prod_created_date = date("d-m-Y", $prod_created_date);

                                    $prod_updated_date = strtotime($row['updated_date']);
                                    $prod_updated_date = date("d-m-Y", $prod_updated_date);
                                    
                                    $path = $GLOBALS['BASE_URL'].$GLOBALS['PROD_FOLDER'].$image;
                                }
                            }
                            ?>
            <form id="addCustomer" name="addCustomer" action="products-action.php" enctype="multipart/form-data" method="POST">
                <div class="row clearfix">  
                <div class="container-fluid">
                    <div class="row clearfix">
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="card">
                                <div class="header">
                                    <h2><strong>Product</strong> Details</h2>
                                </div>
                                        <div class="form-group">
                                            <input id="prod_sno" name="prod_sno" type="hidden" value="<?php echo $cust_prod_id ?>" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input id="cust_bus_id" name="cust_bus_id" type="hidden" value="<?php echo $cust_bus_id ?>" class="form-control">
                                        </div>
                                <div class="body row">
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Category</strong>
                                        <div class="form-group">
                                            <input id="prod_cat" name="prod_cat" type="text" class="form-control" value="<?php echo $category ?>" placeholder="Enter business name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Product Name</strong>
                                        <div class="form-group">
                                            <input id="prod_name" name="prod_name" type="text" value="<?php echo $prod_name ?>" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Brand Name</strong>
                                        <div class="form-group">
                                            <input id="prod_brand_name" name="prod_brand_name" type="text" value="<?php echo $brand_name ?>" class="form-control" />
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
                                    <h2><strong>Product</strong> Descriptions</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6">
                                        <strong>Description</strong>
                                        <div class="form-group">
                                            <textarea id="prod_description" name="prod_description" class="form-control" required=""><?php echo $description ?></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Keywords</strong>
                                        <div class="form-group">
                                            <input id="prod_keywords" name="prod_keywords" type="text" value="<?php echo $prod_keywords ?>" class="form-control" placeholder="Enter product name" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Price</strong>
                                        <div class="form-group">
                                            <input id="prod_price" name="prod_price" type="text" class="form-control" value="<?php echo $price ?>" placeholder="Enter product category" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Current Status</strong>
                                        <div class="form-group">
                                            <input id="prod_status" name="prod_status" type="text" class="form-control" value="<?php echo $prod_status ?>" disabled>
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
                                    <h2><strong>Product</strong> Thumbnails</h2>
                                </div>
                                <div class="body row">
                                    <div class="col-sm-6">
                                        <strong>Image</strong>(900px X 550px)
                                        <div class="form-group">
                                            <input id="prod_image" name="prod_image" type="file" class="form-control">
                                        </div>
                                        <img class="img-fluid img-thumbnail" src="<?php echo $path ?>" style="width:20%;" alt="">
                                    </div>
                                    <?php
                                    $q1 = "SELECT image_id,image from  tb_customers_products_image where cust_prod_id = $cust_prod_id";
                                    // echo $q1;
                                        $r4 = mysqli_query($con, $q1);
                                    ?>
                                    <div class="col-sm-6">
                                        <strong>Image-2</strong>(Optional)(900px X 550px)
                                        <div class="form-group">
                                        <input id="prod_image2" name="prod_image2" type="file" class="form-control">
                                        </div>
                                        <?php
                                        if ($row1 = mysqli_fetch_array($r4)) 
                                            {
                                            $image2_id = $row1['image_id'];
                                            $image2=$row1['image'];

                                            $path2 = $GLOBALS['BASE_URL'].$GLOBALS['PROD_FOLDER'].$image2;
                                            // echo $path2;
                                            echo'
                                        <img class="img-fluid img-thumbnail" src="'.$path2.'" style="width:20%;" alt="">
                                        <input type="hidden" id=exist_image2  name=exist_image2  value="'.$image2_id.'">';
                                        }
                                echo'
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Image-3</strong>(Optional)(900px X 550px)
                                        <div class="form-group">
                                        <input id="prod_image3" name="prod_image3" type="file" class="form-control"  >
                                        </div>';
                                        if ($row1 = mysqli_fetch_array($r4)) {
                                            $image3_id = $row1['image_id'];
                                            $image3=$row1['image'];
                                            $path3 = $GLOBALS['BASE_URL'].$GLOBALS['PROD_FOLDER'].$image3;
                                            echo'
                                        <img class="img-fluid img-thumbnail" src="'.$path3.'" style="width:20%;" alt="">
                                        <input type="hidden" id=exist_image3  name=exist_image3  value="'.$image3_id.'">';
                                        } ?>
                                    </div>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
         
            <div class="modal-footer">
                <button type="submit" name="edit" class="btn btn-danger waves-effect">UPDATE DETAILS</button>
                <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal" onClick='window.history.back()'>CLOSE</button>
            </div>
            </form>
        </div>
    </div>
</section>

<!-- Include Footer -->

<?php
    include('page_footer.php');
?>