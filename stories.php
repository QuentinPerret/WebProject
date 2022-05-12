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
        
        <div class="card mb-3" style="margin-right: 50px;">
                <h3 class="card-header"><?= $story['sto_title']?></h3>
                <div class="card-body">
                    <h5 class="card-title"><?= $chapter['ch_title']?></h5>
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
                    2 days ago
                </div>
                </div>
        </div>
        <div class="container d-flex justify-content-center border" style="margin-top: 100px;">

<form id="statistics" class="w-50 d-flex mx-auto justify-content-center" style="margin-top: 30px;">
<fieldset <?php if(!isUserConnected()){ ?>disabled <?php } ?>>
    <legend>Select the story you want</legend>
    <div class="mb-3">
    <label for="disabledSelect" class="form-label">Stat</label>
    <select id="disabledSelect" class="form-select">
        <option><?php echo($_SESSION['story_id']) ?></option>
    </select>
    </div>
    <div class="mb-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="disabledFieldsetCheck" disabled>
        <label class="form-check-label" for="disabledFieldsetCheck">
        Can't check this
        </label>
    </div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</fieldset>
</form>
<div class="container mt-5 d-flex justify-content-center" style="margin-bottom: 30px;">
    <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="image"> <img src="Images/statistics.png" class="rounded" width="155"> </div>
                <div class="ml-3 w-100">
                    <h4 class="mb-0 mt-0"><?php echo($_SESSION['login']); ?>'s stat</h4> <span></span>
                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                        <div class="d-flex flex-column"> <span class="articles">Games played</span> <span class="number1">100</span> </div>
                        <div class="d-flex flex-column"> <span class="followers">Games won</span> <span class="number2">20</span> </div>
                        <div class="d-flex flex-column"> <span class="rating">Deaths</span> <span class="number3">2</span> </div>
                    </div>
                    <div class="button mt-2 d-flex flex-row align-items-center"> <button class="btn btn-sm btn-outline-primary w-100">Fight</button> <button class="btn btn-sm btn-primary w-100 ml-2">Heal</button> </div>
                </div>
            </div>
        </div>
</div>
</div>

        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>