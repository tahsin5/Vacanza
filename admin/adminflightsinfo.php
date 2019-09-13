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
    <link rel="stylesheet" type="text/css" href="adminflightsinfo.css">
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
    echo "<form action='changeflightsinfo.php' method='post'>";
    echo "Airlines Name<input type='text' name='airlines' placeholder='Airlines'><br>
    
    Departure Time<input type='time' name='d_time' placeholder=''><br>
    
    Arrival Time<input type='time' name='a_time' placeholder=''><br>
    Duration<input type='time' name='duration' placeholder=''><br>
    From<input type='text' name='from' placeholder='From'><br>
    To<input type='text' name='to' placeholder='To'><br>
    
    <button name='insertsubmit'>Submit</button>";
    echo "</form>";
    
    
}
else if(isset($_POST['search'])){
    echo "<form action='changeflightsinfo.php' method='post'>";
    echo "<input type='text' name='flightno' placeholder='Flightno'>

    <button name='searchsubmit'>Search</button>";
    echo "</form>";
    
}
else if(isset($_POST['showall'])){
    $data = array('Flightno','Airlines', 'D_time','A_time','Duration','D_Airportcode', 'A_Airportcode');
    
 echo "<table>";
 
    $sql = "SELECT * FROM flight, schedule WHERE  flight.flightno = schedule.flightno";
    
     $result = mysqli_query($conn, $sql);
  echo "<tr>";
    foreach($data as $item){
        echo "<th>$item</th>";
    }
    echo "<th>From</th>";
    echo "<th>To</th>";
    echo "</tr>";
    
    if (mysqli_num_rows($result) > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
             
         }
          $D_airportcode = $row['D_airportcode'];
          $A_airportcode = $row['A_airportcode'];
          $sql2 =  "SELECT city FROM city WHERE  airportcode ='$D_airportcode'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          echo "<td>".$row2['city']."</td>";
          
          $sql2 =  "SELECT city FROM city WHERE  airportcode ='$A_airportcode'";
          $result2 = mysqli_query($conn, $sql2);
          $row2 = mysqli_fetch_assoc($result2);
          echo "<td>".$row2['city']."</td>";
          
        $flightno = $row['flightno'];
        echo "<td><form action='changeflightsinfo.php' method='post'><button type='submit' name='modify' value='$flightno'>Modify</button>
<button type='submit' name='delete' value='$flightno'>Delete</button>
<button type='submit' name='addpassenger' value='$flightno'>Add Passenger</button>
<button type='submit' name='showallpassengers' value='$flightno'>Show All Passengers</button>
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