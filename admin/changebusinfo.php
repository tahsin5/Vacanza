<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Vacanza </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
<!--
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css"/>
<link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css"/>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>

<script src="../bootstrap/js/bootstrap.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../bootstrap/js/npm.js"></script>
-->
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
        

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>


 
 <link rel="stylesheet" href= "changebusinfo.css" >
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
   $data = array('busname', 'from_city','to_city','d_time','fare','address');
$i=0;

    $busid = $_POST['modify'];
    $sql = "SELECT * FROM bus  WHERE busid = '$busid'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    echo "<form action='modifybus.php' method='post'>";
    echo "<input type= 'text' name='busid' value='$busid' readonly><br>";
      foreach($row as $item){
        if($item != $busid){
        echo "<input type='text' name='$data[$i]' placeholder='$item'><br>";
     ++$i;
      }
          
    }
    echo "<button name='update'>Update</button>";
    //echo "<button name='delete' type='Delete'>Delete</button>";
    echo "</form>";
}

else if(isset($_POST['delete'])){
    
    $busid  = $_POST['delete'];
    $sql = "DELETE FROM bus WHERE busid = '$busid '";//cascade or not?
    mysqli_query($conn, $sql);
    
    
    //header("Location: admin.php");
}
else if(isset($_POST['searchsubmit'])){
    $busid  = $_POST['busid'];
    $sql = "SELECT * FROM bus WHERE busid = '$busid'";
    $result = mysqli_query($conn,$sql);
    echo "<table>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
    }
    echo"</table>";
}

 else if(isset($_POST['insertsubmit'])){
   
    
   $busname= $_POST['busname'];
   $from_city = $_POST['from'];
   $to_city = $_POST['to'];
   $d_time = $_POST['d_time'];
   
   $fare = $_POST['fare'];
   $address = $_POST['address'];
     
     if(empty($busname) || empty($from_city) || empty($to_city) || empty($d_time) || empty($fare) || empty($address)){     
        header("Location: admin.php"); 
    exit();       
    }  
     
   $sql = "INSERT INTO bus (busname, from_city, to_city, d_time, fare, address) VALUES ('$busname', '$from_city', '$to_city', '$d_time', '$fare', '$address')"; 
   mysqli_query($conn, $sql);
     
        
     
 }
 
    echo "<a href='admin.php'>Back To Admin Page</a>";
?>
    </body>
</html>