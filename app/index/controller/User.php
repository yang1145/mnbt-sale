<?php
namespace app\index\controller;
use think\Controller;
use think\Db;
use think\Request;
use PHPMailer\PHPMailer\PHPMailer;


class User extends Controller {
	public function _initialize() {
		$this->web=Db::name('web')->where('id',1)->find();
if($this->web["wh"]=="1"){
exit($this->web["whxx"]);
}
		if(!session("userid")) {
			$this->redirect('/login');
		}else{
			$userstate="1";
}
		$this->user=Db::name('user')->where('id',session("userid"))->find();
if(!$this->user || $this->user["state"]=="0"){
session("userid",null);
$this->redirect('/login');
}
$file=file_exists(PATH."/app/index/view/".$this->web["template"]."/set.php");
if($file){
if($this->web["templateset"]){
$tempset=json_decode($this->web["templateset"],true);
$templateset=array(""=>"");
for($i=0;$i<count($tempset);$i++){
$templateset=array_merge($templateset,array($tempset[$i]["name"]=>$tempset[$i]["value"]));
}
}else{
$templateset=array(""=>"");
}
}else{
$templateset=array(""=>"");
}
		$this->assign([
		            'webname'  => $this->web['name'],
		            'description'  => $this->web['description'],
		            'keywords'  => $this->web['keywords'],
		            'favicon'  => $this->web['favicon'],
		"user"=>$this->user,
		"userstate"=>$userstate,
"templateset"=>$templateset,
		        ]);
	}




public function aff(){
if(!$this->user["aff"]){
if(Request::instance()->isPost()) {
while(true){
$affsj=random("6");
$data=Db::name('user')->where('aff',$affsj)->find();
if(!$data){
$user=Db::name('user')->where('id',session("userid"))->update([
"aff"=>$affsj,
]);
break;
}
}
	$array["code"]="1";
	$array["msg"]="开启推广成功!";
return $array;
}
return $this->fetch('/'.$this->web["template"].'/user/aff',[
]);
}else{
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="txye"){
if($this->user["affmoney"]< $this->web["affwithdrawal"]){
$array["code"]="-1";
$array["msg"]="最小提现金额为:".$this->web["affwithdrawal"];
}else{
$data=Db::name('user')->where('id',session("userid"))->update([
"money"=>$this->user["money"]+$this->user["affmoney"],
"affmoney"=>"0",
]);
if($data){
$data1=Db::name('afftxjl')->insertGetId([
"information"=>"提现到账户余额",
"money"=>$this->user["affmoney"],
"userid"=>session("userid"),
"state"=>"1",
"time"=>time(),
]);
$array["code"]="1";
$array["msg"]="已成功提现到账户余额!";
}else{
$array["code"]="-1";
$array["msg"]="提现到余额失败!";
}
}

return $array;
}

if($act=="txzfb"){
$zfbxm=input("zfbxm");
$zfbzh=input("zfbzh");
if($zfbxm=="" || $zfbzh==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if($this->user["affmoney"]< $this->web["affwithdrawal"]){
$array["code"]="-1";
$array["msg"]="最小提现金额为:".$this->web["affwithdrawal"];
}else{
$data=Db::name('user')->where('id',session("userid"))->update([
"affmoney"=>"0",
]);
if($data){
$data1=Db::name('afftxjl')->insertGetId([
"information"=>"提现到支付宝账户,姓名:<span style='color:#ff6b6b'>".$zfbxm."</span>账号:<span style='color:#ff6b6b'>".$zfbzh."</span>",
"money"=>$this->user["affmoney"],
"userid"=>session("userid"),
"state"=>"0",
"time"=>time(),
]);
if($this->web["email"]=="1"){
$admin=Db::name('admin')->where("id","1")->find();
if($admin["mail"]){
$mailbox=$this->email($admin["mail"],"推广余额提现通知","账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."申请支付宝提现!<br/>提现记录ID为:".$data1."<br/><br/>");
}
}
$array["code"]="1";
$array["msg"]="提现申请已提交!";
}else{
$array["code"]="-1";
$array["msg"]="提现到余额失败!";
}
}
}
return $array;
}


}


$affsymoney=Db::name("affsymoney")->where("userid",session("userid"))->order('id desc')->paginate(10);

$afftxjl=Db::name("afftxjl")->where("userid",session("userid"))->order('id desc')->paginate(10);
$affuser=Db::name("user")->where("upperid",session("userid"))->order('id desc')->paginate(10);
//exit(dump($affuser));
$web=$this->web;
return $this->fetch('/'.$this->web["template"].'/user/affs',[
"affurl"=>(isHTTPS() ? 'https://' : 'http://').$_SERVER['HTTP_HOST']."/aff/".$this->user["aff"],
"affdiscount"=>$web["affdiscount"]*100,
"affwithdrawal"=>$web["affwithdrawal"],
"affsymoney"=>$affsymoney,
"afftxjl"=>$afftxjl,
"affus"=>$affuser,
]);



}
}


