<?php 
session_start();
require_once 'functions.php';
editStory($_GET['stoId']);
redirect('../storyCreation.php?stoId='.$_GET['stoId']);
?>