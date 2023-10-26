<?php
include_once('db_connection.php');
if (isset($_SESSION['email'])) {
  
$result=mysqli_query($conn,"SELECT * FROM doctors");
$docRow=mysqli_fetch_array($result);
$id = $docRow['id'];
$tmode = "Home Visit";
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
        <title>Home Visit Appointments</title>
        <!-- Bootstrap Core CSS -->
        <!-- <link href="assets/css/bootstrap.css" rel="stylesheet"> -->
        <link href="aassets/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="aassets/css/sb-admin.css" rel="stylesheet">
        <link href="aassets/css/style.css" rel="stylesheet">
        <link href="aassets/font-awesome/css/font-awesome.css" rel="stylesheet">
        <!-- Custom Fonts -->
        <style >
            
            #myModal{
  margin-top: 80px;
}
#myModal1{
  margin-top: 0px;
}
.modal-login {  
  color: #636363;
  width: 350px;
}
.modal-login .modal-content {
  padding: 20px;
  border-radius: 5px;
  border: none;
}
.modal-login .modal-header {
  border-bottom: none;   
  position: relative;
  justify-content: center;
}
.modal-login h4 {
  text-align: center;
  font-size: 26px;
  margin: 30px 0 -15px;
}
.modal-login .form-control:focus {
  border-color: #70c5c0;
}
.modal-login .form-control, .modal-login .btn {
  min-height: 40px;
  border-radius: 3px; 
}
.modal-login .close {
  border: none;
  outline: none;
  position: absolute;
  top: -5px;
  right: -5px;
} 
.modal-login .modal-footer {
  background: #ecf0f1;
  border-color: #dee4e7;
  text-align: center;
  justify-content: center;
  margin: 0 -20px -20px;
  border-radius: 5px;
  font-size: 13px;
}
.modal-login .modal-footer a {
  color: #999;
}   
.modal-login .avatar {
  position: absolute;
  margin: 0 auto;
  left: 0;
  right: 0;
  top: -60px;
  width: 95px;
  height: 95px;
  border-radius: 50%;
  z-index: 9;
  background: #a4c639;
  padding: 15px;
  box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.1);
}
.modal-login .avatar img {
  width: 100%;
}
.modal-login.modal-dialog {
  margin-top: 80px;
}
.modal-login .btn, .modal-login .btn:active {
  color: #fff;
  border-radius: 4px;
  text-decoration: none;
  transition: all 0.4s;
  line-height: normal;
  border: none;
}
     
        
</style>
    </head>
    <body>
        <div id="wrapper">

            <!-- Navigation -->
            <nav class="navbar navbar-inverse navbar-fixed-top"  role="navigation">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="doctordashboard.php" style="height: 80px;">Welcome Admin
                      </a>
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
                    <br><br>
                    <!-- Page Heading -->
                    
                    <div class="container"  style="width: fit-content;">
                        <div class="row">

<div class="panel panel-primary filterable">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Home Visits Appointments</h3>
                            <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                        </div>
                        </div>

 <div class="panel-body">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="Doctors Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Patients Email" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Patients Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Age" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Gender" disabled></th> 
                                    <th><input type="text" class="form-control" placeholder="Contact No" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Aadhar No" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Appointment Day" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Appointment Date" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Address" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Description" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Booking Time" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Cancel" disabled></th>
                                                                         
                                </tr>
                            </thead>
                            
                            <?php 
                            $results=mysqli_query($conn,"SELECT * FROM confirmapp WHERE hname='KEM Hospital' AND tmode = 'Home Visit' ");
                            

                                  
                            while ($docRow=mysqli_fetch_array($results)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $docRow['doc_name'] . "</td>";
                                    echo "<td>" . $docRow['user_email'] . "</td>";
                                    echo "<td>" . $docRow['pname'] . "</td>";
                                    echo "<td>" . $docRow['age'] . "</td>";
                                    echo "<td>" . $docRow['gender'] . "</td>";
                                    echo "<td>" . $docRow['contactno'] . "</td>";
                                    echo "<td>" . $docRow['aadharno'] . "</td>";
                                    echo "<td>" . $docRow['booking_day'] . "</td>";
                                    echo "<td>" . $docRow['booking_date'] . "</td>";
                                    echo "<td>" . $docRow['address'] . "</td>";
                                    echo "<td>" . $docRow['description'] . "</td>";
                                    echo "<td>" . $docRow['booking_time'] . "</td>";
                                     
                                     echo "<td class='text-center'><button  href='#myModal".$docRow['appointment_id']."' class='btn btn-danger' data-toggle='modal' >Cancel</button></a>
                                </td>";
                           echo" <div id='myModal".$docRow['appointment_id']."' class='modal fade'>
                      <div class='modal-dialog modal-login'>
                        <div class='modal-content'>

                          <div class='modal-body'>
                            <form method='POST' action='hcancelapp.php'>
                              <div class='form-group'>
                                <textarea type='text' class='form-control' name='reason' placeholder='Enter your reason here..' style='border: 1px solid black;' required='required' style='resize:none'></textarea>  
                              </div>
                          <input type='hidden' value='".$docRow['appointment_id']."' name='appointment_id'>       
                              <div class='form-group'>
                                <button type='submit' name='signin' class='btn btn-danger btn-lg btn-block login-btn'>Cancel</button>
                              </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div> ";
}
                                echo "</tr>";
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div class='panel panel-default'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                      
                        echo "</div>";
                        echo "</div>";
                        ?>
                       
                        </div>
                        

                       
                      </div>
                    </div>

                    
                    
        
    </body>
    </html>

              <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>                    
                              
                                
                             
                                

                                

                                
                                
                    <!-- panel end -->
