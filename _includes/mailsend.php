<?PHP
function mailsend($to,$auname,$aupwd)
{

//$to      = "vimal@24nxt.com"; // Send email to our user
$subject = "Tradebrochure | Welcome | Mail"; // Give the email a subject 
$message = '
 
Thanks for signing up!
Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below.
 
------------------------
Username: '.$auname.'
Password: '.$aupwd.'
------------------------';
 
 // Our message above including the link

$headers = "From: ectradebiznet@gmail.com\r\n";

if(mail($to, $subject, $message, $headers))
{
	return 1;
	
} 
else
	return 0;

}
function otp_mailsend($to,$otp)
{


$subject = "Tradebrochure | OTP Verification "; // Give the email a subject 
$message = '
 
Your OTP for registering Tradebrochure is '.$otp.'';
 
 // Our message above including the link

$headers = "From: ectradebiznet@gmail.com\r\n";

if(mail($to, $subject, $message, $headers))
{
	return 1;
	
} 
else
	return 0;

}
?>