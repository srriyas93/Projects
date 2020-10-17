<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] == "addAdmin") {
        $admin_name= $_GET['admin_name'];
        $admin_email = $_GET['admin_email'];
        $admin_password = $_GET['admin_password'];
        /* md5 Conversion */ 
        $md5_password=md5($admin_password);
        
        $admin_mobile = $_GET['admin_mobile'];

        $q = "INSERT INTO tb_admin(tb_name,tb_email,tb_mob,tb_pwd) VALUES ('$admin_name','$admin_email','$admin_mobile','$md5_password')";
      

        if (!mysqli_query($con, $q)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
		}
    } 

    elseif ($_REQUEST['mode'] == "editUpdate") {
        $admin_id=$_GET['admin_id'];
        $admin_name = $_GET['admin_name'];
        $admin_mobile = $_GET['admin_mobile'];
        $Q3 = "UPDATE `tb_admin` SET `tb_name` = '$admin_name',tb_mob = '$admin_mobile', tb_updated_date = CURRENT_TIMESTAMP() WHERE user_id= $admin_id";
        
        
        $r3 = mysqli_query($con, $Q3);

        if ($r3) {
            echo "success";
        } else {
            echo("Error description: " . mysqli_error($con));
		}
    }

    elseif ($_REQUEST['mode'] == "AdminChangePassword") {

        $admin_id = $_GET['admin_id'];
        $admin_pass_new=$_GET['admin_pass_new'];
         /* md5 Conversion */
        $md5_password=md5($admin_pass_new);

        $Q3 = "UPDATE `tb_admin` SET tb_pwd = '$md5_password', tb_updated_date = CURRENT_TIMESTAMP() WHERE user_id= '$admin_id'";
        
        $r3 = mysqli_query($con, $Q3);

        if ($r3) {
            echo "success";
        } else {
            echo("Error description: " . mysqli_error($con));
        }
    }

    elseif ($_REQUEST['mode'] == "ContactCheck") {

        
        $admin_mobile=$_GET['admin_mobile'];
        
        $Q3 = "SELECT count(*) AS countMobile FROM tb_admin WHERE tb_mob='$admin_mobile'";
        $r3 = mysqli_query($con, $Q3);
        
            $row = mysqli_fetch_array($r3);

            $count = $row['countMobile'];
            if ($count > 0) {
                echo "1";
            } else {
                echo "0";
            }
        
    }

    elseif ($_REQUEST['mode'] == "EmailCheck") {

        
        $admin_email=$_GET['admin_email'];
        
        $Q3 = "SELECT count(*) AS countEmail FROM tb_admin WHERE tb_email='$admin_email'";
        $r3 = mysqli_query($con, $Q3);
        
            $row = mysqli_fetch_array($r3);

            $count = $row['countEmail'];
            if ($count > 0) {
                echo "1";
            } else {
                echo "0";
            }
        
    }

    elseif ($_REQUEST['mode'] == "ContactCheckEdit") {

        
        $admin_edit_mobile=$_GET['admin_edit_mobile'];
        
        $Q3 = "SELECT count(*) AS countMobile FROM tb_admin WHERE tb_mob='$admin_edit_mobile'";
        $r3 = mysqli_query($con, $Q3);
        
            $row = mysqli_fetch_array($r3);

            $count = $row['countMobile'];
            if ($count > 0) {
                echo "1";
            } else {
                echo "0";
            }
        
    }
}