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
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/demo.css">
</head>

<body>
    <nav class="navbar navbar-custom">
   <div class="container-fluid ">
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
                
                if(!isset($_SESSION['ticketno'] )){
                    $_SESSION['ticketno'] = $_POST['tickets'];
                }
                if(!isset($_SESSION['flightno'])){
                    $_SESSION['flightno'] = $_POST['flightno'];
                }    
                if(!isset($_SESSION['ticketclass'])){
                   $_SESSION['ticketclass'] = $_POST['ticketclass'];
                } 
                
                if(!isset($_SESSION['userid'])){
                    header("Location: ../form/login.php");
                }
               
                $url =   "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
               if(strpos($url,'error=empty') == true){
                 echo "<span class='errormessage'>*Please fill all required fields</span><br><br>";
               }
               
               
               
                $flightno = $_SESSION['flightno'];
                $userid = $_SESSION['userid'];
                $ticketno = $_SESSION['ticketno'];
                $ticketclass = $_SESSION['ticketclass'];
                $fare;
                $offerid;
                $discount;
                $tax;
                $amount;
                $total;
                
                $sql = "SELECT airlines FROM flight WHERE flightno = '$flightno'";
               $result = mysqli_query($conn, $sql);
               $row = mysqli_fetch_assoc($result);
               $airlines = $row['airlines'];
               
               
               
                $sql = "SELECT fare FROM ticket_flight WHERE airlinesname = '$airlines' AND ticketclass = '$ticketclass'";
                $result = mysqli_query($conn, $sql);
                //$fare_a = array();
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $fare= $row['fare'];
                    }    
                }
                //$fare = fare_a[0]; 
                $amount = $ticketno * $fare;
                $tax = 15/100 * $amount;
               
                $sql = "SELECT offerid FROM offers_available WHERE userid = '$userid'";
                $result = mysqli_query($conn, $sql);
                $off_a = array();
                if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $off_a[] = $row['offerid'];
                    }
                    for($c=0; $c<sizeof($off_a); $c++) {
                        $sql2 = "SELECT discount FROM offer WHERE offerid = '$off_a[$c]'";
                        $result2 = mysqli_query($conn, $sql2);
                        $d_array = array();
                        if(mysqli_num_rows($result2) > 0){
                            while($row = mysqli_fetch_assoc($result2)){
                                $d_array[] = $row['discount'];
                            }    
                        }    
                        $discount = $d_array[0];
                     

                        for($x=1; $x<sizeof($d_array); $x++){
                            if($d_array[$x] > $discount){
                                $discount = $d_array[$x];
                            }    
                        }    
                    }
                }
              
                if(isset($discount)){
                    $discount = (($discount)/100) * $amount;
                }else{
                    $discount = 0;
                    echo "No discounts available";
                }
                $total = $amount + $tax - $discount;
                
                $date = date('Y-m-d H:i:s');
                  
                $billid = (mt_rand(10,100000));
                $sql = "INSERT INTO billing(billid, date, discount, totalamount, tax, ticket, netpayable) VALUES ('$billid', '$date', '$discount', '$amount', '$tax', '$ticketno', '$total')";
                mysqli_query($conn, $sql);
            
                $_SESSION['billid'] = $billid;
               
echo "<p>Ticket(s) ................................................................. <span> $ticketno </span></p>";
echo "<p>Amount ................................................................. <span> $amount </span></p>";
echo "<p>Tax(15%) ................................................................. <span> $tax </span></p>";
echo  "<p>Discount ................................................................. <span> $discount </span></p>";
echo  "<p>Sub-total ................................................................. <span> $total </span></p>";

$_SESSION['total'] = $total;
                ?>
               
           </div>
       </div>
       <hr>
    
    <div class="container-fluid">
       
        <div class="creditCardForm">
            <div class="heading">
                <h1>Confirm Purchase</h1>
            </div>
            <div class="payment">
                
                
    
                <form action="paymentform.php" method="post">
                    <div class="form-group owner">
                        <label for="owner">Owner</label>
                        <input type="text" class="form-control" id="owner" name="owner">
                    </div>
                    <div class="form-group CVV">
                        <label for="cvv">CVV</label>
                        <input type="text" class="form-control" id="cvv" name="cvv">
                    </div>
                    <div class="form-group" id="card-number-field">
                        <label for="cardNumber">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardnumber">
                    </div>
                    <div class="form-group" id="expiration-date">
                        <label>Expiration Date</label>
                        <select name="month">
                            <option value="01">January</option>
                            <option value="02">February </option>
                            <option value="03">March</option>
                            <option value="04">April</option>
                            <option value="05">May</option>
                            <option value="06">June</option>
                            <option value="07">July</option>
                            <option value="08">August</option>
                            <option value="09">September</option>
                            <option value="10">October</option>
                            <option value="11">November</option>
                            <option value="12">December</option>
                        </select>
                        <select name="year">
                            <option value="16"> 2016</option>
                            <option value="17"> 2017</option>
                            <option value="18"> 2018</option>
                            <option value="19"> 2019</option>
                            <option value="20"> 2020</option>
                            <option value="21"> 2021</option>
                        </select>
                    </div>
                    <div class="form-group" id="credit_cards">
                        <img src="assets/images/visa.jpg" id="visa">
                        <img src="assets/images/mastercard.jpg" id="mastercard">
                        <img src="assets/images/amex.jpg" id="amex">
                    </div>
                    <div class="form-group" id="pay-now">
                        <?php
                        
                        if(!isset($_SESSION['userid'])){
                            echo "Please login to confirm purchase";
                        }
                        else{
                            echo "<button type='submit' class='btn btn-default' id='confirm-purchase'>Confirm</button>";
                        }
                        
                        ?>
                        
                    </div>
                </form>
            </div>
        </div>
       </div>
    </div>
</div>
</section>
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
