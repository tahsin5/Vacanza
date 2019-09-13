<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Vacanza </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- <link rel="stylesheet" href= "selection.css" >-->
    </head>


<body>
    
  <nav class="navbar navbar-custom">
   <div class="container-fluid wrap clearfix">
    <div class="navbar-header">
    <img class="logo" src="baz.png">
    
    </div>    
    
    <ul class="nav navbar-nav navbar-right">
     <li><a class="active" href="#home">Home</a></li>
     <li><a href="#destination">Destination</a></li>
     <li><a href="#offer">Offers</a></li>
     <li> 
         <?php 
         session_start();
         if(isset($_SESSION['userid'])){
           echo "<a href=' ../form/logout.php'><span class='glyphicon glyphicon-log-out'></span> Logout </a>";
         }else{
             echo "<a href=' ../form/login.php'><span class='glyphicon glyphicon-log-in'></span> Login </a>";
         }
         
         ?>
        </li>

        
   </ul>
  </div>
      
</nav>
    
    <div class="container">
    <div class="wrapper">
    
    
    
    <div class="selectedflights">
        
    <table class="table table-inverse">
        <h3>Available Flights</h3>
    <thead class="thead-inverse">
    <tr>
    <th>Airlines</th>
    <th>From &rarr; To</th>
        <th>Departure</th>
        <th>Arrival</th>
        <th>Duration</th>
        <th>Fare(Economy)</th>
        <th>Fare(Business)</th>
        <th>Ticket(s)</th>
        
        <th>Ticket class</th>
        <th></th>
    </tr>
    </thead>
    
    <?php

    if (session_status() == PHP_SESSION_NONE) {
      session_start();
    }
    include '../db_connection.php';
    include '../create_database.php';

   if(isset($_POST['flight_search'])){
            
    $from = $_POST['from'];
    $to = $_POST['to'];
    $departdate = $_POST['departdate'];
    $returndate = $_POST['returndate'];

    $departdate = date('Y-m-d', strtotime($departdate));
    $returndate = date('Y-m-d', strtotime($returndate));
    $_SESSION['departdate'] = $departdate;


    if(empty($from) || empty($to) || empty($departdate)){
        header("Location: frontpage.php?error=empty");    
        exit(); 
    }
    else{

        $sql = "SELECT airportcode FROM city WHERE city='$from'";
        $result = mysqli_query($conn, $sql);
        $d_airportcode = array();
        if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)) {
              $d_airportcode[] = $row['airportcode'];
          }
        }


    
    $sql = "SELECT airportcode FROM city WHERE city='$to'";
    $result = mysqli_query($conn, $sql);
    $a_airportcode = array();
    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
          $a_airportcode[] = $row['airportcode'];
      }
    }
    
    
    
    $flightno = array();
    $returnflightno = array();
    for($i=0;$i<count($d_airportcode);$i++){
        $sql = "SELECT flightno FROM schedule WHERE d_airportcode = '$d_airportcode[$i]' AND a_airportcode = '$a_airportcode[$i]'";
    $result = mysqli_query($conn, $sql);
        
     if(mysqli_num_rows($result) == 0){
        echo "<span class='errormessage'>No such flights were found</span>";
       exit();
     }   
    else if(mysqli_num_rows($result) > 0){
    
      while($row = mysqli_fetch_assoc($result)){
        $flightno[] = $row['flightno'];
      }
    }
        
        $sqlreturn = "SELECT flightno FROM schedule WHERE d_airportcode = '$a_airportcode[$i]' AND a_airportcode = '$d_airportcode[$i]'";
    $resultreturn = mysqli_query($conn, $sqlreturn);
    if(mysqli_num_rows($resultreturn) == 0){
         echo "<span class='errormessage'>No return flights found between the two cities</span>";
       exit();
        
    }
    else if(mysqli_num_rows($resultreturn) > 0) {
      while($row = mysqli_fetch_assoc($resultreturn)){
        $returnflightno[] = $row['flightno'];
      }
    }
    
        
    }    
    
