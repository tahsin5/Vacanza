<?php

session_start();

//<!--  To check if actually logged in    -->

    
if(isset($_SESSION['userid'])){
     header("Location: logout.php");
  }
else{ 
      $url = "http://".$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
    if(strpos($url,'error=empty') == true){
        $GLOBALS['error']= "*Please fill all required fields";
    }
    else if(strpos($url,'error=usedemail') == true){
        $GLOBALS['error']= "*An account with this email already exists";
    }
    else if(strpos($url,'error=passwordonotmatch') == true){
        $GLOBALS['error']= "*Passwords do not match";
    }
   
    
  }
    
             /*     functions    */
function errorMessage(){    
    if(isset($GLOBALS['error'])) {
    echo "<span class='errormessage'>".$GLOBALS['error']."</span><br>";
    }
    else{
        echo "<br>";
    }
}
?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="signup.css"/>    
</head>
    
<body>
    
                <!--    SIGN UP-->
    
<div class="login">
<form action="signupform.php" method="post">
<h2></h2><br><br>  
<?php errorMessage(); ?>
<label> <input type="text" name="firstname" placeholder="First" value=""> 
    <input type="text" name="middlename" placeholder="Middle">
    <input type="text" name="surname" placeholder="Surname"><br>
    </label>
    <label> <input type="email" name="email" placeholder="Email"><br>
    </label>
    <label><input type="password" name="password" placeholder="Password"><br>
    </label>
    <label><input type="password" name="passcon" placeholder="Password"><br>
</label>

    <label>Date of Birth
        <input type="date" name="dob" placeholder="Date"><br>
        
    </label>
    <label>Gender <input type="radio" name="gender" value="Male">Male<input type="radio" name="gender" value="Female">Female<br>
    </label>
    <label>
    <input type="text" name="address" placeholder="Address"><br>
    </label>
    <label>
    <input type="text" name="contact" placeholder="Contact"><br>
    </label>
    
    <label><input type="checkbox" name="alert" value="alert">Receive emails about special offers<br></label>
    <button name="submit" type="submit">SIGN UP</button>
</form>
</div>
</body>
</html>
