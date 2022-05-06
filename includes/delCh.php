<?php 
session_start();
require_once 'functions.php';
editStory($_GET['stoId']);
delCh($_GET['id']);
redirect('../../storyCreation.php');
?>