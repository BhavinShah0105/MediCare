<?php
include_once('db_connection.php');

$id = $_POST['id'];


$delete = mysqli_query($conn,"DELETE FROM doctors WHERE id=$id");
echo "<script>alert('Doctor Deleted Successfully');
document.location = 'adoc_info.php';
</script>";



?>
