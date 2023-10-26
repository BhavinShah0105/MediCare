<?php
include_once('db_connection.php');  
?>
<?php 
$name=$subject=$message=$email="";
$Err='';
if (isset($_POST['csubmit'])) {

                    if (empty($_POST["name"])) 
                    {  
                         echo "<script type='text/javascript'> alert('Name is required');
                         document.location = 'home.php'; </script>";
                         $Err=1;
                    } else {  
                        $name = input_data($_POST["name"]); 
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                                echo "<script type='text/javascript'> alert('Only alphabets and white space are allowed');
                                document.location = 'home.php'; </script>"; 
                                $Err=1; 
                            }  
                    } 


                      if (empty($_POST["email"])) {  
                            echo "<script type='text/javascript'> alert('Enter Email');
                            document.location = 'home.php'; </script>"; 
                            $Err=1;
                    } else {  
                            $email = input_data($_POST["email"]);  
                            // check that the e-mail address is well-formed  
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                                echo "<script type='text/javascript'> alert('Invalid Email Format');
                                document.location = 'home.php'; </script>";  
                                $Err=1;
                            }
                          }

                          if (empty($_POST["subject"])) {  
                         echo "<script type='text/javascript'> alert('Enter Subject');
                         document.location = 'home.php'; </script>";
                         $Err1=1;
                    } else {  
                        $subject = input_data($_POST["subject"]);   
                    } 

                       if (empty($_POST["message"])) {  
                         echo "<script type='text/javascript'> alert('Enter Message');
                         document.location = 'home.php'; </script>";
                         $Err=1; 
                    } else {  
                        $message = input_data($_POST["message"]);
                      }
      if(empty($Err)){
       $insert = mysqli_query($conn, "INSERT INTO contact(name,email,subject,message) VALUES('$name','$email','$subject','$message')");
        if($insert){
           echo "<script type='text/javascript'> alert('Message Sent Successfully');
                         </script>";
        }else{
          echo "<script type='text/javascript'> alert('Something Went Wrong');
                         document.location = 'home.php'; </script>";
        }
      }

}



?>

<?php  
 function input_data($data) {  
          $data = trim($data);  
          $data = stripslashes($data);  
          $data = htmlspecialchars($data);  
          return $data;  
        }  
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>MediCare</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  
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

  <!-- =======================================================
  * Template Name: Bikin - v4.2.0
  * Template URL: https://bootstrapmade.com/bikin-free-simple-landing-page-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
  <style>
    .banner__img {
 width:100%;
 cursor:pointer;
 max-width:1350px
}
.card__img--580x225 {
    width: 580px;
    height: 225px;
}
.card__img {
 border-radius:4px;
 vertical-align:bottom;
 width:100%;
 height:100%
}
.card__img--180x140 {
 width:180px;
 height:140px
}
.card__img--120x120 {
 width:120px;
 height:120px
}
.card__img--280x200 {
 width:280px;
 height:200px
}
.card__img--280x280 {
 width:280px;
 height:280px
}
.card__img--380x280 {
 width:380px;
 height:280px
}
.card__img--480x280 {
 width:480px;
 height:280px
}
.card__img--360x449 {
 width:360px;
 height:449px
}
.card__img--580x225 {
 width:580px;
 height:225px
}
.card__img--max280 {
 width:100%;
 height:280px
}
.card:hover .card__img {
 cursor:pointer;
 box-shadow:2px 2px 6px 0 rgba(0,0,0,.1);
 transition:box-shadow .3s ease,border .3s ease
}

  </style>
