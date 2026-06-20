<?php
namespace app\install\controller;

use think\Controller;
use think\Db;
use think\Request;

class Index extends Controller
{
    // 安装锁文件路径
    private $lockFile;

    public function _initialize()
    {
        $this->lockFile = PATH . 'install.lock';
        // 如果已安装，跳转到首页
        if (file_exists($this->lockFile)) {
            $this->redirect('/');
        }
    }

    // 安装首页 - 许可协议
    public function index()
    {
        return $this->fetch('/default/index');
    }

    // 第2步 - 环境检测
    public function step2()
    {
        // 检测环境
        $env = [];
        $env['php'] = PHP_VERSION;
        $env['php_ok'] = version_compare(PHP_VERSION, '5.4.0', '>=');
        $env['pdo'] = extension_loaded('pdo_mysql');
        $env['mysqli'] = extension_loaded('mysqli');
        $env['curl'] = extension_loaded('curl');
        $env['gd'] = extension_loaded('gd');
        $env['openssl'] = extension_loaded('openssl');

        // 目录权限检测
        $dirs = [
            PATH . 'app/database.php',
            PATH . 'runtime',
            PATH . 'public/static',
        ];
        $dirPerm = [];
        foreach ($dirs as $dir) {
            $dirPerm[$dir] = is_writable($dir);
        }

        $allOk = $env['php_ok'] && ($env['pdo'] || $env['mysqli']) && !in_array(false, $dirPerm);

        return $this->fetch('/default/step2', [
            'env' => $env,
            'dirPerm' => $dirPerm,
            'allOk' => $allOk,
        ]);
    }

    // 第3步 - 数据库配置
    public function step3()
    {
        if (Request::instance()->isPost()) {
            $hostname = input('hostname', '127.0.0.1');
            $hostport = input('hostport', '3306');
            $database = input('database', '');
            $username = input('username', '');
            $password = input('password', '');
            $prefix = input('prefix', 'dd_');

            if ($database == '' || $username == '') {
                return ['code' => -1, 'msg' => '数据库名和用户名不能为空!'];
            }

            // 测试数据库连接
            try {
                $dsn = "mysql:host={$hostname};port={$hostport};charset=utf8";
                $pdo = new \PDO($dsn, $username, $password);
                $pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

                // 检查数据库是否存在，不存在则创建
                $pdo->exec("CREATE DATABASE IF NOT EXISTS `{$database}` DEFAULT CHARACTER SET utf8");
                $pdo->exec("USE `{$database}`");
            } catch (\PDOException $e) {
                return ['code' => -1, 'msg' => '数据库连接失败: ' . $e->getMessage()];
            }

            // 写入数据库配置文件
            $configContent = <<<'PHP'
<?php

return [
    // 数据库类型
    'type'            => 'mysql',
    // 服务器地址
    'hostname'        => '{hostname}',
    // 数据库名
    'database'        => '{database}',
    // 用户名
    'username'        => '{username}',
    // 密码
    'password'        => '{password}',
    // 端口
    'hostport'        => '{hostport}',
    // 连接dsn
    'dsn'             => '',
    // 数据库连接参数
    'params'          => [],
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => '{prefix}',
    // 数据库调试模式
    'debug'           => false,
    // 数据库部署方式:0 集中式(单一服务器),1 分布式(主从服务器)
    'deploy'          => 0,
    // 数据库读写是否分离 主从式有效
    'rw_separate'     => false,
    // 读写分离后 主服务器数量
    'master_num'      => 1,
    // 指定从服务器序号
    'slave_no'        => '',
    // 自动读取主库数据
    'read_master'     => false,
    // 是否严格检查字段是否存在
    'fields_strict'   => true,
    // 数据集返回类型
    'resultset_type'  => 'array',
    // 自动写入时间戳字段
    'auto_timestamp'  => false,
    // 时间字段取出后的默认时间格式
    'datetime_format' => 'Y-m-d H:i:s',
    // 是否需要进行SQL性能分析
    'sql_explain'     => false,
];
PHP;

            $configContent = str_replace(
                ['{hostname}', '{database}', '{username}', '{password}', '{hostport}', '{prefix}'],
                [$hostname, $database, $username, $password, $hostport, $prefix],
                $configContent
            );

            $result = file_put_contents(PATH . 'app/database.php', $configContent);
            if ($result === false) {
                return ['code' => -1, 'msg' => '数据库配置文件写入失败，请检查目录权限!'];
            }

            // 创建数据表
            try {
                $this->createTables($pdo, $prefix);
            } catch (\Exception $e) {
                return ['code' => -1, 'msg' => '创建数据表失败: ' . $e->getMessage()];
            }

            return ['code' => 1, 'msg' => '数据库配置成功!'];
        }

        return $this->fetch('/default/step3');
    }

