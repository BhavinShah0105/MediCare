<div class="d-flex" id="wrapper">
                                    <!-- Sidebar-->
                                    <div class="border-end bg-white" id="sidebar-wrapper">
                                        <!--div class="sidebar-heading border-bottom bg-light">Start Bootstrap</div-->
                                        <div class="list-group list-group-flush">
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="profile.php">Appointments</a>
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="Cancelapp.php">Cancel Appointments</a>
                                            <?php
                                               $msg="";
                                                 $HV= "SELECT * FROM cancelnotification WHERE user_email = '$var'";
                                                  $V=mysqli_query($conn,$HV);
                                                     while ($LRo=mysqli_fetch_array($V)) {
                                                        $msg = $LRo['msg'];
                                                        }
                                                        if ($msg == 'unread') {
                                                            echo '<i class="bi bi-bell-fill" style="position: relative;top: -39px;left: 193px;color:red;"></i>';
                                                        }
                                                
                                                ?>
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="onlineapp.php">Approved Home Visits</a>
                                            <?php
                                               $msg="";
                                                 $HV= "SELECT * FROM hvnotification WHERE user_email = '$var'";
                                                  $V=mysqli_query($conn,$HV);
                                                     while ($LRo=mysqli_fetch_array($V)) {
                                                        $msg = $LRo['msg'];
                                                        }
                                                        if ($msg == 'unread') {
                                                            echo '<i class="bi bi-bell-fill" style="position: relative;top: -39px;left: 193px;color:red;"></i>';
                                                        }
                                                
                                                ?>
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="pending.php">Pending Home Visits</a>
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="rejectapp.php">Rejected Home Visits</a>
                                             <?php
                                               $msg="";
                                                 $RV= "SELECT * FROM hvrejectnotification WHERE user_email = '$var'";
                                                  $RV=mysqli_query($conn,$RV);
                                                    while ($RRo=mysqli_fetch_array($RV)) {
                                                        $msg = $RRo['msg'];
                                                        }
                                                        if ($msg == 'unread') {
                                                            echo '<i class="bi bi-bell-fill" style="position: relative;top: -39px;left: 193px;color:red;"></i>';
                                                        }
                                                
                                                ?>
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="completeapp.php">Complete Appoinments</a>
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="medshow.php">Medical Bills</a>
                                            <a class="list-group-item list-group-item-action list-group-item-light p-3" href="labshow.php">Laboratory Bills</a>
                                            
                                        </div>
                                    </div>
                                  </div>
         