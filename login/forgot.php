<?php
    require 'db.php';
    session_start();

    if (isset($_POST['reset']) && $_POST['email'] != "")
    {
        $email = $mysqli->escape_string($_POST['email']);
        $result = $mysqli->query("SELECT * FROM users WHERE email='$email'");

        if ($result->num_rows == 0)
        {
            $_SESSION['message'] = "<div class='info-alert'>User with that email doesn't exist!</div>";
            header("location: error.php");
        }
        else
        {
            $user = $result->fetch_assoc();
            $email = $user['email'];
            $hash = $user['hash'];
            $first_name = $user['first_name'];

            $_SESSION['message'] = "<p>Please check your email <span>$email</span>"
            ." for a confirmation link to complete your password reset!</p>";

            $to      = $email;
            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            $subject = 'Password Reset Link';
            $message =  '<html>
                        <head>
                            <title>TEST</title>
                            <style type="text/css">
                                body
                                {
                                    background: #c1bdba;
                                    font-family: "Titillium Web", sans-serif;
                                }
                                a
                                {
                                    text-decoration: none;
                                    color: #1ab188;
                                    -webkit-transition: .5s ease;
                                    transition: .5s ease;
                                }
                                a:hover
                                {
                                    color: #179b77;
                                }
                                h1
                                {
                                    font-size: 18px;
                                    text-align: center;
                                    color: #ffffff;
                                    font-weight: 300;
                                }
                                h2
                                {
                                    text-align: center;
                                    color: #1ab188;
                                    font-weight: 1000;
                                }
                                span
                                {
                                    color: #1ab188;
                                    font-weight: bold;
                                }
                                p
                                {
                                    text-align: center;
                                    color: #ffffff;
                                    margin: 0px 0px 50px 0px;
                                    padding-top: 2px;
                                }
                                .form
                                {
                                    background: rgba(19, 35, 47, 0.9);
                                    padding: 40px;
                                    max-width: 600px;
                                    margin: 40px auto;
                                    border-radius: 4px;
                                    box-shadow: 0 4px 10px 4px rgba(19, 35, 47, 0.3);
                                }
                                .button
                                {
                                    font-family: "Titillium Web", sans-serif;
                                    border: 0;
                                    outline: none;
                                    border-radius: 0;
                                    padding: 15px 0;
                                    margin-top: 30px;
                                    font-size: 2rem;
                                    font-weight: 600;
                                    text-transform: uppercase;
                                    letter-spacing: .1em;
                                    background: #1ab188;
                                    color: #ffffff;
                                    -webkit-transition: all 0.5s ease;
                                    transition: all 0.5s ease;
                                    -webkit-appearance: none;
                                }
                                .button:hover, .button:focus
                                {
                                    background: #179b77;
                                }
                                .button-block
                                {
                                    display: block;
                                    width: 100%;
                                }
                            </style>
                        </head>
                        <body>
                            <div class="form">
                                <h1 style="font-size: 20px; text-align: left;">Hello <a>'.$first_name.'</a></h1>,<br>

                                <h1>Forgot Password?<br>

                                Click the button below to reset your password:<br></h1>

                                <a href="http://localhost/MovieRental/login/reset.php?email='.$email.'&hash='.$hash.'"><button class="button button-block">Reset Password</button></a>
                            </div>
                        </body>
                        </html>';
            mail( $to, $subject, $message, $headers );
            header("location: success.php");
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Your Password</title>
    <?php include 'css/css.html'; ?>
    <script src="js/validation.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="../images/favicon.ico">
</head>
<body>
    <div class="form">
        <h1>Reset Your Password</h1>
        <form id="emailform" name="emailform" action="forgot.php" onsubmit="return email_validation();" method="post">
            <div class="field-wrap">
                <label>
                    Email Address<span class="req">*</span>
                </label>
                <input type="text" autocomplete="off" name="email" id="email"/>
            </div>
            <span id="reset_message"></span>
            <button class="button button-block" name="reset" id="reset"/>Reset</button>
        </form>
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
