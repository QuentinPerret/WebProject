<?php 
session_start();
require_once 'functions.php';
editCh($_GET['chId']);
redirect('../../chapterCreation.php');
?>