<?php
include_once('db_connection.php'); 

$id = $_POST['id'];
$sql = "SELECT * FROM doctors where id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

  $username=$row['username'];
  $email=$row['email'];
  $password=$row['password'];
  $speciality=$row['speciality'];
  $description=$row['description'];
  $experience=$row['experience'];
  $hcharges=$row['hcharges'];
  $ocharges=$row['ocharges'];
  $image=$row['image'];
  $hname=$row['hname'];
  $gender=$row['gender'];
  $age=$row['age'];
  $contact=$row['contact'];
  $degree=$row['degree'];
  $wcharges=$row['wcharges'];
  }
} else {
  echo "0 results";
}



?>
<?php
 $username=ucfirst($username);
  $speciality=ucfirst($speciality);
  $description=ucfirst($description);
 
 
  $hname=ucfirst($hname);
  $gender=ucfirst($gender);
  
  $degree=ucfirst($degree);
  
?>

<?php 
$id = $_POST['id'];
$sql = "SELECT * FROM doctorschedule where id = '$id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

    $id=$row['id'];
    $scheduleday=$row['scheduleday'];
    $wstarttime=$row['wstarttime'];
    $wendtime=$row['wendtime'];
    $wslots=$row['wslots'];
    $ostarttime=$row['ostarttime'];
    $oendtime=$row['oendtime'];
    $oslots=$row['oslots'];
    $hstarttime=$row['hstarttime'];
    $hendtime=$row['hendtime'];
    $hslots=$row['hslots'];
  }
} else {
  echo "0 results";
}
 ?>

<DOCTYPE html>
<html lang="en">
<head>
 <html>
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="description">
  <meta content="" name="keywords">
<title>Doctor's Profile</title>
 
  <!--link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon"-->


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Krub:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel="stylesheet" type="text/css" href="css/practodocprofile.css">

 

</head>
<body>
 <?php
include_once('navuserhome.php');
?>
<br><br><br><br>
  <div class="container">
    <div class="main-body">
    
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="images/<?php echo htmlspecialchars($image );?>" alt="Admin" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4>Dr.<?php echo htmlspecialchars($username );?></h4>
                      <p class="text-secondary mb-1" style="font-size :18px;"> <?php echo htmlspecialchars($speciality );?></p>
                      <p class="text-muted font-size-sm"style="font-size :18px;"><?php echo htmlspecialchars($degree );?></p>
                
                    </div>
                  </div>
                </div>
              </div>

                                                          <!--Description-->

              <div class="card mt-3">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="overflow: hidden;            height: 313px;">
                    <h6 class="d-flex align-items-center mb-3" style="position : absolute; top: 20px; left: 150px; font-size :18px;"><b>Description</b></h6>
                      <div class="a" style="position : absolute; top : 50px; "><?php echo htmlspecialchars($description);?><br></div>
                      <div class="time"style="position : absolute; top : 5px; left: 220px;">                 
                   </div>
                  </li>
                  
                </ul>
              </div>
            </div>

            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;">Full Name</h6>

                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($username );?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($email );?>
                    </div>
                  </div>
                  <hr>
                    <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;">Experience</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($experience );?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;">Age</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($age );?>
                    </div>
                  </div>
                  <hr>
                   <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;">Gender</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($gender );?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;"> Charges For Walkin Appointments</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($wcharges );?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;"> Charges For Online Appointments</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($ocharges );?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;"> Charges For Visits</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($hcharges );?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0" style="font-size : 16px;">Hospital Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary" style="font-size : 16px;">
                      <?php echo htmlspecialchars($hname );?>
                    </div>
                  </div>
                  <hr>
                  
                  <div class="row">
                    <div class="col-sm-12">
                      <form action="appointment.php" method="post" >
                        <input type="hidden" value="<?php echo htmlspecialchars($row['id'] );?>" name="id">
                        <input type="hidden" value="<?php echo htmlspecialchars($row['hname'] );?>" name="hname">
                        <input type="hidden" value="<?php echo htmlspecialchars($row['username'] );?>" name="username" id="doc_name">
                    <button id="b2" class="btn btn-info">Book Appointment</button>
                    </div>
                  </div>
                </div>
              </div>
            
               
                                                                  <!--left Block-->

            <div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                 <div class="card h-100"style="    position: absolute;  top: 60px;right: 437px;min-height: 303px;width: 408px;">
               
                    <div class="card-body" style="position:">
                     <center> <h6 class="d-flex align-items-center mb-3" style="font-size : 18px; position: absolute; left: 120px;"><b>Schedule For Walkin</b></h6></center>
                        <div class="b" style="font-size : 16px; ">
                          <div class="days" style="position: absolute;top: 80px;">
                          <h6><b style="position : absolute;top: -25px;">Days</b></h6>
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo " ".$row['scheduleday']."<br>"."";
                           
                           }          
                           ?>
                           </div>
                        </div>

                          <div class="b" style="font-size : 16px;">
                          <div class="wtime" style="    position: absolute;top: 63px;left: 141px;">
                           <h6><b style="position: relative;left: 33px;    top: -9px;">Timings</b></h6>
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo " ".$row['wstarttime']."<br>"."";
                           
                           }          
                           ?>
                           </div>
                        </div>

                        <div class="b" style="font-size : 16px;">
                          <div class="wtime" style="position: absolute;top: 82px;left: 214px;">
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          $rowcount=mysqli_num_rows($result);

                            if($rowcount > 0){
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "-".$row['wendtime']."<br>"."";
                           
                           }}else{
                            
                            echo"<p style='    position: relative;
    right: 55px;
    top: 50px;'>"."No Schedule"."</p>";
                           }          
                           ?>
                           </div>
                        </div>

                        <div class="b" style="font-size : 16px;">
                        <div class="wtime" style="position: absolute;top: 43px;left: 305px;">
                        <h6><b style="position: relative;left:px;">Available slots</b></h6>
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "".$row['wslots']."<br>"."";
                           
                           }          
                           ?>
                            <p class="note" style="    position: absolute;top: 236px;left: -297px;"><b> Note:- </b>This Schedule is only for current week</p>
                           </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>

                                                                         <!--Middel Block-->

