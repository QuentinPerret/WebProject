<?php 
session_start();
require_once 'functions.php';
$idCh = $_GET['idCh'];
editCh($idCh);
editAllLink($idCh);
$chapter = getCh($idCh);
redirect('../storyCreation.php?stoId='.$chapter['ch_story_id']);
?>