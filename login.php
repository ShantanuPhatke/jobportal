<?php

    include("connection.php");

    session_start();
    $error = '';
    if (isset($_POST['login'])) {
        if (empty($_POST['email']) || empty($_POST['password'])) {
            $error = "Email or Password is invalid";
        }
        else{
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $query = "SELECT email, password from users where email=? AND password=? LIMIT 1";
            
            $stmt = $con->prepare($query);
            $stmt->bind_param("ss", $email, $password);
            $stmt->execute();
            $stmt->bind_result($email, $password);
            $stmt->store_result();
            if($stmt->fetch()) {
                $_SESSION['userEmail'] = $email;
                header("location: CandidateDash.php");
            }
            else {
                $message = "Incorrect Email or Password!";
                echo "<script type='text/javascript'>alert('$message'); window.location = 'index.php';</script>";
                
            }
        }
        mysqli_close($con);
    }
    else if (isset($_POST['register'])) {
        if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['re-password'])) {
            $error = "All fields are mandatory to be filled";
        }
        else{
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $query = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
            $result = mysqli_query($con, $query) or die(mysqli_error($con));
            if($result) {
                $message = "Successfully registered, proceed to login!";
                echo "<script type='text/javascript'>
                    alert('$message');
                    window.location='./index.php';
                </script>";
                
            }
            else {
                $message = "Something went wrong, please try registering again!";
                echo "<script type='text/javascript'>alert('$message'); window.location = 'index.php';</script>";
            }
            mysqli_close($con);
        }
    }
?>