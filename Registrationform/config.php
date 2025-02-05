<?php
$servername ="localhost";
$username="root";
$password ="";
$dbname ="registerform";


$conn = new mysqli ($servername,$username,$password,$dbname);

if($conn->connect_error){
    die("connection is failded :". $conn->connect_error); 
}else{
    // echo "connection is  succesffully";
}