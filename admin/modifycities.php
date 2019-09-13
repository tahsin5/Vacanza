<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

if(isset($_POST['update'])){

 $airportcode = $_POST['airportcode'];
 $data = array('city', 'country','airportname','airportcode');
 
    
 foreach($data as $item){
    if(!empty($_POST[$item])){
        $sql = "UPDATE city set $item = '$_POST[$item]' WHERE airportcode =  '$airportcode'";
        mysqli_query($conn, $sql);
     }
  }
    
}

header("Location: admin.php");

?>