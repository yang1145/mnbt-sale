<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:65:"D:\wwwroot\zj.cc\public/../app/index\view\default\user\panel.html";i:1729480026;s:56:"D:\wwwroot\zj.cc\app\index\view\default\user\header.html";i:1735109108;s:56:"D:\wwwroot\zj.cc\app\index\view\default\user\footer.html";i:1735108806;}*/ ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $webname; ?> - 产品控制台</title> 	
<meta name="description" content="<?php echo $description; ?>">
		<meta name="keywords" content="<?php echo $keywords; ?>">
<link rel="shortcut icon"type="image/x-icon"href="<?php echo $favicon; ?>"/>

            <link rel="stylesheet" id="css-main" href="/static/assets/css/oneui.min.css">
          <link rel="stylesheet" href="/static/assets/css/themes/city.min.css">

    </head>
<!--
<style>
.bg-image{background-position:0 0%;background-size:cover}
</style>
-->


</style>
    <body class="bg-image" style="background-image: url('<?php echo $templateset['网站背景']; ?>');">
        <div id="page-container" class="sidebar-o sidebar-white enable-page-overlay side-scroll page-header-fixed">

            <nav id="sidebar" aria-label="Main Navigation">

                <div class="content-header bg-white-5">

                    <a class="font-w600 text-dual" href="/">
                        <i class="fa fa-circle-notch text-primary"></i>
                        <span class="smini-hide">
                           <?php echo $webname; ?>
                        </span>
                    </a>
                    <div>

                        <div class="dropdown d-inline-block ml-3">

                        </div>
                        <a class="d-lg-none text-dual ml-3" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                            <i class="fa fa-times"></i>
                        </a>
                    </div>
                </div>
                <div class="content-side content-side-full">
                    <ul class="nav-main">
                        <li class="nav-main-item">
                            <a class="nav-main-link" href="/user/index">
     <i class="nav-main-link-icon fas fa-home"></i>
                                <span class="nav-main-link-name">用户中心</span>
                            </a>
                        </li>


                        

                        <li class="nav-main-heading">购买</li>

<li class="nav-main-item">
                        	    <a class="nav-main-link" href="/cart">
                                <i class="nav-main-link-icon fas fa-cart-plus"></i>
                                <span class="nav-main-link-name">购买产品</span>
                            </a>
                        </li>

 

                        <li class="nav-main-heading">基本</li>
						                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:;">
                                <i class="nav-main-link-icon fas fa-user-circle"></i>
                                <span class="nav-main-link-name">账号设置</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/information">
                                        <span class="nav-main-link-name">修改资料</span>
                                    </a>
                                </li>
                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/password">
                                        <span class="nav-main-link-name">修改密码</span>
                                    </a>
                                </li>

                                 <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/mail">
                                        <span class="nav-main-link-name"><?php if($user['mail']): ?>修改邮箱<?php else: ?>绑定邮箱<?php endif; ?></span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:;">
                                <i class="nav-main-link-icon fas fa-dollar-sign"></i>
                                <span class="nav-main-link-name">账户充值</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/pay">
                                        <span class="nav-main-link-name">账户充值</span>
                                    </a>
                                </li>
<li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/payrecord">
                                        <span class="nav-main-link-name">充值记录</span>
                                    </a>
                                </li>
<li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/transaction">
                                        <span class="nav-main-link-name">消费记录</span>
                                    </a>
                                </li>
                            </ul>
                        </li>



                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:;">
                                <i class="nav-main-link-icon fas fa-comments"></i>
                                <span class="nav-main-link-name">工单系统</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/submitticket">
                                        <span class="nav-main-link-name">提交工单</span>
                                    </a>
                                </li>
<li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/supportticket">
                                        <span class="nav-main-link-name">工单列表</span>
                                    </a>
                                </li>
                            </ul>
                        </li>


                <li class="nav-main-item">
                        	    <a class="nav-main-link" href="/announcement">
                                <i class="nav-main-link-icon fas fa-newspaper"></i>
                                <span class="nav-main-link-name">网站公告</span>
                            </a>
                    
                        </li>




                       <li class="nav-main-heading">产品</li>             
                        <li class="nav-main-item">
                            <a class="nav-main-link nav-main-link-submenu" data-toggle="submenu" aria-haspopup="true" aria-expanded="false" href="javascript:;">
                                <i class="nav-main-link-icon fas fa-shopping-cart"></i>
                                <span class="nav-main-link-name">产品管理</span>
                            </a>
                            <ul class="nav-main-submenu">
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/order">
                                        <span class="nav-main-link-name">我的产品</span>
                                    </a>
                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/transfer">
                                      <span class="nav-main-link-name">产品过户</span>
                                    </a>
                                </li>

                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/transferrecord">
                                      <span class="nav-main-link-name">过户记录</span>
                                    </a>
                                </li>
						 </ul>
                        </li>



                        <li class="nav-main-heading">推广</li>
                       
                            
                                <li class="nav-main-item">
                                    <a class="nav-main-link" href="/user/aff">
