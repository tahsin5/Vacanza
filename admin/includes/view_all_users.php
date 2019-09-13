<table class="table table-bordered table-hover">
  <thead>
     <tr>
                              <th>User Id</th>
                              <th>Password</th>
                              <th>Firstname</th>
                              <th>Middlename</th>
                              <th>Surname</th>
                              <th>Email</th>
                              
                              <th>Gender</th>
                              <th>Date Of Birth</th>
                              <th>Address</th>
                              <th>Contact</th>
                              <th>Type</th>
                              <th></th>
                              <th></th>
                              <th></th>
                              <th></th>
     </tr>
  </thead>
   <tbody>
                         
      <?php
                        
        $sql = "SELECT * FROM users";
        $select_users = mysqli_query($conn,$sql);
                        
        while($row = mysqli_fetch_assoc($select_users)){
            
            $userid = $row['userid'];
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
                            
//                            $sql_select_post_title = "SELECT * FROM posts WHERE post_id =  $comment_post_id";
//                            $select_cat_id = mysqli_query($conn, $sql_select_post_title);
//                            $posts_row = mysqli_fetch_assoc($select_cat_id);
//                            $post_title = $posts_row['post_title'];
                            
                        echo "<tr>
                               <td>$userid</td>
                               <td>$password</td>
                               <td>$firstname</td>
                               <td>$middlename</td>
                               <td>$surname</td>
                               <td>$email</td>
                               <td>$gender</td>
                               <td>$dob</td>
                               <td>$address</td>
                               <td>$contact</td>
                               <td>$type</td>
                               
                               <td><a href='users.php?change_to_admin=$userid'>Admin</a></td>
                               <td><a href='users.php?change_to_subscriber=$userid'>Subscriber</a></td>
                               
                               <td><a href='users.php?delete=$userid'>Delete</a></td>
                               <td><a href='users.php?source=update_user&update_user=$userid'>Update</a></td>
                          </tr>";
                        }
                        
                         
                          
                            ?>
                      </tbody>
</table>      
                  
                <?php      

                if(isset($_GET['delete'])){
                    
                    $user_id = $_GET['delete'];
                    $sql = "DELETE FROM users WHERE userid = $user_id";
                    $delete_user = mysqli_query($conn, $sql);
                    header("Location: users.php");
                }      

                 if(isset($_GET['change_to_admin'])){
                    $user_id = $_GET['change_to_admin'];
                    $sql = "UPDATE users SET type = 'Admin' WHERE userid  = $user_id ";
                    $result = mysqli_query($conn, $sql);
                    header("Location: users.php");
                }   

                 if(isset($_GET['change_to_subscriber'])){
                    $user_id = $_GET['change_to_subscriber'];
                    $sql = "UPDATE users SET type = 'Subscriber' WHERE userid  = $user_id ";
                    $result = mysqli_query($conn, $sql); 
                    header("Location: users.php");
                }   
                    
                ?>