<?php
$myCountryErr=$myCountry=$morning=$afternoon=$night="";
include_once('db_connection.php');
$appointment_id = $_POST['appointment_id'];
$sql = "SELECT * FROM confirmapp where appointment_id = '$appointment_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
  $user_email=$row['user_email'];
  $doc_name=$row['doc_name'];
  $doctor_id=$row['doctor_id'];
  $pname=$row['pname'];
  $tmode=$row['tmode'];
  $age=$row['age'];
  $gender=$row['gender'];
  $contactno=$row['contactno'];
  $aadharno=$row['aadharno'];
  $booking_date=$row['booking_date'];
  $address=$row['address'];
  $hname=$row['hname'];
  }
} else {
  echo "Mail ID is not available";
}
?>
<?php
$pname=ucfirst($pname);
?>
<?php
if(isset($_POST['submit'])){

                        if (empty($_POST["myCountry"])) {  
                         $myCountryErr = "Enter Medicine Name";
                        } else {  
                        $myCountry = input_data($_POST["myCountry"]); 
                        }
                             
$appointment_id=$_POST['appointment_id'];
$morning=$_POST['morning'];
$afternoon=$_POST['afternoon'];
$night=$_POST['night'];

if(empty($myCountryErr)){
$insert = "INSERT INTO prescription (appointment_id,m_name,morning,afternoon,night) VALUES ('$appointment_id','$myCountry','$morning','$afternoon','$night')";
$result = mysqli_query($conn, $insert);
} else{
  echo"<script>alert('Something Went Wrong!!');</script>";
  }
}
?>
<?php
$testnameErr=$testname="";
if(isset($_POST['submit1'])){

                        if (empty($_POST["testname"])) {  
                         $testnameErr = "Enter Testname Name";
                        } else {  
                        $testname = input_data($_POST["testname"]); 
                        }
                             
$testname=$_POST['testname'];

if(empty($testnameErr)){
$insert1 = "INSERT INTO prescriptiont (appointment_id,testname) VALUES ('$appointment_id','$testname')";
$result = mysqli_query($conn, $insert1);
} else{
  echo"<script>alert('Something Went Wrong!!');</script>";
  }
}
?>
<?php  
 function input_data($data) {  
          $data = trim($data);  
          $data = stripslashes($data);  
          $data = htmlspecialchars($data);  
          return $data;  
        }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>Prescription</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <link href="test.css" rel="stylesheet">
     <link href="aassets/css/style.css" rel="stylesheet">
</head>
<body>
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container bootstrap snippets bootdey">
<div class="row">
  
  <div class="profile-info col-md-9" style="position: relative;left: 171px;">
        <div class="panel">
                         <div class="bio-graph-heading">
                            Prescription
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
              </div>
          </div>
        </div>
     
      <div class="panel">
          
        <div class="panel-body bio-graph-info">
                    <form id="search-form" method="post">

                      <input type="hidden" name="appointment_id" value="<?php echo $appointment_id; ?>">
     
                          <div id="autocomplete <?php echo (!empty($myCountryErr)) ? 'has-error' : ''; ?>">
                            <label style="position: relative;left: 302px;color: black" >
                                Enter Medicine Name Here :-
                            </label>
                            <input type="text" id="myInput" name="myCountry" class="form-control" placeholder="Enter Medicine" autocomplete="off" style="position: relative; width: 300px;left: 255px;" >
                            <span class="help-block" style="color:red;position: relative;left: 327px;">
                              <?php echo $myCountryErr; ?>
                              
                            </span>
                            <div id="cityList"></div>
                          </div>

                        <div class="form-group mb">
                        <label for="select" style="display: inline-block;font-size: 14px;color: black;position: relative;left: 40px;top: 22px;">
                            Morning
                        </label>
                        <input type="hidden" id="appointment_id" name="appointment_id" value="<?php echo $_POST['appointment_id']? $_POST['appointment_id']:''; ?>">
                         <select class="form-control" name="morning" id="morning" style="position: relative; left: 104px; top: -9px; width: 167px;">
                              <option></option>
                              <option value="None">None</option>
                              <option value="Before Breakfast">Before Breakfast</option>
                              <option value="After Breakfast">After Breakfast</option>
                        </select>
                    </div>

                        <div class="form-group mb">
                        <label for="select" style="display: inline-block;font-size: 14px;color: black;position: relative;left: 298px;top: -49px;">
                            Afternoon
                        </label>
                         <select class="form-control" name="afternoon" id="afternoon" style="position: relative; left: 374px;top: -82px; width: 167px;">
                              <option></option>
                              <option value="None">None</option>
                              <option value="Before Lunch">Before Lunch</option>
                              <option value="After Lunch">After Lunch</option>
                        </select>
                    </div>

                    <div class="form-group mb" style="">
                        <label for="select" style="display: inline-block;width: 212px;margin-bottom: 5px; font-size: 14px; position: relative;left: 571px;top: -121px;color: black;">
                            Night
                        </label>
                         <select class="form-control" name="night" id="night" style="position: relative;left: 621px;top: -154px;width: 167px;">
                              <option></option>
                              <option value="None">None</option>
                              <option value="Before Dinner">Before Dinner</option>
                              <option value="After Dinner">After Dinner</option>
                        </select>

                      
                        <input type="submit" name="submit" value="Add" style="background-color: DodgerBlue;color: #fff;cursor: pointer;position: relative;top: -130px;left: 372px;" >
                    </div>
                    
                        <div id="autocomplete">
                            <label style="position: relative; top:-127px;left: 316px;color: black" >
                                Enter Test Name Here :-
                            </label>
                            <input type="text" id="myTest" name="testname" class="form-control" placeholder="Enter Test Name" autocomplete="off" style="position: relative; top:-130px;width: 300px;left: 255px;">
                            <span class="help-block" style="color:red;position: relative;top:-120px;left: 327px;"><?php echo $testnameErr; ?></span>
                            <div id="myList"></div>
                        </div>
    
                          <input type="submit" name="submit1" value="Add" style="background-color: DodgerBlue;color: #fff;cursor: pointer;position: relative;top: -119px;left: 372px;" >

                    </form>                     
                
