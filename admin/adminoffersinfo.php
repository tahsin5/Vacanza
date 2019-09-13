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
    <link rel="stylesheet" type="text/css" href="adminoffersinfo.css">
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
    echo "<form action='changeoffersinfo.php' method='post'>";
    echo "<input type='text' name='offerid' placeholder='Offerid'> 
         <input type='text' name='discount' placeholder='Discount'>
         <input type='text' name='prerequisite' placeholder='pre-requisite'> 
    <button name='insertsubmit'>Submit</button>";
    echo "</form>";
    
    
}

else if(isset($_POST['showall'])){
    $data = array('offerid','discount','prerequisite');
   
    echo "<table>";
   echo "<tr>";
    foreach($data as $item){
        echo "<th>$item</th>";
    }
    echo "</tr>";
    
    
    $sql = "SELECT * FROM offer";
     $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
        $offerid = $row['offerid'];
        echo "<td><form action='changeoffersinfo.php' method='post'>
        <button type='submit' name='modify'    value='$offerid'>Modify</button>
<button type='submit' name='delete' value='$offerid'>Delete</button>
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