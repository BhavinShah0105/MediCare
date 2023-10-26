<?php
include_once('db_connection.php');

$appointment_id = $_POST['appointment_id'];

$insert = mysqli_query($conn,"INSERT into confirmapp (appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time) 
SELECT appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time FROM appointments WHERE appointment_id=$appointment_id");
$delete = mysqli_query($conn,"DELETE FROM appointments WHERE appointment_id=$appointment_id");

if ($insert) {
    $ufetch = mysqli_query($conn,"SELECT user_email,pname FROM confirmapp WHERE appointment_id='$appointment_id'");

    $ftch=mysqli_fetch_array($ufetch);

    $unme = $ftch['pname'];
    $ueml = $ftch['user_email'];
    
   $dig = mysqli_query($conn, "INSERT INTO hvnotification(user_email,username,msg) VALUES('$ueml','$unme','unread')");
    echo "<script>alert('Application Accepted Successfully');
    document.location = 'happ.php';
    </script>";
}

else{
     echo "<script>alert('Something Went Wrong');
    document.location = 'happ.php';
    </script>";
}

?>
