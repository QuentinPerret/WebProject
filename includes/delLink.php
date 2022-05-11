<?php 
session_start();
require_once 'functions.php';
$idLink = $_GET['idLink'];
$link = getLink(($idLink));
delLink($idLink);
redirect('../chapterCreation.php?idCh='.$link['link_ch']);
?>