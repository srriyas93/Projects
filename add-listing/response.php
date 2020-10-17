<?php
require('../_includes/nxtconfig.php');
include('../_includes/dbconfig.php');
include('../_includes/mailsend.php');
require('razorpay-php/Razorpay.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
$api = new Api($keyId, $keySecret);

?>
<body onload="document.frm1.submit()"> 
    
<?php

$success = true;
$mail_res = 1; 
$status = 1;
$error_reason = 0;

$action = "success.php";
$order_id = $_POST["orderid"];
$cu_id = $_POST["cid"];
$pid = $_POST["pid"];
$amt = $_POST["amt"];

$razorpay_order_id = $_POST["razorpay_order_id"];
$razorpay_payment_id = $_POST["razorpay_payment_id"];
$razorpay_signature = $_POST["razorpay_signature"];


$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
   
    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $order_id,
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
       $action = "error-cust-payment.php";
       $error_reason = 1;
        $status = 0;
    }
}

if ($success === true)
{
      $current_dt = date("Y-m-d");
    $q = "UPDATE  `tb_customers_plan` SET `amount`=$amt, `active` = $status,`pay_status`=$status,`payment_id`= '$razorpay_payment_id',`order_id` ='$razorpay_order_id',`signature` ='$razorpay_signature', entry_date = '$current_dt' WHERE `cust_id` = '$cu_id' AND `plan_id`=$pid ";
    $r = mysqli_query($con, $q);
    if (!$r) 
    {
        echo("Error in Updation: " . mysqli_error($con));
        $action = "error-cust-payment.php";
        $error_reason = 2;

    } 
    else 
    {
      //For mail sending
        $query="SELECT email_id,phone_no,business_counselor,trans_no,plan_id,category_id FROM tb_customers,tb_customers_plan,tb_customers_business WHERE  `tb_customers_plan`.`cust_id` =`tb_customers`.`id` AND `tb_customers_business`.`customer_id` =`tb_customers`.`id` AND`tb_customers`.id ='$cu_id'";

        $r = mysqli_query($con, $query);
        if ($row = mysqli_fetch_array($r))
        {
            $email_id = $row['email_id']; 
            $phone_no = $row['phone_no'];
            $bus_counselor = $row['business_counselor'];
            $trans_no = $row['trans_no'];
            $plan = $row['plan_id'];
            $category = $row['category_id'];
        } 
       // $mail_res =1;
       $mail_res = mailsend($email_id,$email_id,$phone_no);
      //mail sending Ends

      //business counselor settlement
        if($bus_counselor != "")
        {
             $b_q ="SELECT email_id,raz_account_id FROM tb_bussiness_counsellors WHERE id ='$bus_counselor'";
          

            $b_r = mysqli_query($con, $b_q);
            if ($b_row = mysqli_fetch_array($b_r))
            {
                $bus_email = $b_row['email_id']; 
                $accountId = $b_row['raz_account_id'];
                
            } 
            //getting commission Amount
            $b_c = "SELECT amount FROM  `tb_bc_comm_setting` WHERE plan_id = $plan AND category = $category ";
            $b_r = mysqli_query($con, $b_c);
            if ($b_row = mysqli_fetch_array($b_r))
            {
                $com_amt = $b_row['amount']; 
                $razor_amt = $com_amt *100;
                
            } 

           //transfer commission Amount
            $transfer = $api->payment->fetch($razorpay_payment_id)->transfer(array(
            'transfers' => [
                [
                'account' => $accountId,
                'amount' => $razor_amt,
                'currency' => 'INR'
              ]
             ]
            )
          );

           //store commission Amount
          if($transfer) 
          {
            $q1 = "INSERT INTO tb_bc_comm_amount(bc_id,trans_no,amount) VALUES ('$bus_counselor',$trans_no,$com_amt)";
                   
            $r1 = mysqli_query($con, $q1);
            if(!$r1)
              {
                 $commission = 0;
                $action = "error-cust-payment.php";
                $error_reason = 3;

              }


          } 
        }
      //business counselor settlement Ends 
    }
}
else
{
    $action = "error-cust-payment.php";
    $status = 0;
    $error_reason = 4;
}

?>
 <form action='<?php echo $action; ?>' name="frm1" method="post">
             <input type="hidden" value='<?php echo $commission; ?>' name="commission">
             <input type="hidden" value='<?php echo $mail_res; ?>' name="mail_res">
             <input type="hidden" value='<?php echo $status; ?>' name="pay_status">
             <input type="hidden" value='<?php echo $error_reason; ?>' name="error_reason">
              <input type="hidden" value='<?php echo $cu_id; ?>' name="cu_id">
  </form>
</body>
   



