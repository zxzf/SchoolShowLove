<?php
	$mysql_server_name='数据库地址';
	$mysql_username='数据库账号';
	$mysql_password='数据库密码';
	$mysql_database='数据库名';
	$conn = mysql_connect($mysql_server_name,$mysql_username,$mysql_password);
	if (!$conn)
	{
		echo "<script>alert('连接数据库失败!');</script>";
		die('连接数据库失败： ' . mysql_error());
	}
	mysql_select_db($mysql_database,$conn);
	
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) 
{
    $list = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
    $_SERVER['REMOTE_ADDR'] = $list[0];
}
	if ($_COOKIE["message"]){
	}else{
	setcookie("message", "yes", time()+43200);
	echo "<script>alert('欢迎进入校园表白墙，使用本服务之前请保证不会恶意发布信息、不会诽谤辱骂他人，否则将封锁IP并移交有关机关立案审查。')</script>";
	}
?>