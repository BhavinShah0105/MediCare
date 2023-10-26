<?php
include_once('db_connection.php');
 if(!isset($_SESSION['username']))
  {
    header("location:adminlogin.php");
    exit;
  } 

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Admin</title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="aassets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="aassets/css/sb-admin.css" rel="stylesheet">
        <link href="aassets/css/style.css" rel="stylesheet">
        <link href="aassets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <style >
            
            .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>
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
                    <a class="navbar-brand" href="doctordashboard.php" style="height: 80px;">Welcome Admin</a>
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
            <!-- navigation end -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Dashboard
                            </h2>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">

                            

<?php  

$pi=mysqli_query($conn,"SELECT COUNT(appointment_id) AS yj FROM completeapp ");
$bgsb=mysqli_fetch_array($pi);

?>
                      
                        <div class="col-md-4">
                          <div class="card-counter danger">
                            <i class="fa fa-users" ></i>
                            <span class="count-numbers"><?php echo $bgsb['yj']; ?></span>
                            <span class="count-name">Patients</span>
                          </div>
                        </div>
<?php  

$r=mysqli_query($conn,"SELECT COUNT(username) AS unm FROM doctors ");
$dR=mysqli_fetch_array($r);

?>
                        <div class="col-md-4">
                          <div class="card-counter success">
                           <i class="fa fa-user-md"  aria-hidden="true"></i>
                            <span class="count-numbers"><?php echo $dR['unm']; ?></span>
                            <span class="count-name">Doctors</span>
                          </div>
                        </div>

                     


                    <?php  

$ka=mysqli_query($conn,"SELECT COUNT(appointment_id) AS ysj FROM completeapp WHERE tmode = 'Online' ");
$bg=mysqli_fetch_array($ka);

?>
                      
                        <div class="col-md-4">
                          <div class="card-counter primary">
                            <i class="fa fa-users" ></i>
                            <span class="count-numbers"><?php echo $bg['ysj']; ?></span>
                            <span class="count-name">Online Appointment</span>
                          </div>
                        </div>
<?php  

$ch=mysqli_query($conn,"SELECT COUNT(appointment_id) AS yjr FROM completeapp  WHERE tmode = 'Walkin' ");
$blu=mysqli_fetch_array($ch);

?>
                        <div class="col-md-4">
                          <div class="card-counter danger">
                           <i class="fa fa-user-md"  aria-hidden="true"></i>
                            <span class="count-numbers"><?php echo $blu['yjr']; ?></span>
                            <span class="count-name">Walkin Appointment</span>
                          </div>
                        </div>
<?php  
$u=mysqli_query($conn,"SELECT COUNT(appointment_id) AS me FROM completeapp WHERE tmode = 'Home Visit' ");
$chup=mysqli_fetch_array($u);

?>
                        <div class="col-md-4">
                          <div class="card-counter success">
                           <i class="fa fa-file-text"  aria-hidden="true"></i>
                            <span class="count-numbers"><?php echo $chup['me']; ?></span>
                            <span class="count-name">Home Visit Appointment</span>
                          </div>
                        </div>
                      </div>
                    </div>

                    
                    
        
    </body>
    </html>

                                
                              
                                
                             
                                

                    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>            

                                
                                

    </body>
</html>