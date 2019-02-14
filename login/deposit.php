<?php
    require 'db.php';
    session_start();

    if ($_SESSION['logged_in'] !=1 ){
        $_SESSION['message']="<div class='info-alert'>You must log in before changing your password!</div>";
        header("location: error.php");
    }

    if (isset($_POST['amount']) && $_POST['amount'] != "" && $_POST['current_password'] != ""){
        $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        $user = $result->fetch_assoc();

        if (password_verify($_POST['current_password'], $user['password'])){
            $new_account = $_SESSION['account'] + $_POST['amount'];
            $sql = "UPDATE users SET account ='$new_account' WHERE email='$email'";

            if ($mysqli->query($sql)){
                $_SESSION['message'] = "<div class='info-success'>You have just made a deposit into your account!</div>";
                header("location: success.php");
                $_SESSION['account'] = $new_account;
            }
        }else{
            $_SESSION['message'] = "<div class='info-alert'>Please enter correct amount!</div>";
            header("Location: error.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Deposit Your Account</title>
    <?php include 'css/css.html'; ?>
    <script src="js/validation.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <h1>Deposit Your Account</h1>
        <form id="changeform" name="changeform" action="deposit.php" method="post">
            <div class="field-wrap">
                <label>
                    Amount<span class="req">*</span>
                </label>
                <input type="text" autocomplete="off" name="amount" id="new_password"/>
            </div>
            <div class="field-wrap">
                <label>
                    Password<span class="req">*</span>
                </label>
                <input type="password" autocomplete="off" name="current_password" id="current_password"/>
            </div>
            <span id="change_message"></span>
            <button class="button button-block" name="deposit" id="change"/>Deposit</button>
        </form>
        <a href="http://localhost/MovieRental/login/"><button class="button button-block"/>Home</button></a>
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