public function transfer(){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="validate"){
$captcha=input("captcha");
if($captcha==""){
	$array["code"]="-1";
	$array["msg"]="必填参数不可为空!";
}else{
if(!captcha_check($captcha)){
	$array["code"]="-1";
	$array["msg"]="验证码错误!";
}else{
$random=random("6");
session("ghid",$this->user["id"]);
session("ghyzm",$random);
if($this->web["email"]=="1"){
if($this->user["mail"]){
$mailbox=$this->email($this->user["mail"],"产品过户通知","你账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."申请产品过户!<br/>验证码:".$random."<br/><br/>");
$array["code"]="1";
$array["msg"]="发送验证码成功!";
}else{
	$array["code"]="-1";
	$array["msg"]="没有绑定邮箱!";
}
}else{
$array["code"]="-1";
$array["msg"]="本站未开启邮箱提醒!";
}
}
}
return $array;
}

if($act=="transfer"){
$code=input("code");
$orderid=input("orderid");
$newuserid=input("newuserid");
if($code=="" || $orderid=="" || $newuserid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if(!session("ghid") || !session("ghyzm")){
$array["code"]="-1";
$array["msg"]="请你重新获取验证码!";
}else{
if(session("ghid")!=$this->user["id"]){
$array["code"]="-1";
$array["msg"]="账号不匹配,请你重新获取验证码!";
}else{
if($code==session("ghyzm")){
if($newuserid==session("userid")){
$array["code"]="-1";
$array["msg"]="过户的用户ID不能为自己!";
}else{
$data=Db::name("order")->where([
"id"=>$orderid,
"userid"=>session("userid"),
])->find();
if($data){
$data1=Db::name("user")->where("id",$newuserid)->find();
if($data1){
$data2=Db::name("order")->where("id",$data["id"])->update([
"userid"=>$newuserid,
]);
if($data2){
session("ghid",null);
session("ghyzm",null);
if($this->web["email"]=="1"){
if($data1["mail"]){
$mailbox=$this->email($data1["mail"],"产品接收通知","账号:".$data1["user"]."在时间:".date("Y-m-d H:i:s")."接收产品成功!<br/>产品ID:".$orderid."<br/>它的账户ID:".session("userid")."<br/><br/>");
}
if($this->user["mail"]){
$mailbox1=$this->email($this->user["mail"],"过户成功通知","账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."过户产品成功!<br/>过户产品ID:".$orderid."<br/>过户的账号ID:".$newuserid."<br/><br/>");
}
}
$data4=Db::name('transferrecord')->insertGetId([
"userid"=>session("userid"),
"record"=>"产品ID:".$orderid.",过户给用户ID:".$newuserid,
"time"=>time(),
]);

$data5=Db::name('transferrecord')->insertGetId([
"userid"=>$newuserid,
"record"=>"接受产品ID:".$orderid.",过户者ID:".session("userid"),
"time"=>time(),
]);
$array["code"]="1";
$array["msg"]="过户成功!";
}else{
$array["code"]="-1";
$array["msg"]="过户失败!";
}
}else{
$array["code"]="-1";
$array["msg"]="你要过户的用户ID不存在!";
}
}else{
$array["code"]="-1";
$array["msg"]="产品不存在!";
}
}
}else{
$array["code"]="-1";
$array["msg"]="邮箱验证码错误!";
}
}
}
}
return $array;
}
}

$order=Db::name("order")->where("userid",session("userid"))->order('id desc')->select();
// 优化：批量查询 cart 表，避免 N+1 查询
$cartIds = array_unique(array_filter(array_column($order, 'cartid')));
$cartMap = [];
if (!empty($cartIds)) {
    $cartMap = Db::name('cart')->where('id', 'in', $cartIds)->column('name', 'id');
}
foreach ($order as &$orderItem) {
    $cid = $orderItem['cartid'];
    $orderItem['cartid'] = isset($cartMap[$cid]) ? $cartMap[$cid] : ('产品#' . $cid);
}
unset($orderItem);
return $this->fetch('/'.$this->web["template"].'/user/transfer',[
"order"=>$order,
]);
}

