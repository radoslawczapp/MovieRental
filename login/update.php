<?php
    require 'db.php';
    session_start();

    if (isset($_SESSION['logged_in']) != 1)
    {
        header("Location: http://localhost/MovieRental/login/");
    }

    if (isset($_POST['update']) && $_POST['new_first_name'] != "" && $_POST['new_last_name'] != "" && $_POST['current_password'] != "")
    {
        $new_first_name = $mysqli->escape_string($_POST['new_first_name']);
        $new_last_name = $mysqli->escape_string($_POST['new_last_name']);
        $current_password = $mysqli->escape_string($_POST['current_password']);
        $email = $_SESSION['email'];

        $result = $mysqli->query("SELECT password FROM users WHERE email='$email'");

        $user = $result->fetch_assoc();
        $password = $user['password'];

        if (password_verify($_POST['current_password'], $user['password']))
        {
            $sql = ("UPDATE users SET first_name='$new_first_name', last_name='$new_last_name' WHERE email='$email'");

            if($mysqli->query($sql))
            {
                $_SESSION['message'] = "<div class='info-success'>Profile updated successfully</div>";
                header("Location: success.php");
            }
            else
            {
                $_SESSION['message'] = "<div class='info-alert'>Profile not updated!</div>";
                header("Location: error.php");
            }
        }
        else
        {
            $_SESSION['message'] = "<div class='info-alert'>Please enter correct current password!</div>";
            header("Location: error.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Update Profile</title>
    <?php include 'css/css.html'; ?>
    <script src="js/validation.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <h1>Update Profile!</h1>
        <div id="update profile">
            <form id="updateform" name="updateform" onsubmit="return update_validation();" method="post" autocomplete="off">
                <div class="field-wrap">
                    <label>
                        New First Name<span class="req">*</span>
                    </label>
                    <input type="text" autocomplete="off" name="new_first_name" id="new_first_name"/>
                </div>
                <div class="field-wrap">
                    <label>
                        New Last Name<span class="req">*</span>
                    </label>
                <input type="text" autocomplete="off" name="new_last_name" id="new_last_name"/>
                </div>
                <div class="field-wrap">
                    <label>
                        Current Password<span class="req">*</span>
                    </label>
                <input type="password" autocomplete="off" name='current_password' id='current_password'/>
                </div>
                <span id="update_message"></span>
                <button type="submit" class="button button-block" name="update" id="update"/>Update Profile</button>
            </form>
            <a href="http://localhost/MovieRental/login/"><button class="button button-block"/>Home</button></a>
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
