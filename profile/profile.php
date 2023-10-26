<?php
include_once('db_connection.php');
$var=$_SESSION['email'];
$login = "SELECT * FROM users WHERE email='$var'";
$result=mysqli_query($conn,$login) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$username=$row['username'];
$email=$row['email'];

?>

<?php

$appointment = "SELECT * FROM appointments WHERE user_email='$var' Order By  appointment_id DESC";
$result=mysqli_query($conn,$appointment) or die(mysqli_error($conn));
$rowcount=mysqli_num_rows($result);




$online="DELETE FROM hvrejectnotification WHERE user_email='$var'";
$delete = mysqli_query($conn,$online);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
  <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap-custom.min.css" />
        <link rel="stylesheet" type="text/css" href="css/home-fc7feca9f503fbeaf0f12645f3d0f2dc.css" />
 <link rel="stylesheet" type="text/css" href="css/bootstrap-custom.min.css" />
        <link rel="stylesheet" type="text/css" href="css/home-fc7feca9f503fbeaf0f12645f3d0f2dc.css" />
        <link rel="stylesheet" type="text/css" href="main.css">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
     
        <style type="text/css">
          #myModal{
  margin-top: 80px;
}
#myModal1{
  margin-top: 0px;
}
.modal-login {  
  color: #636363;
  width: 350px;
}
.modal-login .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
}
.modal-login .modal-header {
  border-bottom: none;   
  position: relative;
  justify-content: center;
}
.modal-login h4 {
  text-align: center;
  font-size: 26px;
  margin: 30px 0 -15px;
}
.modal-login .form-control:focus {
  border-color: #70c5c0;
}
.modal-login .form-control, .modal-login .btn {
  min-height: 40px;
  border-radius: 3px; 
}
.modal-login .close {
  border: none;
  outline: none;
  position: absolute;
  top: -5px;
  right: -5px;
} 
.modal-login .modal-footer {
  background: #ecf0f1;
  border-color: #dee4e7;
  text-align: center;
  justify-content: center;
  margin: 0 -20px -20px;
  border-radius: 5px;
  font-size: 13px;
}
.modal-login .modal-footer a {
  color: #999;
}   
.modal-login .avatar {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  top: -60px;
  width: 95px;
  height: 95px;
  border-radius: 50%;
  z-index: 9;
  background: #a4c639;
  padding: 15px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-login .avatar img {
  width: 100%;
}
.modal-login.modal-dialog {
  margin-top: 80px;
}
.modal-login .btn, .modal-login .btn:active {
  color: #fff;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  border: none;
}

        </style>
      </head>
<body>
<?php 
include_once('profilenav.php');
?> 
              
               <div class="row" id="userCardContainer">
                      <div class="col-sm-10 hidden-xs user-card-wrapper separator"><div class="user-card row bg-white">
                        <div class="product-name heading-two col-sm-3 col-lg-2">Your Profile</div>
                        <div class="user-info col-sm-9 col-lg-10">
                          <div class="user-details">
                            <div class="user-name heading-four"><?php echo htmlspecialchars($username);?></div>
                            <div class="user-contact text-small subtle"><!-- react-text: 66 --><?php echo htmlspecialchars($email);?><!-- /react-text --><!-- react-text: 18 --><!-- /react-text --></div>
                          </div>
                        </div>
                      </div>
                    </div>
                </div>
                </body>
               
                
                 <?php
                 include_once('profilesidebar.php');
                 ?>
         
                 <div class="app-container"style="position: relative;top:-795px;width: 1270px;left: 241px;">
                 <div data-reactroot=""class="main-container bg-grey"style="overflow: auto;position: relative; top: 72px; text-align: center;">
                                    <?php
                                                    if($rowcount > 0){

                                 $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

                                     foreach ($row as $row){ ?>
                                   <div class="container">
                                      <div class="row">
                                          <div class="col-lg-4">
                                              <div class="card card-margin" style="position: relative;width: 625px;top:70px;left: 267px;height: 236px;">
                                                  <div class="card-header no-border">
                                                      <h5 class="card-title" ></h5>
                                                  </div>
                                                  <div class="card-body pt-0">
                                                      <div class="widget-49">
                                                          <div class="widget-49-title-wrapper">
                                                              <div class="widget-49-date-primary"style="position: absolute;top: 78px;left: 25px;">
                                                                  <span class="widget-49-date-day"style="font-size: 22px;" ><?php echo htmlspecialchars($row['appointment_id']);?></span>
                                                                  
                                                              </div>
                                                              <div class="widget-49-meeting-info" style="overflow: hidden;">
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 41px;font-size: 17px;">Doctor Name: Dr.<?php echo htmlspecialchars($row['doc_name']);?> </span>
                                                                  <span class="widget-49-pro-title"style="    position: absolute;left: 113px;font-size: 17px;top: 64px;">Patient Name: <?php echo htmlspecialchars($row['pname']);?> </span>

                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 86px;font-size: 17px; ">Appointment Date:<?php echo htmlspecialchars($row['booking_date']);?></span>
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 110px;font-size: 17px;">Appointment Booking Time:<?php echo htmlspecialchars($row['booking_time']);?></span>
                                                                   <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 159px;font-size: 17px;">Hospital Name:<?php echo htmlspecialchars($row['hname']);?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 135px;font-size: 17px;">Treatment Mode:<?php echo htmlspecialchars($row['tmode']);?></span>


                                                                    

                                                          <?php $a_id = $row['appointment_id'];


                                                          $modid = rand(10,100);



                                                            ?>
                                                       

                                                         <button href="#myModal<?php echo $row['appointment_id'];  ?>" class="btn btn-danger" data-toggle="modal" style="position: absolute;top: 173px;left: 492px;"><i id="lil3" class="fas fa-user-circle"></i>Cancel</button>
                                                          <div id="myModal<?php echo $row['appointment_id'];  ?>" class="modal fade">
  <div class="modal-dialog modal-login">
    <div class="modal-content">

      <div class="modal-body">
        <form method='POST' action="capp.php">
          <div class="form-group">
            <textarea type="text" class="form-control" name="reason" placeholder="Enter your reason here.." required="required" style="resize:none" cols="1" rows=""></textarea>  
          </div>
      <input type='hidden' value="<?php echo $row['appointment_id'];  ?>" name='appointment_id'>       
          <div class="form-group">
            <button type="submit" name="signin" class="btn btn-danger btn-lg btn-block login-btn">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div> 

                                                              </div>
                                                          </div>

                                                         
                                         

                                                              
                                                          </div>

                                                          
                                            
                                                     <!--/form-->
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                  </div>
                <?php }}else{
                  echo "No Records Found";
                } ?>
                  </div>
                </div>

      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>                   
                       

      </body>
    </html>