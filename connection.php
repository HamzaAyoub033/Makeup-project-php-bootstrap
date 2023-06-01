<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oms";
//create connection 
try {
    $con = mysqli_connect($servername, $username, $password, $dbname);
    //check connection
    if (!$con) {
        throw new Exception("Connection failed:" . mysqli_connect_error());
    } else {
        //echo "Connected successfully";
    }
} catch (Exception $e) {
    echo $e->getMessage();
}