<?php
include_once('db_connection.php');
if (isset($_POST['submit1'])) {

$doc_id = $_POST['id'];
$tid = $_POST['Tid'];
$value = $_POST['Reject'];
$dusername = $_POST['uname'];
$demail = $_POST['email'];
$dhname = $_POST['hname'];
$lstartdt = $_POST['stdt'];
$lenddt = $_POST['enddt'];
$lreason =$_POST['lrsn'];

$update = "UPDATE leavenote SET status = '$value' WHERE doctor_id = '$doc_id' AND id = '$tid'";
                    mysqli_query($conn, $update);
$insert = mysqli_query($conn, "INSERT INTO leavenoterejected(doctor_id,doctor_username,doctor_email,hname,leave_st_dt,leave_end_dt,leave_reason,status) VALUES('$doc_id','$dusername','$demail','$dhname','$lstartdt','$lenddt','$lreason','$value')");
if ($insert) {
        echo "<script type='text/javascript'>   
                    document.location = 'lnrequest.php'; </script>";
                    $insert = mysqli_query($conn, "INSERT INTO notification(doctor_id,msg) VALUES('$doc_id','unread')");

    }
}
?>