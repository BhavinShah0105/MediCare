<html>
<head>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

  <?php 
include_once('db_connection.php');
if(isset($_SESSION['email'])){
  ?>
<header id="header" class="fixed-top" style="position: relative;height: 72px;">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo" style="position: relative;right: 129px;bottom: 15px;"><a href="home.php">MediCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar" style="position: relative;left:158px;bottom: 5px;">
        <ul>
          <li><a class="nav-link scrollto active" href="../home.php">Home</a></li>
          <li><a class="nav-link scrollto " href="../aboutus.php">About Us</a></li>
          <li><a class="nav-link scrollto" href="../doc_info.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../blogshow.php">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li><a class="nav-link scrollto" href="../plasma.php">Plasma Donate</a></li>
          <li><a class="nav-link scrollto" href="./profile/profile.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="../logout.php">Logout</a></li>
          <li><a class="getstarted scrollto" href="../doc_info.php">Book Appointment</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<?php
}else{

  ?>
<header id="header" class="fixed-top" style="position: relative;height: 72px;">
    <div class="container d-flex align-items-center justify-content-between">
      <h1 class="logo" style="position: relative;right: 187px;bottom: 15px;"><a href="home.php">MediCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar" style="position: relative;left: 207px;bottom: 5px;">
        <ul>
          <li><a class="nav-link scrollto active" href="../home.php">Home</a></li>
          <li><a class="nav-link scrollto " href="../aboutus.php">About Us</a></li>
          <li><a class="nav-link scrollto" href="../doc_info.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="../blogshow.php">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li><a class="nav-link scrollto" href="../plasma.php">Plasma Donate</a></li>
          <li><a class="nav-link scrollto" href="../login.php">Login</a></li>
          <li><a class="getstarted scrollto" href="../doc_info.php">Book Appointment</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header>
  <?php
}
?>