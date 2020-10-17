            <!--Include Header-->
            <?php
                include('../_includes/header.php');
                include('../_includes/dbconfig.php');
                require('../_includes/nxtconfig.php');
                require('razorpay-php/Razorpay.php');
               
                // Create the Razorpay Order

                use Razorpay\Api\Api;
                $api = new Api($keyId, $keySecret);

                $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
              
                $pid = $_POST["cplan"];
                $email = $_POST["cemail"];
                $phone = $_POST["cphone"];
                $name = $_POST["cname"]; 
                $cu_id = $_POST["cid"];
               
            ?>
            <!--header section -->
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
                                        <h3 class="uppercase text-white less-mar-1 title">Checkout</h3>
                                        <h6 class="uppercase text-white sub-title">
                                          <ol class="breadcrumb" style="background: transparent;">
                                              <li><a href="index.html">Home</a></li>
                                              <li>Our Packages</li>
                                              <li>Checkout</li>
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
            <div class="divider-line solid light"></div>
            <section class="sec-tpadding-5 sec-bpadding-5">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="sec-title-container less-padding-2 text-center">
                                <h2 class="font-weight-6 less-mar-1 line-height-5">Verify your package</h2>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="sp-cart">
                                    <tr>
                                        <th style="width:20%;">Packages Name</th>
                                        <th style="width:40%;">Description</th>
                                        <th style="width:20%;">Price</th>
                                        <th style="width:10%;"></th>
                                    </tr>
                                    <?php
                                    $query="SELECT name,Description,amount FROM tb_plans WHERE id =$pid";
                                    $r = mysqli_query($con, $query);
                                    if($row = mysqli_fetch_array($r))
                                    {
                                        $plan_nm = $row["name"];
                                        $plan_desc = $row["Description"];
                                        $plan_amt = $row["amount"];

                                        //getting TAX
                                        $tax_query="SELECT value FROM tb_settings WHERE name ='TAX'";
                                        $tax_r = mysqli_query($con, $tax_query);
                                       if($tax_row = mysqli_fetch_array($tax_r))
                                        {
                                            $tax_percent = $tax_row["value"]; 
                                            $tax_percent = (int)$tax_percent;
                                            $tax_amt = ($plan_amt * $tax_percent)/100 ;
                                            $tax_amt =  round($tax_amt);
                                            
                                            $total_amt = $plan_amt + $tax_amt;
                                             $razor_amt = $total_amt * 100;
                                         }
                                    ?>
                                    <tr>
                                        <td class="pro-title txtcenter">
                                            <h6><?php echo $plan_nm; ?></h6>
                                        </td>
                                        <td class="pro-des txtcenter">
                                            <p><?php echo $plan_desc; ?><br /> Free Domain </p>
                                        </td>
                                         <td class="total txtcenter">
                                            <h4><?php echo $plan_amt; ?></h4>
                                        </td>
                                        <td><a class="btn btn-dark-3 btn-small" href="#">Remove</a></td>
                                    </tr>
                                    <?php 
                                     }

                                    
                                    $orderData = [
                                        'receipt'         => $cu_id,
                                        'amount'          => $razor_amt, 
                                        'currency'        => 'INR',
                                        'payment_capture' => 1 
                                    ];
                                     $razorpayOrder = $api->order->create($orderData);
                                     $razorpayOrderId = $razorpayOrder['id'];
                                    //$_SESSION['razorpay_order_id'] = $razorpayOrderId;
                                    $displayAmount = $amount = $orderData['amount'];
                                    $checkout = 'automatic';

                                    /*$q = "INSERT INTO tb_customers_plan(cust_id,plan_id) VALUES ('$cu_id','$pid')";
            
                                     $r = mysqli_query($con, $q);  */
                                  


                                    ?>
                                </table>
                            </div>
                        </div>
                        <!--end item-->
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
            <!-- Proceed to Checkout -->
            <section class="sec-bpadding-2 less-padding section-light-2">
                <div class="container">
                    <div class="divider-line solid light"></div>
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <br /><br /><br />
                            <form action="response.php" method="POST"> 
                            <script
                            src="https://checkout.razorpay.com/v1/checkout.js"
                            data-key ="<?php echo $keyId; ?>"
                            data-amount="<?php echo $razor_amt; ?>"
                            data-currency="INR"
                            data-order_id="<?php echo $razorpayOrderId; ?>"
                            data-buttontext="Pay with Razorpay"
                            data-name=<?php echo $name; ?>
                            data-description="Test transaction"
                            data-image="https://example.com/your_logo.jpg"
                            data-prefill.name=<?php echo $name; ?>
                            data-prefill.email=<?php echo $email; ?>
                            data-prefill.contact=<?php echo $phone; ?>
                            data-theme.color="#F37254"
                        ></script>
                         <input type="hidden" value="<?php echo $razorpayOrderId; ?>" name="orderid">
                        <input type="hidden" value="<?php echo $cu_id; ?>" name="cid">
                        <input type="hidden" value="<?php echo $pid; ?>" name="pid">
                        <input type="hidden" value="<?php echo $total_amt; ?>" name="amt">
                       
                        </form>
                            <br>
                            <img src="../_assets/images/payment/credit-card.png" style="width: 35%;text-align: center;margin-left:10%;">
                        </div>
                        <div class="col-md-4 col-sm-4 col-xs-12">
                            <br /><br />
                            <ul class="sp-cart-total">
                                <li>
                                    <div class="pull-left title">Sub Total</div>
                                    <div class="pull-right price">₹ <?php echo $plan_amt; ?></div>
                                </li>
                                <li>
                                    <div class="pull-left title">Tax</div>
                                    <div class="pull-right price">₹ <?php echo $tax_amt; ?></div>
                                </li>
                                <li>
                                    <div class="pull-left title">Grand Total</div>
                                    <div class="pull-right price"><h4>₹ <?php echo $total_amt; ?></h4></div>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </section>
            <div class="clearfix"></div>
            <!--Include Footer-->
            <?php
                include('../_includes/footer.php');
            ?>
                     