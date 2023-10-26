<?php
include_once('db_connection.php');
$title=$para1=$para2=$para3=$image="";
$titleErr=$para1Err=$para2Err=$para3Err=$imageErr="";
if (isset($_SESSION['email'])) {
 $email = $_SESSION['email'];
$result=mysqli_query($conn,"SELECT * FROM doctors WHERE email = '$email'");
$docRow=mysqli_fetch_array($result);
$id = $docRow['id'];
$username = $docRow['username'];
if (isset($_POST['submit']))
{
$id=$_POST['id'];
$title=$_POST['title'];
$para1=$_POST['para1'];
$para2=$_POST['para2'];
$para3=$_POST['para3'];
$image=$_POST['image'];


	 				if (empty($_POST["title"])) {  
                         $titleErr = "Title is required";
                         $Err=1;
                    }
                    if (empty($_POST["para1"])) {  
                         $para1Err = " is required";
                         $Err=1;
                    }
                    if (empty($_POST["para2"])) {  
                         $para2Err = " is required";
                         $Err=1;
                    }
                    if (empty($_POST["para3"])) {  
                         $para3Err = " is required";
                         $Err=1;
                    }
                    if (empty($_POST["image"])) {  
                         $imageErr = " is required";
                         $Err=1;
                    }

   if(empty($Err)){
   $insert = mysqli_query($conn, "INSERT INTO blog (doc_id,doc_name,title,para1,para2,para3,image) VALUES('$id','$username','$title','$para1','$para2','$para3','$image')");
           
           if ($insert) {
                echo "<script>alert('Blog Send successfully');
                document.location = 'blog.php'; </script>";
           } else{
                echo "<script>alert('Somthing Went Wrong');</script>";
            }    

}

}
}

?>
<!DOCTYPE html>
<html lang="en">
     <head>
    <title>Blog</title>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        e>
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
                    <a class="navbar-brand" href="docpanel.php" style="height: 80px;">Welcome Dr. <?php echo $docRow['username'];
                     ?> </a>
                </div>
                <!-- Top Menu Items -->
                <ul class="nav navbar-right top-nav">
                    
                    
                    <li class="dropdown">
                       <a href="logout.php">Logout</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="doctorprofile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                           
                            <li class="divider"></li>
                            <li>
                                <a href="home.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
                 <?php
                include_once('doctornav.php');
                ?>
                <!-- /.navbar-collapse -->
            </nav>
            <!-- navigation end -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <br><br>
                    <!-- Page Heading -->
                    
                    <div class="container">
                        <div class="row">

                        <div class="panel panel-primary filterable">

                        <!-- panel heading starat -->
                        <div class="panel-heading">
                            <h3 class="panel-title">Write a Blog</h3>
                            <div class="pull-right">
                            
                        </div>
                        </div>

 						<div class="panel-body">
                        <!-- panel content start -->
                           <!-- Table -->
                        <form class="form-horizontal" method="post" >
                             <div class="form-group form-group-lg <?php echo (!empty($titleErr)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " style="font-size: 16px;" for="">
                                  Enter a Title 
                                  </label>
                                  <div class="col-sm-10 ">
                                    <input type="text" class="form-control" id="title" name="title" value="">
                                    <span class="help-block" style="color:red;"><?php echo $titleErr; ?></span>

                                    <input type="hidden" class="form-control" id="id" name="id" value=" <?php echo $id; ?>">

                                </div>
                                </div>  
                                <div class="form-group form-group-lg <?php echo (!empty($para1Err)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " style="font-size: 16px;" for="">
                                 Paragraph 1
                                  </label>
                                  <div class="col-sm-10 ">
                                   <textarea rows="5" cols="100" name="para1" id="para1" style="border: 2px solid;" ></textarea>
                                    <span class="help-block" style="color:red;"><?php echo $para1Err; ?></span>
                                </div>

                                </div>  
                                <div class="form-group form-group-lg <?php echo (!empty($para2Err)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " style="font-size: 16px;" for="">
                                 Paragraph 2 
                                  </label>
                                  <div class="col-sm-10 ">
                                     <textarea rows="5" cols="100" name="para2" id="para2" style="border: 2px solid;"></textarea>
                                    <span class="help-block" style="color:red;"><?php echo $para2Err; ?></span>
                                </div>
                                </div>  
                                <div class="form-group form-group-lg <?php echo (!empty($para3Err)) ? 'has-error' : ''; ?>" >
                                  <label class="control-label col-sm-2 " style="font-size: 16px;" for="">
                                 Paragraph 3 
                                  </label>
                                  <div class="col-sm-10 ">
                                     <textarea rows="5" cols="100" name="para3" id="para3" style="border: 2px solid;"></textarea>
                                    <span class="help-block" style="color:red;"><?php echo $para3Err; ?></span>
                                </div>
                                </div> 
                                 <div class="form-group form-group-lg <?php echo (!empty($imageErr)) ? 'has-error' : ''; ?>" style="    position: relative;top: 13px;">
                                  <label class="control-label col-sm-2 " style="font-size: 16px; bottom: 16px;" for="">
                                 Enter a Image
                                  </label>
                                  <div class="col-sm-10 ">
                                     <input type="file" class="form-control-left" id="image" name="image">
                                    <span class="help-block" style="color:red;"><?php echo $imageErr; ?></span>
                                </div>
                                </div> 
                                <input type="submit" name="submit" value="Submit" class="btn btn-block btn-primary" style="width: 197px;position: relative;left: 449px;">
                               
                           
                       
                        </div>
                        

                       
                      </div>
                    </div>

                    </form>
                    
        
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

