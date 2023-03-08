<fieldset>
    <legend>帳號管理</legend>
    <form action="./api/del_acc.php" method='post'>
    <table>
        <tr>
            <td style='width:30%'>帳號</td>
            <td style='width:30%'>密碼</td>
            <td>刪除</td>
        </tr>
        <?php
        $rows=$User->all();
        foreach($rows as $row){
            ?>
            <tr>
                <td><?=$row['acc'];?></td>
                <td><?=str_repeat("*",strlen($row['pw']));?></td>
                <td>
                    <input type="checkbox" name="del[]" id="del[]" value='<?=$row['id'];?>'>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
    <div class='ct'>
        <input type="submit" value="確定刪除">
        <input type="reset" value="清空處理">
    </div>
    </form>

    <h2>新增會員</h2>
    <div style="color:red">
    *請設定您要註冊的帳號及密碼(最長12個字元)  
    </div>
    <table>
        <tr>
            <td>Step1:登入帳號</td>
            <td>
                <input type="text" name="acc" id="acc">
            </td>
        </tr>
        <tr>
            <td>Step2:登入密碼</td>
            <td>
                <input type="password" name="pw" id="pw">
            </td>
        </tr>
        <tr>
            <td>Step3:再次確認密碼</td>
            <td>
                <input type="password" name="pw2" id="pw2">
            </td>
        </tr>
        <tr>
            <td>Step4:信箱(忘記密碼時使用)</td>
            <td>
                <input type="text" name="email" id="email">
            </td>
        </tr>
    </table>
    <button onclick='reg()'>註冊</button>
    <button onclick='reset()'>清除</button>
</fieldset>
<script>
    function reset(){
        $("#acc,#pw,#pw2,#email").val('')
    }

    function reg(){
        let user={
                acc:$("#acc").val(),
                pw:$("#pw").val(),
                pw2:$("#pw2").val(),
                email:$("#email").val()
        }

        if(user.acc=='' || user.pw=='' || user.pw2=='' || user.email==''){
            alert('不可空白')
        }else{
            if(user.pw==user.pw2){
                $.post('./api/chk_acc.php',user,(result)=>{
                    if(parseInt(result)==1){
                        alert('帳號重複')
                    }else{
                        $.post('./api/reg.php',user,(result)=>{
                            alert('註冊完成，歡迎加入')
                            reset()
                        })
                    }
                })
            }else{
                alert('密碼錯誤')
            }
        }
    }
</script>