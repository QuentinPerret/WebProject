<?php 
session_start();
require_once 'functions.php';
editCh($_GET['idCh']);
$chapter = getCh($_GET['idCh']);
$links = getAllLink($chapter['ch_id']); 
foreach($links as $key=>$ligne){
    editLink($ligne['link_id'],$_POST[$ligne['link_id']]);
}
redirect('../chapterCreation.php?idCh='.($_GET['idCh']));
?>