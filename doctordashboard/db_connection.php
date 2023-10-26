<?php
session_start();
session_regenerate_id(true);

$conn = mysqli_connect("localhost","root","","medicare");

if(mysqli_connect_errno()){
    echo "Connection Failed".mysqli_connect_error();
    exit;
}
