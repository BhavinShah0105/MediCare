s<?php

include_once 'db_connection.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Doc_Info</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link href="asset/css/material.css" rel="stylesheet">
        <!-- Custom CSS -->
        <link href="asset/css/sb-admin.css" rel="stylesheet">
        <link href="asset/css/time/bootstrap-clockpicker.css" rel="stylesheet">
        <link href="asset/css/style.css" rel="stylesheet">
        <link href="asset/font-awesome/css/font-awesome.css" rel="stylesheet">
        <style type="text/css">
            input::placeholder { 
                  
                
                text-align: center;
            }
        </style>
          </head>
    <body>
        <div id="wrapper">

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
            <!-- navigation end --> -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h2 class="page-header">
                            Doctor's List
                            </h2>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="fa fa-calendar"></i> Doctor's List
                                </li>
                            </ol>
                        </div>
                    </div>
                    <!-- Page Heading end-->

                    <!-- panel start -->
                    <div class="panel panel-primary filterable">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Doctors</h3>
                            <div class="pull-right">
                            <button class="btn btn-default btn-xs btn-filter"><span class="fa fa-filter"></span> Filter</button>
                        </div>
                        </div>
                        <!-- panel heading end -->

                        <div class="panel-body">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="Username" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Email" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Update Profile" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Delete" disabled></th>
                                </tr>
                            </thead>
                            
                            <?php 
                            $result=mysqli_query($conn,"SELECT * FROM doctors WHERE hname='Sassoon Hospital'");
                            

                                  
                            while ($docRow=mysqli_fetch_array($result)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $docRow['username'] . "</td>";
                                    echo "<td>" . $docRow['email'] . "</td>";
                                    

                                      echo "<form action='updatedocprofile.php' method='POST'>";
                                     echo "<td class='text-center'><input type='hidden' value='".$docRow['id']."'' name='id'><button class='btn btn-primary'>Update Profile</button></td>";
                                     echo "</form>";

                                     
                                     echo "<form action='deletedoc.php' method='POST'>";
                                    echo "<td class='text-center'><input type='hidden' value='".$docRow['id']."'
                                     name='id'><button class='btn btn-danger'>Delete</button></td>";
                                      echo "</form>";
                               

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
                    <!-- panel start -->

                </div>
            </div>
        <!-- /#wrapper -->


       
        <!-- jQuery -->
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
        <!-- Latest compiled and minified JavaScript -->
         <!-- script for jquery datatable start-->
        <!-- Include Date Range Picker -->
    </body>
</html>