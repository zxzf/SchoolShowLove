<?php
	include ('conn.php');
	mysql_query("set names utf8");
	$sql = 'select * from system';
	$res=mysql_query($sql);
	$row = mysql_fetch_array($res);
?>
<html lang="zh_cn">
	<head>
		<title><?php echo $row['title'];?></title>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous"/>
		<link rel="stylesheet" href="bb.css" />
		<meta content="yes" name="apple-mobile-web-app-capable">
		<meta name="viewport" content="width=device-width,height=device-height,inital-scale=1.0,maximum-scale=1.0,user-scalable=no;">
		<script type="text/javascript">
			function validate_required(field,alerttxt)
			{
			    with (field)
			    {
			      if (value==null||value=="")
			        {alert(alerttxt);return false}
			      else {return true}
			    }
			}
			function validate_form(thisform)
			{
			with (thisform)
			{
			    if (validate_required(content,"请填写表白内容")==false)
			    {content.focus();return false}
			}
			with (thisform)
			{
			    if (validate_required(realname,"请填写昵称")==false)
			    {realname.focus();return false}
			}
			with (thisform)
			{
			    if (validate_required(towho,"请填写表白对象")==false)
			    {towho.focus();return false}
			}
			}
		</script>
	</head>
	<body>
	<div class="bodydiv" style="margin-top: 10px;">
		<?php
		error_reporting(E_ALL^E_WARNING^E_NOTICE);
		if ($_COOKIE["userip"]=='yes'){
			echo "<script>alert('亲，五分钟内只能表白一次哦！')</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
		?>
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading" align="center">
					<h3 class="panel-title">书写出心中的那份爱</h3>
				</div>
				<div class="panel-body">
					<form name="addForm" method="post" action="sumbit.php" onsubmit="return validate_form(this)" >
						<div class="alert alert-warning" role="alert">
							<strong>使用说明：</strong></br>
							<span class="glyphicon glyphicon-ok-sign"></span>
							昵称部分请凭个人意愿填写真实姓名或者昵称</br>
							<span class="glyphicon glyphicon-ok-sign"></span>
							表白对象建议加上对方的班级</br>
							<span class="glyphicon glyphicon-ok-sign"></span>
							为防止刷屏，每隔5分钟可以发布一次消息
						</div>
						<div class="alert alert-danger" role="alert">
							<strong>请注意:</strong></br>
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							您的IP地址为：<?php echo $_SERVER["REMOTE_ADDR"];?>，IP地址已记录</br>
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							现在的标准时间为：<?php date_default_timezone_set('Etc/GMT-8');  echo date("Y-m-d H:i",time()) ?></br>
							<span class="glyphicon glyphicon-exclamation-sign"></span>
							发布言论请遵守法律法规和<?php echo $row['school'];?>管理章程
						</div>
						<input name="from" value="call" style="display: none;">
						<input name="realname" class="form-control" placeholder="昵称..." required="" autofocus="autofocus"></br>
						<input name="towho" class="form-control" placeholder="送给..." required="" autofocus=""></br>
						<textarea class="form-control" name="content" placeholder="留言内容（不超过140字）" rows="3" onkeyup='value=value.substr(0,140);this.nextSibling.innerHTML=value.length+"/140";'></textarea></br>
						<input  class="btn btn-primary btn-lg btn-block" TYPE="submit" name="submit" value="发布表白" />
					</form>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>