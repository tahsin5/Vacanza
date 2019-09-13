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
    <link rel="stylesheet" type="text/css" href="changeoffersinfo.css">
</head>

<body>
    <?php

session_start();
include '../db_connection.php';
include '../create_database.php';

if(isset($_POST['insert'])){
    echo "<form action='changeadmininfo.php' method='post' class='insert'>";
    echo "UserName <input type='text' name='firstname' placeholder='Firstname'> 
    
    Password
    <input type='password' name='password' placeholder='Password'>
    
    <button name='addsubmit'>Submit</button>";
    echo "</form>";
    
    
}
else if(isset($_POST['showall'])){
   
    $data = array('Username','Password');    
    
 echo "<table class='showall'>";
    echo "<tr>";
    foreach($data as $item){
        echo "<th>$item</th>";
    }
    echo "</tr>";
    
    
    $sql = "SELECT * FROM admin";
     $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    
      while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
         foreach($row as $item){
           echo "<td>".$item."</td>";
         }
        $username = $row['username'];
        echo "<td><form action='changeadmininfo.php' method='post'>
<button type='submit' name='delete' value='$username'>Delete</button>

        </form></td>";
        echo "</tr>";
       }
    }
    
    echo "</table>";
        
    
    
    
    //header("Location: admin.php");
}
    
?>
    </body>
</html>
