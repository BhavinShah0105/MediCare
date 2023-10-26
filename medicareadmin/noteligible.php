<?php
include_once('db_connection.php');
$id = $_POST['id'];
$email = $_POST['email'];
$delete = mysqli_query($conn,"DELETE FROM plasma WHERE id=$id");

if ($delete) {
    mail($email, 'Hello Sir/Maam ,','Your application for plasma donation is rejected. ','From: medicare825@gmail.com');
    echo "<script>alert('Application For Plasma Rejected Successfully');
    document.location = 'plasma.php';
    </script>";

}
else{
	echo "<script>alert('Something Went Wrong');
    document.location = 'plasma.php';
    </script>";
}
?>
