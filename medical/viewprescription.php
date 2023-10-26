<?php
include_once('db_connection.php');
  if(!isset($_SESSION['username']))
  {
    header("location:../medicallogin.php");
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
        <title>Drug Store</title>
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
         <style>
          body {
            background-color: #f0f0f5;
          }

          .loader {
            height: 80px;
            width: 80px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-pack: distribute;
            justify-content: space-around;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
          }
            .circle {
              height: 16px;
              width: 16px;
              border-radius: 50%;
              display: inline-block;
              background: #000;
              -webkit-animation-duration: 1s;
              animation-duration: 1s;
              -webkit-animation-name: glow;
              animation-name: glow;
              -webkit-animation-iteration-count: infinite;
              animation-iteration-count: infinite;
            }
            .circle-one {
              -webkit-animation-delay: 0s;
              animation-delay: 0s;
            }
            .circle-two {
              -webkit-animation-delay: 0.25s;
              animation-delay: 0.25s;
            }
            .circle-three {
              -webkit-animation-delay: 0.5s;
              animation-delay: 0.5s;
            }
          }

          .loader-wrapper {
            height: 100%;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
          }

          @-webkit-keyframes glow {
            from {
              opacity: 0.2;
            }
            50% {
              opacity: 0.8;
            }
            to {
              opacity: 0.2;
            }
          }

          @keyframes glow {
            from {
              opacity: 0.2;
            }
            50% {
              opacity: 0.8;
            }
            to {
              opacity: 0.2;
            }
          }

          body{
    background: #F4F7FD;
    margin-top:20px;
}

.card-margin {
    margin-bottom: 1.875rem;
}

.card {
    border: 0;
    box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -webkit-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -moz-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
    -ms-box-shadow: 0px 0px 10px 0px rgba(82, 63, 105, 0.1);
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #ffffff;
    background-clip: border-box;
    border: 1px solid #e6e4e9;
    border-radius: 8px;
}

.card .card-header.no-border {
    border: 0;
}
.card .card-header {
    background: none;
    padding: 0 0.9375rem;
    font-weight: 500;
    display: flex;
    align-items: center;
    min-height: 50px;
}
.card-header:first-child {
    border-radius: calc(8px - 1px) calc(8px - 1px) 0 0;
}

