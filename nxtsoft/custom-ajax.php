<?php
include('../_includes/dbconfig.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] == "disablePlan") {

        $id = $_GET['id'];
        $status = $_GET['status'];
        if($status=='Active'){
            $plan_status=0;
        }else{
            $plan_status=1;
        }
 
        $Q3 = "UPDATE tb_plans SET status=$plan_status, updated_date = CURRENT_TIMESTAMP() WHERE id= $id";

        $r3 = mysqli_query($con, $Q3);

        if (!mysqli_query($con, $Q3)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }

    elseif ($_REQUEST['mode'] == "disablePlanFeatures") {

        $id = $_GET['id'];
        $status = $_GET['status'];
        if($status=='Active'){
            $feature_status=0;
        }else{
            $feature_status=1;
        }
 
        $Q3 = "UPDATE tb_plans_features SET status=$feature_status, updated_date = CURRENT_TIMESTAMP() WHERE id= $id";

        $r3 = mysqli_query($con, $Q3);

        if (!mysqli_query($con, $Q3)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }

    elseif ($_REQUEST['mode'] == "disableBc") {

        $bc_id = $_GET['bc_id'];
        $status = $_GET['status'];
        if( $status=='Active' ){
            $bc_status=0;
        }else{
            $bc_status=1;
        }
 
        $Q3 = "UPDATE tb_bussiness_counsellors SET status=$bc_status, updated_date = CURRENT_TIMESTAMP() WHERE id= '$bc_id'";

        $r3 = mysqli_query($con, $Q3);

        if (!mysqli_query($con, $Q3)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }

    elseif ($_REQUEST['mode'] == "disableAdmin") {

        $user_id = $_GET['user_id'];
        $status = $_GET['status'];
        if($status=='Active' ){
            $admin_status=0;
        }else{
            $admin_status=1;
        }
       
        $Q3 = "UPDATE tb_admin SET tb_status=$admin_status, tb_updated_date = CURRENT_TIMESTAMP() WHERE user_id= $user_id";
        $r3 = mysqli_query($con, $Q3);

        if (!mysqli_query($con, $Q3)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }

    elseif ($_REQUEST['mode'] == "disableCustomer") {

        $cust_sno = $_GET['cust_sno'];
        $status = $_GET['status'];
        if($status=='Active' ){
            $admin_status=0;
        }else{
            $admin_status=1;
        }
       
        $Q3 = "UPDATE tb_customers SET status=$admin_status, updated_date = CURRENT_TIMESTAMP() WHERE sno=$cust_sno";
        $r3 = mysqli_query($con, $Q3);

        if (!mysqli_query($con, $Q3)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }
    elseif($_GET['mode'] == "GET_BC_NAME")
    {
        $bc_id = $_POST['bcid'];
        $query="SELECT name FROM tb_bussiness_counsellors WHERE id ='$bc_id'";
        $r = mysqli_query($con, $query);
        if($row = mysqli_fetch_array($r))
        {
            $bcname = $row["name"];
            echo "      Counseleor Name - $bcname";
        }
        else
            echo "0";
    }
    elseif($_GET['mode'] == "CHECK_EMAIL")
    {
        $email = $_POST['email'];
        $query="SELECT email_id FROM tb_customers WHERE email_id ='$email'";
        $r = mysqli_query($con, $query);
        $c = mysqli_num_rows($r);
        if($c)
        {
           echo "0";
        }
        else
            echo "1";
    }
   elseif($_GET['mode'] == "CHECK_MOB")
    {
        $cphone = $_POST['cphone'];
        $query="SELECT phone_no FROM tb_customers WHERE phone_no ='$cphone'";
        $r = mysqli_query($con, $query);
        $c = mysqli_num_rows($r);
        if($c)
        {
            echo "0";
        }
        else
            echo "1";
    }

}