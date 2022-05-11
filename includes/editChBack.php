<?php 
session_start();
require_once 'functions.php';
editCh($_GET['idCh']);
editAllLink($_GET['idCh']);
redirect('../storyCreation.php');
?>