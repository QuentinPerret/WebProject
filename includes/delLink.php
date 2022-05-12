<?php 
session_start();
require_once 'functions.php';
$idLink = $_GET['idLink'];
$link = getLink($idLink);
editCh($link['link_ch']);
delLink($idLink);
redirect('../chapterCreation.php?idCh='.$link['link_ch']);
?>