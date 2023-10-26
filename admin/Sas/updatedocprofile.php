<?php
include_once('db_connection.php');
$id=$_POST['id'];

?>
<?php 


$username=$email=$speciality=$description=$experience=$wcharges=$ocharges=$hname=$gender=$age=$contact=$degree=$hcharges="";
$usernameErr=$specialityErr=$descriptionErr=$experienceErr=$ochargesErr=$wchargesErr=$hnameErr=$genderErr=$ageErr=$contactErr=$degreeErr=$hchargesErr="";

if (isset($_POST['submit'])) {


 
   if (empty($_POST["username"])) {  
                         $usernameErr = "Name is required";
                    } else {  
                        $username = input_data($_POST["username"]); 
                            // check if name only contains letters and whitespace  
                            if (!preg_match("/^[a-zA-Z ]*$/",$username)) {  
                                $usernameErr = "Only alphabets and white space are allowed";  
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

                         $image= $_POST['image'];
                         $wcharges=$_POST['wcharges'];
                         $hcharges=$_POST['hcharges'];
                         $ocharges=$_POST['ocharges'];

                    if (empty($_POST["description"])) {  
                         $descriptionErr = "Description is required";
                        }else {  
                        $description = input_data($_POST["description"]); 
                    }
 
  

   

   
    if(empty($usernameErr) && empty($ageErr) && empty($genderErr) && empty($degreeErr) && empty($experienceErr) && empty($specialityErr) && empty($contactErr) && empty($descriptionErr)){
    $insert = mysqli_query($conn, "UPDATE doctors SET username = '$username', age = '$age',degree = '$degree', experience = '$experience', speciality = '$speciality', wcharges = '$wcharges', hcharges = '$hcharges', ocharges = '$ocharges', contact = '$contact', description = '$description', image = '$image' WHERE id= '$id'");
            if($insert){
                echo "<script type='text/javascript'>  alert('Updated Successfully'); 
              document.location = 'adoc_info.php'; </script>";
                exit;
            }
            else{
                echo "Sign up failed!(Something went wrong).";
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
    <title>Update Doctors Profile</title>
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
                    <a class="navbar-brand" href="doctordashboard.php" style="height: 80px;">Welcome Dr </a>
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

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Update Doctors Info Here
                            </h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Update
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
                                <form class="form-horizontal" method="post" id="add-more">
                                    <?php                          
                         
                             
                                $query="SELECT * FROM doctors WHERE id='$id'";
                                $result=mysqli_query($conn,$query);

                              if(mysqli_num_rows($result)> 0){
                                  while($row=mysqli_fetch_array($result)){
                                      ?>
                                <div class="form-group form-group-lg <?php echo (!empty($usernameErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Doctor's Name
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="username" name="username" value="<?php  echo $row['username']; ?>">
                                    <span class="help-block" style="color:red;"><?php echo $usernameErr; ?></span>
                                     <input type="hidden" class="form-control" name="id" value="<?php echo $_POST['id']? $_POST['id']:''; ?>">
                                </div>
                                </div> 



                                 <div class="form-group form-group-lg ">
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Email
                                    </label>
                                   <div class="col-sm-10">
                                   <input type="text" class="form-control" id="email" name="email" value="<?php  echo $row['email']; ?>" disabled>
                                   
                                </div>
                                </div>  

                                <div class="form-group form-group-lg  <?php echo (!empty($ageErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Age
                                  </label>
                                  <div class="col-sm-10">
                                       <input type="text" class="form-control" id="age" name="age" value="<?php  echo $row['age']; ?>">
                                    <span class="help-block" style="color:red;"><?php echo $ageErr; ?></span>
                                </div>
                                </div>

                                <div class ="form-group form-group-lg <?php echo (!empty($degreeErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Degree
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="degree" name="degree" 
                                    value="<?php  echo $row['degree']; ?>">
                                    <span class="help-block" style="color:red;"><?php echo $degreeErr; ?></span>
                                </div>
                                </div>


                                <div class="form-group form-group-lg <?php echo (!empty($experienceErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Experience
                                  </label>
                                  <div class="col-sm-10">
                                     <input type="text" class="form-control" id="experience" name="experience" value="<?php  echo $row['experience']; ?>">
                                     <span class="help-block" style="color:red;"><?php echo $experienceErr; ?></span>
                                </div>
                                </div>


                                <div class="form-group form-group-lg <?php echo (!empty($specialityErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Speciality
                                  </label>
                                  <div class="col-sm-10">
                                     <input type="text" class="form-control" id="speciality" name="speciality" value="<?php  echo $row['speciality']; ?>">
                                     <span class="help-block" style="color:red;"><?php echo $specialityErr; ?></span>
                                </div>
                                </div> 



                                <div class="form-group form-group-lg" >
                                  <label class="control-label col-sm-2 " for="">
                                 Charges For Walkin 
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="wcharges" name="wcharges" value="<?php  echo $row['wcharges'];  ?>">
                                </div>
                                </div>  

                                <div class="form-group form-group-lg " >
                                  <label class="control-label col-sm-2 " for="">
                                   Charges For Online 
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="ocharges" name="ocharges" value="<?php  echo $row['ocharges']; ?>">
                                </div>
                                </div>  

                                <div class="form-group form-group-lg" >
                                  <label class="control-label col-sm-2 " for="">
                                   Charges For Visits 
                                  </label>
                                  <div class="col-sm-10">
                                    <input type="text" class="form-control" id="hcharges" name="hcharges" value="<?php  echo $row['hcharges'];  ?>">
                                </div>
                                </div> 

                                <div class="form-group form-group-lg <?php echo (!empty($contactErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Contact
                                  </label>
                                  <div class="col-sm-10">
                                     <input type="text" class="form-control" id="contact" name="contact" value="<?php  echo $row['contact']; ?>">
                                     <span class="help-block" style="color:red;"><?php echo $contactErr; ?></span>
                                </div>
                                </div> 

                               <div class="form-group form-group-lg">
                                  <label class="control-label col-sm-2 " for="">
                                  Doctors Image
                                  </label>
                                  <div class="col-sm-10">


                                    <input type="file" class="form-control-left" id="image" name="image"value="<?php echo $row['image']; ?>"style="position: relative; top: 14px;left:20px ;">

                                  </div>
                                 </div>
                                  




                                 <div class="form-group form-group-lg" <?php echo (!empty($descriptionErr)) ? 'has-error' : ''; ?>>
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Description
                                    </label>
                                   <div class="col-sm-10">
                                    <textarea for="description" style="border:solid  black 1px; width : 890px; height :120px;" id="description" name="description" ><?php echo $row['description']; ?></textarea>
                                    <span class="help-block" style="color:red;"><?php echo $descriptionErr; ?></span>
                                   </div>
                                 </div>
                                  
                                  <input type="submit" name="submit" value="Update" class="btn btn-block btn-primary" style=" position :relative; width: 500px; left: 300px;">
                                  </div>
                                 </div>
                             <?php }
                         } ?>
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