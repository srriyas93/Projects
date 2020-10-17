<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    
    if ($_REQUEST['mode'] == "checkPass") { 
            $b_id=$_GET['b_id'];
            $b_old_pass=$_GET['b_old_pass'];

            $md5_pass=md5($b_old_pass);
            
            $Q3 = "SELECT count(bc_pwd) AS countpass FROM tb_bussiness_counsellors WHERE bc_pwd ='$md5_pass' AND id='$b_id'";
            $r3 = mysqli_query($con, $Q3);
            
                $row = mysqli_fetch_array($r3);
    
                $count = $row['countpass'];
                if ($count > 0) {
                    echo "1";
                } else {
                    echo "0";
                }
            
        }
    elseif ($_REQUEST['mode'] == "BcChangePassword") { 
            $bc_id=$_GET['bc_id'];
            $b_pass_new=$_GET['b_pass_new'];

            $md5_new_pass=md5($b_pass_new);
            
            $Q3 = "UPDATE tb_bussiness_counsellors SET bc_pwd ='$md5_new_pass', updated_date=CURRENT_TIMESTAMP() WHERE id='$bc_id'";
            $r3 = mysqli_query($con, $Q3);
    
                if ($r3) {
                    echo "1";
                } else {
                    echo "0";
                }
            
        }
}
