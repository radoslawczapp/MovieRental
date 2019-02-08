<?php
$banner = isset($_GET['title']) ? $_GET['title'] : 'null';
echo $banner;
 ?>

<section id="banner" class="clearfix" style="background: url(images/posters/deadpool_poster.png);background-size: cover;">
    <div id="banner_content_wrapper">
            <video id="video" controls>
                <source src="video/deadpool.mp4" type="video/mp4">
            </video>
        <div id="poster">
            <img src="images/movies/cover_deadpool.jpg" alt="Deadpool Movie Poster" class="featured_image">
            <img onclick="show_video('video');"  src="images/play_button.png" alt="Play Trailer" class="play_button">
        </div>
        <div id="content">
            <h2 class="title">Deadpool</h2>
            <div class="ratings">
                <i class="fa fa-star"></i>
                <i class="inactive" id="rate">8,0</i><i class="inactive">/10</i>
            </div>
            <p class="description">A wisecracking mercenary gets experimented on and becomes immortal but ugly, and sets out to track the man who ruined his looks.</p>
            <p class="info">R <span>|</span> 108 min <span>|</span> Action <span>|</span> 12 February 2016</p>
        </div>
    </div>
</section>
