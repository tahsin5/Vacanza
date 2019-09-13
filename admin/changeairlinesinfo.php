<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}

if(isset($_POST['modify'])){
   $data = array('airlinesname', 'ticketclass','fare');
$i=0;

    $airlinesname = $_POST['modify'];
    $sql = "SELECT * FROM ticket_flight WHERE airlinesname = '$airlinesname'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    echo "<form action='modifyairlines.php' method='post'>";
    echo "<input type= 'text' name='airlinesname' value='$airlinesname' readonly><br>";
      foreach($row as $item){
        if($item != $airlinesname){
        echo "<input type='text' name='$data[$i]' placeholder='$item'><br>";
     ++$i;
      }
          
    }
    echo "<button name='update'>Update</button>";
    //echo "<button name='delete' type='Delete'>Delete</button>";
    echo "</form>";
}

else if(isset($_POST['delete'])){
    
    $airlinesname = $_POST['delete'];
    $sql = "DELETE FROM ticket_flight WHERE airlinesname = '$airlinesname'";//cascade or not?
    mysqli_query($conn, $sql);
    
    
    //header("Location: admin.php");
}
else if(isset($_POST['searchsubmit'])){
    $data = array('Airlines' ,'Ticket class','Fare($)');
    $airlinesname = $_POST['airlines'];
    $sql = "SELECT * FROM ticket_flight WHERE airlinesname  ='$airlinesname'";
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
    }
    echo"</table>";
}

 else if(isset($_POST['insertsubmit'])){
   
   
   $airlinesname = $_POST['airlinesname'];
   $ticketclass = $_POST['ticketclass'];
   $fare = $_POST['fare'];
     
    if(empty($airlinesname) || empty($ticketclass) || empty($fare)){   
        header("Location: admin.php"); 
    exit();       
}  
     
   $sql = "INSERT INTO ticket_flight (airlinesname, ticketclass, fare) VALUES ('$airlinesname ', '$ticketclass', '$fare')"; 
   mysqli_query($conn, $sql);
   
        
     
 }
   
 
?>