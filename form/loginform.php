<?php

session_start();
include 'db_connection.php';
include 'create_database.php';


$email = $_POST['email'];   /*get password & username*/
$pass = $_POST['pass']; 

$email = mysqli_real_escape_string($conn, $email);  //to prevent sql injection
$pass = mysqli_real_escape_string($conn, $pass);


$sql = "SELECT * FROM users WHERE email= '$email' AND pass='$pass'";
$result = mysqli_query($conn, $sql);

             //check if mail and pass matches
if ($row = mysqli_fetch_assoc($result)) {  
    
  $_SESSION['userid'] = $row['userid'];  //start session
  $sql = "SELECT type FROM users WHERE email='$email'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
    
    if($row['type'] == 'user'){
      header("Location: logout.php");
    }
    else{
      header("Location: logout.php");
    }
} 
    //check if  input fields are empty
else if(empty($email) || empty($pass)){  
    header("Location: login.php?error=empty");  
    exit();
} 
else{   
    header("Location: login.php?error=incorrect");    //incorrect info
    
}

?>



 