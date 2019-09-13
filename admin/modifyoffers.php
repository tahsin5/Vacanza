<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

if(isset($_POST['update'])){

 $offerid = $_POST['offerid'];
 $data = array('discount','prerequisite');
 
    
 foreach($data as $item){
    if(!empty($_POST[$item])){
        $sql = "UPDATE offer set $item = '$_POST[$item]' WHERE offerid =  '$offerid'";
        mysqli_query($conn, $sql);
     }
  }
    
}

echo "<a href='admin.php'>Back To Admin Page</a>";

?>