<div class="panel panel-primary filterable" style="position: relative;bottom: 98px;">
  <div class="panel-heading">
                            <h3 class="panel-title">List of Medicines </h3>
                            
                        </div>
            <div class="panel-body" style="position: relative; width: auto; overflow: auto;">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    <th><input type="text" class="form-control" placeholder="Medicine Name" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="In Morning" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="In Afternoon" disabled></th>
                                    <th><input type="text" class="form-control" placeholder="In Night" disabled></th>  
                                    <th><input type="text" class="form-control" placeholder="Remove" disabled></th>                                      
                                </tr>
                            </thead>
                            
                            <?php 
                            $results=mysqli_query($conn,"SELECT * FROM prescription WHERE appointment_id='$appointment_id' ");
                            

                                  
                            while ($docRow=mysqli_fetch_array($results)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr>";
                                    echo "<td>" . $docRow['m_name'] . "</td>";
                                    echo "<td>" . $docRow['morning'] . "</td>";
                                    echo "<td>" . $docRow['afternoon'] . "</td>";
                                    echo "<td>" . $docRow['night'] . "</td>";
                                   
                                    
                                    
                                    echo "<form method='POST'>";
                                    echo "<td class='text-center'><input type='hidden' value='".$docRow['prescription_id']."' name='prescription_id'>
                                    <input type='hidden' value='".$docRow['appointment_id']."' name='appointment_id'>
                                    <button type='submit' class='btn btn-danger' name='remove1' >Remove</button></a>
                                            </td>";
                                    echo"</form>";
                               
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
<div class="panel panel-primary filterable" style="position: relative;
    bottom: 77px;">
  <div class="panel-heading">
                            <h3 class="panel-title">List of Tests</h3>
                            
                        </div>
            <div class="panel-body" style="position: relative; width: auto; overflow: auto;">
                        <!-- panel content start -->
                           <!-- Table -->
                        <table class="table table-hover table-bordered">
                            <thead>
                                <tr class="filters">
                                    
                                    <th><input type="text" class="form-control" placeholder="Test Name" disabled></th>  
                                    <th><input type="text" class="form-control" placeholder="Remove" disabled></th>                                      
                                </tr>
                            </thead>
                            
                            <?php 
                            $results=mysqli_query($conn,"SELECT * FROM prescriptiont WHERE appointment_id='$appointment_id' ");
                            

                                  
                            while ($docRow=mysqli_fetch_array($results)) {
                                
                              
                                echo "<tbody>";
                                echo "<tr>";
                                   
                                    echo "<td>" . $docRow['testname'] . "</td>";                                    
                                    
                                   echo "<form method='POST'>";
                                    echo "<td class='text-center'><input type='hidden' value='".$docRow['prescription_id']."' name='prescription_id'>
                                    <input type='hidden' value='".$docRow['appointment_id']."' name='appointment_id'>
                                    <button  type='submit' class='btn btn-danger' name='remove2' >Remove</button></a>
                                            </td>";
                                    echo"</form>";
                               
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
                        <form method="post">

                            <div class="form-group form-group-lg" >
                                  <label class="control-label col-sm-2 requiredField" for="description" style="color:black; position: relative; top: -64px;">
                                   Description
                                    </label>
                                   <div class="col-sm-10">
                                    <textarea for="description" rows="5" cols="70" style="border: solid #337Ab7 1px;position: relative;top: -62px;left: -23px; "></textarea>
                                    <input type="hidden" id="appointment_id" name="appointment_id" value="<?php echo $_POST['appointment_id']? $_POST['appointment_id']:''; ?>">
                                    
                            </div>
                                <input type="submit" name="done" value="Done" style="background-color: #4caf50;color: #fff;cursor: pointer;position: relative;top: -47px;left: 372px;" >
                       </form>
                       <?php
                       if(isset($_POST['done'])){
                        $description=$_POST['description'];
                        $appointment_id=$_POST['appointment_id'];
                        $prescription_id=$_POST['prescription_id'];
                        $query="INSERT INTO description (prescription_id,appointment_id,description) VALUES ('$prescription_id','$appointment_id','$description')";
                        $result = mysqli_query($conn, $query);
                        $sql = "SELECT * FROM confirmapp where appointment_id = '$appointment_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

  $doctor_id=$row['doctor_id'];
  $doc_name=$row['doc_name'];
  $pname=$row['pname'];
  $user_email=$row['user_email'];
  $tmode=$row['tmode'];
  $age=$row['age'];
  $gender=$row['gender'];
  $contactno=$row['contactno'];
  $booking_date=$row['booking_date'];
  $address=$row['address'];
  $hname=$row['hname'];
  $booking_time=$row['booking_time'];
  }
} else {
  echo "0 results";
}


$query = "SELECT * FROM doctors where id = '$doctor_id'";
$result = mysqli_query($conn, $query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    $wcharges=$row['wcharges'];
    $ocharges=$row['ocharges'];
    $hcharges=$row['hcharges'];
  }
} else {
  echo "0 results";
}

