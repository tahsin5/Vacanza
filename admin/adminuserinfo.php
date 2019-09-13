<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>VacanzaPayment</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="adminbusinfo1.css">
</head>

<body>





<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

if(isset($_POST['add'])){
    echo "<form action='changeuserinfo.php' method='post' class='insert'>";
    echo "Name<input type='text' name='firstname' placeholder='Firstname'> 
    <input type='text' name='middlename' placeholder='Middlename'>
    <input type='text' name='surname' placeholder='surname'><br>
    Email
    <input type='email' name='email' placeholder='Email'><br>
    Password
    <input type='password' name='pass' placeholder='Password'><br>
    Date of Birth
     <input type='date' name='dob' placeholder='Date'><br>
     Gender
    <input type='radio' name='gender' value='Male'>Male<input type='radio' name='gender' value='Female'>Female<br>
    Address
    <input type='text' name='address' placeholder='Address'><br>
    Alert
    <input type='checkbox' name='alert' value='alert'><br>
    Contact
    <input type='text' name='contact' placeholder='Contact'><br>
    <button name='addsubmit'>Submit</button>";
    echo "</form>";
    
    
}
else if(isset($_POST['search'])){
    echo "<form action='changeuserinfo.php' method='post' class='search'>";
    echo "<input type='email' name='email' placeholder='Email'>

    <button name='search'>Search</button>";
    echo "</form>";
    
}
else if(isset($_POST['showall'])){
   $data = array('Userid','Firstname', 'Middlename','Surname','Email','Pass', 'Gender', 'Date of Birth','Address','Contact','Alert');    
    
 echo "<table class='showall'>";
    echo "<tr>";
    foreach($data as $item){
        echo "<th>$item</th>";
    }
    echo "</tr>";
    
    
    $sql = "SELECT * FROM users";
     $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
        $userid = $row['userid'];
        echo "<td><form action='changeuserinfo.php' method='post'><button type='submit' name='modify' value='$userid'>Modify</button>
<button type='submit' name='delete' value='$userid'>Delete</button>
<button type='submit' name='flightinfo' value='$userid'>Flight Info</button>
        </form></td>";
        echo "</tr>";
       }
    }
    
    echo "</table>";
}

echo "<a href='admin.php'>Back To Admin Page</a>";
 
?>
    
    </body>
</html>