    // 第4步 - 管理员设置
    public function step4()
    {
        if (Request::instance()->isPost()) {
            $adminUser = input('admin_user', '');
            $adminPassword = input('admin_password', '');
            $adminName = input('admin_name', '管理员');
            $adminQQ = input('admin_qq', '');
            $adminMail = input('admin_mail', '');
            $siteName = input('site_name', '我的主机站');

            if ($adminUser == '' || $adminPassword == '') {
                return ['code' => -1, 'msg' => '管理员账号和密码不能为空!'];
            }

            try {
                $prefix = config('database.prefix');

                // 更新管理员账号
                Db::name('admin')->where('id', 1)->update([
                    'name' => $adminName,
                    'user' => $adminUser,
                    'password' => password_hash($adminPassword, PASSWORD_DEFAULT),
                    'qq' => $adminQQ,
                    'mail' => $adminMail,
                ]);

                // 更新网站名称
                Db::name('web')->where('id', 1)->update([
                    'name' => $siteName,
                    'description' => $siteName . ',提供快速、稳定、优质的虚拟主机服务！',
                    'keywords' => $siteName . ',虚拟主机,主机销售',
                ]);

                // 生成安装锁文件
                file_put_contents($this->lockFile, date('Y-m-d H:i:s'));

                return ['code' => 1, 'msg' => '安装完成!'];
            } catch (\Exception $e) {
                return ['code' => -1, 'msg' => '管理员设置失败: ' . $e->getMessage()];
            }
        }

        return $this->fetch('/default/step4');
    }

    // 安装完成
    public function done()
    {
        if (!file_exists($this->lockFile)) {
            $this->redirect('/install');
        }
        return $this->fetch('/default/done');
    }

    // 创建数据表
    private function createTables($pdo, $prefix)
    {
        $sql = $this->getInstallSql($prefix);
        $pdo->exec("SET NAMES utf8");
        $pdo->exec($sql);
    }

