<?php

$dbServername = "localhost";
$dbUserName = "root";
$dbPassword = "";


$conn = new mysqli($dbServername, $dbUserName, $dbPassword, $dbName);

if($conn->connect_error){
    die("Connection failed:" . $conn->$connect_error);
}

$sql = "CREATE DATABASE myDB";
if($conn->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database:" . $conn->error;
}

$conn->close();