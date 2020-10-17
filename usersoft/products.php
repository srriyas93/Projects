<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Database Configuration --> 
<?php 
    include_once('../_includes/dbconfig.php');
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<!-- Include Left Side Bar -->
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
    $cust_bus_id = $_GET['cust_bus_id'];
?>

   
<!--Main Content -->
            
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Products</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Products</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                       <button class="btn btn-success btn-icon float-right" type="button" data-toggle="modal"><a href="products_add.php?cust_bus_id=<?php echo $cust_bus_id; ?>"><i class="zmdi zmdi-plus"></a></i></button>     
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
                        
                        <!--Displaying the  contents-->
                        <?php
                       
                        $q = "SELECT prod.cust_prod_id AS cust_prod_id,prod.category AS category,prod.prod_name AS prod_name,prod.brand_name AS brand_name,prod.image AS image,prod.description As description,prod.price AS price,prod.created_date AS created_date,prod.updated_date AS updated_date,
                        CASE prod.status WHEN 1 THEN 'Active' WHEN 0 THEN 'Inactive' END AS status
                        FROM tb_customers_products prod 
                        WHERE prod.cust_bus_id='$cust_bus_id'";
                        $r = mysqli_query($con, $q);
                        $num = mysqli_num_rows($r);
		                if(! ($num > 0))
		                {
                        ?>
    			            <div class="container center">
    			                <h5 class="card conta">No Products added </h5>
    			            </div>
		                <?php
		                }
                        else{
			            ?>
                            <div class="card project_list">
                                <div class="table-responsive">
                                <h6><strong><i class="zmdi zmdi-chart"></i> Total Record(s):</strong> <?php echo $num; ?></h6>
                                    <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Product Name</th>
                                            <th>Brand Name</th>
                                            <th>Price</th>
                                            <th>Status</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                <?php
                                while($row = mysqli_fetch_array($r))
                                    {
                                        $cust_prod_id=$row['cust_prod_id'];
                                        $category=$row['category'];
                                        $prod_name=$row['prod_name'];
                                        $brand_name=$row['brand_name'];
                                        $image=$row['image'];
                                        $description=$row['description'];  
                                        $price=$row['price'];                     
                                        $prod_status=$row['status'];
                             
                                        $prod_created_date = strtotime($row['created_date']);
                                        $prod_created_date = date("d-m-Y", $prod_created_date);
        
                                        $prod_updated_date = strtotime($row['updated_date']);
                                        $prod_updated_date = date("d-m-Y", $prod_updated_date);
                                    
                                        $bname=explode(" ",$brand_name);
                                ?> 
                                  
                                <tr>
                                    <td><strong><?php echo $category; ?></strong></td>
                                    <td><strong><?php echo $prod_name; ?></strong></td>
                                    <td><strong><?php echo $brand_name; ?></strong></td>
                                    <td><strong><?php echo $price; ?></strong></td>
                                    <td><strong><?php echo $prod_status; ?></strong></td>
                                    <td class="aligncenter">
                                        <div class="btn-group dropleft">
                                            <a id="btndropdown<?php echo $cust_prod_id; ?>" class="mousehand" data-toggle="dropdown" href="javascript:void()" data-activates="dropdown<?php echo $cust_prod_id; ?>" aria-expanded="false"><i class="zmdi zmdi-hc-fw"></i></a>
                                            <div id="dropdown<?php echo $cust_prod_id; ?>"class="dropdown-menu">
                                                <a class="dropdown-item" href="products_edit.php?cust_bus_id=<?php echo $cust_bus_id; ?>&cust_prod_id=<?php echo $cust_prod_id; ?>" title="Edit">
                                                <i class="zmdi zmdi-hc-fw margin-right10"></i>Edit
                                                </a>
                                            <?php
                                            echo' 
                                            <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href=javascript:void(0); onClick=javascript:showConfirmMessage1("product",'.$cust_bus_id.','.$cust_prod_id.','."'".$prod_status."'".'); title="Status">
                                                <i class="zmdi zmdi-hc-fw margin-right10"></i>Status
                                                </a>';?>
                                            </div>
                                        </div>
                                    </td>                        
                                </tr>
                                <?php
                                }
                                ?>
                               </tbody>  
                                </table>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

      
<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>
<script>
    if(window.location.href.indexOf("status") > -1) {
    var status=window.location.href.split('=')[1];
    
    if (status == 0)
    {
         showNotification('Products added succesfully !!!','bg-green');
    }
    if (status == 1)
    {
         showNotification('Error !!!','bg-red');
    }

    }

    if(window.location.href.indexOf("updates") > -1) {
    var updatearr=window.location.href.split('&')[0];
    var update=updatearr.split('=')[1];
    
    if (update == 1)
    {
        showNotification('Product Updated succesfully !!!','bg-green');
    }
    if (update == 0)
    {
        showNotification('Error !!!','bg-red');
    }
    
    }
    
   
</script>