<div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                 <div class="card h-100"style="    position: absolute;
       top: 45px;
        right: 10px;
    min-height: 303px;
    width: 408px;
">
                    <div class="card-body" style="position: relative;">
                   <center>   <h6 class="d-flex align-items-center mb-3" style="font-size : 18px;position: absolute; left: 120px;"><b>Schedule For Online</b></h6></center>
                        <div class="b" style="font-size : 16px; ">
                          <div class="days" style="    position: absolute;top: 80px;">
                          <h6><b style="position : absolute;top: -25px;">Days</b></h6>
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo " ".$row['scheduleday']."<br>"."";
                           
                           }          
                           ?>
                           </div>
                        </div>

                          <div class="b" style="font-size : 16px;">
                          <div class="wtime" style="    position: absolute;top: 63px;left: 141px;">
                          <h6><b style="position: relative;left: 33px;    top: -9px;">Timings</b></h6>
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo " ".$row['ostarttime']."<br>"."";
                           
                           }          
                           ?>
                           </div>
                        </div>

                        <div class="b" style="font-size : 16px;">
                          <div class="wtime" style="position: absolute;top: 82px;left: 214px;">
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          $rowcount=mysqli_num_rows($result);

                            if($rowcount > 0){
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "-".$row['oendtime']."<br>"."";
                           
                           } }else{
                            
                            echo"<p style='    position: relative;
    right: 55px;
    top: 50px;'>"."No Schedule"."</p>";
                           }          
                           ?>
                           </div>
                        </div>

                        <div class="b" style="font-size : 16px;">
                        <div class="wtime" style="position: absolute;top: 43px;left: 312px;">
                         <h6><b style="">Available slots</b></h6>
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "".$row['oslots']."<br>"."";
                           
                           }          
                           ?>
                        <p class="note" style="    position: absolute;top: 236px;left: -297px;"> <b> Note:- </b >This Schedule is only for current week</p>
                           </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>


                                                                              <!--Right Block-->

<div class="row gutters-sm">
                <div class="col-sm-6 mb-3">
                               <div class="card h-100"style="    position: absolute;
    top: 29px;
    right: -416px;
    min-height: 303px;
     width: 408px;
">
                    <div class="card-body" style="">
                  <h6 class="d-flex align-items-center mb-3" style="font-size : 18px;position: absolute; left: 120px;"><b>Schedule For Visits</b></h6>
                        <div class="b" style="font-size : 16px;">
                           <div class="days" style="position: absolute;top: 80px;">
                          <h6><b style="position : absolute;top: -25px;">Days</b></h6>
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo " ".$row['scheduleday']."<br>"."";
                           
                           }          
                           ?>
                           </div>
                        </div>

                          <div class="b" style="font-size : 16px;">
                          <div class="wtime" style="position: absolute;top: 63px;left: 141px;">
                           <h6><b style="position: relative;left: 33px;    top: -9px;">Timings</b></h6>
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo " ".$row['hstarttime']."<br>"."";
                           
                           }          
                           ?>
                           </div>
                        </div>

                        <div class="b" style="font-size : 16px;">
                          <div class="wtime" style="position: absolute;top: 82px;left: 214px;">
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          $rowcount=mysqli_num_rows($result);

                            if($rowcount > 0){
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "-".$row['hendtime']."<br>"."";
                           
                           }}else{
                            
                            echo"<p style='    position: relative;
    right: 55px;
    top: 50px;'>"."No Schedule"."</p>";
                           }           
                           ?>
                           </div>
                        </div>

                        <div class="b" style="font-size : 16px;">
                       <div class="wtime" style="position: absolute;top: 43px;left: 312px;">
                          <h6><b style="position: relative;left:px;">Available slots</b></h6>
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                          
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "".$row['hslots']."<br>"."";
                           
                           }         
                           ?>
                           <p class="note" style="    position: absolute;top: 236px;left: -297px;"> <b> Note:- </b>This Schedule is only for current week</p>
                           </div>

                        </div>



                      </div>
                    </div>
                  </div>
                </div>






              </div>
            </div>
          </div>
        </div>
      </body>
              
  
   <div>




     

