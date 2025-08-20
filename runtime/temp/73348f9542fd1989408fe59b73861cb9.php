<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:68:"D:\wwwroot\zj.cc\public/../app/index\view\default\index\product.html";i:1735109242;}*/ ?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <title><?php echo $webname; ?> - 产品配置</title>
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

                                <div class="col-md-6">
                <div class="content">

                    <div class="block">
                      
                        <div class="block-content">
                            <div class="row">
                                <div class="col-md-12">

                                    <font class="text-primary" style="font-size:23px;"><b><?php echo $cart['name']; ?></b></font><span style="float: right;"><a href="/cart" class="btn btn-primary btn-sm"><i class="fas fa-undo mr-1"></i> 返回上一页</a></span>
  

<div class="border-bottom  pb-2"></div><br/>
                                    <p><span class="font-size-sm"><?php echo $cart['content']; ?></span></p>
                                </div>
                            </div>
                            <div class="row items-push">
                                <div class="col-md-12">
                                    <h4 class="border-bottom pb-2">产品配置</h4>





<script>
document.addEventListener('DOMContentLoaded', function() {
    const timeInput = document.querySelector('#timeInput');
    const totalPriceDisplay = document.querySelector('#totalPrice');

    function calculateTotal() {
        const timeValue = timeInput.value || 0;
        const money = '<?php echo $cart['money']; ?>';
        const pricePerUnit = money > 0 ? money : 0;
        const totalPrice = pricePerUnit * timeValue;

        const cycle = '<?php if($cart['cycle']=="day"): ?>日<?php endif; if($cart['cycle']=="month"): ?>月<?php endif; if($cart['cycle']=="season"): ?>季<?php endif; if($cart['cycle']=="year"): ?>年<?php endif; if($cart['cycle']=="unrestricted"): ?>一次性<?php endif; ?>';
        const cycleLabel = totalPrice > 0 ? `${timeValue} ${cycle}` : '时长错误';
        totalPriceDisplay.textContent = totalPrice > 0 ? `${totalPrice} 元 / ${cycleLabel}` : '时长错误';
    }

    timeInput.addEventListener('change', calculateTotal);
    
    // 阻止回车自动提交
    timeInput.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            event.preventDefault();
        }
    });

    calculateTotal(); // 初始化计算
});

</script>



<form>
<div class='input-group'>
<div class='input-group-prepend'>
<span class='input-group-text bg-white text-primary fw-500'>购买时间</span>
</div>
<input class='form-control text-primary' type='text' name="time" placeholder="请输入时长" value="1" onchange="calculateTotal()" id="timeInput">

<div class="input-group-append">
<span class="btn btn-primary" type="text" id="money"><?php if($cart['money']=="0"): ?>免费<?php else: ?><?php echo $cart['money']; ?>元<?php endif; ?>/
<?php if($cart['cycle']=="day"): ?>日<?php endif; if($cart['cycle']=="month"): ?>月<?php endif; if($cart['cycle']=="season"): ?>季<?php endif; if($cart['cycle']=="year"): ?>年<?php endif; if($cart['cycle']=="unrestricted"): ?>一次性<?php endif; ?></span>
</div>
</div>
<div style='margin-top: 15px;'></div>
<div class='input-group'>
<div class='input-group-prepend'>
<span class='input-group-text bg-white text-primary fw-500'>主机账号</span>
</div>
<input class='form-control col-sm-12 text-primary' name="user" type='text' value='<?php echo userrandom(); ?>' readonly />
</div>
<div style='margin-top: 15px;'></div>
<div class='input-group'>
<div class='input-group-prepend'>
<span class='input-group-text bg-white text-primary fw-500'>主机密码</span>
</div>
<input class='form-control col-sm-12 text-primary' name="password" type='text' value='<?php echo random(); ?>' readonly />
</div>
<div style='margin-top: 15px;'></div>
<div class='input-group'>
    <div class='input-group-prepend'>
        <span class='input-group-text bg-white text-primary fw-500'>结算费用</span>
    </div>
    <div class='form-control col-sm-12 text-primary'><span id="totalPrice"><?php if($cart['money']=="0"): ?>免费<?php else: ?><?php echo $cart['money']; ?>元<?php endif; ?>/1
<?php if($cart['cycle']=="day"): ?>日<?php endif; if($cart['cycle']=="month"): ?>月<?php endif; if($cart['cycle']=="season"): ?>季<?php endif; if($cart['cycle']=="year"): ?>年<?php endif; if($cart['cycle']=="unrestricted"): ?>一次性<?php endif; ?><</span></div>
</div>
<script>
// 初始计算
calculateTotal();
</script><br/>



<div class="form-group row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-check-circle"></i> 开通</button>
                                            </div>
                                        </div>
</form>


                                </div>
                            </div>

                        </div>
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
        <script src="/static/assets/js/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
       </body>
</html>
<script>
    $("form").submit(function (){
		var login = $("button[type='submit']");
        var userName = $("input[name='user']").val();
        var userPwd = $("input[name='password']").val();
        var userTime = $("input[name='time']").val();

if(userName.length < 1 || userPwd.length < 1  || userTime.length < 1){
            One.helpers('notify', {type: 'danger', message: '请确保必填项不为空', delay:2000});
            return false;
        }

		login.attr('disabled', 'true');
        One.helpers('notify', {type: 'warning', message: '正在处理，请稍后...', delay:2000});


        $.ajax({
            type:'POST',
            url:'',
            data:{
                user:userName,
                password:userPwd,
                time:userTime
            },
            dataType:'json',
            success:function (data){
                if(data.code == 1){
                    setTimeout(function (){
                        location.href = '/user/order/'+data.id
                    },1000);
                    One.helpers('notify', {type: 'success', message: data.msg, delay:2000});
                }else{
					login.removeAttr('disabled');
                    One.helpers('notify', {type: 'danger', message: data.msg, delay:2000});
                }
            }
        });
        return false;
    });
</script>
<script>
$('.block').addClass('animated rotateInDownLeft');
</script>
