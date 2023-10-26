<?php
include_once('db_connection.php');
$pname=$tmode=$age=$gender=$description=$address=$username=$aadharno=$booking_date=$contactno=$id=$hname=$dayOfWeek=$uemail='';
$uemail = $_SESSION['email'];

if(isset($_POST['mobileotp']) && !empty($_POST['mobileotp']))
{
						


						$id=$_POST['id'];
						$hname=$_POST['hname'];
						$pname=$_POST['pname'];
						$tmode=$_POST['tmode'];
						$age=$_POST['age'];
						$gender=$_POST['gender'];
						$mobile=$_POST['mobile'];
						$aadharno=$_POST['aadharno'];
						$booking_date=$_POST['booking_date'];
						$address=$_POST['address'];
						$username=$_POST['username'];
						$description=$_POST['description'];
						$unixTimestamp = strtotime($booking_date);
						$dayOfWeek = date("l", $unixTimestamp);
		

							
							$insert = "INSERT INTO appointments(doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description) VALUES('$id','$username','$uemail','$pname','$tmode','$age','$gender','$mobile','$aadharno','$booking_date','$dayOfWeek','$address','$hname','$description')"; 
							      
              $sql = mysqli_query($conn,$insert);
              if($insert){
	               if($_POST['tmode'] == 'Walkin')
	                {
	                  $reg = "UPDATE doctorschedule SET wslots= wslots - 1 WHERE id='$id' AND scheduleday = '$dayOfWeek'";
	                }
	                    else if($_POST['tmode'] == 'Online')
	                {
	                    $reg = "UPDATE doctorschedule SET oslots= oslots - 1 WHERE id='$id' AND scheduleday = '$dayOfWeek'";
	                }
	                   else if($_POST['tmode'] == 'Home Visit')
	                {
	                  $reg = "UPDATE doctorschedule SET hslots= hslots - 1 WHERE id='$id' AND scheduleday = '$dayOfWeek'";
	                }
	                $query = mysqli_query($conn,$reg);
              }
                
               if ($sql && $_POST['tmode'] == 'Home Visit') {
                  echo "<script type='text/javascript'> alert('Confirmation Regarding Appointment Will Be given Shortly!!'); 
                                  document.location = 'doc_info.php'; </script>"; 
                }elseif($sql && $_POST['tmode'] == 'Online') {
                echo "<script type='text/javascript'> alert('Appointment Booked Successfully!!'); 
                                         document.location = 'doc_info.php'; </script>"; 	
                }elseif($sql && $_POST['tmode'] == 'Walkin') {
                echo "<script type='text/javascript'> alert('Appointment Booked Successfully!!'); 
                                         document.location = 'doc_info.php'; </script>"; 	
                }else{
                	echo "<script type='text/javascript'> alert('Something Went Wrong!'); 
                                         document.location = 'doc_info.php'; </script>"; 
                }
 }



?>
<head>
    <title>Otp Verification</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
   
    <link rel="stylesheet" href="css/style.css">
   
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/animate.css">

    <!--link href="assets/img/favicon.png" rel="icon"-->
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">


    <title></title>
    <style>

  .caption:hover{
  color: #0096FF;
  }
  #id:hover{
  color: #0096FF;
  }
  .form-group mb{

  }
</style>
  </head>
  <body>
 <?php
include_once('navuserhome.php');
?>

<div class="err" style="position: relative;
    top: 161px;
    text-align: center;
    color: red;"></div>
<div class="success" style="position: relative;
    top: 161px;
    text-align: center;
    color: green;"></div>
<div class="container" style="">
<form id="mobile-verification" action="otp-verification-form.php" method="post">
	<div class="mb-4">
		<label><h4 style="position: relative; right: 60px;top: 225px;left: 460px;">OTP is sent to Your Mobile Number</h4></label>		
	</div>
	<div class="mobile-row">
		<input type="number" name="mobileotp"  id="mobileOtp" class="mobile-input" placeholder="Enter the OTP" style="position: relative;left: 504px;width: 300px;top: 210px;">	
	</div>
	<input type="hidden" class="form-control" name="id" value="<?php echo $_POST['id']? $_POST['id']:''; ?>">
	<input type="hidden" class="form-control" name="username" value="<?php echo $_POST['username']? $_POST['username']:''; ?>">
	<input type="hidden" class="form-control" name="hname" value="<?php echo $_POST['hname']? $_POST['hname']:''; ?>">
	<input type="hidden" class="form-control" name="uemail" value="<?php echo $uemail; ?>">
	<input type="hidden" class="form-control" name="tmode" value="<?php echo $_POST['tmode']? $_POST['tmode']:''; ?>">
	<input type="hidden" class="form-control" name="pname" value="<?php echo $_POST['pname']? $_POST['pname']:''; ?>">
	<input type="hidden" class="form-control" name="age" value="<?php echo $_POST['age']? $_POST['age']:''; ?>">
	<input type="hidden" class="form-control" name="gender" value="<?php echo $_POST['gender']? $_POST['gender']:''; ?>">
	<input type="hidden" class="form-control" name="mobile" value="<?php echo $_POST['mobile']? $_POST['mobile']:''; ?>">
	<input type="hidden" class="form-control" name="aadharno" value="<?php echo $_POST['aadharno']? $_POST['aadharno']:''; ?>">
	<input type="hidden" class="form-control" name="booking_date" value="<?php echo $_POST['booking_date']? $_POST['booking_date']:''; ?>">
	<input type="hidden" class="form-control" name="dayOfWeek" value="<?php echo $dayOfWeek;?>">
	<input type="hidden" class="form-control" name="address" value="<?php echo $_POST['address']? $_POST['address']:''; ?>">
	<input type="hidden" class="form-control" name="hname" value="<?php echo $_POST['hname']? $_POST['hname']:''; ?>">
	<input type="hidden" class="form-control" name="description" value="<?php echo $_POST['description']? $_POST['description']:''; ?>">
    
	<div class="mobile-row">
		<input id="verify" type="button" class="btnVerify" value="Verify" onClick="verifyOTP();" style="position: relative;top: 236px; width: 152px;left: 577px;background-color: #0096FF;">		
	</div>
</form>
 <script src="js/jquery-3.3.1.min.js"></script>
<script>
	function verifyOTP() {
	$(".err").html("").hide();
	$(".success").html("").hide();
	var otp = $("#mobileOtp").val();
	var user_input = {
		"otp" : otp,
		"action" : "verify_otp"
	};
	if (otp.length == 6 && otp != null) {
	    $('#loading-image').show();
		$.ajax({
		 url : 'server.php',
		 type : 'POST',
		 dataType : "json",
		 data : user_input,
		 success : function(response) {
		 	if (response.type == 'success') {
		 	
		 	alert(response.message);
			$("." + response.type).html(response.message)
			$("." + response.type).show();
			$("#mobile-vemobilen").html("").hide();
			$("#mobile-verification").submit();
			}else{
				$(".err").html(response.message).show();
				//$("#mobile-verification").submit();
			}
		 },
		 complete: function(){
             $('#loading-image').hide();
         },
		 error : function() {
			 alert("Error");
			 alert('unsuccessful');
		}
		});
	} else {
		alert('You have entered wrong OTP.')
		
	}
}
</script>