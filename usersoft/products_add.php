<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Database Configuration -->
<?php 
    include('../_includes/dbconfig.php');
?>
<!-- Global Path Configuration -->
<?php 
    include('../_includes/nxtconfig.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
    $cust_bus_id = $_GET['cust_bus_id'];
    
?>
<!-- Main Content -->

<?php 
                                    $q="SELECT p.product_limit AS plimit,count(prod.cust_bus_id) AS custbusidcount FROM tb_plans p,tb_customers_plan cp,tb_customers_products prod 
                                        WHERE p.id=cp.plan_id AND prod.cust_bus_id=cp.cust_bus_id AND prod.cust_bus_id=$cust_bus_id ";
                                    $r=mysqli_query($con,$q);
                                    $row=mysqli_fetch_array($r);
                                    $plimit=$row['plimit'];
                                    $custbusidcount=$row['custbusidcount'];
                                    if( $custbusidcount<$plimit ){
                                        $flag=1;
                                    }else{
                                        $flag=0;
                                    }
                                    ?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Add New Product</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Add New Product</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        
        <div class="container-fluid">
        <?php if($flag==1){ ?>
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
                                            <input id="cust_bus_id" name="cust_bus_id" type="hidden" value="<?php echo $cust_bus_id ?>" class="form-control">
                                        </div>
                                <div class="body row">
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Category*</strong>
                                        <div class="form-group">
                                            <input id="prod_add_cat" name="prod_add_cat" type="text" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Product Name*</strong>
                                        <div class="form-group">
                                            <input id="prod_add_name" name="prod_add_name" type="text" class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-6">
                                        <strong>Brand Name*</strong>
                                        <div class="form-group">
                                            <input id="prod_add_brand_name" name="prod_add_brand_name" type="text"  class="form-control" />
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
                                        <strong>Description*</strong>
                                        <div class="form-group">
                                            <textarea id="prod_add_description" name="prod_add_description" class="form-control" required=""></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Keywords*</strong>
                                        <div class="form-group">
                                            <input id="prod_add_keywords" name="prod_add_keywords" type="text"  class="form-control" required/>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Price*</strong>
                                        <div class="form-group">
                                            <input id="prod_add_price" name="prod_add_price" type="text" class="form-control"  required/>
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
                                        <strong>Image*</strong>(900px X 550px)
                                        <div class="form-group">
                                            <input id="prod_add_image" name="prod_add_image" type="file" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Image-2</strong>(Optional)(900px X 550px)
                                        <div class="form-group">
                                            <input id="prod_add_image2" name="prod_add_image2" type="file" class="form-control">
                                        </div> 
                                    </div>
                                    <div class="col-sm-6">
                                        <strong>Image-3</strong>(Optional)(900px X 550px)
                                        <div class="form-group">
                                            <input id="prod_add_image3" name="prod_add_image3" type="file" class="form-control"  >
                                        </div>
                                    </div>
                                      
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                
         
            <div class="modal-footer">
                <button type="submit" name="submit" class="btn btn-danger waves-effect">UPDATE DETAILS</button>
                <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal" onClick='window.history.back()'>CLOSE</button>
            </div>
            </form>
            <?php } else { ?>
                    <div style='font-size: 13px;font-weight: bold;color:red'>Product Limit Exceeds...Kindly Upgrade your Package...!!!</div>
                <?php } ?>
        </div>
    </div>
</section>

<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>