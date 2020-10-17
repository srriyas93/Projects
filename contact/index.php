<!--Include Header-->
<?php
    include('../_includes/header.php');
?>
<!-- header section -->
<section class="section-side-image clearfix">
    <div class="img-holder col-md-12 col-sm-12 col-xs-12">
        <div class="background-imgholder">
            <img class="nodisplay-imageX" src="../_assets/images/bg-pattrens/inner-bg.jpg" alt="" /> 
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 clearfix nopadding">
                <div class="header-inner less-height">
                    <div class="overlay">
                        <div class="text text-center">
                            <h3 class="uppercase text-white less-mar-1 title">Contact us</h3>
                            <h6 class="uppercase text-white sub-title">
                                <ol class="breadcrumb" style="background: transparent;">
                                    <li><a href="<?php echo $GLOBALS['BASE_URL']; ?>">Home</a></li>
                                    <li>Contact us</li>
                                </ol>
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class=" clearfix"></div>

<!-- Body Content -->
<section class="sec-tpadding-5 section-light-2">
    <div class="container">
        <div class="row">

        <div class="col-md-7 col-sm-12 col-xs-12">

            <h3>Contact Form</h3>
            <p>Get in touch with Trade Brochure today for your fulfilment requirements</p>
            <br />
            <br />
            <?php
            $Msg="";
            if(isset($_GET['error'])){
                $Msg="Please Fill in the Blanks";
                echo' <div class="alert alert-danger">'.$Msg.'</div>';
            }

            if(isset($_GET['success'])){
                $Msg="Your Message has been Sent";
                echo' <div class="alert alert-success ">'.$Msg.'</div>';
            }
            ?>
            <div class="text-box white padding-4">
            <div class="one_half">

                <div class="cforms_sty3">

                <div id="form_status"></div>
                <form type="POST" id="gsr-contact" action="contact-action.php" onSubmit="return valid_datas( this );">
                    <label class="label">Name <em>*</em></label>
                    <label class="input">
                    <input type="text" name="name" id="name">
                    </label>

                    <div class="clearfix"></div>

                    <label class="label">E-mail <em>*</em></label>
                    <label class="input">
                    <input type="email" name="email" id="email">
                    </label>

                    <!-- <div class="clearfix"></div>


                    <label class="label">Phone <em>*</em></label>
                    <label class="input">
                        <input type="text" name="phone" id="phone">
                    </label> -->

                    <div class="clearfix"></div>

                    <label class="label">Subject <em>*</em></label>
                    <label class="input">
                    <input type="text" name="subject" id="subject">
                    </label>

                    <div class="clearfix"></div>

                    <label class="label">Message <em>*</em></label>
                    <label class="textarea">
                    <textarea rows="5" name="message" id="message"></textarea>
                    </label>

                    <div class="clearfix"></div>
                    <input type="hidden" name="token" value="FsWga4&@f6aw" />
                    <button type="submit" class="button">Send Message</button>

                </form>


                </div>

            </div>
            </div><!-- end .smart-wrap section -->
            <!-- end .smart-forms section -->
        </div>
        <!--end item-->

        <div class="col-md-5 col-sm-12 col-xs-12 text-left margin-bottom">
            <h4>Address Info</h4>
            <h6>Trade Brochure</h6>
            <p>
            Mr.Kissan House P.O.Veloor , 680601 Thirissur , Kerala <br><br>
            Phone: 790 23 80 800 <br><br>
            Phone: 790 26 80 800 <br><br>
            Phone: 790 29 80 800 <br><br>
            </p>
            <br />
            <p>E-mail: mrkissanmd@gmail.com</p>
            <p>Website: www.tradebrochure.net</p>
            <br /><br />
        </div>
        <!--end item-->
        <div class="col-md-5 col-sm-12 col-xs-12 text-left">
            <h4>Google Map Location</h4>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15685.519598315546!2d76.1677415!3d10.6275662!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x13b1b75de912c455!2sMr.%20Kissan%20coconut%20oil!5e0!3m2!1sen!2sin!4v1601574576205!5m2!1sen!2sin" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
        </div>
        <!--end map-->

        </div>
    </div>
    <br><br><br>
</section>
<div class="clearfix"></div>

<!--Include Footer-->
<?php
    include('../_includes/footer.php');
?>