<i class="nav-main-link-icon fas fa-paper-plane"></i>
                                        <span class="nav-main-link-name">推广中心</span>
                                    </a>
                                </li>
						 
                        </li>

<?php if($templateset["侧边栏"]): ?>
                        <li class="nav-main-heading">其他</li>
                       
                            
<?php echo $templateset["侧边栏"]; ?>
						 
                        </li>

<?php endif; ?>

                    </ul>
                </div>
            </nav>

            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="d-flex align-items-center">
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-fw fa-bars"></i>
                        </button>
                        <button type="button" class="btn btn-sm btn-dual mr-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                            <i class="fa fa-fw fa-ellipsis-v"></i>
                        </button>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown d-inline-block ml-2">
                            <button type="button" class="btn btn-sm btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded" src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $user['qq']; ?>&s=100" alt="Header Avatar" style="width: 18px;">
                                <span class="d-none d-sm-inline-block ml-1"><?php echo $user['name']; ?></span>
                                <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right p-0 border-0 font-size-sm" aria-labelledby="page-header-user-dropdown" style="border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                <div class="p-3 text-center bg-primary" style="border-radius: 8px;box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);">
                                    <img class="img-avatar img-avatar48 img-avatar-thumb" src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $user['qq']; ?>&s=100" alt="">
                                </div>
                                <div class="p-2">
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="/user/password">
                                        <span>修改密码</span>
                                        <i class="si si-settings"></i>
                                    </a>
                                    <div role="separator" class="dropdown-divider"></div>
                                    <a class="dropdown-item d-flex align-items-center justify-content-between" href="/user/logout">
                                        <span>退出登录</span>
                                        <i class="si si-logout ml-1"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="page-header-loader" class="overlay-header bg-white">
                    <div class="content-header">
                        <div class="w-100 text-center">
                            <i class="fa fa-fw fa-circle-notch fa-spin"></i>
                        </div>
                    </div>
                </div>
            </header>


                      <main id="main-container">
                <div class="content content-narrow">

<div class="row">

                        <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">产品信息</h3>
                        </div>
                        <div class="block-content">
<h1>
<span class="text-primary"><?php echo $cart['name']; ?></span>
</h1>
    <style>
        .container {
            display: flex;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                        flex-direction: column;
        }
        </style>
                            <div class="container">
<?php echo $cart['content']; ?>
</div>
<br/>
状态:<?php if($data['state']=="1"): ?><button class="btn badge badge-success">正常</button><?php endif; if($data['state']=="2"): ?><button class="btn badge badge-warning">暂停</button><?php endif; if($data['state']=="3"): ?><button class="btn badge badge-danger">终止</button><?php endif; ?>
<br/>
<br/>
续费价格:￥<?php if($cart['money']=="0"): ?>免费<?php else: ?><?php echo $cart['money']; endif; ?>/
<?php if($cart['cycle']=="day"): ?>日<?php endif; if($cart['cycle']=="month"): ?>月<?php endif; if($cart['cycle']=="season"): ?>季<?php endif; if($cart['cycle']=="year"): ?>年<?php endif; if($cart['cycle']=="unrestricted"): ?>一次性<?php endif; ?>
<br/>
开通时间:<?php echo date("Y-m-d",$data['atime']); ?><br/>
到期时间:<span class="text-primary"><?php echo date("Y-m-d",$data['ztime']); ?></span><br/><br/>
</div>
</div>
</div>


                 <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                    <div class="block">
                        <div class="block-header">
                            <h3 class="block-title">产品操作</h3>
                        </div>
                        <div class="block-content">
  <button onclick="renew()" class="btn btn-primary">续费</button>
<?php if($upgrade=="1"): ?>
  <button onclick="upgrade()" class="btn btn-primary">升/降级产品</button>
<?php endif; ?>
<br/><br/>
<?php echo $ClientArea; ?>

<br/><br/>

                                        

</div>
</div>
</div>



