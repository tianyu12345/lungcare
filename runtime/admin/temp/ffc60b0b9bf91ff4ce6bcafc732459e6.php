<?php /*a:1:{s:57:"/home/wwwroot/www/lungcare/app/admin/view/login/index.php";i:1573036668;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex,nofollow" />
    <title>登录管理系统 -  Powered by CRMEB!</title>
    <meta name="generator" content="CRMEB! v2.5" />
    <meta name="author" content="CRMEB! Team and CRMEB UI Team" />
    <link href="/system/frame/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <link href="/static/plug/layui/css/layui.css" rel="stylesheet">
    <link href="/system/frame/css/font-awesome.min.css?v=4.3.0" rel="stylesheet">
    <link href="/system/frame/css/animate.min.css" rel="stylesheet">
    <link href="/system/frame/css/style.min.css?v=3.0.0" rel="stylesheet">
    <script>
        top != window && (top.location.href = location.href);
    </script>
</head>
<body class="gray-bg login-bg">
<canvas id="canvas" width="900" height="300" style="position: fixed;top: -50px;width: 60%;left: 20%"></canvas>
<div class="middle-box text-center loginscreen  animated fadeInDown">
    <div class="login-group">
        <h3 class="login-logo">
            <img src="/system/images/logo.png">
        </h3>
        <form role="form" action="<?php echo url('verify'); ?>" method="post" id="form" onsubmit="return false">
            <div class="form-group">
                <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-user"></i> </span>
                    <input type="text" id="account" name="account" placeholder="用户名" placeholder="用户名" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group m-b"><span class="input-group-addon"><i class="fa fa-unlock-alt"></i> </span>
                    <input type="password" class="form-control" id="pwd" name="pwd" placeholder="密码" required="">
                </div>

            </div>
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control" id="verify" name="verify" placeholder="验证码" required="">
                    <span class="input-group-btn" style="padding: 0;margin: 0;">
                        <img id="verify_img" src="<?php echo Url('captcha'); ?>" alt="验证码" style="padding: 0;height: 34px;margin: 0;">
                    </span>
                </div>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">登 录</button>
            <?php /*  <p class="text-muted text-center"> <a href="<?php echo url('./forgetpwd'); ?>"><small>忘记密码了？</small></a> | <a href="<?php echo url('./register'); ?>">注册一个新账号</a>
              </p>  */ ?>
        </form>
    </div>
</div>
<div class="footer" style=" position: fixed;bottom: 0;width: 100%;left: 0;margin: 0;opacity: 0.8;">
    <div class="pull-right">© 2017-2019 <a href="http://www.crmeb.com/" target="_blank">CRMEB</a>
    </div>
</div>

<!-- 全局js -->
<script src="/static/plug/jquery-1.10.2.min.js"></script>
<script src="/system/frame/js/bootstrap.min.js?v=3.4.0"></script>
<script src="/system/module/login/flaotfont.js"></script>
<script src="/system/module/login/ios-parallax.js"></script>
<script src="/static/plug/layui/layui.all.js"></script>
<script src="/system/module/login/index.js"></script>
<!--统计代码，可删除-->
<!--点击刷新验证码-->
</body>
</html>