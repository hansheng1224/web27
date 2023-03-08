<fieldset>
    <legend>新增問卷</legend>
    <form action="./api/add_que.php" method='post'>
        <div class='subject'>
            <label for="">問卷名稱</label>
            <input type="text" name="subject" id="">
        </div>
        <div class="option">
            <div>
                <label for="">選項</label>
                <input type="text" name="option[]" id="">
                <input type="button" value="更多" onclick='moreOpt()'>
            </div>
        </div>
        <div class="ct">
            <input type="submit" value="新增">
            <input type="reset" value="清空">
        </div>
    </form>

</fieldset>
<script>
    function moreOpt(){
        let opt=`
            <div>
                <label for="">選項</label>
                <input type="text" name="option[]" id="">
            </div>`
        $(".option").append(opt);
    }
</script>