<?php 
session_start();
require_once 'functions.php';
editCh($_GET['i']);
editAllLink($_GET['idCh']);
addNewLink($_GET['idCh']);
redirect('../chapterCreation.php?idCh='.$_GET['idCh']);
?>