<div style="
    
    position: relative;
    top: 336px;
">



    <!-- comments head starts here -->
    <div class="c-profile--sections" style="position: relative;
    left: 134px;">

        <h2 data-qa-id="doctor-info-feedback" class="c-profile--feedback_heading"><span>Patient Stories for</span>
         <!-- -->Dr. <?php echo "$username"; ?></h2>
     </div>
<!-- comments head ends here -->

     <div class="u-separator" style="
    width: 800px;
    position: relative;
    left: 134px;;
"></div>

<?php  
$sql= "SELECT * FROM rating WHERE doc_id = '$id'";
$result = mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);

if($rowcount > 0){
$doctors=mysqli_fetch_all($result,MYSQLI_ASSOC);

mysqli_free_result($result);

foreach ($doctors as $doctors){

?>


     <div class="c-profile--sections" style="position: relative;left: 134px;">
        <div class="feedback--list-container" >
            
        <div>

<!-- comments body starts here -->

<div class="pure-g feedback--item u-cushion--medium-vertical" data-qa-id="feedback_item"><div class="pure-u-2-24"><div class="feedback__icon" data-qa-id="reviewer-image" style="background-color:#FFF9B3; "><?php echo substr($doctors['pname'],0,1);?></div></div>

<div class="pure-u-22-24 u-lheight-default"><div><div class="u-cushion--bottom u-color--grey3 u-cushion--small-top"><span class="u-bold" data-qa-id="reviewer-name"><?php echo $doctors['pname']; ?> </span>&nbsp;<span class="u-bold">(<span>Verified</span>)</span><span data-qa-id="web-review-time" class="u-spacer--left-thin u-f-right">&nbsp;<span><?php echo $doctors['tpstp']; ?></span>&nbsp;</span></div></div>

<div class="feedback__body"><div class="u-cushion--small-bottom u-large-font"><i class="u-large-font  u-cushion--small-right icon-ic_like" data-qa-id="feedback_thumbs_up"></i><span>I recommend the doctor</span></div>

<div><p class="feedback__content u-large-font u-d-inline" data-qa-id="review-text">  
<?php echo $doctors['review']; ?>
</p></div></div></div></div> 

 <!-- comments body ends here -->


</div>
</div>
</div>
<?php }}else{ ?>

  <div class="c-profile--sections" style="position: relative;
    left: 134px;">
        <div class="feedback--list-container">
            
            <div>



<div class="pure-g feedback--item u-cushion--medium-vertical" data-qa-id="feedback_item"><div class="pure-u-2-24"><div class="feedback__icon" data-qa-id="reviewer-image" style="background-color:#FFF9B3">C</div></div>

<div class="pure-u-22-24 u-lheight-default"><div><div class="u-cushion--bottom u-color--grey3 u-cushion--small-top"><span class="u-bold" data-qa-id="reviewer-name"> </span>&nbsp;<span class="u-bold">(<span></span>)</span><span data-qa-id="web-review-time" class="u-spacer--left-thin u-f-right">&nbsp;<span></span>&nbsp;</span></div></div>

<div class="feedback__body"><div class="u-cushion--small-bottom u-large-font"><i class="u-large-font  u-cushion--small-right icon-ic_like" data-qa-id="feedback_thumbs_up"></i><span>No Reviews</span></div>

<div><p class="feedback__content u-large-font u-d-inline" data-qa-id="review-text">  

</p></div></div></div></div> 

 <!-- comments body ends here -->


</div>
</div>
</div>

<?php }?>


</div>

</div>
</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br>



</body>
</html>
</script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/mobster.js"></script>
  </body>
</html>


<!--div class="card-body" style="position: absolute;">
                      <h6 class="d-flex align-items-center mb-3" style="font-size : 18px;"><b></b></h6>
                        <div class="b" style="font-size : 16px;">
                         
                           
                           </div>
                        </div>


                      </div>
                    </div>
                  </div>
                </div>



   </div--