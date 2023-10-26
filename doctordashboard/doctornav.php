<div class="collapse navbar-collapse navbar-ex1-collapse">
                    <ul class="nav navbar-nav side-nav">
                        <li class="active">
                            <a href="today.php"><i class="fa fa-calendar"> </i> Todays Schedule</a>
                        </li>
                        <li>
                            <a href="weeklyapp.php"><i class="fa fa-calendar"> </i> Weekly Appointment</a>
                        </li>
                        <li>
                            <a href="easysearch.php"><i class="fa fa-calendar"> </i> Easy Search</a>
                        </li>
                        <li>
                            <a href="walkin.php"><i class="fa fa-walking"> </i> Walkin Appointments </a>
                        </li>
                        <li>
                            <a href="online.php"><i class="fa fa-video-camera" aria-hidden="true"></i> Online Appointments </a>
                        </li>
                        <li>
                            <a href="homevisits.php"><i class="fa fa-wheelchair"> </i>  Home Visits </a>
                        </li>
                        <li>
                            <a href="blog.php"><i class="fa fa-fw fa-edit"></i>  Blog </a>
                        </li>
                        
                        <li>
                            <a href="leavenote.php"><i class="fa fa-minus-square" aria-hidden="true"></i>  Add leave note </a>
                            <?php 
                            $msg='';
                             $results=mysqli_query($conn,"SELECT * FROM notification WHERE doctor_id = '$id'");
                             while ($LRow=mysqli_fetch_array($results)) {
                                $msg = $LRow['msg'];
                                }

                                if ($msg == 'unread') {
                                    echo '<i class="fa fa-bell" aria-hidden="true" style="color:red;color: red;position: relative;top: -44px;left: 156px;"></i>';
                                }
                           
                ?>
                        </li>
                    </ul>
                </div>
                   <script src="pt/assets/js/bootstrap.min.js"></script>
        <script src="asset/js/bootstrap-clockpicker.js"></script>

                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>