<?php
include('../_includes/dbconfig.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] == "disableProduct") {

        $cust_prod_id = $_GET['cust_prod_id'];
        $prod_status = $_GET['prod_status'];
        if( $prod_status=='Active' ){
            $status=0;
        }else{
            $status=1;
        }
 
        $Q3 = "UPDATE tb_customers_products SET status=$status, updated_date = CURRENT_TIMESTAMP() WHERE cust_prod_id= $cust_prod_id";

        $r3 = mysqli_query($con, $Q3);

        if (!mysqli_query($con, $Q3)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }
}