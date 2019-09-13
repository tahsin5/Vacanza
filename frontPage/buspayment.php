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
    <link rel="stylesheet" type="text/css" href="assets/css/styles1.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo1.css">
</head>

<body>
    <nav class="navbar navbar-custom">
   <div class="container-fluid ">
    <div class="navbar-header">
    <img class="logo" src="baz.png">
    
    </div>    
    
    <ul class="nav navbar-nav navbar-right">
     <li><a class="active" href="frontpage.php">Home</a></li>
     <li><a href="">Destination</a></li>
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
    <section class="searchsection">
   
<div id="image">
   <div class= "transbox1-custom">
       <div class="output-custom">
           <div class="heading">
                <h1>Ticket Information</h1>
            </div>
           <div class="ticketInfo">
                <?php
                    //session_start();
                    include '../db_connection.php';
                    include '../create_database.php';

                    if(!isset($_SESSION['ticket'] )){
                        $_SESSION['ticket'] = $_POST['ticket'];
                    }
                    if(!isset($_SESSION['busid'])){
                        $_SESSION['busid'] = $_POST['busid'];
                    }    
                    if(!isset($_SESSION['departdate'])){
                       $_SESSION['departdate'] = $_POST['departdate'];
                    } 

                    
                    $ticketno = $_SESSION['ticket'];
                    $busid = $_SESSION['busid'];
                    $departdate = $_SESSION['departdate'];
                    $fare;
                    $total;
                    $address;
                    $busname;
                    $time;

                    //retrieving fare
                    $sql = "SELECT fare FROM bus WHERE busid = '$busid'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $fare= $row['fare'];
                        }    
                    }

                    //total amount
                    $total = $ticketno * $fare;

                    //retrieving address
                    $sql = "SELECT address FROM bus WHERE busid = '$busid'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $address = $row['address'];
                        }
                    }

                    //retrieving busname
                    $sql = "SELECT busname FROM bus WHERE busid = '$busid'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $busname = $row['busname'];
                        }
                    }

                    //retrieving time
                    $sql = "SELECT d_time FROM bus WHERE busid = '$busid'";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                            $time = $row['d_time'];
                        }
                    }


            echo "<p> Your booking has been successful! Please contact in the address below for ticket collection: </p>";
            echo "<p> $address </p>";
            echo "<p> Your Ticket Information: </p>";
            echo "<p> Bus Name : <span> $busname <span> </p>";
            echo "<p> Travel Date : <span> $departdate <span> </p>";
            echo "<p> Travel Time : <span> $time <span> </p>";
            echo "<p> Ticket(s) : <span> $ticketno </span></p>";
            echo "<p>Total Amount : BDT <span> $total </span></p>";
            echo "<p>Booking Code: ".mt_rand(10,100000)."</p><br>"; 

                    ?>
           </div>
       </div>
       <hr>
    

    </div>
</div>
</section>
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
