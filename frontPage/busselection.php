    <?php

    $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        if(strpos($url,'error=empty') == true){
            $GLOBALS['error']= "*Please fill all required fields";
        }

    ?>
    <!DOCTYPE html>
    <html>
        <head>
            <meta charset="utf-8"/>
            <title> Vacanza </title>
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


<!--
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css"/>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css"/>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css"/>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css"/>
-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<!--
    <script src="../bootstrap/js/bootstrap.js"></script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../bootstrap/js/npm.js"></script>
-->

     <script>
      $(document).ready(function() {
        $(".datepicker").datepicker({ minDate: (new Date(2017, 4 - 1, 1)), maxDate: (new Date(2017, 4 - 1, 10)) });
      });
      </script>
     <link rel="stylesheet" href= "busselection.css" >
        </head>


    <body>

      <nav class="navbar navbar-custom">
       <div class="container-fluid wrap clearfix">
        <div class="navbar-header">
        <img class="logo" src="baz.png">

        </div>    

        <ul class="nav navbar-nav navbar-right">
         <li><a class="active" href="#home">Home</a></li>
         <li><a href="VacanzaDestinations.php">Destination</a></li>
         <li><a href="offer.php">Offers</a></li>
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

<!--        From where I started copying your code! :P-->

       
        <div class="selectedbus">

        <table>
            <tr><td><h3>Available Buses</h3></td></tr>
        <tr>
        <th></th>
        <th>Bus Name </th>
        <th>From &rarr; To </th>
        <th>Departure Date </th>
        <th>Departure Time </th>
        <th>Fare per Ticket </th>
        <th></th>
        </tr>

    <?php
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        include '../db_connection.php';
        include '../create_database.php';
            
        /*Things you need to check:
            1. SQL query while echoing the table
            2. select korle ki busid nicche kina. next page e use korar jonno ekta post add korte hoe naah??
            3. 2 number ki asholeo hoise?
            4. error message ta thik ache?
            5. <div> ar <table> ki thik moto bondho korsi?
            
          Ami bashae eshe tomake payment page er php file ta pathacchi.
          */
            
        $from = $_POST['from'];
        $to = $_POST['to'];
        $ticket = $_POST['ticket'];
        $departdate = $_POST['departdate'];
    
        $departdate = date('Y-m-d', strtotime($departdate));
            
        $_SESSION['ticket'] = $ticket;
        $_SESSION['departdate'] = $departdate;
            
        
        if(empty($from) || empty($to) || empty($ticket) ||empty($departdate)){
            header("Location: busfrontpage.php?error=empty");    
            exit(); 
        }
        else{
        
            $sql = "SELECT busid FROM bus WHERE from_city = '$from' AND to_city = '$to'";
            $result = mysqli_query($conn, $sql);
            $bus = array();
            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $bus[] = $row['busid'];
                }
            }
            
            else if(mysqli_num_rows($result) == 0){
                echo "<span class='errormessage'>No bus route found between the two cities</span>";
                exit();
            }
        
            for($i=0; $i<count($bus); $i++){
                $sql = "SELECT * FROM bus WHERE busid = '$bus[$i]' ORDER BY d_time";
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $image = "images/".$row['busname'].".png";
                        $busid = $row['busid'];
                        echo "<tr>";
                        echo "<td><img src='$image'></td>";
                        echo"<td>".$row['busname']."</td>";
                        echo "<td>".$from."&rarr;".$to."</td>";
                        echo "<td>".$departdate."</td>";
                        echo "<td>".$row['d_time']."</td>";
                        echo "<td>".$row['fare']."</td>";
                        echo "<td><form action='buspayment.php' method='post'><button type='submit' value='$busid' name='busid'>Select</button></td></form>";
                        echo "</tr>";
                    }
                }
            }
            
        }
    
    ?>
        </table>
        </div>

            </div>
        </div>
            

        <div class="footer-custom">    
        <div class="container-fluid">
         <div class="row">
         <a href="aboutUs.php">About us</a>
         <a href="ContactUs.php">Contact us</a>
         <a href="privacyPolicy.php">Privacy Policy</a>
            </div>
          </div>
        </div>

    </body>
    </html>

