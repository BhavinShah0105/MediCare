<?php
include_once('db_connection.php');
$DoctorDetailsSql = "SELECT id, username, email, hname FROM doctors WHERE hname='KEM Hospital'";
$DoctorDetails = mysqli_query($conn,$DoctorDetailsSql);

if (isset($_POST['update'])) 
{
    
  $hname = 'KEM Hospital';
  $id = $_POST['doctor_id'];

  if(isset($_POST['scheduleday']) && count($_POST['scheduleday']) > 0) 
  { 
    if(count(array_unique($_POST['scheduleday']))<count($_POST['scheduleday']))
    {
      echo "<script type='text/javascript'>  alert('Days in the schedule are repeated'); 
              document.location = 'updateschedule.php'; </script>";
                
                exit;               
    }
    


    $scheduleday = $_POST['scheduleday'];
    $wstarttime = $_POST['wstarttime'];
    $wendtime = $_POST['wendtime'];
    $wslots = $_POST['wslots'];
    $hstarttime = $_POST['hstarttime'];
    $hendtime = $_POST['hendtime'];
    $ostarttime = $_POST['ostarttime'];
    $oendtime = $_POST['oendtime'];
    $hslots = $_POST['hslots'];
    $oslots = $_POST['oslots'];


    $DeleteSql =  "DELETE FROM doctorschedule WHERE id='$id' AND hname='$hname'";
    $query=mysqli_query($conn,$DeleteSql);

    foreach ($scheduleday as $key => $value){

        $save= "INSERT INTO doctorschedule(id,scheduleday,wstarttime,wendtime,wslots,ostarttime,oendtime,oslots,hstarttime,hendtime,hslots,hname)values('".$id."' , '".$scheduleday[$key]."' , '".$wstarttime[$key]."' , '".$wendtime[$key]."' , '".$wslots[$key]."' , '".$ostarttime[$key]."' , '".$oendtime[$key]."' , '".$oslots[$key]."' , '".$hstarttime[$key]."', '".$hendtime[$key]."', '".$hslots[$key]."','".$hname."')";
          
        $query=mysqli_query($conn,$save);
        if ($query) {
          echo "<script type='text/javascript'>  alert('Schedule Updated Successfully'); 
              document.location = 'updateschedule.php'; </script>";
        
            }
            else{
                echo "Sign up failed!(Something went wrong).";
            }               
          
        }
      }

    
  }

 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
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
      <title>Update Schedule</title>
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
                  <a class="navbar-brand" href="doctordashboard.php" style="height: 80px;">Welcome Admin </a>
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
                             Update Schedule
                          </h2>
                          <ol class="breadcrumb">
                              <li class="active">
                                  <i class="fa fa-calendar"></i> Schedule
                              </li>
                          </ol>
                      </div>
                  </div>
                  <!-- Page Heading end-->

                  <!-- panel start -->
                  <div class="panel panel-primary">

                      <!-- panel heading starat -->
                      <div class="panel-heading">
                          <h3 class="panel-title">Update Schedule</h3>
                      </div>
                      <!-- panel heading end -->

                      <div class="input_fields_wrap">

                           
                          
                  <div class="row" >
                      <div class="panel-body">
                      <!-- panel content start -->
                          <div class="bootstrap-iso">
                           <div class="container-fluid">
                            <div class="row">
                             <div class="col-md-12 col-sm-12 col-xs-12">
                              <form class="form-horizontal" method="post" id="add-more">
                              <div class="form-group form-group-lg">
                         
                                  <label class="control-label col-sm-2 requiredField" for="" style="left: 118px;position: relative;width: max-content;">
                                    Enter Doctors Name
                                  </label>
                                  <Select class="select form-control" id="doctor_id" name="doctor_id" style="position: relative; width: 395px;left: 126px;">

                                      <?php if(mysqli_num_rows($DoctorDetails)> 0){
                                  while($row=mysqli_fetch_array($DoctorDetails)){ ?>

                                        <option value="<?php echo $row['id']; ?>"><?php echo $row['username']. " (". $row['email'] .")"; ?></option>
                                      <?php } } ?>
                                    </Select>
                                    <button class="btn btn-primary " name="search" type="submit" style="position: relative;width: 188px; height: 36px;left: 747px; bottom: 42px;">
                                    Search
                                   </button>                              
                              </div>  
                             

                         <div class="repeated-field">
                          <?php                          
                          if(isset($_POST['search'])){
                              $id=$_POST['doctor_id'];
                              $query="SELECT * FROM doctorschedule WHERE id='$id'";
                               $result=mysqli_query($conn,$query);

                              if(mysqli_num_rows($result)> 0){
                                  while($row=mysqli_fetch_array($result)){
                                      ?>
                             
                              <div>
                              <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                 Day
                                </label>
                                <div class="col-sm-10">
                                  <select class="select form-control" id="scheduleday[]" name="scheduleday[]">
                                     <option value=" ">
                                     --Select--
                                    </option>
                                    <option value="Monday" 
                                    <?php if(strtolower($row['scheduleday']) == 'monday') { ?> selected="selected" <?php } ?>>
                                     Monday
                                    </option>


                                    <option value="Tuesday" <?php  if(strtolower($row['scheduleday']) == 'tuesday') { ?> selected="selected" <?php } ?>>
                                     Tuesday
                                    </option>
                                    <option value="Wednesday" <?php  if(strtolower($row['scheduleday']) == 'wednesday') { ?> selected="selected" <?php } ?>>
                                     Wednesday
                                    </option>
                                    <option value="Thursday" <?php  if(strtolower($row['scheduleday']) == 'thursday') { ?> selected="selected" <?php } ?>>
                                     Thursday
                                    </option>
                                    <option value="Friday" <?php  if(strtolower($row['scheduleday']) == 'friday') { ?> selected="selected" <?php } ?>>
                                     Friday
                                    </option>
                                    <option value="Saturday" <?php  if(strtolower($row['scheduleday']) == 'saturday') { ?> selected="selected" <?php } ?>>
                                     Saturday
                                    </option>
                                    <option value="Sunday" <?php  if(strtolower($row['scheduleday']) == 'sunday') { ?> selected="selected" <?php } ?>>
                                     Sunday
                                    </option>

                                   </select>
                                 
                                </div>
                               </div>


                               <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                                Walk-in Appointment Start Time
                                </label>
                                <div class="col-sm-10">
                                 <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                  <div class="input-group-addon">
                                   <i class="fa fa-clock-o">
                                   </i>
                                  </div>
                                  <input class="form-control" id="wstarttime[]" name="wstarttime[]" type="text" value="<?php  echo $row['wstarttime'];?>">
                                 </div>
                                </div>
                               </div>


                               <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="endtime">
                                Walk-in Appointment End Time
                                </label>
                                <div class="col-sm-10">
                                 <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                  <div class="input-group-addon">
                                   <i class="fa fa-clock-o">
                                   </i>
                                  </div>
                                  <input class="form-control" id="wendtime[]" name="wendtime[]" type="text" value="<?php  echo $row['wendtime'];?>" >
                                 </div>
                                </div>
                               </div>


                               <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                               Number of Slots For The Appointment's
                                </label>
                                <div class="col-sm-10">
                                  <input class="form-control" id="wslots[]" name="wslots[]" type="text" value="<?php  echo $row['wslots'];?>" >                           </div>
                               </div>


                               <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                                Online Appointment Start Time               
                                </label>
                              <div class="col-sm-10">
                                <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                  <div class="input-group-addon">
                                   <i class="fa fa-clock-o">
                                   </i>
                                  </div>
                                  <input class="form-control" id="ostarttime[]" name="ostarttime[]" type="text" value="<?php  echo $row['ostarttime'];?>" >
                                 </div>
                              </div>
                            </div>

                                <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                                  Online Appointment End Time                            
                                </label>
                                <div class="col-sm-10">
                                 <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                  <div class="input-group-addon">
                                   <i class="fa fa-clock-o">
                                   </i>
                                  </div>
                                  <input class="form-control" id="oendtime[]" name="oendtime[]" type="text" value="<?php  echo $row['oendtime'];?>"  >
                                 </div>
                                </div>
                               </div>


                               <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                                Number of  Slots For The Appointment's   
                                </label>
                                <div class="col-sm-10">
                                  <input class="form-control" id="oslots[]" name="oslots[]" type="text" value="<?php  echo $row['oslots'];?>" >
                                </div>
                               </div>


                               <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                               Home Visit Appointment Start Time
                                </label>
                                <div class="col-sm-10">
                                 <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                  <div class="input-group-addon">
                                   <i class="fa fa-clock-o">
                                   </i>
                                  </div>
                                  <input class="form-control" id="hstarttime[]" name="hstarttime[]" type="text"value="<?php echo $row['hstarttime'];?>"  >
                                 </div>
                                </div>
                               </div>


                                <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                                Home Visit Appointment End Time
                                </label>
                                <div class="col-sm-10">
                                 <div class="input-group clockpicker"  data-align="top" data-autoclose="true">
                                  <div class="input-group-addon">
                                   <i class="fa fa-clock-o">
                                   </i>
                                  </div>
                                  <input class="form-control" id="hendtime[]" name="hendtime[]" type="text" value="<?php  echo $row['hendtime'];?>">
                                 </div>
                                </div>
                               </div>


                                <div class="form-group form-group-lg">
                                <label class="control-label col-sm-2 requiredField" for="starttime">
                               Number of  Slots Appointment's
                                </label>
                                <div class="col-sm-10">
                                  <input class="form-control" id="hslots[]" name="hslots[]" type="text" 
                                  value="<?php  echo $row['hslots'];?>" >
                                </div>
                               </div>
                           <a href="#" class="remove_field btn btn-danger" id="a"> Remove </a>
                               <hr style="height:3px;border-width:0;color:gray;background-color:gray">
                               </div>
                                         <?php
                                  }
                              }else{
                                echo "<script type='text/javascript'>  alert('No Record Found'); 
                                       document.location = 'updateschedule.php'; </script>";
                
               
                               }
                            
                           
                              
                          }
                          ?>
                          </div>
                                <div class="col-sm-10 col-sm-offset-2">
                                 <button class="btn btn-primary " name="update" type="submit" style="position: relative;width: 188px; height: 36px;left: 157px;">
                              UPDATE
                                 </button>
                                 <button class="btn btn-primary add_field_button" style="position: relative;width: 188px; height: 36px;left: 160px;">ADD MORE FIELDS</button>
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
  </body>
