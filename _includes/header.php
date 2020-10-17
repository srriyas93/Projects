<?php
    include('nxtconfig.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Trade Brochure | Business Network</title>
    <meta name="keywords" content="" />
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Mobile view -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../_assets/images/fav-icon.ico">
    <link rel="stylesheet" type="text/css" href="../_assets/js/bootstrap/bootstrap.min.css">
    <!-- Google fonts  -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yesteryear" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Template's stylesheets -->
    <link rel="stylesheet" href="../_assets/js/megamenu/stylesheets/screen.css">
    <link rel="stylesheet" href="../_assets/css/theme-default.css" type="text/css">
    <link rel="stylesheet" href="../_assets/js/loaders/stylesheets/screen.css">
    <link rel="stylesheet" href="../_assets/css/corporate.css" type="text/css">
    <link rel="stylesheet" href="../_assets/css/shortcodes.css" type="text/css">
    <link rel="stylesheet" href="../_assets/css/shop.css" type="text/css">
    <link rel="stylesheet" href="../_assets/fonts/font-awesome/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="../_assets/fonts/Simple-Line-Icons-Webfont/simple-line-icons.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="../_assets/fonts/et-line-font/et-line-font.css">
    <link rel="stylesheet" href="../_assets/js/tabs/css/responsive-tabs.css" type="text/css" media="all" />
    <link rel="stylesheet" href="../_assets/fonts/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="../_assets/js/file-upload/fileinput.css" type="text/css" />
    <!-- Template's stylesheets END -->
    <!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->
    <!-- Style Customizer's stylesheets -->
    <link rel="stylesheet/less" type="text/css" href="../_assets/less/skin.less">
    <!-- Style Customizer's stylesheets END -->
    <!-- Skin stylesheet -->
    <link rel="stylesheet/less" type="text/css" href="../_assets/css/custom.css">
</head>

<body style="overflow-x: hidden;">
    <div class="over-loader loader-live">
        <div class="loader">
            <div class="loader-item style5">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
            </div>
        </div>
    </div>
    <!--end loading-->
    <div class="wrapper-boxed">
        <div class="site-wrapper">
            <!--top topbar-->
            <div class="topbar white topbar-padding">
                <div class="container">
                    <div class="topbar-left-items">
                      <ul class="toplist toppadding pull-left paddtop1 row">
                          <li class="rightl">Customer Care</li>
                          <li>(+91) 7902380800</li>
                      </ul>
                    </div>
                    <div class="topbar-middle-logo">
                      <ul class="toplist toppadding pull-left paddtop1 row">
                          <li>
                            <a class="btn btn-border btn-border-1x btn-round white uppercase" style="padding:6px;margin-top:6px;" href="<?php echo $GLOBALS['BASE_URL']; ?>packages"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size:22px;"></i><span style="vertical-align: top;"> List Your Business - FREE </span></a>
                          </li>
                        </ul>
                    </div>
                    <div class="topbar-right-items pull-right row">
                        <ul class="toplist toppadding">
                            <li class="lineright"><a href="<?php echo $GLOBALS['BASE_URL']; ?>usersoft/sign-in.php" target="_blank">Login</a></li>
                            <li class="lineright"><a href="<?php echo $GLOBALS['BASE_URL']; ?>packages">Register</a></li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li class="last"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!--main menu-->
            <div class="col-md-12 nopadding bordertopbottom">
                <div class="header-section white dark-dropdowns style1 links-dark pin-style">
                    <div class="container">
                        <div class="mod-menu">
                            <div class="row">
                                <div class="col-sm-3"> <a href="<?php echo $GLOBALS['BASE_URL']; ?>" title="" class="logo style-2 mar-1"> <img src="<?php echo $GLOBALS['BASE_URL']; ?>_assets/images/logo/logo.jpg" alt=""> </a> </div>
                                <div class="col-sm-9">
                                    <div class="main-nav">
                                        <ul class="nav navbar-nav top-nav">
                                             <li class="visible-xs menu-icon"> <a href="javascript:void(0)" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#menu" aria-expanded="false"> <i aria-hidden="true" class="fa fa-bars"></i> </a> </li>
                                        </ul>
                                        <div id="menu" class="collapse">
                                            <ul class="nav navbar-nav">
                                                <li id="menu-home"><a href="<?php echo $GLOBALS['BASE_URL']; ?>home">Home</a></li>
                                                <li id="menu-about"><a href="<?php echo $GLOBALS['BASE_URL']; ?>about">About us</a></li>
                                                <li id="menu-packages"><a href="<?php echo $GLOBALS['BASE_URL']; ?>packages">Packages</a></li>
                                                <li id="menu-business-support"><a href="#">Business Support</a></li>
                                                <li id="menu-contact"><a href="<?php echo $GLOBALS['BASE_URL']; ?>contact">Contact us</a></li>
                                                <li><a href="<?php echo $GLOBALS['BASE_URL']; ?>bcsoft" target="_blank">Counsellor Login</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end menu-->
            </div>
            <div class="clearfix"></div>