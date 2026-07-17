<?php
namespace app\admin\controller;
use think\Controller;
use think\Db;
use think\Request;

class Login extends Controller
{

    public function index()
    {
		$web=web_config();

	if(Request::instance()->isPost()) {
			$user=input("user");
			$password=input("password");
            $captcha=input("captcha");
if(!captcha_check($captcha)){
	$array["code"]="-2";
	$array["msg"]="验证码错误!";
}else{
			$data=Db::name('admin')->where([
			"user"=>$user,
			])->find();
if($data){
$data1=password_verify($password,$data["password"]);
			if($data1) {
				session("adminid",$data["id"]);
				$array["code"]="1";
				$array["msg"]="登录成功!";
			} else {
				$array["code"]="-1";
				$array["msg"]="密码错误!";
			}
}else{
				$array["code"]="-2";
				$array["msg"]="账号不存在!";
}
}
			return $array;
		}
	return $this->fetch('/'.$web["admintemplate"]."/login",[
            'webname'  => $web['name'],
]);
    }

}
