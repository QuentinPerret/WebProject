<?php
session_start();
$_SESSION['login'] = null; ?>

<!doctype html>
<html>

<?php require_once "includes/head.php"; ?>

<body>
    <div class="container-fluid ">
        <?php require_once "includes/header.php"; ?>
 


        <?php require_once "includes/footer.php"; ?>
    </div>
    <?php require_once "includes/functions.php"; ?>
    <?php require_once "includes/scripts.php"; ?>
</body>

</html>