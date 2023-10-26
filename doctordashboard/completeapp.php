<?php
include_once('db_connection.php');

$appointment_id = $_POST['appointment_id'];
$sql = "SELECT * FROM appointments where appointment_id = '$appointment_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

  $doctor_id=$row['doctor_id'];
  $doc_name=$row['doc_name'];
  $pname=$row['pname'];
  $user_email=$row['user_email'];
  $tmode=$row['tmode'];
  $age=$row['age'];
  $gender=$row['gender'];
  $contactno=$row['contactno'];
  $booking_date=$row['booking_date'];
  $address=$row['address'];
  $hname=$row['hname'];
  $booking_time=$row['booking_time'];
  }
} else {
  echo "0 results";
}


$query = "SELECT * FROM doctors where id = '$doctor_id'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $wcharges=$row['wcharges'];
    $ocharges=$row['ocharges'];
    $hcharges=$row['hcharges'];
  }
} else {
  echo "0 results";
}

if($tmode=="Walkin"){
    $charges=$wcharges;
}elseif($tmode=="Home Visit"){
    $charges=$hcharges;
}elseif($tmode=="Online"){
    $charges=$ocharges;
}


 $bill="INSERT into bill(appointment_id,doc_name,pname,p_email,tmode,charges,age,gender,contactno,booking_date,address,booking_time,hname)values('$appointment_id','$doc_name','$pname','$user_email','$tmode','$charges','$age','$gender','$contactno','$booking_date','$address','$booking_time','$hname')";
 $result=mysqli_query($conn,$bill);
$insert = mysqli_query($conn,"INSERT into completeapp (appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time) 
SELECT appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time FROM appointments WHERE appointment_id=$appointment_id");
$delete = mysqli_query($conn,"DELETE FROM appointments WHERE appointment_id=$appointment_id");

if ($insert) {
    echo "<script>alert('Appointment Completed Successfully');
    document.location = 'today.php';
    </script>";
}

else{
     echo "<script>alert('Something Went Wrong');
    document.location = 'today.php';
    </script>";
}

?>
