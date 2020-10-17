<?php
include('../_includes/dbconfig.php');
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if(isset($_GET['mode']))
{
	if($_GET['mode'] == "GET_BC_NAME")
	{
		$bc_id = $_POST['bcid'];
		$query="SELECT name FROM tb_bussiness_counsellors WHERE id ='$bc_id'";
        $r = mysqli_query($con, $query);
        if($row = mysqli_fetch_array($r))
        {
            $bcname = $row["name"];
            echo "      Counseleor Name - $bcname";
        }
        else
            echo "0";
	}
    if($_GET['mode'] == "CHECK_EMAIL")
    {
        $email = $_POST['email'];
        $query="SELECT email_id FROM tb_customers WHERE email_id ='$email'";
        $r = mysqli_query($con, $query);
        $c = mysqli_num_rows($r);
        if($c)
        {
           echo "0";
        }
        else
            echo "1";
    }
    if($_GET['mode'] == "CHECK_MOB")
    {
        $cphone = $_POST['cphone'];
        $query="SELECT phone_no FROM tb_customers WHERE phone_no ='$cphone'";
        $r = mysqli_query($con, $query);
        $c = mysqli_num_rows($r);
        if($c)
        {
            echo "0";
        }
        else
            echo "1";
    }
}