<?php /*a:5:{s:72:"/home/wwwroot/www/lungcare/app/admin/view/system/system_file/opendir.php";i:1567990148;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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

<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-title">
                <h5>文件管理</h5>
            </div>
            <div class="ibox-content  no-padding">
                <div class="table-responsive">
                    <table class="table table-striped  table-bordered">
                        <thead>
                        <tr>
                            <th class="text-left" width="20%">列表</th>
                            <th class="text-left">文件大小</th>
                            <th class="text-left">是否可写</th>
                            <th class="text-left">更新时间</th>
                            <th class="text-center" width="30%">操作</th>
                        </tr>
                        </thead>
                        <tbody class="">
                        <tr>
                            <td class="text-left" colspan="4">
                                <span> <i class="fa fa-folder-o"></i> <a href="<?php echo Url('opendir'); ?>?dir=<?php echo htmlentities($dir); ?>&superior=1">返回上级</a></span>
                            </td>
                            <td class="text-center"></td>
                        </tr>
                        <?php if(is_array($fileAll['dir']) || $fileAll['dir'] instanceof \think\Collection || $fileAll['dir'] instanceof \think\Paginator): $i = 0; $__LIST__ = $fileAll['dir'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="text-left">
                                <span> <i class="fa fa-folder-o"></i> <a href="<?php echo Url('opendir'); ?>?dir=<?php echo htmlentities($dir); ?>&filedir=<?php echo htmlentities($vo['filename']); ?>"><?php echo htmlentities($vo['filename']); ?></a></span>
                            </td>
                            <td class="text-left">
                                <span> <?php echo htmlentities($vo['size']); ?></span>
                            </td>
                            <td class="text-left">
                                <span>  <?php if($vo['isWritable']): ?>可写<?php else: ?>不可写<?php endif; ?></span>
                            </td>
                            <td class="text-left">
                                <span>  <?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['mtime'])? strtotime($vo['mtime']) : $vo['mtime'])); ?></span>
                            </td>


                            <td class="text-center">
                                <a class="btn btn-info btn-xs" href="<?php echo Url('opendir'); ?>?dir=<?php echo htmlentities($dir); ?>&filedir=<?php echo htmlentities($vo['filename']); ?>"><i class="fa fa-paste"></i> 打开</a>

                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; if(is_array($fileAll['file']) || $fileAll['file'] instanceof \think\Collection || $fileAll['file'] instanceof \think\Paginator): $i = 0; $__LIST__ = $fileAll['file'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                        <tr>
                            <td class="text-left">
                                <span onclick="$eb.createModalFrame('<?php echo htmlentities($vo['filename']); ?>','<?php echo Url('openfile'); ?>?file=<?php echo htmlentities($vo['pathname']); ?>',{w:1260,h:600})"> <i class="fa fa-file-text-o"></i> <?php echo htmlentities($vo['filename']); ?></span>
                            </td>
                            <td class="text-left">
                                <span> <?php echo htmlentities($vo['size']); ?></span>
                            </td>
                            <td class="text-left">
                                <span>  <?php if($vo['isWritable']): ?>可写<?php else: ?>不可写<?php endif; ?></span>
                            </td>
                            <td class="text-left">
                                <span>  <?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['mtime'])? strtotime($vo['mtime']) : $vo['mtime'])); ?></span>
                            </td>

                            <td class="text-center">
                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo htmlentities($vo['filename']); ?>','<?php echo Url('openfile'); ?>?file=<?php echo htmlentities($vo['pathname']); ?>',{w:1260,h:660})"><i class="fa fa-paste"></i> 编辑</button>
<!--                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo htmlentities($vo['filename']); ?>','<?php echo Url('openfile'); ?>?file=<?php echo htmlentities($vo['filename']); ?>&dir=<?php echo htmlentities($dir); ?>',{w:1260,h:600})"><i class="fa fa-paste"></i> 重命名</button>-->
<!--                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo htmlentities($vo['filename']); ?>','<?php echo Url('openfile'); ?>?file=<?php echo htmlentities($vo['filename']); ?>&dir=<?php echo htmlentities($dir); ?>',{w:1260,h:600})"><i class="fa fa-paste"></i> 删除</button>-->
<!--                                <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('<?php echo htmlentities($vo['filename']); ?>','<?php echo Url('openfile'); ?>?file=<?php echo htmlentities($vo['filename']); ?>&dir=<?php echo htmlentities($dir); ?>',{w:1260,h:600})"><i class="fa fa-paste"></i> 下载</button>-->

                            </td>
                        </tr>
                        <?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




<script>
    $('.btn-warning').on('click',function(){
        var _this = $(this),url =_this.data('url');
        $eb.$swal('delete',function(){
            $eb.axios.get(url).then(function(res){
                console.log(res);
                if(res.status == 200 && res.data.code == 200) {
                    $eb.$swal('success',res.data.msg);
                    _this.parents('tr').remove();
                }else
                    return Promise.reject(res.data.msg || '删除失败')
            }).catch(function(err){
                $eb.$swal('error',err);
            });
        })
    });
</script>


</div>
</body>
</html>
