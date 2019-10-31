<?php
    include('login.php'); // Includes Login Script
    if(isset($_SESSION['login_user'])){
        header("location: CandidateDash.php"); // Redirecting To Profile Page
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us | Jobportal</title>
    <link rel="stylesheet" href="./scss/common.css">
    <link rel="stylesheet" href="./scss/about.css">
    <link rel="stylesheet" href="./scss/navigation.css">
    <link rel="stylesheet" href="./scss/login-register.css">
</head>

<body>
    <div class="container">

        <div class="navigationDesktop">
            <img src="./img/logo.svg" alt="JobPortal">
            <div class="menu">
                <a href="./index.php">
                    <div class="items">Home</div>
                </a>
                <a href="./about.php">
                    <div class="items active">About Us</div>
                </a>
                <a href="./contact.php">
                    <div class="items">Contact</div>
                </a>
                <div class="items" onclick="openModal()">Login</div>
            </div>
        </div>

        <div class="hero">
            <div class="content" id="content">
                <div class="title">
                    About Us
                </div>
                <div class="text">
                    <p>For over 20 years, JobPortal has been at the forefront of innovation when it comes to using data and technology to evolve the human capital management space, with solutions that help employers find, hire and manage great people.</p>
                    <p>Our mission is empowering employment. We are striving to organize all the world’s human capital data and make it meaningful for society.</p>
                    <p>It is the core of our business and the guiding principle of our people, making JobPortal a truly unique place to work. A place where you can say that at the end of the day, you make a difference.</p>
                    <p>Each day we help job seekers and companies connect, giving people a chance to find their calling and many employers a chance to find and hire top talent to help grow their business.</p>
                </div>
            </div>
        </div>
        
        <div class="productSection">
            <div class="content">
                <div class="title">
                    Our Services
                </div>
                <div class="cardContainer">
                    <div class="card">
                        <div class="cardContent">
                            <img src="./icons/hiring.svg" alt="Hiring">
                            <p>Hire</p>
                            <a href="services.html">Know more</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="cardContent">
                            <img src="icons/approved.svg" alt="Equity">
                            <p>Get Hired</p>
                            <a href="services.html">Know more</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="cardContent">
                            <img src="icons/hiring.svg" alt="Equity">
                            <p>Fire</p>
                            <a href="services.html">Know more</a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="cardContent">
                            <img src="icons/approved.svg" alt="Equity">
                            <p>Get Fired</p>
                            <a href="services.html">Know more</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal login-register" id="modal">
            <form class="form" id="modalForm" action="login.php" onSubmit="return validateRegister()" method="POST" name="registerForm">
                <input type="text" name="username" id="username" placeholder="Username" onkeyup="checkUsername(this.value)" required>
                <span id="usernameSpan" style="margin-top: -5px; margin-bottom: 10px;"></span>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <input type="password" name="re-password" id="re-password" placeholder="Re-enter Password" required>
                <input id="register" name="register" type="submit" value="Register">
                <span><?php echo $error; ?></span>
                <p id="prompt">Already have an account? <span onclick='openLogin()'>Login<span></p>
                <p id="closeModal" onclick="closeModal()">Close</p>
            </form>
        </div>
    </div>
</body>
</html>

<script>
    const validateRegister = () => {
        if (available) {
            if (document.getElementById("username").required) {
                const registerForm = document.forms["registerForm"].getElementsByTagName("input")

                if (registerForm['username'].value.length < 4) {
                    alert("Username should atleast have 4 characters!")
                    registerForm['username'].focus()
                    return false
                }
                else if (registerForm['password'].value.length < 8) {
                    alert("Password should atleast be 8 characters long!")
                    registerForm['password'].focus()
                    return false
                }
                else if (registerForm['password'].value !== registerForm['re-password'].value) {
                    alert("Retype the password carefully!")
                    registerForm['re-password'].focus()
                    return false
                }
                else {
                    return true
                }
            } else {
                return true
            }
        } else {
            alert("Username is already taken, try another..")
            registerForm['username'].focus()
            return false
        }
    }
</script>


<script>
    let available = 1
    const checkUsername = username => {
        const usernameSpan = document.getElementById("usernameSpan")
        if(username.length < 4){
            usernameSpan.innerHTML = ""
        } else {
            const xhr = new XMLHttpRequest()
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    usernameSpan.innerHTML = this.responseText
                    if (this.responseText == "available") {
                        usernameSpan.innerHTML = "Username available"
                        usernameSpan.style.color = "green"
                        available = 1
                    } else {
                        usernameSpan.innerHTML = "Username unavailable"
                        usernameSpan.style.color = "red"
                        available = 0
                    }
                }
            }

            xhr.open("GET", "availability.php?username="+username, true)
            xhr.send()
        }
    }
</script>

<script>
    const openLogin = () => {
        event.preventDefault()
        const username = document.getElementById("username")
        const rePass = document.getElementById("re-password")
        username.required = false;
        rePass.required = false;
        rePass.style.cssText = "height: 0; padding: 0; margin: 0; border: none;"
        username.style.cssText = "height: 0; padding: 0; margin: 0; border: none;"
        const button = document.getElementById('register')
        button.id = 'login'
        button.name = 'login'
        button.value = 'Login'
        document.getElementById('prompt').innerHTML = "Don't have an account? <span onclick='openRegister()'>Create One.<span>"

    }

    const openRegister = () => {
        event.preventDefault();
        const username = document.getElementById("username")
        const rePass = document.getElementById("re-password")
        username.required = true;
        rePass.required = true;
        rePass.style.cssText = "height: inital; padding: inital; margin: inital; border: inital;"
        username.style.cssText = "height: inital; padding: inital; margin: inital; border: inital;"
        const button = document.getElementById('login')
        button.id = 'register'
        button.name = 'register'
        button.value = 'Register'
        document.getElementById('prompt').innerHTML = "Already have an account? <span onclick='openLogin()'>Login<span>"
    }
</script>


<script>

    const modal = document.getElementById("modal")
    const openModal = () => modal.style.display = "flex"
    const closeModal = () => modal.style.display = "none"

    window.addEventListener("click", triggerCloseModal = () => (event.target.id == 'modal') ? closeModal() : '')

</script>