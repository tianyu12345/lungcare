<?php /*a:5:{s:69:"/home/wwwroot/www/lungcare/app/admin/view/user/user/user_analysis.php";i:1567990148;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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
    
<link rel="stylesheet" href="/static/plug/daterangepicker/daterangepicker.css">
<link href="/system/frame/css/plugins/footable/footable.core.css" rel="stylesheet">
<script src="/static/plug/sweetalert2/sweetalert2.all.min.js"></script>
<script src="/static/plug/moment.js"></script>
<script src="/static/plug/daterangepicker/daterangepicker.js"></script>
<script src="/static/plug/echarts.common.min.js"></script>
<style>
    .btn-group-sm>.btn, .btn-sm{
         padding: 4px 10px;
         font-size: 12px;
     }
    .btn{
        padding: 4px 10px;
        font-size: 12px;

    }
    .search-form{
        margin-top: 0;
    }
    .search-form .search-item span{
        margin-right: 0;
    }
    .search-form .search-item{
        padding: 0;
    }
    .search-form .search-item-css{
        padding: 6px 0;
    }
</style>

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
                        <form action="" class="form-inline search-form">
                                <div class="search-item" data-name="date">
                                    <span>创建时间：</span>
                                    <button type="button" class="btn btn-outline btn-link" data-value="">本月</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="today">今天</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="week">本周</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="quarter">本季度</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="year">本年</button>
                                    <div class="datepicker" style="display: inline-block;">
                                        <button type="button" class="btn btn-outline btn-link" data-value="<?php echo !empty($where['date']) ? htmlentities($where['date']) : 'no'; ?>">自定义</button>
                                    </div>
                                    <input class="search-item-value" type="hidden" name="date" value="<?php echo htmlentities($where['date']); ?>" />
                                </div>
                                <div class="search-item search-item-css" data-name="status">
                                    <span>选择状态：</span>
                                    <button type="button" class="btn btn-outline btn-link" data-value="">默认</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="1">正常</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="0">锁定</button>
                                    <input class="search-item-value" type="hidden" name="status" value="<?php echo htmlentities($where['status']); ?>" />
                                </div>
                                <div class="search-item search-item-css" data-name="is_promoter">
                                    <span>选择身份：</span>
                                    <button type="button" class="btn btn-outline btn-link" data-value="">全部</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="0">普通用户</button>
                                    <button type="button" class="btn btn-outline btn-link" data-value="1">推广用户</button>
                                    <input class="search-item-value" type="hidden" name="is_promoter" value="<?php echo htmlentities($where['is_promoter']); ?>" />
                                </div>
                                <?php if(is_array($header) || $header instanceof \think\Collection || $header instanceof \think\Paginator): $i = 0; $__LIST__ = $header;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>
                                <div class="col-sm-3">
                                    <div class="widget style1 <?php echo htmlentities($val['color']); ?>-bg" style="height: 120px;">
                                        <div class="row" style="margin-top: 16px;padding: 0 20px;">
                                            <div class="col-xs-4">
                                                <i class="fa <?php echo htmlentities($val['class']); ?> fa-5x"></i>
                                            </div>
                                            <div class="col-xs-8 text-right">
                                                <span> <?php echo htmlentities($val['name']); ?> </span>
                                                <h2 class="font-bold"><?php echo htmlentities($val['value']); ?></h2>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php endforeach; endif; else: echo "" ;endif; ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
<div class="col-sm-12">
    <div class="col-sm-8">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>主要数据统计</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="ibox-content">
                    <div  data-hide="true" id="container" style="height: 390px;"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>消费统计</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
                <div class="ibox-content" data-hide="true" id="user_index" style="height: 310px"></div>
                <div class="ibox-content"  style="height: 115px">
                    <div class="col-sm-6" style="border-right: 1px solid #CCCCCC">
                        <p style="font-size: 12px"><?php echo htmlentities($consume['rightTitle']['title']); ?></p>
                        <p style="font-size: 16px;color:#ed5565"><i class="fa <?php echo htmlentities($consume['rightTitle']['icon']); ?>" style="padding-right: 10px;"></i>&nbsp;&nbsp;￥<?php echo htmlentities($consume['rightTitle']['number']); ?></p>
                    </div>
                    <div class="col-sm-6">
                        <p style="font-size: 12px"><?php echo htmlentities($consume['leftTitle']['title']); ?></p>
                        <p style="font-size: 16px;color:#23c6c8;"><i class="fa <?php echo htmlentities($consume['leftTitle']['icon']); ?>" style="padding-right: 10px;">&nbsp;&nbsp;<?php echo htmlentities($consume['leftTitle']['count']); ?></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-sm-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>用户分布</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div  id="distribution" style="height:290px;"></div>
        </div>
    </div>
</div>
<div class="col-sm-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>用户浏览分析（次）</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content">
            <div  style="height:290px;" id='count'></div>
        </div>
    </div>
</div>
<div class="col-sm-4">
    <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>消费排行榜 TOP20</h5>
            <div class="ibox-tools">
                <a class="collapse-link">
                    <i class="fa fa-chevron-up"></i>
                </a>
            </div>
        </div>
        <div class="ibox-content" style="height:290px;overflow-y: scroll;background-color: #ffffff">
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th class="text-center">排名</th>
                    <th class="text-center">用户名</th>
                    <th class="text-center">时间</th>
                    <th class="text-center">消费金额 ￥</th>
                    <th class="text-center">余额 ￥</th>
                    <th class="text-center">操作</th>
                </tr>
                </thead>
                <tbody>
                <?php if(is_array($user_null) || $user_null instanceof \think\Collection || $user_null instanceof \think\Paginator): $i = 0; $__LIST__ = $user_null;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <tr>
                    <td class="text-center"><?php echo htmlentities($key+1); ?></td>
                    <td class="text-center"><?php echo htmlentities($vo['nickname']); ?></td>
                    <td class="text-center"><?php echo htmlentities(date('Y-m-d H:i:s',!is_numeric($vo['add_time'])? strtotime($vo['add_time']) : $vo['add_time'])); ?></td>
                    <td class="text-center"><?php echo htmlentities($vo['totel_number']); ?></td>
                    <td class="text-center"><?php echo htmlentities($vo['now_money']); ?></td>
                    <td class="text-center">
                        <button class="btn btn-info btn-xs" type="button"  onclick="$eb.createModalFrame('编辑','<?php echo Url('edit',array('uid'=>$vo['uid'])); ?>')">
                            <i class="fa fa-paste"></i> 编辑</button>
                    </td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; if(!$user_null): ?>
                <tr>
                    <td colspan="6" class="text-center"><h4>暂无数据</h4></td>
                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>



<script src="/system/frame/js/content.min.js?v=1.0.0"></script>
<script>
    $('.search-item>.btn').on('click',function(){
        var that = $(this),value = that.data('value'),p = that.parent(),name = p.data('name'),form = p.parents();
        form.find('input[name="'+name+'"]').val(value);
        form.submit();
    });
    $('.search-item-value').each(function(){
        var that = $(this),name = that.attr('name'), value = that.val(),dom = $('.search-item[data-name="'+name+'"] .btn[data-value="'+value+'"]');
        dom.eq(0).removeClass('btn-outline btn-link').addClass('btn-primary btn-sm')
            .siblings().addClass('btn-outline btn-link').removeClass('btn-primary btn-sm')
    });
    (function(){
        var dom = document.getElementById("container"), myChart = echarts.init(dom), option = null;
        option = {
            tooltip: {trigger: 'axis'},
            toolbox: {left: 'right', feature: {restore: {}, saveAsImage: {}}},
            legend: {orient: 'horizontal', left: 'center', top: 25, data: <?php echo $user_index['name']?$user_index['name']:'false';?> || []},
            xAxis: {type: 'category', splitLine: {show: false}, data:<?php echo $user_index['date']?$user_index['date']:'false';?> || []},
            yAxis: {type: 'log',show :true,min:1},
            grid: {left: '3%', right: '4%', bottom: '3%', containLabel: true},
            series:<?php echo $user_index['series']?$user_index['series']:'false';?> || []
            <?php if($where['date']==null || $where['date']=='today'){?>
            ,dataZoom: [{
                endValue : <?php echo $where['date']=='today'?date('H',time()):date('d',time());?>
            }, {
                type: 'inside'
            }],
            <?php }?>
        };
        if (option && typeof option === "object") {
            myChart.setOption(option, true);
        }
    })();
    (function() {
        var dom = document.getElementById("user_index"), myChart = echarts.init(dom), option=null;
            option={
            title:{text:<?php echo empty($consume['series']['data'])?'false':json_encode($consume['title']);?> || '暂无数据'},
            tooltip: {trigger: 'item', formatter: "{a} <br/>{b}: {c} ({d}%)"},
            series: [<?php echo empty($consume['series']['data'])?'false':json_encode($consume['series']);?> || {name:'暂无数据',type:'pie',radius:['40%', '50%'],data:[{value:100,name:'暂无数据'}]}]
        };
        if (option && typeof option === "object"){
            myChart.setOption(option, true);
        }
    })();
    (function () {
        var distributionChart = echarts.init(document.getElementById("distribution"));
        option={
            tooltip: {trigger: 'item', formatter: "{a} <br/>{b}: {c} ({d}%)"},
            legend:{
                orient: 'vertical',
                x: 'left',
                data:<?php echo empty($form['legend_date'])?'false':json_encode($form['legend_date']);?> || [{name:'暂无数据',icon:'circle'}]
            },
            series: [
                {
                    name:'<?php echo isset($form['legend_date'][0]['name'])?$form['legend_date'][0]['name']:'暂无数据';?>',
                    type:'pie',
                    radius: ['70%', '90%'],
                    label: {
                        normal: {
                            show: false,
                            position: 'center'
                        },
                        emphasis: {
                            show: true,
                            textStyle: {
                                fontSize: '20',
                                fontWeight: 'bold'
                            }
                        }
                    },
                    labelLine: {
                        normal: {
                            show: false
                        }
                    },
                    data:<?php echo empty($form['series_date'])?'false':json_encode($form['series_date']);?> || [{value:100,name:'暂无数据'}]
                }
            ]
        };
        if (option && typeof option === "object") {
            distributionChart.setOption(option, true);
        }
    })();
    
    (function(){
        var option = {
            tooltip : {
                trigger: 'axis',
                axisPointer : {
                    type : 'shadow'
                }
            },
            grid: {
                left: '3%',
                right: '4%',
                top: '4%',
                containLabel: true
            },
            yAxis : [
                {
                    inverse:true,
                    axisLine: {show: false},
                    type : 'category',
                    data : <?php echo empty($view['name'])?'false':json_encode($view['name'])?> || [],
                    axisTick: {
                        alignWithLabel: true
                    }
                }
            ],
            xAxis : [
                {
                    show:false,
                    type : 'value'
                }
            ],
            series : [
                {
                    name:'<?php echo isset($view['name'][0])?$view['name'][0]:'';?>',
                    type:'bar',
                    barWidth: '<?php if($view['name'][0]=='暂无数据'){echo '20%'; }else{ echo '50%';}?>',
                    data:<?php echo empty($view['name'])?'false':json_encode($view['value']);?> || []
                },
            ]
        };

        var myChart = echarts.init(document.getElementById('count'),'light');
        myChart.setOption(option);
    })();

    $(".open_image").on('click',function (e) {
        var image = $(this).data('image');
        $eb.openImage(image);
    })
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
            cancelLabel : '取消',
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
        //$("input[name=limit_time]").val('');
    });
    dateInput.on('apply.daterangepicker', function(ev, picker) {
        $("input[name=date]").val(picker.startDate.format('YYYY/MM/DD') + ' - ' + picker.endDate.format('YYYY/MM/DD'));
        $('form').submit();
    });

</script>


</div>
</body>
</html>
