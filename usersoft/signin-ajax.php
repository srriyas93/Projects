<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] == "Login") {
        $username = $_GET['username'];
        $password= $_GET['password'];
        //$username=mysqli_bind_param($_POST['username']);
        //$password=$_POST['password'];
        $md5_password=md5($password);
          
        $q = "SELECT count(*) as cntUser,id,name FROM `tb_customers` WHERE `email_id` = '$username' AND password='$md5_password'";
        $result = mysqli_query($con, $q);
       
        if (mysqli_num_rows($result)>0) {
            $row = mysqli_fetch_array($result);  //Fetching the result
            
            $count = $row['cntUser'];

            if ($count > 0) {
               
                    session_start();
                    $_SESSION['email_id'] = $username;
                    $_SESSION['name'] = $row['name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['last_login_timestamp']=time();
                    echo "1";             
            } else {
                    echo "0";
            }
        }
    }
}
