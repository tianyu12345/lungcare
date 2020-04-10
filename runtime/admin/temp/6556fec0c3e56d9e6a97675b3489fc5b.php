<?php /*a:5:{s:77:"/home/wwwroot/www/lungcare/app/admin/view/finance/finance/commission_list.php";i:1567990146;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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

<div class="layui-fluid">
    <div class="layui-row layui-col-space15">
        <div class="layui-col-md12 layui-col-sm12 layui-col-lg12">
            <div class="layui-card">
                <div class="layui-card-header">搜索</div>
                <div class="layui-card-body">
                    <form class="layui-form layui-form-pane" action="">
                        <div class="layui-form-item">
                            <div class="layui-inline">
                                <label class="layui-form-label">昵称/ID</label>
                                <div class="layui-input-block">
                                    <input type="text" name="nickname" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">佣金范围</label>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_min" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                                <div class="layui-form-mid">-</div>
                                <div class="layui-input-inline" style="width: 100px;">
                                    <input type="text" name="price_max" placeholder="￥" autocomplete="off" class="layui-input">
                                </div>
                            </div>
                            <div class="layui-inline">
                                <label class="layui-form-label">佣金排序</label>
                                <div class="layui-input-block">
                                    <select name="order">
                                        <option value="1" selected="">升序</option>
                                        <option value="0">降序</option>
                                    </select>
                                </div>
                            </div>
                            <div class="layui-inline">
                                <div class="layui-input-inline">
                                    <button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit="search" lay-filter="search">
                                        <i class="layui-icon layui-icon-search"></i>搜索</button>
                                    <button class="layui-btn layui-btn-primary layui-btn-sm export" type="button" lay-submit="excel" lay-filter="excel">
                                        <i class="fa fa-floppy-o" style="margin-right: 3px;"></i>导出</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="layui-col-md12 layui-col-sm12 layui-col-lg12">
            <div class="layui-card">
                <div class="layui-card-header">佣金记录列表</div>
                <div class="layui-card-body">
                    <table class="layui-hide" id="List" lay-filter="List">
                    </table>
                    <script type="text/html" id="barDemo">
                        <button type="button" class="layui-btn layui-btn-xs" lay-event="see" onclick="$eb.createModalFrame('{{d.nickname}}-详情','<?php echo Url('content_info'); ?>?uid={{d.uid}}')"><i class="layui-icon layui-icon-edit"></i>详情</button>
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/system/js/layuiList.js"></script>
<script>
    layList.form.render();
    layList.tableList('List',"<?php echo Url('get_commission_list'); ?>",function () {
        return [
            {field: 'nickname', title: '昵称/姓名',unresize:true,width:"16%",align:'center'},
            {field: 'sum_number', title: '总佣金金额',sort:true,unresize:true,align:'center'},
            {field: 'now_money', title: '账户余额',unresize:true,align:'center'},
            {field: 'brokerage_price', title: '账户佣金',unresize:true,align:'center'},
            {field: 'extract_price', title: '提现到账佣金',unresize:true,align:'center'},
            {fixed: 'right', title: '操作',align:'center',unresize:true,toolbar:'#barDemo',width:"10%"},
        ];
    });
    layList.search('search');
    layList.search('excel',function (where) {
        where.excel = 1;
        location.href=layList.U({a:'get_commission_list',q:where});
    })
</script>




</div>
</body>
</html>
