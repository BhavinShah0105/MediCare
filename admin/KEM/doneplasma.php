<?php
include_once('db_connection.php');
$id = $_POST['id'];
$insert = mysqli_query($conn,"INSERT into completeplasma(id,dname,blood,age,gender,weight,recovered,contactno,address,ptime) 
SELECT id,dname,blood,age,gender,weight,recovered,contactno,address,ptime FROM confirmplasma WHERE id=$id");
$delete = mysqli_query($conn,"DELETE FROM confirmplasma WHERE id=$id");

if ($insert) {
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