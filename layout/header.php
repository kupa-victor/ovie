<?php
// initialize the session
session_start();

$authenticated = false;
if (isset($_SESSION["email"])){
    $authenticated = true;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MY PROJECT</title>
    <link rel="stylesheet" href="design.css">
</head>
<body>
    <nav>
            <ul class="drop_menu">
            <li class="active"><a href="index.php" > Home</a></li>
            <span class="display">
                <li><a href="#" >About</a>
                    <span class="menu_2">   
                        <ul>
                            <li><a href="about.html"> About company</a></li>
                            <li><a href="about"> About Owner</a></li>
                        </ul>
                    </span>
                </li>
            </span>
            <li><a href="contact"> Contact</a></li>
            <?php
            if($authenticated){

            
            ?>
            <span class="admin">
                <li><a href=""> Admin</a>
                    <span class="menu">
                        <ul >
                            <li><a href="logout.php">Logout</a></li>
                            <li><a href="profile.php">Profile</a></li>
                        </ul>
                    </span>    
                </li>
            </span>
            <?php
            }else{
            ?>
            <li><a href="login.php" >Login</a></li>
            <li><a href="register.php" >Register</a></li>
            <?php 
            }
            ?>
        </ul>
    </nav>
    <div class="under">
        <a href=".#"> Learn More  About this site</a>
    </div>