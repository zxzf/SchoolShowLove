	<?php
	if ($_COOKIE["disagree"]){//判断是否同意
	echo "<script>alert('你已拒绝本网站服务条款。')</script>";
	echo "<script>window.location.href='index.php'</script>";
	}else{
	echo "<script>alert('请仔细阅读本页面内容。')</script>";
	}
	?>
	<title>校园表白墙服务条款</title>
	<form name="pact" method="post" action="call.php">
	<meta name="theme-color" content="#de698c">
	<link rel="stylesheet" href="bb.css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous"/>
	<meta content="yes" name="apple-mobile-web-app-capable">
	<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
	<div class="bodydiv" style="margin-top: 10px;">
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading" align="center">
					<h3 class="panel-title">校园表白墙服务条款</h3>
				</div>
				<div class="panel-body">
						<div class="alert alert-danger" role="alert">
							<strong>内容</strong>
						</div>
						<div class="alert alert-warning" role="alert">
							<strong>内容</strong>
						</div>
						<button onclick="setcookie('agree')">我同意</button><button onclick="setcookie('disagree')">我不同意</button>
						<script>
						function setcookie(cookie)
						{
						document.cookie = cookie + "="+ cookie;
						}
						</script>
					</form>
				</div>
			</div>
		</div>