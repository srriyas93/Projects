 			<!--Include Header-->
            <?php
                include('../_includes/header.php');
                include('../_includes/dbconfig.php');
                include('../_includes/nxtconfig.php');
                $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
            ?>

        <body onload="document.frm1.submit()">  

				<?php   

                 //Turn autocommit off
				mysqli_autocommit($con,FALSE);

                //Customer Table Data
                $cname = $_POST["cname"];
                $cemail = $_POST["cemail"];
                $country_code = $_POST["country_code"];
                $cphone = $_POST["cphone"];
                $cplan = $_POST["plan"];
                $busines_coun =$_POST["bus_con"];

                
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
               $category = $_POST["radio"];
                $bname = $_POST["bname"];
                $slug = $bname;
                $blogoTNm = $_FILES["blogo"]["tmp_name"];
                $blogoNm = $_FILES["blogo"]["name"];
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

                

$slug = str_replace( array( '\'', '"' , ',' , ';' , '<', '>',':','.','@','#','$','%','^','&','*',' ' ), '-', $slug); 
                $slug=strtolower($slug);
                $slug = trim($slug);

                //check slug already exist
                 $query="SELECT max(slug) as slug_exist FROM tb_customers_business WHERE slug LIKE '$slug%'";
                 $r = mysqli_query($con, $query);
                 if($row = mysqli_fetch_array($r))
                 {
                    if($slug_exist)
                    {
                     $slug_exist =$row["slug_exist"];
                     $i=explode("_",$slug_exist);
                     $num=(int)$i[1];
                     $num++;
                     $slug=$slug."_".$num."";
                    }

                 }


                //Customer- Business Table Data Ends

                 //customer-product Data
                $pname = $_POST["pname"];
                $pslug = $pname;
                $pcategory = $_POST["pcategory"];
                $brname = $_POST["brname"];
                $prkeyword = $_POST["prkeyword"];
                $pimgTNm = $_FILES["pimage"]["tmp_name"];
                $pimgNm = $_FILES["pimage"]["name"];
                $prdesc = $_POST["prdesc"];
                $prprice = $_POST["prprice"];

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
               	$q1 = "INSERT INTO tb_customers(id,name,email_id,phone_country,phone_no,business_counselor) VALUES ('$cust_id','$cname','$cemail', '$country_code','$cphone','$busines_coun')";
               
               		$r1 = mysqli_query($con, $q1);

                

               	$q2 = "INSERT INTO tb_customers_business(customer_id,category_id,name,logo,building_name,street_name,po_number,city,state,country,google_map,website_url,holiday,working_time,slug) VALUES ('$cust_id',$category,'$bname','$blogoNm','$buname','$bstreet','$bpo','$bcity','$bstate','$bcountry','$gmap','$cwebsite','$busholi','$bushrs','$slug')";
                 
                 	$r2 = mysqli_query($con, $q2);
               

                $sel_q = "SELECT max(cust_bus_id) as `sno` from tb_customers_business where customer_id = '$cust_id'";
                $r=mysqli_query($con, $sel_q);
                $row = mysqli_fetch_array($r);
                $cust_bus_id =  $row['sno']; 

              	$q3 = "INSERT INTO tb_customers_products(cust_bus_id,prod_name,category,brand_name,image,keywords,description,price,slug) VALUES ($cust_bus_id,'$pname','$pcategory','$brname','$pimgNm','$prkeyword','$prdesc','$prprice','$pslug')";
              //  echo $q3;
            
             	$r3 = mysqli_query($con, $q3); 


                 $q4 = "INSERT INTO tb_customers_plan(cust_bus_id,plan_id) VALUES ('$cust_bus_id',$cplan)";
                 //echo "<br>".$q4;
            
                $r4 = mysqli_query($con, $q4); 


                	if($r1 && $r2 && $r3 && $r4)
                 	{
                 		mysqli_commit($con);

                        if($cplan == 1)
                        $action = "verify-otp.php";
                    else
                        $action = "package-verify.php";
                 		
                 	}

                 	else
                 	{
                 		// Rollback transaction
						mysqli_rollback($con);
                        $action = "error-cust-insert.php";
						
                 	}  

                 	

                ?>
                 <form action='<?php echo $action; ?>' name="frm1" method="post">
                     <input type="hidden" value='<?php echo $cphone; ?>' name="cphone">
                     <input type="hidden" value='<?php echo $cemail; ?>' name="cemail">
                     <input type="hidden" value='<?php echo $cname; ?>' name="cname">
                    <input type="hidden" value='<?php echo $cust_id; ?>' name="cid">
                    <input type="hidden" value='<?php echo $cplan; ?>' name="cplan">
              	</form>
</body>
                
                 <?php
                include('../_includes/footer.php');
            ?>

                