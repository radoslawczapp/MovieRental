<?php
    require 'db.php';
    session_start();

    if (isset($_SESSION['logged_in']) != 1)
    {
        header("location: /login/");
    }

    else if (isset($_GET['id']) && !empty($_GET['id']))
    {
        $id = $_GET['id'];

        $result = $mysqli->query("SELECT * FROM users WHERE user_id='$id'");
        $user = $result->fetch_assoc();

        $first_name = $user['first_name'];
        $last_name = $user['last_name'];

        if (isset($_POST['yes']))
        {
            if ($result->num_rows == 0)
            {
                $_SESSION['message'] = "<div class='info-alert'>User has already been deleted!</div>";
                header("location: error.php");
            }
            else
            {
                $sql = "DELETE FROM users WHERE user_id='$id'";

                if ($mysqli->query($sql))
                {
                    $_SESSION['message'] = "<div class='info-success'>User deleted successfully</div>";
                    header("Location: success.php");
                }
                else
                {
                    $_SESSION['message'] = "<div class='info-success'>User not deleted!</div>";
                    header("Location: error.php");
                }
            }
        }
        else if (isset($_POST['no']))
        {
            header("location: admin.php");
        }
    }
    else
    {
        $_SESSION['message'] = "<div class='info-alert'>Invalid parameters provided for account verification!</div>";
        header("location: error.php");
    }
?>

<!DOCTYPE html>
<html >
<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
    <?php include 'css/css.html'; ?>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <h1>Confirm Delete User</h1>
        <form method="post">
            <h2>Are you sure you want to delete <a><?php echo $first_name." ".$last_name; ?></a></h2>
            <a href="delete.php?id=<?php echo $_GET['id'].$_GET['hash']; ?>"><button class="button button-block" id="yes" name="yes">Yes</button></a>
            <a href="admin.php"><button class="button button-block" id="no" name="no">No</button></a>
        </form>
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
