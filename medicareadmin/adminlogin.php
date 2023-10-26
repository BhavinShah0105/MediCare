<?php

include_once('db_connection.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>MediCare Admin Login</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
<style>
body {
	color: #fff;
	background: #3598dc;
}
.form-control {
	min-height: 41px;
	background: #f2f2f2;
	box-shadow: none !important;
	border: transparent;
}
.form-control:focus {
	background: #e2e2e2;
}
.form-control, .btn {        
	border-radius: 2px;
}
.login-form {
	width: 350px;
	margin: 30px auto;
	text-align: center;
}
.login-form h2 {
	margin: 10px 0 25px;
}
.login-form form {
	color: #7a7a7a;
	border-radius: 3px;
	margin-bottom: 15px;
	background: #fff;
	box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
	padding: 30px;
}
.login-form .btn {        
	font-size: 16px;
	font-weight: bold;
	background: #3598dc;
	border: none;
	outline: none !important;
}
.login-form .btn:hover, .login-form .btn:focus {
	background: #2389cd;
}
.login-form a {
	color: #fff;
	text-decoration: underline;
}
.login-form a:hover {
	text-decoration: none;
}
.login-form form a {
	color: #7a7a7a;
	text-decoration: none;
}
.login-form form a:hover {
	text-decoration: underline;
}
</style>
</head>
<body>
<div class="login-form">
    <form  method="post" style="position: relative;top: 114px;">
        <h2 class="text-center">Login</h2>   
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder=" Enter Username" >
        </div>   
		    <div class="form-group">
            <input type="password" class="form-control" name="password" id = "password" placeholder="Enter Password" >
            <span style="position: relative;left: 127px;top: -32px;">
                  <i id="eye" class="fas fa-lock" aria-hidden="true" onclick="toggle()"></i>
            </span>
        </div>        
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
        </div>
        
    </form>
    
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
  
  
  $username = $_POST['username'];
    $password = $_POST['password'];
    
    

     if(empty($username) && empty($password)){
    echo "<script type='text/javascript'> alert('Please Fill All The Fields'); 
      document.location = 'adminlogin.php'; </script>";
      return;
   }
   
       if (empty($username)) {
      echo "<script type='text/javascript'> alert('Username required'); 
      document.location = 'adminlogin.php'; </script>";
      return;
   }

   if (empty($password)) {
     echo "<script type='text/javascript'> alert('Password required'); 
      document.location = 'adminlogin.php'; </script>";
      return;
   }


$login = "SELECT * FROM medicareadmin WHERE username = '$username' AND password = '$password'";
$result=mysqli_query($conn,$login) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);

if (mysqli_num_rows($result)==0) {
  echo "<script type='text/javascript'> alert('Something went wrong.. Please try again'); 
      document.location = 'adminlogin.php'; </script>";
      return;
}else{
$_SESSION['username']=$username;
echo "<script type='text/javascript'> alert('Welcome Admin'); 
      document.location = 'admin.php'; </script>";
    }
}
?>
