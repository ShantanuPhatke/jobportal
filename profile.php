<?php

    include("connection.php");

    if (isset($_POST["submitProfile"])) {
        $cname=$_POST["cname"];
        $cemail=$_POST["cemail"];
        $gender=$_POST["gender"];
        $dob=$_POST["dob"];
        $jtype=$_POST["jtype"];
        $jsector=$_POST["jsector"];
        $city=$_POST["city"];
        $pincode=$_POST["pincode"];
        $exp=$_POST["exp"];
        
        // $query="SELECT * FROM candidate WHERE cemail='$cemail'";
        
            $query="INSERT INTO `candidate` values('$cname', '$cemail', '$gender', '$dob', '$jtype', '$jsector', '$city', '$pincode', '$exp')";
            
            if(mysqli_query($con,$query) ){
                $_SESSION['cname'] = $cname;
                $_SESSION['cemail'] = $cemail;
                $_SESSION['gender'] = $gender;
                $_SESSION['dob'] = $dob;
                $_SESSION['jtype'] = $jtype;
                $_SESSION['jsector'] = $jsector;
                $_SESSION['city'] = $city;
                $_SESSION['pincode'] = $pincode;
                $_SESSION['exp'] = $exp;
                echo "<script>alert('Profile Created Successfully!'); window.location.href = './CandidateDash.php';</script>";
                mysqli_close($con);
            } else {
                echo "<script>alert('Insertion Failed!')</script>";
            }
        

    }

?>