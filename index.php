<?php
/*
file:index.php
Help: https://blog.junsangs.com/
*/
include 'header.php';
$y = xss_clean(daddslashes($_GET['y']));
if($y == ''){ $y=1;}
$a = 10*($y-1);
$b = 10*$y;
  $sql = "SELECT * FROM `sillyli_lovemsg` order by id desc limit $a,$b";
  $num = $conn->query($sql);
  $row = $num->fetchAll();
?>
<div class="wrap">
<div class="main">
<?php
  $j = count($row);
  if($j>10){
   $j =10;
  }
  $i = 0;
  while($i <= $j-1 ){
?>
  <div class="point">
    <div class="zzan">
      <a href="javascript:" class="jzan"><span id="<?php echo $id = $row[$i]['id'] ?>"><?php echo $row[$i]['zan'] ?></span>
      <img src="images/zan.png" alt="zan" class="zan" /></a>  
    </div>
      <div class="sshare">
          <a href="php/one.php?id=<?php echo $id = $row[$i]['id'] ?>"><img src="images/share.png" alt="share" class="share" />分享</a>
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
        <p><span class="towho">来自<?php echo $row[$i]['towho'] ?>：</span><?php echo $row[$i]['msg'] ?></p>
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
 <?php $i++; } ?>
  <div class="page"><div>
<?php
$sql = "select count(id) from `sillyli_lovemsg` ";
$num = $conn->query($sql);
$row = $num->fetch();
$j = $row['count(id)'];
if($j > 10){
 $ye = ceil($j/10);
 $y1 = 1;
 if($y>4){
   $y1 =$y-4;
   $rrt = $y - 1;
   echo '<a class="first" href="/index.php?y=1">1...</a> <a class="prev" href="/index.php?y='.$rrt.'"><<</a>';
 }
 while($y1 < $y){
  echo '<a class="num" href="/index.php?y='.$y1.'">'.$y1.'</a>';
  $y1++;
 }
 echo '<span class="current">'.$y.'</span>';
 $y2 = $y+1;
 while($y2-$y < 6 and $y2 < $ye){
  echo '<a class="num" href="/index.php?y='.$y2.'">'.$y2.'</a>';
  $y2++;
 }
  $yn = $y+1;
  echo '<a class="next" href="/index.php?y='.$yn.'">>></a> <a class="end" href="/index.php?y='.$ye.'">'.$ye.'</a></div></div>';
}
?>
</div>
<?php
include 'foot.php';
?>
