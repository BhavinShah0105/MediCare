<?php
include_once('db_connection.php');

$doc_id = $_POST['doc_id'];
$delete = mysqli_query($conn,"DELETE FROM blog WHERE doc_id=$doc_id");

echo "<script>alert('Blog Rejected Successfully');
    document.location = 'blogs.php';
    </script>";
?>