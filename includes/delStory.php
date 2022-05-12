<?php 
session_start();
require_once 'functions.php';
$idSto = $_GET['idSto'];
delStory($idSto);
redirect('../index.php');
?>