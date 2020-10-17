<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] == "AddCommission") {
        $comm_plan= $_GET['comm_plan'];
        $comm_category = $_GET['comm_category'];
        $comm_amount = $_GET['comm_amount'];

        $q = "INSERT INTO tb_bc_comm_setting(plan_id,category,amount) VALUES ($comm_plan,$comm_category,$comm_amount)";
      

        if (!mysqli_query($con, $q)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }

    elseif ($_REQUEST['mode'] == "EditCommission") {
        $comm_sno= $_GET['comm_sno'];
        $comm_amount = $_GET['comm_amount'];

        $q = "UPDATE tb_bc_comm_setting SET amount=$comm_amount WHERE sno=$comm_sno";
      

        if (!mysqli_query($con, $q)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }
}