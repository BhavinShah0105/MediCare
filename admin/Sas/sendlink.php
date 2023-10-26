<?php
include_once('db_connection.php');
$appointment_id = $_POST['appointment_id'];
$sql = "SELECT * FROM appointments where appointment_id = '$appointment_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

  $user_email=$row['user_email'];
  $doc_name=$row['doc_name'];
  $doctor_id=$row['doctor_id'];
  $pname=$row['pname'];
  }
} else {
  echo "Mail ID is not available";
}

$query = "SELECT * FROM doctors where id = '$doctor_id'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

  $email=$row['email'];
  
  }
} else {
  echo "Mail ID is not available";
}
$maillink=$maillinkErr='';

                    if(isset($_POST['submit'])){
                        
                         if (empty($_POST["maillink"])) {  
                         $maillinkErr = "This field is required";
                        }else {  
                        $maillink = input_data($_POST["maillink"]); 
                    }
                        
                        $doc_message ="Hello Dr.$doc_name this is the meet link for your schedule appointment with Sir/Madam, $pname $maillink";
                        echo $user_message ="Hello Sir/Madam, $pname this is the meet link for your schedule appointment with Dr.$doc_name $maillink";
                        
                        if(empty($maillinkErr)){
                         mail($email, 'Hello Sir,', $doc_message,'From: medicare825@gmail.com');

                         mail($user_email, 'Hello Sir,', $user_message,'From: medicare825@gmail.com');
                         $msg = "send";

                         $insert = mysqli_query($conn, "UPDATE appointments SET msg = '$msg' WHERE appointment_id= '$appointment_id'");
                          echo "<script>alert('Link Send Successfully');
                          document.location = 'raonline.php';</script>";
                         }else{
                            echo "<script>alert('Something Went Wrong');</script>";
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
        <title>Send Link</title>
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

            <
            <div id="page-wrapper">
                <div class="container-fluid" style="position: relative;top: 192px;width: 619px;height:px;">                 
                    <div class="panel panel-primary">
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Paste Link</h3>
                        </div>
                        <!-- panel heading end -->
                            <div class="footer-three-grid wow fadeIn animated" data-wow-delay="0.66s">
                                <div class="row" >
                                    <div class="panel-body" style="height: 175px;">
                        <!-- panel content start -->
                                        <div class="bootstrap-iso">
                                         <div class="container-fluid">
                                          <div class="row">
                                           <div class="col-md-12 col-sm-12 col-xs-12">
                                            <form class="form-horizontal" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

                                                <div class="form-group form-group-lg <?php echo (!empty($maillinkErr)) ? 'has-error' : ''; ?>">
                                                  <label class="control-label col-sm-2 " for="" style="position: relative; top: -14px; left: 180px;width: 200px;font-size: 20px;">
                                                         Paste Link Here
                                                  </label>
                                                      <div class="col-sm-10" style="position: relative;left: 55px;">
                                                        <input type="text" class="form-control" id="maillink" name="maillink" value="" >
                                                        <span class="help-block" style="position: relative;color:red; left:153px;"><?php echo $maillinkErr; ?></span>
                                                    </div>
                                                

                                                        <input type="hidden" class="form-control" id="appointment_id" name="appointment_id" value="<?php echo $_POST['appointment_id']? $_POST['appointment_id']:''; ?> ">     
                                                      </div>
                                                    <input type="submit" name="submit" class="btn btn-success" style="top: 4px; position: relative;left: 237px;">
                                                        
                                                    
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
</body>
</html>

                             
                
                                
                              
                                
                             
                                

                                

                                
                                

   