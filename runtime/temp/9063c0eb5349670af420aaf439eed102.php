<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:58:"D:\wwwroot\zj.cc\public/../app/admin\view\default\set.html";i:1730270930;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\header.html";i:1738745069;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\footer.html";i:1688394438;}*/ ?>
 <!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title><?php echo $webname; ?> - 网站设置</title>
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


<!-- <li class="nav-item">
              <a href="/admin/sq">
                <i class="mdi mdi-alien-outline"></i>
                <span>授权中心</span>
              </a>
            </li> -->


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
              <header class="card-header"><div class="card-title">网站设置</div></header>
              <div class="card-body">

                <ul class="nav nav-tabs">
                  <li class="nav-item">
                    <button class="nav-link active" id="basic-config" data-bs-toggle="tab" data-bs-target="#config" type="button" >基本</button>
                  </li>
                  <li class="nav-item">
                    <button class="nav-link" id="basic-upload" data-bs-toggle="tab" data-bs-target="#upload" type="button">邮箱</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" id="basic-aff" data-bs-toggle="tab" data-bs-target="#aff" type="button">推广中心</button>
                  </li>
              
                  <li class="nav-item">
                    <button class="nav-link" id="basic-cron" data-bs-toggle="tab" data-bs-target="#cron" type="button">计划任务</button>
                  </li>
                  
                  
                  <li class="nav-item">
                    <button class="nav-link" id="basic-yx" data-bs-toggle="tab" data-bs-target="#yx" type="button">邮箱验证设置</button>
                  </li>
                </ul>

                <form action="" method="post" name="edit-form" class="edit-form">
                  <div class="tab-content">



                    <div class="tab-pane fade show active" id="config" aria-labelledby="basic-config">
                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">网站名称</label>
                        <input class="form-control" type="text" name="name" value="<?php echo $web['name']; ?>" placeholder="">      
                      </div>


                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">网站描述</label>
                        <input class="form-control" type="text" name="description" value="<?php echo $web['description']; ?>" placeholder="">      
                      </div>



                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">网站关键词</label>
                        <input class="form-control" type="text" name="keywords" value="<?php echo $web['keywords']; ?>" placeholder="">      
                      </div>


                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">网站头像</label>
                        <input class="form-control" type="text" name="favicon" value="<?php echo $web['favicon']; ?>" placeholder="">      
                      </div>


<div class="mb-3">
                    <label for="type" class="form-label">前台模板</label>
                    <div class="form-controls">
                      <select name="template" class="form-select" id="type">
<?php if(is_array($template) || $template instanceof \think\Collection || $template instanceof \think\Paginator): $i = 0; $__LIST__ = $template;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$t): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $t; ?>" <?php if($web['template']==$t): ?>selected<?php endif; ?>><?php echo $t; ?></option>
<?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                  </div>

<div class="mb-3">
                    <label for="type" class="form-label">后台模板</label>
                    <div class="form-controls">
                      <select name="admintemplate" class="form-select" id="type">
<?php if(is_array($admintemplate) || $admintemplate instanceof \think\Collection || $admintemplate instanceof \think\Paginator): $i = 0; $__LIST__ = $admintemplate;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$ad): $mod = ($i % 2 );++$i;?>
                        <option value="<?php echo $ad; ?>" <?php if($web['template']==$ad): ?>selected<?php endif; ?>><?php echo $ad; ?></option>
<?php endforeach; endif; else: echo "" ;endif; ?>
                      </select>
                    </div>
                  </div>
     <div class="mb-3">
                    <label for="type" class="form-label">维护模式</label>
                    <div class="form-controls">
                      <select name="wh" class="form-select" id="type">
                        <option value="1" <?php if($web['wh']=="1"): ?>selected<?php endif; ?>>开启</option>
                        <option value="0" <?php if($web['wh']=="0"): ?>selected<?php endif; ?>>关闭</option>
                      </select>
</div></div>

<div class="mb-3">
                        <label for="web_site_title" class="form-label">维护信息</label>
                        <textarea style="height:200px" class="form-control" type="text" name="whxx"><?php echo $web['whxx']; ?></textarea>
                      </div>

