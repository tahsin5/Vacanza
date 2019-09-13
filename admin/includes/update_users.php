<?php
  
 if(isset($_GET['update_user'])){
   $user_id = $_GET['update_user'];
        
   $sql = "SELECT * FROM users WHERE userid = $user_id";
   $select_users = mysqli_query($conn,$sql);
                        
    $row = mysqli_fetch_assoc($select_users);
                            
        $password = $row['pass'];
        $firstname = $row['firstname'];
        $middlename = $row['middlename'];
        $surname = $row['surname'];
        $email = $row['email'];
        $gender= $row['gender'];
        $dob = $row['dob'];
        $address = $row['address'];
        $contact = $row['contact'];
        $type = $row['type'];
 }


 if(isset($_POST['update_user'])){
    
        $password = $_POST['password'];
        $firstname = $_POST['firstname'];
        $middlename = $_POST['middlename'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $gender= $_POST['gender'];
        $dob = $_POST['dob'];
        $address = $_POST['address'];
        $contact = $_POST['contact'];
        $type = $_POST['type'];
    

     
    $sql = "UPDATE users SET pass = '$password', middlename = '$middlename',  firstname  = '$firstname', surname = '$surname', email = '$email', type = '$type', gender = '$gender', address = '$address', contact = $contact, dob = '$dob' WHERE userid = $user_id";
    
    $update_users = mysqli_query($conn,$sql); 
     
 }

     
?>

<form action="" method="post" enctype="multipart/form-data">
    
<div class="form-group">
     
  <label for="firstname">Firstname</label>
  <input type="text" class="form-control" name="firstname" value="<?php echo $firstname; ?>">       
     
 </div>  
    
<div class="form-group">
     
 <label for="username">Middlename</label>
  <input type="text" class="form-control" name="middlename" value="<?php echo $middlename; ?>">       
  
 </div>            
     
<div class="form-group">
     
<label for="lastname">Surname</label>
<input type="text" class="form-control" name="surname" value="<?php echo $surname; ?>">  
     
</div>  
    
<div class="form-group">
     
  <label for="email">Email</label>
  <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">          
     
 </div>       
            
<div class="form-group">
     
  <label for="password">Password</label>
  <input type="password" class="form-control" name="password" value="<?php echo $password; ?>"> 
    </div>
         
<div class="form-group">
     
<label for="lastname">Address</label>
<input type="text" class="form-control" name="address" value="<?php echo $address; ?>">  
     
</div> 
         
<div class="form-group">
     
<label for="lastname">Date of Birth</label>
<input type="date" class="form-control" name="dob" value="<?php echo $dob; ?>">  
     
</div>   
         
<div class="form-group">
     
<label for="lastname">Contact</label>
<input type="text" class="form-control" name="contact" value="<?php echo $contact; ?>">  
     
</div>    
         
<div class="form-group">
     
  <label for="role">Gender</label>
  <select class="form-control" name="gender" style="width:150px;">
     <option value="<?php echo $gender; ?>"><?php echo $gender; ?></option>
     <option value='Male'>Male</option>    
     <option value='Female'>Female</option>
  </select>           
 </div>                                                                                                                           
          
 <div class="form-group">
     
  <label for="role">Type</label>
  <select class="form-control" name="type" style="width:150px;">
     <option value="<?php echo $type; ?>"><?php echo $type; ?></option>
     
      <?php
      if($type == 'Admin'){
       echo "<option value='Subscriber'>Subscriber</option>";    
    
      }else{
        echo "<option value='Admin'>Admin</option>"; 
      }
       
       
      ?>
       
  </select>     
     
 
         
 </div>                

<div class="form-group">
     
  <input type="submit" class="btn btn-primary" name="update_user" value="Update User">        
     
 </div>  
                                                            
</form>