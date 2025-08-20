<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"D:\wwwroot\zj.cc\public/../app/admin\view\default\tickets.html";i:1733375866;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\header.html";i:1733206450;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\footer.html";i:1688394438;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title><?php echo $webname; ?> - 工单详情</title>
<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-touch-fullscreen" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<link rel="stylesheet" type="text/css" href="/static/css/materialdesignicons.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/animate.min.css">
<link rel="stylesheet" type="text/css" href="/static/css/style.min.css">
</head>
<body>
<!--
<div id="lyear-preloader" class="loading">
  <div class="ctn-preloader">
    <div class="round_spinner">
      <div class="spinner"></div>
      <img src="/static/assets/vendor/layer/theme/default/loading-2.gif" alt="">
    </div>
  </div>
</div>
-->
<div class="lyear-layout-web">
  <div class="lyear-layout-container">
    <!--左侧导航-->
    <aside class="lyear-layout-sidebar">

      <!-- logo -->
      <div id="logo" class="sidebar-header">
        <a href="/"><img src="/static/images/logo-sidebar.png"/></a>
      </div>
      <div class="lyear-layout-sidebar-info lyear-scroll">

        <nav class="sidebar-main">

          <ul class="nav-drawer">

            <li class="nav-item">
              <a href="/admin/index">
                <i class="mdi mdi-home-circle-outline"></i>
                <span>控制台</span>
              </a>
            </li>


            <li class="nav-item">
              <a href="/admin/user">
                <i class="mdi mdi-account"></i>
                <span>用户管理</span>
              </a>
            </li>

            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)">
                <i class="mdi mdi-cart-outline"></i>
                <span>产品设置</span>
              </a>
              <ul class="nav nav-subnav">
                <li> <a href="/admin/classification">分类</a> </li>
                <li> <a href="/admin/product">产品</a> </li>
                <li> <a href="/admin/server">服务器</a> </li>
              </ul>
            </li>



            <li class="nav-item">
              <a href="/admin/order">
                <i class="mdi mdi-order-bool-ascending"></i>
                <span>订单管理</span>
              </a>
            </li>



            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)">
                <i class="mdi mdi-account"></i>
                <span>客户记录</span>
              </a>
              <ul class="nav nav-subnav">
                <li> <a href="/admin/transferrecord">产品过户记录</a> </li>
                <li> <a href="/admin/pay">充值记录</a> </li>
                <li> <a href="/admin/transaction">消费记录</a> </li>
              </ul>
            </li>
            
            
            <li class="nav-item">
              <a href="/admin/ticket">
                <i class="mdi mdi-message-minus-outline"></i>
                <span>工单管理</span>
              </a>
            </li>


            <li class="nav-item">
              <a href="/admin/announcement">
                <i class="mdi mdi-message-text-outline"></i>
                <span>网站公告</span>
              </a>
            </li>


            <li class="nav-item nav-item-has-subnav">
              <a href="javascript:void(0)">
                <i class="mdi mdi-ticket"></i>
                <span>aff</span>
              </a>
              <ul class="nav nav-subnav">
                <li> <a href="/admin/aff">aff提现记录</a> </li>
                <li> <a href="/admin/affsy">aff收益记录</a> </li>
              </ul>
            </li>
            
            
            
            <li class="nav-item">
              <a href="/admin/pays">
                <i class="mdi mdi-currency-usd"></i>
                <span>支付</span>
              </a>
            </li>

<?php if($templateset=="1"): ?>
            <li class="nav-item">
              <a href="/admin/templateset">
                <i class="mdi mdi-cog"></i>
                <span>前台模板设置</span>
              </a>
            </li>
<?php endif; ?>



            <li class="nav-item">
              <a href="/admin/set">
                <i class="mdi mdi-cog"></i>
                <span>网站设置</span>
              </a>
            </li>


<li class="nav-item">
              <a href="/admin/sq">
                <i class="mdi mdi-alien-outline"></i>
                <span>授权中心</span>
              </a>
            </li>


          </ul>
        </nav>

        <div class="sidebar-footer">
          <p class="copyright">
            <span>Copyright &copy; 2024</span>
            <a target="_blank" href=""><?php echo $webname; ?></a>
          </p>
        </div>
      </div>

    </aside>
    <!--End 左侧导航-->

    <!--头部信息-->
    <header class="lyear-layout-header">

      <nav class="navbar">

        <div class="navbar-left">
          <div class="lyear-aside-toggler">
            <span class="lyear-toggler-bar"></span>
            <span class="lyear-toggler-bar"></span>
            <span class="lyear-toggler-bar"></span>
          </div>
        </div>

        <ul class="navbar-right d-flex align-items-center">


          <!--个人头像内容-->
          <li class="dropdown">
            <a href="javascript:void(0)" data-bs-toggle="dropdown" class="dropdown-toggle">
              <img class="avatar-md rounded-circle" src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $user['qq']; ?>&s=100" alt="<?php echo $user['name']; ?>" />
              <span style="margin-left: 10px;"><?php echo $user['name']; ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
              <li>
                <a class="dropdown-item" href="/admin/info">
                  <i class="mdi mdi-account"></i>
                  <span>个人信息</span>
                </a>
              </li>
              <li>
                <a class="dropdown-item" href="/admin/password">
                  <i class="mdi mdi-lock-outline"></i>
                  <span>修改密码</span>
                </a>
              </li>
              <li class="dropdown-divider"></li>
              <li>
                <a class="dropdown-item" href="/admin/logout">
                  <i class="mdi mdi-logout-variant"></i>
                  <span>退出登录</span>
                </a>
              </li>
            </ul>
          </li>
          <!--End 个人头像内容-->
        </ul>

      </nav>

    </header>
    <!--End 头部信息-->
    <style>    
        .jhhost {
            display: flex;
                        padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                                    margin-bottom:20px;
                        flex-direction: column;
        }
        .cont {
            display: flex;
            flex-direction: row;

        }
        .user-image {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            margin-right: 10px;            
            transform: rotate(0deg);
        }

        .user-details {
            display: flex;
            flex-direction: column;
        }

        .user-details div {
            margin-bottom: 5px;
        }
        .roll{
        height:500px;
        overflow: auto;
        padding: 5px;
        }
        </style>
    <main class="lyear-layout-content">	
      <div class="container-fluid">
        <div class="row">
