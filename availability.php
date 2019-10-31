<?php

    include("connection.php");

    if (isset($_REQUEST["username"])) {
        
        $username = $_REQUEST["username"];
        $usernameSpan = "";
    
        $query = "SELECT username FROM users WHERE username='$username'";
        $result = mysqli_query($con, $query);
        mysqli_num_rows($result) ? $usernameSpan="unavailable" : $usernameSpan="available";
    
        echo $usernameSpan;

    } elseif (isset($_REQUEST["email"])) {
        
        $email = $_REQUEST["email"];
        $emailSpan = "";
    
        $query = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($con, $query);
        mysqli_num_rows($result) ? $emailSpan="unavailable" : $emailSpan="available";
    
        echo $emailSpan;
    }


?>