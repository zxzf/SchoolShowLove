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
?>