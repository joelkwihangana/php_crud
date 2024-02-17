<?php

//Mysqli Database connection parameters

$serverName="localhost";
$userName="root";
$pwd="";
$database="students";

//create a connection object
$conn = new mysqli($serverName,$userName,$pwd,$database);

// check the connection

if($conn->connect_error){
    die("Connection error: $conn->connect_error");
}
// echo "Connection established Successfully!";



?>