<?php
require_once '../_includes/dbconfig.php';
require_once '../_includes/nxtconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if(isset($_POST['submit'])){
    $prod_add_id=$_POST["prod_add_id"];
    $prod_add_cat=$_POST["prod_add_cat"];
    $prod_add_name=$_POST["prod_add_name"];
    $prod_add_brand_name=$_POST["prod_add_brand_name"];
    $prod_add_description=$_POST["prod_add_description"]; 
    $prod_add_keywords=$_POST["prod_add_keywords"];
    $prod_add_price=$_POST["prod_add_price"];

    /* Main Image Uploading */
    $prodimageTNm = $_FILES["prod_add_image"]["tmp_name"];

    $prodimageNm = $_FILES["prod_add_image"]["name"];
    $time = time();
    $prodimageNm1 = $time.$prodimageNm;
    $path = $GLOBALS['BASE_PATH'].$GLOBALS['PROD_FOLDER'].$prodimageNm1;
    move_uploaded_file($prodimageTNm, $path);


    $Q3 = "INSERT into tb_customers_products(cust_bus_id,prod_name,category,brand_name,image,description,keywords,price) VALUES($prod_add_id,'$prod_add_name','$prod_add_cat','$prod_add_brand_name','$prodimageNm1','$prod_add_description','$prod_add_keywords','$prod_add_price')";
    $r3 = mysqli_query($con, $Q3);

    /* Retieving the cust_prod_id Value */
    $Q4 = "SELECT cust_prod_id FROM tb_customers_products WHERE cust_prod_id=(SELECT max(cust_prod_id) FROM tb_customers_products)";
    $r4 = mysqli_query($con, $Q4);

            $row = mysqli_fetch_array($r4);  //Fetching the result
            
            $cust_prod_id = $row['cust_prod_id'];


    /* Optional Images-2 Uploading */
  
    $prodimageTNm2 = $_FILES["prod_add_image2"]["tmp_name"];
    $prodimageNm2 = $_FILES["prod_add_image2"]["name"];
    $time = time();
    $prodimageNm21 = $time.$prodimageNm2;
    $path1 = $GLOBALS['BASE_PATH'].$GLOBALS['PROD_FOLDER'].$prodimageNm21;
    move_uploaded_file($prodimageTNm2, $path1);

     /* Optional Images-3 Uploading */

    $prodimageTNm3 = $_FILES["prod_add_image3"]["tmp_name"];
    $prodimageNm3 = $_FILES["prod_add_image3"]["name"];
    $time = time();
    $prodimageNm31 = $time.$prodimageNm3;
    $path2 = $GLOBALS['BASE_PATH'].$GLOBALS['PROD_FOLDER'].$prodimageNm31;
    move_uploaded_file($prodimageTNm3, $path2);

    $Q5 = "INSERT into tb_customers_products_image(cust_prod_id,image) VALUES($cust_prod_id,'$prodimageNm2')";
    $r5 = mysqli_query($con, $Q5);

    $Q6 = "INSERT into tb_customers_products_image(cust_prod_id,image) VALUES($cust_prod_id,'$prodimageNm3')";
    $r6 = mysqli_query($con, $Q6);

        if ($r3||$r5||$r6) {
            header("Location:products.php?status=1");
        } else {
            header("Location:products.php?status=2");
        }
    
}

