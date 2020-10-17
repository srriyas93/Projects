<?php
               
    include('../_includes/dbconfig.php');
    include('../_includes/nxtconfig.php');
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');


    if (isset($_POST['edit'])) {
        $b_id=$_POST['b_edit_id'];
        $b_name=$_POST['b_edit_name'];
        $b_email=$_POST['b_edit_email'];
        $b_phone=$_POST['b_edit_phone'];
        $b_aadhar=$_POST['b_edit_aadhar'];
        $b_acc_num=$_POST['b_edit_acc_num'];
        $b_bankname=$_POST['b_edit_bankname'];
        $b_ifsc=$_POST['b_edit_ifsc'];
        $b_raz_id=$_POST['b_edit_raz_id'];
        $status=1;
        
        if ($b_raz_id != "") {
            $q="UPDATE tb_bussiness_counsellors SET name='$b_name',phone_no='$b_phone',raz_account_id='$b_raz_id',aadhar_num='$b_aadhar',bank_acc_num='$b_acc_num',bank_name='$b_bankname',ifsc_code='$b_ifsc',status=$status,updated_date=CURRENT_TIMESTAMP() WHERE id='$b_id'";
        }else{
            $q="UPDATE tb_bussiness_counsellors SET name='$b_name',phone_no='$b_phone',aadhar_num='$b_aadhar',bank_acc_num='$b_acc_num',bank_name='$b_bankname',ifsc_code='$b_ifsc',updated_date=CURRENT_TIMESTAMP() WHERE id='$b_id'"; 
        }
        $r=mysqli_query($con, $q);

        if ($r) {
            header("Location:bussiness_counsellor.php?edit=1");
        } else {
            header("Location:bussiness_counsellor.php?edit=0");
        }
    }