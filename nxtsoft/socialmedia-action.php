<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_POST['edit'])) { 
            
    $username=$_POST["username"];
    $cust_buss_fb=$_POST["cust_buss_fb"]; 
    $cust_buss_twitter=$_POST["cust_buss_twitter"];  
    $cust_buss_youtube=$_POST["cust_buss_youtube"];  
    $cust_buss_insta=$_POST["cust_buss_insta"];  
        
        $Q3 = "UPDATE `tb_customers_business` SET `facebook_page`='$cust_buss_fb', twitter_page='$cust_buss_twitter',youtube_page='$cust_buss_youtube',instagram_page='$cust_buss_insta', updated_date=CURRENT_TIMESTAMP() 
                WHERE cust_bus_id=$username";
        $r3 = mysqli_query($con, $Q3);

        if ($r3) {
           echo "Success";
            
        } else {
            echo("Error description: " . mysqli_error($con));
        }
        header("Location:bussiness_profile.php");
    }
