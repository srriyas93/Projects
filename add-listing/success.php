<!--Include Header-->
            <?php
             include('../_includes/header.php');
               	$commission = $_POST["commission"];
                $mail_res = $_POST["mail_res"];
 			?>
			<section class="sec-padding-4">
				<div class="container">
				  <div class="row">
				    <div class="error_holder">
				      <img src="../_assets/images/status/success.png" alt="" width="20%">
				      <br><br>
				      <h2 class="uppercase">Your profile has been created successfully! </h2>
				      <?php
		               if($mail_res)
		               {
		               ?>
				      <p>Kindly check your registered E-mail for more details</p>
				      <p><b>Don't Forget to Check Your Spam/Junk Email Folder!</b></p>
					  <?php
		              }
		              else
		              {
		              ?>
		              <p>Error in  E-mail Sending!!</p>
		              <?php
		              }
		              ?>
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