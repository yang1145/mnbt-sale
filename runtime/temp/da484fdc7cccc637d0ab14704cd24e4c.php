<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:60:"D:\wwwroot\zj.cc\public/../app/admin\view\default\index.html";i:1738746489;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\header.html";i:1738746062;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\footer.html";i:1688394438;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title><?php echo $webname; ?> - 控制台</title>
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
              <a href="http://sib.cc">
                <i class="mdi mdi-alien-outline"></i>
                <span>9.9香港服务器</span>
              </a>
            </li>


          </ul>
        </nav>

        <div class="sidebar-footer">
          <p class="copyright">
            <span>Copyright &copy; 2025</span>
            <a target="_blank" href="http://sib.cc">思博云</a>
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



      <div class="col-md-6 col-xl-6">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                <i class="mdi mdi-currency-cny fs-4"></i>
              </span>
              <span class="fs-4"><?php echo $paymoney; ?></span>
            </div>
            <div class="text-end">总收入</div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-6">
        <div class="card bg-success text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                <i class="mdi mdi-currency-cny fs-4"></i>
              </span>
              <span class="fs-4"><?php echo $paymoney1; ?></span>
            </div>
            <div class="text-end">今日收入</div>
          </div>
        </div>
      </div>

      <div class="col-md-6 col-xl-6">
        <div class="card bg-danger text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                <i class="mdi mdi-account fs-4"></i>
              </span>
              <span class="fs-4"><?php echo $usercount; ?></span>
            </div>
            <div class="text-end">用户总数</div>
          </div>
        </div>
      </div>



      <div class="col-md-6 col-xl-6">
        <div class="card bg-purple text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <span class="avatar-md rounded-circle bg-white bg-opacity-25 avatar-box">
                <i class="mdi mdi-comment-outline fs-4"></i>
              </span>
              <span class="fs-4"><?php echo $ticketcount; ?></span>
            </div>
            <div class="text-end">待处理工单</div>
          </div>
        </div>
      </div>

    </div>

    <div class="row">

      <div class="col-lg-12">
        <div class="card">
          <header class="card-header">
            <div class="card-title">介绍/教程</div>
          </header>
          <div class="card-body">



            <div class="lyear-timeline-item-content">
              <div class="card bg-success">
                <div class="card-body text-white">
                  <h2>欢迎使用全新的虚拟主机销售系统<br />推荐对接服务器<a href="http://sib.cc/cart">思博云sib.cc</a></h2>
                  <h2>香港服务器2h2g3m服务器9.9元续费同价，助力微小企业<a href="https://yun.0330.top/cart?fid=2">购买地址sib.cc</a></h2>

                </div>
              </div>
            </div>

            <div class="lyear-timeline-item-content">
              <div class="card bg-success">
                <div class="card-body text-white">
                  <h2>梦奈宝塔对接教程</h2>
                 <p>主机填--梦奈宝塔的地址</p>
                 <p>安全码填--梦奈宝塔系统api</p>

                 <p>账号填--梦奈宝塔 宝塔编号(梦奈宝塔里面的服务器的宝塔编号)</p>
                 <p>密码填--调用密钥 (梦奈宝塔里面的服务器的调用秘钥)</p>
                 <p>如果地址不是80端口就填一下端口--如果地址是https就开启ssl</p>
                </div>
              </div>
            </div>




            </ul>

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