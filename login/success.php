<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <?php include 'css/css.html'; ?>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
<div class="form">
    <h1><?= 'Success'; ?></h1>
    <p>
    <?php
        if (isset($_SESSION['message']) AND !empty($_SESSION['message']))
        {
            echo $_SESSION['message'];
        }
    ?>
    </p>
    <a href="http://localhost/MovieRental/login/"><button class="button button-block"/>Home</button></a>
</div>
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
