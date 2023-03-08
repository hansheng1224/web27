<form action="./api/edit.php" method='post'>
    <table>
        <tr>
            <td style='width:10%'>編號</td>
            <td style='width:50%'>標題</td>
            <td style='width:10%'>顯示</td>
            <td style='width:10%'>刪除</td>
            <td></td>
        </tr>
        <?php
        $all=$News->count(['sh'=>1]);
        $div=3;
        $pages=ceil($all/$div);
        $now=$_GET['p']??1;
        $start=($now-1)*$div;

        $rows=$News->all(['sh'=>1]," limit $start,$div");
        foreach($rows as $key=>$row){
            ?>
            <tr>
                <td><?=$key+1;?></td>
                <td><?=$row['title'];?></td>
                <td>
                    <input type="checkbox" name="sh[]" id="sh[]" value="<?=$row['id'];?>" <?=($row['sh']==1)?'checked':'';?>> 
                </td>
                <td>
                    <input type="checkbox" name="del[]" id="del[]" value='<?=$row['id'];?>'>
                </td>
                <td>
                    <input type="hidden" name="id[]" value='<?=$row['id'];?>'>
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
</form>