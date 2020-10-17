<?php
 include('../_includes/smshandler.php');
 include('../_includes/otpgenerator.php');
	if(isset($_GET['mode']))
	{
		if($_GET['mode'] == "resendOTP")
		{
			$phone = $_GET['phone'];
			$no_digits = 4; //no of digits in OTP
            $message = generateNumericOTP($no_digits);
            deploysmsrequest($phone,$message);
            //echo $message;


		}
	}

?>