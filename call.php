<?php
	include ('conn.php');
	mysqli_query($conn,"set names utf8");
	$sql = 'select * from system';
	$res=mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
	if ($_COOKIE["disagree"]){//判断是否同意
	echo "<script>alert('你已拒绝本网站服务条款。')</script>";
	echo "<script>window.location.href='index.php'</script>";
	}else{
		if ($_COOKIE["agree"]){
		}else{	
		echo "<script>window.location.href='pact.php'</script>";
		}
	}
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
			    if (validate_required(content,"请填写内容")==false)
			    {content.focus();return false}
			}
			with (thisform)
			{
			    if (validate_required(realname,"请填写昵称")==false)
			    {realname.focus();return false}
			}
			with (thisform)
			{
			    if (validate_required(towho,"请填写栏目")==false)
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
			echo "<script>alert('五分钟内只能发布一次哦！')</script>";
			echo "<script>window.location.href='index.php'</script>";
		}
		?>
		<div class="container-fluid">
			<div class="panel panel-info">
				<div class="panel-heading" align="center">
					<h3 class="panel-title"></h3>
				</div>
				<div class="panel-body">
					<form name="addForm" method="post" action="sumbit.php" onsubmit="return validate_form(this)" >
						<div class="alert alert-warning" role="alert">
							<strong>使用说明：</strong></br>
							
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
						<input name="towho" class="form-control" placeholder="发表栏目..." required="" autofocus=""></br>
						<input name="qq" class="form-control" placeholder="你的QQ,不会显示出来..." autofocus=""></br>
						<textarea class="form-control" name="content" placeholder="留言内容（不超过140字）" rows="3" onkeyup='value=value.substr(0,140);this.nextSibling.innerHTML=value.length+"/140";'></textarea></br>
						<input  class="btn btn-primary btn-lg btn-block" TYPE="submit" name="submit" value="CALL！" />
					</form>
				</div>
			</div>
		</div>
	</div>
	</body>
</html>
