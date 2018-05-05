<?php
	session_start(); 
	include ('conn.php');
	mysqli_query($conn,"set names utf8");
	$sql = 'select * from system';
	$res= mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($res);
?>
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
			$perNumber=10; //每页显示记录数
			$page=$_GET['page']; //获得当前页面值
			$count1=mysqli_query($conn,"select count(*) from list"); //获得记录总数
			$rs=mysqli_fetch_array($count1);
			$totalNumber=$rs[0];
		?>
		<div class="container-fluid">
	    <div class="jumbotron">
		    <h1>校园表白墙</h1>  
		  <p><?php echo file_get_contents("https://sslapi.hitokoto.cn/?encode=text"); ?>
    </body>
</html></p>
		    <p><a class="btn btn-primary btn-lg" role="button" href="call.php">我要表白</a></p>
	    </div>
	    <div class="alert alert-success" role="alert">
			 校园表白墙<br/>
			 已经有<span class="badge"><?php echo $totalNumber ?></span>条表白被发布
	    </div>
	    <div class="alert alert-info" role="alert">
		    <div class="clearfix">
		        <form method="post" action="search.php" name="search">
			        <div class="col-lg-6">
			            <div class="input-group">
				            <input type="text" class="form-control" placeholder="填写要搜索的表白对象..." name="search" />
				            <span class="input-group-btn">
				                <button class="btn btn-default" type="submit" value="Search">搜索</button>
				            </span>
			            </div>
			    	</div>
		        </form>
		    </div>
	    </div>
		<?php
			$totalPage=ceil($totalNumber/$perNumber);
			if (!isset($page)) {
			 $page=1;
			}
			$startCount=($page-1)*$perNumber;
			$result=mysqli_query($conn,"select * from list order by id desc limit $startCount,$perNumber"); //根据前面计算出开始记录和记录数
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
	    <div class="clearfix shijian2">
	    	页数：<?php echo $page ?>/<?php echo $totalPage ?></div>
		    <ul class="pagination  pagination-lg">
			    <li><a href="index.php?page=1">首页</a></li>
			    <?php
				if ($page != 1) {
				?>
			    <li><a href="index.php?page=<?php echo $page - 1;?>">上页</a></li>
			    	<?php
						}
						$fen=5;
						$zong=ceil($page/$fen);
						$szong=($zong-1)*5;
						for ($i=$szong+1;$i<=$szong+1;$i++) {  //循环显示出页面
					?>
			    <li><a class="pagination-a" href="index.php?page=<?php echo $page;?>"><?php echo $page ;?></a></li>
			    	<?php
						}
						if ($page<$totalPage) { //page小于总页数,显示下页链接
					?>
			    <li><a href="index.php?page=<?php echo $page + 1;?>">下页</a></li>
			    	<?php
					}
					?>
			    <li><a href="index.php?page=<?php echo $totalPage;?>">尾页</a></li>
				
				<li><span id="showsectime"></span>
<script type="text/javascript">
function NewDate(str) { 
str = str.split('-'); 
var date = new Date(); 
date.setUTCFullYear(str[0], str[1] - 1, str[2]); 
date.setUTCHours(0, 0, 0, 0); 
return date; 
} 
function showsectime() {
var birthDay =NewDate("2018-05-01");
var today=new Date();
var timeold=today.getTime()-birthDay.getTime();
var sectimeold=timeold/1000
var secondsold=Math.floor(sectimeold);
var msPerDay=24*60*60*1000; var e_daysold=timeold/msPerDay;
var daysold=Math.floor(e_daysold);
var e_hrsold=(daysold-e_daysold)*-24;
var hrsold=Math.floor(e_hrsold);
var e_minsold=(hrsold-e_hrsold)*-60;
var minsold=Math.floor((hrsold-e_hrsold)*-60); var seconds=Math.floor((minsold-e_minsold)*-60).toString();
document.getElementById("showsectime").innerHTML = "本站已安全运行"+daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";
setTimeout(showsectime, 1000);
}showsectime();
</script></li>	
	</ul>
	<div class="panel panel-info">
		<div class="panel-body">
		<strong>原作者：<a href="https://github.com/soulfme/SchoolShowLove">荧焤</a></strong></br>
		<strong>维护者：<a href="https://moem.ml/">灵萌</a></strong></br>
		<strong>本作品采用<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/4.0/">知识共享署名-非商业性使用-禁止演绎 4.0 国际许可协议</a>进行许可。</strong>
	</div></div>
	</body>
</html>
