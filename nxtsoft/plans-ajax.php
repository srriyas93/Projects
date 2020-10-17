<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] =="GetPlanId") {
        $query="SELECT id FROM tb_plans WHERE sno=(SELECT max(sno) FROM tb_plans)";
        $r = mysqli_query($con, $query);
        $c = mysqli_num_rows($r);
        if (!mysqli_num_rows($r) > 0) {
            $id="1";
        } else {
            while ($row = mysqli_fetch_array($r)) {
                $id = $row['id'];
            }
        }
        $p_id=$id+1;
        echo $p_id;
    }
    elseif ($_REQUEST['mode'] == "addPlan") {
        $p_id= $_GET['p_id'];
        $p_name= $_GET['p_name'];
        $p_description= $_GET['p_description'];
        $p_amount= $_GET['p_amount'];

        $q = "INSERT INTO tb_plans(id,name,description,amount) VALUES ($p_id,'$p_name','$p_description',$p_amount)";
      

        if (!mysqli_query($con, $q)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }
    elseif ($_REQUEST['mode'] == "editPlan") {
        $p_id= $_GET['p_id'];
        $p_name= $_GET['p_name'];
        $p_description= $_GET['p_description'];
        $p_amount= $_GET['p_amount'];
        $p_product_limit= $_GET['p_product_limit'];

        $Q3 = "UPDATE `tb_plans` SET `name` = '$p_name', `description`= '$p_description', `amount` = '$p_amount',product_limit=$p_product_limit,`updated_date` = CURRENT_TIMESTAMP() WHERE `id`= $p_id";
        
        
        $r3 = mysqli_query($con, $Q3);

        if ($r3) {
            echo "success";
        } else {
            echo("Error description: " . mysqli_error($con));
		}
    }

    elseif ($_REQUEST['mode'] == "AssignFeatures") {
        $plan_id= $_GET['plan_id'];
        $features_id= $_GET['features_id'];
        

        $q = "INSERT INTO tb_plans_features_relation(plan_id,feature_id) VALUES ($plan_id,$features_id)";
      

        if (!mysqli_query($con, $q)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }
}