</div>
</div>
</main>
            <footer id="page-footer" class="bg-body-light">
                <div class="content py-3">
                    <div class="row font-size-sm">
                        <div class="col-sm-4 order-sm-2 py-1 text-center text-sm-right">
                            版权所有<i class="fa fa-heart text-danger"></i> <a class="font-w600" href="" target="_blank"><?php echo $webname; ?></a>
                        </div>
                        <div class="col-sm-4 order-sm-1 py-1 text-center text-sm-left">
                            <a class="font-w600" href="/"><?php echo $webname; ?></a> &copy; <span data-toggle="year-copy">2024</span>
                        </div>
                            <div class="col-sm-4 order-sm-1 py-1 text-center text-sm-left">
<a href="//beian.miit.gov.cn/"><?php echo $templateset['网站备案号']; ?></a>
</div>

                    </div>
                </div>
            </footer>
        </div>
        <script src="/static/assets/js/oneui.core.min.js"></script>
        <script src="/static/assets/js/oneui.app.min.js"></script>
        <script src="/static/assets/vendor/layer/layer.js"></script>
        

<script>
$('.block').addClass('animated rotateInDownLeft');
</script>

<style>
.layui-layer-btn .layui-layer-btn0 {
    border-color: #ff6b6b;
    background-color: #ff6b6b;
    color: #fff !important;
}
.layui-layer-btn a {
    height: 28px;
    line-height: 28px;
    margin: 5px 5px 0;
    padding: 0 15px;
    border: 1px solid #dedede;
    background-color: #fff;
    color: #333 !important;
    border-radius: 2px;
    font-weight: 400;
    cursor: pointer;
    text-decoration: none;
    font-size:14px;
}
td,th{
white-space: nowrap;
}


</style>
        

    </body>
</html>
<script>

    function renew(){

 layer.prompt({title: '续费/<?php if($cart['cycle']=="day"): ?>日<?php endif; if($cart['cycle']=="month"): ?>月<?php endif; if($cart['cycle']=="year"): ?>年<?php endif; if($cart['cycle']=="unrestricted"): ?>一次性<?php endif; ?>', formType: 3}, function(time, index){
        layer.close(index);
 layer.confirm('确定要续费<b style="color:#ff6b6b">'+time+'</b><?php if($cart['cycle']=="day"): ?>日<?php endif; if($cart['cycle']=="month"): ?>月<?php endif; if($cart['cycle']=="year"): ?>年<?php endif; if($cart['cycle']=="unrestricted"): ?>一次性<?php endif; ?>吗？',{icon:3},  function (){
            renews(time)
        });
      });
}

    function renews(time){
        var load = layer.load('1',{shade:0.8,time:false});

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:'renew',
                id:<?php echo $data['id']; ?>,
time:time,
            },
            dataType:'json',
            success:function (data){
                layer.close(load);
                if(data.code == 1){
                    setTimeout(function (){
                   location.href = ''
},1000);
                    layer.alert(data.msg,{icon:1});
                }else{
                    layer.alert(data.msg,{icon:2});
                }
            }
        });
    }

function upgrade() {
    layer.open({
        type: 1,
        closeBtn: false,
        shift: 7,
        shadeClose: true,
        title:"产品升降级",
        content: '<form><div class="block-content"><div class="form form-group row"><label class="col-12">请选择产品</label><div class="col-12"><select name="newcartid" class="form-control text-primary font-size-sm" id="newcartid"><option value="">不选择</option><?php if($upgrades): if(is_array($upgrades) || $upgrades instanceof \think\Collection || $upgrades instanceof \think\Paginator): $i = 0; $__LIST__ = $upgrades;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$up): $mod = ($i % 2 );++$i;?><option value="<?php echo $up['id']; ?>"><?php echo $up['information']; ?></option><?php endforeach; endif; else: echo "" ;endif; endif; ?></select><br/><div class="form-group row"><div class="col-12"><button type="button" onclick="upgrades()" class="btn btn-primary btn-block">提交</button></div></div></div></form>'
    });
}
 




    function upgrades(){
             var load = layer.msg('提交中，请稍后...',{icon:16,time:false});
var newcartid=$("#newcartid").val();
        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:'upgrade',
                newcartid:newcartid,
            },
            dataType:'json',
            success:function (data){
                layer.close(load)
                if(data.code == 1){
                    setTimeout(function (){
                        location.href = ''
                    },1000);
                    layer.alert(data.msg,{icon:1});
                }else{
                    layer.msg(data.msg,{icon:2});
                }
            }
        });
    }

</script>