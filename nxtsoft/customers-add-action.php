 <?php
               
                include('../_includes/dbconfig.php');
                include('../_includes/nxtconfig.php');
                $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<?php   

                 //Turn autocommit off
				mysqli_autocommit($con,FALSE);

                //Customer Table Data
                $cname = $_POST["cname"];
                $cemail = $_POST["cemail"];
                $country_code = $_POST["country_code"];
                $cphone = $_POST["cphone"];
                $cplan = $_POST["package"];
                $busines_coun =$_POST["bus_con"];

                $cphone = trim($cphone);
                $cphone = str_replace(' ','',$cphone);

                //md5 conversion of phone number for initial password
                $md5_pass_phone=md5($cphone);
               
                
                $query="SELECT id FROM tb_customers WHERE sno = (SELECT max(sno) FROM tb_customers);";
                $r = mysqli_query($con, $query);
                $c = mysqli_num_rows($r);
                if (mysqli_num_rows($r) > 0)
                {
                    $row = mysqli_fetch_array($r);
                    $id = $row['id']; 
                } 
                else
                {
                    $id="CUST-1000"; 
                }
                $i=explode("-",$id);
                $num=(int)$i[1];
                $num++;
                $cust_id=$i[0]."-".$num."";
                //Customer Table Data Ends

                //Customer- Business Table Data 
               $category = $_POST["cat"];
                $bname = $_POST["bname"];
                $slug = $bname;
                $blogoTNm = $_FILES["blogo"]["tmp_name"];
                $blogoNm = $_FILES["blogo"]["name"];
                $cover_imgTNm = $_FILES["cover_img"]["tmp_name"];
                $cover_imgNm = $_FILES["cover_img"]["name"];
                $buname = $_POST["buname"];
                $bstreet = $_POST["bstreet"];
                $bpo = $_POST["bpo"];
                $bcity = $_POST["bcity"];
                $bstate = $_POST["bstate"];
                $bcountry = $_POST["bcountry"];
                $gmap = $_POST["gmap"];
                $cwebsite = $_POST["cwebsite"];
                $busholi = $_POST["busholi"];
                $bushrs = $_POST["bushrs"];

                $blogoNm = trim($blogoNm);
                $blogoNm = str_replace(' ','-',$blogoNm);
                $blogoTNm = trim($blogoTNm);
                $blogoTNm = str_replace(' ','-',$blogoTNm);
                $time = time();
                $blogoNm = $time.$blogoNm;
                $path = $GLOBALS['BASE_PATH'].$GLOBALS['LOGO_FOLDER'].$blogoNm;
                move_uploaded_file($blogoTNm,$path);

                $cover_imgNm = trim($cover_imgNm);
                $cover_imgNm = str_replace(' ','-',$cover_imgNm);
                $cover_imgTNm = trim($cover_imgTNm);
                $cover_imgTNm = str_replace(' ','-',$cover_imgTNm);
                $time = time();
                $cover_imgNm = $time.$cover_imgNm;
                $path = $GLOBALS['BASE_PATH'].$GLOBALS['COVER_FOLDER'].$cover_imgNm;
                move_uploaded_file($cover_imgTNm,$path);


$slug = str_replace( array( '\'', '"' , ',' , ';' , '<', '>',':','.','@','#','$','%','^','&','*',' ' ), '-', $slug); 
                $slug=strtolower($slug);
                $slug = trim($slug);

                //check slug already exist
                 $query="SELECT max(slug) as slug_exist FROM tb_customers_business WHERE slug LIKE '$slug%'";
                 echo $query;
                 $r = mysqli_query($con, $query);
                 if($row = mysqli_fetch_array($r))
                 {
                    
                   $slug_exist =$row["slug_exist"];
                    if($slug_exist)
                    {

                     $i=explode("_",$slug_exist);
                     $num=(int)$i[1];
                     $num++;
                     $slug=$slug."_".$num."";
                    }

                 }
                 //change google map height and width
                 $gmap = str_replace('width="600" height="450"','width="100%" height="280"',$gmap);

                //Customer- Business Table Data Ends

                 //customer-product Data
                $pname = $_POST["pname"];
                $pslug = $pname;
                $pcategory = $_POST["pcategory"];
                $brname = $_POST["brname"];
                $pimgTNm = $_FILES["pimage"]["tmp_name"];
                $pimgNm = $_FILES["pimage"]["name"];
                $prdesc = $_POST["prdesc"];
                $prprice = $_POST["prprice"];
                $prkeywd = $_POST["pkeywd"];

                $pimgNm = trim($pimgNm);
                $pimgNm = str_replace(' ','-',$pimgNm);
                $pimgTNm = trim($pimgTNm);
                $pimgTNm = str_replace(' ','-',$pimgTNm);
                $time = time();
                $pimgNm = $time.$pimgNm;
                $path = $GLOBALS['BASE_PATH'].$GLOBALS['PROD_FOLDER'].$pimgNm;
                move_uploaded_file($pimgTNm,$path);
                //customer-product Data Ends

                //product slug 
                $pslug = str_replace( array( '\'', '"' , ',' , ';' , '<', '>',':','.','@','#','$','%','^','&','*',' ' ), '-', $pslug); 
                $pslug=strtolower($pslug);
                $pslug = trim($pslug);

                //Table insertion starts
               	$q1 = "INSERT INTO tb_customers(id,name,email_id,password,phone_country,phone_no,business_counselor) VALUES ('$cust_id','$cname','$cemail','$md5_pass_phone','$country_code','$cphone','$busines_coun')";
               
               		$r1 = mysqli_query($con, $q1);

                

               	$q2 = "INSERT INTO tb_customers_business(customer_id,category_id,name,cover_image,logo,building_name,street_name,po_number,city,state,country,google_map,website_url,holiday,working_time,slug) VALUES ('$cust_id',$category,'$bname','$cover_imgNm','$blogoNm','$buname','$bstreet','$bpo','$bcity','$bstate','$bcountry','$gmap','$cwebsite','$busholi','$bushrs','$slug')";
                 
                 	$r2 = mysqli_query($con, $q2);
               

                $sel_q = "SELECT max(cust_bus_id) as `sno` from tb_customers_business where customer_id = '$cust_id'";
                $r=mysqli_query($con, $sel_q);
                $row = mysqli_fetch_array($r);
                $cust_bus_id =  $row['sno']; 

              	$q3 = "INSERT INTO tb_customers_products(cust_bus_id,prod_name,category,brand_name,image,keywords,description,price,slug) VALUES ($cust_bus_id,'$pname','$pcategory','$brname','$pimgNm','$prkeywd','$prdesc','$prprice','$pslug')";
            
            
             	$r3 = mysqli_query($con, $q3); 


                 $q4 = "INSERT INTO tb_customers_plan(cust_bus_id,plan_id,active) VALUES ('$cust_bus_id',$cplan,1)";
                
            
                $r4 = mysqli_query($con, $q4); 


                	if($r1 && $r2 && $r3 && $r4)
                 	{
                 		mysqli_commit($con);
                    header("Location:customers.php?status=1");    
                 		
                 	}

                 	else
                 	{
                 		// Rollback transaction
						        mysqli_rollback($con);
                    
                   header("Location:customers.php?status=0"); 
						
                 	}  

               