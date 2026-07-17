<?php
function random($length = 8,$chars = null){
  if(empty($chars)){
    $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
  }
  $count = strlen($chars) - 1;
  $code = '';
  while( strlen($code) < $length){
    $code .= substr($chars,rand(0,$count),1);
  }
  return $code;
}

function userrandom(){
$rand="a".rand(100000,999999);
return $rand;
}

//获取目录下的子目录
function my_dir($dir) {
    $files = array();
    if(@$handle = opendir($dir)) { //注意这里要加一个@，不然会有warning错误提示：）
        while(($file = readdir($handle)) !== false) {
            if($file != ".." && $file != ".") { //排除根目录；
               $files[] = $file; 
            }
        }
        closedir($handle);
        return $files;
    }
}

function generateRand($m, $n)
{
    if ($m > $n) {
        $numMax = $m;
        $numMin = $n;
    } else {
        $numMax = $n;
        $numMin = $m;
    }
    /**
     * 生成$numMin和$numMax之间的随机浮点数，保留2位小数
     */
    $rand = $numMin + mt_rand() / mt_getrandmax() * ($numMax - $numMin);
    return floatval(number_format($rand,2));
}

//判断是否是HTTPS
function isHTTPS()
{
    if (defined('HTTPS') && HTTPS) return true;
    if (!isset($_SERVER)) return FALSE;
    if (!isset($_SERVER['HTTPS'])) return FALSE;
    if ($_SERVER['HTTPS'] === 1) {  //Apache
        return TRUE;
    } elseif ($_SERVER['HTTPS'] === 'on') { //IIS
        return TRUE;
    } elseif ($_SERVER['SERVER_PORT'] == 443) { //其他
        return TRUE;
    }
    return FALSE;
}


function judge($a,$b){
    if(in_array($b,$a)){
     return "1";
    }else{
return "2";
}
}

function getLen($num)
{
         $arr = explode('.',$num);
     $str=array_pop($arr);
if($str==$num){
$len="0";
}else{
     $len=strlen($str);
}
         return $len;
}

/**
 * 获取网站配置 (单次请求内静态缓存, 避免控制器 _initialize 与 email 函数重复查询)
 * @param string|null $key 配置字段名, 不传则返回全部配置数组
 * @return mixed|null
 */
function web_config($key = null){
    static $web = null;
    if($web === null){
        $web = \think\Db::name('web')->where('id', 1)->find();
    }
    if($key === null){
        return $web;
    }
    return isset($web[$key]) ? $web[$key] : null;
}