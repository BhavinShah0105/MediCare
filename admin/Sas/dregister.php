<?php 
include_once('db_connection.php');
$username=$email=$password=$speciality=$description=$experience=$wcharges=$ocharges=$image=$hname=$gender=$age=$contact=$degree=$hcharges="";
$usernameErr=$emailErr=$passwordErr=$specialityErr=$descriptionErr=$experienceErr=$ochargesErr=$wchargesErr=$imageErr=$hnameErr=$genderErr=$ageErr=$contactErr=$degreeErr=$hchargesErr="";
$hname="Sassoon Hospital";

if ($_SERVER["REQUEST_METHOD"] == "POST")
 {
  

  $hname="Sassoon Hospital";

                    if (empty($_POST["username"])) {  
                         $usernameErr = "Name is required";
                    } else {  
                        $username = input_data($_POST["username"]); 
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[a-zA-Z ]*$/",$username)) {  
                                $usernameErr = "Only alphabets and white space are allowed";  
                            }  
                    }  

                    if (empty($_POST["email"])) {  
                            $emailErr = "Email is required"; 
                    } else {  
                            $email = input_data($_POST["email"]);  
                            // check that the e-mail address is well-formed  
                            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                                $emailErr = "Invalid email format";  
                            } else {
                             $check = "SELECT email FROM doctors WHERE email='$email'";
                             $result=mysqli_query($conn,$check) or die(mysqli_error($conn));
                             if (mysqli_num_rows($result)==1) {
                             $emailErr ="Email ID Already Exists"; 
                             }
                          } 
                        } 
                      
                     if (empty($_POST["age"])) {  
                            $ageErr = "Age is required"; 
                    } else {  
                            $age = input_data($_POST["age"]);  
                            // check if mobile no is well-formed  
                            if (!preg_match ("/^[0-9]*$/", $age) ) {  
                            $ageErr = "Only numeric value is allowed.";
                            }  
                        //check mobile no length should not be less and greator than 10  
                        if (strlen ($age) > 2) {  
                            $ageErr = "Age must contain only 2 digits."; 
                            }  
                    }  
  
                    if (empty($_POST["gender"])) {  
                            $genderErr = "Gender is required"; 
                    }else {  
                        $gender = input_data($_POST["gender"]); 
                    }  

                    if (empty($_POST["degree"])) {  
                            $degreeErr = "Degree is required";         
                    }else {  
                        $degree = input_data($_POST["degree"]); 
                    }  
                    
                    if (empty($_POST["experience"])) {  
                            $experienceErr = "Experience is required"; 
                    } else {  
                            $experience = input_data($_POST["experience"]);  
                            // check if mobile no is well-formed  
                            if (!preg_match ("/^[0-9]*$/", $experience) ) {  
                            $experienceErr = "Only numeric value is allowed.";
                            }  
                        //check mobile no length should not be less and greator than 10  
                        if (strlen ($experienceErr) > 2) {  
                            $experienceErr = "Experience must contain only 2 digits."; 
                            }  
                    }  

                    if (empty($_POST["speciality"])) {  
                         $specialityErr = "speciality is required";
                    } else {  
                        $speciality = input_data($_POST["speciality"]); 
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[a-zA-Z ]*$/",$speciality)) {  
                                $specialityErr = "Only alphabets and white space are allowed";  
                            }  
                    }  
                     
                            if ($_POST['wcharges']) {
                            $wcharges = input_data($_POST["wcharges"]);  
                            // check if mobile no is well-formed  
                                if (!preg_match ("/^[0-9]*$/", $wcharges) ) {  
                                $wchargesErr = "Only numeric value is allowed.";
                                }
                            }  

                            if ($_POST['hcharges']) {
                            $hcharges = input_data($_POST["hcharges"]);  
                            // check if mobile no is well-formed  
                                if (!preg_match ("/^[0-9]*$/", $hcharges) ) {  
                                $hchargesErr = "Only numeric value is allowed.";
                                }
                            }  

                            if ($_POST['ocharges']) {
                            $ocharges = input_data($_POST["ocharges"]);  
                            // check if mobile no is well-formed  
                                if (!preg_match ("/^[0-9]*$/", $ocharges) ) {  
                                $ochargesErr = "Only numeric value is allowed.";
                                }
                            }  

                            if (empty($_POST["contact"])) {  
                            $contactErr = "Contact-No is required"; 
                            } else {  
                            $contact = input_data($_POST["contact"]);  
                            // check if mobile no is well-formed  
                            if (!preg_match ("/^[0-9]*$/", $contact) ) {  
                            $contactErr = "Only numeric value is allowed.";
                            }  
                        //check mobile no length should not be less and greator than 10  
                            if (strlen ($contact) != 10) {  
                            $contactErr = "Mobile no must contain 10 digits."; 
                            }  
                        }  

                            if (empty($_POST["password"])) {  
                            $passwordErr = "Password is required"; 
                            } else {  
                            $password = input_data($_POST["password"]);  
                            // check if mobile no is well-formed  
                            if (!preg_match ("/^\S*(?=\S{8,})(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\W])(?=\S*[\d])\S*$/", $password) ) {  
                            $passwordErr = "Enter Password as per the note.";
                            }  
                         
                        }  

                         $image= $_POST['image'];
                        if (empty($_POST["image"])) {  
                         $imageErr = "Image is required";
                        }else {  
                        $image = input_data($_POST["image"]); 
                    }  

                    if (empty($_POST["description"])) {  
                         $descriptionErr = "Description is required";
                        }else {  
                        $description = input_data($_POST["description"]); 
                    }  

 
   if(empty($usernameErr) &&  empty($emailErr) && empty($ageErr) && empty($genderErr) && empty($degreeErr) && empty($experienceErr) && empty($specialityErr) && empty($contactErr) && empty($passwordErr) && empty($imageErr) && empty($descriptionErr)){ 
    $insert = mysqli_query($conn, "INSERT INTO doctors(username,email,age,gender,degree,experience,speciality,wcharges,contact,password,hcharges,ocharges,image,hname,description) VALUES('$username','$email','$age','$gender','$degree','$experience','$speciality','$wcharges','$contact','$password','$hcharges','$ocharges','$image','$hname','$description')");
            if($insert){
                echo "<script type='text/javascript'>  alert('Registered Successfully'); 
                document.location = 'addschedule.php'; </script>";
                exit;
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
<!doctype html>
<html lang="en">
  <head>
    <title>Doctor's Registration</title>
    <style>
            #a{
                position: relative; left:198px; bottom:16px;"
            }
        </style>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Add Schedule </title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="aassets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="aassets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="aassets/css/sb-admin.css" rel="stylesheet">
        <link href="aassets/css/time/bootstrap-clockpicker.css" rel="stylesheet">
        <link href="aassets/css/style.css" rel="stylesheet">
        <link href="aassets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Special version of Bootstrap that only affects content wrapped in .bootstrap-iso -->
        <link rel="stylesheet" href="https://formden.com/static/cdn/bootstrap-iso.css" /> 

        <!--Font Awesome (added because you use icons in your prepend/append)-->
        <link rel="stylesheet" href="https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css" />

        <!-- Inline CSS based on choices in "Settings" tab -->
        <style>.bootstrap-iso .formden_header h2, .bootstrap-iso .formden_header p, .bootstrap-iso form{font-family: Arial, Helvetica, sans-serif; color: black}.bootstrap-iso form button, .bootstrap-iso form button:hover{color: white !important;} .asteriskField{color: red;}</style>

        <!-- Custom Fonts -->
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="doctordashboard.php" style="height: 80px;">Welcome Admin  </a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    
                    
                    <li class="dropdown">
                        
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            
                        
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                 <?php
               include_once('adminnavbar.php');
               ?>
                <!-- /.navbar-collapse -->
            </nav>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- navigation end -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Enroll Doctors Info Here
                            </h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Registration
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="panel panel-primary">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Add Doctor</h3>
                        </div>
                        <!-- panel heading end -->

     <div class="footer-three-grid wow fadeIn animated" data-wow-delay="0.66s">
<div class="row" >
                        <div class="panel-body">
                        <!-- panel content start -->
                            <div class="bootstrap-iso">
                             <div class="container-fluid">
                              <div class="row">
                               <div class="col-md-12 col-sm-12 col-xs-12">
                                <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                                <div class="form-group form-group-lg <?php echo (!empty($usernameErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Doctor's Name
                                  </label>
                                  <div class="col-sm-10 ">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>">
                                    <span class="help-block" style="color:red;"><?php echo $usernameErr; ?></span>
                                </div>
                                </div>  
                         
                                 <div class="form-group form-group-lg <?php echo (!empty($emailErr)) ? 'has-error' : ''; ?>">
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Email
                                    </label>
                                   <div class="col-sm-10">
                                   <input type="text" class="form-control" id="email" name="email" value="<?php echo $email; ?>">
                                   <span class="help-block" style="color:red;"><?php echo $emailErr; ?></span>
                                </div>
                                </div>

                                 <div class="form-group form-group-lg  <?php echo (!empty($ageErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Age
                                  </label>
                                  <div class="col-sm-10">
                                       <input type="text" class="form-control" id="age" name="age" value="<?php echo $age; ?>">
                                    <span class="help-block" style="color:red;"><?php echo $ageErr; ?></span>
                                </div>
                                </div>  


                                  <div class="form-group form-group-lg <?php echo (!empty($genderErr)) ? 'has-error' : ''; ?>">
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Gender
                                  </label>
                                  <div class="col-sm-10">
                                   <select class="select form-control" id="gender" name="gender">
                                    <option value="">
                                     --Select--
                                    </option>
                                    <option value="Male">
                                     Male
                                    </option>
                                    <option value="Female">
                                     Female
                                    </option>
                                    <option value="Others">
                                     Others
                                    </option>
                                   </select>
                                   <span class="help-block" style="color:red;"><?php echo $genderErr; ?></span>
                                  </div>
                                 </div>

                                 <div class ="form-group form-group-lg <?php echo (!empty($degreeErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Degree
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="degree" name="degree" 
                                    value="<?php echo $degree; ?>">
                                    <span class="help-block" style="color:red;"><?php echo $degreeErr; ?></span>
                                </div>
                                </div>  

                                <div class="form-group form-group-lg <?php echo (!empty($specialityErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Speciality
                                  </label>
                                  <div class="col-sm-10">
                                     <input type="text" class="form-control" id="speciality" name="speciality" value="<?php echo $speciality; ?>">
                                     <span class="help-block" style="color:red;"><?php echo $specialityErr; ?></span>
                                </div>
                                </div>  

                                <div class="form-group form-group-lg <?php echo (!empty($experienceErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Experience
                                  </label>
                                  <div class="col-sm-10">
                                     <input type="text" class="form-control" id="experience" name="experience" value="<?php echo $experience; ?>">
                                     <span class="help-block" style="color:red;"><?php echo $experienceErr; ?></span>
                                </div>
                                </div>  

                                 <div class="form-group form-group-lg <?php echo (!empty($wchargesErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                 Charges For Walkin 
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="wcharges" name="wcharges" value="<?php echo $wcharges; ?>"><span class="help-block" style="color:red;"><?php echo $wchargesErr; ?></span>
                                </div>
                                </div>  

                                <div class="form-group form-group-lg <?php echo (!empty($ochargesErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                   Charges For Online 
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ocharges" name="ocharges" value="<?php echo $ocharges; ?>"><span class="help-block" style="color:red;"><?php echo $ochargesErr; ?></span>
                                </div>
                                </div>  

                                <div class="form-group form-group-lg  <?php echo (!empty($hchargesErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                   Charges For Visits 
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hcharges" name="hcharges" value="<?php echo $hcharges; ?>"><span class="help-block" style="color:red;"><?php echo $hchargesErr; ?></span>
                                </div>
                                </div>  

                                 <div class="form-group form-group-lg <?php echo (!empty($contactErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Contact
                                  </label>
                                  <div class="col-sm-10">
                                     <input type="text" class="form-control" id="contact" name="contact" value="<?php echo $contact; ?>">
                                     <span class="help-block" style="color:red;"><?php echo $contactErr; ?></span>
                                </div>
                                </div>  



                                
                                 <div class="form-group form-group-lg <?php echo (!empty($passwordErr)) ? 'has-error' : ''; ?>" onclick="toggle2()" >
                                  <label class="control-label col-sm-2 " for="">
                                  Password
                                  </label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="password" name="password" >
                                  <span class="help-block" style="color:red;"><?php echo $passwordErr; ?></span>
                                 <span style="position: absolute; left: 800px; top: 13px;">
                                 <i id="eye" class="fas fa-lock" aria-hidden="true" onclick="toggle()"></i>
                                 </span>

                                 </div>
                                 
                                 <div class="form-group form-group-lg" >
                                <p id = "a" style="position: relative;
    display: block;
    color: black;
    left: 239px;
    width: 900px;
    top: 2px;"><b>Note:-<br></b>
                                    Password must be a combination of atleast one uppercase & lowercase character and also number and symbol and length must be atleast 8 characters.</p>
                                 </div>
                             





                                 <div class="form-group form-group-lg" <?php echo (!empty($imageErr)) ? 'has-error' : ''; ?>>
                                  <label class="control-label col-sm-2 " for="">
                                  Doctors Image
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="file" class="form-control-left" id="image" name="image"value="<?php echo $image; ?>"style="position: relative; top: 14px;left:20px ;">
                                    <span class="help-block" style="color:red;color: red;position: relative;top: 17px;left: 20px;"><?php echo $imageErr; ?></span>
                                  </div>
                                 </div>  
                             </div>

                               
                                  
                                  <div class="form-group form-group-lg" <?php echo (!empty($descriptionErr)) ? 'has-error' : ''; ?>>
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Description
                                    </label>
                                   <div class="col-sm-10">
                                    <textarea for="description" style="border:solid  black 1px; width : 890px; height :120px;" id="description" name="description"><?php echo $description; ?></textarea>
                                    <span class="help-block" style="color:red;"><?php echo $descriptionErr; ?></span>
                                   </div>
                                 </div>
                                  
                                  <input type="submit" name="submit" value="Register" class="btn btn-block btn-primary" style=" position :relative; width: 500px; left: 300px;">
                                  </div>
                                 </div>
                                </form>
                               </div>
                              </div>
                             </div>
                            </div>                        
                        

                        </div>
                    </div>
                </div>  
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
  
        
            
  </center>
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
  function toggle2(){
    if (document.getElementById('a').style.display === 'none') {
    document.getElementById('a').style.display = 'block';
  }else{
    document.getElementById('a').style.display = 'none';
  }
}
</script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/mobster.js"></script>
  </body>
</html>