<?php
$subject=$Que->find($_GET['id']);
$options=$Que->all(['parent'=>$_GET['id']]);
?>
<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查 > <?=$subject['text'];?></legend>
    <h3><?=$subject['text'];?></h3>
    <?php
    foreach($options as $opt){
        $vote=$opt['count'];
        $all=($subject['count']==0?1:$subject['count']);
        $rate=$vote/$all;
        ?>
        <div style='display:flex;align-items:center;margin:10px'>
            <div style='width:48%'>
                <?=$opt['text']?>;
            </div>
            <div style='width:50%'>
                <span style="display:inline-block;width:<?=70*$rate;?>%;height:1.1rem;background-color:#ccc;"></span>
                <span><?=$vote;?>票(<?=round($rate*100,1);?>%)</span>
            </div>
        </div>
        <?php
    }
    ?>
</fieldset>