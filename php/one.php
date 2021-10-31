<?php
include 'common.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <meta name="SillyLi-yun" content="<?php echo VER;?>">
    <meta http-equiv="keywords" content="<?php echo $conf['keywords']; ?>">
	<title>文案分享-<?php echo $conf['title']; ?></title>
    <meta name="description" content="<?php echo $conf['description']; ?>" />
    <link rel="SHORTCUT ICON" href="../favicon.ico">
	<link rel="stylesheet" href="../css/style.css">
	<script type="text/javascript" src="../js/jquery-1.7.2.min.js"></script>
	<script type="text/javascript" src="../js/forlove.js"></script>
    <script type="text/javascript" src="../js/sillyli.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
	<script>
	var URL = "../php"
    var APP = "index.php";
    $(function(){
    	if(0==1){
    		$.get('/index.php/home/index/nc', function(data) {
    		$(".wenc").html(data);
    		$(".ncmask").fadeIn(200);
    		});
    	}
    })
	</script>
</head>
<body>
	<div class="header">
		<img src="../images/logo.png" alt="文案馆" class="logo"><br>
		<a href="../" class="butt">回首页</a>
	</div>
	<div class="search">
		<form action="" onsubmit="return false" class="sform">
			<input type="text" name="k" placeholder="搜索文案关键词" class="his sin">
			<div class="sjiao">搜索</div>
		</form>
	</div>
<div class="ncmask">
	<div class="allnotic">
	<div class="cls"><a href="javascript:cls()" class="node">X</a></div>
	<div class="wenc">
		提示
	</div>
</div>
</div>
<?php
$id = xss_clean(daddslashes($_GET['id']));

  $sql = "SELECT * FROM `sillyli_lovemsg` WHERE id=$id";
  $num = $conn->query($sql);
  $row = $num->fetchAll();
  $i=0;
?>
<div class="wrap">
<div class="main">
	<div class="point">
		<div class="zzan" style="right:10px;" >
			<a href="javascript:" class="jzan"><span id="<?php echo $id = $row[$i]['id'] ?>"><?php echo $row[$i]['zan'] ?></span><img src="../images/zan.png" alt="" class="zan"/></a>	
		</div>
			<div class="ptop">
				<img src="<?php 
                          if($row[$i]['qq'] !== ''){
                          echo get_qqlogo_url($row[$i]['qq']);
                          }else{
                          echo get_img_url();
                          }
                          ?>" alt="" class="avatar">
				<div class="pp">
				<span class="pname">
                  <?php 
                    if($row[$i]['realname']){
                     echo $row[$i]['realname'];
                    }else{
                      echo $row[$i]['qq'];
                    }
                  ?></span><br><span class="ptime"><?php echo date("Y-m-d H:i:s",$row[$i]['time']) ?></span>
				</div>
			</div>
			<div class="pmain">
				<p><span class="towho">我想对<?php echo $row[$i]['towho'] ?>说：</span><?php echo $row[$i]['msg'] ?></p>
			</div>
			<div class="pf">
				<ul id="reply-<?php echo $id ?>" class="hidethis">
                  <?php
                    $sqls = "SELECT * FROM `sillyli_reply` WHERE `gid` = '$id' ";
                    $nums = $conn->query($sqls);
                    $rows = $nums->fetchALL();
                    $n = count($rows);
                    if($n > 0){
                    $e = 0;
                    while($e < $n){
                        echo "<li class='replys'><p><span class='replyname'>".$rows[$e]['nname']."</span>：".$rows[$e]['reply']."</p></li>";
                        $e++;
                      }
                    }
                  ?>
				</ul>
				<a href="javascript:" class="more">点击展开更多...</a>
				<script>
				$(function(){
					if($("#reply-245").height()>100){
								$("#reply-245").css({"height":"100px","overflow":"hidden"});
								$("#reply-245").next().show();
							}
				})
				</script>
				<form action="" method="post" onsubmit="return false">
					<div class="line">
						<input type="text" name="reply" placeholder="我也说两句" class="pliu">
						<div class="pjiao" id="<?php echo $id ?>">提交</div>
					</div>
				</form>
			</div>
		</div>	
  <div class="point">
				<p>长按保存二维码分享：<img src="https://pis.junsangs.com/api/QRcode/src.php?text=<?php echo curPageURL();?>&size=100"></p>
		</div>	
  </div>
  
<?php
function curPageURL() 
{
  $pageURL = 'http';
 
  if ($_SERVER["HTTPS"] == "on") 
  {
    $pageURL .= "s";
  }
  $pageURL .= "://";
 
  if ($_SERVER["SERVER_PORT"] != "80") 
  {
    $pageURL .= $_SERVER["SERVER_NAME"] . ":" . $_SERVER["SERVER_PORT"] . $_SERVER["REQUEST_URI"];
  } 
  else
  {
    $pageURL .= $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
  }
  return $pageURL;
}
?>

<?php
include '../foot.php';
?>
