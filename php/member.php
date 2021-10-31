<?php
if(!defined('IN_CRONLITE'))exit();
include_once(SYSTEM_ROOT."db.class.php");
$my=isset($_GET['my'])?$_GET['my']:null;

$clientip=$_SERVER['REMOTE_ADDR'];

if(isset($_COOKIE["admin_token"]))
{
	if($_COOKIE['selectam'] == 'dl'){
	   $res=$DB->query("select admin_user,admin_pwd from sillyli_daili where admin_user='{$_COOKIE['user']}'");
       $conf=$DB->fetch($res);
	}

	$token=authcode(daddslashes($_COOKIE['admin_token']), 'DECODE', SYS_KEY);
	list($user, $sid) = explode("\t", $token);
	$session=md5($conf['admin_user'].$conf['admin_pwd'].$password_hash);
	if($session==$sid) {
		$islogin=1;
	}
}
?>