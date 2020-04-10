<?php /*a:5:{s:81:"/home/wwwroot/www/lungcare/app/admin/view/order/store_order/order_spread_user.php";i:1568702726;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if(empty($is_layui) || (($is_layui instanceof \think\Collection || $is_layui instanceof \think\Paginator ) && $is_layui->isEmpty())): ?>
    <link href="/system/frame/css/bootstrap.min.css?v=3.4.0" rel="stylesheet">
    <?php endif; ?>
    <link href="/static/plug/layui/css/layui.css" rel="stylesheet">
    <link href="/system/css/layui-admin.css" rel="stylesheet">
    <link href="/system/frame/css/font-awesome.min.css?v=4.3.0" rel="stylesheet">
    <link href="/system/frame/css/animate.min.css" rel="stylesheet">
    <link href="/system/frame/css/style.min.css?v=3.0.0" rel="stylesheet">
    <script src="/system/frame/js/jquery.min.js"></script>
    <script src="/system/frame/js/bootstrap.min.js"></script>
    <script src="/static/plug/layui/layui.all.js"></script>
    <script>
        $eb = parent._mpApi;
        window.controlle="<?php echo strtolower(trim(preg_replace("/[A-Z]/", "_\\0", app('request')->controller()), "_"));?>";
        window.module="<?php echo app('http')->getName();?>";
    </script>



    <title></title>
    
    <!--<script type="text/javascript" src="/static/plug/basket.js"></script>-->
<script type="text/javascript" src="/static/plug/requirejs/require.js"></script>
<?php /*  <script type="text/javascript" src="/static/plug/requirejs/require-basket-load.js"></script>  */ ?>
<script>
    var hostname = location.hostname;
    if(location.port) hostname += ':' + location.port;
    requirejs.config({
        map: {
            '*': {
                'css': '/static/plug/requirejs/require-css.js'
            }
        },
        shim:{
            'iview':{
                deps:['css!iviewcss']
            },
            'layer':{
                deps:['css!layercss']
            }
        },
        baseUrl:'//'+hostname+'/',
        paths: {
            'static':'static',
            'system':'system',
            'vue':'static/plug/vue/dist/vue.min',
            'axios':'static/plug/axios.min',
            'iview':'static/plug/iview/dist/iview.min',
            'iviewcss':'static/plug/iview/dist/styles/iview',
            'lodash':'static/plug/lodash',
            'layer':'static/plug/layer/layer',
            'layercss':'static/plug/layer/theme/default/layer',
            'jquery':'static/plug/jquery/jquery.min',
            'moment':'static/plug/moment',
            'sweetalert':'static/plug/sweetalert2/sweetalert2.all.min',
            'formCreate':'/static/plug/form-create/form-create.min',

        },
        basket: {
            excludes:['system/js/index','system/util/mpVueComponent','system/util/mpVuePackage']
//            excludes:['system/util/mpFormBuilder','system/js/index','system/util/mpVueComponent','system/util/mpVuePackage']
        }
    });
</script>
<script type="text/javascript" src="/system/util/mpFrame.js"></script>
    
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">

<div class="ibox-content order-info">

    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <img src="<?php echo htmlentities($spread['avatar']); ?>" width="50" height="50" style="border-radius: 60px;" />
                    <span style="font-size: 16px"><?php echo htmlentities($spread['nickname']); ?></span>
                </div>
                <div class="panel-body">
                    <div class="row show-grid">
                        <div class="col-xs-6" style="color: #ff0005">余额：¥ <?php echo htmlentities($spread['now_money']); ?></div>
                        <div class="col-xs-6">UID：<?php echo htmlentities($spread['uid']); ?></div>
                        <div class="col-xs-6" style="color: green">佣金：¥ <?php echo htmlentities($spread['brokerage_price']); ?></div>
                        <div class="col-xs-6">真实姓名：<?php echo htmlentities($spread['real_name']); ?></div>
                        <div class="col-xs-6">身份证:：<?php echo htmlentities($spread['card_id']); ?></div>
                        <div class="col-xs-6">手机号码：<?php echo htmlentities($spread['phone']); ?></div>
                        <div class="col-xs-6">生日：<?php echo htmlentities($spread['birthday']); ?></div>
                        <div class="col-xs-6">积分：<?php echo htmlentities($spread['integral']); ?></div>
                        <div class="col-xs-6">用户备注：<?php echo htmlentities($spread['mark']); ?></div>
                        <div class="col-xs-6">最后登录时间：<?php echo htmlentities(date("Y/m/d H:i",!is_numeric($spread['last_time'])? strtotime($spread['last_time']) : $spread['last_time'])); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/system/frame/js/content.min.js?v=1.0.0"></script>






</div>
</body>
</html>
