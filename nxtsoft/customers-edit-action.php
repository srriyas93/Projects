<?php
               
    include('../_includes/dbconfig.php');
    include('../_includes/nxtconfig.php');
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');


    if (isset($_POST['edit_detail'])) {
        $cust_id=$_POST['cust_edit_id'];
        $cust_name=$_POST['cust_edit_name'];

        $q="UPDATE tb_customers SET name='$cust_name', updated_date=CURRENT_TIMESTAMP() WHERE id='$cust_id'";
        $r=mysqli_query($con, $q);

        if ($r) {
            header("Location:customers.php?editdet=1");
        } else {
            header("Location:customers.php?editdet=0");
        }
    }