</div>



                   
                    <div class="tab-pane fade" id="upload" aria-labelledby="basic-upload">
     <div class="mb-3">

                    <label for="type" class="form-label">是否开启邮箱通知</label>
                    <div class="form-controls">
                      <select name="email" class="form-select" id="type">
                        <option value="1" <?php if($web['email']=="1"): ?>selected<?php endif; ?>>开启</option>
                        <option value="0" <?php if($web['email']=="0"): ?>selected<?php endif; ?>>关闭</option>
                      </select>
                    </div>
                  </div>
                         <div class="mb-3">
                        <label for="web_site_title" class="form-label">邮件编码</label>
                        <input class="form-control" type="text" name="emailchar" value="<?php echo $web['emailchar']; ?>" placeholder="">      
                      </div>

 <div class="mb-3">
                        <label for="web_site_title" class="form-label">SMTP协议</label>
                        <input class="form-control" type="text" name="emailsecure" value="<?php echo $web['emailsecure']; ?>" placeholder="">      
                      </div>


 <div class="mb-3">
                        <label for="web_site_title" class="form-label">服务器端口</label>
                        <input class="form-control" type="text" name="emailport" value="<?php echo $web['emailport']; ?>" placeholder="">      
                      </div>



 <div class="mb-3">
                        <label for="web_site_title" class="form-label">SMTP服务器</label>
                        <input class="form-control" type="text" name="emailhost" value="<?php echo $web['emailhost']; ?>" placeholder="">      
                      </div>



     <div class="mb-3">
                    <label for="type" class="form-label">是否开启邮箱认证</label>
                    <div class="form-controls">
                      <select name="emailauth" class="form-select" id="type">
                        <option value="true" <?php if($web['emailauth']=="true"): ?>selected<?php endif; ?>>开启</option>
                        <option value="false" <?php if($web['emailauth']=="false"): ?>selected<?php endif; ?>>关闭</option>
                      </select>
</div></div>

     <div class="mb-3">
                        <label for="web_site_title" class="form-label">邮箱账号</label>
                        <input class="form-control" type="email" name="emailname" value="<?php echo $web['emailname']; ?>" placeholder="">      
                      </div>

     <div class="mb-3">
                        <label for="web_site_title" class="form-label">邮箱密码</label>
                        <input class="form-control" type="password" name="emailpass" value="<?php echo $web['emailpass']; ?>" placeholder="">      
                      </div>


                    </div>





                    <div class="tab-pane fade" id="aff" aria-labelledby="basic-aff">

                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">提成</label>
                        <input class="form-control" type="text" name="affdiscount" value="<?php echo $web['affdiscount']; ?>" placeholder="">      
                      </div>
                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">最小提现金额</label>
                        <input class="form-control" type="text" name="affwithdrawal" value="<?php echo $web['affwithdrawal']; ?>" placeholder="">      
                      </div>
</div>


              <div class="tab-pane fade" id="cron" aria-labelledby="basic-cron">


                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">计划任务地址</label>
                        <input class="form-control" type="text" value="<?php echo $cronurl; ?>" placeholder="" readonly/>      
                      </div>

                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">产品到期多少天后终止</label>
                        <input class="form-control" type="text" name="cronzz" value="<?php echo $web['cronzz']; ?>" placeholder="">      
                      </div>
                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">产品终止后多少天删除</label>
                        <input class="form-control" type="text" name="cronsc" value="<?php echo $web['cronsc']; ?>" placeholder="">      
                      </div>

                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">删除多少分钟未支付的订单</label>
                        <input class="form-control" type="text" name="paycron" value="<?php echo $web['paycron']; ?>" placeholder="">      
                      </div>


                      <div class="mb-3">
                        <label for="web_site_title" class="form-label">删除多少天未回复的工单</label>
                        <input class="form-control" type="text" name="tickcron" value="<?php echo $web['tickcron']; ?>" placeholder="">      
                      </div>
</div>



              <div class="tab-pane fade" id="zc" aria-labelledby="basic-zc">

     <div class="mb-3">
                    <label for="type" class="form-label">是否开启注册邮箱验证</label>
                    <div class="form-controls">
                      <select name="zcyxyz" class="form-select" id="type">
                        <option value="1" <?php if($web['zcyxyz']=="1"): ?>selected<?php endif; ?>>开启</option>
                        <option value="0" <?php if($web['zcyxyz']=="0"): ?>selected<?php endif; ?>>关闭</option>
                      </select>
</div></div>

</div>

              <div class="tab-pane fade" id="yx" aria-labelledby="basic-yx">

     <div class="mb-3">
                    <label for="type" class="form-label">是否开启注册邮箱验证</label>
                    <div class="form-controls">
                      <select name="zcyxyz" class="form-select" id="type">
                        <option value="1" <?php if($web['zcyxyz']=="1"): ?>selected<?php endif; ?>>开启</option>
                        <option value="0" <?php if($web['zcyxyz']=="0"): ?>selected<?php endif; ?>>关闭</option>
                      </select>
</div></div>
     <div class="mb-3">
                    <label for="type" class="form-label">是否开启邮箱登录</label>
                    <div class="form-controls">
                      <select name="yxdl" class="form-select" id="type">
                        <option value="1" <?php if($web['yxdl']=="1"): ?>selected<?php endif; ?>>开启</option>
                        <option value="0" <?php if($web['yxdl']=="0"): ?>selected<?php endif; ?>>关闭</option>
                      </select>
</div></div>
</div>

                  </div>

                       <button type="submit" class="btn btn-primary me-1">确 定</button>
 
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
            setTimeout(function () {
                location.href = '';
            }, 1000);
                    layer.alert(data.msg,{icon:1,shade:0.8});
                }else{
                    layer.alert(data.msg,{icon:2,shade:0.8});
                }
            }
        });
        return false;
    });
</script>