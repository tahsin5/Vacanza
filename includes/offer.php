<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title> Vacanza </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
       
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
 
 <link rel="stylesheet" href= "offer.css" >
    </head>


<body>
    
  <nav class="navbar navbar-custom">
   <div class="container-fluid wrap clearfix">
    <div class="navbar-header">
    <img class="logo" src="baz.png">
    
    </div>    
    
    <ul class="nav navbar-nav navbar-right">
     <li><a href="frontpage.php">Home</a></li>
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

             ?></li>
        
   </ul>
  </div>
      
</nav>
    

   

    <div class="car-custom">
  <p>Vacanza provides a number of unique and attractive offers in different times of the year to show our trusted and devoted users how much they mean to us. 
For the period of the next six months*, be and buy with Vacanza to avail the amazing offers which include:
</p>


  
 </div>   

   
    
    
        
    <div class="container-fluid">
  <div class="row">
      
      <div class="col-sm-3"><p><br><br>
Flat 10% discount for buying 25+ tickets </p></div>
      <div class="col-sm-3"><p><br><br>Flat 15% discount for buying 50+ tickets</p></div>
      
      <div class="col-sm-3"><p><br><br>Flat 20% discount for buying 100+ tickets</p></div>
      
      <div class="col-sm-3"><p><br><br>Flat 25% discount for buying 150+ tickets</p></div>
      
      
      
    </div>
  
        
    </div>
        
       <div class="car-custom1"> 
     <p>** All offers are applicable for the number of tickets bought within March ’17 – August ’17. :
</p>
    </div>
    
    <div class="footer-custom">    
    <div class="container-fluid">
     <div class="row">
     <a href="aboutUs.php">About us</a>
     <a class="active" href="ContactUs.php">Contact us</a>
     <a href="privacyPolicy.php">Privacy Policy</a>
        </div>
      </div>
    </div>
    
</body>
</html>