<div class="col-lg-12">
      <div class="card">
        <header class="card-header">
<div class="card-title">工单详情</div>
</header>
        <div class="card-body">

                        <div class="block-content">
<p>标题:<?php echo $tickets['title']; ?></p>
<div class="roll">
<?php foreach($tickets['content'] as $tc): if($tc['personnel']=="1"): ?>

                            <div class="jhhost">
                            <div class="cont">
        <img src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $user['qq']; ?>&s=100" class="img-thumbnail user-image" id="user-image">
        <div class="user-details">
       
            <div><span class="text-success"><?php echo date("Y-m-d H:i:s",$tc['time']); ?></span></div>
            <div><span class="text-success">你:<?php echo $user['name']; ?></span></div>
</div>
</div>

                            <div class="jhhost" style="                        margin-top:20px;width: fit-content;">
<?php echo $tc['content']; ?>
</div>
 </div>
 
<?php elseif($tc['personnel']=="2"): ?>

                            <div class="jhhost">
                            <div class="cont">
        <img src="http://q1.qlogo.cn/g?b=qq&nk=<?php echo $tickets['userqq']; ?>&s=100" class="img-thumbnail user-image" id="user-image">
        <div class="user-details">
       
            <div><span class="text-primary"><?php echo date("Y-m-d H:i:s",$tc['time']); ?></span></div>
            <div><span class="text-primary">用户ID:<?php echo $tickets['userid']; ?>,<?php echo $tickets['username']; ?></span></div>
</div>
</div>

                            <div class="jhhost" style="                        margin-top:20px;width: fit-content;">
<?php echo $tc['content']; ?>
</div>
 </div>

 
 
 
 
<?php endif; endforeach; ?>
</div>
状态:
<?php if($tickets['state']=="1"): ?>
<span class="btn btn-warning btn-round btn-sm">待您回复</span>
<?php endif; if($tickets['state']=="2"): ?>
<span class="btn btn-warning btn-round btn-sm">等待您回复</span>
<?php endif; if($tickets['state']=="3"): ?>
<span class="btn btn-success btn-round btn-sm">您已回复</span>
<?php endif; if($tickets['state']=="4"): ?>
<span class="btn btn-danger btn-round btn-sm">已关闭</span>
<?php endif; ?>
<br/><br>
操作:
 <button type="button" onclick="end();" class="btn btn-primary">关闭此工单</button>
<br/><br/>
   
                          <form>                                        
<div class="form-group row">
                                            <label class="col-12">回复</label>
                                            <div class="col-12">
                                             	<textarea class="form-control" name="content" rows="10" placeholder="请输入回复内容"></textarea>
                                            </div>
                                        </div>
<br/>
                                        <div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-block">提交</button>
                                            </div>
                                        </div>
                          </form>


</div>

</div>

</div>
</div>
</div>
</div>
</main>


    </div>
</div>

<script type="text/javascript" src="/static/js/jquery.min.js"></script>
<script type="text/javascript" src="/static/js/popper.min.js"></script>
<script type="text/javascript" src="/static/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/static/js/perfect-scrollbar.min.js"></script>
<script type="text/javascript" src="/static/js/jquery.cookie.min.js"></script>
<script type="text/javascript" src="/static/js/main.min.js"></script>

<script src="/static/assets/vendor/layer/layer.js"></script>
</body>
</html>
  <script>
    const dialog = document.querySelector('.roll');
    dialog.scrollTop = dialog.scrollHeight;
  </script>
<script>
    $("form").submit(function (){
        var load = layer.msg('提交中，请稍后...',{icon:16,time:false});

        var content = $("textarea[name='content']").val();


        if( content.length < 1 ){
            layer.alert('提交的信息不可为空',{icon:2});
            return false;
        }

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:"submit",
                content:content,
            },
            dataType:'json',
            success:function (data){
                layer.close(load);
                if(data.code == "1"){
setTimeout(function (){
                   location.href = ''
},1000);
                    layer.alert(data.msg,{icon:1});
                }else{
                    layer.alert(data.msg,{icon:2});
                }
            }
        });
        return false;
    });

function end(){
        layer.confirm('确定要关闭此工单吗！', {icon:3}, function (){
            end1();
        });
    }

function end1(){
var load = layer.msg('提交中，请稍后...',{icon:16,time:false});

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:"end",
            },
            dataType:'json',
            success:function (data){
                layer.close(load);
                if(data.code == "1"){
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
</script>