<?php /*a:6:{s:69:"/home/wwwroot/www/lungcare/app/admin/view/system/system_log/index.php";i:1567990148;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/inner_page.php";i:1567990148;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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
    
<script src="/static/plug/moment.js"></script>
<link rel="stylesheet" href="/static/plug/daterangepicker/daterangepicker.css">
<script src="/static/plug/daterangepicker/daterangepicker.js"></script>

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

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="row">
                    <div class="m-b m-l">
                        <form action="" class="form-inline" id="form" method="get">

                            <select name="admin_id" aria-controls="editable" class="form-control input-sm">
                                <option value="">管理员名称</option>
                                <?php if(is_array($admin) || $admin instanceof \think\Collection || $admin instanceof \think\Paginator): $i = 0; $__LIST__ = $admin;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <option value="<?php echo htmlentities($vo['id']); ?>" <?php if($where['admin_id'] == $vo['id']): ?>selected="selected"<?php endif; ?>><?php echo htmlentities($vo['real_name']); ?></option>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </select>
                            <div class="input-group datepicker">
                                <input style="width: 188px;" type="text" id="data" class="input-sm form-control" name="data" value="<?php echo htmlentities($where['data']); ?>" placeholder="请选择日期" >
                            </div>
                            <div class="input-group">
                                <input type="text" name="pages" value="<?php echo htmlentities($where['pages']); ?>" placeholder="请输入行为" class="input-sm form-control"> <span class="input-group-btn">
                            </div>
                            <div class="input-group">
                                <input type="text" name="path" value="<?php echo htmlentities($where['path']); ?>" placeholder="请输入链接" class="input-sm form-control"> <span class="input-group-btn">
                            </div>
                            <div class="input-group">
                                <input type="text" name="ip" value="<?php echo htmlentities($where['ip']); ?>" placeholder="请输入ip" class="input-sm form-control"> <span class="input-group-btn">
                                    <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-search" ></i> 搜索</button> </span>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped  table-bordered">
                        <thead>
                        <tr>
                            <th class="text-center">编号</th>
                            <th class="text-center">ID/名称</th>
                            <th class="text-center">行为</th>
                            <th class="text-center">链接</th>
                            <th class="text-center">操作ip</th>
                            <th class="text-center">类型</th>
                            <th class="text-center">操作时间</th>
                        </tr>
                        </thead>

                        <tbody class="">
                        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="text-center">
                                <?php echo htmlentities($vo['id']); ?>
                            </td>
                            <td class="text-center">
                                <?php echo htmlentities($vo['admin_id']); ?> / <?php echo htmlentities($vo['admin_name']); ?>
                            </td>
                            <td class="text-center">
                                <?php echo htmlentities($vo['page']); ?>
                            </td>
                            <td class="text-center">
                                <?php echo htmlentities($vo['path']); ?>(<?php echo htmlentities($vo['method']); ?>)
                            </td>
                            <td class="text-center">
                                <?php echo htmlentities($vo['ip']); ?>
                            </td>
                            <td class="text-center">
                                <?php echo htmlentities($vo['type']); ?>
                            </td>
                            <td class="text-center">
                                <?php echo htmlentities(date("Y-m-d H:i:s",!is_numeric($vo['add_time'])? strtotime($vo['add_time']) : $vo['add_time'])); ?>
                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <link href="/system/frame/css/plugins/dataTables/dataTables.bootstrap.css" rel="stylesheet">
<div class="row">
    <div class="col-sm-6">
        <div class="dataTables_info" id="DataTables_Table_0_info" role="alert" aria-live="polite" aria-relevant="all">共 <?php echo htmlentities($total); ?> 项</div>
    </div>
    <div class="col-sm-6">
        <div class="dataTables_paginate paging_simple_numbers" id="editable_paginate">
            <?php echo $page;?>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>



<script>
    var dateInput =$('.datepicker');
    dateInput.daterangepicker({
        autoUpdateInput: false,
        "opens": "center",
        "drops": "down",
        "ranges": {
            '今天': [moment(), moment().add(1, 'days')],
            '昨天': [moment().subtract(1, 'days'), moment()],
            '上周': [moment().subtract(6, 'days'), moment()],
            '前30天': [moment().subtract(29, 'days'), moment()],
            '本月': [moment().startOf('month'), moment().endOf('month')],
            '上月': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        "locale" : {
            applyLabel : '确定',
            cancelLabel : '清空',
            fromLabel : '起始时间',
            toLabel : '结束时间',
            format : 'YYYY/MM/DD',
            customRangeLabel : '自定义',
            daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
            monthNames : [ '一月', '二月', '三月', '四月', '五月', '六月',
                '七月', '八月', '九月', '十月', '十一月', '十二月' ],
            firstDay : 1
        }
    });
    dateInput.on('cancel.daterangepicker', function(ev, picker) {
        $("#data").val('');
    });
    dateInput.on('apply.daterangepicker', function(ev, picker) {
        $("#data").val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
    });
</script>


</div>
</body>
</html>
