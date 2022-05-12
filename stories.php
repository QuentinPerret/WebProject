<?php
session_start();
require_once 'includes/functions.php';
$chId = $_GET['chId'];
$chapter = getCh($chId);
$stoId = $chapter['ch_story_id'];
$story = getStory($stoId);
$links = getAllLink($chId);
?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>

<div class="container" style="margin: 200px; ">
        <div class="book " style="width:200px;">
            <span class="page turn"></span>
            <span class="page turn"></span>
            <span class="page turn"></span>
            <span class="page turn"></span>
            <span class="page turn"></span>
            <span class="page turn"></span>
            <span class="cover"></span>
            <span class="page"></span>
            <span class="cover turn"></span>
        </div>
        
        <div class="card mb-3" style="margin-right: 50px; font-size: 15px">
                <h3 class="card-header display-5"><strong><?= $story['sto_title']?></strong></h3>
                <div class="card-body">
                    <h5 class="card-title display-6"><?= $chapter['ch_title']?></h5>
                </div>
                
                <div class="card-body">
                    <p class="card-text"><?= $chapter['ch_story']?></p>
                </div>
                <ul class="list-group list-group-flush">
                </ul>
                <div class="card-body">
                    <?php foreach($links as $key=>$link){ 
                        $nextCh = getCh($link['link_next']);
                        ?>
                        <a href="stories.php?chId=<?=$nextCh['ch_id']?>" class="card-link"><?=$nextCh['ch_title']?></a>
                    <?php } ?>
                </div>
                <div class="card-footer text-muted">
                </div>
                </div>
        </div>
        


        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>