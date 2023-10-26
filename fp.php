<?php  

include_once('db_connection.php');

?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Forgot Password</title>
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

</head>


    <title></title>
    <style type="text/css">
      .caption:hover{color:#0096FF;}"
    </style>
  </head>
  <body>
    <?php
include_once('navuserhome.php');
?>

  <div class="footer-three-grid wow fadeIn animated" data-wow-delay="0.66s">

  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="images/2.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
                <br><br><br><br><br>
              <h3>Update your Password</h3>
              
            </div>
            <form action="#" method="post">
              <div class="form-group first mb-1">
                <label for="email">Email Id</label>
                <input type="text" class="form-control" name="email">

              </div>
               <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id = "password">

                <span style="position: absolute; left: 350px; top: 26px;">
                  <i id="eye" class="fas fa-lock" aria-hidden="true" onclick="toggle()"></i>
                
                </span>

              </div>
              <div class="d-flex mb-4 align-items-center">
                <a href="login.php" style="text-decoration: none;  "><span class="caption">Already have an account?</span></a>
                 
                               </div>
              <input type="submit" name="submit" value="Update" class="btn btn-block btn-primary" style="background:
              #0096FF;">

              

              
            </form>
            </div>
          </div>
          
        </div>
        
      </div>
    </div>
  </div>

  <script>
    
    
      var state = false;
      function toggle(){
        if (state) {

          document.getElementById("password").setAttribute("type","password");
          document.getElementById("eye").className = "fas fa-lock";
          state = false;

        }else{

          document.getElementById("password").setAttribute("type","text");
          document.getElementById("eye").className = "fas fa-unlock";
          state = true;

        }
      }
      

      

  </script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
<?php

if (isset($_POST['submit'])) {
	
	$existemail = $_POST['email'];
	$npass = $_POST['password'];

	echo $existemail;


	if(empty($existemail)) {
      echo "<script type='text/javascript'> alert('Enter Email'); 
      document.location = 'fp.php'; </script>";
        
   } 
   if(empty($npass)) {
      echo "<script type='text/javascript'> alert('Enter Email'); 
       document.location = 'docfp.php'; </script>";
         
   } 
 $check = "SELECT email FROM users WHERE email='$existemail'";
$result=mysqli_query($conn,$check) or die(mysqli_error($conn));
if (mysqli_num_rows($result)==0) 
                {
                	echo "<script type='text/javascript'> alert('Email ID doesnt exists.'); 
      document.location = 'fp.php'; </script>";
      
                  
                }else{

                	$reg = "UPDATE users SET password = '$npass' WHERE email='$existemail'";
                    mysqli_query($conn, $reg);

                    echo "<script type='text/javascript'> alert('Password Updated Successfully'); 
                         document.location = 'login.php'; </script>"; 
                }



       }  
    
   
     



 /*function checkUserNameExists($con,$username)
       {
                $query = $con->prepare("
                         SELECT * FROM users WHERE username=:username 
                  ");
                $query->bindParam(":username",$username);
                $query->execute();

                if($query->rowcount() == 1)
                {
                  return false;
                } else {
                  return true;
                }

       }*/
       
?>
