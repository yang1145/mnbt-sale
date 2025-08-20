<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:61:"D:\wwwroot\zj.cc\public/../app/admin\view\default\orders.html";i:1731427100;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\header.html";i:1733206450;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\footer.html";i:1688394438;}*/ ?>
 <!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title><?php echo $webname; ?> - 产品信息</title>
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

<!--页面主要内容-->
    <main class="lyear-layout-content">
	
      <div class="container-fluid">

        <div class="row">

          <div class="col-lg-12">
            <div class="card">
              <header class="card-header"><div class="card-title">产品信息</div></header>
              <div class="card-body">
状态:
<?php if($order['state']=="1"): ?>
<span class="badge bg-success">正常</span>
<?php endif; if($order['state']=="2"): ?>
<span class="badge bg-warning">暂停</span>
<?php endif; if($order['state']=="3"): ?>
<span class="badge bg-danger">终止</span>
<?php endif; ?>
<br/><br/>
操作:

                       <button type="button" onclick="act('stop')" class="btn btn-warning me-1"><span class="mdi mdi-pause-octagon-outline"></span>暂停</button>

                       <button type="button" onclick="act('stopoff')" class="btn btn-success me-1"><span class="mdi mdi mdi-check"></span>解除暂停</button>

                       <button type="button" onclick="act('end')" class="btn btn-danger me-1"><span class="mdi mdi-alert-octagon-outline"></span>终止</button>

                       <button type="button" onclick="act('delete')" class="btn btn-danger me-1"><span class="mdi mdi mdi-window-close"></span>删除</button>

<hr/>



                <form action="" method="post" name="form" class="edit-form">
                
    <input name="act" value="edit" type="hidden"> 
                  <div class="tab-content">
                    

                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">账号</label>
                        <input class="form-control" type="text" name="user" value="<?php echo $order['user']; ?>" placeholder="">      
                      </div>



                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">密码</label>
                        <input class="form-control" type="text" name="password" value="<?php echo $order['password']; ?>" value="" placeholder="">      
                      </div>



                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">开通时间</label>
                        <input class="form-control" type="text" name="atime" value="<?php echo date('Y-m-d H:i:s',$order['atime']); ?>" placeholder="">      
                      </div>

                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">到期时间</label>
                        <input class="form-control" type="text" name="ztime" value="<?php echo date('Y-m-d H:i:s',$order['ztime']); ?>" placeholder="">      
                      </div>

                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">所属产品ID</label>
                        <input class="form-control" type="text" name="cartid" value="<?php echo $order['cartid']; ?>" placeholder="">      
                      </div>

                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">所属用户ID</label>
                        <input class="form-control" type="text" name="userid" value="<?php echo $order['userid']; ?>" placeholder="">      
                      </div>
<?php if($data7): ?>

<center><b><h3>↓↓↓订单信息↓↓↓</h3></b></center>


<?php foreach($data7 as $t): if($t['type']=="input"): ?>
                  <div class="mb-3">
                    <label for="nickname"><?php echo $t['title']; ?></label>
                    <input type="text" class="form-control" name="<?php echo $t['name']; ?>" value="<?php echo $t['value']; ?>">
<font color="red"><?php echo $t['prompt']; ?></font>
                  </div>
<?php endif; if($t['type']=="textarea"): ?>
                      <div class="mb-3">
                        <label for="web_site_title" class="form-label"><?php echo $t['title']; ?></label>
                        <textarea style="height:200px" class="form-control" type="text" name="<?php echo $t['name']; ?>"><?php echo $t['value']; ?></textarea>
<font color="red"><?php echo $t['prompt']; ?></font>
                      </div>

<?php endif; if($t['type']=="select"): ?>
<div class="mb-3">
                    <label for="type" class="form-label"><?php echo $t['title']; ?></label>
                    <div class="form-controls">
                      <select name="<?php echo $t['name']; ?>" class="form-select" id="type">
<?php if(is_array($t['option']) || $t['option'] instanceof \think\Collection || $t['option'] instanceof \think\Paginator): $i = 0; $__LIST__ = $t['option'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$op): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $op; ?>" <?php if($t['value']==$op): ?>selected<?php endif; ?>><?php echo $op; ?></option>
<?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
<font color="red"><?php echo $t['prompt']; ?></font>
                    </div>
                  </div>
<?php endif; endforeach; endif; ?>



                       <button type="submit" class="btn btn-primary me-1">修改</button>
                    </div>




                   



 
                </form>

              </div>
            </div>
          </div>

        </div>

      </div>    
	
	</main>
    <!--End 页面主要内容-->



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
    $("form").submit(function (){
        var load = layer.msg('修改中，请稍后...',{icon:16,shade:0.8,time:false});

var form = $('form').serializeArray();

        $.ajax({
            type:'POST',
            url:'',
            data:form,
            dataType:'json',
            success:function (data){
                layer.close(load);
                if(data.code == 1){
                    layer.alert(data.msg,{icon:1,shade:0.8});
                }else{
                    layer.alert(data.msg,{icon:2,shade:0.8});
                }
            }
        });
        return false;
    });


function act(pa){
if(pa=="stop"){
var prompt="暂停";
}
if(pa=="stopoff"){
var prompt="解除暂停";
}
if(pa=="end"){
var prompt="终止";
}
if(pa=="delete"){
var prompt="删除";
}
        layer.confirm('确定要<span style="color:#0b5ed7">'+prompt+'</span>吗?', function (){
            act1(pa);
        });
    }
function act1(pa){
        var load = layer.load('1',{shade:0.8,time:false});

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:pa,
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
</script>