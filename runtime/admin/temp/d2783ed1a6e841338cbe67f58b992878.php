<?php /*a:5:{s:79:"/home/wwwroot/www/lungcare/app/admin/view/record/record/user_business_chart.php";i:1567990148;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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
    
<style>
    .layui-input-block button{
        border: 1px solid rgba(0,0,0,0.1);
    }
    .layui-card-body{
        padding-left: 10px;
        padding-right: 10px;
    }
    .layui-card-body p.layuiadmin-big-font {
        font-size: 36px;
        color: #666;
        line-height: 36px;
        padding: 5px 0 10px;
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-all;
        white-space: nowrap;
    }
    .layuiadmin-badge, .layuiadmin-btn-group, .layuiadmin-span-color {
        position: absolute;
        right: 15px;
    }
    .layuiadmin-badge {
        top: 50%;
        margin-top: -9px;
        color: #01AAED;
    }
    .layuiadmin-span-color i {
        padding-left: 5px;
    }
    .block-rigit{
        text-align: right;
    }
    .block-rigit button{
        width: 100px;
        letter-spacing: .5em;
        line-height: 28px;
    }
    .layuiadmin-card-list{
        padding: 1.6px;
    }
    .layuiadmin-card-list p.layuiadmin-normal-font {
        padding-bottom: 10px;
        font-size: 20px;
        color: #666;
        line-height: 24px;
    }
</style>
<script src="/static/plug/echarts.common.min.js"></script>

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
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">搜索条件</div>
                <div class="layui-card-body">
                    <div class="layui-carousel layadmin-carousel layadmin-shortcut" lay-anim="" lay-indicator="inside" lay-arrow="none" style="background:none">
                        <div class="layui-card-body">
                            <div class="layui-row layui-col-space10 layui-form-item">
                                <div class="layui-col-lg12">
                                    <label class="layui-form-label">时间范围:</label>
                                    <div class="layui-input-block" data-type="data" v-cloak="">
                                        <button class="layui-btn layui-btn-sm" type="button" v-for="item in dataList" @click="setData(item)" :class="{'layui-btn-primary':data!=item.value}">{{item.name}}</button>
                                        <button class="layui-btn layui-btn-sm" type="button" ref="time" @click="setData({value:'zd',is_zd:true})" :class="{'layui-btn-primary':data!='zd'}">自定义</button>
                                        <button type="button" class="layui-btn layui-btn-sm layui-btn-primary" v-show="showtime==true" ref="date_time"><?php echo htmlentities($year['0']); ?> - <?php echo htmlentities($year['1']); ?></button>
                                    </div>
                                </div>
                                <div class="layui-col-lg12">
                                    <div class="layui-input-block">
                                        <button @click="search" type="button" class="layui-btn layui-btn-sm layui-btn-normal">
                                            <i class="layui-icon layui-icon-search"></i>搜索</button>
                                        <button @click="refresh" type="reset" class="layui-btn layui-btn-primary layui-btn-sm">
                                            <i class="layui-icon layui-icon-refresh" ></i>刷新</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div :class="item.col!=undefined ? 'layui-col-sm'+item.col+' '+'layui-col-md'+item.col:'layui-col-sm3 layui-col-md3'" v-for="item in badge" v-cloak="">
            <div class="layui-card">
                <div class="layui-card-header">
                    {{item.name}}
                    <span class="layui-badge layuiadmin-badge" :class="item.background_color">{{item.field}}</span>
                </div>
                <div class="layui-card-body">
                    <p class="layuiadmin-big-font">{{item.count}}</p>
                    <p v-show="item.content!=undefined">
                        {{item.content}}
                        <span class="layuiadmin-span-color">{{item.sum}}<i :class="item.class"></i></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">购物会员统计</div>
                <div class="layui-card-body layui-row">
                    <div class="layui-col-md12">
                        <div class="layui-btn-container" ref="echarts_list" style="height:300px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">会员访问统计</div>
                <div class="layui-card-body layui-row">
                    <div class="layui-col-md12">
                        <div class="layui-btn-container" ref="echarts_user" style="height:300px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-col-md12">
            <div class="layui-card">
                <div class="layui-card-header">购物会员数量饼状图</div>
                <div class="layui-card-body layui-row">
                    <div class="layui-col-md12">
                        <div class="layui-btn-container" ref="echarts_shop" style="height:300px"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">会员积分排行榜 <span class="layui-badge layui-bg-orange">TOP<?php echo htmlentities($limit); ?></span></div>
                    <div class="layui-card-body layui-row">
                        <table class="layui-table">
                            <thead>
                                <tr>
                                    <th>排名</th>
                                    <th>昵称/手机</th>
                                    <th>会员积分</th>
                                    <th>注册时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($integralList) || $integralList instanceof \think\Collection || $integralList instanceof \think\Paginator): $i = 0; $__LIST__ = $integralList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo htmlentities($key+1); ?></td>
                                    <td><?php echo htmlentities($vo['nickname']); ?>/<?php echo htmlentities($vo['phone']); ?></td>
                                    <td><?php echo htmlentities($vo['integral']); ?></td>
                                    <td><?php echo htmlentities($vo['add_time']); ?></td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">会员余额排行榜 <span class="layui-badge layui-bg-orange">TOP<?php echo htmlentities($limit); ?></span></div>
                    <div class="layui-card-body layui-row">
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>排名</th>
                                <th>昵称/手机</th>
                                <th>会员余额</th>
                                <th>注册时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($moneyList) || $moneyList instanceof \think\Collection || $moneyList instanceof \think\Paginator): $i = 0; $__LIST__ = $moneyList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo htmlentities($key+1); ?></td>
                                <td><?php echo htmlentities($vo['nickname']); ?>/<?php echo htmlentities($vo['phone']); ?></td>
                                <td><?php echo htmlentities($vo['now_money']); ?></td>
                                <td><?php echo htmlentities($vo['add_time']); ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">购物笔数排行榜 <span class="layui-badge layui-bg-orange">TOP<?php echo htmlentities($limit); ?></span></div>
                    <div class="layui-card-body layui-row">
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>排名</th>
                                <th>昵称/手机</th>
                                <th>购物次数</th>
                                <th>注册时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($shopcountList) || $shopcountList instanceof \think\Collection || $shopcountList instanceof \think\Paginator): $i = 0; $__LIST__ = $shopcountList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo htmlentities($key+1); ?></td>
                                <td><?php echo htmlentities($vo['nickname']); ?>/<?php echo htmlentities($vo['phone']); ?></td>
                                <td><?php echo htmlentities($vo['sum_count']); ?></td>
                                <td><?php echo htmlentities($vo['add_time']); ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">	购物金额 <span class="layui-badge layui-bg-orange">TOP<?php echo htmlentities($limit); ?></span></div>
                    <div class="layui-card-body layui-row">
                        <table class="layui-table">
                            <thead>
                            <tr>
                                <th>排名</th>
                                <th>昵称/手机</th>
                                <th>购物金额</th>
                                <th>注册时间</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if(is_array($orderList) || $orderList instanceof \think\Collection || $orderList instanceof \think\Paginator): $i = 0; $__LIST__ = $orderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                            <tr>
                                <td><?php echo htmlentities($key+1); ?></td>
                                <td><?php echo htmlentities($vo['nickname']); ?>/<?php echo htmlentities($vo['phone']); ?></td>
                                <td><?php echo htmlentities($vo['sum_price']); ?></td>
                                <td><?php echo htmlentities($vo['add_time']); ?></td>
                            </tr>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md6">
                <div class="layui-card">
                    <div class="layui-card-header">上月消费排行榜 <span class="layui-badge layui-bg-orange">TOP<?php echo htmlentities($limit); ?></span></div>
                    <div class="layui-card-body layui-row">
                        <table class="layui-table">
                            <thead>
                                <tr>
                                    <th>排名</th>
                                    <th>昵称/手机</th>
                                    <th>消费金额</th>
                                    <th>注册时间</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if(is_array($lastorderList) || $lastorderList instanceof \think\Collection || $lastorderList instanceof \think\Paginator): $i = 0; $__LIST__ = $lastorderList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                <tr>
                                    <td><?php echo htmlentities($key+1); ?></td>
                                    <td><?php echo htmlentities($vo['nickname']); ?>/<?php echo htmlentities($vo['phone']); ?></td>
                                    <td><?php echo htmlentities($vo['sum_price']); ?></td>
                                    <td><?php echo htmlentities($vo['add_time']); ?></td>
                                </tr>
                                <?php endforeach; endif; else: echo "" ;endif; ?>
                            </tbody>
                        </table>
                    </div>
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
                option: {},
                badge:[],
                dataList: [
                    {name: '全部', value: ''},
                    {name: '今天', value: 'today'},
                    {name: '本周', value: 'week'},
                    {name: '本月', value: 'month'},
                    {name: '本季度',value:'quarter'},
                    {name: '本年', value: 'year'},
                ],
                status:'',
                Promoter:'',
                data: '',
                myChart: {},
                showtime: false,
            },
            methods:{
                getUserBusinesHeade:function(){
                    var that=this;
                    layList.baseGet(layList.U({a:'getUserBusinesHeade',q:{data:this.data}}),function (rem) {
                        that.badge=rem.data;
                    });
                },
                getUserBusinessChart:function(){
                    var that=this;
                    layList.baseGet(layList.U({a:'getUserBusinessChart',q:{data:this.data}}),function (rem) {
                        var user=that.setoption(rem.data.seriesdata,rem.data.xdata,null,null,null,rem.data.zoom);
                        that.myChart.list.setOption(user);
                        var visit=that.setoption(rem.data.visit_data,rem.data.visit_xdata,null,'会员访问人数统计曲线图','line',rem.data.visit_zoom);
                        that.myChart.user.setOption(visit);
                        var shop=that.setoption(rem.data.shop_data,rem.data.shop_xdata,null,'多次购物会员数量饼状图','pic','');
                        that.myChart.shop.setOption(shop);
                    });
                },
                setoption:function(seriesdata,xdata,legend,title,type,Zoom){
                    var _type=type || 'line';
                    var _title=title || '购物会员人数趋势图';
                    switch (_type){
                        case 'line':
                            this.option={
                                title: {text:_title,x:'center'},
                                xAxis : [{type : 'category', data :xdata,}],
                                yAxis : [{type : 'value'}],
                                series:[{type:_type,data:seriesdata,markPoint :{
                                        data : [
                                            {type : 'max', name: '最大值'},
                                            {type : 'min', name: '最小值'}
                                        ]
                                    },
                                    itemStyle:{
                                        color:'#81BCFF'
                                    }
                                }
                                ],
                            };
                            if(legend!=undefined || legend!=null){
                                this.option.legend={left:'center',data:legend};
                            }
                            break;
                        case 'lines':
                            this.option={
                                title: {text:_title,x:'center'},
                                xAxis : [{type : 'category', data :xdata,}],
                                yAxis : [{type : 'value'}],
                                series:seriesdata,
                            };
                            if(legend!=undefined || legend!=null){
                                this.option.legend={left:'left',data:legend};
                            }
                            break;
                        case 'pic':
                            this.option={
                                title: {text:_title,left:'center'},
                                legend: {data:xdata,bottom:10,left:'center'},
                                tooltip: {trigger: 'item'},
                                series:[{ type: 'pie', radius : '65%', center: ['50%', '50%'], selectedMode: 'single',data:seriesdata}],
                            };
                            break;
                    }
                    if(Zoom!=''){
                        this.option.dataZoom=[{startValue:Zoom},{type:'inside'}];
                    }
                    return  this.option;
                },
                search:function(){
                    this.getUserBusinesHeade();
                    this.getUserBusinessChart();
                },
                refresh:function () {
                    this.data='';
                    this.getUserBusinesHeade();
                    this.getUserBusinessChart();
                },
                setChart:function(name,myChartname){
                    this.myChart[myChartname]=echarts.init(name);
                },
                setStatus:function (item) {
                    this.status=item.value;
                },
                setPromoter:function (item) {
                    this.Promoter=item.value;
                },
                setData:function(item){
                    var that=this;
                    if(item.is_zd==true){
                        that.showtime=true;
                        this.data=this.$refs.date_time.innerText;
                    }else{
                        this.showtime=false;
                        this.data=item.value;
                    }
                },
            },
            mounted:function () {
                this.setChart(this.$refs.echarts_list,'list');
                this.setChart(this.$refs.echarts_user,'user');
                this.setChart(this.$refs.echarts_shop,'shop');
                this.getUserBusinesHeade();
                this.getUserBusinessChart();
                var that=this;
                layList.laydate.render({
                    elem:this.$refs.date_time,
                    trigger:'click',
                    eventElem:this.$refs.time,
                    range:true,
                    change:function (value){
                        that.data=value;
                    }
                });
            }
        })
    })
</script>




</div>
</body>
</html>
