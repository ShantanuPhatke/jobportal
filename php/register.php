<?php

    include("connection.php");

    $username=$_POST["username"];
    $email=$_POST["email"];
    $password=$_POST["password"];
    
    $query="insert into users (username, email, password) values('$username', '$email', '$password')";
    mysqli_query($con,$query) or die(mysqli_error($con));
    echo "Registered Successfully!";
    mysqli_close($con);
    header("Location: https://shantanuphatke.github.io/job-portal");
?>