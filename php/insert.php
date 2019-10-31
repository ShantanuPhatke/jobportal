<?php
$username=$_POST["username"];
$password=$_POST["password"];
$con = mysqli_connect("localhost","root");
echo "Connected to the server";
$dbasename="userlogin";
mysqli_select_db($con,$dbasename)or die(mysqli_error($con));
echo "Database is selected";
$query="insert into user values('$username','$password')";
mysqli_query($con,$query) or die(mysqli_error($con));
echo "Password Updated Successfully inserted";
mysqli_close($con);
?>