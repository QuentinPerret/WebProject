<?php require_once 'functions.php';
addNewLink($_GET['idCh'])
?>
<select id="select" name="nextCh" class="form-select">
    <?php $tab = getAllChapter($_SESSION['story_id']);
    foreach($tab as $key=>$ligne){
        if($ligne['ch_id']!=$_GET['idCh']){?>
            <option value='<?php echo($ligne['ch_id'])?>' <?php if($ligne['ch_id']==$chapter['ch_next_ch_option_A']){echo('selected');}?>><?php echo($ligne['ch_title'])?></option>
    <?php }} ?>
</select>