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
    <link rel="stylesheet" type="text/css" href="changecitiesinfo.css">
</head>

<body>
    <?php

session_start();
include '../db_connection.php';
include '../create_database.php';



if(isset($_POST['modify'])){
   $data = array('city', 'country','airportname','airportcode');
$i=0;

    $airportcode = $_POST['modify'];
    $sql = "SELECT * FROM city WHERE airportcode = '$airportcode'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    echo "<form action='modifycities.php' method='post'>";
    echo "<label>AirportCode</label><input type= 'text' name='airportcode' value='$airportcode' readonly><br>";
      foreach($row as $item){
        if($item != $airportcode){
        echo "<label>".$data[$i]."</label><input type='text' name='$data[$i]' placeholder='$item'><br>";
     ++$i;
      }
          
    }
    echo "<button name='update'>Update</button>";
    //echo "<button name='delete' type='Delete'>Delete</button>";
    echo "</form>";
}

else if(isset($_POST['delete'])){
    
    $airportcode = $_POST['delete'];
    $sql = "DELETE FROM city WHERE airportcode = '$airportcode'";//cascade or not?
    mysqli_query($conn, $sql);
    header("Location: admin.php");
}
else if(isset($_POST['searchsubmit'])){
    $city = $_POST['city'];
    $sql = "SELECT * FROM city WHERE city  ='$city'";
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
   
    
   
   $city = $_POST['city'];
   $country = $_POST['country'];
   $airportname = $_POST['airportname'];
   
if(empty($city) || empty($country) || empty($airportname)){     
        header("Location: admin.php"); 
    exit();       
}          
     
   $sql = "INSERT INTO city (city, country, airportname) VALUES ('$city', '$country', '$airportname')"; 
   mysqli_query($conn, $sql);
   
   header("Location: admin.php");        
     
 }
      
echo "<a href='admin.php'>Back To Admin Page</a>";
 
?>
    </body>
</html>