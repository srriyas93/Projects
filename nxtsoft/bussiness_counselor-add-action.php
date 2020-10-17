<?php
               
               include('../_includes/dbconfig.php');
               include('../_includes/nxtconfig.php');
               $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<?php   

                //Turn autocommit off
               mysqli_autocommit($con,FALSE);

               //Customer Table Data
               $bname = $_POST["bname"];
               $bemail = $_POST["bemail"];
               $bphone = $_POST["bphone"];
               $baadhar = $_POST["baadhar"];
               $bacc_num =$_POST["bacc_num"];
               $bbankname =$_POST["bbankname"];
               $bifsc =$_POST["bifsc"];
               $status=0;

               $bphone = trim($bphone);
               $bphone = str_replace(' ','',$bphone);

               //md5 conversion of phone number for initial password
               $md5_pass_phone=md5($bphone);
              
               
               $query="SELECT id FROM tb_bussiness_counsellors WHERE sno = (SELECT max(sno) FROM tb_bussiness_counsellors);";
               $r = mysqli_query($con, $query);
               $c = mysqli_num_rows($r);
               if (mysqli_num_rows($r) > 0)
               {
                   $row = mysqli_fetch_array($r);
                   $id = $row['id']; 
               } 
               else
               {
                   $id="BC-1000"; 
               }
               $i=explode("-",$id);
               $num=(int)$i[1];
               $num++;
               $bc_id=$i[0]."-".$num."";
               //BC Table Data Ends

               //Table insertion starts
               $q1 = "INSERT INTO tb_bussiness_counsellors(id,name,email_id,bc_pwd,phone_no,aadhar_num,bank_acc_num,bank_name,ifsc_code,status) VALUES ('$bc_id','$bname','$bemail','$md5_pass_phone','$bphone','$baadhar','$bacc_num','$bbankname','$bifsc',$status)";
               
               $r1 = mysqli_query($con, $q1);

               if($r1)
                 	{
                 		mysqli_commit($con);
                    header("Location:bussiness_counsellor.php?status=1");    
                 		
                 	}

                 	else
                 	{
                 		// Rollback transaction
						        mysqli_rollback($con);
                    
                   header("Location:bussiness_counsellor.php?status=0"); 
						
                 	}  