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
    <link rel="stylesheet" type="text/css" href="changeuserinfo.css">
</head>

<body>

    <?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

if(isset($_POST['modify'])){
   $data = array('firstname', 'middlename','surname','email','pass','gender','dob','address','contact','alert','type');
$i=0;
// foreach($data as $item){
//    if(!empty($_POST[$item])){
//        $sql = "UPDATE users set $item = '$_POST[$item]' WHERE userid=    '$userid' ";
//        mysqli_query($conn, $sql);
//     }
//  }
//    
    $userid = $_POST['modify'];
    $sql = "SELECT * FROM users WHERE userid = '$userid'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    echo "<form action='modifyuser.php' method='post'>";
    echo "<input type= 'text' name='userid' value='$userid' readonly><br>";
      foreach($row as $item){
        if($item != $userid){
        echo "<label>".$data[$i]."</label><input type='text' name='$data[$i]' placeholder='$item'><br>";
     ++$i;
      }
          
    }
    echo "<button name='update' type='update'>Update</button>";
    //echo "<button name='delete' type='Delete'>Delete</button>";
    echo "</form>";
}

else if(isset($_POST['delete'])){
    
    $userid = $_POST['delete'];
    $sql = "DELETE FROM users WHERE userid = '$userid'";
    mysqli_query($conn, $sql);
    header("Location: admin.php");
}
else if(isset($_POST['search'])){
    $email = $_POST['email'];
    $data = array('Userid','Firstname', 'Middlename','Surname','Email','Pass', 'Gender', 'Date of Birth','Address','Contact','Alert');
    $sql = "SELECT * FROM users WHERE email ='$email'";
    $result = mysqli_query($conn,$sql);
    echo "<table>";
    echo "<tr>";
    foreach($data as $item){
        echo "<th>$item</th>";
    }
    echo "</tr>";
    
    
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
        echo "</tr>";
    }
    echo"</table>";
}

 else if(isset($_POST['addsubmit'])){
   
   $firstname = $_POST['firstname'];
   $middlename = $_POST['middlename'];
   $surname = $_POST['surname'];
   $email = $_POST['email'];
   $pass = $_POST['pass']; 
   $gender = $_POST['gender'];
   $dob = $_POST['dob'];
   $address = $_POST['address'];
   $contact = $_POST['contact'];
   $alert = $_POST['alert'];
     
   if(empty($firstname) || empty($surname) || empty($pass) || empty($gender) || empty($dob) || empty($contact)){     
        header("Location: admin.php"); 
    exit();       
}     
     
     $sql = "INSERT INTO users (firstname, middlename, surname, email, pass, gender, dob, address, contact, alert) VALUES ('$firstname', '$middlename', '$surname', '$email', '$pass', '$gender', '$dob', '$address', '$contact', '$alert')"; 
     $result = mysqli_query($conn, $sql);
     
 }
 else if(isset($_POST['flightinfo'])){
     $data = array('Userid','Flightno','D_Date','Airlines', 'D_Time', 'A_Time', 'Duration');
     $userid = $_POST['flightinfo'];
     $sql = "SELECT * FROM flies, flight WHERE flight.flightno = flies.flightno AND flies.userid = '$userid'";
     $result = mysqli_query($conn, $sql);
     
     if(mysqli_num_rows($result) == 0){
                echo "<span class='errormessage'>The user is not flying anytime soon.</span>";
                exit();
            }
     
     echo "<table>";
     
     echo "<tr>";
    foreach($data as $item){
        echo "<th>$item</th>";
    }
    echo "</tr>";
     
     while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
         echo "</tr>";
     }
     echo "</table>";
 }
    
    echo "<a href='admin.php'>Back To Admin Page</a>";
?>
    </body>
</html>