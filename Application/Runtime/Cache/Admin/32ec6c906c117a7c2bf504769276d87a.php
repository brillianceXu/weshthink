<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/Public/admin/lib/html5.js"></script>
<script type="text/javascript" src="/Public/admin/lib/respond.min.js"></script>
<script type="text/javascript" src="/Public/admin/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/Public/admin/static/h-ui/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/static/h-ui.admin/css/H-ui.login.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/static/h-ui.admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/Public/admin/lib/Hui-iconfont/1.0.7/iconfont.css" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<title>后台登录 -- <?php echo ($mes["title"]); ?></title>
<meta name="keywords" content="">
<meta name="description" content="">
</head>
<body>
<input type="hidden" id="TenantId" name="TenantId" value="" />
<div class="header" style="background: #222222;"><h2 style="color:white;text-align: center;font-family:'楷体';center;line-height: 25px;"><?php echo ($mes["title"]); ?>后台管理系统</h2></div>
<div class="loginWraper">
  <div id="loginform" class="loginBox">
    <form class="form form-horizontal" action="/index.php/Admin/Login/index.html" method="post" id="login_form">
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60d;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="username" type="text" placeholder="用户名由26个英文字母组成，大小写不限" class="input-text size-L radius">
        </div>
      </div>
      <div class="row cl">
        <label class="form-label col-xs-3"><i class="Hui-iconfont">&#xe60e;</i></label>
        <div class="formControls col-xs-8">
          <input id="" name="password" type="password" placeholder="密码" class="input-text size-L radius">
        </div>
      </div>
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input class="input-text size-L radius" type="text" name="code" placeholder="验证码" style="width:150px;">
          <img id="verifyImg" src="/index.php/Admin/Login/verify" width="30%" height="40" class="radius ml-5" onClick="this.src=this.src+'?'+Math.random()" title="点击刷新验证码" >  </div>
      </div>
    <!--   <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <label for="online">
            <input type="checkbox" name="online" id="online" value="">
            使我保持登录状态</label>
        </div>
      </div> -->
      <div class="row cl">
        <div class="formControls col-xs-8 col-xs-offset-3">
          <input onclick="dologin();" type="button" class="btn btn-success radius size-L" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">
          <input type="reset" class="btn btn-default radius size-L ml-20" value="&nbsp;取&nbsp;&nbsp;&nbsp;&nbsp;消&nbsp;">
        </div>
      </div>
    </form>
  </div>
</div>
<div class="footer"><?php echo ($mes["copyright"]); ?></div>
<script type="text/javascript" color="255,0,0" opacity='0.7' zIndex="-2" count="200" src="/Public/admin/static/h-ui.admin/js/canvas-nest.js"></script>
<script type="text/javascript">
    function async_load() {
        //async load github
        var i = document.createElement("iframe");
        //i.src = "https://ghbtns.com/github-btn.html?user=hustcc&repo=canvas-nest.js&type=star&count=true";
        i.scrolling = "no";
        i.frameborder = "0";
        i.border = "0";
        i.setAttribute("frameborder", "0", 0);
        i.width = "100px";
        i.height = "20px";
        document.getElementById("github_iframe").appendChild(i);
    }

    if (window.addEventListener) {window.addEventListener("load", async_load, false);}
    else if (window.attachEvent) {window.attachEvent("onload", async_load);}
    else {window.onload = async_load;}
</script>
<script type="text/javascript" src="/Public/admin/lib/jquery/1.9.1/jquery.min.js"></script> 
<script type="text/javascript" src="/Public/admin/lib/layer/2.1/layer.js"></script> 
<script type="text/javascript">
  function dologin(){
    var pattern=/^[A-Za-z]+$/;
    var username=$("input[name=username]").val();
    if(!username){
      layer.msg("用户名不能为空");
      $("input[name=username]").focus();
      return false;
    }
    if(!pattern.test(username)){
      layer.msg("用户名格式不正确");
      $("input[name=username]").focus();
      return false;
    }
    var password=$("input[name=password]").val();
    if(!password){
      layer.msg("密码不能为空");
      $("input[name=password]").focus();
      return false;
    }
    var code=$("input[name=code]").val();
    if(!code){
      layer.msg("验证码不能为空");
      $("input[name=code]").focus();
      return false;
    }
    $("#login_form").submit();
  }
</script>
</body>
</html>