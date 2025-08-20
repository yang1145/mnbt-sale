<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;
use PHPMailer\PHPMailer\PHPMailer;

class Index extends Controller
{
public function _initialize() {
		if(!session("adminid")) {
			$this->redirect('/admin/login');
		}
		$this->user=Db::name('admin')->where('id',session("adminid"))->find();
		$this->web=Db::name('web')->where('id',1)->find();
$file=file_exists(PATH."/app/index/view/".$this->web["template"]."/set.php");
if($file){
$templateset="1";
}else{
$templateset="0";
}
		$this->assign([
		            'webname'  => $this->web['name'],
		"user"=>$this->user,
        "templateset"=>$templateset,
		        ]);
	}


public function sq($id=null){
if($id){
$data1=Db::name('sq')->where("id",$id)->find();
if($data1){
if(Request::instance()->isPost()) {
$info=input("post.");
if($info["domain"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$data4=Db::name('sq')->where("id",$id)->update($info);
if($data4){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}
return $array;
}
return $this->fetch('/'.$this->web["admintemplate"]."/sqs",[
"sq"=>$data1,
]);
}else{
$this->redirect('/admin/sq');
}
}else{
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="add"){
$info=input("post.");
if($info["domain"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
unset($info["act"]);
$info["time"]=time();
$data1=Db::name('sq')->insertGetId($info);
if($data1){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}
return $array;
}
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name("sq")->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if(input("act")=="qbdelete"){
$data11=Db::name("sq")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data1=Db::name("sq")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过此条记录了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('sq')->whereor("id", 'like', '%'.$search.'%')->whereor("domain", 'like', '%'.$search.'%')->whereor("ip", 'like', '%'.$search.'%')->whereor("qq", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('sq')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/sq",[
"sq"=>$data,
]);
}
}
    public function index()
    {
//用户数量
$usercount = Db::name('user')->count();
$ticketcount1 = Db::name('ticket')->where("state","1")->count();
$ticketcount2 = Db::name('ticket')->where("state","2")->count();
$pay=Db::name('pay')->where([
"state"=>"1",
])->select();
$paymoney="0";
for($i=0;$i<count($pay);$i++){
$paymoney=$pay[$i]["money"]+$paymoney;
}
$paymoney1="0";
$time1=date("Y-m-d",time());
for($i=0;$i<count($pay);$i++){
$time2=date("Y-m-d",$pay[$i]["time"]);
if($time1==$time2){
$paymoney1=$pay[$i]["money"]+$paymoney1;
}
}

	
return $this->fetch('/'.$this->web["admintemplate"]."/index",[
"usercount"=>$usercount,
"ticketcount"=>$ticketcount1+$ticketcount2,
"paymoney"=>$paymoney,
"paymoney1"=>$paymoney1,
]);
    }

public function info(){
if(Request::instance()->isPost()) {
$name=input("name");
$mail=input("mail");
$qq=input("qq");
if($name=="" || $mail=="" || $qq==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$data=Db::name('admin')->where('id',$this->user["id"])->update([
"name" =>$name,
"mail"=>$mail,
"qq"=>$qq,
]);
if($data){
$array["code"]="1";
$array["msg"]="修改信息成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改信息失败!";
}
}
return $array;
}
	
return $this->fetch('/'.$this->web["admintemplate"]."/info");
}



public function password(){
if(Request::instance()->isPost()) {
$oldpassword=input("oldpassword");
$password=input("password");
$newpassword=input("newpassword");
if($oldpassword=="" || $password=="" || $newpassword==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if(!password_verify($oldpassword,$this->user["password"])){
$array["code"]="-1";
$array["msg"]="旧密码错误!";
}else{
if($password!=$newpassword){
$array["code"]="-1";
$array["msg"]="两次新密码不可一致!";
}else{
$data=Db::name('admin')->where('id',$this->user["id"])->update([
"password" =>password_hash($password,PASSWORD_DEFAULT),
]);
if($data){
$array["code"]="1";
$array["msg"]="修改密码成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改密码失败!";
}
}
}
}
return $array;
}
	
return $this->fetch('/'.$this->web["admintemplate"]."/password");
}

public function logout() {
		session("adminid",null);
		$this->redirect('/admin/login');
	}


public function set() {
if(Request::instance()->isPost()) {
$webinput=input("post.");
if($this->web["template"]!=$webinput["template"]){
$file1=file_exists(PATH."/app/index/view/".$webinput["template"]."/set.php");
if($file1){
$wj=include_once(PATH."/app/index/view/".$webinput["template"]."/set.php");
$webinput["templateset"]=json_encode($wj);
}else{
$webinput["templateset"]="";
}
}
if($webinput["zcyxyz"]=="1" && $webinput["email"]!="1"){
$array["code"]="-1";
$array["msg"]="修改失败,开启注册邮箱验证需要先开启邮箱通知!";
}else{
if($webinput["yxdl"]=="1" && $webinput["email"]!="1"){
$array["code"]="-1";
$array["msg"]="修改失败,开启邮箱登录需要先开启邮箱通知!";
}else{
$data=Db::name('web')->where('id',"1")->update($webinput);
if($data){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}
}

return $array;
}
	
return $this->fetch('/'.$this->web["admintemplate"]."/set",[
"web"=>$this->web,
"cronurl"=>(isHTTPS() ? 'https://' : 'http://').$_SERVER['HTTP_HOST']."/cron",
"template"=>my_dir(PATH."/app/index/view/"),
"admintemplate"=>my_dir(PATH."/app/admin/view/"),
]);
	}

public function user($id=null,$orderid=null) {
if(!$id){
if(Request::instance()->isPost()) {

if(input("act")=="login"){
$userid=input("userid");
if($userid==""){
$this->redirect('/user/index');
}else{
session("userid",$userid);
$this->redirect('/user/index');
}
}

if(input("act")=="delete"){
if(input("userid")){
$userid=explode(",",input("userid"));
$a="0";
$b="0";
for($i=0;$i<count($userid);$i++){
$data=Db::name("order")->where("userid",$userid[$i])->find();
if($data){
$b=$b+1;
}else{
$data1=Db::name("user")->where("id",$userid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除或者账户下还有未删除的产品!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}else{
$array["code"]="-1";
$array["msg"]="必填参数不可为空!!";
}
return $array;
}


if(input("act")=="qbdelete"){
$data11=Db::name("user")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data=Db::name("order")->where("userid",$data11[$i]["id"])->find();
if($data){
$b=$b+1;
}else{
$data1=Db::name("user")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除或者账户下还有未删除的产品!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}

if(input("act")=="adduser"){
$name=input("name");
$user=input("user");
$qq=input("qq");
$mail=input("mail");
$password=input("password");
if($name=="" || $user=="" || $qq=="" || $password==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if($mail){
$data4=filter_var($mail, FILTER_VALIDATE_EMAIL);
if($data4){
	$data=Db::name('user')->where("user",$user)->find();
			if($data) {
				$array["code"]="-1";
				$array["msg"]="账号已存在!";
			} else {
$data2=Db::name('user')->where("mail",$mail)->find();
if($data2){
				$array["code"]="-1";
				$array["msg"]="邮箱已存在!";
}else{
	$data3=Db::name('user')->insertGetId([
				"name"=>$name,
				"user"=>$user,
				"password"=>password_hash($password,PASSWORD_DEFAULT),
				"mail"=>$mail,
				"time"=>time(),
                "qq"=>$qq,
                "address"=>"",
                "aff"=>"",
                "upperid"=>"",
				]);
if($data3){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}
}
}else{
$array["code"]="-1";
$array["msg"]="邮箱格式错误!";
}
}else{






	$data=Db::name('user')->where("user",$user)->find();
			if($data) {
				$array["code"]="-1";
				$array["msg"]="账号已存在!";
			} else {
	$data3=Db::name('user')->insertGetId([
				"name"=>$name,
				"user"=>$user,
				"password"=>password_hash($password,PASSWORD_DEFAULT),
				"mail"=>$mail,
				"time"=>time(),
                "qq"=>$qq,
                "address"=>"",
                "aff"=>"",
                "upperid"=>"",
				]);
if($data3){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}



}
}
return $array;
}


}
$search=input("search");
if($search){
$users=Db::name('user')->whereor("id", 'like', '%'.$search.'%')->whereor("user", 'like', '%'.$search.'%')->whereor("name", 'like', '%'.$search.'%')->whereor("mail", 'like', '%'.$search.'%')->whereor("qq", 'like', '%'.$search.'%')->whereor("address", 'like', '%'.$search.'%')->whereor("aff", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$users=Db::name('user')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/user",[
"users"=>$users,
]);
}else{
$data=Db::name("user")->where("id",$id)->find();
if($data){
if($orderid){
$data1=Db::name("order")->where([
"id"=>$orderid,
"userid"=>$id,
])->find();
if($data1){
//用户产品
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="edit"){
$post=input("post.");
$post["atime"]=strtotime($post["atime"]);
if($post["atime"]==""){
$post["atime"]="1";
}
$post["ztime"]=strtotime($post["ztime"]);
if($post["ztime"]==""){
$post["ztime"]="1";
}
unset($post["act"]);
$db=Db::name("order")->where([
"id"=>$orderid,
"userid"=>$id,
])->update($post);
if($db){
	$array["code"]="1";
	$array["msg"]="修改成功!";
}else{
	$array["code"]="-1";
	$array["msg"]="修改失败!";
}
return $array;
}
//暂停
if($act=="stop"){
if($data1["state"]=="3"){
	$array["code"]="-1";
	$array["msg"]="产品已终止,禁止修改此状态!";
}else{
$da1=Db::name('cart')->where("id",$data1["cartid"])->find();
$da2=Db::name('server')->where("id",$da1["serverid"])->find();
include_once PATH."plugins/host/".$da2["serverplugins"]."/".$da2["serverplugins"].".php";
$function=$da2["serverplugins"]."_"."SuspendAccount";
if(function_exists($function)){
$da4=@$function($da2,$data1,$da1);
}
$da5=Db::name("order")->where("id",$data1["id"])->update([
"state"=>"2",
]);
	$array["code"]="1";
	$array["msg"]="暂停成功!";
}
return $array;

}
//解除暂停
if($act=="stopoff"){
if($data1["state"]=="3"){
	$array["code"]="-1";
	$array["msg"]="产品已终止,禁止修改此状态!";
}else{
$da1=Db::name('cart')->where("id",$data1["cartid"])->find();
$da2=Db::name('server')->where("id",$da1["serverid"])->find();
include_once PATH."plugins/host/".$da2["serverplugins"]."/".$da2["serverplugins"].".php";
$function=$da2["serverplugins"]."_"."UnsuspendAccount";
if(function_exists($function)){
$da3=@$function($da2,$data1,$da1);
}
$da5=Db::name("order")->where("id",$data1["id"])->update([
"state"=>"1",
]);
	$array["code"]="1";
	$array["msg"]="解除暂停成功!";
}
return $array;

}
//终止
if($act=="end"){
$da1=Db::name('cart')->where("id",$data1["cartid"])->find();
$da2=Db::name('server')->where("id",$da1["serverid"])->find();
include_once PATH."plugins/host/".$da2["serverplugins"]."/".$da2["serverplugins"].".php";
$function=$da2["serverplugins"]."_"."TerminateAccount";
if(function_exists($function)){
$da4=@$function($da2,$data1,$da1);
}
$da5=Db::name("order")->where("id",$data1["id"])->update([
"state"=>"3",
]);
$da6=Db::name("cart")->where("id",$data1["cartid"])->update([
"inventory"=>$da1["inventory"]+1,
]);
	$array["code"]="1";
	$array["msg"]="终止成功!";
return $array;

}
//删除
if($act=="delete"){
$da5=Db::name("order")->where("id",$data1["id"])->delete();
	$array["code"]="1";
	$array["msg"]="删除成功!";
return $array;
}


}



$userorder=Db::name("order")->where([
"id"=>$orderid,
"userid"=>$id,
])->find();


$da6=Db::name('cart')->where("id",$userorder["cartid"])->find();
$da5=Db::name('server')->where("id",$da6["serverid"])->find();
include_once PATH."plugins/host/".$da5["serverplugins"]."/".$da5["serverplugins"].".php";
$function=$da5["serverplugins"]."_"."OrderConfigOptions";
if(function_exists($function)){
$da4=@$function();
for($i=0;$i<count($da4);$i++){
foreach ($userorder as $key => $value){
if($da4[$i]["name"]==$key){
if($value!=""){
$da4[$i]["value"]=$value;
}
}
}
}
$data7=$da4;
}else{
$data7="";
}

return $this->fetch('/'.$this->web["admintemplate"]."/userorder",[
"userorder"=>$userorder,
"data7"=>$data7,
]);



}else{
$this->redirect('/admin/user/'.$id);
}
}else{
//用户信息
if(Request::instance()->isPost()) {
$name=input("name");
$user=input("user");
$money=input("money");
$qq=input("qq");
$mail=input("mail");
$address=input("address");
$password=input("password");
$aff=input("aff");
$affmoney=input("affmoney");
$upperid=input("upperid");
$state=input("state");
if($name=="" || $user=="" || $money=="" || $qq=="" || $state=="" || $affmoney==""){
	$array["code"]="-1";
	$array["msg"]="必填项不可为空!";
}else{
if($password){
$data3=Db::name('user')->where('id',$data["id"])->update([
"name"=>$name,
"user"=>$user,
"money"=>$money,
"qq"=>$qq,
"mail"=>$mail,
"address"=>$address,
"aff"=>$aff,
"affmoney"=>$affmoney,
"upperid"=>$upperid,
"state"=>$state,
"password"=>password_hash($password,PASSWORD_DEFAULT),
]);

}else{
$data3=Db::name('user')->where('id',$data["id"])->update([
"name"=>$name,
"user"=>$user,
"money"=>$money,
"qq"=>$qq,
"mail"=>$mail,
"address"=>$address,
"aff"=>$aff,
"affmoney"=>$affmoney,
"upperid"=>$upperid,
"state"=>$state,
]);

}
if($data3){
	$array["code"]="1";
	$array["msg"]="修改成功!";
}else{
	$array["code"]="-1";
	$array["msg"]="修改失败!";
}
}
return $array;
}

$data2=Db::name("order")->where([
"userid"=>$id,
])->order('id desc')->select();
for($i=0;$i<count($data2);$i++)  
   {
$cart=Db::name('cart')->where('id',$data2[$i]["cartid"])->find();
$data2[$i]["cartid"]=$cart["name"];
} 


	
return $this->fetch('/'.$this->web["admintemplate"]."/userinfo",[
"userinfo"=>$data,
"userorder"=>$data2,
"userid"=>$id,
]);

}
}else{
$this->redirect('/admin/user');
}


}
}



public function ticket($id=null){
if($id){
$data=Db::name('ticket')->where("id",$id)->find();
if($data){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="submit"){
$content=input("content");
if($content==""){
	$array["code"]="-1";
	$array["msg"]="必填参数不可为空!";
}else{
$array1=array(
array(
"personnel"=>"1",
"content"=>$content,
"time"=>time(),
),
);
$array2=array_merge(json_decode($data["content"],true),$array1);
$data1=Db::name('ticket')->where([
"id"=>$id,
])->update([
'content' =>json_encode($array2),
'state'=>'3',
]);
if($data1){
if($this->web["email"]=="1"){
$user=Db::name('user')->where("id",$data["userid"])->find();
if($user["mail"]){
$mailbox=$this->email($user["mail"],"回复工单通知","站长在时间:".date("Y-m-d H:i:s")."已回复工单<br/>工单id:".$id."<br/>请及时查看!<br/><br/>");
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
if($data["state"]=="4"){
$array["code"]="-1";
$array["msg"]="工单已关闭!";
}else{
$data1=Db::name('ticket')->where([
"id"=>$id,
])->update([
'state'=>'4',
]);
if($data1){
if($this->web["email"]=="1"){
$user=Db::name('user')->where("id",$data["userid"])->find();
if($user["mail"]){
$mailbox=$this->email($user["mail"],"关闭工单通知","站长在时间:".date("Y-m-d H:i:s")."已关闭工单<br/>工单id:".$id."<br/><br/>");
}
}
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

$user=Db::name('user')->where('id',$data["userid"])->find();
$data["username"]=$user["name"];
$data["userqq"]=$user["qq"];
$data["content"]=json_decode($data["content"],true);
return $this->fetch('/'.$this->web["admintemplate"]."/tickets",[
"tickets"=>$data,
]);
}else{
$this->redirect('/admin/ticket');
}
}else{
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name("ticket")->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}


if($act=="off"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data2=Db::name('ticket')->where("id",$cid[$i])->find();
$data1=Db::name("ticket")->where("id",$cid[$i])->update([
"state"=>"4",
]);
if($this->web["email"]=="1"){
$data3=Db::name('user')->where("id",$data2["userid"])->find();
if($data3["mail"]){
$mailbox=$this->email($data3["mail"],"你的工单已被站长关闭","站长在时间:".date("Y-m-d H:i:s")."已关闭你的工单<br/>工单ID:".$data2["id"]."<br/><br/>");
}
}
if($data2["state"]!="4"){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经关闭过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if(input("act")=="qbdelete"){
$data11=Db::name("ticket")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data1=Db::name("ticket")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过此条记录了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('ticket')->whereor("id", 'like', '%'.$search.'%')->whereor("userid", 'like', '%'.$search.'%')->whereor("title", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('ticket')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/ticket",[
"ticket"=>$data,
]);
}
}


public function classification($id=null){
if($id){
$data2=$data=Db::name('product')->where("id",$id)->find();
if($data2){
if(Request::instance()->isPost()) {
$name=input("name");
$introduce=input("introduce");
$hide=input("hide");
$sort=input("sort");
if($name==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$data3=Db::name('product')->where("id",$id)->update([
"name"=>$name,
"introduce"=>$introduce,
"hide"=>$hide,
"sort"=>$sort,
]);
if($data3){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}
return $array;
}

return $this->fetch('/'.$this->web["admintemplate"]."/classifications",[
"product"=>$data2,
]);
}else{
$this->redirect('/admin/classification');
}

}else{
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="add"){
$name=input("name");
$introduce=input("introduce");
$hide=input("hide");
$sort=input("sort");
if($name==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$data1=Db::name('product')->insertGetId([
				"name"=>$name,
				"introduce"=>$introduce,
                "hide"=>$hide,
                "sort"=>$sort,
				]);
if($data1){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}
return $array;
}

if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name("product")->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if(input("act")=="qbdelete"){
$data11=Db::name("product")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data1=Db::name("product")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过此条记录了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}


}
$search=input("search");
if($search){
$data=Db::name('product')->whereor("id", 'like', '%'.$search.'%')->whereor("name", 'like', '%'.$search.'%')->whereor("introduce", 'like', '%'.$search.'%')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('product')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/classification",[
"product"=>$data,
]);
}
}


public function server($id=null){
if($id){
$data2=$data=Db::name('server')->where("id",$id)->find();
if($data2){
if(Request::instance()->isPost()) {
$info=input("post.");
if($info["name"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$data3=Db::name('server')->where("id",$id)->update($info);
if($data3){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}
return $array;
}

if(file_exists(PATH."plugins/host/".$data2["serverplugins"]."/".$data2["serverplugins"].".php")){
include_once PATH."plugins/host/".$data2["serverplugins"]."/".$data2["serverplugins"].".php";
$function=$data2["serverplugins"]."_"."AdminConfigOptions";
if(function_exists($function)){
$da4=@$function();

for($i=0;$i<count($da4);$i++){
foreach ($data2 as $key => $value){
if($da4[$i]["name"]==$key){
if($value!=""){
$da4[$i]["value"]=$value;
}
}
}
}
$data7=$da4;
}else{
$data7="";
}
}else{
$data7="";
}
return $this->fetch('/'.$this->web["admintemplate"]."/servers",[
"server"=>$data2,
"plugins"=>my_dir(PATH."/plugins/host"),
"data7"=>$data7,
]);
}else{
$this->redirect('/admin/server');
}

}else{
if(Request::instance()->isPost()) {
$act=input("act");

if($act=="add"){
$info=input("post.");
if($info["name"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
unset($info["act"]);
$data1=Db::name('server')->insertGetId($info);
if($data1){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}
return $array;
}

if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data4=Db::name('cart')->where("serverid",$cid[$i])->find();
if($data4){
$b=$b+1;
}else{
$data1=Db::name('server')->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了或者该服务器下还有未删除的产品!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if($act=="qbdelete"){
$data18=Db::name("server")->select();
$a="0";
$b="0";
for($i=0;$i<count($data18);$i++){
$data4=Db::name('cart')->where("serverid",$data18[$i]["id"])->find();
if($data4){
$b=$b+1;
}else{
$data1=Db::name('server')->where("id",$data18[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了或者该服务器下还有未删除的产品!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('server')->whereor("id", 'like', '%'.$search.'%')->whereor("name", 'like', '%'.$search.'%')->whereor("host", 'like', '%'.$search.'%')->whereor("ip", 'like', '%'.$search.'%')->whereor("security", 'like', '%'.$search.'%')->whereor("port", 'like', '%'.$search.'%')->whereor("user", 'like', '%'.$search.'%')->whereor("password", 'like', '%'.$search.'%')->whereor("serverplugins", 'like', '%'.$search.'%')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('server')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/server",[
"server"=>$data,
"plugins"=>my_dir(PATH."/plugins/host"),
]);
}
}

public function product($id=null){
if($id){
$data1=Db::name('cart')->where("id",$id)->find();
if($data1){
if(Request::instance()->isPost()) {
$info=input("post.");
if(!is_numeric($info["inventory"]) || !is_numeric($info["money"])){
$array["code"]="-1";
$array["msg"]="库存或价格必须是数字!";
}else{
if(floor($info["inventory"])!=$info["inventory"]){
$array["code"]="-1";
$array["msg"]="库存必须是整数!";
}else{
$upgrades=@json_encode($info["upgrades"]);
if($upgrades=="null"){
$upgrades="";
}
$info["upgrades"]=$upgrades;
if($info["name"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if($info["serverid"]!=$data1["serverid"]){
$info["upgrade"]="0";
$info["upgrades"]="";
}
if($info["firstmo"]=="1" && $info["cycle"]=="unrestricted"){
$array["code"]="-1";
$array["msg"]="一次性产品不可设置首次购买免费!";
}else{
$data4=Db::name('cart')->where("id",$id)->update($info);
if($data4){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}
}
}
}
return $array;
}
$data1["upgrades"]=json_decode($data1["upgrades"],true);
$data11=Db::name('cart')->where("serverid",$data1["serverid"])->select();


$data2=Db::name('product')->select();
$data3=Db::name('server')->select();


$da5=Db::name('server')->where("id",$data1["serverid"])->find();
if(file_exists(PATH."plugins/host/".$da5["serverplugins"]."/".$da5["serverplugins"].".php")){
include_once PATH."plugins/host/".$da5["serverplugins"]."/".$da5["serverplugins"].".php";
$function=$da5["serverplugins"]."_"."ConfigOptions";
if(function_exists($function)){
$da4=@$function();
for($i=0;$i<count($da4);$i++){
foreach ($data1 as $key => $value){
if($da4[$i]["name"]==$key){
if($value!=""){
$da4[$i]["value"]=$value;
}
}
}
}
$data7=$da4;
}else{
$data7="";
}
}else{
$data7="";
}
return $this->fetch('/'.$this->web["admintemplate"]."/products",[
"product"=>$data1,//产品信息
"upgrade"=>$data11,//全局升级产品数据
"data2"=>$data2,//全部分类数据
"data3"=>$data3,//全部服务器数据
"data7"=>$data7,
]);
}else{
$this->redirect('/admin/product');
}
}else{
if(Request::instance()->isPost()) {
$act=input("act");

if($act=="add"){
$info=input("post.");
if($info["name"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
if(!is_numeric($info["inventory"]) || !is_numeric($info["money"])){
$array["code"]="-1";
$array["msg"]="库存或价格必须是数字!";
}else{
unset($info["act"]);
$data1=Db::name('cart')->insertGetId($info);
if($data1){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}
}
return $array;
}

if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data4=Db::name('order')->where("cartid",$cid[$i])->find();
if($data4){
$b=$b+1;
}else{
$data1=Db::name('cart')->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了或者该产品下还有未删除的订单!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}


if($act=="qbdelete"){
$data12=Db::name("cart")->select();
$a="0";
$b="0";
for($i=0;$i<count($data12);$i++){
$data4=Db::name('order')->where("cartid",$data12[$i]["id"])->find();
if($data4){
$b=$b+1;
}else{
$data1=Db::name('cart')->where("id",$data12[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了或者该产品下还有未删除的订单!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}

}
$search=input("search");
if($search){
$data=Db::name('cart')->whereor("id", 'like', '%'.$search.'%')->whereor("name", 'like', '%'.$search.'%')->whereor("content", 'like', '%'.$search.'%')->whereor("money", 'like', '%'.$search.'%')->whereor("inventory", 'like', '%'.$search.'%')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('cart')->paginate(10);
}
$data2=Db::name('product')->select();
$data3=Db::name('server')->select();
return $this->fetch('/'.$this->web["admintemplate"]."/product",[
"product"=>$data,
"data2"=>$data2,
"data3"=>$data3,
]);
}
}


public function announcement($id=null){
if($id){
$data1=Db::name('announcement')->where("id",$id)->find();
if($data1){
if(Request::instance()->isPost()) {
$info=input("post.");
if($info["name"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$info["time"]=strtotime($info["time"]);
if($info["time"]==""){
$info["time"]="1";
}
$data4=Db::name('announcement')->where("id",$id)->update($info);
if($data4){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}
return $array;
}
return $this->fetch('/'.$this->web["admintemplate"]."/announcements",[
"announcement"=>$data1,
]);
}else{
$this->redirect('/admin/announcement');
}
}else{
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="add"){
$info=input("post.");
if($info["name"]==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
unset($info["act"]);
$info["time"]=time();
$data1=Db::name('announcement')->insertGetId($info);
if($data1){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}
return $array;
}
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name("announcement")->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if(input("act")=="qbdelete"){
$data11=Db::name("announcement")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data1=Db::name("announcement")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过此条记录了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('announcement')->whereor("id", 'like', '%'.$search.'%')->whereor("name", 'like', '%'.$search.'%')->whereor("information", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('announcement')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/announcement",[
"announcement"=>$data,
]);
}
}


public function aff(){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="ok"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$data3=Db::name('afftxjl')->where("id",$cid)->find();
if($data3["state"]=="1"){
$array["code"]="-1";
$array["msg"]="已经处理过了!";
}else{
$data4=Db::name('afftxjl')->where("id",$cid)->update([
"state"=>"1",
]);
if($data4){
if($this->web["email"]=="1"){
$user=Db::name('user')->where("id",$data3["userid"])->find();
if($user["mail"]){
$mailbox=$this->email($user["mail"],"你的提现申请已处理","站长在时间:".date("Y-m-d H:i:s")."已处理你的提现申请<br/>提现记录ID:".$cid."<br/>请及时查看!<br/><br/>");
}
}
$array["code"]="1";
$array["msg"]="成功!";
}else{
$array["code"]="-1";
$array["msg"]="失败!";
}
}
}
return $array;
}
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name("afftxjl")->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if(input("act")=="qbdelete"){
$data11=Db::name("afftxjl")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data1=Db::name("afftxjl")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过此条记录了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('afftxjl')->whereor("id", 'like', '%'.$search.'%')->whereor("information", 'like', '%'.$search.'%')->whereor("money", 'like', '%'.$search.'%')->whereor("state", 'like', '%'.$search.'%')->whereor("userid", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('afftxjl')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/aff",[
"aff"=>$data,
]);
}

public function order($id=null){
if($id){
$data1=Db::name('order')->where("id",$id)->find();
if($data1){
$da6=Db::name('cart')->where("id",$data1["cartid"])->find();
$da5=Db::name('server')->where("id",$da6["serverid"])->find();
include_once PATH."plugins/host/".$da5["serverplugins"]."/".$da5["serverplugins"].".php";
$function=$da5["serverplugins"]."_"."OrderConfigOptions";
if(function_exists($function)){
$da4=@$function();
for($i=0;$i<count($da4);$i++){
foreach ($data1 as $key => $value){
if($da4[$i]["name"]==$key){
if($value!=""){
$da4[$i]["value"]=$value;
}
}
}
}
$data7=$da4;
}else{
$data7="";
}

if(Request::instance()->isPost()) {
$act=input("act");


//暂停
if($act=="stop"){
if($data1["state"]=="3"){
	$array["code"]="-1";
	$array["msg"]="产品已终止,禁止修改此状态!";
}else{
$da1=Db::name('cart')->where("id",$data1["cartid"])->find();
$da2=Db::name('server')->where("id",$da1["serverid"])->find();
include_once PATH."plugins/host/".$da2["serverplugins"]."/".$da2["serverplugins"].".php";
$function=$da2["serverplugins"]."_"."SuspendAccount";
if(function_exists($function)){
$da4=@$function($da2,$data1,$da1);
}
$da5=Db::name("order")->where("id",$data1["id"])->update([
"state"=>"2",
]);
	$array["code"]="1";
	$array["msg"]="暂停成功!";
}
return $array;

}
//解除暂停
if($act=="stopoff"){
if($data1["state"]=="3"){
	$array["code"]="-1";
	$array["msg"]="产品已终止,禁止修改此状态!";
}else{
$da1=Db::name('cart')->where("id",$data1["cartid"])->find();
$da2=Db::name('server')->where("id",$da1["serverid"])->find();
include_once PATH."plugins/host/".$da2["serverplugins"]."/".$da2["serverplugins"].".php";
$function=$da2["serverplugins"]."_"."UnsuspendAccount";
if(function_exists($function)){
$da3=@$function($da2,$data1,$da1);
}
$da5=Db::name("order")->where("id",$data1["id"])->update([
"state"=>"1",
]);
	$array["code"]="1";
	$array["msg"]="解除暂停成功!";
}
return $array;

}
//终止
if($act=="end"){
$da1=Db::name('cart')->where("id",$data1["cartid"])->find();
$da2=Db::name('server')->where("id",$da1["serverid"])->find();
include_once PATH."plugins/host/".$da2["serverplugins"]."/".$da2["serverplugins"].".php";
$function=$da2["serverplugins"]."_"."TerminateAccount";
if(function_exists($function)){
$da4=@$function($da2,$data1,$da1);
}
$da5=Db::name("order")->where("id",$data1["id"])->update([
"state"=>"3",
]);
$da6=Db::name("cart")->where("id",$data1["cartid"])->update([
"inventory"=>$da1["inventory"]+1,
]);
	$array["code"]="1";
	$array["msg"]="终止成功!";
return $array;

}
//删除
if($act=="delete"){
$da5=Db::name("order")->where("id",$data1["id"])->delete();
	$array["code"]="1";
	$array["msg"]="删除成功!";
return $array;
}

if($act=="edit"){
$post=input("post.");
$post["atime"]=strtotime($post["atime"]);
if($post["atime"]==""){
$post["atime"]="1";
}
$post["ztime"]=strtotime($post["ztime"]);
if($post["ztime"]==""){
$post["ztime"]="1";
}
unset($post["act"]);
$db=Db::name("order")->where([
"id"=>$id,
])->update($post);
if($db){
	$array["code"]="1";
	$array["msg"]="修改成功!";
}else{
	$array["code"]="-1";
	$array["msg"]="修改失败!";
}
return $array;
}
}

return $this->fetch('/'.$this->web["admintemplate"]."/orders",[
"order"=>$data1,
"data7"=>$data7,
]);
}else{
$this->redirect('/admin/order');
}
}else{
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name('order')->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}


if($act=="qbdelete"){
$data12=Db::name("order")->select();
$a="0";
$b="0";
for($i=0;$i<count($data12);$i++){
$data1=Db::name('order')->where("id",$data12[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}

}
$search=input("search");
if($search){
$data=Db::name('order')->whereor("id", 'like', '%'.$search.'%')->whereor("user", 'like', '%'.$search.'%')->whereor("password", 'like', '%'.$search.'%')->whereor("userid", 'like', '%'.$search.'%')->whereor("cartid", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('order')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/order",[
"order"=>$data,
]);
}
}


public function pay(){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name('pay')->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}


if($act=="qbdelete"){
$data12=Db::name("pay")->select();
$a="0";
$b="0";
for($i=0;$i<count($data12);$i++){
$data1=Db::name('pay')->where("id",$data12[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('pay')->whereor("id", 'like', '%'.$search.'%')->whereor("name", 'like', '%'.$search.'%')->whereor("ordernumber", 'like', '%'.$search.'%')->whereor("pay", 'like', '%'.$search.'%')->whereor("money", 'like', '%'.$search.'%')->whereor("userid", 'like', '%'.$search.'%')->whereor("state", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('pay')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/pay",[
"pay"=>$data,
]);
}

public function templateset(){
if(Request::instance()->isPost()) {
$input=input("post.");
if($input){
$wj=include_once(PATH."/app/index/view/".$this->web["template"]."/set.php");
for($i=0;$i<count($wj);$i++){
foreach ($input as $key => $value){
if($wj[$i]["name"]==$key){
$wj[$i]["value"]=$value;
}
}
}
$data=Db::name('web')->where('id',"1")->update([
"templateset"=>json_encode($wj),
]);
if($data){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}else{
$array["code"]="-1";
$array["msg"]="没有数据!";
}
return $array;
}
$tyyy=@json_decode($this->web['templateset'],true);
if($tyyy=="null"){
$tyyy="";
}
return $this->fetch('/'.$this->web["admintemplate"]."/templateset",[
"tempset"=>$tyyy,
]);
}

public function transferrecord(){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name('transferrecord')->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}


if($act=="qbdelete"){
$data12=Db::name("transferrecord")->select();
$a="0";
$b="0";
for($i=0;$i<count($data12);$i++){
$data1=Db::name('transferrecord')->where("id",$data12[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('transferrecord')->whereor("id", 'like', '%'.$search.'%')->whereor("userid", 'like', '%'.$search.'%')->whereor("record", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('transferrecord')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"].'/transferrecord',[
"data"=>$data,
]);
}

public function transaction(){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name('transaction')->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}


if($act=="qbdelete"){
$data12=Db::name("transaction")->select();
$a="0";
$b="0";
for($i=0;$i<count($data12);$i++){
$data1=Db::name('transaction')->where("id",$data12[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}

}

$search=input("search");
if($search){
$data=Db::name('transaction')->whereor("id", 'like', '%'.$search.'%')->whereor("userid", 'like', '%'.$search.'%')->whereor("content", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('transaction')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"].'/transaction',[
"data"=>$data,
]);
}



public function pays($id=null){
if($id){
$data1=Db::name('pays')->where("id",$id)->find();
if($data1){
if(Request::instance()->isPost()) {
$input=input("post.");
if($input){
if(file_exists(PATH."/plugins/pay/".$data1["plugins"]."/set.php")){
$wj=include_once(PATH."/plugins/pay/".$data1["plugins"]."/set.php");
for($i=0;$i<count($wj);$i++){
foreach ($input as $key => $value){
if($wj[$i]["name"]==$key){
$wj[$i]["value"]=$value;
}
}
}
$sj=json_encode($wj);
}else{
$sj="";
}
$data=Db::name('pays')->where('id',$id)->update([
"name"=>$input["nname"],
"state"=>$input["nstate"],
"data"=>$sj,
]);
if($data){
$array["code"]="1";
$array["msg"]="修改成功!";
}else{
$array["code"]="-1";
$array["msg"]="修改失败!";
}
}else{
$array["code"]="-1";
$array["msg"]="没有数据!";
}
return $array;
}
$tyyy=@json_decode($data1["data"],true);
if($tyyy=="null"){
$tyyy="";
}
return $this->fetch('/'.$this->web["admintemplate"]."/payss",[
"nname"=>$data1["name"],
"nstate"=>$data1["state"],
"payss"=>$tyyy,
]);
}else{
$this->redirect('/admin/pays');
}
}else{
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="add"){
$info=input("post.");
if($info["name"]=="" || !$info["plugins"]){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
unset($info["act"]);
if(file_exists(PATH."/plugins/pay/".$info["plugins"]."/set.php")){
$wj=include_once(PATH."/plugins/pay/".$info["plugins"]."/set.php");
$info["data"]=json_encode($wj);
}else{
$info["data"]="";
}
$data1=Db::name('pays')->insertGetId($info);
if($data1){
$array["code"]="1";
$array["msg"]="添加成功!";
}else{
$array["code"]="-1";
$array["msg"]="添加失败!";
}
}
return $array;
}





if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name("pays")->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if(input("act")=="qbdelete"){
$data11=Db::name("pays")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data1=Db::name("pays")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过此条通道了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}
}
$search=input("search");
if($search){
$data=Db::name('pays')->whereor("id", 'like', '%'.$search.'%')->whereor("name", 'like', '%'.$search.'%')->whereor("plugins", 'like', '%'.$search.'%')->whereor("state", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('pays')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/pays",[
"pays"=>$data,
"payss"=>my_dir(PATH."/plugins/pay"), 
]);
}
}


public function affsy(){
if(Request::instance()->isPost()) {
$act=input("act");
if($act=="delete"){
$cid=input("cid");
if($cid==""){
$array["code"]="-1";
$array["msg"]="必填参数不可为空!";
}else{
$cid=explode(",",input("cid"));
$a="0";
$b="0";
for($i=0;$i<count($cid);$i++){
$data1=Db::name("affsymoney")->where("id",$cid[$i])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已经删除过了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
}
return $array;
}

if(input("act")=="qbdelete"){
$data11=Db::name("affsymoney")->select();
$a="0";
$b="0";
for($i=0;$i<count($data11);$i++){
$data1=Db::name("affsymoney")->where("id",$data11[$i]["id"])->delete();
if($data1){
$a=$a+1;
}else{
$b=$b+1;
}
}
$c="";
if($b>0){
$c="<br/>失败原因:已删除过此条记录了!";
}
$array["code"]="1";
$array["msg"]="成功:".$a.";失败:".$b.$c;
return $array;
}

}
$search=input("search");
if($search){
$data=Db::name('affsymoney')->whereor("id", 'like', '%'.$search.'%')->whereor("information", 'like', '%'.$search.'%')->whereor("money", 'like', '%'.$search.'%')->whereor("userid", 'like', '%'.$search.'%')->order('id desc')->paginate(10,false,['query'=>request()->param()]);
}else{
$data=Db::name('affsymoney')->order('id desc')->paginate(10);
}
return $this->fetch('/'.$this->web["admintemplate"]."/affsy",[
"affsy"=>$data,
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
	$mail->SMTPAuth   = $web["emailauth"];       //开启认证
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
	$mail->IsHTML(true); 
	$mail->Send();
	$array["code"]="1";
	$array["msg"]="邮箱发送成功!";
return $array;
} catch (phpmailerException $e) {
	$array["code"]="-1";
	$array["msg"]="邮箱发送失败:".$e->errorMessage();
return $atray;
}
}

}
