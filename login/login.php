<?php
    $email = $mysqli->escape_string($_POST['email']);
    $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

    if ($result->num_rows == 0){
        $_SESSION['message'] = "<div class='info-alert'>User with that email doesn't exist!</div>";
        header("location: error.php");
    } else{
        $user = $result->fetch_assoc();

        if (password_verify($_POST['password'], $user['password'])){
            $_SESSION['email'] = $user['email'];
            $_SESSION['first_name'] = $user['first_name'];
            $_SESSION['last_name'] = $user['last_name'];
            $_SESSION['permission'] = $user['permission'];
            $_SESSION['logged_in'] = true;
            $_SESSION['account'] = $user['account'];
            header("location: ../index.php");
        }
    }
?>
