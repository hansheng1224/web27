<?php
include_once "base.php";
if(isset($_POST['subject']) && $_POST['subject']!=''){
    $Que->save(['text'=>$post['subject'],'count'=>0,'parent'=>0]);
    $parent=$Que->max('id');
    foreach($_POST['option'] as $opt){
        $Que->save(['text'=>$_POST['option'],['patent'=>$parent]]);
    }
}
to("../back.php?do=que");
?>