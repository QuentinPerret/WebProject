<?php 
session_start();
require_once 'functions.php';
$idLink = $_GET['idLink'];
$link = getLink(($idLink));
$chId = $link['link_ch'];
editCh($chId);
editAllLink($chId);
delLink($idLink);
redirect('../chapterCreation.php?idCh='.$chId);
?>