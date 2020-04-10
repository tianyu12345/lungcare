<?php /*a:5:{s:75:"/home/wwwroot/www/lungcare/app/admin/view/order/store_order/order_goods.php";i:1567990146;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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

<div class="layui-fluid" style="background: #fff">
    <form class="layui-form" action="">
        <div class="layui-form-item">
            <label class="layui-form-label">选择类型</label>
            <div class="layui-input-block">
                <input type="radio" name="type" value="1" lay-filter="type" title="发货" checked>
                <input type="radio" name="type" value="2" lay-filter="type" title="送货">
                <input type="radio" name="type" value="3" lay-filter="type" title="虚拟">
            </div>
        </div>
        <div class="type" data-type="1">
            <div class="layui-form-item">
                <label class="layui-form-label">快递公司</label>
                <div class="layui-input-block">
                    <select name="delivery_name">
                        <option value="">请选择</option>
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $k = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($k % 2 );++$k;?>
                        <option value="<?php echo htmlentities($item); ?>"><?php echo htmlentities($item); ?></option>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                    </select>
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">快递单号</label>
                <div class="layui-input-block">
                    <input type="text" name="delivery_id"   placeholder="请输入快递单号" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="type" data-type="2" style="display: none">
            <div class="layui-form-item">
                <label class="layui-form-label">送货人姓名</label>
                <div class="layui-input-block">
                    <input type="text" name="sh_delivery_name"   placeholder="请输入送货人姓名" autocomplete="off" class="layui-input">
                </div>
            </div>
            <div class="layui-form-item">
                <label class="layui-form-label">送货人电话</label>
                <div class="layui-input-block">
                    <input type="text" name="sh_delivery_id"   placeholder="请输入送货人电话" autocomplete="off" class="layui-input">
                </div>
            </div>
        </div>
        <div class="layui-form-item" style="margin:10px 0;padding-bottom: 10px;">
            <div class="layui-input-block">
                <button class="layui-btn layui-btn-sm" lay-submit="" lay-filter="delivery">立即提交</button>
                <button type="reset" class="layui-btn layui-btn-primary layui-btn-sm">重置</button>
            </div>
        </div>
    </form>
</div>
<script src="/system/js/layuiList.js"></script>



<script>
    var id=<?php echo htmlentities($id); ?>;
    layList.form.render();
    layList.form.on('radio(type)', function(data){
       $('.type').each(function () {
           if($(this).data('type') == data.value){
               $(this).show();
           }else{
               $(this).hide();
           }
       })
    });
    layList.search('delivery',function (data) {
        console.log(data);
        if(data.type == '1'){
            if(!data.delivery_name) return layList.msg('请选择快递公司');
            if(!data.delivery_id) return layList.msg('请填写快递单号');
        }
        if(data.type == '2'){
            if(!data.sh_delivery_name) return layList.msg('请填写送货人姓名');
            if(!data.sh_delivery_id) return layList.msg('请填写送货人电话');
        }
        var index = layList.layer.load(1, {
            shade: [0.1,'#fff']
        });
        layList.basePost(layList.U({a:'update_delivery',q:{id:id}}),data,function (res) {
            layList.layer.close(index);
           layList.msg(res.msg);
            parent.layer.close(parent.layer.getFrameIndex(window.name));
        },function (res) {
            layList.layer.close(index);
            layList.msg(res.msg);
        });
    });

</script>


</div>
</body>
</html>
