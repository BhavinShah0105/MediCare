<?php
$appointment_id=$_POST['appointment_id'];

include_once('db_connection.php');

?>

<?php

$appointment = "SELECT * FROM completeapp WHERE appointment_id = '$appointment_id' ";
$result=mysqli_query($conn,$appointment) or die(mysqli_error($conn));
$row=mysqli_fetch_array($result);
$user_email=$row['user_email'];
$pre = "SELECT * FROM prescriptiont WHERE appointment_id = '$appointment_id' ";
$results=mysqli_query($conn,$pre) or die(mysqli_error($conn));
$rows=mysqli_fetch_array($results);






$doc_name=$row['doc_name'];
$doctor_id=$row['doctor_id'];
$pname=$row['pname'];
$tmode=$row['tmode'];
$age=$row['age'];
$gender=$row['gender'];
$contactno=$row['contactno'];
$aadharno=$row['aadharno'];
$booking_date=$row['booking_date'];
$booking_time=$row['booking_time'];
$address=$row['address'];
$hname=$row['hname'];

?>

<form method="post">
<input type="hidden" name="appointment_id" id="appointment_id" value="<?php $_POST['appointment_id']; ?>">
</form>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Tests</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="test.css" rel="stylesheet">
     <link href="aassets/css/style.css" rel="stylesheet">

    <style >
       .rate {
    float: left;
    height: 46px;
    padding: 0 10px;
}
.rate:not(:checked) > input {
    position:absolute;
    top:-9999px;
}
.rate:not(:checked) > label {
    float:right;
    width:1em;
    overflow:hidden;
    white-space:nowrap;
    cursor:pointer;
    font-size:30px;
    color:#ccc;
}
.rate:not(:checked) > label:before {
    content: '★ ';
}
.rate > input:checked ~ label {
    color: #0c84e4;    
}
.rate:not(:checked) > label:hover,
.rate:not(:checked) > label:hover ~ label {
    color: #0c84e4;  
}
.rate > input:checked + label:hover,
.rate > input:checked + label:hover ~ label,
.rate > input:checked ~ label:hover,
.rate > input:checked ~ label:hover ~ label,
.rate > label:hover ~ input:checked ~ label {
    color: #0c84e4;
}
.p-text-area, .p-text-area:focus {
    border: 1px solid 
    font-weight: 300;
    box-shadow: none;
    color: #c3c3c3;
    font-size: 16px;
    
}

.profile-info .panel-footer {
    background-color:#f8f7f5 ;
    border-top: 1px solid #e7ebee;
}

.profile-info .panel-footer ul li a {
    color: #7a7a7a;
}

    </style>
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  
  <div class="profile-info col-md-9" style="position: relative;left: 171px;">
        <div class="panel">
                         <div class="bio-graph-heading">
                            Appointment Details
                        </div>
          <div class="panel-body bio-graph-info">
              <div class="row" style="position: relative;left: 77px;">
                  <div class="bio-row">
                      <p><span  style="color:black;">Patient Name </span>: <?php echo htmlspecialchars($pname );?></p>
                  </div>
                  <div class="bio-row">
                      <p><span style="color:black;">Doctor Name </span>: <?php echo htmlspecialchars($doc_name );?></p>
                  </div>
                  
                  <div class="bio-row">
                      <p><span style="color:black;">Age</span>: <?php echo htmlspecialchars($age );?></p>
                  </div>
                  <div class="bio-row">
                      <p><span style="color:black;">Gender </span>: <?php echo htmlspecialchars($gender);?></p>
                  </div>
                
                  <div class="bio-row">
                      <p><span style="color:black;">Contact No </span>: <?php echo htmlspecialchars($contactno);?></p>
                  </div>
                  <div class="bio-row">
                      <p><span style="color:black;">Aadhar No </span>: <?php echo htmlspecialchars($aadharno );?></p>
                  </div>
                  <div class="bio-row">
                      <p><span style="color:black;">Address </span>: <?php echo htmlspecialchars($address);?></p>
                  </div>
                  <div class="bio-row">
                      <p><span style="color:black;">Appointment Date </span>: <?php echo htmlspecialchars($booking_date );?></p>
                  </div>
                  <div class="bio-row">
                      <p><span style="color:black;">Hospital Name </span>: <?php echo htmlspecialchars($hname );?></p>
                  </div>

                  <div class="bio-row">
                      <p><span style="color:black;"> Treatment Mode</span>: <?php echo htmlspecialchars($tmode );?></p>
                  </div>
            <div class="panel"  style="   position: relative;top: 253px;right: 77px;height: 166px;">
                 <input type='hidden' value="<?php echo $row['appointment_id'];  ?>" name='appointment_id'>
