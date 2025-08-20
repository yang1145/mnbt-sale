<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"D:\wwwroot\zj.cc\public/../app/index\view\default\index\announcements.html";i:1735109218;}*/ ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $webname; ?> - 公告:<?php echo $announcement['name']; ?></title>
	 	<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
<link rel="shortcut icon"type="image/x-icon"href="<?php echo $favicon; ?>"/>

  <link href="//cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"/>

 <link rel="stylesheet" id="css-main" href="/static/assets/css/oneui.min.css">
 
      <link rel="stylesheet" href="/static/assets/css/themes/city.min.css">
<!--
 <style>
.bg-image{background-position:0 0%;background-size:cover}
</style>
-->
    </head>
    <body class="bg-image" style="background-image: url('<?php echo $templateset['网站背景']; ?>');">

<main id="main-container">

                <div class="content">



                    <div class="block">
                     

                        <div class="block-content">
                            <h2 class="text-primary"><?php echo $announcement['name']; ?></h2>
                      <hr/>


<p><?php echo $announcement['information']; ?></p>
<br/>
<p>发布时间:<?php echo date("Y-m-d H:i:s",$announcement['time']); ?></p>
<p style="color:red;text-align: right"><?php echo $webname; ?>~</p>
<div class="form-group row">
                                            
                                            <div class="col-4">
                                             <center>
                                                <a href="/announcement" class="btn btn-primary btn-sm">
                                                
                                            <i class="fas fa-undo mr-1"></i>返回上页</a> </center>
                                            </div>
                                            
                                            <div class="col-4"> <center>
                                                <a href="/cart" class="btn btn-primary btn-sm">
                                                
                                            <i class="fas fa-cart-plus mr-1"></i>购买产品</a> </center>
                                            </div>
<div class="col-4">

<?php if($userstate=="1"): ?>
 <center>
      <a href="/user" class="btn btn-primary btn-sm"><i class="fa fa-user mr-1"></i>用户中心</a>
<?php else: ?>
      <a href="/login" class="btn btn-primary btn-sm"><i class="fa fa-sign-in-alt mr-1"></i>用户登录</a>
                                                <?php endif; ?>
                                                 </center>
                                            </div>
                                        </div>
</div>
</div>
</div>
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