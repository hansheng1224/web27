<fieldset>
    <legend>目前位置 : 首頁 > 問卷調查</legend>
    <table>
        <tr>
            <td width='10%'>編號</td>
            <td width='50%'>問卷題目</td>
            <td width='10%'>投票總數</td>
            <td width='10%'>結果</td>
            <td>狀態</td>
        </tr>
        <?php
        $subjects=$Que->all(['parent'=>0]);
        foreach($subjects as $key => $subj){
            ?>
            <tr>
                <td><?=$key+1;?></td>
                <td><?=$subj['text'];?></td>
                <td><?=$subj['count'];?></td>
                <td>
                    <a href="index.php?do=result&id=<?=$subj['id'];?>">結果</a>
                </td>
                <td>
                    <?php
                    if(isset($_SESSION['login'])){
                        ?>
                        <a href="index.php?do=vote&id=<?=$subj['id'];?>">參與投票</a>
                        <?php
                    }else{
                        echo "請先登入";
                    }
                    ?>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</fieldset>