    // 获取安装SQL
    private function getInstallSql($prefix)
    {
        return <<<SQL
CREATE TABLE IF NOT EXISTS `{$prefix}admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `qq` varchar(100) NOT NULL,
  `user` varchar(100) NOT NULL,
  `password` varchar(288) NOT NULL,
  `mail` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `{$prefix}admin` (`id`, `name`, `qq`, `user`, `password`, `mail`) VALUES
(1, '管理员', '', 'admin', '', '');

CREATE TABLE IF NOT EXISTS `{$prefix}affsymoney` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information` text NOT NULL,
  `money` varchar(100) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}afftxjl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `information` text NOT NULL,
  `money` varchar(100) NOT NULL,
  `state` varchar(10) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(50) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `information` text NOT NULL,
  `time` varchar(288) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `money` varchar(200) NOT NULL DEFAULT '0',
  `cycle` varchar(100) NOT NULL,
  `firstmo` varchar(288) NOT NULL DEFAULT '0',
  `serverid` varchar(200) NOT NULL,
  `upgrade` varchar(10) NOT NULL DEFAULT '0',
  `upgrades` text,
  `buy` varchar(10) NOT NULL DEFAULT '0',
  `hide` varchar(10) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  `renew` varchar(100) NOT NULL DEFAULT '0',
  `limits` varchar(288) NOT NULL DEFAULT '0',
  `inventory` varchar(100) NOT NULL DEFAULT '0',
  `data1` text, `data2` text, `data3` text, `data4` text, `data5` text,
  `data6` text, `data7` text, `data8` text, `data9` text, `data10` text,
  `data11` text, `data12` text, `data13` text, `data14` text, `data15` text,
  `data16` text, `data17` text, `data18` text, `data19` text, `data20` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(300) DEFAULT NULL,
  `password` varchar(320) DEFAULT NULL,
  `userid` varchar(100) NOT NULL,
  `cartid` varchar(100) NOT NULL,
  `atime` varchar(300) NOT NULL,
  `ztime` varchar(300) NOT NULL,
  `state` varchar(200) NOT NULL,
  `data1` text, `data2` text, `data3` text, `data4` text, `data5` text,
  `data6` text, `data7` text, `data8` text, `data9` text, `data10` text,
  `data11` text, `data12` text, `data13` text, `data14` text, `data15` text,
  `data16` text, `data17` text, `data18` text, `data19` text, `data20` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(288) NOT NULL,
  `ordernumber` varchar(288) NOT NULL,
  `pay` varchar(288) NOT NULL,
  `money` varchar(288) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(288) NOT NULL,
  `state` varchar(288) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}pays` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(288) NOT NULL,
  `plugins` varchar(288) NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT '0',
  `data` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `introduce` text NOT NULL,
  `hide` varchar(10) NOT NULL DEFAULT '0',
  `sort` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}server` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `host` varchar(100) NOT NULL,
  `ip` varchar(200) NOT NULL,
  `security` text NOT NULL,
  `port` varchar(200) NOT NULL,
  `ssl` varchar(200) NOT NULL DEFAULT '0',
  `user` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `serverplugins` varchar(288) NOT NULL,
  `data1` text, `data2` text, `data3` text, `data4` text, `data5` text,
  `data6` text, `data7` text, `data8` text, `data9` text, `data10` text,
  `data11` text, `data12` text, `data13` text, `data14` text, `data15` text,
  `data16` text, `data17` text, `data18` text, `data19` text, `data20` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}sq` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `domain` text NOT NULL,
  `qq` varchar(288) NOT NULL,
  `ip` varchar(288) NOT NULL,
  `time` varchar(288) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}ticket` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(288) NOT NULL,
  `content` mediumtext NOT NULL,
  `userid` varchar(100) NOT NULL,
  `time` varchar(100) NOT NULL,
  `state` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}transaction` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(288) NOT NULL,
  `content` text NOT NULL,
  `time` varchar(288) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}transferrecord` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) NOT NULL,
  `record` mediumtext NOT NULL,
  `time` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `user` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `money` varchar(200) NOT NULL DEFAULT '0',
  `mail` varchar(300) NOT NULL,
  `qq` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `aff` varchar(100) NOT NULL,
  `affmoney` varchar(100) NOT NULL DEFAULT '0',
  `upperid` varchar(100) NOT NULL,
  `time` varchar(200) NOT NULL,
  `state` varchar(10) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `{$prefix}web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `keywords` text NOT NULL,
  `favicon` text NOT NULL,
  `template` varchar(288) NOT NULL,
  `admintemplate` varchar(288) NOT NULL,
  `wh` varchar(10) NOT NULL DEFAULT '0',
  `whxx` text NOT NULL,
  `email` varchar(100) DEFAULT '0',
  `emailchar` varchar(500) NOT NULL,
  `emailsecure` varchar(100) NOT NULL,
  `emailport` varchar(500) NOT NULL,
  `emailhost` varchar(500) NOT NULL,
  `emailname` varchar(500) NOT NULL,
  `emailpass` varchar(500) NOT NULL,
  `emailauth` varchar(500) NOT NULL,
  `affdiscount` varchar(100) NOT NULL,
  `affwithdrawal` varchar(100) NOT NULL,
  `cronzz` varchar(100) NOT NULL,
  `cronsc` varchar(100) NOT NULL,
  `paycron` varchar(100) NOT NULL,
  `tickcron` varchar(100) NOT NULL,
  `zcyxyz` varchar(100) NOT NULL DEFAULT '0',
  `yxdl` varchar(288) NOT NULL DEFAULT '0',
  `templateset` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `{$prefix}web` (`id`, `name`, `description`, `keywords`, `favicon`, `template`, `admintemplate`, `wh`, `whxx`, `email`, `emailchar`, `emailsecure`, `emailport`, `emailhost`, `emailname`, `emailpass`, `emailauth`, `affdiscount`, `affwithdrawal`, `cronzz`, `cronsc`, `paycron`, `tickcron`, `zcyxyz`, `yxdl`, `templateset`) VALUES
(1, '我的主机站', '', '', '/favicon.ico', 'default', 'default', '0', '', '0', 'UTF-8', 'ssl', '465', '', '', '', 'true', '0.25', '10', '3', '3', '5', '3', '0', '0', '[]');

CREATE TABLE IF NOT EXISTS `rsthemes_displays` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

INSERT INTO `rsthemes_displays` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Default', 1, NOW(), NOW());
SQL;
    }
}