<script type="text/javascript">
function chkit(uid, chk) {
   chk = (chk==true ? "1" : "0");
   var url = "checkdb.php?userid="+uid+"&chkYesNo="+chk;
   if(window.XMLHttpRequest) {
      req = new XMLHttpRequest();
   } else if(window.ActiveXObject) {
      req = new ActiveXObject("Microsoft.XMLHTTP");
   }
   // Use get instead of post.
   req.open("GET", url, true);
   req.send(null);
}
</script>


 
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
        </div>
        <!-- /#wrapper -->


       
        <!-- jQuery -->
        <script src="../patient/assets/js/jquery.js"></script>
       
 <script src="pt/assets/js/jquery.js"></script>
        <script type="text/javascript">
$(function() {
$(".delete").click(function(){
var element = $(this);
var ic = element.attr("id");
var info = 'ic=' + ic;
if(confirm("Are you sure you want to delete this?"))
{
 $.ajax({
   type: "POST",
   url: "deletepatient.php",
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
 <script type="text/javascript">
            /*
            Please consider that the JS part isn't production ready at all, I just code it to show the concept of merging filters and titles together !
            */
            $(document).ready(function(){
                $('.filterable .btn-filter').click(function(){
                    var $panel = $(this).parents('.filterable'),
                    $filters = $panel.find('.filters input'),
                    $tbody = $panel.find('.table tbody');
                    if ($filters.prop('disabled') == true) {
                        $filters.prop('disabled', false);
                        $filters.first().focus();
                    } else {
                        $filters.val('').prop('disabled', true);
                        $tbody.find('.no-result').remove();
                        $tbody.find('tr').show();
                    }
                });

                $('.filterable .filters input').keyup(function(e){
                    /* Ignore tab key */
                    var code = e.keyCode || e.which;
                    if (code == '9') return;
                    /* Useful DOM data and selectors */
                    var $input = $(this),
                    inputContent = $input.val().toLowerCase(),
                    $panel = $input.parents('.filterable'),
                    column = $panel.find('.filters th').index($input.parents('th')),
                    $table = $panel.find('.table'),
                    $rows = $table.find('tbody tr');
                    /* Dirtiest filter function ever ;) */
                    var $filteredRows = $rows.filter(function(){
                        var value = $(this).find('td').eq(column).text().toLowerCase();
                        return value.indexOf(inputContent) === -1;
                    });
                    /* Clean previous no-result if exist */
                    $table.find('tbody .no-result').remove();
                    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
                    $rows.show();
                    $filteredRows.hide();
                    /* Prepend no-result row if all rows are filtered */
                    if ($filteredRows.length === $rows.length) {
                        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
                    }
                });
            });
        </script>
        
        <!-- Bootstrap Core JavaScript -->
        <script src="pt/assets/js/bootstrap.min.js"></script>
        <script src="asset/js/bootstrap-clockpicker.js"></script>
    </body>
</html>

