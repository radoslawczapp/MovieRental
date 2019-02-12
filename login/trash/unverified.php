<!-- <?php
    require 'db.php';
    session_start();

    if (isset($_SESSION['logged_in']) != 1)
    {
        header("location: /login/");
    }
    else
    {
	    $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
        $user = $result->fetch_assoc();

        $first_name = $user['first_name'];
        $last_name = $user['last_name'];
        $email = $user['email'];
    }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Welcome <?= $first_name.' '.$last_name ?></title>
    <?php include 'css/css.html'; ?>
</head>
<body>
    <div class="form">
        <h1>Welcome</h1>
        <p>
  		  <?php
				if (isset($_SESSION['message']))
      			{
    			    echo $_SESSION['message'];
			    }
		    ?>
		    </p>
        <h2><?php echo $first_name.' '.$last_name; ?></h2>
        <p><?= $email ?></p>
        <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
        <a href="update.php"><button class="button button-block" name="update"/>Update Profile</button></a>
        <a href="changepassword.php"><button class="button button-block" name="changepassword"/>Change Password</button></a>
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
</html> -->
