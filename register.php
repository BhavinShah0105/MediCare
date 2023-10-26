<?php 
include_once('db_connection.php');
$username=$email=$password="";
if (isset($_POST['submit']) ) {
    

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
   


  $r_name="/^[a-zA-Z0-9- ]{1,40}$/";
  $rmail = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
  $passs = '/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/';



    if(empty($username) && empty($email)){
    echo "<script type='text/javascript'> alert('Please Fill All The Fields'); 
      document.location = 'register.php'; </script>";
      
   }

    if (empty($username)) {
     echo "<script type='text/javascript'> alert('Enter Username'); 
      document.location = 'register.php'; </script>";
   }
   if (!preg_match($r_name, $username)) {
  echo "<script type='text/javascript'> alert('Invalid Username'); 
      document.location = 'register.php'; </script>";
}
  
  

   if (empty($email)) {
      echo "<script type='text/javascript'> alert('Enter Email'); 
      document.location = 'register.php'; </script>";
   }if(!preg_match($rmail,$email)){
        echo "<script type='text/javascript'> alert('Invalid Email Id'); 
      document.location = 'register.php'; </script>";
    }

    $check = "SELECT email FROM users WHERE email='$email'";
	$result=mysqli_query($conn,$check) or die(mysqli_error($conn));
	if (mysqli_num_rows($result)==1) 
                {
                 echo "<script type='text/javascript'> alert('Email ID Already Exists'); 
                         document.location = 'register.php'; </script>";
                           
                } 


   if (empty($password)) {
     echo "<script type='text/javascript'> alert('Enter Password'); 
      document.location = 'register.php'; </script>";
   }
   if(!preg_match($passs,$password)){
      

        echo "<script type='text/javascript'>  alert('Please Enter Password According to Note'); 
      document.location = 'register.php'; </script>";

      
    
  }

$insert = mysqli_query($conn, "INSERT INTO users(google_id,username,email,password) VALUES('_','$username','$email','$password')");

            if($insert){
                
                $_SESSION['username']=$username;
                $_SESSION['email']=$email; 
                echo "<script type='text/javascript'>  alert('Sign Up Successfully'); 
      				document.location = 'home.php'; </script>";
                
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }               
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Registration</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Style -->
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


    <style type="text/css">
      .caption:hover{color:#0096FF;}"
    </style>

    <title></title>
  </head>
  <body>
  

<body>

  <!-- ======= Header ======= -->
  <?php
include_once('navuserhome.php');
?>
  
  <div class="content">
    <div class="container">
      <div class="row">
       
        <div class="col-md-6 in-order-1 wow animated fadeInLeft" data-wow-delay="0.22s">
          <img src="images/3.jpg" alt="Image" class="img-fluid" style="position: relative; bottom: 30px;">
        
      </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8 in-order-2 sm-6-content wow animated fadeInRight" data-wow-delay="0.22s">
              <div class="mb-4">
              <h3>Sign Up</h3>
              
            </div>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <div class="form-group first mb-1">
                <label for="username">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo $username;?>">

              </div>
              <div class="form-group last mb-1">
                <label for="email">Email Id</label>
                <input type="text" class="form-control" name="email" value="<?php echo $email;?>">
                
              </div>
               <div class="form-group last mb-3 " onclick="toggle1()">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id = "password">
                <span style="    position: absolute; left: 350px; top: 26px;">
                    <i id="eye" class="fas fa-lock" aria-hidden="true" onclick="toggle()"></i>
                
                </span>

              </div>

              
                
                <p id = "x" style="display: none; color: black;">Note:-<br>
                Password must be a combination of atleast one uppercase & lowercase character and also number and symbol and length must be atleast 8 characters.</p>
             
              
              <div class="d-flex mb-4 align-items-center">
                <a href="login.php" style="text-decoration: none;  "><span class="caption">Already have an account?</span></a>
                 
                
              </div>

              <input type="submit" name="submit" label="Sign Up" class="btn btn-block btn-primary"  style="background-color:#0096FF";>

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

<script>
  function toggle1(){
    if (document.getElementById('x').style.display === 'none') {
    document.getElementById('x').style.display = 'block';
  }else{
    document.getElementById('x').style.display = 'none';
  }
}
</script>
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

