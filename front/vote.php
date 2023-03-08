<?php
$subject=$Que->find($_GET['id']);
$options=$Que->all(['parent'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置 : 問卷調查 > <?=$subject['text'];?></legend>
    <form action="./api/vote.php" method='post'>
        <h3><?=$subject['text'];?></h3>
        <?php
        foreach($options as $opt){
            ?>
            <p> <input type="radio" name="opt" id="opt" value='<?=$opt['id'];?>'> <?=$opt['text'];?> </p>
            <?php
        }
        ?>
        <div class='ct'>
            <input type="submit" value="我要投票">
        </div>
    </form>
</fieldset>