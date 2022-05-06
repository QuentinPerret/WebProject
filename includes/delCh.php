<?php 
session_start();
require_once 'functions.php';
delCh($_GET['id']);
redirect('../../storyCreation.php');
?>