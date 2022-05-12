<?php 
session_start();
require_once 'functions.php';
addBlankSto(); 
$stoId = lastInsertStory();
redirect('../storyCreation.php?stoId='.$stoId[1]);
?>