if (isset($_POST['edit'])) 
{ 

    $status =1;  
    $cust_bus_id=$_POST["cust_bus_id"];          
    $prod_sno=$_POST["prod_sno"];
    $prod_name=$_POST["prod_name"]; 
    $prod_brand_name=$_POST["prod_brand_name"]; 
    $prod_description=$_POST["prod_description"];
    $prod_keywords=$_POST["prod_keywords"];
    $prod_price=$_POST["prod_price"];

    $prodimageTNm = $_FILES["prod_image"]["tmp_name"];
    $prodimageTNm2 = $_FILES["prod_image2"]["tmp_name"];
    $prodimageTNm3 = $_FILES["prod_image3"]["tmp_name"];


    $exist_image2=$_POST["exist_image2"];
    $exist_image3=$_POST["exist_image3"];

    if ($prodimageTNm != "")
    {
        $prodimageNm = $_FILES["prod_image"]["name"];
        $prodimageNm = trim($prodimageNm);
        $prodimageNm = str_replace(' ','-',$prodimageNm);
        $prodimageTNm = trim($prodimageTNm);
        $prodimageTNm = str_replace(' ','-',$prodimageTNm);
        $time = time();
        $prodimageNm1 = $time.$prodimageNm;
        $path = $GLOBALS['BASE_PATH'].$GLOBALS['PROD_FOLDER'].$prodimageNm1;
        move_uploaded_file($prodimageTNm, $path);

        $Q1 = "UPDATE `tb_customers_products` SET prod_name='$prod_name',`brand_name`='$prod_brand_name', image='$prodimageNm1',description='$prod_description',keywords='$prod_keywords',price='$prod_price' ,updated_date=CURRENT_TIMESTAMP() WHERE cust_prod_id=$prod_sno";
        $r1 = mysqli_query($con, $Q1);

        if (!$r1)
        {
           $status =0;
        }
    }
    else
    {
        $Q1 = "UPDATE `tb_customers_products` SET prod_name='$prod_name',`brand_name`='$prod_brand_name',description='$prod_description',keywords='$prod_keywords', price='$prod_price' ,updated_date=CURRENT_TIMESTAMP() WHERE cust_prod_id=$prod_sno";
        $r1 = mysqli_query($con, $Q1);

        if (!$r1)
        {
           $status =0;
        }
    }
    //checking Second Image
    if ($prodimageTNm2 != "")
    {
        $prodimageNm2 = $_FILES["prod_image2"]["name"];
        $prodimageNm2 = trim($prodimageNm2);
        $prodimageNm2 = str_replace(' ','-',$prodimageNm2);
        $prodimageTNm2 = trim($prodimageTNm2);
        $prodimageTNm2 = str_replace(' ','-',$prodimageTNm2);
        $time = time();
        $prodimageNm2 = $time.$prodimageNm2;
        $path = $GLOBALS['BASE_PATH'].$GLOBALS['PROD_FOLDER'].$prodimageNm2;
        move_uploaded_file($prodimageTNm2, $path);

        if($exist_image2)
        {
            $Q2 = "UPDATE tb_customers_products_image SET image='$prodimageNm2' where image_id = $exist_image2";
             $r2 = mysqli_query($con, $Q2);

            if (!$r2)
            {
              $status =0;
            }

        }
        else
        {
            $Q2 = "INSERT into tb_customers_products_image(cust_prod_id,image) VALUES($prod_sno,'$prodimageNm2')";
             $r2 = mysqli_query($con, $Q2);

            if (!$r2)
            {
              $status =0;
            }
        }
    }
     //checking Third Image
    if ($prodimageTNm3 != "")
    {
        $prodimageNm3 = $_FILES["prod_image3"]["name"];
        $prodimageNm3 = trim($prodimageNm3);
        $prodimageNm3 = str_replace(' ','-',$prodimageNm3);
        $prodimageTNm3 = trim($prodimageTNm3);
        $prodimageTNm3 = str_replace(' ','-',$prodimageTNm3);
        $time = time();
        $prodimageNm3 = $time.$prodimageNm3;
        $path = $GLOBALS['BASE_PATH'].$GLOBALS['PROD_FOLDER'].$prodimageNm3;
        move_uploaded_file($prodimageTNm3, $path);

         if($exist_image3)
         {
            $Q3 = "UPDATE tb_customers_products_image SET image='$prodimageNm3' where image_id = $exist_image3";
             $r3 = mysqli_query($con, $Q3);

            if (!$r3)
            {
              $status =0;
            }
         }
         else
         {
            $Q3 = "INSERT into tb_customers_products_image(cust_prod_id,image) VALUES($prod_sno,'$prodimageNm3')";
             $r3 = mysqli_query($con, $Q3);

            if (!$r3)
            {
              $status =0;
            }
         }
    }

    header("Location:products.php?updates=".$status."&cust_bus_id=".$cust_bus_id);
       
    
}
