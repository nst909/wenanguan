<?php
/**
  文案列表
  https://blog.junsangs.com/
**/

include("../php/common.php");
$title='文案列表';
include './head.php';
include '../php/config.php';
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
      <li class="active">
            <a href="./list.php"><span class="glyphicon glyphicon-list"></span> 文案列表</a>
          </li>
      <li>
            <a href="./relist.php"><span class="glyphicon glyphicon-calendar"></span> 评论列表</a>
          </li>
      <li><a href="./set.php"><span class="glyphicon glyphicon-cog"></span> 网站配置</a></li>
          <li><a href="./login.php?logout"><span class="glyphicon glyphicon-log-out"></span> 退出登陆</a></li>
        </ul>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container -->
  </nav><!-- /.navbar -->
  <div class="container" style="padding-top:70px;">
    <div class="col-sm-12 col-md-10 center-block" style="float: none;">
<?php

$or=isset($_GET['or'])?$_GET['or']:null;

if($or=='edit')
{
$id=$_GET['id'];
$row=$DB->get_row("select * from sillyli_lovemsg where id='$id' limit 1");
echo '<div class="panel panel-primary">
<div class="panel-heading"><h3 class="panel-title">修改文案信息</h3></div>';
echo '<div class="panel-body">';
echo '<form action="./list.php?or=edit_sure&id='.$id.'" method="POST">
<div class="form-group">
<label>ID:</label><br>
<input type="text" class="form-control" name="id" value="'.$row['id'].'" readonly>
<font color="green"></font>
</div>
<div class="form-group">
<label>QQ</label><br>
<input type="text" class="form-control" name="qq" value="'.$row['qq'].'" required>
</div>
<div class="form-group">
<label>昵称</label><br>
<input type="text" class="form-control" name="realname" value="'.$row['realname'].'" required>
</div>
<div class="form-group">
<label>文案对象</label><br>
<input type="text" class="form-control" name="towho" value="'.$row['towho'].'" required>
</div>
<div class="form-group">
<label>内容</label><br>
<input type="text" class="form-control" name="msg" value="'.$row['msg'].'" required>
</div>
<div class="form-group">
<label>赞数</label><br>
<input type="text" class="form-control" name="zan" value="'.$row['zan'].'" required>
</div>
<input type="submit" class="btn btn-primary btn-block"
value="确定修改"></form>
';
echo '<br/><a href="./list.php">>>返回文案列表</a>';
echo '</div></div>
<script>
var items = $("select[default]");
for (i = 0; i < items.length; i++) {
  $(items[i]).val($(items[i]).attr("default"));
}
</script>';
}elseif($or == 'edit_sure' and $_GET['id']){
  $id = $_POST['id'];
  $qq = $_POST['qq'];
  $realname = $_POST['realname'];
  $msg = $_POST['msg'];
  $zan = $_POST['zan'];
  $towho = $_POST['towho'];
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">修改结果</h3></div>
<div class="panel-body box">';
if($DB->query("UPDATE `sillyli_lovemsg` SET `realname`='$realname',`msg`='$msg',`zan`='$zan',`qq`='$qq',`towho`='$towho' WHERE `id` = '$id'")==true){
echo '<div class="box">修改成功.</div>';
}else{
echo'<div class="box">执行失败，请检查数据库配置.</div>';
}
echo '<hr/><a href="./list.php">>>返回文案列表</a></div></div>';
}elseif($or == 'del' and $_GET['id']){
  $id = $_GET['id'];
  echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除任务</h3></div>
<div class="panel-body box">
<h2>即将删除ID为:'.$id.'的文案，是否继续？</h2><br><a href="./list.php?or=del_sure&id='.$id.'" class="btn btn-danger">确认</a> <a href="javascript:history.back();" class="btn btn-warning">返回</a></div></div>';
echo '<hr/><a href="./list.php">>>返回文案列表</a></div></div>';
}elseif($or == 'del_sure' and $_GET['id']){
  $id = $_GET['id'];
echo '<div class="panel panel-primary">
<div class="panel-heading w h"><h3 class="panel-title">删除结果</h3></div>
<div class="panel-body box">';
if($DB->query("DELETE FROM `sillyli_lovemsg` WHERE `id` = '$id'")==true){
echo '<div class="box">执行成功，已删除.</div>';
}else{
echo'<div class="box">执行失败，请检查数据库配置.</div>';
}
echo '<hr/><a href="./list.php">>>返回文案列表</a></div></div>';
}
else
{

$numrows=$DB->count("SELECT count(id) from sillyli_lovemsg");
echo '<div class="alert alert-info">目前系统共有'.$numrows.'条文案。<br/>';
echo '</div>';

echo $con;
?>
      <div class="table-responsive">
        <table class="table table-striped">
          <thead><tr><th>操作</th><th>序号</th><th>内容</th><th>获赞</th><th>昵称</th><th>来源</th><th>QQ</th><th>时间</th></thead>
          <tbody>
<?php
$pagesize=30;
$pages=intval($numrows/$pagesize);
if ($numrows%$pagesize)
{
 $pages++;
 }
if (isset($_GET['page'])){
$page=intval($_GET['page']);
}
else{
$page=1;
}
$offset=$pagesize*($page - 1);

$rs=$DB->query("SELECT * FROM sillyli_lovemsg WHERE 1 order by id desc limit $offset,$pagesize");
while($res = $DB->fetch($rs))
{
$edit = '<a class="btn btn-primary" href="list.php?or=edit&id='.$res['id'].'" title="修改"><i class="fa fa-edit"></i>&nbsp;修改</a><a class="btn btn-danger" href="list.php?or=del&id='.$res['id'].'" title="删除此文案"><i class="fa fa-del">&nbsp;删除</i></a>';
$time = date('Y-m-d H:i:s',$res['time']);
echo '<tr><td style="width:30%"><b>'.$edit.'</b><td><b>'.$res['id'].'</b><td><b>'.$res['msg'].'</b><td><b>'.$res['zan'].'</b></td><td>'.$res['realname'].'</td><td>'.$res['towho'].'</td><td>'.($res['qq']).'</td><td>'.$time.'</td>';
}
?>
          </tbody>
        </table>
      </div>
<?php
echo'<ul class="pagination">';
$first=1;
$prev=$page-1;
$next=$page+1;
$last=$pages;
if ($page>1)
{
echo '<li><a href="list.php?page='.$first.$link.'">首页</a></li>';
echo '<li><a href="list.php?page='.$prev.$link.'">&laquo;</a></li>';
} else {
echo '<li class="disabled"><a>首页</a></li>';
echo '<li class="disabled"><a>&laquo;</a></li>';
}
for ($i=1;$i<$page;$i++)
echo '<li><a href="list.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '<li class="disabled"><a>'.$page.'</a></li>';
for ($i=$page+1;$i<=$pages;$i++)
echo '<li><a href="list.php?page='.$i.$link.'">'.$i .'</a></li>';
echo '';
if ($page<$pages)
{
echo '<li><a href="list.php?page='.$next.$link.'">&raquo;</a></li>';
echo '<li><a href="list.php?page='.$last.$link.'">尾页</a></li>';
} else {
echo '<li class="disabled"><a>&raquo;</a></li>';
echo '<li class="disabled"><a>尾页</a></li>';
}
echo'</ul>';
#分页
}
?>
    </div>
  </div>
