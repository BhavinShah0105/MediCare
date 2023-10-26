<?php  
include_once('db_connection.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
  <title>Login</title>
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
</style>
  </head>
  <body>
  <?php
include_once('navuserhome.php');
?>

  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6 in-order-2 sm-6-content wow animated fadeInRight" data-wow-delay="0.22s">
          <img src="images/1.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8 in-order-2 sm-6-content wow animated fadeInLeft" data-wow-delay="0.22s">

              <div class="mb-4">
                <br><br>
              <h3>Sign In</h3>
              
            </div>
            <form action="#" method="post">
              <div class="form-group first mb-1">
                <label for="email">Email Id</label>
                <input type="text" class="form-control" name="email">

              </div>
               <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id = "password">

                <span style="    position: absolute; left: 350px; top: 26px;">
                	<i id="eye" class="fas fa-lock" aria-hidden="true" onclick="toggle()"></i>
                
                </span>

              </div>


              
              <div class="d-flex mb-4 align-items-center">
                <a href="register.php" style="text-decoration: none;"><span class="caption">Don't have an account?</span></a>
                  
                <span class="ml-auto" id="caption"><a href="fp.php" class="forgot-pass">Forgot Password</a></span> 
              </div>

              <input type="submit" name="submit" label="Sign Up" class="btn btn-block btn-primary" style="background-color:#0096FF">

              <center>
                <span class="d-block text-center my-4 text-muted">&mdash; or login with &mdash;</span>
              
              <div class="social-login">
                <!--a href="#" class="facebook">
                  <span class="icon-facebook mr-3"></span> 
                </a>
                <a href="#" class="twitter">
                  <span class="icon-twitter mr-3"></span> 
                </a-->


                <?php 
                  include_once('gregister.php');
                ?>

              </div>
              
              </center>

              
            </form>
            </div>
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
  
  $email = $_POST['email'];
    $password = $_POST['password'];
     $rmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
   

       if (empty($email)) {
      echo "<script type='text/javascript'> alert('Email required'); 
      document.location = 'login.php'; </script>";
      
   }elseif(!preg_match($rmail,$email)){
        echo "<script type='text/javascript'> alert('Invalid Email Id'); 
      document.location = 'login.php'; </script>";
    }

   if (empty($password)) {
     echo "<script type='text/javascript'> alert('Password required'); 
      document.location = 'login.php'; </script>";
   }


$login = "SELECT email,password FROM users WHERE email='$email' AND password='$password'";
$result=mysqli_query($conn,$login) or die(mysqli_error($conn));
if (mysqli_num_rows($result)==0) {
  echo "<script type='text/javascript'> alert('Enter correct password and email'); 
      document.location = 'login.php'; </script>";
}
else{
  $row=mysqli_fetch_array($result);
  $_SESSION['email']=$email;
  echo "<script type='text/javascript'> alert('Successfull'); 
      document.location = 'home.php'; </script>";
 
}

}
?>
