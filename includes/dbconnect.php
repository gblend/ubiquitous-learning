<?php

$dbServername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName ="id4637976_ulearningsystem";

$conn = mysqli_connect($dbServername,$dbUsername,$dbPassword,$dbName);
if(!$conn){
    echo "connection unsuccessful";
} else {
//   echo "connected to database";
}

?>