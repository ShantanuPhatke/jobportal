<?php
    include('session.php');
    include('profile.php');
    if(!isset($_SESSION['userEmail'])){
    header("location: index.php"); // Redirecting To Home Page
    }
    
    $query="SELECT * FROM candidate WHERE `cemail`='$user_check'";
    $result=mysqli_query($con, $query);
    if($result) {
        $row=mysqli_fetch_assoc($result);
        if($row){
            $_SESSION['cname'] = $row['cname'];
            $_SESSION['cemail'] = $row['cemail'];
            $_SESSION['gender'] = $row['gender'];
            $_SESSION['dob'] = $row['dob'];
            $_SESSION['jtype'] = $row['jtype'];
            $jtype = $_SESSION['jtype'];
            $_SESSION['jsector'] = $row['jsector'];
            $jsector = $_SESSION['jsector'];
            $_SESSION['city'] = $row['city'];
            $_SESSION['pincode'] = $row['pincode'];
            $_SESSION['exp'] = $row['exp'];
            // echo "<script>alert('Session Variables Set Successfully!');</script>";
            // mysqli_close($con);
        } else {
            // echo "<script>alert('Session Failed!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard | Jobportal</title>
    <link rel="stylesheet" href="./scss/common.css">
    <link rel="stylesheet" href="./scss/candidatedash.css">

    <script>
        const toggleSidebar = () => {
            const sidebar = document.getElementById("sidebar")
            sidebar.style.marginLeft == "0px" ? sidebar.style.marginLeft="-300px" : sidebar.style.marginLeft="0px"

            const sidebarButtons = document.getElementsByClassName("sidebarButton");
            let i;
            for (i = 0; i < sidebarButtons.length; i++) {
                sidebar.style.marginLeft == "0px" ? sidebarButtons[i].style.transform="rotate(-180deg)" : sidebarButtons[i].style.transform="rotate(0deg)"
            }
        }

        let activeItem = 'welcome'
        const handleItemClick = divId => {

            document.getElementById(activeItem).style.display = 'none';
            document.getElementById(divId).style.display = 'flex';
            activeItem = divId
        }
    </script>

</head>

<body>

    <div class="container">
        <div class="sidebar" id="sidebar">

            <div class="info" onclick="handleItemClick('welcome')">
                <img src="./img/profile01.jpg" alt="Profile Picture">
                <p>
                    <?php echo $_SESSION['username']; ?> 😎
                </p>
            </div>

            <div class="items">
                <div class="item active" onclick="handleItemClick('profile')">
                    PROFILE
                </div>
                <div class="item" onclick="handleItemClick('career')">
                    CAREER
                </div>
                <div class="item" onclick="handleItemClick('jobs')">
                    JOBS
                </div>
                <div class="item">
                    <a href="logout.php">LOGOUT</a>
                </div>
            </div>
        </div>

        <div class="workspace" id="welcome">
            <img onclick="toggleSidebar()" class="sidebarButton" src="./icons/right-arrow.svg" alt="sidebarButton">
            <div class="title">
                Howdy <?php echo $_SESSION['username']; ?>!
            </div>
            <p class="description">
                Glad to have you on our portal 😀
            </p>
            <p class="description">
                This is your dashboard, you can control all the aspects about your profile from the tabs on the left. You can search for available jobs according to your preference and immediately apply for them! 👨‍🎓
            </p>
            <p class="description">
                Start by settingup your profile first 📄
            </p>

            <div class="imgBG">
            </div>
        </div>

        <div class="workspace" id="profile" style="padding-top: 180px; padding-bottom: 180px;">
            <img onclick="toggleSidebar()" class="sidebarButton" src="./icons/right-arrow.svg" alt="sidebarButton">
            <div class="title">
                This is your profile, <?php echo $_SESSION['username']; ?>.
            </div>
            <p class="description">
                Complete it and proceed to the Career tab! 🎓
            </p>
            <form action="profile.php" method="post" id="profileForm" enctype="multipart/form-data">
                <input type="text" name="cname" value="<?php echo $_SESSION['username'] ?>" required>
                <input type="email" name="cemail" value="<?php echo $_SESSION['userEmail'] ?>" required>
                <div class="labelDiv">
                    <label style="align-items: center; width: fit-content;">Male<input type="radio" name="gender" value="male" required></label>
                    <label style="margin-left: 15px; width: fit-content; align-items: center;">Female<input type="radio" name="gender" value="female" required></label>
                </div>
                <div class="labelDiv">
                    <label>DOB</label>
                    <input style="padding-left: 20px;" type="date" name="dob" max="2000-01-01" required>
                </div>
                <div class="labelDiv">
                    <label>Job Type</label>
                    <select name="jtype" form="profileForm" required>
                        <option value="permanent">Permanent</option>
                        <option value="temporary">Temporary</option>
                        <option value="contract">Contract</option>
                        <option value="freelance">Freelance</option>
                    </select>
                </div>
                <div class="labelDiv">
                    <label>Job Sector</label>
                    <select name="jsector" form="profileForm" required>
                        <option value="it">IT</option>
                        <option value="sales">Sales</option>
                        <option value="finance">Finance</option>
                        <option value="permanent">Freelance</option>
                    </select>
                </div>
                <input type="text" name="city" placeholder="Preferred Job Location" required>
                <input type="number" name="pincode" placeholder="Pincode" required>
                <input type="number" name="exp" placeholder="Your experience(Months)" required>
                <button type="submit" name="submitProfile">Submit</button>
            </form>

            <div class="imgBG">
            </div>
        </div>

        <div class="workspace" id="career">
            <img onclick="toggleSidebar()" class="sidebarButton" src="./icons/right-arrow.svg" alt="sidebarButton">
            <div class="title">
                Job trends in <?php echo isset($_SESSION['jsector']) ? strtoupper($_SESSION['jsector']) : 'all' ?> sector!
            </div>
            <p class="description">
                Lorem ipsum dolor sit amit! 😀
            </p>
            <p class="description">
                Wages Will Finally See Real Growth. For a long time, wages had been stagnant despite the falling unemployment rate.
                More Companies Will Offer Flexible Hours.
                Diversity Initiatives will Evolve.
                Companies Will be More Open to “Alternative” Candidates.
            </p>

            <div class="imgBG">
            </div>
        </div>

        <div class="workspace" id="jobs">
            <img onclick="toggleSidebar()" class="sidebarButton" src="./icons/right-arrow.svg" alt="sidebarButton">
            <div class="title">
                Find jobs relevant to your profile here.
            </div>
            <p class="description">
            Job sector: <?php echo isset($_SESSION['jsector']) ? strtoupper($_SESSION['jsector']) : "NA" ?> | Job type: <?php echo isset($_SESSION['jtype']) ? strtoupper($_SESSION['jtype']) : "NA" ?>
            </p>
            <div class="cardContainer">
                <?php
                    if(isset($jtype)){
                        $query="SELECT `jtype`, `jsector`, `jdescription`, `rname` FROM `jobsopen` WHERE `jtype`='$jtype';";
                        $result=mysqli_query($con, $query);
                        if($result) {
                            while($row=mysqli_fetch_assoc($result)) {
                    
                ?>
                <div class="card">
                    <div class="cardContent">
                        <img src="./icons/hiring.svg" alt="Hiring">
                        <p><b>Recruiter: </b><?php echo $row['rname']; ?> <br>
                        <b>Job Description:</b><br><?php echo $row['jdescription']; ?></p>
                    </div>
                </div>
                <?php
                            } 
                        }
                    }
                ?>
                
            </div>

            <div class="imgBG">
            </div>
        </div>

    </div>




</body>

</html>