<?php
include 'common.php';
$qq = xss_clean(daddslashes($_POST['qq']));
$realname = xss_clean(daddslashes($_POST['realname']));
$towho = xss_clean(daddslashes($_POST['towho']));
$msg = xss_clean(daddslashes($_POST['content']));
$time = time();

if($realname == ''){
    die('-3');
}
if($qq !== ''){
  if($qq>9999999999 or $qq<10000){
   die('-4');
  }
}
if($towho == '' or $msg == ''){
    die('0');
}

$sql = "INSERT INTO `sillyli_lovemsg`(`qq`, `realname`, `towho`, `msg`, `time`, `zan`) VALUES ('".$qq."','".$realname."','".$towho."','".$msg."','".$time."',0)";
$conn->query($sql);
echo '1';

?>