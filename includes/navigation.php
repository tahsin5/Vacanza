 <nav class="navbar navbar-custom">
   <div class="container-fluid wrap clearfix">
    <div class="navbar-header">
    <a href="../Vacanza.php"><img class="logo" src="../images/baz.png"></a>
    
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