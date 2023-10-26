<?php
include_once('db_connection.php');

$doc_id = $_POST['doc_id'];
$insert = mysqli_query($conn,"INSERT into confirmblog(doc_id,doc_name,title,para1,para2,para3,image,btime)
SELECT doc_id,doc_name,title,para1,para2,para3,image,btime FROM blog WHERE doc_id=$doc_id");
$delete = mysqli_query($conn,"DELETE FROM blog WHERE doc_id=$doc_id");
echo "<script>alert('Blog Accepted Successfully');
    document.location = 'blogs.php';
    </script>";
?>