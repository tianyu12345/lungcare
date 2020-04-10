<?php /*a:6:{s:72:"/home/wwwroot/www/lungcare/app/admin/view/setting/system_group/index.php";i:1567990148;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/inner_page.php";i:1567990148;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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
				<button type="button" class="btn btn-w-m btn-primary" onclick="$eb.createModalFrame(this.innerText,'<?php echo Url('create'); ?>')">添加数据组</button>
				<div class="ibox-tools">

				</div>
			</div>
			<div class="ibox-content">
				<div class="row">
					<div class="col-sm-8 m-b-xs">
						<?php /*  <form action="" class="form-inline">
							  <i class="fa fa-search" style="margin-right: 10px;"></i>
							  <select name="is_show" aria-controls="editable" class="form-control input-sm">
								  <option value="">是否显示</option>
								  <option value="1" <?php if($params['is_show'] == '1'): ?>selected="selected"<?php endif; ?>>显示</option>
								  <option value="0" <?php if($params['is_show'] == '0'): ?>selected="selected"<?php endif; ?>>不显示</option>
							  </select>
							  <select name="access" aria-controls="editable" class="form-control input-sm">
								  <option value="">子管理员是否可用</option>
								  <option value="1" <?php if($params['access'] == '1'): ?>selected="selected"<?php endif; ?>>可用</option>
								  <option value="0" <?php if($params['access'] == '0'): ?>selected="selected"<?php endif; ?>>不可用</option>
							  </select>
						  <div class="input-group">
							  <input type="text" name="keyword" value="<?php echo htmlentities($params['keyword']); ?>" placeholder="请输入关键词" class="input-sm form-control"> <span class="input-group-btn">
									  <button type="submit" class="btn btn-sm btn-primary"> 搜索</button> </span>
						  </div>
						  </form>  */ ?>
					</div>

				</div>
				<div class="table-responsive">
					<table class="table table-striped  table-bordered">
						<thead>
						<tr>
							<th class="text-center">编号</th>
							<th class="text-center">KEY</th>
							<th class="text-center">数据组名称</th>
							<th class="text-center">简介</th>
							<th class="text-center">操作</th>
						</tr>
						</thead>
						<tbody class="">
						<?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
						<tr>
							<td class="text-center">
								<?php echo htmlentities($vo['id']); ?>
							</td>
							<td class="text-center">
								<?php echo htmlentities($vo['config_name']); ?>
							</td>
							<td class="text-center">
								<?php echo htmlentities($vo['name']); ?>
							</td>
							<td class="text-center">
								<?php echo htmlentities($vo['info']); ?>
							</td>
							<td class="text-center">
								<a class="btn btn-info btn-xs" href="<?php echo Url('setting.systemGroupData/index',array('gid'=>$vo['id'])); ?>"><i class="fa fa-paste"></i> 数据列表</a>
								<button class="btn btn-info btn-xs"  onclick="$eb.createModalFrame(this.innerText,'<?php echo Url('edit',array('id'=>$vo['id'])); ?>')" ><i class="fa fa-paste"></i> 编辑</button>
								<button class="btn btn-warning btn-xs" data-url="<?php echo Url('delete',array('id'=>$vo['id'])); ?>" type="button"><i class="fa fa-warning"></i> 删除</button>
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
    $('.btn-warning').on('click',function(){
        window.t = $(this);
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
