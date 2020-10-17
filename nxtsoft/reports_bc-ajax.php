<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode']))
{
    if ($_REQUEST['mode'] == "BcReport")
    {
          
      $bc_name = $_GET['bc_name'];
    //  $cust_planid = $_GET['cust_planid'];
      $bc_status = $_GET['bc_status'];
      $bc_start_date = $_GET['bc_start_date'];
      $bc_end_date = $_GET['bc_end_date'];

      /* Date Conversion into Ymd Format */ 
      $bc_date_start= date("Y-m-d 00:00:00", strtotime($bc_start_date));
      $bc_date_end= date("Y-m-d 23:59:59", strtotime($bc_end_date));
     
     
        $q = "SELECT bc.id AS bc_id,bc.name AS bc_name,bc.phone_no AS phone,sum(bca.amount) AS amount,CASE bc.status  WHEN 1 THEN 'Active' WHEN 2 THEN 'Inactive' END AS bc_status
                FROM tb_customers_plan cp,tb_bc_comm_amount bca,tb_bussiness_counsellors bc 
                WHERE bc.id=bca.bc_id AND bca.trans_no=cp.trans_no";
              
        if($bc_name != "")
        {
            $q = $q."AND bc.name LIKE '%".$bc_name."%'";
        }
       /*  if($cust_planid !=-1){
                    $q = $q." AND cp.plan_id=$cust_planid ";
        }*/
        if($bc_status != -1){
                    $q = $q." AND bc.status = $bc_status";
        }
        if($bc_start_date != ""){
                    $q = $q." AND bca.created_date >= '$bc_date_start'";
        }   
        if($bc_end_date != ""){
                    $q = $q." AND bca.created_date <= '$bc_date_end'";
        }
        $q = $q." GROUP BY bca.bc_id";
         
        $r3 = mysqli_query($con, $q);
        $num=mysqli_num_rows($r3);
        //echo $q;
        if (mysqli_num_rows($r3) > 0) 
        { 
                //************************* REPORT MENU
                echo'
                <table class="tblexport" style="display:none;" data-tableexport-display="always">
                    <tr>
                        <td></td>
                        <td colspan="2" style="font-family: arial; font-size: 15px; font-weight: bold">Customer Report</td>
                    </tr>
                    <tr>
                        <th style="font-family: arial; font-size: 12px; font-weight: bold">Customer</th>
                       <!-- <th style="font-family: arial; font-size: 12px; font-weight: bold">Plans</th>-->
                        <th style="font-family: arial; font-size: 12px; font-weight: bold">Status</th>
                        <th style="font-family: arial; font-size: 12px; font-weight: bold">Start Date</th>
                        <th style="font-family: arial; font-size: 12px; font-weight: bold">End Date</th>
                    </tr>
                    <tr>
                        <td id="td_cu_type"></td>
                      <!--  <td id="td_cu_plan"></td>-->
                        <td id="td_cu_status"></td>
                        <td id="td_cu_stdate"></td>
                        <td id="td_cu_enddate"></td>
                    </tr>
                 </table>';

            echo' <div class="row clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="card project_list">
                                <div class="table-responsive">
                                    <div class="header">
                                        <h2><strong><i class="zmdi zmdi-chart"></i> Total Record(s):</strong> '.$num.'</h2>
                                        <ul class="header-dropdown">
                                            <li class="dropdown"> <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> <i class="zmdi zmdi-more"></i> </a>
                                                <ul class="dropdown-menu dropdown-menu-right slideUp" x-placement="bottom-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(33px, 34px, 0px);width:180px;">
                                                    <li><a href="javascript:void(0);" onclick="doExportPDF()" style="line-height: 20px;"><i class="zmdi zmdi-hc-fw"></i> Export to PDF</a></li>
                                                    <li><a href="javascript:void(0);" onclick="doExportExcel()" style="line-height: 20px;"><i class="zmdi zmdi-hc-fw"></i> Export to Excel</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                    <table class="table table-hover c_table theme-color tblexport">
                                    <thead>
                                        <tr>
                                            <th>BC ID</th>
                                            <th>BC Name</th> 
                                            <th>Contact</th>
                                            <th>Amount</th>
                                            <th>Status</th> 
                                         </tr>
                                    </thead>
                                    <tbody>';                                          
                                            while($row = mysqli_fetch_array($r3)) 
                                            {
                                                $bc_id=$row['bc_id'];
                                                $bc_name=$row['bc_name'];
                                                $phone=$row['phone'];
                                                $bc_status=$row['bc_status'];
                                                $amount=$row['amount'];
                                                
                                                                                                 
                                                echo'<tr>
                                                    <td><strong>'.$bc_id.'</strong></td>
                                                    <td><strong>'.$bc_name.'</strong></td> 
                                                    <td><strong>'.$phone.'</strong></td> 
                                                    <td><strong>'.$amount.'</strong></td>  
                                                    <td><strong>'.$bc_status.'</strong></td>                        
                                                    
                                                </tr>';
                                            } 
                                               
                                    echo' </tbody>                                     
                                </table>
                           </div>
                        </div>
                    </div>
                </div>';                
        }else
        {
            echo'
            <div class="row clearfix">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="card project_list">
                        <div class="table-responsive">
                        <table class="table table-hover c_table theme-color">
                            <td><strong>No information found!</strong></td>
                        </table>
                        </div>
                    </div>
                </div>
            </div>';
        }   
    }
}