</html>


<script src="https://code.jquery.com/jquery-3.3.1.min.js"
              ></script>
        
    
    <script>
    $(document).ready(function() {
    var max_fields      = 7; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
   
    var x = 1; //initlal text box count
    
    
   $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
    
             //text box increment
            $(".repeated-field").append('<div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="scheduleday">Day</label><div class="col-sm-10"><select class="select form-control" id="scheduleday[]" name="scheduleday[]"><option value="Monday">Monday</option><option value="Tuesday">Tuesday</option><option value="Wednesday">Wednesday</option><option value="Thursday">Thursday</option><option value="Friday">Friday</option><option value="Saturday">Saturday</option><option value="Sunday">Sunday</option></select></div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Walk-in Appointment Start Time</label><div class="col-sm-10"><div class="input-group clockpicker"  data-align="top" data-autoclose="true"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div><input class="form-control" id="wstarttime[]" name="wstarttime[]" type="text" ></div></div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="endtime">Walk-in Appointment End Time</label><div class="col-sm-10"><div class="input-group clockpicker"  data-align="top" data-autoclose="true"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div><input class="form-control" id="wendtime[]" name="wendtime[]" type="text" ></div></div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Number of Slots For The Appointments</label><div class="col-sm-10"><input class="form-control" id="wslots[]" name="wslots[]" type="text" > </div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Online Appointment Start Time</label> <div class="col-sm-10"><div class="input-group clockpicker"  data-align="top" data-autoclose="true"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div><input class="form-control" id="ostarttime[]" name="ostarttime[]" type="text"></div></div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Online Appointment End Time</label><div class="col-sm-10"><div class="input-group clockpicker"  data-align="top" data-autoclose="true"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div><input class="form-control" id="oendtime[]" name="oendtime[]" type="text" ></div></div></div> <div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Number of  Slots For The Appointments</label><div class="col-sm-10"><input class="form-control" id="oslots[]" name="oslots[]" type="text" ></div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Home Visit Appointment Start Time</label><div class="col-sm-10"><div class="input-group clockpicker"  data-align="top" data-autoclose="true"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div><input class="form-control" id="hstarttime[]" name="hstarttime[]" type="text"></div></div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Home Visit Appointment End Time</label><div class="col-sm-10"><div class="input-group clockpicker"  data-align="top" data-autoclose="true"><div class="input-group-addon"><i class="fa fa-clock-o"></i></div><input class="form-control" id="hendtime[]" name="hendtime[]" type="text"></div></div></div><div class="form-group form-group-lg"><label class="control-label col-sm-2 requiredField" for="starttime">Number of  Slots Appointments</label><div class="col-sm-10"><input class="form-control" id="hslots[]" name="hslots[]" type="text"></div><div class="col-sm-10 col-sm-offset-2"></div></div><a href="#" class="remove_field btn btn-danger" id="a"> Remove </a><hr style="height:3px;border-width:0;color:gray;background-color:gray"></div>');                               
                            
      
            x++; 
      }
    });
   
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
       
        e.preventDefault(); 
        $(this).parent('div').remove(); 
        x--;
    })
});
    
    </script>

       
        <!-- jQuery -->
        <script src="../patient/assets/js/jquery.js"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="../patient/assets/js/bootstrap.min.js"></script>
        <script src="assets/js/bootstrap-clockpicker.js"></script>
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <!-- Include Date Range Picker -->
         <script type="text/javascript">
        $(function() {
        $(".delete").click(function(){
        var element = $(this);
        var id = element.attr("id");
        var info = 'id=' + id;
        if(confirm("Are you sure you want to delete this?"))
        {
         $.ajax({
           type: "POST",
           url: "deleteschedule.php",
           data: info,
           success: function(){
         }
        });
          $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
         }
        return false;
        });
        });
        </script>


    </body>
</html>