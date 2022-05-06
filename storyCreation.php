<?php session_start(); 
$_SESSION['story_id'] = 1;?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container-fluid ">
        <?php require_once "includes/header.php"; ?>
            <div class="container d-flex justify-content-center" style="margin-top: 100px;">
                <div class="card mb-3" style="margin-right: 50px;">
                <h3 class="card-header">Titre de l'histoire</h3>
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
                </div>
                <div class="card mb-5"style="margin-right: 50px;"   >
                <div class="card-body">
                    <h4 class="card-title">Story Creator</h4>
                    <h6 class="card-subtitle mb-2 text-muted">Your story</h6>
                    <p class="card-text">Write your title and description, then choose your chapters.</p>
                        <form method="post">
                        <div class="form-group">
                            <label  for="exampleFormControlInput1">Title</label>
                            <input type="text" name="title"class="form-control" id="exampleFormControlInput1" placeholder="MyStory">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description"rows="3" placeholder="<?php $ligne = getStory(1);
                            if($ligne){
                            if(is_null($ligne['sto_description'])){
                                echo("");
                            } else  {
                            echo($ligne);}}?>"></textarea>
                        </div>
                        <table class="table">
                        <thead>
                                <tr>
                                <th scope="col">Title</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                        <?php $tab=getAllChapter(1);
                        foreach($tab as $key=>$ligne){?>
                            <tr>        
                                <th scope="row"><?php echo($ligne['ch_title'])?></th>
                                <td><button type="submit" formaction="includes/delCh.php/?id=<?php echo($ligne['ch_id']);?>&&?stoId= <?php echo($ligne['ch_story_id']);?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                    </a>
                                </td>
                            </tr>

                        <?php } ?>
                            </tbody>
                            </table>
                            <div class="form-group" style="width:100px;" >
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                            <div class="form-group" style="width:100px;" >
                                <button type="submit" class="btn btn-primary" formaction="includes/addCh.php/?stoId= <?php echo($ligne['ch_story_id']);?>">Ajouter un Chapitre</a>
                            </div>
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
    <?php require_once "includes/functions.php"; ?>
    <?php require_once "includes/scripts.php"; ?>
</body>
</html>