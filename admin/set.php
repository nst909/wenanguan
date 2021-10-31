<?php
/**
   网站配置
   https://blog.junsangs.com/
**/

include("../php/common.php");
$title='后台管理';
include './head.php';
if($islogin==1){}else exit("<script language='javascript'>window.location.href='./login.php';</script>");
?>
  <nav class="navbar navbar-fixed-top navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
          <span class="sr-only">导航按钮</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="./">后台管理</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li>
            <a href="./"><span class="glyphicon glyphicon-user"></span> 平台首页</a>
          </li>
		  <li>
            <a href="./list.php"><span class="glyphicon glyphicon-list"></span> 文案列表</a>
          </li>
		  <li>
            <a href="./relist.php"><span class="glyphicon glyphicon-calendar"></span> 评论列表</a>
          </li>
		  <li class="active"><a href="./set.php"><span class="glyphicon glyphicon-cog"></span> 网站配置</a></li>
          <li><a href="./login.php?logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
<?php
if(isset($_POST['submit'])) {
	foreach ($_POST as $k => $value) {
		if($k=='pwd')continue;
		$value=daddslashes($value);
		$DB->query("update `sillyli_config` set `v` ='{$value}' where `k`='{$k}'");
	}
	$pwd=daddslashes($_POST['pwd']);
	if(!empty($pwd))$DB->query("update `sillyli_config` set `v` ='{$pwd}' where `k`='admin_pwd'");
	showmsg('修改成功！',1);
}else{
?>
 <?php
 $okey = $_GET['okey'];
 if($okey == ''){
echo '
<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">系统配置</h3></div>
<div class="panel-body">
<a href="set.php?okey=1" class="btn btn-default btn-block">网站基本信息</a>
<a href="set.php?okey=4" class="btn btn-default btn-block">音乐配置</a>
';
 }
 if($okey == '4'){
 echo'
	 <div class="panel panel-primary">
     <div class="panel-heading"><h3 class="panel-title">网站音乐配置</h3></div>
     <div class="panel-body">
	 <form action="./set.php" method="post" class="form-horizontal" role="form">
     <div class="form-group">
	  <label class="col-sm-2 control-label">网易音乐代码</label>
	  <div class="col-sm-10"><textarea class="form-control" name="163music" rows="4">'.htmlspecialchars($conf['163music']).'</textarea><p>此处请填网易云音乐代码(首页不显示音乐播放框)，音乐代码教程获取教程：<a href="https://sillyli.com/163music">https://sillyli.com/163music</a></p></div>
	 </div><br/>
	 <div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
';
 }
 if($okey == '1'){
	 echo '
	 <div class="panel panel-primary">
    <div class="panel-heading"><h3 class="panel-title">网站基本信息</h3></div>
    <div class="panel-body">
	 <form action="./set.php" method="post" class="form-horizontal" role="form">
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站名称</label>
	  <div class="col-sm-10"><input type="text" name="title" value="'.$conf['title'].'" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">关键字</label>
	  <div class="col-sm-10"><input type="text" name="keywords" value="'.$conf['keywords'].'" class="form-control" required/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站描述</label>
	  <div class="col-sm-10"><input type="text" name="description" value="'.$conf['description'].'" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">网站底部代码</label>
	  <div class="col-sm-10"><textarea class="form-control" name="footer" rows="2">'.htmlspecialchars($conf['footer']).'</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">广告代码</label>
	  <div class="col-sm-10"><textarea class="form-control" name="ad" rows="3">'.htmlspecialchars($conf['ad']).'</textarea></div>
	</div><br/>
    <div class="form-group">
	  <label class="col-sm-2 control-label">备案号</label>
	  <div class="col-sm-10"><textarea class="form-control" name="beian" rows="1">'.$conf['beian'].'</textarea></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">站长ＱＱ</label>
	  <div class="col-sm-10"><input type="text" name="qq" value="'.$conf['qq'].'" class="form-control"/></div>
	</div><br/>
	<div class="form-group">
	  <label class="col-sm-2 control-label">密码重置</label>
	  <div class="col-sm-10"><input type="text" name="pwd" value="" class="form-control" placeholder="不修改请留空"/></div>
	</div><br/>
	<div class="form-group">
	  <div class="col-sm-offset-2 col-sm-10"><input type="submit" name="submit" value="修改" class="btn btn-primary form-control"/><br/>
	 </div>
	</div>
 ';}
?>
  </form>
</div>
</div><script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
	$(items[i]).val($(items[i]).attr("default"));
}
</script>
<?php
}?>

    </div>
  </div>
