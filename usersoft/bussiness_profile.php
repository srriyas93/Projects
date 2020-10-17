<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
?>
<!-- Include Database Configuration -->
<?php
    include('../_includes/dbconfig.php');
    $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
?>
<!-- Include Global Configuration -->
<?php
    include('../_includes/nxtconfig.php');
?>

<!-- Main Content -->
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Bussiness Profile</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Bussiness Profile</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
                        <!-- Displaying the  contents -->
                    <?php
                            
                     $q = "SELECT
                             cb.cust_bus_id AS cust_bus_id,
                             cb.name AS bus_name, cat.name AS bus_cat,
                             c.name AS cust_name, c.phone_no AS cust_phone,
                             cb.vision,cb.mission,
                             cb.created_date AS created_date, cb.slug AS slug
                             FROM tb_customers c, tb_customers_business cb, tb_categories cat WHERE 
                             cat.id = cb.category_id AND c.id= cb.customer_id AND c.id='$session_id' ORDER BY cb.created_date DESC";
                            
                    $r = mysqli_query($con, $q);
                    $num = mysqli_num_rows($r);
                    if(!mysqli_num_rows($r) > 0)
                    { 
                    ?>
                        <div class="card">
                            <div class="body">
                                <br>
                                <p>No Business Profile(s) Found</p>
                                <br>
                            </div>
                        </div>
                    <?php 
                    }
                    else
                    {
                    ?>
                        <div class="card project_list">
                        <div class="table-responsive">
                        <h6><strong><i class="zmdi zmdi-chart"></i> Total Record(s):</strong><?php echo $num; ?></h6>
                        <table class="table table-hover c_table theme-color">
                            <thead>
                                <tr style="text-align:center;">
                                    <th>Bussiness Name</th>
                                    <th>Category</th>
                                    <th>Customer Name</th>
                                    <th>Customer Phone</th>
                                    <th>Created Date</th>  
                                    <th>Options</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            while ($row = mysqli_fetch_array($r)) 
                            {
                           
                                $cust_bus_id = $row['cust_bus_id'];
                                $bus_name = $row['bus_name'];
                                $bus_cat = $row['bus_cat'];
                                $cust_name = $row['cust_name'];
                                $cust_phone = $row['cust_phone'];
                                $slug = $row['slug'];

                                $vision = $row['vision'];
                                $mission = $row['mission'];

                                $b_created_date = strtotime($row['created_date']);
                                $b_created_date = date("d-m-Y", $b_created_date);

                                $pname=explode(" ",$bus_name);
                                $profilepath='business/profile/'.$slug;
                                        
                            ?>
                           
                            <tr style="text-align:center;">
                                <td><strong><?php echo $bus_name; ?></strong></td>
                                <td><strong><?php echo $bus_cat; ?></strong></td>
                                <td><strong><?php echo $cust_name; ?></strong></td>
                                <td><strong><?php echo $cust_phone; ?></strong></td>    
                                <td><strong><?php echo $b_created_date; ?></strong></td>
                                <td class="aligncenter">             
                                    <div class="btn-group dropleft">
                                        <a id="btndropdown <?php echo $cust_bus_id; ?>" class="mousehand" data-toggle="dropdown" href="javascript:void()" data-activates="dropdown'.$sno.'" aria-expanded="false"><i class="zmdi zmdi-hc-fw"></i></a>
                                    
                                        <div id="dropdown <?php echo $cust_bus_id; ?>"class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo $GLOBALS['BASE_URL'].$profilepath; ?>" target="_blank" title="Public Profile">
                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Public Profile
                                            </a>
                                            <div class="dropdown-divider"></div>
                                             <a class="dropdown-item" href="bussiness_edit.php?cust_bus_id=<?php echo $cust_bus_id; ?>" title="Edit">
                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Edit
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="products.php?cust_bus_id=<?php echo $cust_bus_id; ?>" title="Edit">
                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Products
                                             </a>
                                             <div class="dropdown-divider"></div>
                                             <a class="dropdown-item" href="javascript:void(0);" onClick="javascript:openMissionPop('<?php echo $cust_bus_id;?>','<?php echo $vision;?>','<?php echo $mission;?>');" title="Edit">
                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Mission&Vision
                                             </a>
                                            <div class="dropdown-divider"></div>
                                             <a class="dropdown-item" href="socialmedia.php?cust_bus_id=<?php echo $cust_bus_id; ?>" title="Edit">
                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Social Media Links
                                             </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <?php      
                            }
                            ?>
                            </tbody>
                            </table>
                            </div>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    
<!-- MissionPopUP -->
<div id="MissionPop" class="modal fade" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="title" id="addPlanPopTitle">Vision And Mission</h4>
                </div>
                <form name="frmMissionPop" id="frmMissionPop" method="POST">
                <input type="hidden" name="cust_bus_id" id="cust_bus_id">
                
                <div id="displayCustomerPlan" class="modal-body"> 
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <strong>Vision</strong>
                            <div class="form-group">
                                <textarea id="vision" name="vision" class="form-control" rows="5" ></textarea> </div>
                        </div>
                        <div class="col-sm-12">
                            <strong>Mission</strong>
                            <div class="form-group">
                                 <textarea id="mission" name="mission" class="form-control" rows="5"></textarea>
                            </div>
                        </div> 
                    </div>      
                    <div class="modal-footer">
                    <button type="submit" class="btn btn-danger waves-effect" onClick="javascript:insertMission(event);">SAVE</button>
                    <button type="button" class="btn btn-danger bg-grey waves-effect" data-dismiss="modal">CLOSE</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>
 
<!-- Include Footer --> 
<?php
    include('page_footer.php');
?>

<script>
   
    if(window.location.href.indexOf("status") > -1) {
    var status=window.location.href.split('=')[1];
    
    if (status == 1)
    {
         showNotification('Business Profile Updated Succesfully !!!','bg-green');
    }
    if (status == 0)
    {
         showNotification('Error !!!','bg-red');
    }

    }
</script>