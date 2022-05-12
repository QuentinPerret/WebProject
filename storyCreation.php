<?php session_start(); 
require_once "includes/functions.php";
$story = getStory($_GET['stoId']);?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container-fluid ">
        <?php require_once "includes/header.php";?>
        
            <div class="container d-flex justify-content-center" style="margin-top: 100px;">
                <div class="card mb-3" style="margin-right: 50px;">
                <h3 class="card-header">Titre de l'histoire</h3>
                <div class="card-body">
                <div class="container mt-5 d-flex justify-content-center" id="statistics" style="margin-bottom: 30px;">
                    <div class="card p-3">
                            <div class="d-flex align-items-center">
                                <div class="image"> <img src="Images/statistics.png" class="rounded" width="155"> </div>
                                <div class="ml-3 w-100">
                                    <h4 class="mb-0 mt-0">Story's stat</h4> <span></span>
                                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                                        <div class="d-flex flex-column"> <span class="articles">Games played</span> <span class="number1"><?=$story['sto_played']?></span> </div>
                                        <div class="d-flex flex-column"> <span class="followers">Games finished</span> <span class="number2"><?=$story['sto_finished']?></span> </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a href="includes/newGame.php?idCh=<?=$story['sto_first_ch_id']?>"><button class="btn btn-danger w-50" style="margin-left: 100px" >Jouer cette histoire</button></a> 
                    <a href="includes/delStory.php?idSto=<?=$story['sto_id']?>"><button class="btn btn-danger w-50" style="margin-left: 100px;">Supprimer cette histoire</button></a>
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
                            <input type="text" name="title"class="form-control" id="exampleFormControlInput1" placeholder="MyStory" value="<?php echo($story['sto_title']);?>">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Description</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="description"rows="3"><?php echo($story['sto_description']);?></textarea>
                        </div>
                        <table class="table">
                        <thead>
                                <tr>
                                <th scope="col">Title</th>
                                
                                </tr>
                            </thead>
                            <tbody>
                        <?php $tab=getAllChapter($_GET['stoId']);
                        foreach($tab as $key=>$ligne){?>
                            <tr>
                                <th scope="row"><a href ="chapterCreation.php?idCh=<?php echo($ligne['ch_id']);?>"><?php echo($ligne['ch_title'])?></a></th>
                                <td><button type="submit" formaction="includes/delCh.php?id=<?php echo($ligne['ch_id']);?>">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                                                <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z"/>
                                        </svg>
                                        </button>
                                </td>
                            </tr>

                        <?php } ?>
                        </tbody>
                        </table>
                        <label for='firstCh'>Select the first chapter od your story</label>
                            <select id="select" name='firstCh' class="form-select">
                                    <?php
                                    foreach($tab as $key=>$ligne){ ?>
                                            <option value='<?=$ligne['ch_id']?>' 
                                                    <?php if($ligne['ch_id'] == $story['sto_first_ch_id'])
                                                        { echo('selected');}?> >
                                                        <?=$ligne['ch_title']?> 
                                            </option>
                                <?php } ?>
                                </select>

                            <div class="form-group" style="width:100px;" >
                                <button type="submit" class="btn btn-primary" formaction="includes/editStory.php?stoId=<?php echo($story['sto_id']);?>">Submit</button>
                            </div>
                            <div class="form-group" style="width:100px;" >
                                <button type="submit" class="btn btn-danger" formaction="includes/addCh.php?stoId=<?php echo($story['sto_id']);?>">Ajouter un Chapitre</a>
                            </div>
                        </form>
                </div>
                </div>   
            </div>
        <?php require_once "includes/footer.php"; ?>
    </div>
    <?php require_once "includes/functions.php"; ?>
    <?php require_once "includes/scripts.php"; ?>
</body>
</html>