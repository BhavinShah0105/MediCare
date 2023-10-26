<?php

include_once('db_connection.php');
$mname=$price=$mnameErr=$priceErr='';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


           if (empty($_POST["mname"])) {  
                            $mnameErr = "Medicine Name is required"; 
                    }else {  
                        $mname = ($_POST["mname"]); 
                    }  

                    if (empty($_POST["price"])) {  
                            $priceErr = "Price is required"; 
                    }else {  
                        $price = ($_POST["price"]); 
                    }  

        

                    if(empty($mnameErr) &&  empty($priceErr)){

                    $check = "SELECT * FROM medicines WHERE med_name='$mname'";

$result=mysqli_query($conn,$check) or die(mysqli_error($conn));

if (mysqli_num_rows($result)==0) 
                {
                    echo "<script type='text/javascript'> alert('Test doesnt exists.');  </script>";
      
                  
                }else{

                    $reg = "UPDATE medicines SET price = '$price' WHERE med_name='$mname'";
                    mysqli_query($conn, $reg);
                    $mname = $price = "";

                    echo "<script type='text/javascript'> alert('Price Updated Successfully'); 
                          </script>"; 
                }
                 }
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
        <title>Update Medicines</title>
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

            <div id="page-wrapper" style="    min-height: 600px !important;">
                <div class="container-fluid" style="position: relative;top: 192px;width: 619px;height:px;">                 
                    <div class="panel panel-primary" style="position: relative;
    left: 136px;
    bottom: 122px;">
                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Update Price</h3>
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

                                <div class="form-group form-group-lg <?php echo (!empty($mnameErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " for="">
                                  Medicine
                                  </label>
                                  <div class="col-sm-10 ">
                                    <input type="text" class="form-control" id="mname" name="mname" value="<?php echo $mname; ?>">
                                    <span class="help-block" style="color:red;"><?php echo $mnameErr; ?></span>
                                </div>
                                </div>  
                         
                                 <div class="form-group form-group-lg <?php echo (!empty($priceErr)) ? 'has-error' : ''; ?>">
                                  <label class="control-label col-sm-2 requiredField" for="scheduleday">
                                   Price
                                    </label>
                                   <div class="col-sm-10">
                                   <input type="text" class="form-control" id="price" name="price" value="<?php echo $price; ?>">
                                   <span class="help-block" style="color:red;"><?php echo $priceErr; ?></span>
                                </div>
                                </div>

                                 
                                  <input type="submit" name="submit" value="Update" class="btn btn-block btn-primary" style=" position :relative; width: 200px; left: 187px;">
                                  </div>
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

 


            <div id="page-wrapper">
                <div class="container-fluid">
                    <br><br>
                    <!-- Page Heading -->
                    
                    <div class="container">
                        <div class="row">
<div class="panel panel-primary filterable" style="position: relative;
    left: 101px;
   bottom: 338px;">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">List of Medicines</h3>
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
                                    <th><input type="text" class="form-control" placeholder="Sr no" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Medicine" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="Price" disabled></th>
                                    
                                                                     
                                </tr>
                            </thead>
                            
                            <?php 
                            $result="SELECT * FROM medicines"; 
                            $re=mysqli_query($conn,$result);
                            $sno= "";

                                  
                            while ($docRow=mysqli_fetch_array($re)) {
                                $sno++;
                              
                                
                                echo "<tr>";
                                    echo "<td>" . $sno. "</td>";
                                    echo "<td>" . $docRow['med_name'] . "</td>";
                                    echo "<td>" . $docRow['price'] . "</td>";
                                    
                                    
                                echo "</tr>";
                               
                            } 
                                
                           echo "</tbody>";
                       echo "</table>";
                       echo "<div class='panel panel-default'>";
                       echo "<div class='col-md-offset-3 pull-right'>";
                      
                        echo "</div>";
                        echo "</div>";
                        ?>
                       
                        </div>
                        
<?php  
 function input_data($data) {  
          $data = trim($data);  
          $data = stripslashes($data);  
          $data = htmlspecialchars($data);  
          return $data;  
        }  
?>
                       
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