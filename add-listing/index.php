            <!--Include Header-->
            <?php
                include('../_includes/header.php');
                $pid = $_GET["pid"];
                $action = "cust-insert.php";
            ?>
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
                                        <h3 class="uppercase text-white less-mar-1 title">Add Listing</h3>
                                        <h6 class="uppercase text-white sub-title">
                                          <ol class="breadcrumb" style="background: transparent;">
                                              <li><a href="index.html">Home</a></li>
                                              <li>Our Packages</li>
                                              <li>Add Listing</li>
                                          </ol>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
            <!--Body Content-->
            <form name="profile" method="post" action="<?php echo $action; ?>" enctype="multipart/form-data">
            <div class="divider-line solid light"></div>
            <section class="sec-tpadding-5 sec-bpadding-5 section-light-2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="padding-left-1">Category*</h4>
                            <div class="control-group">
                                <div class="col-md-2">
                                    <label class="control control--radio">Manufacturers
                                      <input type="radio" name="radio" value="1" required="">
                                      <div class="control__indicator blue"></div>

                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="control control--radio">Service Providers
                                      <input type="radio" name="radio" value="2">
                                      <div class="control__indicator blue"></div>
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="control control--radio">Professionals
                                      <input type="radio" name="radio" value="3">
                                      <div class="control__indicator blue"></div>
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="control control--radio">Institutions
                                      <input type="radio" name="radio" value="4">
                                      <div class="control__indicator blue"></div>
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="control control--radio">Traders & Vendors
                                      <input type="radio" name="radio" value="5">
                                      <div class="control__indicator blue"></div>
                                    </label>
                                </div>
                                <div class="col-md-2">
                                    <label class="control control--radio">Hospitality
                                      <input type="radio" name="radio" value="6">
                                      <div class="control__indicator blue"></div>
                                    </label>
                                </div>
                            </div>
                            <div class="col-divider-margin-3"></div>
                            <div class=" divider-line dashed dark margin opacity-3"></div>
                            <div class="col-divider-margin-3"></div>

                            <h4 class="padding-left-1">Business Profile</h4>
                            <div class="control-group">
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Business Name*</label>
                                  <input id="bname" class="input-1" type="text" placeholder="Enter business name" name="bname" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Business Logo*</label>
                                  <input id="blogo" name="blogo" class="file" type="file" multiple data-min-file-count="1" required="">
                                </div>
                            </div>
                            <div class="col-divider-margin-3"></div>
                            <div class=" divider-line dashed dark margin opacity-3"></div>
                            <div class="col-divider-margin-3"></div>

                            <h4 class="padding-left-1">Product (Main Product)</h4>
                            <div class="control-group">
                               <div class="col-md-6">
                                  <label class="lable-text" for="name"> Product Name*</label>
                                  <input id="pname" class="input-1" type="text" placeholder="Enter product name" name="pname" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Product Category*</label>
                                  <input id="pcategory" class="input-1" type="text" placeholder="Enter product category" name="pcategory" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Brand Name*</label>
                                  <input id="brname" class="input-1" type="text" placeholder="Enter brand name" name="brname">
                                </div>
                                <div class="col-md-3">
                                  <label class="lable-text" for="name"> Keyword*</label>
                                  <input id="prkeyword" name="prkeyword" class="input-1" type="text" placeholder="Enter product keyword" required="">
                                </div>
                                <div class="col-md-3">
                                  <label class="lable-text" for="name"> Price*</label>
                                  <input id="prprice" class="input-1" type="text" placeholder="Enter price" name="prprice" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Product Description*</label>
                                  <textarea name="prdesc" cols="30" rows="5" placeholder="Description" class="form-control no-resize input-1" required="" aria-required="true" required=""></textarea>
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Product Image*</label>
                                  <input id="pimage" name="pimage" class="file" type="file" multiple data-min-file-count="1" required="">
                                </div>
                                <div class="col-md-12">
                                  <i>*** More products can be added under your dashboard based on your selected package</i>
                                </div>
                            </div>
                            <div class="col-divider-margin-3"></div>
                            <div class=" divider-line dashed dark margin opacity-3"></div>
                            <div class="col-divider-margin-3"></div>

                            <h4 class="padding-left-1">Business Address</h4>
                            <div class="control-group">
                                <div class="col-md-6">
                                  <label class="lable-text" for="bname"> Building Name*</label>
                                  <input id="buname" class="input-1" type="text" placeholder="Enter Building Name" name="buname" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Street Name*</label>
                                  <input id="bstreet" class="input-1" type="text" placeholder="Enter Street Name" name="bstreet" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> P.O Number*</label>
                                  <input id="bpo" class="input-1" type="text" placeholder="Enter P.O Numbere" name="bpo" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> City*</label>
                                  <input id="bcity" class="input-1" type="text" placeholder="Enter city" name="bcity" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> State*</label>
                                  <input id="bstate" class="input-1" type="text" placeholder="Enter state" name="bstate" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Country*</label>
                                  <input id="bcountry" class="input-1" type="text" placeholder="Enter country" name="bcountry" required="">
                                </div>
                                <div class="col-md-12">
                                  <label class="lable-text" for="name"> Google Map Location</label>
                                  <textarea name="gmap" cols="30" rows="5" placeholder="Google Map Share Location Link" class="form-control no-resize input-1" aria-required="true" ></textarea>
                                 </div>
                            </div>
                            <div class="col-divider-margin-3"></div>
                            <div class=" divider-line dashed dark margin opacity-3"></div>
                            <div class="col-divider-margin-3"></div>

                            <h4 class="padding-left-1">Contact Details</h4>
                            <div class="control-group">
                               <div class="col-md-6">
                                  <label class="lable-text" for="name"> Customer Name</label>
                                  <input id="cname" class="input-1" type="text" placeholder="Enter customer name" name="cname" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> E-mail Address*</label>&nbsp;&nbsp;<span id="emailid" class="errorform"></span>
                                  <input id="cemail" class="input-1" type="text" placeholder="Enter E-mail" name="cemail" onblur="checkEmail()" required="">
                                </div>
                                <div class="col-md-2">
                                  <label class="lable-text" for="name"> Country Code*</label>
                                  <input id="country_code" class="input-1" type="text" placeholder="0091" name="country_code" required="">
                                </div>
                                <div class="col-md-4">
                                  <label class="lable-text" for="name"> Phone Number*</label>&nbsp;&nbsp;<span id="mobno" class="errorform"></span>
                                  <input id="cphone" class="input-1" type="text" placeholder="Enter Phone Number" name="cphone" onblur="checkMob()" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Business counselor ID</label>&nbsp;&nbsp;<span id="bcname" class="errorform"></span>
                                  <input id="bus_con" class="input-1" type="text" placeholder="Enter counselor ID " name="bus_con" onblur="getBCname()">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Business Hours*</label>
                                  <input id="busholi" class="input-1" type="text" placeholder="Enter holiday - ex:Sunday" name="busholi" required="">
                                  <input id="bushrs" class="input-1" type="text" placeholder="Enter business hours - ex:9.00 AM to 6 PM" name="bushrs" required="">
                                </div>
                                <div class="col-md-6">
                                  <label class="lable-text" for="name"> Website URL</label>
                                  <input id="cwebsite" class="input-1" type="text" placeholder="Enter wesite url" name="cwebsite">
                                </div>
                            </div>
                            <div class="col-divider-margin-3"></div>
                            <div class=" divider-line dashed dark margin opacity-3"></div>
                            <div class="col-divider-margin-3"></div>
                            <input type="hidden" name="plan" value=<?php echo $pid; ?>>
                            <input type="submit" value="Submit" class="btn btn-prim btn-large uppercase pull-right">
                        </div>
                    </div>
                </div>
            </section>
            </form>
            <div class="clearfix"></div>
            <!-- end section -->
            <div class="divider-line solid light-2"></div>
            <!--Include Footer-->
            <?php
                include('../_includes/footer.php');
            ?>