public function mail() {
if($this->user["mail"]){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="validate"){
$captcha=input("captcha");
if($captcha==""){
	$array["code"]="-1";
	$array["msg"]="必填参数不可为空!";
}else{
if(!captcha_check($captcha)){
	$array["code"]="-1";
	$array["msg"]="验证码错误!";
}else{
$random=random("6");
session("xgmail",$this->user["mail"]);
session("xgmailyzm",$random);
if($this->web["email"]=="1"){
if($this->user["mail"]){
$mailbox=$this->email($this->user["mail"],"修改邮箱通知","你账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."申请修改邮箱!<br/>验证码:".$random."<br/><br/>");
$array["code"]="1";
$array["msg"]="发送验证码成功!";
}else{
	$array["code"]="-1";
	$array["msg"]="没有绑定邮箱!";
}
}else{
$array["code"]="-1";
$array["msg"]="本站未开启邮箱提醒!";
}
}
}
return $array;
}

if($act=="modify"){
$code=input("code");
$newmail=input("newmail");
if($code=="" || $newmail==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if(!session("xgmail") || !session("xgmailyzm")){
$array["code"]="-1";
$array["msg"]="请你重新获取验证码!";
}else{
if(filter_var($newmail, FILTER_VALIDATE_EMAIL)){
if(session("xgmail")!=$this->user["mail"]){
$array["code"]="-1";
$array["msg"]="邮箱不匹配,请你重新获取验证码!";
}else{
if(session("xgmailyzm")==$code){
if($this->user["mail"]==$newmail){
$array["code"]="-1";
$array["msg"]="新邮箱与旧邮箱一样!";
}else{
$newuser=Db::name('user')->where('mail',$newmail)->find();
if($newuser){
$array["code"]="-1";
$array["msg"]="新的邮箱已被其他账号绑定!";
}else{
$data=Db::name('user')->where('id',session("userid"))->update([
"mail"=>$newmail,
]);
session("xgmail",null);
session("xgmailyzm",null);
if($data){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}

}
}
}else{
$array["code"]="-1";
$array["msg"]="邮箱验证码错误!";
}
}
}else{
$array["code"]="-1";
$array["msg"]="邮箱格式错误!";
}
}
}
return $array;
}




}
	return $this->fetch('/'.$this->web["template"].'/user/mail',[
]);
}else{











if(Request::instance()->isPost()) {
$act=input("act");
if($act=="validate"){
$captcha=input("captcha");
$mail=input("mail");
if($captcha=="" || $mail==""){
	$array["code"]="-1";
	$array["msg"]="必填参数不可为空!";
}else{
if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
if(!session("bdmail") || !session("bdmailyzm")){
$array["code"]="-1";
$array["msg"]="请你重新获取验证码!";
}else{
if(!captcha_check($captcha)){
	$array["code"]="-1";
	$array["msg"]="验证码错误!";
}else{
$random=random("6");
session("bdmail",$mail);
session("bdmailyzm",$random);
if($this->web["email"]=="1"){
$mailbox=$this->email($mail,"请求绑定邮箱通知","你账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."请求绑定邮箱!<br/>邮箱:".$mail."<br/>验证码:".$random."<br/><br/>");
$array["code"]="1";
$array["msg"]="发送验证码成功!";
}else{
$array["code"]="-1";
$array["msg"]="本站未开启邮箱提醒!";
}
}
}
}else{
$array["code"]="-1";
$array["msg"]="邮箱格式错误!";
}
}
return $array;
}

if($act=="modify"){
$code=input("code");
$mail=input("mail");
if($code=="" || $mail==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if(filter_var($mail, FILTER_VALIDATE_EMAIL)){
if(!session("bdmail") || !session("bdmailyzm")){
$array["code"]="-1";
$array["msg"]="请你重新获取验证码!";
}else{
if(session("bdmail")!=$mail){
$array["code"]="-1";
$array["msg"]="邮箱不匹配,请你重新获取验证码!";
}else{
if(session("bdmailyzm")==$code){
$newuser=Db::name('user')->where('mail',$mail)->find();
if($newuser){
$array["code"]="-1";
$array["msg"]="邮箱已被其他账号绑定!";
}else{
$data=Db::name('user')->where('id',session("userid"))->update([
"mail"=>$mail,
]);
if($data){
session("bdmail",null);
session("bdmailyzm",null);
$array["code"]="1";
$array["msg"]="绑定成功!";
}else{
$array["code"]="-1";
$array["msg"]="绑定失败!";
}
}

}else{
$array["code"]="-1";
$array["msg"]="邮箱验证码错误!";
}
}
}
}else{
$array["code"]="-1";
$array["msg"]="邮箱格式错误!";
}
}
return $array;
}




}










	return $this->fetch('/'.$this->web["template"].'/user/bdmail',[
]);
}
}



	public function index() {
$data=Db::name('order')->where("userid",session("userid"))->order('id desc')->limit(5)->select();
// 优化：批量查询 cart 表，避免 N+1 查询
$cartIds = array_unique(array_filter(array_column($data, 'cartid')));
$cartMap = [];
if (!empty($cartIds)) {
    $cartMap = Db::name('cart')->where('id', 'in', $cartIds)->column('name', 'id');
}
foreach ($data as &$dataItem) {
    $cid = $dataItem['cartid'];
    $dataItem['cartid'] = isset($cartMap[$cid]) ? $cartMap[$cid] : ('产品#' . $cid);
}
unset($dataItem);
$data1=Db::name('announcement')->order('id desc')->limit(5)->select();
$countorder=Db::name('order')->where("userid",session("userid"))->count();
$counthost=Db::name('order')->where(["userid"=>session("userid"),"state"=>["<>","3"]])->count();
$countticket=Db::name('ticket')->where("userid",session("userid"))->count();
		return $this->fetch('/'.$this->web["template"].'/user/index',[
"order"=>$data,
"announcement"=>$data1,
"countorder"=>$countorder,
"counthost"=>$counthost,
"countticket"=>$countticket,

]);
	}


