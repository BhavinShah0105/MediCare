<?php 
include_once('db_connection.php');
$lstartdt = $lenddt = $lreason = $did = $dusername = $demail = $dhname = $value = "";

if (isset($_POST['submit'])) {

echo $doc_id = $_POST['id'];
echo $tid = $_POST['Tid'];
echo $value = $_POST['Approve'];
echo $dusername = $_POST['uname'];
echo $demail = $_POST['email'];
echo $dhname = $_POST['hname'];
echo $lstartdt = $_POST['stdt'];
echo $lenddt = $_POST['enddt'];
echo $lreason =$_POST['lrsn'];

$update = "UPDATE leavenote SET status = '$value' WHERE doctor_id = '$doc_id' AND id = '$tid'";
                    mysqli_query($conn, $update);
$insert = mysqli_query($conn, "INSERT INTO leavenoteapproved(doctor_id,doctor_username,doctor_email,hname,leave_st_dt,leave_end_dt,leave_reason,status) VALUES('$doc_id','$dusername','$demail','$dhname','$lstartdt','$lenddt','$lreason','$value')");

if ($insert) {
        echo "<script type='text/javascript'>   
                    document.location = 'lnrequest.php'; </script>";
                    $insert = mysqli_query($conn, "INSERT INTO notification(doctor_id,msg) VALUES('$doc_id','unread')");


    }
}

?>