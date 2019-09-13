<?php

session_start();
include '../db_connection.php';
include '../create_database.php';


session_destroy();
header("Location: loginadmin.php");




//destroy session and go back to login page

?>