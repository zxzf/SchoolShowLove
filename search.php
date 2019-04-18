﻿<?php
	session_start(); 
	include ('conn.php');
	mysqli_query($conn,"set names utf8");
	$sql = 'select * from system';
	$res=mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	$searchs = $_POST['search'];
?>
<!DOCTYPE html>
<html lang="zh_cn">
	<head>
		<title><?php echo $row['title'];?> - <?php echo $row['titlesm'];?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="bb.css" />
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
	</head>
	<body>
		<div class="bodydiv">
		<?php
			$count1=mysqli_query($conn,"select count(*) from list where toname = '".$searchs."'"); //获得记录总数
			$rs=mysqli_fetch_array($count1);
			$totalNumber=$rs[0];
		?>
		<div class="container-fluid">
	    <div class="jumbotron">
		    <h1>留言板</h1>
		    <p>leave something</p>
		    <p><a class="btn btn-primary btn-lg" role="button" href="call.php">CALL！</a></p>
	    </div>
	    <div class="alert alert-success" role="alert">
			<?php echo $row1['name'];?>留言板<br/>
			您搜索到<span class="badge"><?php echo $totalNumber ?></span>条内容
	    </div>
	    <div class="alert alert-info" role="alert">
	    	您搜索的内容：<?php echo $searchs;?>
	    	<a href="index.php">返回首页</a>
	    </div>
		<?php
			$result=mysqli_query($conn,"select * from list where toname ='".$searchs."'order by id desc limit 99999"); //根据前面计算出开始记录和记录数
			while ($rows=mysqli_fetch_array($result)) {
		?>
	    <div class="panel panel-info">
	    	<div class="panel-heading"><strong>TO：<?=$rows[toname] ?></strong>
	        <div class="shijian"><?=$rows[lastdate]?></div>
	    </div>
	    <div class="panel-body">
	      	<p>&nbsp;&nbsp;&nbsp;&nbsp;<?=$rows[content]?></p>
	        <div class="shijian2">FROM：<?=$rows[fromname] ?></div>
	    </div>
	    </div>
	    <?php
			}
		?>

	</body>
</html>
