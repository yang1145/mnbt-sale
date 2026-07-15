<?php

use think\Db;
function mnbt_ConfigOptions()
{
$data=[
["name"=>"data1",'title'=>'产品类型', 'type'=>'select',"prompt"=>"产品类型","value"=>"虚拟主机","option"=>["虚拟主机","CDN"]],

["name"=>"data2",'title'=>'空间大小', 'type'=>'input',"prompt"=>"空间大小,单位M","value"=>''],


["name"=>"data3",'title'=>'数据库大小', 'type'=>'input',"prompt"=>"数据库大小,单位M","value"=>''],


["name"=>"data4",'title'=>'月流量大小', 'type'=>'input',"prompt"=>"月流量大小,单位G","value"=>''],


["name"=>"data5",'title'=>'绑定域名数', 'type'=>'input',"prompt"=>"绑定域名数,单位个","value"=>''],

];
return $data;
}

function mnbt_AdminConfigOptions()
{
$data=[
["name"=>"data1",'title'=>'梦奈宝塔数据库版本', 'type'=>'input',"prompt"=>"梦奈数据库版本,1.6x就是16,1.7x就是17...","value"=>'17'],
];

return $data;
}



//控制面板
function mnbt_ClientArea($b, $a, $data)
{
    if ($b["ssl"] == "1") {
        $ssl = "https://";
    } else {
        $ssl = "http://";
    }
    $url = $ssl . $b["host"] . ":" . $b["port"] . "/user/idcdl.php?gn=logine";
    $text = "
<form action='" . $url . "' method='post'" . ">
<input type='hidden'name='username'value='" . $data["user"] . "'/>
<input type='hidden'name='password'value='" . $data["password"] . "'/>
  <button type='submit' class='btn btn-primary'>一键登录控制面板</button>
  <button onclick='resetpass(" . $data["id"] . ")' type='button' class='btn btn-primary'>重置密码</button>
</form>
<br/>
账号:<span style='color:#ff6b6b'>" . $data["user"] . "</span><br/>密码:<span style='color:#ff6b6b'>" . $data["password"] . "</span>
<script>
    function resetpass(id){
        layer.confirm('确定要重置密码吗？重置后原密码将不可使用！',{icon:3},  function (){
            resetApi(id)
        });
    }


    function resetApi(id){
        var load = layer.load('1',{time:false});

        $.ajax({
            type:'POST',
            url:'',
            data:{
                act:'reset',
                id:id
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


</script>";
    return $text;
}

//追加必带参数
function mnbt_notnulldata($data, $data3)
{
    $data['data']['mn_bh'] = $data3['user'];
    $data['data']['mn_key'] = $data3['security'];
    $data['data']['mn_keye'] = $data3['password'];
if($data3["data1"]==""){
$mnvs="17";
}else{
$mnvs=$data3["data1"];
}
    $data['data']['mn_vs'] = $mnvs;
    return $data;
}

//开通主机
function mnbt_CreateAccount($data3, $data2, $data4, $times)
{
    if ($data3["ssl"] == "1") {
        $ssl = "https://";
    } else {
        $ssl = "http://";
    }
    $api = $ssl . $data3["host"] . ":" . $data3["port"] . "/api/api.php";
if($data4["data1"]=="虚拟主机"){
$type="2";
}else{
$type="1";
}
    $datass = [
        'url' => $api . '?gn=kt',
        'data' => [
            'username' => $data2["user"],
            'password' => $data2["password"],
            'webdx' => $data4["data2"],
            'sqldx' => $data4["data3"],
            'sizemax' => $data4["data4"],
            'type' => $type,
            'ymbds' => $data4["data5"],
            'dqtime' => "0",
        ]
    ];

    $datass = mnbt_notnulldata($datass, $data3);

    $result = @mnbt_CURL($datass);
    $result = @json_decode($result, true);
    if (is_array($result) && isset($result['code']) && $result['code'] == '200') {
        //主机创建成功处理
        $data6 = Db::name('order')->insertGetId([
            "user" => $data2["user"],
            "password" => $data2["password"],
            "userid" => session("userid"),
            "cartid" => $data4["id"],
            "atime" => time(),
            "ztime" => time() + $times,
            "state" => "1",
            "data1" => "",
            "data2" => "",
            "data3" => "",
            "data4" => "",
            "data5" => "",
            "data6" => "",
            "data7" => "",
            "data8" => "",
            "data9" => "",
            "data10" => "",
        ]);
        $array["code"] = "1";
        $array["msg"] = "创建成功";
        $array["id"] = $data6;
    } else {
        $array["code"] = "-1";
        $err = is_array($result) && isset($result["msg"]) ? $result["msg"] : "接口无响应或返回异常";
        $array["msg"] = "创建失败" . $err;
    }
    return $array;
}

//暂停
function mnbt_SuspendAccount($data3, $order)
{
    if ($data3["ssl"] == "1") {
        $ssl = "https://";
    } else {
        $ssl = "http://";
    }
    $api = $ssl . $data3["host"] . ":" . $data3["port"] . "/api/api.php";

    $datass = [
        'url' => $api . '?gn=zt',
        'data' => [
            'username' => $order["user"]
        ]
    ];

    $datass = mnbt_notnulldata($datass, $data3);

    $result = @mnbt_CURL($datass);
    $result = @json_decode($result, true);
    if ($result['code'] == '200') return ['code' => 1, 'msg' => "暂停成功"];
    else return ['code' => -1, 'msg' => "暂停失败：{$result['msg']}"];
}

//解除暂停
function mnbt_UnsuspendAccount($data3, $data4)
{
    if ($data3["ssl"] == "1") {
        $ssl = "https://";
    } else {
        $ssl = "http://";
    }
    $api = $ssl . $data3["host"] . ":" . $data3["port"] . "/api/api.php";

    $datass = [
        'url' => $api . '?gn=jc',
        'data' => [
            'username' => $data4["user"]
        ]
    ];

    $datass = mnbt_notnulldata($datass, $data3);

    $result = @mnbt_CURL($datass);
    $result = @json_decode($result, true);
    if ($result['code'] == '200') return ['code' => 1, 'msg' => "解除暂停成功"];
    else return ['code' => -1, 'msg' => "解除暂停失败：{$result['msg']}"];
}

//终止
function mnbt_TerminateAccount($data3, $order)
{
    if ($data3["ssl"] == "1") {
        $ssl = "https://";
    } else {
        $ssl = "http://";
    }
    $api = $ssl . $data3["host"] . ":" . $data3["port"] . "/api/api.php";

    $datass = [
        'url' => $api . '?gn=tz',
        'data' => [
            'username' => $order["user"]
        ]
    ];

    $datass = mnbt_notnulldata($datass, $data3);

    $result = @mnbt_CURL($datass);
    $result = @json_decode($result, true);
    if ($result['code'] == '200') return ['code' => 1, 'msg' => "终止完成，主机删除成功！"];
    else return ['code' => -1, 'msg' => "终止完成，主机删除失败：{$result['msg']}"];
}

//重置密码
function mnbt_ChangePassword($data3, $data4, $password)
{
    if ($data3["ssl"] == "1") {
        $ssl = "https://";
    } else {
        $ssl = "http://";
    }
    $api = $ssl . $data3["host"] . ":" . $data3["port"] . "/api/api.php";

    $datass = [
        'url' => $api . '?gn=czmm',
        'data' => [
            'username' => $data4["user"],
            'password' => $password
        ]
    ];

    $datass = mnbt_notnulldata($datass, $data3);

    $result = @mnbt_CURL($datass);
    $result = @json_decode($result, true);
    if ($result['code'] == '200') return ['code' => 1, 'msg' => "重置密码成功"];
    else return ['code' => -1, 'msg' => "重置密码失败：{$result['msg']}"];
}

//续费
function mnbt_renew($b,$data,$a,$times,$time){
	$array["code"]="1";
	$array["msg"]="续费成功";	
return $array;
}

function mnbt_CURL($data = array(), $timeout = 30)
{
    if (!$data['url']) {
        return 'URL ERROR';
    }
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $data['url']);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 3);
    curl_setopt($ch, CURLOPT_FRESH_CONNECT, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; .NET CLR 1.1.4322; .NET CLR 2.0.50727)');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data['data']));
    curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Expect:'));
    $data = curl_exec($ch);
    return $data;
}
