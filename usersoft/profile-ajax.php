<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    
    if ($_REQUEST['mode'] == "checkPass") { 
            $cust_id=$_GET['cust_id'];
            $cust_old_pass=$_GET['cust_old_pass'];

            $md5_pass=md5($cust_old_pass);
            
            $Q3 = "SELECT count(password) AS countpass FROM tb_customers WHERE password ='$md5_pass' AND id='$cust_id'";
            $r3 = mysqli_query($con, $Q3);
            
                $row = mysqli_fetch_array($r3);
    
                $count = $row['countpass'];
                if ($count > 0) {
                    echo "1";
                } else {
                    echo "0";
                }
            
        }
    elseif ($_REQUEST['mode'] == "CustChangePassword") { 
            $cust_id=$_GET['cust_id'];
            $cust_pass_new=$_GET['cust_pass_new'];

            $md5_new_pass=md5($cust_pass_new);
            
            $Q3 = "UPDATE tb_customers SET password ='$md5_new_pass', updated_date=CURRENT_TIMESTAMP() WHERE id='$cust_id'";
            $r3 = mysqli_query($con, $Q3);
    
                if ($r3) {
                    echo "1";
                } else {
                    echo "0";
                }
            
        }
}