</head>
<?php
include_once('navuserhome.php');
?>
<body>

  <!-- ======= Header ======= -->
  
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container d-flex flex-column align-items-center justify-content-center" data-aos="fade-up">
      <span class="LazyLoad is-visible"><img src="images/banner.jpg" alt="Download Practo App Banner" class="banner__img"></span>
    

            

      <div class="card__img--580x225">

              <a href="/pune/doctors?utm_source=google&amp;utm_medium=cpc&amp;utm_campaign=brand-search-practo-consult">

                <span class="LazyLoad is-visible">

                  <img src="images/1.jpeg" alt="Find Doctors" class="card__img" style="position: relative;top: 30px;right: 295px;">

                </span>

              </a>

              <a href="/pune/doctors?utm_source=google&amp;utm_medium=cpc&amp;utm_campaign=brand-search-practo-consult">

                <span class="LazyLoad is-visible">

                  <img src="https://www.practostatic.com/consumer-home/desktop/images/1597423628/doctor-online.png" alt="Consult Online" class="card__img" style="position: relative;top: -196px;  left: 298px;">

                </span>

              </a>
        </div>
  

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row no-gutters">
          <div class="content col-xl-5 d-flex align-items-stretch" data-aos="fade-right">
            <div class="content">
              <h3>How MediCare is Helping India Fight COVID-19</h3>
              <p>
               Ultimately, the greatest lesson that COVID-19 can teach humanity is that we are all in this together!!
              </p>
              <a href="aboutus.php ?>" class="about-btn">About us <i class="bx bx-chevron-right"></i></a>
            </div>
          </div>
          <div class="col-xl-7 d-flex align-items-stretch" data-aos="fade-left">
            <div class="icon-boxes d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="100">
                  <i class="bx bx-receipt"></i>
                  <h4>Online Consultations</h4>
                  <p>Online Consultation with all specialties.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="200">
                  <i class="bx bx-cube-alt"></i>
                  <h4>Corona Symptoms </h4>
                  <p>Don't Panic Take Consultations with our Doctors </p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="300">
                  <i class="bx bx-images"></i>
                  <h4>Donate Plasma</h4>
                  <p>Help Others to Recovery From Covid-19.Register & donate plasma through our website.</p>
                </div>
                <div class="col-md-6 icon-box" data-aos="fade-up" data-aos-delay="400">
                  <i class="bx bx-shield"></i>
                  <h4>Lets FIGHT Coronavirus Together.</h4>
                  <p>Read latest update about Covid-19. 
                  Know about symptoms and home remedies and more.</p>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features" data-aos="fade-up">
      <div class="container">
        <div class="section-title">
          <h2>Our Appproach To Health Care</h2>
          <p></p>
        </div>

        <div class="row content">
          <div class="col-md-5" data-aos="fade-right" data-aos-delay="100">
            <img src="images/handshake.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-4" data-aos="fade-left" data-aos-delay="100">
            <h3>Each time a patient finds the right doctor, we build a healthier nation</h3>
            <ul>
            <li class="fst-italic"><i class="bi bi-check"></i>
             We understand healthcare goes beyond signs, symptoms, diagnosis, and treatment. It’s about the deep connection between doctors and patients that leads to continuous care and sustained, better outcomes.
            </li></p>
            <li class="fst-italic"><i class="bi bi-check"></i>
             MediCare works on trust. We are aware of the responsibility placed on us by patients and over a doctors. We always have and always will do everything we possibly can to uphold this trust.
            </li></p>
             <li class="fst-italic"><i class="bi bi-check"></i>
             We believe in full disclosure. We believe in communicating openly and honestly, and holding ourselves to the highest ethical standards.
            </li></p>
            </ul>
          </div>
        </div>
      </div>
    </section>
<?php 

$sqlb= 'SELECT * FROM confirmblog Order by btime DESC LIMIT 1  ';
$resultb = mysqli_query($conn,$sqlb);
$rowcount=mysqli_num_rows($resultb);
if($rowcount > 0){
$blog=mysqli_fetch_array($resultb);
?> 
<section id="features" class="features" data-aos="fade-up">
      <div class="container">
        <div class="section-title">
          <h2 style="position: relative;top: -58px;">Blog</h2>
          <p></p>
        </div>
<form method="POST"action="blogshow.php">
        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="images/<?php echo htmlspecialchars($blog['image'] );?>" style="position: relative;bottom: 71px;"class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3 style=" position: relative;top: -118px;"><?php echo htmlspecialchars(ucfirst($blog['title']) );?></h3>
            <p class="fst-italic" style="position: relative;top: -78px;">
              <?php echo htmlspecialchars($blog['para1'] );?> 
             
                <input type='hidden' value="<?php echo $blog['doc_id'];  ?>" name='doc_id'>

               <button type='submit' name=""style=" background-color: white;
            border:none;
            color: blue;
     
            text-align: center;
            display: inline-block;
            cursor: pointer;
            text-decoration:none;">ReadMore...</button></form>
          </div>
        </div>

        
      </div>
    </section><!-- End Features Section -->
<?php }
else{ ?>
  <section id="features" class="features" data-aos="fade-up">
      <div class="container">
        <div class="section-title">
          <h2 style="position: relative;top: -58px;">Blog</h2>
          <p></p>
        </div>
        <div class="row content">
          <div class="col-md-5 order-1 order-md-2" data-aos="fade-left">
            <img src="" style="position: relative;bottom: 71px;"class="img-fluid" alt="">
          </div>
          <div class="col-md-7 pt-5 order-2 order-md-1" data-aos="fade-right">
            <h3 style=" position: relative;top: -118px;"></h3>
            <p class="fst-italic" style="position: relative;top: -78px;">
             
             
               

               
          </div>
        </div>

        
      </div>
    </section><!-- End Features Section -->
<?php } ?>
    <!-- ======= Steps Section ======= -->
