<?php
require_once '../_includes/dbconfig.php';
include('../_includes/nxtconfig.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_POST['edit'])) { 
            
    $b_busid=$_POST["b_edit_busid"];
    $bname=$_POST["b_edit_name"];  
    $b_buname=$_POST["b_edit_buname"]; 
    $b_street=$_POST["b_edit_bstreet"];
    $b_po=$_POST["b_edit_bpo"];
    $b_city=$_POST["b_edit_bcity"];  
    $b_state=$_POST["b_edit_bstate"]; 
    $b_country=$_POST["b_edit_bcountry"];
    $b_location=$_POST["b_edit_gmap"];
    $b_website=$_POST["b_edit_website"];
    $b_holiday=$_POST["b_edit_holi"];
    $b_worktime=$_POST["b_edit_bushrs"];
    $b_phone=$_POST["b_edit_phone"];
    $b_email=$_POST["b_edit_email"];

    $bcoverTNm = $_FILES["b_edit_cover_img"]["tmp_name"];

    $bcoverTNm = trim($bcoverTNm);
    $bcoverTNm = str_replace(' ','-',$bcoverTNm);
 
    $blogoTNm = $_FILES["b_edit_logo"]["tmp_name"];
    
    $blogoTNm = trim($blogoTNm);
    $blogoTNm = str_replace(' ','-',$blogoTNm);
   
    
    if ($blogoTNm != "" && $bcoverTNm !="" ) {
        /* Logo Uploading */ 
        $blogoNm = $_FILES["b_edit_logo"]["name"];

        $blogoNm = trim($blogoNm);
        $blogoNm = str_replace(' ','-',$blogoNm);
        $time = time();
        $blogoNm1 = $time.$blogoNm;
        $path = $GLOBALS['BASE_PATH'].$GLOBALS['LOGO_FOLDER'].$blogoNm1;
        move_uploaded_file($blogoTNm, $path);

        /* Cover Image Uploading */ 
        $bcoverNm = $_FILES["b_edit_cover_img"]["name"];

        $bcoverNm = trim($bcoverNm);
        $bcoverNm = str_replace(' ','-',$bcoverNm);
        $time = time();
        $bcoverNm1 = $time.$bcoverNm;
        $path = $GLOBALS['BASE_PATH'].$GLOBALS['COVER_FOLDER'].$bcoverNm1;
        move_uploaded_file($bcoverTNm, $path);
  
        $Q3 = "UPDATE tb_customers_business SET name= '$bname',cover_image='$bcoverNm1',logo= '$blogoNm1',building_name= '$b_buname',street_name= '$b_street'
        ,po_number= '$b_po',city = '$b_city',state= '$b_state',country= '$b_country',buss_phone='$b_phone',buss_email='$b_email',google_map= '$b_location',website_url= '$b_website',holiday= '$b_holiday',
        working_time= '$b_worktime' WHERE cust_bus_id=$b_busid";
        $r=mysqli_query($con, $Q3);

        if ($r) {
            header("Location: bussiness_profile.php?status=1");
        } else {
            header("Location: bussiness_profile.php?status=0"); 
        } 
    }
    elseif($blogoTNm != "" && $bcoverTNm =="") {
        /* Logo Uploading */ 
        $blogoNm = $_FILES["b_edit_logo"]["name"];

        $blogoNm = trim($blogoNm);
        $blogoNm = str_replace(' ','-',$blogoNm);
        $time = time();
        $blogoNm1 = $time.$blogoNm;
        $path = $GLOBALS['BASE_PATH'].$GLOBALS['LOGO_FOLDER'].$blogoNm1;
        move_uploaded_file($blogoTNm, $path);

        $Q3 = "UPDATE tb_customers_business SET name= '$bname',logo= '$blogoNm1',building_name= '$b_buname',street_name= '$b_street'
        ,po_number= '$b_po',city = '$b_city',state= '$b_state',country= '$b_country',buss_phone='$b_phone',buss_email='$b_email',google_map= '$b_location',website_url= '$b_website',holiday= '$b_holiday',
        working_time= '$b_worktime' WHERE cust_bus_id=$b_busid";
        $r=mysqli_query($con, $Q3);

        if ($r) {
            header("Location: bussiness_profile.php?status=1");
        } else {
            header("Location: bussiness_profile.php?status=0");
        } 
    }
    elseif($blogoTNm == "" && $bcoverTNm !=""){
        /* Cover Image Uploading */ 
        $bcoverNm = $_FILES["b_edit_cover_img"]["name"];

        $bcoverNm = trim($bcoverNm);
        $bcoverNm = str_replace(' ','-',$bcoverNm);
        $time = time();
        $bcoverNm1 = $time.$bcoverNm;
        $path = $GLOBALS['BASE_PATH'].$GLOBALS['COVER_FOLDER'].$bcoverNm1;
        move_uploaded_file($bcoverTNm, $path);

        $Q3 = "UPDATE tb_customers_business SET name= '$bname',cover_image='$bcoverNm1',building_name= '$b_buname',street_name= '$b_street'
        ,po_number= '$b_po',city = '$b_city',state= '$b_state',country= '$b_country',buss_phone='$b_phone',buss_email='$b_email',google_map= '$b_location',website_url= '$b_website',holiday= '$b_holiday',
        working_time= '$b_worktime' WHERE cust_bus_id=$b_busid";
        $r=mysqli_query($con, $Q3);
        if ($r) {
            header("Location: bussiness_profile.php?status=1");
        } else {
            header("Location: bussiness_profile.php?status=0");
        } 
    }
    else
    {
        $Q3 = "UPDATE tb_customers_business SET name= '$bname',building_name= '$b_buname',street_name= '$b_street'
            ,po_number= '$b_po',city = '$b_city',state= '$b_state',country= '$b_country',buss_phone='$b_phone',buss_email='$b_email',google_map= '$b_location',website_url= '$b_website',holiday= '$b_holiday',
            working_time= '$b_worktime' WHERE cust_bus_id=$b_busid";
        $r=mysqli_query($con, $Q3);
        if ($r) {
            header("Location: bussiness_profile.php?status=1");
        } else {
            header("Location: bussiness_profile.php?status=0");
        }
    } 
}
?>
        
            