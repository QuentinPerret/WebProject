<?php session_start();
require_once "includes/functions.php";
$chapter = getCh($_GET['idCh']);?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container-fluid">
        <?php require_once "includes/header.php"; ?>
            <div class="container d-flex justify-content-center" style="margin-top: 100px;">
                <div class="card mb-3" style="margin-right: 50px;">
                <h3 class="card-header">Titre du chapitre</h3>
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                </div>
                <img src="Images/writer.jpg" style="width: 400px; height: 400px; object-fit: cover;" class="d-block mx-auto" alt="writer">
                <div class="card-body">
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
                <div class="card-body">
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
                <div class="card-footer text-muted">
                    2 days ago
                </div>
                </div>
                <div class="card mb-5"style="margin-right: 50px;">
                <div class="card-body">
                    <h4 class="card-title">Chapter Creator</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Your chapter</h6>
                    <p class="card-text">Write the title of your chapter and then write the content.</p>
                        <form action="chapterCreation.php" method='post'>
                        <div class="form-group">
                            <label  for="exampleFormControlInput1">Title</label>
                            <input type="text" name="title" class="form-control" id="exampleFormControlInput1" placeholder="MyChapter" value="<?php echo($chapter['ch_title']);?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Content</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="story"rows="3" placeholder="Once upon a time..."><?php echo($chapter['ch_story'])?></textarea>
                        </div>
                    
                        <fieldset>
                            <div class="mb-3">
                            <?php $links = getAlllink($chapter['ch_id']); 
                            $tab = getAllChapter($_SESSION['story_id']);
                            foreach($links as $key=>$link) { ?>
                            <label for='<?=$link['link_id'];?>'>Select the next chapter option </label>
                            <button type="submit" formaction="includes/delLink.php?idLink=<?=$link['link_id'];?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                        </button>
                            <!-- "includes/delCh.php?id=<?php echo($ligne['ch_id']);?>&?stoId=<?php echo($story['sto_id']);?>">     -->
                            <select id="select" name='<?php echo($link['link_id']);?>' class="form-select">
                                    <?php
                                    foreach($tab as $key=>$ligne){
                                        if($ligne['ch_id']!=$_GET['idCh']){?>
                                            <option value='<?=$ligne['ch_id']?>' 
                                                    <?php if($ligne['ch_id'] == $link['link_next'])
                                                        { echo('selected');}?> >
                                                        <?=$ligne['ch_title']?> 
                                            </option>
                                    <?php } ?>
                                <?php } ?>
                                </select>
                                
                                <?php } ?>
                            </div> 
                            <div class="form-group" style="width:100px;" >
                                <button type="submit" class="btn btn-danger" formaction="includes/addLinkCh.php?idCh=<?php echo($chapter['ch_id']);?>">Ajouter un nouveau choix</a>
                            </div>
                            <div class="mb-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="endSto" name="endSto" value="1" <?php if($chapter['end_sto']==1) { echo('checked');} ?>>
                                <label for="endSto"> Is it a final chapter?</label>
                            </div>
                            </div>
                            <div class="form-group" style="width:100px;" >
                                <button type="submit" formaction="includes/editCh.php?idCh=<?php echo($_GET['idCh']);?>" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="form-group" style="width:100px;" >
                                <button type="submit" class="btn btn-danger" formaction="includes/editChBack.php?idCh=<?php echo($_GET['idCh']);?>">Retourner à la story</a>
                            </div>
                        </fieldset>
                        </form>
                </div>
                </div>
                <div class="card mb-5">
                <div class="card-body">
                    <h4 class="card-title">Card title</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                </div>
                </div>      
            </div>  


        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>