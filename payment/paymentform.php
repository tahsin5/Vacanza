<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Vacanza </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 <link rel="stylesheet" href= "paymentform.css">
    </head>
<body>  

<?php

session_start();
include '../db_connection.php';
include '../create_database.php';

//if(empty($_POST['owner']) || empty($_POST['cardnumber']) || empty($_POST['cvv'])){
//    header("Location: payment.php?error=empty");    
//    exit(); 
//} 
    
if(isset($_SESSION['userid']) && isset($_SESSION['flightno']) && isset($_SESSION['userid'])){    
   $userid = $_SESSION['userid'];
   $flightno = $_SESSION['flightno'];
   $billid = $_SESSION['billid'];  
}
    
$sql = "INSERT INTO flies(userid, flightno) VALUES ('$userid', '$flightno')";
mysqli_query($conn, $sql);
    
$sql = "SELECT * FROM billing WHERE billid = '$billid'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$t_bought = $row['ticket'];
$amount = $row['netpayable'];
$date = $_SESSION['departdate'];

    
$sql = "INSERT INTO previoustrips(triptype, date, flightno, userid, t_bought, amount) VALUES('Flight',  '$date', '$flightno', '$userid', '$t_bought', '$amount')";
mysqli_query($conn, $sql);
    
$sql = "SELECT * FROM flight INNER JOIN schedule ON flight.flightno = schedule.flightno WHERE flight.flightno = '$flightno'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

$d_airportcode = $row['D_airportcode'];
$a_airportcode = $row['A_airportcode'];
    
$sql2 = "SELECT airportname FROM city INNER JOIN schedule ON city.airportcode = schedule.D_airportcode WHERE D_airportcode = '$d_airportcode'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$d_airport = $row2['airportname'];
    
$sql2 = "SELECT airportname FROM city INNER JOIN schedule ON city.airportcode = schedule.A_airportcode WHERE A_airportcode = '$a_airportcode'";
$result2 = mysqli_query($conn, $sql2);
$row2 = mysqli_fetch_assoc($result2);
$a_airport = $row2['airportname'];

if(isset($_SESSION['departdate'])){
    $d_date = $_SESSION['departdate'];
}

?>
<div class='eticket'>
    
 <div class='vacanza'>
    <img src='../images/baz.png' alt='Vacanza.com'>
    </div>
    
<section>
<div class="row">   
 <div class="col-md-6">
  <h1>eTicket Itinerary</h1>
 </div> 
<div class="col-md-6">
<?php
  $image = "../images/".$row['airlines'].".png";
  echo "<img src='$image' alt='Airlines'>";

?>
</div>
</div>
</section>
       
<p>Thank You for purchasing your ticket with Vacanza.com, we wish you a safe journey and hope you will purchase your tickets with us in the future. </p><br>
    
    <?php
    echo "<h3>Name: ".$_POST['owner']. "</h3><br>";
    echo "<h3>Airlines: ".$row['airlines']."</h3><br>";
    
    
    echo "<h3>Boarding Pass: ".boardingpass()."</h3><br>";
    
    echo "<h2>Itinerary</h2>
    <table class='table table-bordered'>
        <tr>
            <th>FLIGHT</th>
            <th>FROM</th>
            <th>TO</th>
            <th>DEPARTURE</th>
            <th>ARRIVAL</th>
            <th>STATUS</th>
        </tr>";
        echo "<tr>";
        echo "<td>".$row['flightno']."</td>";
        echo "<td>".$d_airport."</td>";
        echo "<td>".$a_airport."</td>";
        echo "<td>".$d_date." ".$row['d_time']."</td>";
        echo "<td>".$d_date." ".$row['a_time']."</td>";
        echo "<td>Confirmed</td>";
        
        echo "</tr>
    </table>";
    
    echo "<h4>Number of Tickets: ".$_SESSION['ticketno']."</h4>";
    echo "<h4>Ticket Class: ".$_SESSION['ticketclass']."</h4>";
    echo "<h4>Total Fare: ".$_SESSION['total']."</h4>";
    
    echo "</div>";   
 //session_destroy();
 
function boardingpass(){
    $alphas = range('A','Z');
    $nums = range(1,9);
    $array = array_merge($alphas,$nums);
    $pass = "";
    
    for($i=0;$i<6;++$i){
        $temp = $array[array_rand($array)];
        $pass = $pass.$temp;
    }
    return $pass;
}
        

//echo "<h2>Thank You ".$_POST['owner']." for purchasing your ticket with      us, hope you have a safe journey.</h2><br><br>";
//
//echo "<div class='printablearea'>";
//echo "<h3>CUSTOMER INFORMATION</h3><br><br>";
//    
//echo "<h4>Passenger: ".$_POST['owner']."</h4><br>";
//echo "<h4>Airlines: ".$row['airlines']."</h4><br>";
//echo "<h4>Flightno: ".$row['flightno']."</h4><br>";
//echo "<h4>Departure Date: ".$d_date." </h4><br>";
//echo "<h4>Departure Time: ".$row['d_time']."</h4><br>";
//echo "<h4>Arrival Date: ".$d_date." </h4><br>";
//echo "<h4>Arrival Time: ".$row['a_time']."</h4><br>";
//echo "<h4>Duration: ".$row['duration']."</h4><br>";
//
//echo "<h4>From: ".$d_airport."</h4><br>";
//echo "<h4>To: ".$a_airport."</h4><br>";
//
//echo "<h4>Number of tickets: ".$_SESSION['ticketno']."</h4><br>";
//echo "<h4>Ticket Class: ".$_SESSION['ticketclass']."</h4><br>";
//echo "<h4>Boarding pass: ".mt_rand(10,100000)."</h4><br>";    
//echo "</div>";
// 
//     echo "<a href='../frontpage/frontpage.php'>Back To Front Page</a>";
//session_destroy();
?>
    
    
    
    
    
    </body>
</html>