if($tmode=="Walkin"){
    $charges=$wcharges;
}elseif($tmode=="Home Visit"){
    $charges=$hcharges;
}elseif($tmode=="Online"){
    $charges=$ocharges;
}


 $bill="INSERT into bill(appointment_id,doc_name,pname,p_email,tmode,charges,age,gender,contactno,booking_date,address,booking_time,hname)values('$appointment_id','$doc_name','$pname','$user_email','$tmode','$charges','$age','$gender','$contactno','$booking_date','$address','$booking_time','$hname')";
 $result=mysqli_query($conn,$bill);
$insert = mysqli_query($conn,"INSERT into completeapp (appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time) 
SELECT appointment_id,doctor_id,doc_name,user_email,pname,tmode,age,gender,contactno,aadharno,booking_date,booking_day,address,hname,description,booking_time FROM confirmapp WHERE appointment_id=$appointment_id");
$delete = mysqli_query($conn,"DELETE FROM confirmapp WHERE appointment_id=$appointment_id");

if ($insert) {
    echo "<script>alert('Appointment Completed Successfully');
    document.location = 'today.php';
    </script>";
}
else{
     echo "<script>alert('Something Went Wrong');
    document.location = 'today.php';
    </script>";
}
}

?>

</div>
</div>
</div>
</div>

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

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Acetaminophen","Adderall","Amitriptyline","Amlodipine","Amoxicillin","Ativan","Atorvastatin","Azithromycin","Benzonatate","Brilinta","Bunavail","Buprenorphine","Cephalexin","Ciprofloxacin","Citalopram","Clindamycin","Clonazepam","Cyclobenzaprine",
"Cymbalta",
"Doxycycline",
"Dupixent",
"Entresto",
"Entyvio",
"Farxiga",
"Fentanyl",
"Fentanyl Patch",
"Gabapentin",
"Gilenya",
"Humira",
"Hydrochlorothiazide",
"Hydroxychloroquine",
"Ibuprofen",
"Imbruvica",
"Invokana",
"Januvia",
"Jardiance",
"Kevzara",
"Lisinopril",
"Lofexidine",
"Loratadine",
"Lyrica",
"Melatonin",
"Meloxicam",
"Metformin",
"Methadone",
"Methotrexate",
"Metoprolol",
"Naloxone",
"Naltrexone",
"Naproxen",
"Omeprazole",
"Onpattro",
"Otezla",
"Ozempic",
"Pantoprazole",
"Prednisone",
"Probuphin",
"Rybelsus",
"Sublocade",
"Tramadol",
"Trazodone",
"Wellbutrin",
"Xanax",
"Zubsolv"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

<script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var countries = ["Hb or Hbg (hemoglobin)","White blood cells (WBCs) ","RBC (red blood cells)","Hct (hematocrit)","MCV (mean corpuscular volume)","ESR (Westegren) 1hr","Globulin","Bilirubin Total","SGPT (ALT)","SGOT (AST)","Total Protein","HDLCholesterol","LDLCholesterol","Fasting","TRIIODOTHYRONINE(T3)","TRIIODOTHYRONINE(T4)","Prolactin","Vitamin B12","Vitamin D3","Serum Calcium ","Bone density test","RT-PCR ","NS1","Hepatitis A","Hepatitis C","Hepatitis B","CD4 T-cell count"];

/*initiate the autocomplete function on the "myTest" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myTest"), countries);

</script>
<script src="pt/assets/js/bootstrap.min.js"></script>
<script src="asset/js/bootstrap-clockpicker.js"></script>
</body>
</html>
<?php
if (isset($_POST['remove1'])) {
  
$prescription_id = $_POST['prescription_id'];

$delete = mysqli_query($conn,"DELETE FROM prescription WHERE prescription_id=$prescription_id");
if($delete){
    
}


}

?>
<?php
if (isset($_POST['remove2'])) {
  
$prescription_id = $_POST['prescription_id'];

$delete = mysqli_query($conn,"DELETE FROM prescriptiont WHERE prescription_id=$prescription_id");
if($delete){
    
}


}

?>