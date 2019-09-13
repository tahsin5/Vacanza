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
    <link rel="stylesheet" type="text/css" href="changeoffersinfo.css">
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
   $data = array('discount','prerequisite');
$i=0;

    $offerid = $_POST['modify'];
    $sql = "SELECT * FROM offer WHERE offerid = '$offerid'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    echo "<form action='modifyoffers.php' method='post'>";
    echo "<label>Offerid</label><input type='text' name='offerid' value='$offerid' readonly><br>";
      foreach($row as $item){
        if($item != $offerid ){
        echo "<label>".$data[$i]."</label><input type='text' name='$data[$i]' placeholder='$item'><br>";
     ++$i;
      }
          
    }
    echo "<button name='update'>Update</button>";
    //echo "<button name='delete' type='Delete'>Delete</button>";
    echo "</form>";
}

else if(isset($_POST['delete'])){
    
    $offerid = $_POST['delete'];
    $sql = "DELETE FROM offer WHERE offerid = '$offerid'";//cascade or not?
    mysqli_query($conn, $sql);
    
    
    //header("Location: admin.php");
}
  


 else if(isset($_POST['insertsubmit'])){
   
   
   $offerid = $_POST['offerid'];
   $discount = $_POST['discount'];
   $prerequisite = $_POST['prerequisite'];
     
   $sql = "INSERT INTO offer (offerid, discount, prerequisite) VALUES ('$offerid', '$discount', '$prerequisite')"; 
   mysqli_query($conn, $sql);
   
        
     
 }
   
 echo "<a href='admin.php'>Back To Admin Page</a>";
?>
    </body>
</html>