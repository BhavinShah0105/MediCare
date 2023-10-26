<?php
include_once('db_connection.php');
$id = $_POST['id'];
$email = $_POST['email'];
$insert = mysqli_query($conn,"INSERT into confirmplasma (id,username,email,dname,blood,age,gender,weight,recovered,contactno,address,ptime) 
SELECT id,username,email,dname,blood,age,gender,weight,recovered,contactno,address,ptime FROM plasma WHERE id=$id");
$delete = mysqli_query($conn,"DELETE FROM plasma WHERE id=$id");

if ($insert) {
     mail($email, 'Hello Sir/Maam ,','Your application for plasma donation is accpeted. ','From: medicare825@gmail.com');
    echo "<script>alert('Application For Plasma Accepted Successfully');
    document.location = 'plasma.php';
    </script>";

}
else{
	echo "<script>alert('Something Went Wrong');
    document.location = 'plasma.php';
    </script>";
}
?>