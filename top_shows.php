<?php
include_once('db.php');

$stmt = $conn->prepare("SELECT title, age_restriction, duration FROM info WHERE kind = 'tv'");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!empty($results)){
?>
<section id="top_movies" class="clearfix">
    <div class="wrapper">
        <header class="clearfix">
            <h2>Latest TV Shows</h2>
            <a href="tvshows.php"><p class="view_more">View All TV Shows</p></a>
        </header>
        <div class="row">
            <?php
            for ($i=count($results)-1; $i > count($results) - 7; --$i) {
                $cover = 'images/tv_shows/cover_'.str_replace('.', '', str_replace(':','', strtolower(str_replace(' ', '_', $results[$i]['title'])))).'.jpg';
                ?>
            <div class="post">
                <img src="<?php echo $cover; ?>" alt="<?php echo $results[$i]['title'] ?>">
                <h3 class="title"><?php echo $results[$i]['title']; ?></h3>
                <div class="post_info">
                    <?php echo 'PG'.$results[$i]['age_restriction'].' | '. $results[$i]['duration'].' min'; ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php } ?>
