<?php
use think\Db;
use pay\epay;
$user=Db::name('user')->where('id',session("userid"))->find();
$file=file_exists(PATH."/plugins/pay/".$data1["plugins"]."/set.php");
if($file){
if($data1["data"]){
$ppay=json_decode($data1["data"],true);
}else{
exit("<title>出错啦!</title>没有参数文件!");
}
}else{
exit("<title>出错啦!</title>没有参数文件!");
}
//商户url
$epay_config['apiurl'] = $ppay["0"]["value"];

//商户ID
$epay_config['pid'] = $ppay["1"]["value"];

//商户密钥
$epay_config['key'] = $ppay["2"]["value"];
$epay = new epay($epay_config);
$verify_result = $epay->verifyReturn();
if($verify_result) {//验证成功
	//商户订单号
	$out_trade_no = $_GET['out_trade_no'];
	//支付宝交易号
	$trade_no = $_GET['trade_no'];
	//交易状态
	$trade_status = $_GET['trade_status'];
	//支付方式
	$type = $_GET['type'];
	if($_GET['trade_status'] == 'TRADE_SUCCESS') {
$db=Db::name('pay')->where([
"ordernumber"=>$out_trade_no,
"userid"=>$user["id"],
])->find();
if($db){
if($db["state"]=="1"){
	$msg="充值成功!";
}else{
$db1=Db::name('user')->where('id',session("userid"))->update([
"money"=>round($user["money"]+$db["money"],2),
]);
$db2=Db::name('pay')->where([
"ordernumber"=>$out_trade_no,
"userid"=>$user["id"],
])->update([
"state"=>"1",
]);
	$msg="充值成功";
}
}else{
	$msg="未找到该订单";
}
	}else{
$msg="trade_status=".$_GET['trade_status'];
}
}else {
	//验证失败
	$msg="验证失败";
}
	