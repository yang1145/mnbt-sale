<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2018 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
//定义404
Route::miss('index/index/null');

return [
//安装向导
"/install"=>"install/index/index",
"/install/index"=>"install/index/index",
"/install/index/step2"=>"install/index/step2",
"/install/index/step3"=>"install/index/step3",
"/install/index/step4"=>"install/index/step4",
"/install/index/done"=>"install/index/done",

//前台
"/"=>"index/index/index",
"/index"=>"index/index/index",
"/login"=>"index/index/login",
"/register"=>"index/index/register",
"/cart/[:id]"=>"index/index/cart",
"/user"=>"index/user/index",
"/user/index"=>"index/user/index",
"/user/password"=>"index/user/password",
"/user/information"=>"index/user/information",
"/user/logout"=>"index/user/logout",
"/product/[:id]"=>"index/index/product",
"/user/pay"=>"index/user/pay",
"/user/order/[:id]"=>"index/user/order",
"/user/return/:id"=>"index/user/return",
"/index/notify/:id"=>"index/index/notify",
"/announcement/[:id]"=>"index/index/announcement",
"/announcements"=>"index/index/announcement",
"/user/payrecord"=>"index/user/payrecord",
"/cron"=>"index/index/cron",
"/pwreset"=>"index/index/pwreset",
"/user/submitticket"=>"index/user/submitticket",
"/user/supportticket/[:id]"=>"index/user/supportticket",
"/user/mail"=>"index/user/mail",
"/user/transfer"=>"index/user/transfer",
"/user/transaction"=>"index/user/transaction",
"/user/aff"=>"index/user/aff",
"/user/transferrecord"=>"index/user/transferrecord",
"/aff/:upper"=>"index/index/aff",
"/sq"=>"index/sq/sq",


//后台
"/admin"=>"admin/index/index",
"/admin/login"=>"admin/login/index",
"/admin/index"=>"admin/index/index",
"/admin/info"=>"admin/index/info",
"/admin/password"=>"admin/index/password",
"/admin/logout"=>"admin/index/logout",
"/admin/set"=>"admin/index/set",
"/admin/user/[:id]/[:orderid]"=>"admin/index/user",
"/admin/ticket/[:id]"=>"admin/index/ticket",
"/admin/classification/[:id]"=>"admin/index/classification",
"/admin/server/[:id]"=>"admin/index/server",
"/admin/product/[:id]"=>"admin/index/product",
"/admin/announcement/[:id]"=>"admin/index/announcement",
"/admin/aff"=>"admin/index/aff",
"/admin/affsy"=>"admin/index/affsy",
"/admin/pay"=>"admin/index/pay",
"/admin/transferrecord"=>"admin/index/transferrecord",
"/admin/transaction"=>"admin/index/transaction",
"/admin/templateset"=>"admin/index/templateset",
"/admin/order/[:id]"=>"admin/index/order",
"/admin/pays/[:id]"=>"admin/index/pays",
"/admin/sq/[:id]"=>"admin/index/sq",
];
