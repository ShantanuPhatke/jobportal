<?php

    include("connection.php");

    session_start();
    
    $user_check = $_SESSION['userEmail'];
    
    $query = "SELECT username from users where email = '$user_check'";
    $ses_sql = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($ses_sql);
    $_SESSION['username'] = $row['username'];
?>