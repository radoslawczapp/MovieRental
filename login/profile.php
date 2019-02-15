<?php
    require 'db.php';
    session_start();

    if ($_SESSION['logged_in'] != 1){
        $_SESSION['message'] = "<div class='info-alert'>You must log in before viewing your profile page!</div>";
        header("location: error.php");
    } else{
        $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        $user = $result->fetch_assoc();

        $first_name     = $user['first_name'];
        $last_name      = $user['last_name'];
        $email          = $user['email'];
        $permission     = $user['permission'];
        $account        = $user['account'];
        $user_id        = $user['user_id'];


    }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Welcome <?= $first_name.' '.$last_name ?></title>
    <?php include 'css/css.html'; ?>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <h1>Welcome</h1>
        <h2><?= $first_name.' '.$last_name ?></h2>
        <p><?= $email ?></p>
        <?php 
            if($account >= 0){
            ?>
            <h2 style="color:#faed27;">Account balance:<span style="color: green;"> $<?= $account ?></span></h2><br />
        <?php } else{ ?>
            <h2 style="color:#faed27;">Account balance:<span style="color: red;"> $<?= $account ?></span></h2><br />
        <?php } ?>
            <p><a href="rented.php" class="currently">Currently Rented</a></p><br />

        <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
        <a href="update.php"><button class="button button-block" name="update"/>Update Profile</button></a>
        <a href="changepassword.php"><button class="button button-block" name="changepassword"/>Change Password</button></a>
        <?php
        if($permission == 'admin'){ ?>
            <a href="admin.php"><button class="button button-block" name="adminpage"/>Admin Page</button></a>
    <?php } ?>

    <a href="deposit.php"><button name="home" class="button button-block">Deposit</button></a>
    <a href="../index.php"><button name="home" class="button button-block">Home Page</button></a>
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