<?php 

$sql= 'SELECT * FROM doctors ORDER BY average_rating DESC LIMIT 3';
$result = mysqli_query($conn,$sql);

$doctors=mysqli_fetch_all($result,MYSQLI_ASSOC);
?>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">
;
        <div class="section-title">
          <h2>Our Top Doctors</h2>
          <p></p>
        </div>

        <div class="row">
          <?php
       foreach ($doctors as $doctors){ ?>
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box" >

              <img class="testimonial-img" src="images/<?php echo htmlspecialchars($doctors['image'] );?>" style="width: 294px;height: 189px;"><br><br>
              <h4 class="title">Dr. <?php echo htmlspecialchars($doctors['username'] );?> </h4>
               <h4 class="title"><?php echo htmlspecialchars($doctors['speciality'] );?></h4>
               <h4 class="title"><?php echo htmlspecialchars($doctors['hname'] );?></h4>
               <h4 class="title">Rating:<?php echo htmlspecialchars(number_format($doctors['average_rating'],1) );?></h4>
              <p class="description"></p>
            </div>
          </div>
<?php 
}
?>
        </div>

      </div>
    </section><!-- End Services Section -->

    
    <!-- ======= Testimonials Section ======= -->
   
    <!-- ======= Team Section ======= -->
   

   

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Frequently Asked Questions</h2>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Are specialists available 24/7? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                Our specialists are available for consultation as per their schedule on all the 7 days of the week.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">How can a doctor provide me with advice without seeing me in person? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
               Your pre consultation information such as symptoms, social habits are recorded by our GP in detail. This is followed by a chat with our qualified and experienced Specialists.You can also send images to our doctors if required. In this manner, we ensure an accurate diagnosis by our doctors on chat/call.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">I missed my appointment. What should i do now? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                You must contact us and mention that you missed your appointment. We will help you book an appointment on next available time slot. 
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">Is my consultation private with my doctor?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
               All your medical history and online consultation with us are completely private and confidential. 
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">I consulted with Dr. XYZ 5 days ago. Can I connect with him again for a follow up? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                Sorry,you need to book other appointment.
              </p>
            </div>
          </li>

          

        </ul>

      </div>
    </section><!-- End Frequently Asked Questions Section -->
<?php 

$sqli= 'SELECT * FROM rating Order by tpstp DESC limit 3 ';
$results = mysqli_query($conn,$sqli);
$doctor=mysqli_fetch_all($results,MYSQLI_ASSOC);


?>
    <section id="testimonials" class="services">
      
        <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Top Patient Stories</h2>
          <p></p>
        </div>

        <div class="row">
          <?php
       foreach ($doctor as $doctor){ ?>
          <div class="col-md-6 col-lg-4 d-flex align-items-stretch mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
            <div class="icon-box" style="position: relative;">
               <p class="description" ><i><?php echo htmlspecialchars($doctor['review'] );?></i></p>
              <h5 class="title" style=""><b>By:-</b><?php echo htmlspecialchars($doctor['pname'] );?></h5>
              <h5 class="title">To:-Dr.<?php echo htmlspecialchars($doctor['doc_name'] );?></h5>
              <h4 class="title"></h4>
             
            </div>
          </div>
<?php 
}
?>
        </div>

      </div>
      </section><!-- End Testimonials Section -->

 
    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact section-bg">
      <div class="container" data-aos="fade-up">



        <div class="section-title">
          <h2>Contact Us</h2>
          <p></p>
        </div>

        <div class="row">

          <div class="col-lg-6">

            <div class="row">
              <div class="col-md-12">
                <div class="info-box">
                  <i class="bx bx-map"></i>
                  <h3>Our Address</h3>
                  <p>Wadia Institute, Pune, Maharashtra, India</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-envelope"></i>
                  <h3>Email Us</h3>
                  <p>medicare825@gmail.com.com</p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box mt-4">
                  <i class="bx bx-phone-call"></i>
                  <h3>Call Us</h3>
                  <p> +91 1800 6999 6999</p>
                </div>
              </div>
            </div>

          </div>

          <div class="col-lg-6 mt-4 mt-md-0">
            <form action="" method="post" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" value="">
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="text" class="form-control" name="email" id="email" placeholder="Your Email" value="">
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" value="">
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" value=""></textarea>
              </div>
              <div class="my-3">
                
                
              </div>
              <div class="text-center"><button type="submit" name="csubmit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->





  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>MediCare</h3>
            <p>
              Wadia Institute<br>
              Pune-01,<br>
              Maharashtra, India<br><br>
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