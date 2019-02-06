<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/3.0.3/normalize.min.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&amp;subset=latin-ext" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="css/styles.css" type="text/css">
    <script src="js/main.js"></script>
    <title>MovieRental</title>
</head>
<body>
    <header id="top_header" class="clearfix">
        <div class="wrapper">
            <h1 class="logo"><a href="index.html">Movie<span>&amp;</span>Rental</a></h1>

            <a href="#" class="menu"><i class="fa fa-bars"></i></a>
            <nav id="main_nav">
                <a href="#">Movies</a>
                <a href="#">TV Shows</a>
                <a href="#">Celebs &amp; Photos</a>
                <a href="login.html">Login</a>
                <a href="#">Register</a>
            </nav>
        </div>
    </header>
    <?php
    if(isset($_GET['banner']) && $_GET['banner'] == 'policy'){
        $banner = include_once('policy.html');
    } else{
        $banner = include_once('banner.php');
    }
    echo $banner;
            ?>
    <section id="top_movies" class="clearfix">
        <div class="wrapper">
            <header class="clearfix">
                <h2>Popular Movies</h2>
                <p class="view_more">View All Movies</p>
            </header>

            <div class="row">


        <?php include_once('array.php');
        for ($i=1; $i <= count($table); $i++) {
            $cover = 'images/movies/'. $table[$i]['cover'];
            ?>
        <div class="post">
            <img src="<?php echo $cover; ?>" alt="<?php echo $table[$i]['title'] ?>">
            <h3 class="title"><?php echo $table[$i]['title']; ?></h3>
            <div class="post_info">
                <?php echo $table[$i]['age_restriction'].' | '. $table[$i]['duration'].' min'; ?>
            </div>
        </div>
        <?php } ?>

            </div>
        </div>
    </section>
    <section id="top_shows" class="clearfix">
        <div class="wrapper">
            <header class="clearfix">
                <h2>Popular TV Shows</h2>
                <p class="view_more">View All TV Shows</p>
            </header>

            <div class="row">
                <div class="post">
                    <img src="images/tv_shows/game_of_thrones.jpg" alt="Game of Thrones">
                    <h3 class="title">Game of Thrones</h3>
                    <div class="post_info">PG13 | 109 min</div>
                </div>

                <div class="post">
                    <img src="images/tv_shows/dr_house.jpg" alt="Dr.House">
                    <h3 class="title">Dr.House</h3>
                    <div class="post_info">PG13 | 109 min</div>
                </div>

                <div class="post">
                    <img src="images/tv_shows/breaking_bad.jpg" alt="Breaking Bad">
                    <h3 class="title">Breaking Bad</h3>
                    <div class="post_info">PG13 | 109 min</div>
                </div>

                <div class="post">
                    <img src="images/tv_shows/boardwalk_empire.jpg" alt="Boardwalk Empire">
                    <h3 class="title">Boardwalk Empire</h3>
                    <div class="post_info">PG13 | 109 min</div>
                </div>

                <div class="post">
                    <img src="images/tv_shows/house_of_cards.jpg" alt="House of Cards">
                    <h3 class="title">House of Cards</h3>
                    <div class="post_info">PG13 | 109 min</div>
                </div>

                <div class="post">
                    <img src="images/tv_shows/mr_robot.jpg" alt="Mr. Robot">
                    <h3 class="title">Mr. Robot</h3>
                    <div class="post_info">PG13 | 109 min</div>
                </div>
            </div>
        </div>
    </section>
<?php include_once('newsletter.php'); ?>
    <footer id="main_footer">
        <p class="logo">Movie<span>&amp;</span>Rental</p>
        <p class="copyright">&copy;2019 MovieRental All Rights Reserved</p>
        <div class="links">
            <a href="#"> Terms Of Service</a>
            <a href="base.php?banner=policy">Privacy Policy</a>
        </div>
    </footer>
</body>

</html>
