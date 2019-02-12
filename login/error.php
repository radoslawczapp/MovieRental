<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="../images/favicon.ico">
    <title>Error</title>
    <?php include 'css/css.html'; ?>
    <script>
        function goBack()
        {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="form">
        <h1>Error</h1>
        <p>
        <?php
            if (isset($_SESSION['message']) AND !empty($_SESSION['message']))
            {
                echo $_SESSION['message'];
            }
        ?>
        </p>
        <button class="button button-block" onclick="goBack();"/>Back</button>
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
