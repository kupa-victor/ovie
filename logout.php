<?php
//initialize the session
session_start();

//Unset all of the session variables
$_SESSION = array();

//destroy the session.
session_destroy();

//ridirect to the home page
header("location:http://localhost/ovie.php/myown/index.php")
?>