<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="logout.css">    
</head>
<body>
<div class="login">
<h4>YOU HAVE SUCCESSFULLY LOGGED IN</h4>
    
  <?php
session_start();
if(isset($_SESSION['flightno'])){
    echo "<a href='../payment/payment.php'>Payment page</a>";    
}


?>  

 <form action="commentform.php" method="post">
   <div class="comment">
     <textarea name="comment" placeholder="Comments" rows="8" cols="60" maxlength="120"></textarea>
   </div>    
     <button type="submit" name="commentsubmit" value="commentsubmit">Comment</button>
</form>
    

<form action="logoutform.php" method="post">
    
    <button type="submit" name="logout" value="logout">LOG OUT</button>
        
</form>

    
    
</div>
    
    
    </body>
</html>
