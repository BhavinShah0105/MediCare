<?php
include_once('db_connection.php');
$cancelby = $_POST['cancelby'];
$appointment_id = $_POST['appointment_id'];
$reason=$_POST['reason'];
$insert = mysqli_query($conn,"INSERT into cancelapp (appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time) 
SELECT appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time FROM appointments WHERE appointment_id=$appointment_id");
$sql = mysqli_query($conn,"UPDATE cancelapp SET cancelby='Doctor',reason='$reason' WHERE appointment_id=$appointment_id");
$delete = mysqli_query($conn,"DELETE FROM appointments WHERE appointment_id=$appointment_id");
if ($delete) {
    

    echo "<script>alert('Appointment Cancelled Successfully');
    document.location = 'weeklyapp.php';
    </script>";
}

else{

    $ufetch = mysqli_query($conn,"SELECT user_email FROM cancelapp WHERE appointment_id='$appointment_id'");

    $ftch=mysqli_fetch_array($ufetch);


    $ueml = $ftch['user_email'];
    
   $dig = mysqli_query($conn, "INSERT INTO cancelnotification(user_email,msg) VALUES('$ueml','unread')");
     echo "<script>alert('Something Went Wrong');
    document.location = 'docpanel.php';
    </script>";
}

?>
<form method="post">
<input type="hidden" class="form-control" name="cancelby" value="Admin">
</form>