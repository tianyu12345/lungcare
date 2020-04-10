<?php /*a:5:{s:73:"/home/wwwroot/www/lungcare/app/admin/view/record/record/ranking_point.php";i:1567990148;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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
    <div class="layui-row layui-col-space15"  id="app">
        <div class="layui-col-md6 layui-col-sm6">
            <div class="layui-card">
                <div class="layui-card-header">当前积分排名</div>
                <div class="layui-card-body">
                    <table class="layui-table layuiadmin-page-table" lay-skin="line">
                        <thead>
                        <tr>
                            <th width="10%">排名</th>
                            <th width="60%">昵称/手机号</th>
                            <th width="30%">当前积分</th>
                        </tr>
                        </thead>
                        <tbody v-cloak="">
                        <tr v-for="(item,index) in pointList">
                            <td>{{page==1 ?index+1:(index+1)+(page-1)*limit}}</td>
                            <td>{{item.nickname}}</td>
                            <td>{{item.integral}}</td>
                        </tr>
                        <tr v-show="pointList.length<=0" style="text-align: center">
                            <td colspan="3">暂无数据</td>
                        </tr>
                        </tbody>
                    </table>
                    <div ref="page" v-show="count>limit" style="text-align: right;"></div>
                </div>
            </div>
        </div>
        <div class="layui-col-md6 layui-col-sm6">
            <div class="layui-card">
                <div class="layui-card-header">本月积分排名</div>
                <div class="layui-card-body">
                    <table class="layui-table layuiadmin-page-table" lay-skin="line">
                        <thead>
                        <tr>
                            <th width="10%">排名</th>
                            <th>昵称/手机号</th>
                            <th>当前积分</th>
                        </tr>
                        </thead>
                        <tbody v-cloak="">
                        <tr v-for="(item,index) in monthList">
                            <td>{{page==1 ?index+1:(index+1)+(monthpage-1)*limit}}</td>
                            <td>{{item.nickname}}</td>
                            <td>{{item.integral}}</td>
                        </tr>
                        <tr v-show="monthList.length<=0" style="text-align: center">
                            <td colspan="3">暂无数据</td>
                        </tr>
                        </tbody>
                    </table>
                    <div ref="month_page" v-show="monthcount>limit" style="text-align: right;"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/system/js/layuiList.js"></script>
<script>
    require(['vue'],function(Vue) {
        new Vue({
            el: "#app",
            data: {
                pointList:[],
                monthList:[],
                count:0,
                limit:20,
                page:1,
                monthpage:1,
                monthcount:0
            },
            watch:{
                page:function (n){
                    this.getpointList();
                },
                monthpage:function (n) {
                    this.getmonthList()
                }
            },
            methods:{
                getmonthList:function(){
                    var that=this;
                    layList.baseGet(layList.U({a:'getMonthpountList',p:{page:this.page,limit:this.limit}}),function (rem) {
                        that.monthList=rem.data;
                    });
                },
                getpointList:function (){
                    var that=this;
                    var index=layList.layer.load(2,{shade: [0.3,'#fff']});
                    layList.baseGet(layList.U({a:'getpointList',p:{limit:this.limit,page:this.page}}),function (rem) {
                        layList.layer.close(index);
                        that.pointList=rem.data;
                    },function () {
                        layList.layer.close(index);
                    });
                }
            },
            mounted:function () {
                var that=this;
                this.getpointList();
                this.getmonthList();
                layList.baseGet(layList.U({a:'getPountCount'}),function (rem) {
                    that.count=rem.data;
                    layList.laypage.render({
                        elem: that.$refs.month_page
                        ,count:that.count
                        ,limit:that.limit
                        ,theme: '#1E9FFF',
                        jump:function(obj){
                            that.page=obj.curr;
                        }
                    });
                });
                layList.baseGet(layList.U({a:'getMonthPountCount'}),function (rem) {
                    that.count=rem.data;
                    layList.laypage.render({
                        elem: that.$refs.page
                        ,count:that.monthcount
                        ,limit:that.limit
                        ,theme: '#1E9FFF',
                        jump:function(obj){
                            that.monthpage=obj.curr;
                        }
                    });
                });
            }
        })
    })
</script>




</div>
</body>
</html>
