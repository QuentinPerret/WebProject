<?php
session_start();
?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container-fluid">
        <?php require_once "includes/header.php"; ?>
        <div class="container justify-content-center" style="margin-top: 100px; margin-bottom: 100px;">
            <div class="container d-flex justify-content-center border">
                <legend>Your Stories :</legend>
                <?php 
                require_once 'includes/functions.php';
                $sto = getAllStoryForWriter($_SESSION['login']);
                foreach($sto as $key=> $story){
                    ?> <a href="storyCreation.php?stoId=<?=$story['sto_id']?>"><?=$story['sto_title']?></a>
                <?php } ?>
            </div>
            <div class="container d-flex justify-content-center border">
                <legend>Reprendre une histoire :</legend>
                <?php 
                require_once 'includes/functions.php';
                $games = getAllGameForUser($_SESSION['login']);
                foreach($games as $key=> $game){
                    $idCh = $game['game_ch'];
                    $chapter = getCh($idCh);
                    $story = getStory($chapter['ch_story_id']);
                    ?> <a href="stories.php?chId=<?=$game['game_ch']?>"><?=$story['sto_title']?>: <?=$chapter['ch_title']?></a>
                <?php } ?>
            </div>
        </div>
</div>

        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>