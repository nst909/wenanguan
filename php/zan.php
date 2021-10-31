<?php
include 'common.php';

$id = xss_clean(daddslashes($_POST['gid']));
$zanid = xss_clean(daddslashes($_COOKIE['zan_'.$id]));
if($zanid == $id){
echo '-1';
die();
}

setcookie('zan_'.$id,$id,time()+864000,'/');

$sql = "UPDATE `sillyli_lovemsg` SET `zan` = zan + 1 WHERE `id` = '".$id."'";
$conn->query($sql);
echo '1';