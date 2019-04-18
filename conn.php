<?php
	$mysql_server_name='localhost';
	$mysql_username='root';
	$mysql_password='root';
	$mysql_database='bbq';
	$conn = mysqli_connect($mysql_server_name,$mysql_username,$mysql_password,$mysql_database);
	if (!$conn)
	{
		echo "<script>alert('连接数据库失败!');</script>";
		die('连接数据库失败： ' . mysql_error());
	}
	
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR'])) 
{
    $list = explode(',',$_SERVER['HTTP_X_FORWARDED_FOR']);
    $_SERVER['REMOTE_ADDR'] = $list[0];
}
	if ($_COOKIE["message"]){
	}else{
	setcookie("message", "yes", time()+43200);
	echo "<script>alert('欢迎使用广播站留言板，请保持您的形象')</script>";
	}
?>
