<?php

session_start();

//destroy session and go back to login page
session_destroy();
header("Location: login.php");

?>