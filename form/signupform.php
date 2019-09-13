<?php

session_start();
include 'db_connection.php';
include 'create_database.php';

//get data from form and insert into variable

$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$pass = $_POST['password']; 
$passcon = $_POST['passcon'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$address = $_POST['address'];
$contact = $_POST['contact'];
$alert = $_POST['alert'];

//$type = "user";
$sql = "SELECT * FROM users WHERE email= '$email'";
$result = mysqli_query($conn, $sql);

//check if any field is empty

if(empty($firstname) || empty($surname) || empty($pass) || empty($gender) || empty($dob) || empty($contact)){     
    header("Location: signup.php?error=empty");    
    exit();       
}

else if($row = mysqli_fetch_assoc($result)){
    header("Location: signup.php?error=usedemail");
}
 
//confirm password
else if($pass !== $passcon){
     header("Location: signup.php?error=passwordonotmatch");  
    exit();
}

// insert into database
else{
         $sql = "INSERT INTO users (firstname, middlename, surname, email, pass, gender, dob, address, contact, alert) VALUES ('$firstname', '$middlename', '$surname', '$email', '$pass', '$gender', '$dob', '$address', '$contact', '$alert')"; 
        if (mysqli_query($conn, $sql)) {
            $_SESSION['userid'] = $row['userid']; 
            header("Location: logout.php");  
        } 
        else{
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        } 
    }


?>