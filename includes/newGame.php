<?php session_start(); 
require_once 'functions.php';
$idCh  = $_GET['idCh'];
$writer = getIdFromLogin($_SESSION['login']);
addNewGame($idCh,$writer);
redirect('../stories.php?chId='.$idCh);