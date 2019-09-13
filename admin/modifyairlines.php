<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

if(isset($_POST['update'])){

 $airlinesname = $_POST['airlinesname'];
 $data = array('ticketclass','fare');
 
    
 foreach($data as $item){
    if(!empty($_POST[$item])){
        $sql = "UPDATE ticket_flight set $item = '$_POST[$item]' WHERE airlinesname =  '$airlinesname' AND ticketclass = '$ticketclass'";
        mysqli_query($conn, $sql);
     }
  }
    
}
echo "<a href='admin.php'>Back To Admin Page</a>";
//header("Location: admin.php");

?>