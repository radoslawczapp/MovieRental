<?php
include_once('array.php');

include_once('db.php');
try{
    $stmt = $conn->prepare("SELECT title, age_restriction, duration FROM info WHERE kind = 'movie'");
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

} catch(PDOException $e){
    echo "Error: " . $e->getMessage();
}
$conn = null;


?>
<section id="top_movies" class="clearfix">
    <div class="wrapper">
        <header class="clearfix">
            <h2>Latest Movies</h2>
            <p class="view_more">View All Movies</p>
        </header>
        <div class="row">
            <?php
            for ($i=count($results)-1; $i > count($results) - 7; --$i) {
                $cover = 'images/movies/cover_'.str_replace(':','', strtolower(str_replace(' ', '_', $results[$i]['title']))).'.jpg';

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
