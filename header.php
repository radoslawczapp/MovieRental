<?php
session_start();
require 'login/db.php';
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin-ext" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,300,600' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <script src="js/main.js"></script>
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>MovieRental</title>
</head>
<body>
    <header id="top_header" class="clearfix">
        <div class="wrapper">
            <h1 class="logo"><a href="index.php">Movie<span>&amp;</span>Rental</a></h1>
            <a href="#" class="menu"><i class="fa fa-bars"></i></a>
            <nav id="main_nav">
                <a href="movies.php">Movies</a>
                <a href="tvshows.php">TV Shows</a>
                <a href="#">Celebs &amp; Photos</a>
                <a href="http://localhost/MovieRental/login/">
                <?php
                if(isset($_SESSION['logged_in']) AND $_SESSION['logged_in'] == 1){
                    echo "Profile";
                } else{
                    echo "Login/Sign Up";
                } ?>
                </a>
            </nav>
        </div>
    </header>
