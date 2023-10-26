<?php
include_once('db_connection.php');
if (isset($_SESSION['email'])) {
  
$result=mysqli_query($conn,"SELECT * FROM doctors");
$docRow=mysqli_fetch_array($result);
$id = $docRow['id'];
$tmode = "Online";
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
        <title>Cancel Appointments</title>
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
                            <h3 class="panel-title">List of Cancel Appointments</h3>
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
                                    <th><input type="text" class="form-control" placeholder="Appointment Mode" disabled></th>
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
                                     <th><input type="text" class="form-control" placeholder="CancelBy" disabled></th>                                    
                                     <th><input type="text" class="form-control" placeholder="Reason" disabled></th> 
                                </tr>
                            </thead>
                            
                            <?php 
                            $results=mysqli_query($conn,"SELECT * FROM cancelapp WHERE hname='KEM Hospital'");
                            

                                  
                            while ($docRow=mysqli_fetch_array($results)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $docRow['tmode'] . "</td>";
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
                                    echo "<td>" . $docRow['cancelby'] . "</td>";
                                    echo "<td>" . $docRow['reason'] . "</td>";
                                    
                               
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

