<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// [ 应用入口文件 ]
// 定义应用目录
define('APP_PATH', __DIR__ . '/../app/');
define('PATH', __DIR__ . '/../');

// 检测是否已安装，未安装则跳转到安装向导
if (!file_exists(PATH . 'install.lock') && PHP_SAPI != 'cli') {
    // 如果当前不在安装模块，则跳转
    $uri = $_SERVER['REQUEST_URI'];
    if (strpos($uri, '/install') !== 0) {
        header('Location: /install');
        exit;
    }
}

// 加载框架引导文件
require __DIR__ . '/../frame/start.php';
