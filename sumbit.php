<?php
	include ('conn.php');
	ob_start();
	header("Content-type: text/html; charset=utf-8");
	mysqli_query($conn,"set names utf8");
	ini_set("output_buffering", "1");
	setcookie("userip", "yes" , time()+300);
	$name = $_POST['realname'];
	$to = $_POST['towho'];
	$qq = $_POST['qq'];
	$content = $_POST['content'];
	$ip = $_SERVER["REMOTE_ADDR"];
	date_default_timezone_set('Etc/GMT-8');
	$lastdate = date("Y-m-d H:i");
	$sql = "insert into list (fromname,toname,content,lastdate,ip,qq)  values('$name','$to','$content','$lastdate','$ip','$qq')";
	$result = mysqli_query($conn,$sql);
	header('Location:index.php');
?>