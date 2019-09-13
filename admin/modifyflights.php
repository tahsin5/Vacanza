<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

if(isset($_POST['add'])){
    $flightno = $_POST['add'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $sql = "SELECT userid FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    $row =mysqli_fetch_assoc($result);
    $userid = $row['userid'];
    
    $sql = "INSERT INTO flies(userid, flightno,date) VALUES('$userid', '$flightno', '$date')";
    $result = mysqli_query($conn, $sql);   
}
else if(isset($_POST['update'])){

 $flightno = $_POST['flightno'];
 $data = array('airlines','d_time','a_time','duration');

 foreach($data as $item){
    if(!empty($_POST[$item])){
        $sql = "UPDATE flight set $item = '$_POST[$item]' WHERE flightno =  '$flightno'";
        mysqli_query($conn, $sql);
     }
  }
    
 $data = array('d_airportcode', 'a_airportcode');
 foreach($data as $item){
    if(!empty($_POST[$item])){
        $sql = "UPDATE schedule set $item = '$_POST[$item]' WHERE flightno =  '$flightno'";
        mysqli_query($conn, $sql);
     }
  }
    header("Location: admin.php");
}

echo "<a href='admin.php'>Back To Admin Page</a>";

?>