<?php
include_once('db_connection.php');

if(isset($_POST['submit'])){
  $hname=$himage='';
  $hname=$_POST['hname'];
  $himage=$_FILES['himage']['name'];

$insert = mysqli_query($conn, "INSERT INTO himages(hname,himage) VALUES('$hname','$himage')");
  }          
?>
<!DOCTYPE html>
<html>
<body>

<form method="post" enctype="multipart/form-data">
  Select image to upload:
  <input type="file" name="himage" >
  <input type="text" name="hname">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
