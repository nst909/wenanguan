<?php
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
        <a class="navbar-brand" href="./"> 后台管理</a>
      </div><!-- /.navbar-header -->
      <div id="navbar" class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active">
            <a href="./"><span class="glyphicon glyphicon-user"></span> 平台首页</a>
          </li>
		  <li>
            <a href="./list.php"><span class="glyphicon glyphicon-list"></span >文案列表</a>
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
<?php

$count1=$DB->count("SELECT count(id) from sillyli_lovemsg");
$count2=$DB->count("SELECT count(id) from sillyli_reply");
$mysqlversion=$DB->count("select VERSION()");
?>
  <div class="container" style="padding-top:70px;">
    <div class="col-xs-12 col-sm-10 col-lg-8 center-block" style="float: none;">
      <div class="panel panel-primary">
        <div class="panel-heading"><h3 class="panel-title">后台管理首页</h3></div>
          <ul class="list-group">
            <li class="list-group-item"><span class="glyphicon glyphicon-stats"></span> <b></b>文案数量/评论数量：<?php echo $count1.'/'.$count2?></li>
            <li class="list-group-item"><span class="glyphicon glyphicon-time"></span> <b>现在时间：</b> <?php echo $date; ?></li>
			<li class="list-group-item"><span class="glyphicon glyphicon-home"></span> <a href="../" class="btn btn-xs btn-primary">返回首页</a>
                          <a href="./list.php" class="btn btn-xs btn-success">文案管理</a>&nbsp;<a href="./relist.php" class="btn btn-xs btn-warning">评论管理</a>&nbsp;<a href="./set.php" class="btn btn-xs btn-danger">系统配置</a>
			</li>

          </ul>
      </div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">网站信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
		<b>当前源码版本：</b>v1.0
		</li>
		<li class="list-group-item">
			<b>最新源码版本：</b>v1.0
		</li>

	</ul>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">服务器信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>PHP 版本：</b><?php echo phpversion() ?>
			<?php if(ini_get('safe_mode')) { echo '线程安全'; } else { echo '非线程安全'; } ?>
		</li>
		<li class="list-group-item">
			<b>MySQL 版本：</b><?php echo $mysqlversion ?>
		</li>
		<li class="list-group-item">
			<b>服务器软件：</b><?php echo $_SERVER['SERVER_SOFTWARE'] ?>
		</li>
		
		<li class="list-group-item">
			<b>程序最大运行时间：</b><?php echo ini_get('max_execution_time') ?>s
		</li>
		<li class="list-group-item">
			<b>POST许可：</b><?php echo ini_get('post_max_size'); ?>
		</li>
		<li class="list-group-item">
			<b>文件上传许可：</b><?php echo ini_get('upload_max_filesize'); ?>
		</li>
	</ul>
</div>
<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title">所需环境支持信息</h3>
	</div>
	<ul class="list-group">
		<li class="list-group-item">
			<b>mysqli扩展：</b><?php echo checkclass('mysqli',true); ?>
		</li>
		<li class="list-group-item">
			<b>PDO拓展：</b><?php echo checkclass('pdo',true); ?>
		</li>
		<li class="list-group-item">
			<b>file_get_contents函数：</b><?php echo checkfunc('file_get_contents',true); ?>
		</li>
	</ul>
</div>

    </div>
  </div>
