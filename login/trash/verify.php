<!-- <?php 
    require 'db.php';
    session_start();

    if(isset($_GET['id']) && !empty($_GET['id']) AND isset($_GET['hash']) && !empty($_GET['hash']))
    {
        $id = $mysqli->escape_string($_GET['id']);
        $hash = $mysqli->escape_string($_GET['hash']);

        $result = $mysqli->query("SELECT * FROM users WHERE user_id='$id' AND hash='$hash' AND active='0'");

        if ($result->num_rows == 0)
        {
            $_SESSION['message'] = "<div class='info-alert'>Account has already been activated or the URL is invalid!</div>";
            header("location: error.php");
        }
        else
        {
            $_SESSION['message'] = "<div class='info-success'>Your account has been activated!</div>";

            $mysqli->query("UPDATE users SET active='1' WHERE user_id='$id'") or die($mysqli->error);
            $_SESSION['active'] = 1;
            header("location: success.php");
        }
    }
    else
    {
        $_SESSION['message'] = "<div class='info-alert'>Invalid parameters provided for account verification!</div>";
        header("location: error.php");
    }
?> -->
