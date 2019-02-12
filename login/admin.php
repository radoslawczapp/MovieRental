<?php
    require 'db.php';
    session_start();

    if ($_SESSION['logged_in'] != 1 )
    {
        $_SESSION['message'] = "<div class='info-alert'>You must log in before viewing admin page!</div>";
        header("location: error.php");
    } else{
        $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT permission FROM users WHERE email='$email'");
        $user = $result->fetch_assoc();

        $permission = $user['permission'];

        if ($permission != 'admin') {
            $_SESSION['message'] = "<div class='info-alert'>You do not have permission for viewing admin page!</div>";
            header("location: error.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <?php include 'css/css.html'; ?>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <h1>Admin Panel</h1>
        <h2>User's Info</h2>
        <table style="width: 100%;">
            <th style="border-bottom: 2px solid #bcbcbc;">User Id</th>
            <th style="border-bottom: 2px solid #bcbcbc;">First Name</th>
            <th style="border-bottom: 2px solid #bcbcbc;">Last Name</th>
            <th style="border-bottom: 2px solid #bcbcbc;">Email</th>
            <th style="border-bottom: 2px solid #bcbcbc;">Delete</th>
            <?php
                $result= $mysqli->query("SELECT * FROM users WHERE permission IS NULL") or die($mysqli->error());
                if ($permission == 'admin'){
                    while ($row = $result->fetch_assoc()){ ?>
                        <tr>
                            <td><?php echo $row['user_id']; ?></td>
                            <td><?php echo $row['first_name']; ?></td>
                            <td><?php echo $row['last_name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo '<a href="delete.php?id='.$row['user_id'].'" style="color: #56e2bd;">Delete</a>'; ?></td>
                            <br>
                        </tr>
            <?php }
                } ?>
        </table>
        <a href="logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
        <a href="http://localhost/MovieRental/login/"><button class="button button-block"/>Home</button></a>
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
