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

  <style type="text/css">
    body{

    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}

.comment {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    padding: 20px;
    width: 450px;
    word-wrap: break-word;
    background-color: white;
    background-clip: border-box;
    border-radius: 6px;
    -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
}

.comment-box {
    padding: 5px
}

.comment-area textarea {
    resize: none;
    border: 1px solid #ad9f9f
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ffffff;
    outline: 0;
    box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
}

.send {
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000
}

.send:hover {
    color: #fff;
    background-color: #f50202;
    border-color: #f50202
}

.rating {
    display: flex;
    margin-top: -10px;
    flex-direction: row-reverse;
    margin-left: -4px;
    float: left
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 19px;
    font-size: 25px;
    color: #ff0000;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}

.card-no-border .comcard {
    border: 0px;
    border-radius: 4px;
    -webkit-box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05);
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.05)
}

.comcard-body {
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1.25rem
}

.comment-widgets .comment-row:hover {
    background: rgba(0, 0, 0, 0.02);
    cursor: pointer
}

.comment-widgets .comment-row {
    border-bottom: 1px solid rgba(120, 130, 140, 0.13);
    padding: 15px
}

.comment-text:hover {
    visibility: hidden
}

.comment-text:hover {
    visibility: visible
}

.label {
    padding: 3px 10px;
    line-height: 13px;
    color: #ffffff;
    font-weight: 400;
    border-radius: 4px;
    font-size: 75%
}

.round img {
    border-radius: 100%
}

.label-info {
    background-color: #1976d2
}

.label-success {
    background-color: green
}

.label-danger {
    background-color: #ef5350
}

.action-icons a {
    padding-left: 7px;
    vertical-align: middle;
    color: #99abb4
}

.action-icons a:hover {
    color: #1976d2
}

.mt-100 {
    margin-top: 100px
}

.mb-100 {
    margin-bottom: 100px
}

  </style>

</head>
<body>
 
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
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap" style="overflow: hidden;            height: 391px;">
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
                      <a class="btn btn-info"  href="#" style="background-color : #0096FF; color : white;" >Book Appointment</a>
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
                          <div class="wtime" style="position: absolute;top: 90px;left: 210px;">
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "-".$row['wendtime']."<br>"."";
                           
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
                          <div class="wtime" style="position: absolute;top: 90px;left: 210px;">
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "-".$row['oendtime']."<br>"."";
                           
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
                          <div class="wtime" style="position: absolute;top: 90px;left: 210px;">
                          
                          <?php
                          $result = mysqli_query($conn, $sql) or die(mysqli_error($conn));
                        while($row = mysqli_fetch_assoc($result)) {

                           echo "-".$row['hendtime']."<br>"."";
                           
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
     

                                                                                              <!--Comment-->



<!--div class="col-sm-6 mb-3">
                  <div class="card h-100" style="position: absolute;top: 318px;left: 125px;min-height: 1500px;width: 1000px; overflow: hidden;">
                    <div class="card-body">
                      <h6 class="d-flex align-items-center mb-3"></h6>
              
              <div class="container d-flex justify-content-center mt-100 mb-100">
    <div class="row">
        <div class="col-md-12">
            <div class="comcard">
                <div class="comcard-body">
                    <h4 class="card-title">Recent Comments</h4>
                    
                </div>
                <div class="comment-widgets m-b-20">
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><span class="round"></span></div>
                        <div class="comment-text w-100">
                            <h5>Samso Nagaro</h5>
                            <div class="comment-footer"> <span class="date">April 14, 2019</span><a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10">abc</p>
                        </div>
                    </div>
                    <div class="d-flex flex-row comment-row ">
                        <div class="p-2"></span></div>
                        <div class="comment-text active w-100">
                            <h5>Jonty Andrews</h5>
                            <div class="comment-footer"> <span class="date">March 13, 2020</span>  <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right text-success"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart text-danger"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10"></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"></span></div>
                        <div class="comment-text w-100">
                            <h5>Sarah Tim</h5>
                            <div class="comment-footer"> <span class="date">Jan 20, 2020</span> <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10"></p>
                        </div>
                    </div>
                    <div class="d-flex flex-row comment-row">
                        <div class="p-2"><span class="round"></span></div>
                        <div class="comment-text w-100">
                            <h5>Samso Nagaro</h5>
                            <div class="comment-footer"> <span class="date">March 20, 2020</span>  <a href="#" data-abc="true"><i class="fa fa-pencil"></i></a> <a href="#" data-abc="true"><i class="fa fa-rotate-right"></i></a> <a href="#" data-abc="true"><i class="fa fa-heart"></i></a> </span> </div>
                            <p class="m-b-5 m-t-10"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


 <h4>Add a comment</h4>
               <form method="post">
                <div class="comment-area"> <textarea class="form-control" placeholder="what is your view?" rows="2" name="comment"></textarea> </div>
                <div class="comment-btns mt-2">
                    <div class="row">
                        <div class="col-6">
                            <div class="pull-left"> <button class="btn btn-success btn-sm" style="    position: absolute;left:662px;">Cancel</button> </div>
                        </div>
                        <div class="col-6">
                            <div class="pull-right"> <button class="btn btn-success send btn-sm"  type="submit" name="submit" style="position: absolute;left: 328px;">Send <i class="fa fa-long-arrow-right ml-1"></i></button> </div>
                        </div>
                    </div>
                </div>
             
</form> 



                    </div>
                  </div>
                </div>
              </div>

                                                                                                  <Rattings>

              <div class="rating"> <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label> <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label> <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label> <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label> <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label> </div-->

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