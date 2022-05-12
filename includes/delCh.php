<?php 
session_start();
require_once 'functions.php';
$stoId = getCh($_GET['id'])['ch_story_id'];
editStory($stoId);
delCh($_GET['id']);
redirect('../storyCreation.php?stoId='.$stoId);
?>