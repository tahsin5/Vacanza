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
    <link rel="stylesheet" type="text/css" href="admincitiesinfo.css">
</head>

<body>
    <?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if((!isset($_SESSION['admin'])){
//  header("Location: loginadmin.php");    
//}


if(isset($_POST['insert'])){
    echo "<form action='changecitiesinfo.php' method='post'>";
    echo "<input type='text' name='city' placeholder='City'> 
         <input type='text' name='country' placeholder='Country'>
         <input type='text' name='airportname' placeholder='Airport name'> 
    
    <button name='insertsubmit'>Submit</button>";
    echo "</form>";
    
    
}
else if(isset($_POST['search'])){
    echo "<form action='changecitiesinfo.php' method='post'>";
    echo "<input type='text' name='city' placeholder='City'>

    <button name='searchsubmit'>Search</button>";
    echo "</form>";
    
}
else if(isset($_POST['showall'])){
 echo "<table>";
 $data = array('city', 'country','airportname','airportcode');
    echo "<tr>";
    foreach($data as $item){
        echo "<th>$item</th>";
    }
    echo "</tr>";
    
    $sql = "SELECT * FROM city";
     $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
        $airportcode = $row['airportcode'];
        echo "<td><form action='changecitiesinfo.php' method='post'><button type='submit' name='modify' value='$airportcode'>Modify</button>
<button type='submit' name='delete' value='$airportcode'>Delete</button>
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
