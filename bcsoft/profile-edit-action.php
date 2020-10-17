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
      
       
        $q="UPDATE tb_bussiness_counsellors SET name='$b_name',phone_no='$b_phone',aadhar_num='$b_aadhar',bank_acc_num='$b_acc_num',bank_name='$b_bankname',ifsc_code='$b_ifsc',updated_date=CURRENT_TIMESTAMP() WHERE id='$b_id'";
        $r=mysqli_query($con, $q);

        if ($r) {
            header("Location:profile-edit.php?edit=1");
        } else {
            header("Location:profile-edit.php?edit=0");
        }
    }