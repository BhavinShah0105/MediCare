<?php 
include_once('db_connection.php');
if(isset($_SESSION['email'])){
  ?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="home.php">MediCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
          <li><a class="nav-link scrollto " href="aboutus.php">About Us</a></li>
          <li><a class="nav-link scrollto" href="doc_info.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="blogshow.php">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li><a class="nav-link scrollto" href="plasma.php">Plasma Donate</a></li>
          <li><a class="nav-link scrollto" href="./profile/profile.php">Profile</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
          <li><a class="getstarted scrollto" href="doc_info.php">Book Appointment</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<?php
}else{

  ?>
<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center justify-content-between">

      <h1 class="logo"><a href="home.php">MediCare</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="home.php">Home</a></li>
          <li><a class="nav-link scrollto " href="aboutus.php">About Us</a></li>
          <li><a class="nav-link scrollto" href="doc_info.php">Doctors</a></li>
          <li><a class="nav-link scrollto" href="blogshow.php">Blog</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact Us</a></li>
          <li><a class="nav-link scrollto" href="plasma.php">Plasma Donate</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
          <li><a class="getstarted scrollto" href="doc_info.php">Book Appointment</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <?php
}
?>