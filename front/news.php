<style>
    .news-title{
        cursor: pointer;
        background-color: #eee;
    }
</style>
<fieldset>
    <legend>目前位置 : 首頁 > 最新文章區</legend>
    <table>
        <tr>
            <td width='30%'>標題</td>
            <td width='50%'>內容</td>
            <td></td>
        </tr>
        <?php
        $all=$News->count(['sh'=>1]);
        $div=5;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(['sh'=>1]," limit $start,$div");
        foreach($rows as $row){
            ?>
            <tr>
                <td class='news-title'><?=$row['title'];?></td>
                <td>
                    <div class='short'>
                        <?=mb_substr($row['text'],0,20);?>...
                    </div>
                    <div class='full'>
                        <?=nl2br($row['text']);?>
                    </div>
                </td>
                <td>
                    <?php
                    if(isset($_SESSION['login'])){
                        if($Log->count(['news'=>$row['id'],'user'=>$_SESSION['login']])>0){
                            ?>
                            <a href="#" class='goods' data-user=<?=$_SESSION['login'];?> data-news=<?=$row['id'];?>>收回讚</a>
                            <?php
                        }else{
                            ?>
                            <a href="#" class='goods' data-user=<?=$_SESSION['login'];?> data-news=<?=$row['id'];?>>讚</a>
                            <?php
                        }
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <?php
    if(($now-1)>0){
        $prev=$now-1;
        ?>
        <a href="index.php?do=news&p=<?=$prev;?>"> < </a>
        <?php
    }
    
    for($i=1;$i<=$pages;$i++){
        $size=($i==$now)?'26px':'16px';
        ?>
        <a href="index.php?do=news&p=<?=$i;?>" style='font-size:<?=$size;?>;'> <?=$i;?> </a>
        <?php
    }

    if(($now+1)<=$pages){
        $next=$now+1;
        ?>
        <a href="index.php?do=news&p=<?=$next;?>"> > </a>
        <?php
    }
    ?>
</fieldset>
<script>
    $(".full").hide()
    $(".news-title").on('click',function(){
        $(this).next().children(".short,.full").toggle()
    })
</script>