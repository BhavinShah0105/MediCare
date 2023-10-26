<?php
include_once('db_connection.php');
$var=$_SESSION['email'];
$login = "SELECT * FROM users WHERE email='$var'";
$result=mysqli_query($conn,$login) or die(mysqli_error($conn));

$row=mysqli_fetch_array($result);
$username=$row['username'];
$email=$row['email'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>User Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/bootstrap-custom.min.css" />
        <link rel="stylesheet" type="text/css" href="css/home-fc7feca9f503fbeaf0f12645f3d0f2dc.css" />

 <link rel="stylesheet" type="text/css" href="css/bootstrap-custom.min.css" />
        <link rel="stylesheet" type="text/css" href="css/home-fc7feca9f503fbeaf0f12645f3d0f2dc.css" />
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

        </style>
        
      </head>
<body>
    <?php 
include_once('profilenav.php');
?>
        <div id="mainContainer">
          <div data-reactroot="" class="main-container bg-grey">
            <div class="app-container">
            <div class="practo-nav">
              
            </div>
            <div class="row" id="userCardContainer">
              <div class="col-sm-12 hidden-xs user-card-wrapper separator"><div class="user-card row bg-white">
                <div class="product-name heading-two col-sm-3 col-lg-2">Your Profile</div>
                <div class="user-info col-sm-9 col-lg-10">
                  <div class="user-details">
                    <div class="user-name heading-four"><?php echo htmlspecialchars($row['username']);?></div>
                    <div class="user-contact text-small subtle"><!-- react-text: 66 --><?php echo htmlspecialchars($row['email']);?><!-- /react-text --><!-- react-text: 18 --><!-- /react-text --></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row" id="sideBarAppContainer">
            <div class="col-sm-3 col-lg-2 hidden-xs sidebar-wrapper">
              <div class="sidebar bg-white">
                
                    <a class="sidebar-link" href="doneapp.php">
                      <div class="sidebar-item text separator"><!-- react-text: 28 -->Appointments<!-- /react-text -->
                        <span class="unread-count text-small hidden">0</span>
                      </div></a>
                        <a class="sidebar-link" href="cancelapp.php">
                          <div class="sidebar-item text separator"><!-- react-text: 32 -->Cancel Appointments<!-- /react-text -->
                            <span class="unread-count text-small hidden">0</span>
                            <?php
                            $result=mysqli_query($conn,"SELECT * FROM cancelnotification WHERE user_email = '$var' AND pname = '$username'");
                             $LRo=mysqli_fetch_array($result); 
                                echo $msg = $LRo['msg'];
                                

                                if ($msg == 'unread') {
                                    echo '<i class="bi bi-bell-fill"></i>';
                                }
                        ?>
                          </div></a>
                            
                            
                                
                                
                                
                                </div>
                              </div>
                              <div class="col-sm-9 col-lg-10 col-xs-12 product-container-wrapper">
                                <div></div>
                                <div class="appointment-container bg-grey">
                                  <div class="m-heading-three product-title hidden-sm hidden-md hidden-lg bg-white">Appointments</div>
                                  <div class="no-appointments">
                                    <div class="no-appointments-msg text">Sorry, you don't have any appointments</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
      </body>
    </html>