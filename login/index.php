<?php
    require 'db.php';
    session_start();

    if (isset($_SESSION['logged_in']) == 1){
        header("location: profile.php");
    }

    if (isset($_POST['login']) && $_POST['email'] != "" && $_POST['password'] != ""){
        require 'login.php';
    } elseif (isset($_POST['register']) && $_POST['firstname'] != "" && $_POST['lastname'] != "" && $_POST['remail'] != "" && $_POST['rpassword'] != ""){
        require 'register.php';
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>MovieRental - Login/Sign Up</title>
    <?php include 'css/css.html'; ?>
    <script src="js/validation.js" type="text/javascript"></script>
    <script src="js/showpass.js" type="text/javascript"></script>
    <script src="js/passmeter.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <ul class="tab-group">
            <li class="tab"><a href="#signup">Sign Up</a></li>
            <li class="tab active"><a href="#login">Log In</a></li>
        </ul>
        <div class="tab-content">
            <div id="login">
                <h1>Welcome Back!</h1>
                <form id="loginform" name="loginform" onsubmit="return login_validation();" method="post" autocomplete="off">
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="text" autocomplete="off" name="email" id="email"/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" autocomplete="off" name="password" id="password"/>
                    </div>
                    <a class="showpass" onclick="toggle_password('password');" id="showpass" style="color: #1ab188; margin-left: 10px; cursor: pointer;">Show Password</a>
                    <span id="login_message"></span>
                    <button class="button button-block" name="login" id="login"/>Log In</button>
                </form>
                <a href="../index.php"><button name="home" class="button button-block">Home Page</button></a>
            </div>
            <div id="signup">
                <h1>Sign Up for Free</h1>
                <form id="registerform" name="registerform" onsubmit="return signup_validation();" method="post" autocomplete="off">
                    <div class="top-row">
                        <div class="field-wrap">
                            <label>
                                First Name<span class="req">*</span>
                            </label>
                            <input type="text" autocomplete="off" name='firstname' id='firstname'/>
                        </div>
                        <div class="field-wrap">
                            <label>
                                Last Name<span class="req">*</span>
                            </label>
                            <input type="text" autocomplete="off" name='lastname' id='lastname'/>
                        </div>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Email Address<span class="req">*</span>
                        </label>
                        <input type="text" autocomplete="off" name='remail' id='remail'/>
                    </div>
                    <div class="field-wrap">
                        <label>
                            Password<span class="req">*</span>
                        </label>
                        <input type="password" autocomplete="off" name='rpassword' id='rpassword'/>
                    </div>
                    <span id="signup_message"></span>
                    <button type="submit" class="button button-block" name="register" id="register"/>Register</button>
                </form>
                <a href="../index.php"><button name="home" class="button button-block">Home Page</button></a>
            </div>
        </div>
    </div>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <footer id="main_footer">
        <p class="logo">Movie<span>&amp;</span>Rental</p>
        <p class="copyright">&copy;2019 MovieRental All Rights Reserved</p>
        <div class="links">
            <a href="#"> Terms Of Service</a>
            <a href="index.php?banner=policy">Privacy Policy</a>
        </div>
    </footer>
</body>
</html>
