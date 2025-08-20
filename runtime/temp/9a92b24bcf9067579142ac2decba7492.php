<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:73:"D:\wwwroot\zj.cc\public/../app/index\view\default\index\announcement.html";i:1735109180;}*/ ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $webname; ?> - 网站公告</title>
	 	<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
<link rel="shortcut icon"type="image/x-icon"href="<?php echo $favicon; ?>"/>

 <link rel="stylesheet" id="css-main" href="/static/assets/css/oneui.min.css">
 
      <link rel="stylesheet" href="/static/assets/css/themes/city.min.css">
 
         <style>
.pagination {
	display:inline-block;
	padding-left:0;
	margin:20px 0;
	border-radius:4px
}
.pagination>li {
	display:inline
}
.pagination>li>a,.pagination>li>span {
	position:relative;
	float:left;
	padding:6px 12px;
	margin-left:-1px;
	line-height:1.42857143;
	color:#ff6b6b;
	text-decoration:none;
	background-color:#fff;
	border:1px solid #ddd
}
.pagination>li:first-child>a,.pagination>li:first-child>span {
	margin-left:0;
	border-top-left-radius:4px;
	border-bottom-left-radius:4px
}
.pagination>li:last-child>a,.pagination>li:last-child>span {
	border-top-right-radius:4px;
	border-bottom-right-radius:4px
}
.pagination>li>a:focus,.pagination>li>a:hover,.pagination>li>span:focus,.pagination>li>span:hover {
	z-index:2;
	color:#23527c;
	background-color:#eee;
	border-color:#ddd
}
.pagination>.active>a,.pagination>.active>a:focus,.pagination>.active>a:hover,.pagination>.active>span,.pagination>.active>span:focus,.pagination>.active>span:hover {
	z-index:3;
	color:#fff;
	cursor:default;
	background-color:#ff6b6b;
	border-color:#ff6b6b
}
.pagination>.disabled>a,.pagination>.disabled>a:focus,.pagination>.disabled>a:hover,.pagination>.disabled>span,.pagination>.disabled>span:focus,.pagination>.disabled>span:hover {
	color:#777;
	cursor:not-allowed;
	background-color:#fff;
	border-color:#ddd
}
.pagination-lg>li>a,.pagination-lg>li>span {
	padding:10px 16px;
	font-size:18px;
	line-height:1.3333333
}
.pagination-lg>li:first-child>a,.pagination-lg>li:first-child>span {
	border-top-left-radius:6px;
	border-bottom-left-radius:6px
}
.pagination-lg>li:last-child>a,.pagination-lg>li:last-child>span {
	border-top-right-radius:6px;
	border-bottom-right-radius:6px
}
.pagination-sm>li>a,.pagination-sm>li>span {
	padding:5px 10px;
	font-size:12px;
	line-height:1.5
}
.pagination-sm>li:first-child>a,.pagination-sm>li:first-child>span {
	border-top-left-radius:3px;
	border-bottom-left-radius:3px
}
.pagination-sm>li:last-child>a,.pagination-sm>li:last-child>span {
	border-top-right-radius:3px;
	border-bottom-right-radius:3px
}
</style>
    </head>
     <body class="bg-image" style="background-image: url('<?php echo $templateset['网站背景']; ?>');">

<main id="main-container">

                <div class="content">



                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">网站公告</h3>
                        </div>
                        <div class="block-content">
                            <div class="table-responsive">
                                <table class="table table-bordered  table-vcenter table-hover table-sm">
                                    <thead>
<tr>
                                            <th>标题</th>
                                            <th>时间</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>

<?php foreach($announcement as $a): ?>
<tr>
                                        <td><?php echo $a['name']; ?></td>
                                        <td><?php echo date("Y-m-d H:i:s",$a['time']); ?></td>
                                        <td>
                      <a class="badge badge-primary" href="/announcement/<?php echo $a['id']; ?>">查看</a>                                                 </td>

</tr>
<?php endforeach; ?>

                                    </thead>

</table>

</div>
<div style="text-align:center"><?php echo $announcement->render(); ?></div>

<div class="form-group row">
                                            <div class="col-4">
                                            <center>
                                                <a href="/" class="btn btn-primary btn-sm">
                                                
                                            <i class="fas fa-home mr-1"></i>网站首页</a> </center>
                                            </div>
                                            
                                            
                                            <div class="col-4">
                                             <center>
                                                <a href="/cart" class="btn btn-primary btn-sm">
                                                
                                            <i class="fas fa-cart-plus mr-1"></i>购买产品</a> </center>
                                            </div>
                                            
                                            
<div class="col-4">
 <center>
<?php if($userstate=="1"): ?>

      <a href="/user" class="btn btn-primary btn-sm"><i class="fa fa-user mr-1"></i>用户中心</a>
<?php else: ?>
      <a href="/login" class="btn btn-primary btn-sm"><i class="fa fa-sign-in-alt mr-1"></i>用户登录</a>
                                                <?php endif; ?>
                                                 </center>
                                            </div>
                                        </div>
</div>

<br/>
</div>

</div>

</main>
</div>
        <script src="/static/assets/js/oneui.core.min.js"></script>
        <script src="/static/assets/js/oneui.app.min.js"></script>
        <script src="/static/assets/vendor/layer/layer.js"></script>
        <script>
$('.block').addClass('animated rotateInDownLeft');
</script>

    </body>
</html>