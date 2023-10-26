<?php
$id='';
include_once('db_connection.php');
$dname=$recovered=$gender=$age=$contactno=$blood=$address=$weight='';

if (isset($_SESSION['email'])) {
$email=$_SESSION['email'];

$sql= "SELECT * FROM users WHERE email='$email '";
$result = mysqli_query($conn,$sql);
$doctors=mysqli_fetch_array($result);
$username=$doctors['username'];
}
$err='';

if(isset($_POST['submit'])){ 

                  if (empty($_POST["dname"])) {  
                     echo"<script type='text/javascript'> alert('Enter Donar Name'); 
                                </script>";
                               
                    } else {  
                           $dname =input_data($_POST["dname"]); 
                             
                            if (!preg_match("/^[a-zA-Z ]*$/",$dname)) {  
                                   echo "<script type='text/javascript'> alert('Invalid Donar Name'); 
                               </script>";
                              $Err=1;
                            }  
                    }    

                    if (empty($_POST["blood"])) {  
                         echo "<script type='text/javascript'> alert('Enter Blood Group'); 
                                </script>";
                              $Err=1;
                    } else {  
                           $blood = input_data($_POST["blood"]); 
                    }       


                    if (empty($_POST["age"])) {  
                         echo "<script type='text/javascript'> alert('Enter Age'); 
                               </script>";
                               $Err=1;
                    } else {  
                           $age = input_data($_POST["age"]); 
                             
                            if (!preg_match("/^[0-9-]*$/",$age)) {  
                                   echo "<script type='text/javascript'> alert('Invalid Age'); 
                                </script>";
                                $Err=1;
                            }  
                    }                       

                     if (empty($_POST["gender"])) {  
                         echo "<script type='text/javascript'> alert('Enter Gender'); 
                                </script>";
                               $Err=1;
                    } else {  
                           $gender = input_data($_POST["gender"]); 
                    }   
                     if (empty($_POST["weight"])) {  
                         echo "<script type='text/javascript'> alert('Enter Weight'); 
                                </script>";
                               $Err=1;
                    } else {  
                           $weight = input_data($_POST["weight"]); 
                             
                            if (!preg_match("/^[0-9-]*$/",$weight)) {  
                                   echo "<script type='text/javascript'> alert('Invalid Weight'); 
                               </script>";
                               $Err=1;
                            }  
                    }   
                     if (empty($_POST["recovered"])) {  
                         echo "<script type='text/javascript'> alert('Enter Recovered Days'); 
                               </script>";
                               $Err=1;
                    } else {  
                           $recovered = input_data($_POST["recovered"]); 
                             
                            if (!preg_match("/^[0-9-]*$/",$recovered)) {  
                                   echo "<script type='text/javascript'> alert('Invalid Days'); 
                                </script>";
                               $Err=1;
                            }  
                    }   

                     if (empty($_POST["contactno"])) {  
                         echo "<script type='text/javascript'> alert('Enter Contact Number'); 
                               </script>";
                               $Err=1;
                    } else {  
                           $contactno = input_data($_POST["contactno"]); 
                             
                            if (!preg_match("/^[0-9-]*$/",$contactno)) {  
                                   echo "<script type='text/javascript'> alert('Invalid Contact Number'); 
                                       </script>";
                               $Err=1;
                            }  
                    }   
                     
                     if (empty($_POST["address"])) {  
                         echo "<script type='text/javascript'> alert('Enter Address'); 
                                </script>";
                              $Err=1;
                    } else {  
                           $address = input_data($_POST["address"]); 
                    }  
                    
                    if(empty($_POST["email"])) {  
                         
                              $Err=1;
                    } else {  
                           $email = input_data($_POST["email"]); 
                    }  

                    
    if(empty($Err)){                          
    $insert = "INSERT INTO plasma (dname,username,email,blood,age,gender,weight,recovered,contactno,address) VALUES('$dname','$username','$email','$blood','$age','$gender','$weight','$recovered','$contactno','$address')";
    
   $results=mysqli_query($conn,$insert);
    if($results){
                echo "<script type='text/javascript'>  alert('Application Sent Successfully'); 
                document.location = 'home.php'; </script>";
               
            }
            else{
                echo "<script type='text/javascript'>alert(Something went wrong);</script>";
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
<html>
<title>Plasma</title>
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
  <link rel="stylesheet" href="plasmacss/style.css">
</head>
<header>
 <?php
include_once('navuserhome.php');
  ?>
</header>


  <body>
  <main id="main">
 <section data-aos="fade-up">
   <section id="about" class="about">
      <div class="section-title">
<h2 style="position: relative;
    text-align: center;color: white;"><font style="font-family: 'Krub';">Donate a Plasma</font></h2>
  </div>
<p style="position: relative;
    text-align: center;
    width: 1250px;
    left: 121px;
    top: -20px;color: white;">
Plasma is the largest part of your blood. It, makes up more than half (about 55%) of its overall content. When separated from the rest of the blood, plasma is a light yellow liquid. Plasma carries water, salts and enzymes.If you want to donate plasma to help others in need, you will go through a screening process. This is to make sure your blood is healthy and safe. If you qualify as a plasma donor, you'll spend about an hour and a half at a clinic on every follow-up visit.Taking plasma of patients who have recovered from COVID-19 as they carry antibodies against the viruses in their plasma. Sufficient antibody production is not universal, but many such patients have a healthy number of antibodies. So for patients in a moderate or early phase, the plasma from recovered patients (usually around the 28th day onwards in the mild stage or 14 days after recovery in other patients), can be used in newly infected patients who do not have antibodies to fight the illness</p>



</section>

<section id="features" class="features" data-aos="fade-up">
      <div class="container">

        <div class="section-title">
          <h2 style="font-family: 'Krub';">Register Yourself</h2>
          <p></p>
        </div>

        <div class="row content">
           <div class="container">
    
      <div class="row justify-content-center" >
        <div class="col-md-6 in-order-2 sm-6-content wow animated fadeInRight" data-wow-delay="0.22s">
          <img src="images/plasma.jpeg" alt="Image" class="img-fluid"style="width: 500px;
    height: 521px;
    position: relative;
    top: -177px;
    left: 84px;">
        </div>
        
        <div class="col-md-9 contents "style="position: relative;
    top: -85px;
    right: -65px;
    width: 609px;">
          <div class="row justify-content-center">
            <div class="col-md-10">
            <form action="" method="post" id="booking-details" >
               <div class="form-row justify-content-right">
                    <div class="form-group mb "style="top: 16px;position: absolute;left: -15px;">
                      <label for="">Donar Name</label>
                      <input type="text" class="form-control" name="dname" id="dname" value="<?php echo $dname; ?>">

                      <input type="hidden" class="form-control" name="username" id="username" value="<?php echo $username ;
                       ?>">
                        <input type="hidden" class="form-control" name="email" id="email" value="<?php echo $email ;?>">
                     

                    </div>

                    <div class="form-group mb" style="width: 245px;position: absolute;left: 242px; top: 16px;">
                        <label for="select">Blood Group</label>
                         <select class="form-control" name="blood" id="blood" value="">
                          <option></option>
                          <option value="A+">A+</option>
                          <option value="B+">B+</option>
                          <option value="O+">O+</option>
                          <option value="AB+">AB+</option>
                          <option value="A-">A-</option>
                          <option value="B-">B-</option>
                          <option value="O-">O-</option>
                          <option value="AB-">AB-</option>
                        </select>
                    </div>
                  </div>
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;left: -15px;    top: 77px;">
                    <label for="">Age</label>
                    <input type="text" class="form-control" name="age" id="age" value="<?php echo $age;?>">
                  </div>
              </div>

                <div class="form-group mb" style="top:77px;position: absolute;width: 244px;left: 243px">
                    <label for="select">Gender</label>
                       <select class="form-control" name="gender" id="gender" >
                        <option> </option>
                        <option value='Male'>Male</option>
                        <option value='Female'>Female</option>
                        <option value='Others'>Others</option>
                      </select>
                </div>
                 
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;left: 225px;top: 138px;width: 263px;">
                        <label for="">Recovered Days</label>
                        <input type="text" class="form-control" name="recovered" id="recovered" value="<?php echo $recovered;?>">
                    </div>

                    <div class="form-group mb" style="position: absolute;width: 240px;left: -15px;top: 138px;">
                        <label for="">Weight</label>
                        <input type="text" class="form-control" id="Weight" name="weight" value="<?php echo $weight ;?>"  >
                    </div>
                </div>
                
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;width: 503px;left: -15px;top: 198px;">
                        <label for="">Contact Number</label>
                        <input type="text" class="form-control" name="contactno" id="contactno" value="<?php echo $contactno ;?>">
                    </div>
                </div>

                    
                <div class="form-row justify-content-right">
                    <div class="form-group mb "style="position: absolute;width: 503px;left: -15px;top: 259px;">
                        <label for="">Address</label>
                        <input type="text" class="form-control" name="address" id="address" value="<?php echo $address; ?>">
                    </div>
                </div>
                <p style="top: 344px;position: relative;color: black;left: -78px;">Note : Plasma Donation Conducts On Monday 10AM To 2PM on all our registered Hospitals.</p>
                    <p style="top: 331px;position: relative;color: black;left: -78px;">Final Approval For the donation will be given on the Mail-ID used during the login.</p>
              <br><br>
                  <div class="d-flex mb-4 align-items-center">
                    <?php if (isset($_SESSION['email'])) {?>
                    <input type="submit" value="Register"  name="submit" id="submit" label="Sign Up" class="btn btn-block btn-primary" style="background-color: #0096FF;width: 502px;top: 454px;position: absolute;left: -15px;">
                    <?php }else{ ?>
                        <input value="Register" label="Sign Up" class="btn btn-block btn-primary" style="background-color: #0096FF;width: 502px;top: 454px;position: absolute;left: -15px; "onclick="toggle1()">
                    <?php } ?>
                    </div>    
            </form>
            </div>
            </div>
            </div>
            </div>
            </div>
        </div>
      </div>
  
  

  <footer id="footer">

    <div class="footer-top" style="position: absolute;
    width: -webkit-fill-available;
    bottom: 2px;">
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
             
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4>Follow Us On:-</h4>
            <div class="social-links text-center text-md-right pt-3 pt-md-0" >
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
<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
  function toggle1(){
    alert('You Need To Login First');
    document.location = 'login.php'; 
}
</script>
<script >



      var dt = new Date(); 
      var CurrentDate = new Date();
      var Lastdate = new Date();

      var diff = dt.getDate() - dt.getDay() + (dt.getDay() === 0 ? -6 : 1);
      startdate = new Date(dt.setDate(diff));
      Lastdate.setDate(startdate.getDate()+6);

      LastDateMonth = '';
      if(Lastdate.getMonth() < 10)
        LastDateMonth = '0'+ (Lastdate.getMonth()+1);
      else
        LastDateMonth = (Lastdate.getMonth()+1);

      CurrentDateMonth = '';
      if(CurrentDate.getMonth() < 10)
        CurrentDateMonth = '0'+ (CurrentDate.getMonth()+1);
      else
        CurrentDateMonth = (CurrentDate.getMonth()+1);
      
      Lastdate = Lastdate.getFullYear()+"-"+LastDateMonth+"-"+Lastdate.getDate();
      CurrentShowDate = CurrentDate.getFullYear()+"-"+CurrentDateMonth+"-"+CurrentDate.getDate();
      CurrentDate = CurrentDate.getFullYear()+"-"+CurrentDateMonth+"-"+CurrentDate.getDate();
       document.getElementById("booking_date").min = CurrentDate;
       document.getElementById("booking_date").max = Lastdate;

       
       document.getElementById("booking_date").value = CurrentShowDate;
    </script>