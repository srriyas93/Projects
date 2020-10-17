<?PHP

function deploysmsrequest($mob,$message)
{
	$username		= "ec_trade"; //use your sms api username
	$pass    		= "justin@2020";  //enter your password

	$dest_mobileno  = $mob;	//reciever 10 digit number (use comma (,)
	//$dest_mobileno = 7012066861;
	$sms 			= $message;	//sms content
	$senderid   	= "KAPMSG";	//use your sms api sender id

	$sms_url = sprintf("http://www.smsjust.com/sms/user/urlsms.php?username=".$username."&pass=".$pass."&senderid=".$senderid."&dest_mobileno=".$dest_mobileno."&message=".$sms."&response=Y");
	
	//echo $sms_url;
	
	// SEND SMS
	openurl($sms_url);
}

function openurl($url) 
{
	$postvars = '';
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,$url);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch,CURLOPT_POSTFIELDS,$postvars);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); curl_setopt($ch,CURLOPT_TIMEOUT, '3');  $content = trim(curl_exec($ch));  curl_close($ch); 
	
	//echo "success";
}

?>