<?php require_once 'functions.php';
editCh($_GET['idCh']);
addNewLink($_GET['idCh']);
redirect('../chapterCreation.php');
?>