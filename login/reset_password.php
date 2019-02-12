<?php
    require 'db.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if ($_POST['newpassword'] == $_POST['confirmpassword'])
        {
            $new_password = password_hash($_POST['newpassword'], PASSWORD_BCRYPT);
            $email = $mysqli->escape_string($_POST['email']);
            $hash = $mysqli->escape_string($_POST['hash']);
        
            $sql = "UPDATE users SET password='$new_password', hash='$hash' WHERE email='$email'";

            if ($mysqli->query($sql))
            {
                $_SESSION['message'] = "<div class='info-success'>Your password has been reset successfully!</div>";
                header("location: success.php");    
            }
        }
        else
        {
            $_SESSION['message'] = "<div class='info-alert'>Two passwords you entered don't match, try again!</div>";
            header("location: error.php");    
        }
    }
?>