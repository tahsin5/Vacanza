
<?php

session_start();
include '../db_connection.php';
include '../create_database.php';


$username = $_POST['username'];   /*get password & username*/
$password = $_POST['password']; 

//$sql = "SELECT * FROM admin WHERE username= '$username' AND pass='$password'";
//$result = mysqli_query($conn, $sql);
//
//             //check if mail and pass matches
//if ($row = mysqli_fetch_assoc($result)) {  
//    
//  $_SESSION['username'] = $row['username'];  //start session
//
//  header("Location: admin.php");
//    exit();
//}

if($username == 'admin' && $password == 'vacanza'){
    header("Location: admin.php");
}


?>



 