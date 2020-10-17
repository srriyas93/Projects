<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
if (isset($_GET['mode']))
{
    if ($_REQUEST['mode'] == "insertMission")
    {
    	$cust_bus_id= $_GET['cust_bus_id'];
    	$vision= $_GET['vision'];
    	$mission= $_GET['mission'];
    	 $Q = "UPDATE `tb_customers_business` SET `vision`='$vision', mission='$mission' WHERE cust_bus_id='$cust_bus_id'";

        $r = mysqli_query($con, $Q);
        if ($r)
        {
           echo "success";
            
        } 
        else
        {
            echo("error");
        }
    }
}