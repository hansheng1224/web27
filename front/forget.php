<div>請輸入信箱以查詢密碼</div>
<div>
    <input type="text" name="email" id="email">
</div>
<div class='result'>

</div>
<button onclick="forget()">尋找</button>

<script>
    function forget(){
        $.post('./api/forget.php',{email:$("#email").val()},(result)=>{
            $(".result").html(result)
        })
    }
</script>