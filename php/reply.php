<?php
include 'common.php';

$gid = xss_clean(daddslashes($_POST['id']));
$reply = xss_clean(daddslashes($_POST['reply']));
$qq = xss_clean(daddslashes($_POST['qq']));
$nname = xss_clean(daddslashes($_POST['nname']));
$time = time();

if($reply== '' or $gid == ''){ die('error'); }

if($reply !== '' and $nname == ''){
  $qq = xss_clean(daddslashes($_COOKIE["qq"]));
  $nname = xss_clean(daddslashes($_COOKIE["nname"]));
}
if($nname == ''){
  setcookie("nname",'',time()-3600,"/");
  die('-1');
}
if($qq == ''){
  setcookie("qq",'',time()-3600,"/");
  die('-1');
}

setcookie("qq",$qq,time()+3600,"/");
setcookie("nname",$nname,time()+3600,"/");

$sql = "INSERT INTO `sillyli_reply`(`gid`, `qq`, `nname`, `reply`, `time`) VALUES ('".$gid."','".$qq."','".$nname."','".$reply."','".$time."')";
$conn->query($sql);
echo '1';
?>