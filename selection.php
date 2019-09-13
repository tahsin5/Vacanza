<?php

session_start();
include 'db_connection.php';
include 'create_database.php';

$from = $_POST['from'];
$to = $_POST['to'];
$departdate = $_POST['departdate'];
$returndate = $_POST['returndate'];

if(empty($from) || empty($to) || empty($departdate)){
    header("Location: frontpage.php?error=empty");    
    exit(); 
}
else{
    
}




?>