.widget-49 .widget-49-title-wrapper {
  display: flex;
  align-items: center;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-primary {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #edf1fc;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-day {
  color: #4e73e5;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-primary .widget-49-date-month {
  color: #4e73e5;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-secondary {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #fcfcfd;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-day {
  color: #dde1e9;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-secondary .widget-49-date-month {
  color: #dde1e9;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-success {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #e8faf8;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-day {
  color: #17d1bd;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-success .widget-49-date-month {
  color: #17d1bd;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-info {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #ebf7ff;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-day {
  color: #36afff;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-info .widget-49-date-month {
  color: #36afff;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-warning {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: floralwhite;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-day {
  color: #FFC868;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-warning .widget-49-date-month {
  color: #FFC868;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-danger {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #feeeef;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-day {
  color: #F95062;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-danger .widget-49-date-month {
  color: #F95062;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-light {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #fefeff;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-day {
  color: #f7f9fa;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-light .widget-49-date-month {
  color: #f7f9fa;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-dark {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #ebedee;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-day {
  color: #394856;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-dark .widget-49-date-month {
  color: #394856;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-base {
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
  background-color: #f0fafb;
  width: 4rem;
  height: 4rem;
  border-radius: 50%;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-day {
  color: #68CBD7;
  font-weight: 500;
  font-size: 1.5rem;
  line-height: 1;
}

.widget-49 .widget-49-title-wrapper .widget-49-date-base .widget-49-date-month {
  color: #68CBD7;
  line-height: 1;
  font-size: 1rem;
  text-transform: uppercase;
}

.widget-49 .widget-49-title-wrapper .widget-49-meeting-info {
  display: flex;
  flex-direction: column;
  margin-left: 1rem;
}

.widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-pro-title {
  color: #3c4142;
  font-size: 14px;
}

.widget-49 .widget-49-title-wrapper .widget-49-meeting-info .widget-49-meeting-time {
  color: #B1BAC5;
  font-size: 13px;
}

.widget-49 .widget-49-meeting-points {
  font-weight: 400;
  font-size: 13px;
  margin-top: .5rem;
}

.widget-49 .widget-49-meeting-points .widget-49-meeting-item {
  display: list-item;
  color: #727686;
}

.widget-49 .widget-49-meeting-points .widget-49-meeting-item span {
  margin-left: .5rem;
}

.widget-49 .widget-49-meeting-action {
  text-align: right;
}

.widget-49 .widget-49-meeting-action a {
  text-transform: uppercase;
}
        </style>
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
                    <a class="navbar-brand" href="doctordashboard.php" style="height: 80px;">Welcome </a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    
                    
                    <li class="dropdown">
                        
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            
                        
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
               <?php
               include_once('medicalnavbar.php');
               ?>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- navigation end -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                   <div class="container" >
                    <form method="post">
                                        <label class="" style="font-size: 16px;position: relative;top: 108px;left: 447px;" for="">
                                <b> Search Appointments Here</b>
                                  </label>

                                         <input type="text" class="form-control" id="title" name="search" value="" placeholder ="          Enter Appointment-ID OR Mail-ID" style="position: relative;top: 122px;border: 1px solid;width: 340px;left:382px;">


                                        <input type="submit" name="Search" value="Search" class="btn btn-block btn-primary" style="position: relative;top: 136px;width: 201px; left: 446px;">


                                            
                                    </form>

<?php 
$search=$sch="";
if (isset($_POST['Search'])) {
  

if(empty($_POST['search']))
{
  echo "<script type='text/javascript'> alert('Plaease Enter Email/Appointment_id'); 
      document.location = 'viewprescription.php'; </script>";
    }else {
      $search = $_POST['search'];
    }

$SEARCH= "SELECT * FROM completeapp WHERE user_email ='$search' OR appointment_id ='$search'";

$r = mysqli_query($conn,$SEARCH);

$sch=mysqli_fetch_all($r,MYSQLI_ASSOC);
$rowcount=mysqli_num_rows($r);

if (mysqli_num_rows($r)==0) {
  echo "<script type='text/javascript'> alert('No Data Found!!'); 
      document.location = 'viewprescription.php'; </script>";
}


?>

<?php 
if($rowcount>= 1){

  ?> 


                                    <?php foreach ($sch as $sch){ ?>
                                     <div class="container" >
                                      <div class="row">

                                          <div class="col-lg-4">
                                              <div class="card card-margin" style="position: relative;width: 625px;top: 270px;left: 240px;height: 236px;">
                                                  <div class="card-header no-border">
                                                      <h5 class="card-title" ></h5>
                                                  </div>
                                                  <div class="card-body pt-0">
                                                      <div class="widget-49">
                                                          <div class="widget-49-title-wrapper">
                                                              <div class="widget-49-date-primary"style="position: absolute;top: 78px;left: 25px;">
                                                                  <span class="widget-49-date-day"style="font-size: 22px;" ><?php echo$sch['appointment_id']; ?> </span>
                                                                  
                                                              </div>
                                                              <div class="widget-49-meeting-info" style="overflow: hidden;">
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 41px;font-size: 17px;">Doctor Name: Dr.<?php echo$sch['doc_name']; ?> </span>
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;font-size: 17px;top: 64px;">Patient Name:<?php echo$sch['pname']; ?>  </span>

                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 86px;font-size: 17px; ">Appointment Date:<?php echo$sch['booking_date']; ?></span>
                                                                  <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 110px;font-size: 17px;">Appointment Booking Time:<?php echo$sch['booking_time']; ?></span>
                                                                   <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 159px;font-size: 17px;">Hospital Name:<?php echo$sch['hname']; ?></span>
                                                                    <span class="widget-49-pro-title"style="position: absolute;left: 113px;top: 135px;font-size: 17px;">Treatment Mode:<?php echo$sch['tmode']; ?></span>

                                                              </div>
                                                          </div>
                                                         

                                                         <form method='POST' action="viewdetails.php"style="position: absolute;top: 173px;left: 492px;">
                                    
                                    <input type='hidden' value="<?php echo $sch['appointment_id']; ?>" name='appointment_id'>
                                    <button type='submit' class='btn btn-primary' name='viewdetails' >View Details</button>
                                            
                                    </form>
                               

                                                              
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  
                               
                                <?php }?>

                          <?php } }?> 
                          </div>
                                  </div>
                            </div>
                    </div>
                    
        
    </body>
    </html>

                                
                              
                                
                             
                                

                    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>            

                                
                                

    