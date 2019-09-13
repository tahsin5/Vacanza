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
    <link rel="stylesheet" type="text/css" href="changeflightsinfo.css">
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
   $data = array('airlines', 'd_time','a_time','duration','d_airportcode','a_airportcode');
$i=0;

    $flightno = $_POST['modify'];
    
    $sql = "SELECT * FROM flight,schedule WHERE flight.flightno = schedule.flightno AND flight.flightno = '$flightno'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
    echo "<form action='modifyflights.php' method='post'>";
    echo "<input type= 'text' name='flightno' value='$flightno' readonly><br>";
      foreach($row as $item){
        if($item != $flightno){
        echo "<input type='text' name='$data[$i]' placeholder='$item'><br>";
     ++$i;
      }
          
    }
    echo "<button name='update'>Update</button>";
    //echo "<button name='delete' type='Delete'>Delete</button>";
    echo "</form>";
}

else if(isset($_POST['delete'])){
    
    $flightno = $_POST['delete'];
    $sql = "DELETE FROM flight WHERE flightno = '$flightno'";
    mysqli_query($conn, $sql);
    
    
    header("Location: admin.php");
}
else if(isset($_POST['searchsubmit'])){
    $flightno = $_POST['flightno'];
    $data = array('Flightno','Airlines', 'D_Time', 'A_Time', 'Duration');
    
    
    $sql = "SELECT * FROM flight WHERE flightno  ='$flightno'";
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

           $flightno = mt_rand(10,1000000);
           $airlines = $_POST['airlines'];
           $d_time = $_POST['d_time'];
           $a_time = $_POST['a_time'];
           $duration = $_POST['duration'];
           $from = $_POST['from'];
           $to = $_POST['to'];

             //checking if any field is empty
            if(empty($airlines) || empty($d_time) || empty($a_time) || empty($duration) || empty($from) || empty($to)){     
                //header("Location: admin.php"); 
            exit();       
            } 

             //checking if airlines is valid
            $sql = "SELECT airlinesname FROM ticket_flight WHERE airlinesname = '$airlines'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
 
            if(mysqli_num_rows($result) == 0){
                //7header("Location: admin.php"); 
                exit(); 
            }

             //checking if from_city is valid
            $sql ="SELECT city FROM city WHERE city = '$from'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) == 0){
                //header("Location: admin.php"); 
                exit(); 
            }else{
                $sql = "SELECT airportcode FROM city WHERE city = '$from'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $from = $row['airportcode']; 
            }

             //checking if to_city is valid
            $sql = "SELECT city FROM city WHERE city = '$to'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);

            if(mysqli_num_rows($result) == 0){
                //header("Location: admin.php"); 
                exit(); 
            }else{
                $sql = "SELECT airportcode FROM city WHERE city = '$to'";
                $result = mysqli_query($conn,$sql);
                $row = mysqli_fetch_assoc($result);
                $to = $row['airportcode'];
            }

             //inserting to db
            $sql = "INSERT INTO flight (flightno, airlines, d_time, a_time, duration) VALUES ('$flightno', '$airlines',  '$d_time', '$$a_time', '$duration')"; 
            mysqli_query($conn, $sql);

            $sql = "INSERT INTO schedule (d_airportcode, a_airportcode, flightno) VALUES ('$from', '$to', '$flightno')"; 
            mysqli_query($conn, $sql);  
         
            header("Location: admin.php");
            exit();

         }


 else if(isset($_POST['addpassenger'])){
     $flightno = $_POST['addpassenger'];
     echo "<form action='modifyflights.php' method='post'>
            <input type='email' name='email' placeholder='email'>
            <input type='date' name='date' placeholder='Date'>
            <button value='$flightno' name='add'>Add</button>
            </form>";
     
     //header("Location: admin.php");
 }

 else if(isset($_POST['showallpassengers'])){
    $flightno = $_POST['showallpassengers'];
    $sql = "SELECT * FROM flies WHERE flightno  ='$flightno'";
    $result = mysqli_query($conn,$sql);
     
     if(mysqli_num_rows($result) == 0){
                echo "<span class='errormessage'>No users have bought tickets for this flight.</span>";
                exit();
            }
    echo "<table>";
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
    }
     
    echo"</table>";
}

    echo "<a href='admin.php'>Back To Admin Page</a>";
?>
    </body>
</html>