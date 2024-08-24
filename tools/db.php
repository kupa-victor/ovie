<?php
function getDatabaseConnetion(){
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "myowndb";

    //create connection
    $connection = new mysqli($servername,$username,$password,$database);
    if ($connection->connect_error){
        die("error failed to connect to MySQL:" . $connection->connect_error);
    }
    return $connection;
}
?>