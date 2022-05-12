<?php
session_start();?>

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
                <h3 class="card-header">Titre de l'histoire</h3>
                <div class="card-body">
                    <h5 class="card-title">The current chapter</h5>
                    <h6 class="card-subtitle text-muted">With ?? character</h6>
                </div>
                
                <div class="card-body">
                    <p class="card-text">The story</p>
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
</div>

        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>