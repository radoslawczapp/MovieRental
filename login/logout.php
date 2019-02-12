<?php
    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>
    <?php include 'css/css.html'; ?>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <?php
          	header("location: http://localhost/MovieRental/index.php");
        ?>
    </div>
</body>
</html>
