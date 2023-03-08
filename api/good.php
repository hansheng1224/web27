<?php
include_once "base.php";

$user=$_POST['user'];
$news=$_POST['news'];

$chk=$Log->count(['news'=>$news,'user'=>$user]);
$row=$News->find($news);

if($chk>0){
    $Log->del(['user'=>$user,'news'=>$news]);
    $row['good']--;
    $New->save($row);
}else{
    $row['good']++;
    $Log->save(['user'=>$user,'news'=>$news]);
    $News->save($row);
}
?>