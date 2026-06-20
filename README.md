# SIB-HOST 系统部署指南

本项目是一个基于ThinkPHP框架开发的主机销售管理系统。为了正确运行该项目，请按照以下步骤进行配置。

## 目录结构

```
.
├── app                 应用目录
│   ├── admin           后台管理模块
│   ├── index           前台展示模块
│   └── ...             其他配置文件
├── extend              扩展目录
│   ├── PHPMailer       邮件发送组件
│   └── pay             支付相关组件
├── frame               ThinkPHP框架核心目录
├── plugins             插件目录
├── public              网站根目录（Web服务器应指向此目录）
│   ├── static          静态资源目录
│   └── index.php       入口文件
├── runtime             运行时目录
└── sjk.sql             数据库文件
```

## 运行环境要求

- PHP 7.2 或更高版本
- MySQL 5.6 或更高版本
- Apache 或 Nginx 服务器

## 部署步骤

### 1. 设置运行目录

将Web服务器的运行目录设置为 `public` 目录。这是为了安全考虑，确保应用代码不被直接访问。

#### Apache 配置示例：
在虚拟主机配置中设置：
```apache
DocumentRoot "path/to/project/public"
<Directory "path/to/project/public">
    AllowOverride All
    Require all granted
</Directory>
```

#### Nginx 配置示例：
```nginx
server {
    listen 80;
    server_name yourdomain.com;
    root /path/to/project/public;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }
    
    location ~ \.php$ {
        # PHP-FPM 配置
    }
}
```

### 2. 配置伪静态规则

系统使用ThinkPHP的路由功能，需要配置伪静态规则来实现URL重写。

#### Apache环境：
确保 `public/.htaccess` 文件包含以下内容：
```apache
<IfModule mod_rewrite.c>
  Options +FollowSymlinks -Multiviews
  RewriteEngine On

  RewriteCond %{REQUEST_FILENAME} !-d
  RewriteCond %{REQUEST_FILENAME} !-f
  RewriteRule ^(.*)$ index.php/$1 [QSA,PT,L]
</IfModule>
```

#### Nginx环境：
在server块中添加以下重写规则：
```nginx
location / {
    if (!-e $request_filename) {
       rewrite  ^(.*)$  /index.php?s=$1  last;
       break;
    }
}
```

### 3. 导入数据库

1. 创建一个新的MySQL数据库
2. 使用MySQL客户端或phpMyAdmin等工具导入 `sjk.sql` 文件：
   ```bash
   mysql -u your_username -p your_database_name < sjk.sql
   ```

### 4. 配置数据库连接

编辑 [app/database.php](/app/database.php) 文件，修改以下配置项：

```php
return [
    // 数据库类型
    'type'            => 'mysql',
    // 服务器地址
    'hostname'        => '127.0.0.1',        // 修改为你的数据库地址
    // 数据库名
    'database'        => 'host_sale',            // 修改为你的数据库名
    // 用户名
    'username'        => 'root',            // 修改为你的数据库用户名
    // 密码
    'password'        => '6WC4KSRz744bwrG5', // 修改为你的数据库密码
    // 端口
    'hostport'        => '3306',             // 修改为你的数据库端口
    // 数据库编码默认采用utf8
    'charset'         => 'utf8',
    // 数据库表前缀
    'prefix'          => 'dd_',              // 根据实际情况修改表前缀
    // 其他配置...
];
```

### 5. 访问系统

完成以上配置后，通过浏览器访问您的域名：

- 前台地址：http://yourdomain.com
- 后台地址：http://yourdomain.com/admin

## 常见问题

1. **页面显示空白或500错误**
   - 检查PHP版本是否符合要求
   - 确认runtime目录是否有写入权限
   - 检查Web服务器是否正确指向public目录

2. **页面样式丢失**
   - 检查Web服务器是否正确设置了运行目录为public
   - 确保public/static目录中的静态资源可以正常访问

3. **数据库连接失败**
   - 检查[database.php](app/database.php)配置文件中的数据库连接信息
   - 确认MySQL服务是否正常运行
   - 检查数据库用户是否有足够的权限

## 默认管理员账号

- 用户名：`admin`
- 密码：`admin123`

> 部署后请尽快修改默认密码！

## 声明

本项目中部分代码来源于 sib.cc 思博系统（SIB-HOST），在此对原作者表示感谢。

## 安全建议

1. 部署完成后，建议将 [app/config.php](/app/config.php) 中的 `app_debug` 设置为 `false`
2. 确保public目录外的其他文件无法通过Web访问
3. 定期备份数据库和重要文件
4. 首次登录后请立即修改默认管理员密码