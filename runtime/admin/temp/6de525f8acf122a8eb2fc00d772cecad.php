<?php /*a:5:{s:61:"/home/wwwroot/www/lungcare/app/admin/view/user/user/index.php";i:1567990148;s:62:"/home/wwwroot/www/lungcare/app/admin/view/public/container.php";i:1567990146;s:63:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_head.php";i:1572938472;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;s:65:"/home/wwwroot/www/lungcare/app/admin/view/public/frame_footer.php";i:1567990146;}*/ ?>
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
    
<script src="/static/plug/city.js"></script>
<style>
    .layui-btn-xs{margin-left: 0px !important;}
    legend{
        width: auto;
        border: none;
        font-weight: 700 !important;
    }
    .site-demo-button{
        padding-bottom: 20px;
        padding-left: 10px;
    }
    .layui-form-label{
        width: auto;
    }
    .layui-input-block input{
        width: 50%;
        height: 34px;
    }
    .layui-form-item{
        margin-bottom: 0;
    }
    .layui-input-block .time-w{
        width: 200px;
    }
    .layui-table-body{overflow-x: hidden;}
    .layui-btn-group button i{
        line-height: 30px;
        margin-right: 3px;
        vertical-align: bottom;
    }
    .back-f8{
        background-color: #F8F8F8;
    }
    .layui-input-block button{
        border: 1px solid #e5e5e5;
    }
    .avatar{width: 50px;height: 50px;}
    .layui-table-body{
        overflow-x: unset;
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
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>会员搜索</h5>
                <div class="ibox-tools">
                    <a class="collapse-link">
                        <i class="fa fa-chevron-up"></i>
                    </a>
                </div>
            </div>
            <div class="ibox-content" style="display: block;">
<!--                <div class="alert alert-success alert-dismissable">-->
<!--                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>-->
<!--                    目前拥有<?php echo htmlentities($count_user); ?>个会员-->
<!--                </div>-->
                <form class="layui-form">
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">姓名编号：</label>
                            <div class="layui-input-inline">
                                <input type="text" name="nickname" lay-verify="nickname" style="width: 100%" autocomplete="off" placeholder="请输入姓名、编号、手机号" class="layui-input">
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">用户类型：</label>
                            <div class="layui-input-inline">
                                <select name="user_type" lay-verify="user_type">
                                    <option value="">全部</option>
                                    <option value="wechat">微信公众号</option>
                                    <option value="routine">微信小程序</option>
                                    <option value="h5">H5</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">状　　态：</label>
                            <div class="layui-input-inline">
                                <select name="status" lay-verify="status">
                                    <option value="">全部</option>
                                    <option value="1">正常</option>
                                    <option value="0">锁定</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">性　　别：</label>
                            <div class="layui-input-inline">
                                <select name="sex" lay-verify="sex">
                                    <option value="">全部</option>
                                    <option value="1">男</option>
                                    <option value="2">女</option>
                                    <option value="0">保密</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">身　　份：</label>
                            <div class="layui-input-inline">
                                <select name="is_promoter" lay-verify="is_promoter">
                                    <option value="">全部</option>
                                    <option value="1">推广员</option>
                                    <option value="0">普通用户</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">国　　家：</label>
                            <div class="layui-input-inline">
                                <select name="country" lay-verify="country" lay-filter='country'>
                                    <option value=""  selected="selected">请选择国</option>
                                    <option value="domestic">中国</option>
                                    <option value="abroad">外国</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline" id="province-div">
                            <label class="layui-form-label">省　　份：</label>
                            <div class="layui-input-inline">
                                <select name="province" lay-verify="province" lay-filter='province' id="province">
                                    <option value="" id="province-top">请选择省</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline" id="city-div">
                            <label class="layui-form-label">市　　区：</label>
                            <div class="layui-input-inline">
                                <select name="city" lay-verify="city"  lay-filter='city' id="city">
                                    <option value="" id="city-top">请选择市</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <div class="layui-inline">
                            <label class="layui-form-label">消费情况：</label>
                            <div class="layui-input-inline">
                                <select name="pay_count" lay-verify="pay_count">
                                    <option value="">全部</option>
                                    <option value="-1">0</option>
                                    <option value="0">1+</option>
                                    <option value="1">2+</option>
                                    <option value="2">3+</option>
                                    <option value="3">4+</option>
                                    <option value="4">5+</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">访问情况：</label>
                            <div class="layui-input-inline">
                                <select name="user_time_type" lay-verify="user_time_type">
                                    <option value="">全部</option>
                                    <option value="visitno">时间段未访问</option>
                                    <option value="visit">时间段访问过</option>
                                    <option value="add_time">首次访问</option>
                                </select>
                            </div>
                        </div>
                        <div class="layui-inline">
                            <label class="layui-form-label">选择时间：</label>
                            <div class="layui-input-inline">
                                <input type="text" class="layui-input time-w" name="user_time" lay-verify="user_time"  id="user_time" placeholder=" - ">
                            </div>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">
                            <button class="layui-btn layui-btn-sm layui-btn-normal" lay-submit="" lay-filter="search" >
                                <i class="layui-icon layui-icon-search layuiadmin-button-btn"></i>搜索</button>
                        </label>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-12">
        <div class="ibox">
            <div class="ibox-content">
                <div class="table-responsive">
                    <div class="layui-btn-group conrelTable">
<!--                        <button class="layui-btn layui-btn-sm layui-btn-danger" type="button" data-type="set_status_f"><i class="fa fa-ban"></i>封禁</button>-->
<!--                        <button class="layui-btn layui-btn-sm layui-btn-normal" type="button" data-type="set_status_j"><i class="fa fa-check-circle-o"></i>解封</button>-->
                        <button class="layui-btn layui-btn-sm layui-btn-normal" type="button" data-type="set_grant"><i class="fa fa-check-circle-o"></i>发送优惠券</button>
                        <button class="layui-btn layui-btn-sm layui-btn-normal" type="button" data-type="set_custom"><i class="fa fa-check-circle-o"></i>发送客服图文消息</button>
<!--                        <button class="layui-btn layui-btn-sm layui-btn-normal" type="button" data-type="set_template"><i class="fa fa-check-circle-o"></i>发送模板消息</button>-->
<!--                        <button class="layui-btn layui-btn-sm layui-btn-normal" type="button" data-type="set_info"><i class="fa fa-check-circle-o"></i>发送站内消息</button>-->
                        <button class="layui-btn layui-btn-sm layui-btn-normal" type="button" data-type="refresh"><i class="layui-icon layui-icon-refresh" ></i>刷新</button>
                    </div>
                    <table class="layui-hide" id="userList" lay-filter="userList"></table>
                    <script type="text/html" id="nickname">
                        {{d.nickname}}
                        {{# if(d.vip_name){ }}
                        <p style="color:#dab176">{{d.vip_name}}</p>
                        {{# } }}
                    </script>
                    <script type="text/html" id="data_time">
                        <p>首次：{{d.add_time}}</p>
                        <p>最近：{{d.last_time}}</p>
                    </script>
                    <script type="text/html" id="checkboxstatus">
                        <input type='checkbox' name='status' lay-skin='switch' value="{{d.uid}}" lay-filter='status' lay-text='正常|禁止'  {{ d.status == 1 ? 'checked' : '' }}>
                    </script>
                    <script type="text/html" id="barDemo">
                        <button type="button" class="layui-btn layui-btn-xs" lay-event="edit"><i class="layui-icon layui-icon-edit"></i>编辑</button>
                        <button type="button" class="layui-btn layui-btn-xs" onclick="dropdown(this)">操作 <span class="caret"></span></button>
                        <ul class="layui-nav-child layui-anim layui-anim-upbit">
                            <li>
                                <a href="javascript:void(0);" lay-event="money">
                                    <i class="layui-icon layui-icon-edit"></i> 余额积分</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" lay-event="see">
                                    <i class="layui-icon layui-icon-edit"></i> 会员详情</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" lay-event="give_level">
                                    <i class="layui-icon layui-icon-star-fill" aria-hidden="true"></i> 赠送会员</a>
                            </li>
                            {{# if(d.vip_name){ }}
                            <li>
                                <a href="javascript:void(0);" lay-event="del_level">
                                    <i class="layui-icon layui-icon-close-fill" aria-hidden="true"></i> 清除等级</a>
                            </li>
                            {{# } }}
                        </ul>
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="/system/js/layuiList.js"></script>
<script src="/system/frame/js/content.min.js?v=1.0.0"></script>



<script>
    $('#province-div').hide();
    $('#city-div').hide();
    layList.select('country',function (odj,value,name) {
        var html = '';
        $.each(city,function (index,item) {
            html += '<option value="'+item.label+'">'+item.label+'</option>';
        })
        if(odj.value == 'domestic'){
            $('#province-div').show();
            $('#city-div').show();
            $('#province-top').siblings().remove();
            $('#province-top').after(html);
            $('#province').val('');
            layList.form.render('select');
        }else{
            $('#province-div').hide();
            $('#city-div').hide();
        }
        $('#province').val('');
        $('#city').val('');
    });
    layList.select('province',function (odj,value,name) {
        var html = '';
        $.each(city,function (index,item) {
            if(item.label == odj.value){
                $.each(item.children,function (indexe,iteme) {
                    html += '<option value="'+iteme.label+'">'+iteme.label+'</option>';
                })
                $('#city').val('');
                $('#city-top').siblings().remove();
                $('#city-top').after(html);
                layList.form.render('select');
            }
        })
    });
    layList.form.render();
    layList.tableList('userList',"<?php echo Url('get_user_list'); ?>",function () {
        return [
            {type:'checkbox'},
            {field: 'uid', title: '编号',event:'uid',width:'4%',align:'center'},
            {field: 'avatar', title: '头像', event:'open_image', width: '6%',align:'center', templet: '<p lay-event="open_image"><img class="avatar" style="cursor: pointer" class="open_image" data-image="{{d.avatar}}" src="{{d.avatar}}" alt="{{d.nickname}}"></p>'},
            {field: 'nickname', title: '姓名',templet:'#nickname',align:'center'},
            {field: 'phone', title: '手机号',align:'center',width:'8%'},
            {field: 'now_money', title: '余额',width:'6%',sort:true,event:'now_money',align:'center'},
            {field: 'pay_count', title: '购买次数',align:'center',width:'6%'},
            {field: 'extract_count_price', title: '累计提现',align:'center',width:'6%'},
            {field: 'integral', title: '积分',width:'6%',sort:true,event:'integral',align:'center'},
            {field: 'spread_uid_nickname', title: '推荐人',align:'center'},
            {field: 'sex', title: '性别',width:'4%',align:'center'},
            {field: 'data_time', title: '访问日期',align:'center',width:'12%',templet:'#data_time'},
            {field: 'status', title: '状态',templet:"#checkboxstatus",width:'6%',align:'center'},
            {field: 'user_type', title: '用户类型',width:'6%',align:'center'},
            {field: 'operate', title: '操作', width: '10%', align: 'center', toolbar: '#barDemo'}
        ];
    });
    layList.date('last_time');
    layList.date('add_time');
    layList.date('user_time');
    layList.date('time');
    //监听并执行 uid 的排序
    layList.sort(function (obj) {
        var layEvent = obj.field;
        var type = obj.type;
        switch (layEvent){
            case 'uid':
                layList.reload({order: layList.order(type,'u.uid')},true,null,obj);
                break;
            case 'now_money':
                layList.reload({order: layList.order(type,'u.now_money')},true,null,obj);
                break;
            case 'integral':
                layList.reload({order: layList.order(type,'u.integral')},true,null,obj);
                break;
        }
    });
    //监听并执行 uid 的排序
    layList.tool(function (event,data,obj) {
        var layEvent = event;
        switch (layEvent){
            case 'edit':
                $eb.createModalFrame('编辑',layList.Url({a:'edit',p:{uid:data.uid}}));
                break;
            case 'see':
                $eb.createModalFrame(data.nickname+'-会员详情',layList.Url({a:'see',p:{uid:data.uid}}));
                break;
            case 'del_level':
                $eb.$swal('delete',function(){
                    $eb.axios.get(layList.U({a:'del_level',q:{uid:data.uid}})).then(function(res){
                        if(res.status == 200 && res.data.code == 200) {
                            $eb.$swal('success',res.data.msg);
                            obj.update({vip_name:false});
                            layList.reload();
                        }else
                            return Promise.reject(res.data.msg || '删除失败')
                    }).catch(function(err){
                        $eb.$swal('error',err);
                    });
                },{
                    title:'您确定要清除【'+data.nickname+'】的会员等级吗？',
                    text:'清除后无法恢复请谨慎操作',
                    confirm:'是的我要清除'
                })
                break;
            case 'give_level':
                $eb.createModalFrame(data.nickname+'-赠送会员',layList.Url({a:'give_level',p:{uid:data.uid}}),{w:500,h:200});
                break;
            case 'money':
                $eb.createModalFrame(data.nickname+'-积分余额修改',layList.Url({a:'edit_other',p:{uid:data.uid}}));
                break;
            case 'open_image':
                $eb.openImage(data.avatar);
                break;
        }
    });
    //layList.sort('uid');
    //监听并执行 now_money 的排序
    // layList.sort('now_money');
    //监听 checkbox 的状态
    layList.switch('status',function (odj,value,name) {
        if(odj.elem.checked==true){
            layList.baseGet(layList.Url({a:'set_status',p:{status:1,uid:value}}),function (res) {
                layList.msg(res.msg);
            });
        }else{
            layList.baseGet(layList.Url({a:'set_status',p:{status:0,uid:value}}),function (res) {
                layList.msg(res.msg);
            });
        }
    });
    layList.search('search',function(where){
        if(where['user_time_type'] != '' && where['user_time'] == '') return layList.msg('请选择选择时间');
        if(where['user_time_type'] == '' && where['user_time'] != '') return layList.msg('请选择访问情况');
        layList.reload(where,true);
    });

    var action={
        set_status_f:function () {
           var ids=layList.getCheckData().getIds('uid');
           if(ids.length){
               layList.basePost(layList.Url({a:'set_status',p:{is_echo:1,status:0}}),{uids:ids},function (res) {
                   layList.msg(res.msg);
                   layList.reload();
               });
           }else{
               layList.msg('请选择要封禁的会员');
           }
        },
        set_status_j:function () {
            var ids=layList.getCheckData().getIds('uid');
            if(ids.length){
                layList.basePost(layList.Url({a:'set_status',p:{is_echo:1,status:1}}),{uids:ids},function (res) {
                    layList.msg(res.msg);
                    layList.reload();
                });
            }else{
                layList.msg('请选择要解封的会员');
            }
        },
        set_grant:function () {
            var ids=layList.getCheckData().getIds('uid');
            if(ids.length){
                var str = ids.join(',');
                $eb.createModalFrame('发送优惠券',layList.Url({c:'ump.store_coupon',a:'grant',p:{id:str}}),{'w':800});
            }else{
                layList.msg('请选择要发送优惠券的会员');
            }
        },
        set_template:function () {
            var ids=layList.getCheckData().getIds('uid');
            if(ids.length){
                var str = ids.join(',');
            }else{
                layList.msg('请选择要发送模板消息的会员');
            }
        },
        set_info:function () {
            var ids=layList.getCheckData().getIds('uid');
            if(ids.length){
                var str = ids.join(',');
                $eb.createModalFrame('发送站内信息',layList.Url({c:'user.user_notice',a:'notice',p:{id:str}}),{'w':1200});
            }else{
                layList.msg('请选择要发送站内信息的会员');
            }
        },
        set_custom:function () {
            var ids=layList.getCheckData().getIds('uid');
            if(ids.length){
                var str = ids.join(',');
                $eb.createModalFrame('发送客服图文消息',layList.Url({c:'wechat.wechat_news_category',a:'send_news',p:{id:str}}),{'w':1200});
            }else{
                layList.msg('请选择要发送客服图文消息的会员');
            }
        },
        refresh:function () {
            layList.reload();
        }
    };
    $('.conrelTable').find('button').each(function () {
        var type=$(this).data('type');
        $(this).on('click',function () {
            action[type] && action[type]();
        })
    })
    $(document).on('click',".open_image",function (e) {
        var image = $(this).data('image');
        $eb.openImage(image);
    })
    //下拉框
    $(document).click(function (e) {
        $('.layui-nav-child').hide();
    })
    function dropdown(that){
        var oEvent = arguments.callee.caller.arguments[0] || event;
        oEvent.stopPropagation();
        var offset = $(that).offset();
        var top=offset.top-$(window).scrollTop();
        var index = $(that).parents('tr').data('index');
        $('.layui-nav-child').each(function (key) {
            if (key != index) {
                $(this).hide();
            }
        })
        if($(document).height() < top+$(that).next('ul').height()){
            $(that).next('ul').css({
                'padding': 10,
                'top': - ($(that).parent('td').height() / 2 + $(that).height() + $(that).next('ul').height()/2),
                'left':offset.left-$(that).parents('td').offset().left-20,
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        }else{
            $(that).next('ul').css({
                'padding': 10,
                'top':$(that).parent('td').height() / 2 + $(that).height(),
                'left':offset.left-$(that).parents('td').offset().left-20,
                'min-width': 'inherit',
                'position': 'absolute'
            }).toggle();
        }
    }

</script>


</div>
</body>
</html>
