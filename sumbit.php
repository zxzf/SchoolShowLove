<?php
namespace Aliyun\DySDKLite\Sms;
require_once "SignatureHelper.php";
use Aliyun\DySDKLite\SignatureHelper;
function sendSms($toname,$fromname,$phone) {
    $params = array ();
    $accessKeyId = "阿里云accessKeyId";
    $accessKeySecret = "阿里云accessKeySecret";
    $params["PhoneNumbers"] = "$phone";
    $params["SignName"] = "阿里云短信签名";
    $params["TemplateCode"] = "阿里云短信CODE";
    $params['TemplateParam'] = Array (
        "toname" => "$toname",
        "fromname" => "$fromname"
    );
    $params['OutId'] = "12345";
    $params['SmsUpExtendCode'] = "1234567";
    if(!empty($params["TemplateParam"]) && is_array($params["TemplateParam"])) {
        $params["TemplateParam"] = json_encode($params["TemplateParam"], JSON_UNESCAPED_UNICODE);
    }
    $helper = new SignatureHelper();
    $content = $helper->request(
        $accessKeyId,
        $accessKeySecret,
        "dysmsapi.aliyuncs.com",
        array_merge($params, array(
            "RegionId" => "cn-hangzhou",
            "Action" => "SendSms",
            "Version" => "2017-05-25",
        ))
    );
    return $content;
}
// ini_set("display_errors", "on");
// error_reporting(E_ALL);
// set_time_limit(0);
// header("Content-Type: text/plain; charset=utf-8");
// print_r(sendSms());
?>
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
	$phone = $_POST['phone'];
	$ip = $_SERVER["REMOTE_ADDR"];
	$key = $_POST['key'];
	date_default_timezone_set('Etc/GMT-8');
	$lastdate = date("Y-m-d H:i");
	$smsa = "SELECT * FROM `sms` WHERE `key` = '$key'";
	$smsb = mysqli_query($conn,$smsa);
	$smsc = mysqli_fetch_array($smsb);
	if($smsc['money']>0){
		sendSms($to,$name,$phone);
		$ok = "update sms set money = money - 1 ";
		$result = mysqli_query($conn,$ok);
	}
	$sql = "insert into list (fromname,toname,content,lastdate,ip,qq,phone)  values('$name','$to','$content','$lastdate','$ip','$qq','$phone')";
	$result = mysqli_query($conn,$sql);
	header('Location:index.php');
?>