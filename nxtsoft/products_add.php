<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Database Configuration -->
<?php 
    include('../_includes/dbconfig.php');
    $con = mysqli_connect(HOST, USER, PASS, DB) or die('Unable to Connect...');
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
?>

<!-- Main Content -->
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
               <!--         <button class="btn btn-success btn-icon float-right" type="button" data-toggle="modal" data-target="#popaddnewplan"><i class="zmdi zmdi-plus"></i></button>-->
                    </div>
                </div>
            </div>
            <?php
             $sno = $_GET['sno'];
             $q = "SELECT COUNT(cp.cust_bus_id) AS countcustbusid,p.product_limit AS plimit,cp.cust_bus_id AS custbussid 
                    FROM tb_customers_business cb,tb_customers_products cp,tb_customers c,tb_plans p,tb_customers_plan cplan 
                    WHERE cp.cust_bus_id=cb.cust_bus_id AND cb.customer_id=c.id AND cplan.cust_id=c.id AND p.id=cplan.plan_id 
                    AND c.sno=$sno";
             $r3 = mysqli_query($con, $q);
             //echo $q;
             $num1=mysqli_num_rows($r3);
             
             if (mysqli_num_rows($r3) > 0){
                 while ($row = mysqli_fetch_array($r3)) {
                     $countcustbusid=$row['countcustbusid'];
                     $plimit=$row['plimit'];
                     $custbussid=$row['custbussid'];
                     if ($countcustbusid<$plimit) {
                         echo'
            <div class="container-fluid">
                <div class="row clearfix">                               
                    <div class="col-md-12 col-sm-12 col-xs-12">
                    <form name="DisplayProductForm" id="DisplayProductForm" action="products-action.php" enctype="multipart/form-data" method="POST">
                        <div id="DisplayProfile" class="modal-body">                                 
                            <div class="row clearfix">
                                <div class="form-group">
                                    <input id="prod_add_id" name="prod_add_id" type="hidden" value='.$custbussid.' class="form-control" required/>
                                </div>
                                <div class="col-sm-12">
                                    <strong>Category</strong>
                                    <div class="form-group">
                                        <input id="prod_add_cat" name="prod_add_cat" type="text" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <strong>Product Name*</strong> 
                                    <div class="form-group">
                                        <input id="prod_add_name" name="prod_add_name" type="text" class="form-control" required/>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                <strong>Brand Name*</strong> 
                                    <div class="form-group">
                                        <input id="prod_add_brand_name" name="prod_add_brand_name" type="text" class="form-control" required/>
                                    </div>
                                </div>
                            <div class="col-sm-12">
                                <strong>Main Image*</strong> 
                                <div class="form-group">
                                    <input id="prod_add_image" name="prod_add_image" type="file" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <strong>Image-2</strong>(Optional)
                                <div class="form-group">
                                    <input id="prod_add_image2" name="prod_add_image2" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <strong>Image-3</strong>(Optional)
                                <div class="form-group">
                                    <input id="prod_add_image3" name="prod_add_image3" type="file" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <strong>Description*</strong> 
                                <div class="form-group">
                                    <input id="prod_add_description" name="prod_add_description" type="text" class="form-control" required/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <strong>Keywords </strong> 
                                <div class="form-group">
                                    <input id="prod_add_keywords" name="prod_add_keywords" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <strong>Price*</strong> 
                                <div class="form-group">
                                    <input id="prod_add_price" name="prod_add_price" type="text" class="form-control" required/>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" name="submit" class="btn btn-danger waves-effect">ADD PRODUCT</button>
                            <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>';
                     } else {
echo'                   <div class="container-fluid">
                            <div class="row clearfix">                               
                                <div class="col-md-12 col-sm-12 col-xs-12" style="font-size: 15px;font-weight: bold;color:red">
                                <h7>Product Limit Exceeds...Upgrade your Package</h2>
                            </div>
                        </div>';
                     }
                 }
}           ?>

        </div>
    </section>

<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>