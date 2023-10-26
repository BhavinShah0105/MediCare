
<?php 
include_once('db_connection.php');
$scheduleday=$hslots=$wslots=$wslots='';

if(isset($_POST['booking_date'])){
	$booking_date=$_POST['booking_date'];
	$tmode=$_POST['tmode'];
	$aadharno=$_POST['aadharno'];
	$doc_id=$_POST['doc_id'];
	$unixTimestamp = strtotime($booking_date);
    $dayOfWeek = date("l", $unixTimestamp);
    $aadhar = "SELECT * FROM aadharno WHERE aadharno='$aadharno'";
	 
	  
    $check = "SELECT * FROM doctorschedule WHERE scheduleday='$dayOfWeek' AND id='$doc_id'";
	  $result = mysqli_query($conn, $check);
	  if (mysqli_num_rows($result) > 0) {
      // output data of each row
      while($row = mysqli_fetch_assoc($result)) {
      $scheduleday=$row['scheduleday'];
      $oslots=$row['oslots'];
      $wslots=$row['wslots'];
      $hslots=$row['hslots'];

      }
    } 
    $error = 0;
    $verify=mysqli_query($conn,$aadhar) or die(mysqli_error($conn));
     if (mysqli_num_rows($verify)==0) {
      	$error = 1;	 	
		echo json_encode(array("type"=>"error", "message"=>"Aadhar Number Does Not Exists"));
     }
	 if (mysqli_num_rows($result)==0) 
	 {
	 	$error = 1;	 	
		echo json_encode(array("type"=>"error", "message"=>"Doctor Not Available"));
	
	 } else if($tmode == 'Walkin') {
	 	if($wslots==0)
	 	{
	 		$error = 1;
	 	  echo json_encode(array("type"=>"error","message"=>"No Slots Available"));
	 	}
	 }else if($tmode == 'Online') {
	 	if($oslots==0)
	 	{
	 		$error = 1;
	 	  echo json_encode(array("type"=>"error","message"=>"No Slots Available"));
	 	}
	 }else if($tmode == 'Home Visit') {
	 	if($hslots==0)
	 	{
	 		$error = 1;
	 	  echo json_encode(array("type"=>"error","message"=>"No Slots Available"));
	 	}
	 }

	 if($error == 0) {
		echo json_encode(array("type"=>"success"));

	}
}else{

echo json_encode(array("type"=>"error", "message"=>"Invalid Input"));
}
?>