</div>
</div>
                   <div class="panel-body bio-graph-info">
              <div class="row" >
              <div class="panel panel-primary filterable" style="position: relative;bottom: -36px;">
  <div class="panel-heading">
                            <h3 class="panel-title">List of Tests </h3>
                            
                        </div>
            <div class="panel-body" style="position: relative; width: auto; overflow: auto;">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="Test Name" disabled></th>
                                     <th><input type="text" class="form-control" placeholder="Price" disabled></th>                                
                                </tr>
                            </thead>
                            
                            <?php 
                               $echo="Estimate Amount";
                                $rs="/- RS";
                            $results=mysqli_query($conn,"SELECT * FROM prescriptiont WHERE appointment_id='$appointment_id' ");
                            
                             $sum=0;
                                  
                            while ($docRow=mysqli_fetch_array($results)) {
                               
                              
                                echo "<tbody>";
                                echo "<tr>";
                                $pmname=$docRow['testname'];
                                    echo "<td>" . $docRow['testname'] . "</td>";
                                 $resultss=mysqli_query($conn,"SELECT * FROM tests WHERE test_name='$pmname' ");
                             while ($Row=mysqli_fetch_array($resultss) ) {
                                echo "<td>" . $Row['price'] . " /-RS</td>";
                                $sum=$sum+$Row['price'];

                             } 
                            } 
                             echo "</tr>";
                              echo "<tr>";
                               
                                 echo "<td><b><mark>" . $echo . "</mark></b></td>";
                                echo "<td><b><mark>" . $sum."/-RS</mark></b></td>";

                                echo"</tr>";
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

            </div>
          </div>

          <form method='POST'>
                                    
                                    <input type='hidden' value="<?php echo $_POST['appointment_id']; ?>" name='appointment_id'>
                                    <input type='hidden' value="<?php echo $sum; ?>" name='ea'>

                                    <button type='submit' class='btn btn-primary' name='donadone' style=" position: relative;
top: 8px;
left: 460px;" >Done</button>
                                            
                                    </form>
                                    <a href ="viewtest.php"><button class='btn btn-danger' name='back' style="position: relative;
top: -42px;
left: 347px;">Back</button></a>
 <?php
if (isset($_POST['donadone'])) {
    $app_id=$_POST['appointment_id'];
    $ea = $_POST['ea'];
$user_email=$row['user_email'];
$mname=$_SESSION['username'];

    $done = mysqli_query($conn,"INSERT INTO testlabbill (appointment_id,pname,user_email,age,gender,contactno,aadharno,address,booking_date,hname,tmode,doc_name,total,mname) VALUES ('$app_id','$pname','$user_email','$age','$gender','$contactno','$aadharno','$address','$booking_date','$hname','$tmode','$doc_name','$ea','$mname');");
    if ($done){
        echo "<script>alert('Bill Generated Successfully'); document.location = 'viewtest.php' </script>";
    }

}



?>                                   
        </div>
      </div>

                       
                    </div>
                  </div>
</div>
</div>
              </div>

      
          

</body>
</html>
<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}


.autocomplete-items {
  position: relative;

  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  width: 300px;
    left: 255px;
  
}

#myTestautocomplete-list{
     position: relative;

  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/    
  width: 300px;
    left: 255px;
    top: -123px;
}
.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>
<script type="text/javascript">
  function submit_form(){
        var form = document.getElementById("my_form");
        form.submit();
        alert("hi");
    }
</script>

<script type="text/javascript" src="js/jquery.js"></script>
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
        <script src="pt/assets/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap-clockpicker.js"></script>
<script>