public function information() {
if(Request::instance()->isPost()) {
$name=input("name");
$qq=input("qq");
$address=input("address");
if($name=="" || $qq==""){
$array["code"]="-1";
$array["msg"]="必填参数不能为空!";
}else{
$data=Db::name('user')->where('id',$this->user["id"])->update([
"name" =>$name,
"qq"=>$qq,
"address"=>$address,
]);
if($data){
$array["code"]="1";
$array["msg"]="修改资料成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改资料失败!";
}
}
return $array;
}
return $this->fetch('/'.$this->web["template"].'/user/information');
}

	public function password() {

		if(Request::instance()->isPost()) {
			$act=input("act");
			if($act=="jmmxg"){
			$password=input("userPwd");
			$newpassword=input("newUserPwd");
            $newuserrepwd=input("newUserRepwd");
if($password=="" || $newpassword=="" || $newuserrepwd==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if($newpassword!=$newuserrepwd){
	$array["code"]="-1";
	$array["msg"]="两次输入的新密码不一样!";
}else{
if($password==$newpassword){
	$array["code"]="-1";
    $array["msg"]="原始密码不能和新密码一样!";
}else{
			if(password_verify($password,$this->user["password"])) {
				$data=Db::name('user')->where('id',$this->user["id"])->update([
'password' =>password_hash($newpassword,PASSWORD_DEFAULT),
]);
				if($data) {
					$array["code"]="1";
					$array["msg"]="旧密码修改密码成功!";
if($this->web["email"]=="1"){
if($this->user["mail"]){
$mailbox=$this->email($this->user["mail"],"旧密码修改密码通知","你账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."在本站旧密码修改密码成功!<br/><br/>");
}
}
				} else {
					$array["code"]="-1";
					$array["msg"]="修改密码失败";
				}
			} else {
				$array["code"]="-1";
				$array["msg"]="原始密码错误!";
			}
}
}
}

			return $array;
			}
			
			if($act=="validate"){
$captcha=input("captcha");
if($captcha==""){
	$array["code"]="-1";
	$array["msg"]="必填参数不可为空!";
}else{
if(!captcha_check($captcha)){
	$array["code"]="-1";
	$array["msg"]="验证码错误!";
}else{
$random=random("6");
session("mmzh",$this->user["id"]);
session("mmyzm",$random);
if($this->web["email"]=="1"){
if($this->user["mail"]){
$mailbox=$this->email($this->user["mail"],"修改密码通知","你账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."申请修改密码!<br/>验证码:".$random."<br/><br/>");
$array["code"]="1";
$array["msg"]="发送验证码成功!";
}else{
	$array["code"]="-1";
	$array["msg"]="没有绑定邮箱!";
}
}else{
$array["code"]="-1";
$array["msg"]="本站未开启邮箱提醒!";
}
}
}
return $array;
}

if($act=="yxmmxg"){
$code=input("code");
$newpass=input("newpass");
if($code=="" || $newpass==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if(!session("mmzh") || !session("mmyzm")){
$array["code"]="-1";
$array["msg"]="请你重新获取验证码!";
}else{
if(session("mmzh")!=$this->user["id"]){
$array["code"]="-1";
$array["msg"]="账号不匹配,请你重新获取验证码!";
}else{
if(session("mmyzm")==$code){
$data=Db::name('user')->where('id',session("userid"))->update([
"password"=>password_hash($newpass,PASSWORD_DEFAULT),
]);
if($data){
session("mmzh",null);
session("mmyzm",null);
if($this->web["email"]=="1"){
if($this->user["mail"]){
$mailbox=$this->email($this->user["mail"],"邮箱修改密码通知","你账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."在本站邮箱修改密码成功!<br/><br/>");
}
}
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}

}else{
$array["code"]="-1";
$array["msg"]="邮箱验证码错误!";
}
}
}
}
return $array;
}




		}
		
		
		
		return $this->fetch('/'.$this->web["template"].'/user/password');
	}

	public function logout() {
		session("userid",null);
		$this->redirect('/login');
	}


	public function pay() {
	if(Request::instance()->isPost()) {
if(is_numeric(input("money"))){
if(!input("money")){
exit("<title>出错啦!</title>金额不可为空或为0!");
}else{
if(input("money")<"0.01"){
exit("<title>出错啦!</title>金额不可少于0.01!");
}else{
if(getLen(input("money"))>2){
exit("<title>出错啦!</title>金额的小数点后不能超过两位!");
}else{
$data1=Db::name('pays')->where([
'id'=>input("payid"),
"state"=>"1",
])->find();
if($data1){
@include PATH."plugins/pay/".$data1["plugins"]."/go.php";
}else{
exit("<title>出错啦!</title>支付方式不存在!");
}
}}
}
}else{
exit("<title>出错啦!</title>金额必须是数学!");
}
}
$data=Db::name("pays")->where("state","1")->select();
for($i=0;$i<count($data);$i++)  
   {
unset($data[$i]["plugins"]);
unset($data[$i]["data"]);
}
		return $this->fetch('/'.$this->web["template"].'/user/pay',[
"pay"=>$data,
"paycron"=>$this->web["paycron"],
]);
}

	public function return($id) {
$data1=Db::name('pays')->where('id',$id)->find();
if(!$data1){
exit("<title>出错啦!</title>没有此支付通道!");
}
@include PATH."plugins/pay/".$data1["plugins"]."/return.php";
return $this->fetch('/'.$this->web["template"].'/user/return',[
"msg"=>$msg,
]);
}

	public function order($id=null) {
if($id){

$data=Db::name('order')->where([
'id'=>$id,
"userid"=>session("userid"),
])->find();
if($data){
$a=Db::name('cart')->where('id',$data["cartid"])->find();
$b=Db::name('server')->where('id',$a["serverid"])->find();
if(Request::instance()->isPost()) {
$act=input("act");

@include PATH."plugins/host/".$b["serverplugins"]."/ClientArea.php";

if($act=="renew"){
$time=input("time");
if($time==""){
	$array["code"]="-1";
	$array["msg"]="必填参数不可为空!";
}else{
if(!is_numeric($time)){
$array["code"]="-1";
$array["msg"]="参数有误,只能填写数字!";
}else{
if(floor($time)!=$time){
	$array["code"]="-1";
	$array["msg"]="只能填写整数!";
}else{
if($time<1){
	$array["code"]="-1";
	$array["msg"]="续费时间不能小于1!";
}else{
if($a["renew"]=="1"){
$array["code"]="-1";
$array["msg"]="该产品已设置禁止续费!";
}else{
$db=Db::name('user')->where('id',session("userid"))->find();
$money=$a["money"]*$time;
if($a["cycle"]=="unrestricted"){
$array["code"]="-1";
$array["msg"]="一次性付款产品,禁止续费!";
}else{
if($db["money"]>=$money){
$times=$data["ztime"]-time();
if($a["money"]=="0" &&  $times > 432000){
$array["code"]="-1";
$array["msg"]="免费产品只能在到期前的5天内续费!";
}else{
if($a["money"]=="0" &&  $time!="1"){
$array["code"]="-1";
$array["msg"]="免费产品续费时间只能填写1";
}else{
if($data["state"]=="3"){
//判断产品为终止状态
$array["code"]="-1";
$array["msg"]="该产品已终止,禁止续费!";
}else{
include_once PATH."plugins/host/".$b["serverplugins"]."/".$b["serverplugins"].".php";
if($data["state"]=="2"){
//判断产品为暂停状态 加一个修改主机状态
$function=$b["serverplugins"]."_"."UnsuspendAccount";
if(function_exists($function)){
$data1=@$function($b,$data,$a);
}
$data2=Db::name('order')->where([
'id'=>$id,
"userid"=>session("userid"),
])->update([
"state"=>"1",
]);
}
if($a["cycle"]=="month"){
$times="2592000"*$time;
}
if($a["cycle"]=="season"){
$times="7879680"*$time;
}
if($a["cycle"]=="year"){
$times="31536000"*$time;
}
if($a["cycle"]=="day"){
$times="86400"*$time;
}
if($a["cycle"]=="unrestricted"){
$times="315360000"*$time;
}
$function1=$b["serverplugins"]."_"."renew";
if(function_exists($function1)){
$data11=$function1($b,$data,$a,$times,$time);
}
if($data11["code"]=="1"){
$money1=round($db["money"]-$money,2);
Db::name('user')->where('id',session("userid"))->update(['money' =>$money1]);
$data1=Db::name('order')->where([
'id'=>$id,
"userid"=>session("userid"),
])->update([
"ztime"=>$data["ztime"]+$times,
]);
//消费记录
$data66=Db::name('transaction')->insertGetId([
"userid"=>session("userid"),
"content"=>"续费产品,ID:".$id.",时长:".$time.",消费:".$money,
"time"=>time(),
]);

//aff收益
if($db["upperid"]){
if($money!="0"){
$upper=round($money*$this->web["affdiscount"],2);
$upperuser=Db::name('user')->where('id',$db["upperid"])->find();
$uppermoney=Db::name('user')->where('id',$db["upperid"])->update([
'affmoney' =>round($upperuser["affmoney"]+$upper,2),
]);
$data5=Db::name('affsymoney')->insertGetId([
"information"=>"下级ID:".session("userid")."续费产品",
"money"=>$upper,
"userid"=>$db["upperid"],
"time"=>time(),
]);
}
}

	$array["code"]="1";
	$array["msg"]="续费成功";	
}else{
	$array["code"]="-1";
	$array["msg"]="续费失败!".$data11["msg"];	

}

}

}
}
}else{
	$array["code"]="-1";
	$array["msg"]="余额不足";	
}
}
}
}
}
}
}
return $array;
}

if($act=="upgrade"){
$db=Db::name('user')->where('id',session("userid"))->find();
$newcartid=input("newcartid");
if($newcartid){
if($data["state"]=="3"){
	$array["code"]="-1";
	$array["msg"]="产品是终止状态,禁止变更!";	
}else{
include_once PATH."plugins/host/".$b["serverplugins"]."/".$b["serverplugins"].".php";
$function1=$b["serverplugins"]."_"."upgrade";
if($a["upgrade"]!="1" || judge(json_decode($a["upgrades"],true),$newcartid)!="1" || !function_exists($function1)){
$array["code"]="-1";
$array["msg"]="变更三要素检测不通过,禁止变更!";
}else{
if($data["cartid"]==$newcartid){
	$array["code"]="-1";
	$array["msg"]="产品一样,无需变更!";	
}else{
$db12=Db::name('cart')->where('id',$newcartid)->find();
if($a["serverid"]!=$db12["serverid"]){
	$array["code"]="-1";
	$array["msg"]="不可升级!";	
}else{
if($db12["inventory"] < 1){
$array["code"]="-1";
$array["msg"]="变更失败,变更的产品库存不足!";
}else{
if($db12){
if($a["cycle"]=="month"){
$timess="2592000";
}
if($a["cycle"]=="season"){
$timess="7879680";
}
if($a["cycle"]=="year"){
$timess="31536000";
}
if($a["cycle"]=="day"){
$timess="86400";
}
if($a["cycle"]=="unrestricted"){
$timess="315360000";
}
if($db12["cycle"]=="month"){
$times="2592000";
}
if($db12["cycle"]=="season"){
$times="7879680";
}
if($db12["cycle"]=="year"){
$times="31536000";
}
if($db12["cycle"]=="day"){
$times="86400";
}
if($db12["cycle"]=="unrestricted"){
$times="315360000";
}
$money12=(($db12["money"]/($times/86400))*(($data["ztime"]-time())/86400));
$money12=$money12-(($a["money"]/($timess/86400))*(($data["ztime"]- time())/86400));
$money12=round($money12,2);
if($money12<0){
$money12="0";
}
if($this->user["money"]<$money12){
	$array["code"]="-1";
	$array["msg"]="余额不足,需要:".$money12."元";	
}else{
include_once PATH."plugins/host/".$b["serverplugins"]."/".$b["serverplugins"].".php";
$function=$b["serverplugins"]."_"."upgrade";
if(function_exists($function)){
$data1=@$function($b,$data,$a,$db12);
}
if($data1["code"]=="1"){
$db13=Db::name('user')->where('id',session("userid"))->update([
'money' =>round($this->user["money"]-$money12,2),
]);
$db14=Db::name('order')->where('id',$data["id"])->update([
'cartid' =>$db12["id"],
]);
$db15=Db::name('cart')->where('id',$a["id"])->update([
'inventory' =>$a["inventory"]+1,
]);
$db16=Db::name('cart')->where('id',$db12["id"])->update([
'inventory' =>$db12["inventory"]-1,
]);

//消费记录
if($money12!="0"){
$data66=Db::name('transaction')->insertGetId([
"userid"=>session("userid"),
"content"=>"升级产品,ID:".$id.",消费:".$money12,
"time"=>time(),
]);
}

//aff收益
if($db["upperid"]){
if($money12!="0"){
$upper=round($money12*$this->web["affdiscount"],2);
$upperuser=Db::name('user')->where('id',$db["upperid"])->find();
$uppermoney=Db::name('user')->where('id',$db["upperid"])->update([
'affmoney' =>round($upperuser["affmoney"]+$upper,2),
]);
$data5=Db::name('affsymoney')->insertGetId([
"information"=>"下级ID:".session("userid")."升级产品",
"money"=>$upper,
"userid"=>$db["upperid"],
"time"=>time(),
]);
}
}
	$array["code"]="1";
	$array["msg"]="操作成功!";	
}else{
	$array["code"]="-1";
	$array["msg"]=$data1["msg"];	
}
}
}else{
	$array["code"]="-1";
	$array["msg"]="产品不存在!";	
}
}
}
}
}
}
}else{
	$array["code"]="-1";
	$array["msg"]="请选择产品!";	
}
return $array;
}

}
include_once PATH."plugins/host/".$b["serverplugins"]."/".$b["serverplugins"].".php";
$function=$b["serverplugins"]."_"."ClientArea";
$function1=$b["serverplugins"]."_"."upgrade";

if($a["upgrade"]=="1" && $a["upgrades"] && function_exists($function1)){
$upgrade="1";
}else{
$upgrade="0";
}
if($a["upgrades"] && $a["upgrades"]!="null"){
$a["upgrades"]=json_decode($a["upgrades"],true);
for($i=0;$i<count($a["upgrades"]);$i++)  
   {
$db11=Db::name('cart')->where('id',$a["upgrades"][$i])->find();

if($a["cycle"]=="month"){
$timess="2592000";
}
if($a["cycle"]=="season"){
$timess="7879680";
}
if($a["cycle"]=="year"){
$timess="31536000";
}
if($a["cycle"]=="day"){
$timess="86400";
}
if($a["cycle"]=="unrestricted"){
$timess="315360000";
}

if($db11["cycle"]=="month"){
$times="2592000";
}
if($db11["cycle"]=="season"){
$times="7879680";
}
if($db11["cycle"]=="year"){
$times="31536000";
}
if($db11["cycle"]=="day"){
$times="86400";
}
if($db11["cycle"]=="unrestricted"){
$times="315360000";
}
$money11=(($db11["money"]/($times/86400))*(($data["ztime"]-time())/86400));
$money11=$money11-(($a["money"]/($timess/86400))*(($data["ztime"]- time())/86400));
$money11=round($money11,2);
if($money11<0){
$money11="0";
}

$upgrades[$i]["id"]=$db11["id"];
$upgrades[$i]["information"]="ID:".$db11["id"]."=>".$db11["name"]."=>所需金额:".$money11."元";

}
}else{
$upgrades="";
}
//var_dump($upgrade);
if(function_exists($function)){
$ClientArea=@$function($b,$a,$data);
}else{
$ClientArea="";
}
		return $this->fetch('/'.$this->web["template"].'/user/panel',[
"server"=>$b,
"data"=>$data,
"cart"=>$a,
"ClientArea"=>$ClientArea,
"upgrade"=>$upgrade,
"upgrades"=>$upgrades,
]);

}else{
		$this->redirect('/user/order/');
}
}else{
		$data=Db::name('order')->where("userid",session("userid"))->order('id desc')->select();
	// 优化：批量查询 cart 表，避免 N+1 查询
	$cartIds = array_unique(array_filter(array_column($data, 'cartid')));
	$cartMap = [];
	if (!empty($cartIds)) {
	    $cartMap = Db::name('cart')->where('id', 'in', $cartIds)->column('name', 'id');
	}
	foreach ($data as &$dataItem) {
	    $cid = $dataItem['cartid'];
	    $dataItem['cartid'] = isset($cartMap[$cid]) ? $cartMap[$cid] : ('产品#' . $cid);
	}
	unset($dataItem);
/**
		foreach ($data as &$item) {
		$b=Db::name('cart')->where('id',$item["cartid"])->find();
		$item["name"]=$b["name"];		 
		}
		**/
	
		return $this->fetch('/'.$this->web["template"].'/user/order',[
"order"=>$data,
]);
}

}

	public function payrecord() {
$data=Db::name('pay')->where("userid",session("userid"))->order('id desc')->paginate(10);
return $this->fetch('/'.$this->web["template"].'/user/payrecord',[
"payrecord"=>$data,
]);
}


public function submitticket(){
if(Request::instance()->isPost()) {
$title=input("title");
$content=input("content");
if($title=="" || $content==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$array1=array(
array(
"personnel"=>"2",
"content"=>$content,
"time"=>time(),
),
);
	$data=Db::name('ticket')->insertGetId([
				"title"=>$title,
				"content"=>json_encode($array1),
				"userid"=>session("userid"),
				"time"=>time(),
				"state"=>"1",
				]);
if($data){
if($this->web["email"]=="1"){
if($this->user["mail"]){
$mailbox=$this->email($this->user["mail"],"提交工单通知","你账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."在本站提交工单成功!<br/>工单id:".$data."<br/>请耐心等待管理员回复!<br/><br/>");
}
$admin=Db::name('admin')->where("id","1")->find();
if($admin["mail"]){
$mailbox=$this->email($admin["mail"],"客户提交工单通知","客户账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."在本站提交工单<br/>工单id:".$data."<br/>请及时处理!<br/><br/>");
}
}
$array["code"]="1";
$array["msg"]="提交工单成功!";
$array["id"]=$data;
}else{
$array["code"]="-1";
$array["msg"]="提交工单失败!";
}
}
return $array;
}
return $this->fetch('/'.$this->web["template"].'/user/submitticket',[
]);
}

public function supportticket($id=null){
if($id){


$data=Db::name('ticket')->where([
"id"=>$id,
"userid"=>session("userid"),
])->find();
if($data){
$data["content"]=json_decode($data["content"],true);
$admin=Db::name('admin')->where("id","1")->find();
unset($admin["password"]);
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="reply"){
if(input("content")==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$content=input("content");
$array1=array(
array(
"personnel"=>"2",
"content"=>$content,
"time"=>time(),
),
);
$array2=array_merge($data["content"],$array1);
$data1=Db::name('ticket')->where([
"id"=>$id,
"userid"=>session("userid"),
])->update([
'content' =>json_encode($array2),
'state'=>'2',
]);
if($data1){
if($this->web["email"]=="1"){
if($admin["mail"]){
$mailbox=$this->email($admin["mail"],"客户回复工单通知","客户账号:".$this->user["user"]."在时间:".date("Y-m-d H:i:s")."在本站已回复工单<br/>工单id:".$id."<br/>请及时处理!<br/><br/>");
}
}
$array["code"]="1";
$array["msg"]="回复工单成功!";
}else{
$array["code"]="-1";
$array["msg"]="回复工单失败!";
}
}
return $array;
}

if($act=="end"){
$data1=Db::name('ticket')->where([
"id"=>$id,
"userid"=>session("userid"),
])->update([
'state'=>'4',
]);
if($data["state"]=="4"){
$array["code"]="-1";
$array["msg"]="工单已关闭!";
}else{
if($data1){
$array["code"]="1";
$array["msg"]="关闭工单成功!";
}else{
$array["code"]="-1";
$array["msg"]="关闭工单失败!";
}
}
return $array;
}
}

return $this->fetch('/'.$this->web["template"].'/user/supporttickets',[
"ticket"=>$data,
"admin"=>$admin,
]);


}else{
	$this->redirect('/user/supportticket');
}





}else{
$data=Db::name('ticket')->where("userid",session("userid"))->order('id desc')->paginate(10);
return $this->fetch('/'.$this->web["template"].'/user/supportticket',[
"ticket"=>$data,
]);
}


}

public function transferrecord(){
$data=Db::name('transferrecord')->where("userid",session("userid"))->order('id desc')->paginate(10);
return $this->fetch('/'.$this->web["template"].'/user/transferrecord',[
"data"=>$data,
]);
}


public function transaction(){
$data=Db::name('transaction')->where("userid",session("userid"))->order('id desc')->paginate(10);
return $this->fetch('/'.$this->web["template"].'/user/transaction',[
"data"=>$data,
]);
}




//发送邮箱
		public static function email($email,$name,$body)
		{
$web=Db::name('web')->where('id',1)->find();
try {
	$mail = new PHPMailer(); 
	$mail->IsSMTP();
	$mail->CharSet=$web["emailchar"]; //设置邮件的字符编码，这很重要，不然中文乱码
	$mail->SMTPAuth   = $web["emailauth"];                  //开启认证
if($web["emailsecure"]){
    $mail->SMTPSecure = $web["emailsecure"];             // 允许 TLS 或者ssl协议
}
	$mail->Port       = $web["emailport"];                    
	$mail->Host       = $web["emailhost"]; 
	$mail->Username   = $web["emailname"];    
	$mail->Password   = $web["emailpass"];            
	$mail->From       = $web["emailname"];
	$mail->FromName   = $web["name"];
	$to = $email;
	$mail->AddAddress($to);
	$mail->Subject  = $name;
	$mail->Body = "<html><head><title>".$name."</title></head>".$body."</html>";
	$mail->WordWrap   = 80; // 设置每行字符串的长度
	$mail->isHTML(true); 
	$mail->Send();
	$array["code"]="1";
	$array["msg"]="邮箱发送成功";
	return $array;
} catch (phpmailerException $e) {
	$array["code"]="-1";
	$array["msg"]="邮箱发送失败:".$e->errorMessage();;
	return $array;
}
}

}