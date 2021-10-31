<div class="hidemask2">
<div class="hideform">
    <form action="" id="reply2" onsubmit="return false">
        <p>请填写您的相关信息<span class="close"><a href="javascript:closes()" class="node">X</a></span></p>
        <input type="hidden" name="id" value="" id="hiid">
        <input type="hidden" name="reply" value="" id="hireply">
        <p><input type="text" name="qq" id="qq" placeholder="QQ（必填）" class="his"></p>
        <p><input type="text" name="nname" id="realname" placeholder="昵称（必填）" class="his"></p>
        <p><input type="submit" value="提交" class="hisu"></p>
    </form>
</div>
</div>
<div class="notic"></div>
<div class="hidemask">
<div class="hidegaobai">
    <form action="" onsubmit="return false" id="gaobai">
        <h3>发表文案<span class="close"><a href="javascript:closes()" class="node">X</a></span></h3>
        <br>
        QQ号
        <p><input type="text" name="qq" id="qq" placeholder="使用QQ头像作为您的头像" class="his" value=""></p>
        称呼
        <p><input type="text" name="realname" placeholder="怎么称呼您？" class="his" id="grealname" value=""></p>
        来源
       <p><input type="text" name="towho" placeholder="摘抄与哪个平台？或者是您原创？" class="his" id="gtowho" ></p>
        文案
        <p><textarea name="content" cols="30" rows="5" placeholder="书写你的文案" class="his" id="gcontent"></textarea></p>
        <p><input type="submit" value="发布" class="hidegaobaisubmit"></p>
    </form>
</div>
</div>

<div class="load">
    <div class="spinner">
      <div class="rect1"></div>
      <div class="rect2"></div>
      <div class="rect3"></div>
      <div class="rect4"></div>
      <div class="rect5"></div>
    </div>  
</div>

    <div class="footer">
        <?php echo $conf['footer'] ?>
    <p> 版权所有 &copy; 花海 | <a href="https://blog.junsangs.com/p/lm-wenan-printer.htm" target="_blank"><span style="color:#CCCCCC;"><strong>项目地址</strong></span></a></p>
<p><?php echo $conf['beian'] ?></p>

<?php echo $conf['ad'] ?>
<div style="display:none"><?php echo $conf['163music'] ?></div>
</div>
</body>
</html>
