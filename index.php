<?php
	session_start(); 
	include ('conn.php');
	mysql_query("set names utf8");
	$sql = 'select * from system';
	$res= mysql_query($sql);
	$row = mysql_fetch_array($res);
?>
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
			$perNumber=10; //每页显示记录数
			$page=$_GET['page']; //获得当前页面值
			$count1=mysql_query("select count(*) from list"); //获得记录总数
			$rs=mysql_fetch_array($count1);
			$totalNumber=$rs[0];
		?>
		<div class="container-fluid">
	    <div class="jumbotron">
		    <h1>吉安一中校园表白墙</h1>  
		  <p><script type="text/javascript" src="https://api.imjad.cn/hitokoto/?encode=js&charset=utf-8"></script>
        <p id="hitokoto"><script>hitokoto()</script></p>
        <script>
            function Ajax(type, url, data, success, failed){
                // 创建ajax对象
                var xhr = null;
                if(window.XMLHttpRequest){
                    xhr = new XMLHttpRequest();
                } else {
                    xhr = new ActiveXObject('Microsoft.XMLHTTP')
                }
             
                var type = type.toUpperCase();
                // 用于清除缓存
                var random = Math.random();
             
                if(typeof data == 'object'){
                    var str = '';
                    for(var key in data){
                        str += key+'='+data[key]+'&';
                    }
                    data = str.replace(/&$/, '');
                }
             
                if(type == 'GET'){
                    if(data){
                        xhr.open('GET', url + '?' + data, true);
                    } else {
                        xhr.open('GET', url + '?t=' + random, true);
                    }
                    xhr.send();
             
                } else if(type == 'POST'){
                    xhr.open('POST', url, true);
                    // 如果需要像 html 表单那样 POST 数据，请使用 setRequestHeader() 来添加 http 头。
                    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xhr.send(data);
                }
             
                // 处理返回数据
                xhr.onreadystatechange = function(){
                    if(xhr.readyState == 4){
                        if(xhr.status == 200){
                            success(xhr.responseText);
                        } else {
                            if(failed){
                                failed(xhr.status);
                            }
                        }
                    }
                }
            }
            
            Ajax(  //Ajax(type, url, data, success, failed)
                'get', 
                'https://api.imjad.cn/hitokoto/counter.php', 
                '', 
                function(data){
                    data = JSON.parse(data);
                    document.getElementById("index").innerHTML = data.index;
                    document.getElementById("api").innerHTML = data.api;
                    document.getElementById("data_uid").innerHTML = data.data_uid;
                    document.getElementById("hit").innerHTML = data.hit;
                    document.getElementById("number").innerHTML = data.number;
                    document.getElementById("number_uid").innerHTML = data.number_uid;
                }, 
                function(error){
                    var spans = document.getElementsByClassName("update")[0].getElementsByTagName("span");
                    for (var i=0;i<spans.length;i++){
                        spans[i].innerHTML = "读取失败";
                    }
                });
        </script>
    </body>
</html></p>
		  
		    <p><a class="btn btn-primary btn-lg" role="button" href="call.php">我要表白</a></p>
	    </div>
	    <div class="alert alert-success" role="alert">
			 吉安一中校园表白墙<br/>
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
			$result=mysql_query("select * from list order by id desc limit $startCount,$perNumber"); //根据前面计算出开始记录和记录数
			while ($rows=mysql_fetch_array($result)) {
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
var birthDay =NewDate("2017-10-01");
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
	</body>
</html>