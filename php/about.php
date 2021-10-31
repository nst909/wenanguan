<?php
include 'common.php';
?>
<div class="wrap">
<div class="main">
    <div class="point about">
<h2>
    <span>关于我们</span> 
</h2>
<h2>
    <p>
        <span style="font-weight:400;">我们的初衷是让世界上更多优秀的文案作品分享被人们分享在互联网当中，他可以激励人们生活的动力。</span> 
    </p>
    <p>
        <span style="font-weight:400;">如此一个良好的平台我们不希望被有心之人恶意利用，我们每天都会有值班人员对所有的内容进行扫描，禁止出现色情、暴力、低俗、不含营养信息的文字出现，所有文案上不得存在关于中华人民共和国公民隐私内容以及有关国家政治内容，若您发现有不良信息请联系我们。</span> 
    </p>
</h2>
<h2>
    特色
</h2>
<h2>
    <p>
        <span style="font-weight:normal;"><span>1.随时随地分享你喜欢的文案~</span></span> 
    </p>
    <p>
        <span style="font-weight:normal;"><span>2.拥有分享二维码，对方扫描二维码后看到您分享的文案~</span></span> 
    </p>
    <p>
        <span style="font-weight:normal;"><span>3.搜索关键词快速找到您想要的文案~</span></span> 
    </p>
</h2>
<h2>
    <span>联系</span>
</h2>
<p>
    <span style="font-size:18px;">邮箱：admin@junsangs.com</span> 
</p>
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
