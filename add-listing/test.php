<?php
require('razorpay-php/Razorpay.php');
require('../_includes/nxtconfig.php');
use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;
 $api = new Api($keyId, $keySecret);
 $payment_id = "pay_Fgla4WEhHMmaHF";
$payment = $api->payment->fetch($payment_id);
echo $payment->amount;

$accountId = "acc_FhEHXGeWgVI482";
$transfers = $api->payment->fetch($payment_id)->transfers();


?>