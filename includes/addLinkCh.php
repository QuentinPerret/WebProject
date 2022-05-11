<?php require_once 'functions.php';
editCh($_GET['chId']);
addNewLink($_GET['chId']);
redirect('../chapterCreation.php?idCh='.$_GET['chId']);
?>