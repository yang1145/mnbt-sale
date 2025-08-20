<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:65:"D:\wwwroot\zj.cc\public/../app/index\view\default\index\cart.html";i:1735109202;}*/ ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $webname; ?> - 购买产品</title>
	 	<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
<link rel="shortcut icon"type="image/x-icon"href="<?php echo $favicon; ?>"/>

        <link rel="stylesheet" id="css-main" href="/static/assets/css/oneui.min.css">
     <link rel="stylesheet" href="/static/assets/css/themes/city.min.css">
<!--
 <style>
.bg-image{background-position:0 0%;background-size:cover}
</style>
-->
    </head>
    <body class="bg-image" style="background-image: url('<?php echo $templateset['网站背景']; ?>');">
   
        <div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed">
        
<main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <!-- Modern Design -->
<h1 class="text-primary"><?php if($class): ?><?php echo $class['name']; endif; ?></h1>
                    <h2 class="content-heading" style="color:#ffffff"><?php if($class): ?><?php echo $class['introduce']; endif; ?></h2>


<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
   产品分类
    <span class="caret"></span>
  </button>
  <div class="dropdown-menu fs-sm" aria-labelledby="dropdownMenu1" style="border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
  <?php if($product): foreach($product as $p): ?>
    <a class="dropdown-item" href="/cart/<?php echo $p['id']; ?>"<?php if($productid==$p['id']): ?> style="color:#ff6b6b"<?php endif; ?>><?php echo $p['name']; ?></a>
<?php endforeach; endif; ?>
  </div>
</div>



  <br/> 
  <br/> 
                 <div class="row">
<?php if($cart): foreach($cart as $c): ?>

                                                <div class="col-md-6 col-xl-3" >
                            <div class="block block-link-shadow block-themed block-fx-shadow text-center" >
                                <div class="block-header" style="border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                        <?php echo $c['name']; ?>
<span><?php if($c['inventory']<"1"): ?>已售完<?php else: ?>库存:<?php echo $c['inventory']; endif; ?></span>
                                </div>
                                <div class="block-content bg-body-light">
                                    <div class="py-2">
                                        <p class="h1 font-w700 mb-2">￥<?php if($c['money']=="0"): ?>免费<?php else: ?><?php echo $c['money']; endif; ?>/
<?php if($c['cycle']=="day"): ?>日<?php endif; if($c['cycle']=="month"): ?>月<?php endif; if($c['cycle']=="season"): ?>季<?php endif; if($c['cycle']=="year"): ?>年<?php endif; if($c['cycle']=="unrestricted"): ?>一次性<?php endif; ?>
</p>
<?php if($c['firstmo']=="1"): ?><span class="text-primary">首<?php if($c['cycle']=="day"): ?>日<?php endif; if($c['cycle']=="month"): ?>月<?php endif; if($c['cycle']=="season"): ?>季<?php endif; if($c['cycle']=="year"): ?>年<?php endif; ?>免费</span><?php endif; ?>
                                    </div>
                                </div>
                                <div class="block-content">
                                <p>
      <?php echo $c['content']; ?>   
      </p>
                                </div>
                                <div class="block-content block-content-full bg-body-light" style="border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                    
                                    <?php if($c['inventory']<"1"): ?>
<span class="btn btn-primary px-4">
<i class="fas fa-times-circle"></i> 已售完
</span>
<?php else: ?>
<a <?php if($c['inventory']!="0"): ?>href="/product/<?php echo $c['id']; ?>"<?php endif; ?>>
<span class="btn btn-primary px-4">                            
<i class="fas fa-cart-plus"></i> 购买
</span>
</a>
<?php endif; ?>

                                </div>
                            </div>
                        </div>
<?php endforeach; else: ?>

                                                <div class="col-12">
<h1 style="color:#ff6b6b">该分类下没有产品！</h1>
</duv>
<?php endif; ?>


                                            </div>
                </div>
            </main>
</div>
<style type="text/css">
  .wrap {
      display: block;
      bottom: 0px;      
right: 1px !important;
      right: 18px;
      width: 150px;
      height:120px;
      line-height: 30px;
      position: fixed;
      text-align: center;
  }
</style>
<div class="wrap">
<center>
<?php if($userstate!="1"): ?>
<a href="/login" style="color:#fff">
  <div class="btn-primary" style="height:80px;width:80px;border-radius:80%;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
  <i style="margin-top:15px;" class="fa fa-sign-in-alt fa-rocket mr-1"></i><br/>用户登录
</div>
</a>
<?php else: ?>
<a href="/user/index" style="color:#fff">
  <div class="btn-primary" style="height:80px;width:80px;border-radius:80%;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
<i style="margin-top:15px;" class="fa fa-user fa-rocket mr-1"></i><br/>用户中心
</div>
</a>
<?php endif; ?>
</center>
</div>
        <script src="/static/assets/js/oneui.core.min.js"></script>
        <script src="/static/assets/js/oneui.app.min.js"></script>
        <script src="/static/assets/vendor/layer/layer.js"></script>
                
<script>
$('.block').addClass('animated rotateInDownLeft');
</script>


    </body>
</html>