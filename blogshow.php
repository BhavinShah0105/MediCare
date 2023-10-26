<?php 
include_once('db_connection.php'); 
$sqlb= 'SELECT * FROM confirmblog LIMIT 1   ';
$resultb = mysqli_query($conn,$sqlb);
$rowcount=mysqli_num_rows($resultb);


?> 
<?php 
if($rowcount > 0){
$blog=mysqli_fetch_array($resultb);
$id=$blog['doc_id'];

}
?>
<html>
<title>Blogs</title>
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
 <header id="header" class="fixed-top">
    <?php
include_once('navuserhome.php');
?>
  </header><!-- End Header -->

  <body>
    <main id="main">
<?php 
$sqlb= 'SELECT * FROM confirmblog Order by btime DESC LIMIT 1 ';
$resultb = mysqli_query($conn,$sqlb);
$rowcount=mysqli_num_rows($resultb);

if($rowcount > 0){

$blog=mysqli_fetch_array($resultb); ?>
<section>
 <form method="POST"action="blogshow.php">
        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="images/<?php echo htmlspecialchars($blog['image'] );?>" class="img-fluid" alt="" style="position: relative;left: -37px;">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right" >
            <h2 style="position: relative;bottom:151px;px;text-align: center;left: 361px;"><?php echo htmlspecialchars(ucfirst($blog['title']) );?></h2>
          </div>
            <p class="fst-italic"style="position: relative;top: 134px;width: 800px;left: 77px;">
              <?php echo htmlspecialchars($blog['para1'] );?> </p>    
                <input type='hidden' value="<?php echo $blog['doc_id'];  ?>" name='doc_id'>
        </div>  
  </form>
         <div data-aos="fade-left">
          <p class="fst-italic"style="position: relative;left: 75px;width: 1300;">
              <?php echo htmlspecialchars($blog['para2'] );?> 
          </p>
          <p class="fst-italic"style="position: relative;left: 75px;width: 1300;">
              <?php echo htmlspecialchars($blog['para3'] );?> 
          </p>
          <mark>
            <p class="fst-italic"style="position: relative;left: 1250px;">
              By,
              Dr.<?php echo htmlspecialchars($blog['doc_name'] );?>  <br>
              <?php echo htmlspecialchars($blog['btime'] );?> 
          </p>
          </mark>
         </div>
  </section>
<?php } else { ?>
  <section>
 
        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="" class="img-fluid" alt="" style="position: relative;left: -37px;">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right" >
            <h2 style="position: relative;bottom: 125px;text-align: center;left: 361px;"></h2>
          </div>
            <p class="fst-italic"style="position: relative;top: 134px;width: 800px;left: 77px;">
                
                <input type='hidden' value="<?php echo $blog['doc_id'];  ?>" name='doc_id'>
        </div>  
  </form>
         <div data-aos="fade-left">
          <p class="fst-italic"style="position: relative;left: 75px;width: 1300;">
             
          </p>
          <p class="fst-italic"style="position: relative;left: 75px;width: 1300;">
             
          </p>
          <mark>
            <p class="fst-italic"style="position: relative;left: 1250px;">
             
          </p>
          </mark>
         </div>
  </section>
<?php } ?>
</div>
         
<footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MediCare</h3>
            <p>
              Wadia Institute<br>
              Pune-01,<br>
              Maharashtra,India<br><br>
              <strong>Phone:</strong> +91 1800 6999 6999<br>
              <strong>Email:</strong> medicare825@gmail.com.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="home.php">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="aboutus.php">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#features">Features</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="blogshow.php">Blog</a></li>
              
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="doc_info.php">Book An Appointment By:-</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Walkin Consultancy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Online Consultancy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home Consultancy</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Follow Us On:-</h4>
            <div class="social-links text-center text-md-right pt-3 pt-md-0" style="position: relative;
    right: 104px;">
              <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      
      
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>