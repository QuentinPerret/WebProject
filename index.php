<?php
session_start();
$_SESSION['login']; ?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container">
        <?php require_once "includes/header.php"; ?>

<div class="container" style="margin-top: 100px">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                <a role="button" href="<?php if(isUserConnected()) echo('includes/addStory.php'); else echo('signin.php') ?>"><img src="Images/book.png" style="width: 400px; height: 400px; object-fit: cover; margin-bottom: 30px;" class="d-block mx-auto" alt="dragon"></a>
                </div>
                <div class="carousel-item">
                <a role="button" href="#"><img src="Images/OurBooks.png" style="width: 400px; height: 400px; object-fit: cover; margin-left: -30px; margin-bottom: 30px;" class="d-block mx-auto" alt="skull"></a>
                </div>
                <div class="carousel-item">
                <a role="button" href="#"><img src="Images/statistics.png" style="width: 400px; height: 400px; object-fit: cover; margin-bottom: 30px;" class="d-block mx-auto" alt="druid"></a>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            </div>
            
</div>
        <?php require_once "includes/footer.php"; ?>
    </div>

    <?php require_once "includes/scripts.php"; ?>
</body>

</html>