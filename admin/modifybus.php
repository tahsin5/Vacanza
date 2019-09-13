<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

if(isset($_POST['update'])){

 $busid = $_POST['busid'];
 $data = array('busname', 'from_city','to_city','d_time','fare','address');
 foreach($data as $item){
    if(!empty($_POST[$item])){
        $sql = "UPDATE bus set $item = '$_POST[$item]' WHERE busid =  '$busid'";
        mysqli_query($conn, $sql);
     }
  }
    
 
}

echo "<a href='admin.php'>Back To Admin Page</a>";

?>