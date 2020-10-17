<?php
include('../_includes/dbconfig.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] == "disableProduct") {

        $sno = $_GET['sno'];
        $status = $_GET['status'];
        if($status=='Active'){
            $product_status=0;
        }else{
            $product_status=1;
        }
 
        $Q3 = "UPDATE tb_customers_products SET status=$product_status, updated_date = CURRENT_TIMESTAMP() WHERE sno= $sno";

        $r3 = mysqli_query($con, $Q3);

        if (!mysqli_query($con, $Q3)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }
}