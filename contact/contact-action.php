<?php
require_once '../_includes/dbconfig.php';
$con = mysqli_connect(HOST,USER,PASS,DB) or die('Unable to Connect...');

if (isset($_POST['edit'])) {
    $contact_name=$_POST["name"];
    $contact_email=$_POST["email"];
    $contact_subject=$_POST["subject"];
    $contact_message=$_POST["message"];

    if (empty($contact_name)||empty($contact_email)||empty($contact_subject)||empty($contact_message)) {
        header('location:index.php?error');
    } else {
        $Q3 = "SELECT email FROM tb_settings WHERE sno=2";
        $r3 = mysqli_query($con, $Q3);
        $row = mysqli_fetch_array($r3);

        $dest_email = $row['email'];

        $from = "'$contact_email'";
        $to = "'$dest_email'";
        $subject = "'$contact_subject'";
        $message = "'$contact_message'";
        $headers = "From:" . $from;
        mail($to, $subject, $message, $headers);

        if (mail($to, $subject, $body, $headers)) {
            header("Location:index.php?success");
        } else {
            header("Location:index.php");
        }
        
    }
}