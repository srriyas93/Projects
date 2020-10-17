<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Database Configuration --> 
<?php 
    include_once('../_includes/dbconfig.php');
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<!-- Include Left Side Bar -->
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
?>

   
<!--Main Content -->
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Commission</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Commission</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                        <button class="btn btn-success btn-icon float-right" type="button" data-toggle="modal" ><a href="products_add.php"><i class="zmdi zmdi-plus"></a></i></button>
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
                        
                        <!--Displaying the  contents-->
                        <?php
                        
		                $q = "SELECT c.id AS custid,bca.amount AS amount,bca.created_date AS created_date FROM 
                        tb_customers c,tb_customers_business cb,tb_customers_plan cp,tb_bc_comm_amount bca
                        WHERE bca.trans_no=cp.trans_no AND cp.cust_bus_id=cb.cust_bus_id AND cb.customer_id=c.id AND c.business_counselor='$session_id'";
      
                        $r = mysqli_query($con, $q);
        
                        $num = mysqli_num_rows($r);
		                if(!mysqli_num_rows($r) > 0)
		                    {
                        ?>
			            <div class="container center">
			                <h5 class="card conta">No Commission Amount Recieved</h5>
			            </div>
		                <?php
		                    }
                        else{
			            echo'
                            <div class="card project_list">
                                <div class="table-responsive">
                                <h6><strong><i class="zmdi zmdi-chart"></i> Total Record(s):</strong> '.$num.'</h6>
                                    <table class="table table-hover c_table theme-color">
                                    <thead>
                                        <tr>
                                            <th>Customer ID</th>
                                            <th>Amount</th>
                                            <th>Join Date</th>
                                            
                                        </tr>
                                    </thead>';
                                while($row = mysqli_fetch_array($r))
                                    {
                                        $custid=$row['custid'];
                                        
                                        $amount=$row['amount'];
                             
                                        $cust_created_date = strtotime($row['created_date']);
                                        $cust_created_date = date("d-m-Y", $cust_created_date);
        
                                    
                        echo' 
                                    <tbody>
                                    <tr>
                                        <td><strong>'.$custid.'</strong></td>
                                        
                                        <td><strong>'.$amount.'</strong></td>
                                        <td><strong>'.$cust_created_date.'</strong></td>
                                       
                                    </tr>
                                    </tbody>';
                                    }
                        echo'            
                                    </table>
                                </div>
                            </div>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

      
<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>