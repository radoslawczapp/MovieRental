<?php
include_once('db.php');
include_once('header.php');

if(isset($_GET['id'])){
    // Display movie info
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM info WHERE id = $id");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $poster     = 'images/poster_'.str_replace('.', '', str_replace(':','', strtolower(str_replace(' ', '_', $results[0]['title'])))).'.png';
    $video      = 'video/'.str_replace('.', '', str_replace(':','', strtolower(str_replace(' ', '_', $results[0]['title'])))).'.mp4';
    $cover      = 'images/cover_'.str_replace('.', '', str_replace(':','', strtolower(str_replace(' ', '_', $results[0]['title'])))).'.jpg';
    $title      = $results[0]['title'];
    $rate       = $results[0]['rating'];
    $review     = $results[0]['review'];
    $age        = $results[0]['age_restriction'];
    $duration   = $results[0]['duration'];
    $category   = $results[0]['category_id'];
    $date       = $results[0]['date'];

    $sth = $conn->prepare("SELECT category_name FROM categories WHERE category_id = $category");
    $sth->execute();
    $categories = $sth->fetchAll(PDO::FETCH_ASSOC);
    $category_name = ucfirst($categories[0]['category_name']);
} ?>

    <!-- <style>#welcome{color: #ffffff;}.logowelcome{color: #ffffff;text-transform: uppercase;font-weight: 700;}#amp{color: #1ab188;font-weight: 300;}</style>
    <section id="banner" class="clearfix" style="background: url(images/posters/poster_all_movies.png);background-size: cover;">
        <div id="banner_content_wrapper">
            <div id="content">
                <h1 id="welcome">Welcome to <span class="logowelcome">Movie</span><span id="amp">&amp;</span><span class="logowelcome">Rental</span></h1>
            </div>
        </div>
    </section> -->

<section id="banner" class="clearfix" style="background: url(<?php echo $poster; ?>);background-size: cover;">
    <div id="banner_content_wrapper">
            <video id="video" controls>
                <source src="<?php echo $video; ?>" type="video/mp4">
            </video>
        <div id="poster">
            <img src="<?php echo $cover; ?>" alt="<?php echo $title; ?> Movie Poster" class="featured_image">
            <img onclick="show_video('video');"  src="images/play_button.png" alt="Play Trailer" class="play_button">
        </div>
        <div id="content">
            <h2 class="title"><?php echo $title; ?></h2>
            <div class="ratings">
                <i class="fa fa-star"></i>
                <i class="inactive" id="rate"><?php echo $rate; ?></i><i class="inactive">/10</i>
            </div>
            <p class="description"><?php echo $review; ?></p>
            <p class="info">PG<?php echo $age; ?> <span>|</span> <?php echo $duration; ?> min <span>|</span> <?php echo $category_name; ?> <span>|</span> <?php echo $date; ?></p>
        </div>
    </div>
</section>
<?php


include_once('top_movies.php');
include_once('top_shows.php');
// include_once('newsletter.php');
include_once('footer.php');

?>
