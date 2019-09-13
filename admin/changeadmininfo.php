<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

//if(isset($_POST['modify'])){
//   $data = array('discount','prerequisite');
//$i=0;
//
//    $offerid = $_POST['modify'];
//    $sql = "SELECT * FROM admin WHERE username = '$username'";
//     $result = mysqli_query($conn, $sql);
//     $row = mysqli_fetch_assoc($result);
//    echo "<form action='modifyadmins.php' method='post'>";
//    echo "<label>Offerid</label><input type='text' name='offerid' value='$offerid' readonly><br>";
//      foreach($row as $item){
//        if($item != $offerid ){
//        echo "<label>".$data[$i]."</label><input type='text' name='$data[$i]' placeholder='$item'><br>";
//     ++$i;
//      }
//          
//    }
//    echo "<button name='update'>Update</button>";
//    //echo "<button name='delete' type='Delete'>Delete</button>";
//    echo "</form>";
//}

if(isset($_POST['delete'])){
    $sql = "SELECT COUNT(*) as count FROM admin";
        $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
    $count = $row['count'];
    if($count > 1){
       $username = $_POST['delete'];
       $sql = "DELETE FROM admin WHERE username = '$username'";
       mysqli_query($conn, $sql);
    }
   
    
    header("Location: admin.php");
}
  


 else if(isset($_POST['insertsubmit'])){
   
   
   $username = $_POST['username'];
     $password = $_POST['password'];
     
   $sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')"; 
   mysqli_query($conn, $sql);
   
        
     
 }
   
 
?>