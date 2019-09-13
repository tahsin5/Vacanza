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
<!--
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

<script src="js/datepicker.js"></script>
<script src="js/autocomplete.js"></script>
 
 <link rel="stylesheet" href="css/Vacanza.css">
 
    </head>


<body>

<nav class="navbar navbar-custom">
   <div class="container-fluid wrap clearfix">
    <div class="navbar-header">
    <a href="../Vacanza.php"><img class="logo" src="images/baz.png"></a>
    
    </div>    
    
    <ul class="nav navbar-nav navbar-right">
     <li><a class="active" href="./Vacanza.php">Home</a></li>
     <li><a href="./includes/Destinations.php">Destination</a></li>
     <li><a href="./includes/offer.php">Offers</a></li>
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
    <div class="btn-group">
  <button class="button" name="flights"><a class="active" href="frontpage.php">FLIGHTS</a></button>
  <button class="button" name="buses"><a href="includes/bus.php">BUS</a></button>
  <button class="button" name="cars"><a href="includes/cars.php">CARS</a></button>

</div>
   
    <div class= "transbox-custom">
       
    <?php 
   
    if(isset($_GET['error'])){
      $error = $_GET['error'];
      if($error == 'empty'){
        echo "<span class='errormessage'>Please fill all the fields</span><br>";
      }else{
        echo "<br>";
      }
    }
        
    ?>
    
<div id="searchformdiv">
    
  <form class="form-inline" action="frontpageform.php" method="post">
      
    <div class="form-group">
       <label for="city_id_from" class="control-label"></label>
		<input type="text" class="form-control" id="city_id_from" name="from" placeholder="From">
	</div>
      
      <div class="form-group">
       <label for="city_id_to" class="control-label"></label>
		<input type="text" class="form-control" id="city_id_to" name="to" placeholder="To">
	</div>
      
 
      <div class="form-group">
    <input class="datepicker form-control" placeholder="Depart" type="text" name="departdate">
          
</div>
      
      <div class="form-group">
    <input type="text" class="datepicker form-control" placeholder="Return" name="returndate">
</div>
    <button type="submit" name="flight_search" class="btn btn-default">Search</button>
  </form>
</div>
        
    </div>
 </div>   
</section>
   
    
    
        <div class="popularDest-custom">
            
    <div class="container-fluid">
            <p>POPULAR DESTINATIONS</p>
        </div>
    </div>
    <div class="container-fluid">
  <div class="row">
      
      <div class="col-sm-3"><figure><figcaption> DHAKA </figcaption><a href="https://www.lonelyplanet.com/bangladesh/dhaka"><img src="images/Destinations/dhaka.jpg" alt="nothing" style="width:297px;height:200px;border:0;"></a>
          
          </figure></div>
      
      <div class="col-sm-3"><figure><figcaption>KUALA LUMPUR</figcaption> <a href="https://www.lonelyplanet.com/malaysia/kuala-lumpur"><img src="images/Destinations/malaysia.jpg" alt="nothing" style="width:297px;height:200px;border:0;"></a>
    
          </figure></div>
      
      <div class="col-sm-3"><figure><figcaption>THIMPHU</figcaption><a href="https://www.lonelyplanet.com/bhutan/thimphu"><img src="images/Destinations/bhutan.jpg" alt="nothing" style="width:297px;height:200px;border:0;"></a>
        
      </figure></div>
      
      <div class="col-sm-3"><figure><figcaption>SINGAPORE</figcaption><a href="https://www.lonelyplanet.com/singapore"><img src="images/Destinations/singapore.jpg" alt="nothing" style="width:280px;height:200px;border:0;"></a>
          
      </figure></div>
      
    </div>
        
    <div class="row">
      
       <div class="col-sm-3"><figure><figcaption>KATHMANDU</figcaption><a href="https://www.lonelyplanet.com/nepal/kathmandu"><img src="images/Destinations/nepal.jpg" alt="nothing" style="width:297px;height:200px;border:0;"></a>
    
      </figure></div>
            
       <div class="col-sm-3"><figure><figcaption>CHENNAI</figcaption><a href="https://www.lonelyplanet.com/india/tamil-nadu/chennai-madras"><img src="images/Destinations/chennai.jpg" alt="nothing" style="width:297px;height:200px;border:0;"></a>
           
      </figure></div>
            
        <div class="col-sm-3"><figure><figcaption>CHITTAGONG</figcaption><a href="https://www.lonelyplanet.com/bangladesh/chittagong-division/chittagong"><img src="images/Destinations/chittagong.jpg" alt="nothing" style="width:297px;height:200px;border:0;"></a>
            
      </figure></div>
            
        <div class="col-sm-3"><figure><figcaption>BANGKOK</figcaption><a href="https://www.lonelyplanet.com/thailand/bangkok"><img src="images/Destinations/thailand.jpg" alt="nothing" style="width:280px;height:200px;border:0;"></a>
        
      </figure></div>
            
    </div>
        </div>
   
    <div class="container-fluid">
        <div class="seemore-custom">
          <button class="button button-primary"><a href="includes/Destinations.php">See More</a></button>
        </div>
    </div>
 

             
 <?php include "includes/footer.php"; ?>
