
<?php
session_start();
if (!(isset($_SESSION['email_id']) && $_SESSION['email_id'] != '')) {
header ("Location: sign-in.php");
}
if(isset($_SESSION['email_id'])){
    if((time() - $_SESSION['last_login_timestamp'])>1800){        
        header ("Location:logout.php");
    }else{
        $_SESSION['last_login_timestamp']=time();
    } 
}
$session_id = $_SESSION['id'];
?>

<!doctype html>
<html class="no-js " lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="">
    <title>:: BCSOFT :: Trade Brochure</title>
    <link rel="icon" type="image/png" sizes="72x72" href="favicon.png">
    <link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css" />
    <link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css" />
    <link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css" />
    <link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
    <link rel="stylesheet" href="assets/plugins/fullcalendar/fullcalendar.min.css">
    <link rel="stylesheet" href="assets/plugins/bootstrap-select/css/bootstrap-select.css" />
    <!-- Custom Css -->
    <link rel="stylesheet" href="assets/css/style.min.css">
    <link rel="stylesheet" href="assets/css/custom.css">
</head>

<body class="theme-blush">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div id="divLoader" class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="24NXT"></div>
            <p>Please wait...</p>
        </div>
    </div>