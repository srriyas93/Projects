<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_GET['mode'])) {
    if ($_REQUEST['mode'] =="GetpfId") {
        $query="SELECT id FROM tb_plans_features WHERE sno=(SELECT max(sno) FROM tb_plans_features);";
        $r = mysqli_query($con, $query);
        $c = mysqli_num_rows($r);
        if (!mysqli_num_rows($r) > 0) {
            $id="1";
        } else {
            while ($row = mysqli_fetch_array($r)) {
                $id = $row['id'];
            }
        }
        $pf_id=$id+1;
        echo $pf_id;
    }

    elseif ($_REQUEST['mode'] == "addPf") {
        $pf_id= $_GET['pf_id'];
        $pf_name= $_GET['pf_name'];
        $pf_rank= $_GET['pf_rank'];

        $q = "INSERT INTO tb_plans_features(id,name,rank) VALUES ($pf_id,'$pf_name',$pf_rank)";
      

        if (!mysqli_query($con, $q)) {
            echo("Error description: " . mysqli_error($con));
        } else {
            echo "success";
        }
    }

    elseif ($_REQUEST['mode'] == "editPf") {
        $pf_id= $_GET['pf_id'];
        $pf_name= $_GET['pf_name'];
        $pf_rank= $_GET['pf_rank'];

        $Q3 = "UPDATE tb_plans_features SET`name` = '$pf_name',`rank` = '$pf_rank', updated_date = CURRENT_TIMESTAMP() WHERE id= $pf_id";
        
        
        $r3 = mysqli_query($con, $Q3);

        if ($r3) {
            echo "success";
        } else {
            echo("Error description: " . mysqli_error($con));
		}
    }
}