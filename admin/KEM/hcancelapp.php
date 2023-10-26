<?php
include_once('db_connection.php');

$appointment_id = $_POST['appointment_id'];

$insert = mysqli_query($conn,"INSERT into cancelapp (appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time) 
SELECT appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time FROM confirmapp WHERE appointment_id=$appointment_id");
$sql = mysqli_query($conn,"UPDATE cancelapp SET cancelby='Admin' WHERE appointment_id=$appointment_id");
$delete = mysqli_query($conn,"DELETE FROM confirmapp WHERE appointment_id=$appointment_id");
if ($insert) {
    echo "<script>alert('Appointment Cancelled Successfully');
    document.location = 'admin.php';
    </script>";
}
else{
     echo "<script>alert('Something Went Wrong');
    document.location = 'admin.php';
    </script>";
}

?>
