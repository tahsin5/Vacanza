<?php 

$host = "localhost";
$user = "root";
$password = "";

// Create connection
$conn = mysqli_connect($host, $user, $password);

//// Check connection
//if ($conn) {
//    echo "Connected";
//}

$sql = "CREATE DATABASE IF NOT EXISTS vacanzaDB";  //create variable 
mysqli_query($conn, $sql); 

 mysqli_select_db($conn, "vacanza");
//mysqli_close($conn);

?>