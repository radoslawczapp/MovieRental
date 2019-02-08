<?php include_once('array.php');

 ?>
<section id="top_shows" class="clearfix">
    <div class="wrapper">
        <header class="clearfix">
            <h2>Latest TV Shows</h2>
            <p class="view_more">View All TV Shows</p>
        </header>
        <div class="row">
            <?php
            for ($i=1; $i <= 6; $i++) {
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
