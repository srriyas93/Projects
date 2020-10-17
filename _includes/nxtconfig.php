<?php
//ONLINE
/*$GLOBALS['BASE_URL'] = 'https://tradebrochure.com/';
$GLOBALS['BASE_PATH'] = '/var/www/vhosts/tradebrochure.com/httpdocs/';  */

//local
$GLOBALS['BASE_URL'] = 'http://localhost/projects/tradebrochure/';
$GLOBALS['BASE_PATH'] = 'C:/xampp/htdocs/projects/tradebrochure/';

$GLOBALS['COVER_FOLDER'] = '_uploads/cover/';
$GLOBALS['LOGO_FOLDER'] = '_uploads/logos/';
$GLOBALS['PROD_FOLDER'] = '_uploads/products/';

//Razorpay TEST Details
$keyId = 'rzp_test_II9DJCFzOS6c4U';
$keySecret = 'EaBsjAazwwJbPvvvavpnINY4';
$displayCurrency = 'INR'; 

//Razorpay LIVE Details
/*$keyId = 'rzp_live_pFs457yB0880KW';
$keySecret = 'JkYHw9skCCTCWH1IeYNe6kjR';
$displayCurrency = 'INR';*/

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>