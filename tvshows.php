<?php
include_once('db.php');
include_once('header.php');

$stmt = $conn->prepare("SELECT id, title, age_restriction, duration FROM info WHERE kind = 'tv'");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(!empty($results)){
?>
<section id="top_movies" class="clearfix">
    <div class="wrapper">
        <header class="clearfix">
            <h2>All TV Shows</h2>
        </header>
        <div class="row">
            <?php
            for ($i=count($results)-1; $i >= 0; --$i) {
                $cover = 'images/cover_'.str_replace('.', '', str_replace(':','', strtolower(str_replace(' ', '_', $results[$i]['title'])))).'.jpg';
                ?>
            <div class="post">
                <a href="index.php?id=<?php echo $results[$i]['id']; ?>"><img src="<?php echo $cover; ?>" alt="<?php echo $results[$i]['title'] ?>"></a>
                <h3 class="title"><?php echo $results[$i]['title']; ?></h3>
                <div class="post_info">
                    <?php echo 'PG'.$results[$i]['age_restriction'].' | '. $results[$i]['duration'].' min'; ?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php }

include_once('footer.php');
?>
