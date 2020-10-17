            <!--Include Header-->
            <?php
                include('../_includes/header.php');
                include('../_includes/nxtconfig.php');
                include('../_includes/smshandler.php');
                include('../_includes/mailsend.php');
                include('../_includes/otpgenerator.php');
             
                $cphone = $_POST["cphone"];
                $cust_id = $_POST["cid"];
                $cemail = $_POST["cemail"];
                $cplan = $_POST["cplan"];
                $to =$cemail; 
                $no_digits = 4; //no of digits in OTP
                $numb = generateNumericOTP($no_digits);
                $message = $numb;
                deploysmsrequest($cphone,$message);
                $mail_res = otp_mailsend($to,$message);
            ?>
            <section class="sec-padding-5">
                <div class="container">
                    <div class="col-md-12 text-center">
                        <h4 class="uppercase">OTP Verification</h4>
                    </div>
                    <div class="clearfix"></div>
                    <br /> 
                    <p style="text-align: center;">The OTP has sent to your registered mobile and E-mail.</p>
                      <p style="text-align: center;"><b>Don't Forget to Check Your Spam/Junk Email Folder!</b></p>
                    <div class="form-body bg-light">
                        <!-- end row -->
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <label class="lable-text" for="phone">OTP</label>
                                <input id="otpEnt" class="input-1" type="text" placeholder="Enter OTP" name="otpEnt">
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <br />
                            <div class="col-md-3"></div>
                            <div class="col-md-6 text-center">
                                <a class="btn btn-primary btn-medium uppercase" href="javascript:void(0);" onClick="otpVerification()" >
                                    <i class="fa fa-check"></i>
                                    Verify
                                </a>
                                &nbsp;&nbsp;
                                <a class="" href="javascript:void(0);" onClick="resendOTP(<?php echo $cphone; ?>)" >
                                    Resend OTP
                                </a>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!--end form body-->
                </div>
            </section>
            <div class="clearfix"></div>
            <input id="otpval" type="hidden" name="otpval" value="<?php echo $message; ?>">
             <input id="cust_id" type="hidden" name="cust_id" value="<?php echo $cust_id; ?>">
        <input id="plan_id" type="hidden" name="plan_id" value="<?php echo $cplan; ?>">
            <!--Include Footer-->
            <?php
                include('../_includes/footer.php');
            ?>