<!--Include Header-->
            <?php
             include('../_includes/header.php');
             include('../_includes/dbconfig.php');
             $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
             $error_reason = $_POST["error_reason"];
             $cu_id = $_POST["cu_id"];
            
             switch ($error_reason) {
             	case '1':
             		$error_string = "ERROR in Payment Collection.SignatureVerificationError";
             		break;
         		case '2':
         			$error_string = "Payment Success, but error in customer-plan database table updation";
         		break;
         		case '3':
         			$error_string = "Payment Success, table updation success, but error in counselor Amount settlement ";
         		break;
             	case '4':
             		$error_string = "Error in razorpay_payment_id ";
             		break;
             	default:
             		break;
             }

             $q = "INSERT INTO  tb_error_registration(cust_id,error) VALUES ('$cu_id','$error_string')";
                 //echo "<br>".$q4;
            
                $r4 = mysqli_query($con, $q4); 
 			?>
			<section class="sec-padding-4">
				<div class="container">
				  <div class="row">
				    <div class="error_holder">
				      <img src="../_assets/images/status/fail.png" alt="" width="20%">
				      <br><br>
				      <h2 class="uppercase">Profile Registration ERROR !!! </h2>
				      <p>Please Contact Admin !!!</p>
				      <br />
				    </div>
				  </div>
				</div>
			</section>
			<div class="clearfix"></div>
			<!--Include Footer-->
            <?php
                include('../_includes/footer.php');
            ?>              