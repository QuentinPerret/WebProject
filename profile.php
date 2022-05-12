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

        </div>
</div>

        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>