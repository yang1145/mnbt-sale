<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\wwwroot\zj.cc\public/../app/admin\view\default\classification.html";i:1734576286;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\header.html";i:1738746062;s:51:"D:\wwwroot\zj.cc\app\admin\view\default\footer.html";i:1688394438;}*/ ?>
<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
<title><?php echo $webname; ?> - 产品分类</title>
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
	color:#0b5ed7;
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
	background-color:#0b5ed7;
	border-color:#0b5ed7
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
    <main class="lyear-layout-content">	
      <div class="container-fluid">
        <div class="row">
<div class="col-lg-12">
      <div class="card">
        <header class="card-header">
<div class="card-title">分类列表</div>
</header>
        <div class="card-body">
<form method="get" action="">

<div class="input-group">
					<input class="form-control col-sm-7" type="text" name="search" placeholder="搜索..." value=""/>

					<div class="input-group-append">
						<button class="btn-copy btn btn-primary">
							<span class="mdi mdi-magnify"></span>搜索
						</button>
					</div>

				</div>
</form>
<br/>
<button onclick='add()' class="btn btn-primary me-1"><span class="mdi mdi-plus" aria-hidden="true"></span>添加分类</button>
<button onclick='del()' class="btn btn-danger">
                    <span class="mdi mdi-window-close" aria-hidden="true"></span>删除
                  </button>

                  <button onclick='qbdel()' class="btn btn-danger">
                    <span class="mdi mdi-window-close" aria-hidden="true"></span>全部删除
                  </button>
<br/><br/>
<div class="table-responsive-sm">
          <table class="table table-bordered">
            <thead>
              <tr>

<th>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="check-all">
                            <label class="form-check-label" for="check-all"></label>
                          </div>
                        </th>
                <th scope="col">ID</th>
                <th scope="col">排序</th>
                <th scope="col">标题</th>
                <th scope="col">是否隐藏</th>
                <th scope="col">操作</th>
              </tr>
            </thead>
            <tbody>
<?php foreach($product as $p): ?>

              <tr>

<td>
                          <div class="form-check">
                            <input type="checkbox" class="form-check-input ids" name="ids" value="<?php echo $p['id']; ?>">
                            <label class="form-check-label" for="ids-1"></label>
                          </div>
                        </td>
                <th scope="row"><?php echo $p['id']; ?></th>
                <td><?php echo $p['sort']; ?></td>
                <td><?php echo $p['name']; ?></td>
               <td><?php if($p['hide']=="1"): ?><p style="color:red;">是</p><?php else: ?>否<?php endif; ?></td>

<td>
<a href="/admin/classification/<?php echo $p['id']; ?>" class="btn btn-success btn-sm me-1"><i class="mdi mdi-pencil"></i>编辑信息</a>
</td>
              </tr>
<?php endforeach; ?>
            </tbody>
          </table>
</div>

<div style="text-align:center"><?php echo $product->render(); ?></div>

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
function add(){
layer.open({
        type: 1,
        closeBtn: false,
        shift: 7,
        shadeClose: true,
        title:"添加产品分类",
        content: '<div style="width:300px;" class="card-body"><div class="mb-3"><label for="web_site_title" class="form-label">标题</label><input class="form-control" type="text" name="name" value="" placeholder=""></div><div class="mb-3"><label for="web_site_title" class="form-label">介绍</label><textarea style="height:160px" class="form-control" type="text" name="introduce"></textarea></div><div class="mb-3"><label for="web_site_title" class="form-label">排序</label><input class="form-control" type="text" name="sort" value="0" placeholder="数值越大越靠前"></div><div class="mb-3"><label for="type" class="form-label">是否隐藏</label><div class="form-controls"><select name="hide" class="form-select" id="type"><option value="0">否</option><option value="1">是</option></select></div></div><button type="button" onclick="add1()" class="btn btn-primary me-1">添加</button></div>'   });

}

function add1(){
             var load = layer.msg('添加中，请稍后...',{icon:16,time:false});
var name = $("input[name='name']").val();
var introduce = $("textarea[name='introduce']").val();
var sort = $("input[name='sort']").val();
var hide = $("select[name='hide']").val();

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:'add',
name:name,
introduce:introduce,
sort:sort,
hide:hide,
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

function del(){
var id = [];
$("input[name='ids']:checked").each(function(i){
        id[i] =$(this).val();
      });
var id = id.join(",");
if(id==""){
layer.alert("未选择分类!",{icon:2,shade:0.8});
}else{
        layer.confirm('确定要删除ID为<span style="color:#0b5ed7">'+ id +'</span>的分类吗？', function (){
            del1(id)
        });
    }
}


    function del1(id){
        var load = layer.load('1',{time:false});

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:'delete',
                cid:id
            },
            dataType:'json',
            success:function (data){
                layer.close(load);
                if(data.code == 1){
layer.alert(data.msg,{icon:1},function(){
                        window.location.href = "";
                    });
                }else{
                    layer.alert(data.msg,{icon:2});
                }
            }
        });
    }

function qbdel(){
        layer.confirm('确定要删除<span style="color:#0b5ed7">全部</span>的分类吗？', function (){
            qbdel1()
        });
    }


    function qbdel1(){
        var load = layer.load('1',{time:false});

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:'qbdelete',
            },
            dataType:'json',
            success:function (data){
                layer.close(load);
                if(data.code == 1){
layer.alert(data.msg,{icon:1},function(){
                        window.location.href = "";
                    });
                }else{
                    layer.alert(data.msg,{icon:2});
                }
            }
        });
    }
</script>