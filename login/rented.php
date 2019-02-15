<?php
    require 'db.php';
    session_start();

    if ($_SESSION['logged_in'] != 1 )
    {
        $_SESSION['message'] = "<div class='info-alert'>You must log in before viewing admin page!</div>";
        header("location: error.php");
    } else{
        $email = $mysqli->escape_string($_SESSION['email']);
        $result = $mysqli->query("SELECT user_id, permission, account FROM users WHERE email='$email'");
        $user = $result->fetch_assoc();

        $permission = $user['permission'];
        $user_id    = $user['user_id'];
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Currently rented</title>
    <?php include 'css/css.html'; ?>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <h1>Currently rented</h1>
        <table style="width: 100%;">
            <th style="border-bottom: 2px solid #bcbcbc;">#</th>
            <th style="border-bottom: 2px solid #bcbcbc;">Title</th>
            <th style="border-bottom: 2px solid #bcbcbc;">Price</th>
            <th colspan="2" style="border-bottom: 2px solid #bcbcbc;">Action</th>
            <?php
            $stmt = $mysqli->query("SELECT info_id FROM rented WHERE user_id = $user_id");
            $sum = array();
                for($i = 1; $i <= $row = $stmt->fetch_assoc(); $i++){
                    $id = $row['info_id'];
                    $sth = $mysqli->query("SELECT title, price FROM info WHERE id = $id");
                    $info = $sth->fetch_assoc();
                    ?>
                    <tr>
                        <td><?= $i ?></td>
                        <td><?= $info['title'] ?></td>
                        <td>$<?php echo $info['price'];
                            array_push($sum, $info['price']);;
                         ?></td>
                         <td><?php echo '<a href="delete_rent.php?id='.$id.'" style="color: #56e2bd;">Delete</a>'; ?></td>
                         <td><?php echo '<a href="watch.php?id='.$id.'" style="color: #56e2bd;">Watch</a>'; ?></td>
                    </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td style="text-align: right; color: #faed27; font-size: 20px;">SUM:&nbsp;&nbsp;</td>
                <td style="color:#faed27; font-size: 20px;">$
                    <?php
                    $_SESSION['total'] = array_sum($sum);
                    echo $_SESSION['total'];
                    ?></td>
            </tr>
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
