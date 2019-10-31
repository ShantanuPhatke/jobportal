<?php
    $con = mysqli_connect("127.0.0.1", "root");
    $dbasename="jobportal";
    mysqli_select_db($con,$dbasename)or die(mysqli_error($con));
?>