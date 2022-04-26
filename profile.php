<?php
session_start();
?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container-fluid">
        <?php require_once "includes/header.php"; ?>
    
</br>
</br>
</br>
</br>
<div class="container mt-5 d-flex justify-content-center">
    <div class="card p-3">
            <div class="d-flex align-items-center">
                <div class="image"> <img src="Images/PNJ/rpg.png" class="rounded" width="155"> </div>
                <div class="ml-3 w-100">
                    <h4 class="mb-0 mt-0">Tao</h4> <span>Moine</span>
                    <div class="p-2 mt-2 bg-primary d-flex justify-content-between rounded text-white stats">
                        <div class="d-flex flex-column"> <span class="articles">HP</span> <span class="number1">100</span> </div>
                        <div class="d-flex flex-column"> <span class="followers">Attack</span> <span class="number2">20</span> </div>
                        <div class="d-flex flex-column"> <span class="rating">Level</span> <span class="number3">2</span> </div>
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