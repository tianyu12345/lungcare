<?php /*a:3:{s:75:"/home/wwwroot/www/lungcare/app/admin/view/system/system_cleardata/index.php";i:1573027732;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/inner_footer.php";i:1567990148;}*/ ?>

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



<style>
    .panel button{display: block;margin:5px;}
    .clear_tit span{font-size: 12px; color: #ED4014;margin: 15px 0;}
    .clear_box{border: 1px solid #DADFE6;border-radius: 3px;display: flex;flex-direction: column;align-items: center;padding: 30px 10px;box-sizing:border-box}
    .clear_box_sp1{font-size: 16px;color: #000000;display: block;}
    .clear_box_sp2{font-size: 14px;color: #ED4014;display: block;margin: 12px 0;}
    .layui-btn-danger {background-color: #FF5722;}
</style>
<div class="layui-fluid">
    <div class="layui-row layui-col-space15"  id="app">
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-body">
                    <blockquote class="layui-elem-quote layui-quote-nm">
                        清除数据请谨慎，清除就无法恢复哦！
                    </blockquote>
                    <div class="clear_box layui-col-md3 layui-col-lg3 layui-col-sm3" v-for="item in clearData">
                        <span class="clear_box_sp1">{{item.name}}</span>
                        <span class="clear_box_sp2" v-if="item.info">{{item.info}}</span>
                        <button type="primary" class="layui-btn layui-btn-danger cleardata" @click="unDate(item)">立即清理</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--<button type="button" class="btn btn-w-m btn-danger btn-primary creatuser" data-url="<?php echo Url('system.SystemCleardata/userdate'); ?>">创建前台用户用户名：crmeb 密码：123456</button>-->
</div>
<script type="text/javascript" src="/static/plug/vue/dist/vue.min.js"></script>
<script>
    new Vue({
        data:{
            clearData:[
                {
                    name:'清除用户生成的临时附件',
                    info:'清除用户生成的临时附件，不会影响产品图',
                    url:"<?php echo Url('system.SystemCleardata/undata',['type'=>1]); ?>"
                },
                {
                    name: '清除回收站产品',
                    info:'清除回收站产品，谨慎操作',
                    url: "<?php echo Url('system.SystemCleardata/undata',['type'=>2]); ?>",
                },
                {
                    name:'清除用户数据',
                    info:'用户相关的所有表都将被清除，谨慎操作',
                    url: "<?php echo Url('system.SystemCleardata/userRelevantData'); ?>",
                },
                {
                    name:'清除商城数据',
                    info:'清除商城数据，谨慎操作',
                    url: "<?php echo Url('system.SystemCleardata/storeData'); ?>",
                },
                {
                    name:'清除产品分类',
                    info:"会清除所有产品分类，谨慎操作",
                    url:"<?php echo Url('system.SystemCleardata/categoryData'); ?>",
                },
                {
                    name:"清除订单数据",
                    info:'清除用户所有订单数据，谨慎操作',
                    url:"<?php echo Url('system.SystemCleardata/orderData'); ?>",
                },
                {
                    name:'清除客服数据',
                    info:'清除添加的客服数据，谨慎操作',
                    url:"<?php echo Url('system.SystemCleardata/kefuData'); ?>",
                },
                {
                    name:'清除微信数据',
                    info:'清除微信菜单保存数据，微信关键字无效回复',
                    url:"<?php echo Url('system.SystemCleardata/wechatData'); ?>",
                },
                {
                    name:'清除微信用户',
                    info:"清除用户表和微信用户表,谨慎操作",
                    url:"<?php echo Url('system.SystemCleardata/wechatuserData'); ?>"
                },
                {
                    name:'清除内容分类',
                    info:'清除添加的文章和文章分类,谨慎操作',
                    url:"<?php echo Url('system.SystemCleardata/articleData'); ?>",
                },
                {
                    name:'清除所有附件',
                    info:'清除所有附件用户生成和后台上传,谨慎操作',
                    url:"<?php echo Url('system.SystemCleardata/uploadData'); ?>",
                },
                {
                    name:'清除系统记录',
                    info:'清除系统记录,谨慎操作',
                    url:"<?php echo Url('system.SystemCleardata/systemdata'); ?>",
                }
            ],
        },
        methods:{
            unDate:function (item) {
                $eb.$swal('delete',function(){
                    $eb.axios.get(item.url).then(function(res){
                        if(res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success',res.data.msg);
                        }else
                            return Promise.reject(res.data.msg || '操作失败')
                    }).catch(function(err){
                        $eb.$swal('error',typeof err == 'object' ? err.toString() : err);
                    });
                },{'title':'您确定要'+item.name+'吗？','text':'数据清除无法恢复','confirm':'是的，我要操作'})
            }
        },
        mounted:function () {

        }
    }).$mount(document.getElementById('app'));

</script>
<script src="/system/frame/js/content.min.js"></script>
<script src="/system/frame/js/plugins/chosen/chosen.jquery.js"></script>
<script src="/system/frame/js/plugins/jsKnob/jquery.knob.js"></script>
<script src="/system/frame/js/plugins/jasny/jasny-bootstrap.min.js"></script>
<script src="/system/frame/js/plugins/datapicker/bootstrap-datepicker.js"></script>
<script src="/system/frame/js/plugins/prettyfile/bootstrap-prettyfile.js"></script>
<script src="/system/frame/js/plugins/nouslider/jquery.nouislider.min.js"></script>
<script src="/system/frame/js/plugins/switchery/switchery.js"></script>
<script src="/system/frame/js/plugins/ionRangeSlider/ion.rangeSlider.min.js"></script>
<script src="/system/frame/js/plugins/iCheck/icheck.min.js"></script>
<script src="/system/frame/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/system/frame/js/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="/system/frame/js/plugins/clockpicker/clockpicker.js"></script>
<script src="/system/frame/js/plugins/cropper/cropper.min.js"></script>
<script src="/system/frame/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/system/frame/js/plugins/iCheck/icheck.min.js"></script>
</body>
</html>
