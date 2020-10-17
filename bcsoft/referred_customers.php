<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Database Configuration --> 
<?php 
    include_once('../_includes/dbconfig.php');
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
                        <h2>Customers Reffered</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Customers Reffered</li>
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
                        $username=$_SESSION['email_id'];
		                $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
		                $q = "SELECT c.id AS custid,c.name AS custname,c.phone_no AS mobile,c.created_date AS joindate,CASE c.status WHEN 1 THEN 'Active' WHEN 0 THEN 'Inactive' END AS status,p.name AS custplan 
                                FROM tb_customers c,tb_customers_plan cp,tb_customers_business cb,tb_plans p 
                                WHERE c.id=cb.customer_id AND cb.cust_bus_id=cp.cust_bus_id AND cp.plan_id=p.id AND c.business_counselor='$session_id'";
      
                        $r = mysqli_query($con, $q);
        
                        $num = mysqli_num_rows($r);
		                if(!mysqli_num_rows($r) > 0)
		                    {
                        ?>
			            <div class="container center">
			                <h5 class="card conta">No Customers Referred </h5>
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
                                            <th>Customer Name</th>
                                            <th>Contact</th>
                                            <th>Join Date</th>
                                            <th>Status</th>
                                            <th>Plan</th>
                                            
                                        </tr>
                                    </thead>';
                                while($row = mysqli_fetch_array($r))
                                    {
                                        $custid=$row['custid'];
                                        $custname=$row['custname'];
                                        $mobile=$row['mobile'];
                                        $custplan=$row['custplan'];            
                                        $cust_status=$row['status'];
                             
                                        $cust_created_date = strtotime($row['joindate']);
                                        $cust_created_date = date("d-m-Y", $cust_created_date);
        
                                    
                        echo' 
                                    <tbody>
                                    <tr>
                                        <td><strong>'.$custid.'</strong></td>
                                        <td><strong>'.$custname.'</strong></td>
                                        <td><strong>'.$mobile.'</strong></td>
                                        <td><strong>'.$cust_created_date.'</strong></td>
                                        <td><strong>'.$cust_status.'</strong></td>
                                        <td><strong>'.$custplan.'</strong></td>
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