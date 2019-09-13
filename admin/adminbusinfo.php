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


 
 <link rel="stylesheet" href= "adminbusinfo.css" >
    </head>


<body> <?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}


if(isset($_POST['insert'])){
    echo "<form action='changebusinfo.php' method='post'>";
    echo "Bus Name<input type='text' name='busname' placeholder='Bus Name'> <br>
          From<input type='text' name='from' placeholder='From'><br>
          To<input type='text' name='to' placeholder='To'><br>
    
    Departure Time<input type='time' name='d_time' placeholder=''><br>
   Fare<input type='text' name='fare' placeholder='Fare'> <br>
   Address<input type='text' name='address' placeholder='Address'><br>
    <button name='insertsubmit'>Insert</button>";
    echo "</form>";
    
    
}
else if(isset($_POST['search'])){
    echo "<form action='changebusinfo.php' method='post'>";
    echo "<input type='text' name='busid' placeholder='Busid'>

    <button name='searchsubmit'>Search</button>";
    echo "</form>";
    
}
else if(isset($_POST['showall'])){
 echo "<table>";
  $data = array('BusID', 'Bus Name','From', 'To', 'Departure Time', 'Fare', 'Address');
    
    foreach($data as $item){
           echo "<th>".$item."</th>";
         }
    
    $sql = "SELECT * FROM bus";
     $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
        $busid= $row['busid'];
        echo "<td><form action='changebusinfo.php' method='post'><button type='submit' name='modify' value='$busid'>Modify</button>
<button type='submit' name='delete' value='$busid'>Delete</button>
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