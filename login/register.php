<?php
    $_SESSION['email'] = $_POST['remail'];
    $_SESSION['first_name'] = $_POST['firstname'];
    $_SESSION['last_name'] = $_POST['lastname'];

    $first_name = $mysqli->escape_string($_POST['firstname']);
    $last_name = $mysqli->escape_string($_POST['lastname']);
    $email = $mysqli->escape_string($_POST['remail']);
    $password = $mysqli->escape_string(password_hash($_POST['rpassword'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string(md5(rand(0,1000)));

    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

    if ($result->num_rows > 0)
    {
        $_SESSION['message'] = '<div class="info-alert">User with this email already exists!</div>';
        header("location: error.php");
    }
    else
    {
        $sql = "INSERT INTO users (first_name, last_name, email, password, hash)"
            ."VALUES ('$first_name','$last_name','$email','$password', '$hash')";

        if ($mysqli->query($sql))
        {
            $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");
            $user = $result->fetch_assoc();

            $id = $user['user_id'];

            $_SESSION['logged_in'] = true;
        }
        else
        {
            $_SESSION['message'] = '<div class="info-alert">Registration failed!</div>';
            header("location: error.php");
        }
    }
?>
