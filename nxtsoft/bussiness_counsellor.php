<!-- Include Header --> 
<?php
    include('page_header.php');
?>
<!-- Include Other Files -->
<?php 
    include('bussiness_counsellor-ajax.php');
?>
<!-- Include Left Side Bar --> 
<?php
    include('page_left-sidebar.php');
?>
<!-- Include Right Side Bar --> 
<?php
    include('page_right-sidebar.php');
?>

<!-- Main Content -->
    <section class="content">
        <div class="body_scroll">
            <div class="block-header">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-sm-12">
                        <h2>Business Counselors</h2>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                            <li class="breadcrumb-item active">Business Counselors</li>
                        </ul>
                        <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                    </div>
                    <div class="col-lg-5 col-md-6 col-sm-12">
                        <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                        <a class="btn btn-success btn-icon float-right" href="bussiness_counselors-add.php"><i class="zmdi zmdi-plus"></i></a>
                        
                    </div>
                </div>
            </div>
            <div id="DisplayPlan" class="container-fluid">
                <div class="row clearfix">
                    <div id="DisplayPlan" class="col-md-12 col-sm-12 col-xs-12">
               
                        <!-- Displaying the  contents -->
                        <?php
                            $con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');
                            $q = "SELECT sno,id,name,email_id,phone_no,raz_account_id,aadhar_num,bank_acc_num,bank_name,ifsc_code,created_date,updated_date,CASE status WHEN 1 THEN 'Active' WHEN 0 THEN 'Inactive' END AS status FROM tb_bussiness_counsellors GROUP BY created_date DESC";

                            $r = mysqli_query($con, $q);

                            $num = mysqli_num_rows($r);
                            if(!mysqli_num_rows($r) > 0)
                            { ?>
                            
                                <div class="container center">
                                <h5 class="card conta">No Bussiness Counsellors added </h5>
                                </div>
                            <?php }
                            
                            else
                            {
			                 echo'
                                <div class="card project_list">
                                    <div class="table-responsive">
                                    <h6><strong><i class="zmdi zmdi-chart"></i> Total Record(s):</strong> '.$num.'</h6>
                                        <table class="table table-hover c_table theme-color">
                                            <thead>
                                                <tr>
                                                    <th>BC ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Contact</th>
                                                    <th>Join Date</th>
                                                    <th>Razer Pay ID</th>
                                                    <th>Status</th>
                                                    <th>Options</th>
                                                </tr>
                                            </thead>';
                                    while($row = mysqli_fetch_array($r))
                                    {
                                        $bc_sno=$row['sno'];
                                        $bc_id=$row['id'];
                                        $bc_name=$row['name'];
                                        $bc_email=$row['email_id'];
                                        $raz_account_id=$row['raz_account_id'];
                                        $bc_mobile=$row['phone_no'];
                                        $bc_aadhar=$row['aadhar_num'];
                                        $bank_acc_num=$row['bank_acc_num'];
                                        $bank_name=$row['bank_name'];
                                        $bank_ifsc_code=$row['ifsc_code'];

                                        $bc_created_date = strtotime($row['created_date']);
                                        $bc_created_date = date("d-m-Y", $bc_created_date);

                                        $bc_updated_date = strtotime($row['updated_date']);
                                        $bc_updated_date = date("d-m-Y", $bc_updated_date);
                               
                                        $bc_status=$row['status'];
                                        $bcname=explode(" ",$bc_name);
                                       
                                        echo' <tbody>
                                            <tr>
                                                <td><strong>'.$bc_id.'</strong></td>
                                                <td><strong>'.$bc_name.'</strong></td>
                                                <td><strong>'.$bc_email.'</strong></td>
                                                <td><strong>'.$bc_mobile.'</strong></td>
                                                <td><strong>'.$bc_created_date.'</strong></td>
                                                <td><strong>'.$raz_account_id.'</strong></td>
                                                <td><strong>'.$bc_status.'</strong></td>';
                                      
                                        echo' <td class="aligncenter">
                                                <div class="btn-group dropleft">
                                                    <a id="btndropdown'.$bc_sno.'" class="mousehand" data-toggle="dropdown" href="javascript:void()" data-activates="dropdown'.$bc_sno.'" aria-expanded="false"><i class="zmdi zmdi-hc-fw"></i></a>
                                                    <div id="dropdown'.$bc_sno.'"class="dropdown-menu">
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick="javascript:openBcViewpop('."'".$bc_id."'".','."'".$bc_name."'".','."'".$bc_email."'".','."'".$raz_account_id."'".','."'".$bc_mobile."'".','."'".$bc_aadhar."'".','."'".$bank_acc_num."'".','."'".$bank_name."'".','."'".$bank_ifsc_code."'".','."'".$bc_created_date."'".','."'".$bc_updated_date."'".','."'".$bc_status."'".');" title="View">
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>View
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="bussiness_counselor-edit.php?bc_id='.$bc_id.'" title="Edit">
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Edit Profile
                                                        </a>';
                                                    if ($raz_account_id != "" ){
                                                        echo'
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item" href="javascript:void(0);" onClick=javascript:showConfirmMessage1("bc",'."'".$bcname[0]."'".','."'".$bc_id."'".','."'".$bc_status."'".');>
                                                            <i class="zmdi zmdi-hc-fw margin-right10"></i>Status
                                                        </a>';
                                                    } 
                                                echo'
                                                    </div>
                                                </div>
                                            </td>';
                                       echo' </tr>
                                    </tbody>';
                                    }
                               echo' </table>
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

<script>
   
    if(window.location.href.indexOf("status") > -1) {
    var status=window.location.href.split('=')[1];
    
    if (status == 1)
    {
         showNotification('Business Counselor added succesfully !!!','bg-green');
    }
    if (status == 0)
    {
         showNotification('Error !!!','bg-red');
    }

    }

    if(window.location.href.indexOf("edit") > -1) {
    var edit=window.location.href.split('=')[1];
    
    if (edit == 1)
    {
         showNotification('Business Counselor Updated succesfully !!!','bg-green');
    }
    if (edit == 0)
    {
         showNotification('Error !!!','bg-red');
    }

    }
</script>