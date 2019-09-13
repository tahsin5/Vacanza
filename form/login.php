

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
 <script>
  $(document).ready(function() {
    $(".datepicker").datepicker();
  });
  </script>
<link rel="stylesheet" href="login.css">    
</head>
<body>

<?php
    
    if(isset($_SESSION['userid'])){
      header("Location: logout.php");
  }
else{
      $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    
    if(strpos($url,'error=incorrect') == true){
         $GLOBALS['error']= "*Your username or password is incorrect";
    }
    else if(strpos($url,'error=empty') == true){
        $GLOBALS['error']= "*Please fill out all the fields";
    }
  }
  
function errorMessage(){    
    if(isset($GLOBALS['error'])) {
       echo "<span class='errormessage'>".$GLOBALS['error']."</span><br>";
    }
    else{
        echo "<br>";
    }
}
?>   
    <nav class="navbar navbar-custom">
   <div class="container-fluid wrap clearfix">
    <div class="navbar-header">
    <img class="logo" src="baz.png">
    
    </div>    
    
    <ul class="nav navbar-nav navbar-right">
     <li><a class="active" href="../frontPage/frontpage.php">Home</a></li>
     <li><a href="../frontPage/VacanzaDestinations.php">Destination</a></li>
     <li><a href="../frontPage/offer.php">Offers</a></li>
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

<div class="login">
    <h2></h2><br><br><br>

<?php errorMessage(); ?>    
<form action="loginform.php" method="post">
    
    <label class="label1"><input type="text" name="email"  placeholder="Email"></label>
    <label><input type="password" name="pass" placeholder="Password"></label>
    <button type="submit">Log In</button>
   
    <a class="signup" href="signup.php">Sign Up</a>
</form>
    
    
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
