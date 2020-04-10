<?php /*a:5:{s:56:"/home/wwwroot/www/lungcare/app/admin/view/index/main.php";i:1567990146;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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
    
<!-- 全局js -->
<script src="/static/plug/echarts/echarts.common.min.js"></script>
<script src="/static/plug/echarts/theme/macarons.js"></script>
<script src="/static/plug/echarts/theme/westeros.js"></script>

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
        <div class="col-sm-3 ui-sortable">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">急</span>
                    <h5>订单</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($topData['orderDeliveryNum']); ?></h1>
                    <small><a href="javascript:;" class="opFrames" data-name="订单管理" data-href="<?php echo Url('order.store_order/index',['status'=>1]); ?>">待发货</a> </small>
                </div>
            </div>
        </div>
        <div class="col-sm-3 ui-sortable">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">待</span>
                    <h5>订单</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($topData['orderRefundNum']); ?></h1>
                    <small><a href="javascript:;" class="opFrames" data-name="订单管理" data-href="<?php echo Url('order.store_order/index',['status'=>-1]); ?>">退换货</a></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3 ui-sortable" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">急</span>
                    <h5>商品</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($topData['stockProduct']); ?></h1>
                    <small><a href="javascript:;" class="opFrames" data-name="商品管理" data-href="<?php echo Url('store.store_product/index',array('type'=>5)); ?>">库存预警</a></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3 ui-sortable">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-danger pull-right">待</span>
                    <h5>待提现</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($topData['treatedExtract']); ?></h1>
                    <small><a href="javascript:;" class="opFrames" data-name="提现盛情" data-href="<?php echo Url('finance.user_extract/index'); ?>">待提现</a></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3 ui-sortable">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">昨</span>
                    <h5>订单</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($first_line['d_num']['data']); ?></h1>
                    <div class="stat-percent font-bold text-navy">
                        <?php echo htmlentities($first_line['d_num']['percent']); ?>%
                        <?php if($first_line['d_num']['is_plus'] >= 0): ?><i class="fa <?php if($first_line['d_num']['is_plus'] == 1): ?>fa-level-up<?php else: ?>fa-level-down<?php endif; ?>"></i><?php endif; ?>
                    </div>
                    <small><a href="javascript:;" class="opFrames" data-name="订单管理" data-href="<?php echo Url('order.store_order/index'); ?>?data=yesterday">昨日支付订单数</a></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3 ui-sortable">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">昨</span>
                    <h5>交易</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($first_line['d_price']['data']); ?></h1>
                    <div class="stat-percent font-bold text-info">
                        <?php echo htmlentities($first_line['d_price']['percent']); ?>%
                        <?php if($first_line['d_price']['is_plus'] >= 0): ?><i class="fa <?php if($first_line['d_price']['is_plus'] == 1): ?>fa-level-up<?php else: ?>fa-level-down<?php endif; ?>"></i><?php endif; ?>
                    </div>
                    <small><a href="javascript:;" class="opFrames" data-name="订单管理" data-href="<?php echo Url('order.store_order/index'); ?>?data=yesterday">昨日交易额</a></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3 ui-sortable">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">今</span>
                    <h5>粉丝</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($first_line['day']['data']); ?></h1>
                    <div class="stat-percent font-bold text-info">
                        <?php echo htmlentities($first_line['day']['percent']); ?>%
                        <?php if($first_line['day']['is_plus'] >= 0): ?><i class="fa <?php if($first_line['day']['is_plus'] == 1): ?>fa-level-up<?php else: ?>fa-level-down<?php endif; ?>"></i><?php endif; ?>
                    </div>
                    <small><a href="javascript:;" class="opFrames" data-name="会员管理" data-href="<?php echo Url('user.user/index'); ?>">今日新增粉丝</a></small>
                </div>
            </div>
        </div>
        <div class="col-sm-3 ui-sortable">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-info pull-right">月</span>
                    <h5>粉丝</h5>
                </div>
                <div class="ibox-content">
                    <h1 class="no-margins"><?php echo htmlentities($first_line['month']['data']); ?></h1>
                    <div class="stat-percent font-bold text-info">
                        <?php echo htmlentities($first_line['month']['percent']); ?>%
                        <?php if($first_line['month']['is_plus'] >= 0): ?><i class="fa <?php if($first_line['month']['is_plus'] == 1): ?>fa-level-up<?php else: ?>fa-level-down<?php endif; ?>"></i><?php endif; ?>
                    </div>
                    <small><a href="javascript:;" class="opFrames" data-name="会员管理" data-href="<?php echo Url('user.user/index'); ?>">本月新增粉丝</a></small>
                </div>
            </div>
        </div>

    </div>
<div id="app">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>订单</h5>
                    <div class="pull-right">
                        <div class="btn-group">
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'thirtyday'}" v-on:click="getlist('thirtyday')">30天</button>
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'week'}" v-on:click="getlist('week')">周</button>
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'month'}" v-on:click="getlist('month')">月</button>
                            <button type="button" class="btn btn-xs btn-white" :class="{'active': active == 'year'}" v-on:click="getlist('year')">年</button>
                        </div>
                    </div>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="flot-chart-content echarts" ref="order_echart" id="flot-dashboard-chart1"></div>
                        </div>
                        <div class="col-lg-3">
                            <ul class="stat-list">
                                <li>
                                    <h2 class="no-margins ">{{pre_cycleprice}}</h2>
                                    <small>{{precyclename}}销售额</small>
                                </li>
                                <li>
                                    <h2 class="no-margins ">{{cycleprice}}</h2>
                                    <small>{{cyclename}}销售额</small>
                                    <div class="stat-percent text-navy" v-if='cycleprice_is_plus ===1'>
                                        {{cycleprice_percent}}%
                                        <i  class="fa fa-level-up"></i>
                                    </div>
                                    <div class="stat-percent text-danger" v-else-if='cycleprice_is_plus === -1'>
                                        {{cycleprice_percent}}%
                                        <i class="fa fa-level-down"></i>
                                    </div>
                                    <div class="stat-percent" v-else>
                                        {{cycleprice_percent}}%
                                    </div>
                                    <div class="progress progress-mini">
                                        <div :style="{width:cycleprice_percent+'%'}" class="progress-bar box"></div>
                                    </div>
                                </li>
                                <li>
                                    <h2 class="no-margins ">{{pre_cyclecount}}</h2>
                                    <small>{{precyclename}}订单总数</small>
                                </li>
                                <li>
                                    <h2 class="no-margins">{{cyclecount}}</h2>
                                    <small>{{cyclename}}订单总数</small>
                                    <div class="stat-percent text-navy" v-if='cyclecount_is_plus ===1'>
                                        {{cyclecount_percent}}%
                                        <i class="fa fa-level-up"></i>
                                    </div>
                                    <div class="stat-percent text-danger" v-else-if='cyclecount_is_plus === -1'>
                                        {{cyclecount_percent}}%
                                        <i  class="fa fa-level-down"></i>
                                    </div>
                                    <div class="stat-percent " v-else>
                                        {{cyclecount_percent}}%
                                    </div>
                                    <div class="progress progress-mini">
                                        <div :style="{width:cyclecount_percent+'%'}" class="progress-bar box"></div>
                                    </div>
                                </li>


                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" >
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>用户</h5>
                </div>
                <div class="ibox-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="flot-chart">
                                <div class="flot-chart-content" ref="user_echart" id="flot-dashboard-chart2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<style scoped>
    .box{width:0px;}
</style>
<script>
     require(['vue','axios','layer'],function(Vue,axios,layer){
        new Vue({
            el:"#app",
            data:{
                option:{},
                myChart:{},
                active:'thirtyday',
                cyclename:'最近30天',
                precyclename:'上个30天',
                cyclecount:0,
                cycleprice:0,
                cyclecount_percent:0,
                cycleprice_percent:0,
                cyclecount_is_plus:0,
                cycleprice_is_plus:0,
                pre_cyclecount:0,
                pre_cycleprice:0
            },
            methods:{
                info:function () {
                    var that=this;
                    axios.get("<?php echo Url('userchart'); ?>").then((res)=>{
                        that.myChart.user_echart.setOption(that.userchartsetoption(res.data.data));
                    });
                },
                getlist:function (e) {
                    var that=this;
                    var cycle = e!=null ? e :'thirtyday';
                    axios.get("<?php echo Url('orderchart'); ?>?cycle="+cycle).then((res)=>{
                            that.myChart.order_echart.clear();
                            that.myChart.order_echart.setOption(that.orderchartsetoption(res.data.data));
                            that.active = cycle;
                            switch (cycle){
                                case 'thirtyday':
                                    that.cyclename = '最近30天';
                                    that.precyclename = '上个30天';
                                    break;
                                case 'week':
                                    that.precyclename = '上周';
                                    that.cyclename = '本周';
                                    break;
                                case 'month':
                                    that.precyclename = '上月';
                                    that.cyclename = '本月';
                                    break;
                                case 'year':
                                    that.cyclename = '去年';
                                    that.precyclename = '今年';
                                    break;
                                default:
                                    break;
                            }
                            var data=res.data.data;
                            if(data) {
                                that.cyclecount = data.cycle.count.data;
                                that.cyclecount_percent = data.cycle.count.percent;
                                that.cyclecount_is_plus = data.cycle.count.is_plus;
                                that.cycleprice = data.cycle.price.data;
                                that.cycleprice_percent = data.cycle.price.percent;
                                that.cycleprice_is_plus = data.cycle.price.is_plus;
                                that.pre_cyclecount = data.pre_cycle.count.data;
                                that.pre_cycleprice = data.pre_cycle.price.data;
                            }
                    });
                },
                orderchartsetoption:function(data){
                    data = data == undefined ? {} : data;
                        this.option = {
                            tooltip: {
                                trigger: 'axis',
                                axisPointer: {
                                    type: 'cross',
                                    crossStyle: {
                                        color: '#999'
                                    }
                                }
                            },
                            toolbox: {
                                feature: {
                                    dataView: {show: true, readOnly: false},
                                    magicType: {show: true, type: ['line', 'bar']},
                                    restore: {show: false},
                                    saveAsImage: {show: true}
                                }
                            },
                            legend: {
                                data: data.legend || []
                            },
                            grid: {
                                x: 70,
                                x2: 50,
                                y: 60,
                                y2: 50
                            },
                            xAxis: [
                                {
                                    type: 'category',
                                    data: data.xAxis,
                                    axisPointer: {
                                        type: 'shadow'
                                    },
                                    axisLabel:{
                                        interval: 0,
                                        rotate:40
                                    }


                                }
                            ],
                            yAxis:[{type : 'value'}],
//                            yAxis: [
//                                {
//                                    type: 'value',
//                                    name: '',
//                                    min: 0,
//                                    max: data.yAxis.maxprice,
////                                    interval: 0,
//                                    axisLabel: {
//                                        formatter: '{value} 元'
//                                    }
//                                },
//                                {
//                                    type: 'value',
//                                    name: '',
//                                    min: 0,
//                                    max: data.yAxis.maxnum,
//                                    interval: 5,
//                                    axisLabel: {
//                                        formatter: '{value} 个'
//                                    }
//                                }
//                            ],
                            series: data.series
                        };
                    return  this.option;
                },
                userchartsetoption:function(data){
                    this.option = {
                        tooltip: {
                            trigger: 'axis',
                            axisPointer: {
                                type: 'cross',
                                crossStyle: {
                                    color: '#999'
                                }
                            }
                        },
                        toolbox: {
                            feature: {
                                dataView: {show: false, readOnly: false},
                                magicType: {show: true, type: ['line', 'bar']},
                                restore: {show: false},
                                saveAsImage: {show: false}
                            }
                        },
                        legend: {
                            data:data.legend
                        },
                        grid: {
                            x: 70,
                            x2: 50,
                            y: 60,
                            y2: 50
                        },
                        xAxis: [
                            {
                                type: 'category',
                                data: data.xAxis,
                                axisPointer: {
                                    type: 'shadow'
                                }
                            }
                        ],
                        yAxis: [
                            {
                                type: 'value',
                                name: '人数',
                                min: 0,
                                max: data.yAxis.maxnum,
                                interval: 5,
                                axisLabel: {
                                    formatter: '{value} 人'
                                }
                            }
                        ],
//                        series: data.series
                        series : [ {
                            name : '人数',
                            type : 'bar',
                            barWidth : '50%',
                            itemStyle: {
                                normal: {
                                    label: {
                                        show: true, //开启显示
                                        position: 'top', //在上方显示
                                        textStyle: { //数值样式
                                            color: '#666',
                                            fontSize: 12
                                        }
                                    }
                                }
                            },
                            data : data.series
                        } ]

                    };
                    return  this.option;
                },
                setChart:function(name,myChartname){
                    this.myChart[myChartname] = echarts.init(name,'macarons');//初始化echart
                }
            },
            mounted:function () {
                const self = this;
                this.setChart(self.$refs.order_echart,'order_echart');//订单图表
                this.setChart(self.$refs.user_echart,'user_echart');//用户图表
                this.info();
                this.getlist();
                $('.opFrames').on('click',function () {
                    parent.addframes($(this).data('href'),'',$(this).data('name'));
                });
            }
        });
    });
</script>


</div>
</body>
</html>