//    foreach($flightno as $item){
//        echo $item;
//    }
    
    for($i=0;$i<count($flightno);$i++){
     $sql = "SELECT * FROM flight WHERE flightno = '$flightno[$i]' ORDER BY D_time";
     $result = mysqli_query($conn, $sql);
    
        
    if(mysqli_num_rows($result) == 0){
        echo "<span class='errormessage'>No flights found between the two cities</span>";
       exit();
        
    }
     else if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
            
            $airlines = $row['airlines'];
            $image = "../images/".$airlines.".png";
            $flightnumber = $row['flightno']; 
          
            $sql2 = "SELECT * FROM ticket_flight WHERE airlinesname = '$airlines' AND ticketclass = 'Economy'";
     $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2)); 
          $economyfare = $row2['fare'];
            
           $sql2 = "SELECT * FROM ticket_flight WHERE airlinesname = '$airlines' AND ticketclass = 'Business'";
     $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2)); 
          $businessfare = $row2['fare'];
            
            echo "<tr>";
            echo "<td><img src='$image'></td>";
            echo "<td>".$from."&rarr;".$to."</td>";
            
            echo "<td>".$row['d_time']."</td>";
            
            echo "<td>".$row['a_time']."</td>";
            echo "<td>".$row['duration']."</td>";
            echo "<td>".$economyfare."</td>";
            echo "<td>".$businessfare."</td>";
            echo "<form action='../payment/payment.php' method='post'>
            <td><select name='tickets'>
    <option value='1'>1</option>
    <option value='2'>2</option>
    <option value='3'>3</option>
    <option value='4'>4</option>
    <option value='5'>5</option>
    <option value='6'>6</option>
    </select></td> 
    <td>
    <input type='radio' name='ticketclass' value='Economy' checked> Economy
  <input type='radio' name='ticketclass' value='Business'> Business</td>
  <td><button type='submit' value='$flightnumber' name='flightno'>Select</button></td></form>";
            
            echo "</tr>";
            
//        }else{
//            exit("No flights found between the two cities for the departure date");
//         }
          
       }
     }
   }
    
    echo "</table>";
    echo "<table class='table'>";
            
    echo "<h3>Return Flights</h3>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>Airlines</th>";
    echo "<th>From &rarr; To</th>";
    echo "<th>Departure</th>";
    echo "<th>Arrival</th>";
    echo "<th>Duration</th>";
    echo "<th>Fare(Economy)</th>";
        echo "<th>Fare(Business)</th>";
    echo "<th></th>";
    echo "</tr>";
    echo "</thead>";
        
    for($i=0;$i<count($returnflightno);$i++){
     $sql = "SELECT * FROM flight WHERE flightno = '$returnflightno[$i]'";
     $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) == 0){
        exit("No return flights found");
    }
    else if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)){
        $airlines = $row['airlines'];
            $image = "../images/".$airlines.".png";
          
           $sql2 = "SELECT * FROM ticket_flight WHERE airlinesname = '$airlines' AND ticketclass = 'Economy'";
     $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2)); 
          $economyfare = $row2['fare'];
            
           $sql2 = "SELECT * FROM ticket_flight WHERE airlinesname = '$airlines' AND ticketclass = 'Business'";
     $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2)); 
          $businessfare = $row2['fare'];
          
            echo "<tr>";
            echo "<td><img src='$image'></td>";
            echo "<td>".$to."&rarr;".$from."</td>";
            
            echo "<td>".$row['d_time']."</td>";
            
            echo "<td>".$row['a_time']."</td>";
            echo "<td>".$row['duration']."</td>";
            echo "<td>".$economyfare."</td>";
            echo "<td>".$businessfare."</td>";
            echo "</tr>";
//        }else{
//               exit("No return flights found between the two cities for the given date");
//        }
          
      }
    }
   }
  }
    
    echo "</table>";
    }
        
?>
       
      </div>  
    </div>
    </div>
    
    <div class="footer-custom">    
    <div class="container-fluid">
     <div class="row">
     <a href="#home">About us</a>
     <a href="#home">Contact us</a>
     <a href="#home">Privacy Policy</a>
        </div>
      </div>
    </div>
    
    </body>
</html>

