<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

 $userid = $_POST['userid'];
 

    $data = array('firstname', 'middlename','surname','email','pass', 'gender', 'dob','address','contact');

 foreach($data as $item){
    if(!empty($_POST[$item])){
        $sql = "UPDATE users set $item = '$_POST[$item]' WHERE userid=    '$userid' ";
        mysqli_query($conn, $sql);
     }
  }
    
header("Location: admin.php"); 


?>