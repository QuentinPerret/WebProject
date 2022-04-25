<!DOCTYPE html>
<html>

<?php session_start();
include_once "../Front/head.php";?>

<body>

    <?php include_once "../Front/header.php";?>

    <div id="maincontent">

		<h1>Story Properties</h1>		
		<div style="padding-left:15px;">
			<label class="block">Title</label>
			<input type="text" value="acces bdd to have strory name" maxlength="100" id="StoryTitle" autofocus="true" style="width:300px;">
			<span id="MainContentPlaceHolder_ctl01" class="error" style="display:none;">Title Required</span>
			
            <label class="block">Short Description (Displayed in search) </label>
			<input type="text" maxlength="80" id="ShortDescription" style="width:300px;">

			<label class="block">Description</label>
		    <textarea rows="10" cols="20" id="StoryDescription" style="width:95%;">acces bdd to have the curent story description</textarea>
            <span id="StoryDescription" style="visibility:hidden;">INVALID Description</span>
						
			<input type="submit" value="Save Changes">

		</div>
</body>

</html>