<?php /*a:2:{s:57:"/home/wwwroot/www/lungcare/app/admin/view/index/index.php";i:1582793319;s:58:"/home/wwwroot/www/lungcare/app/admin/view/public/style.php";i:1568613772;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>智影医疗管理系统</title>
    <!--[if lt IE 9]>
    <meta http-equiv="refresh" content="0;ie.html" />
    <![endif]-->
    <link rel="shortcut icon" href="/favicon.ico">
    <link href="/system/frame/css/bootstrap.min.css" rel="stylesheet">
    <link href="/system/frame/css/font-awesome.min.css" rel="stylesheet">
    <link href="/system/frame/css/animate.min.css" rel="stylesheet">
    <link href="/system/frame/css/style.min.css" rel="stylesheet">
    <style>
        .swal2-container{z-index: 100000000000!important;}
    </style>
</head>
<body class="fixed-sidebar full-height-layout gray-bg" style="overflow:hidden">
<div id="wrapper">
    <!--左侧导航开始-->
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="nav-close"><i class="fa fa-times-circle"></i>
        </div>
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element admin_open">
                        <span>
                            <img alt="image" class="imgbox" src="<?php echo htmlentities($site_logo); ?>" onerror="javascript:this.src='/system/images/admin_logo.png';"/>
                        </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear" style="margin-top: 20px;">
                               <span class="block m-t-xs"><strong class="font-bold"><?php echo htmlentities($_admin['real_name']); ?></strong></span>
                                <span class="text-muted text-xs block"><?php echo !empty($role_name['role_name']) ? htmlentities($role_name['role_name']) :  '管理员'; ?><b class="caret"></b></span>
                            </span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="J_menuItem admin_close" href="<?php echo Url('setting.systemAdmin/admin_info'); ?>">个人资料</a>
                            </li>
                            <li><a class="admin_close" target="_blank" href="http://www.crmeb.com/">联系我们</a>
                            </li>
                            <li class="divider"></li>
                            <li><a href="<?php echo Url('login/logout'); ?>">安全退出</a>
                            </li>
                        </ul>
                    </div>
                    <div class="logo-element">CB
                    </div>
                </li>
                <!--  菜单  -->
                <?php if(is_array($menuList) || $menuList instanceof \think\Collection || $menuList instanceof \think\Paginator): $i = 0; $__LIST__ = $menuList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;if(isset($menu['child']) && count($menu['child']) > 0){ ?>
                    <li>
                        <a href="#"><i class="fa fa-<?php echo htmlentities($menu['icon']); ?>"></i> <span class="nav-label"><?php echo htmlentities($menu['menu_name']); ?></span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <?php if(is_array($menu['child']) || $menu['child'] instanceof \think\Collection || $menu['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $menu['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$child): $mod = ($i % 2 );++$i;?>
                            <li>
                                <?php if(isset($child['child']) && count($child['child']) > 0){ ?>
                                    <a href="#"><i class="fa fa-<?php echo htmlentities($child['icon']); ?>"></i><?php echo htmlentities($child['menu_name']); ?><span class="fa arrow"></span></a>
                                    <ul class="nav nav-third-level">
                                        <?php if(is_array($child['child']) || $child['child'] instanceof \think\Collection || $child['child'] instanceof \think\Paginator): $i = 0; $__LIST__ = $child['child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$song): $mod = ($i % 2 );++$i;?>
                                        <li><a class="J_menuItem" href="<?php echo htmlentities($song['url']); ?>"><i class="fa fa-<?php echo htmlentities($song['icon']); ?>"></i> <?php echo htmlentities($song['menu_name']); ?></a></li>
                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </ul>
                                <?php }else{ ?>
                                    <a class="J_menuItem" href="<?php echo htmlentities($child['url']); ?>"><i class="fa fa-<?php echo htmlentities($child['icon']); ?>"></i><?php echo htmlentities($child['menu_name']); ?></a>
                                <?php } ?>
                            </li>
                            <?php endforeach; endif; else: echo "" ;endif; ?>
                        </ul>
                    </li>
                <?php } ?>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </nav>
    <!--左侧导航结束-->
    <!--右侧部分开始-->
    <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row content-tabs" @touchmove.prevent  >
            <button class="roll-nav roll-left navbar-minimalize" style="padding: 0;margin: 0;"><i class="fa fa-bars"></i></button>

            <nav class="page-tabs J_menuTabs">
                <div class="page-tabs-content">
                    <a href="javascript:;" class="active J_menuTab" data-id="<?php echo Url('Index/main'); ?>">首页</a>
                </div>
            </nav>
            <button class="roll-nav roll-right J_tabLeft"><i class="fa fa-backward"></i></button>
            <button class="roll-nav roll-right J_tabRight"><i class="fa fa-forward"></i></button>

            <a href="javascript:void(0);" class="roll-nav roll-right J_tabReply" title="返回"><i class="fa fa-reply"></i> </a>
            <a href="javascript:void(0);" class="roll-nav roll-right J_tabRefresh" title="刷新"><i class="fa fa-refresh"></i> </a>
            <a href="javascript:void(0);" class="roll-nav roll-right J_tabFullScreen" title="全屏"><i class="fa fa-arrows"></i> </a>
            <a href="javascript:void(0);" class="roll-nav roll-right J_notice" data-toggle="dropdown" aria-expanded="true" title="消息"><i class="fa fa-bell"></i> <span class="badge badge-danger" id="msgcount">0</span></a>
            <ul class="dropdown-menu dropdown-alerts dropdown-menu-right" >
                <li>
                    <a class="J_menuItem" href="<?php echo Url('order.store_order/index'); ?>">
                        <div>
                            <i class="fa fa-building-o"></i> 待发货
                            <span class="pull-right text-muted small" id="ordernum">0个</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="J_menuItem" href="<?php echo Url('store.store_product/index',array('type'=>5)); ?>">
                        <div>
                            <i class="fa fa-pagelines"></i> 库存预警 <span class="pull-right text-muted small" id="inventory">0个</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="J_menuItem" href="<?php echo Url('store.store_product_reply/index'); ?>">
                        <div>
                            <i class="fa fa-comments-o"></i> 新评论 <span class="pull-right text-muted small" id="commentnum">0个</span>
                        </div>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a class="J_menuItem" href="<?php echo Url('finance.user_extract/index'); ?>">
                        <div>
                            <i class="fa fa-cny"></i> 申请提现 <span class="pull-right text-muted small" id="reflectnum">0个</span>
                        </div>
                    </a>
                </li>
            </ul>
            <a href="javascript:void(0);" class="roll-nav roll-right J_tabSetting right-sidebar-toggle" title="更多"><i class="fa fa-tasks"></i></a>
            <div class="btn-group roll-nav roll-right">
                <button class="dropdown J_tabClose" data-toggle="dropdown">关闭<span class="caret"></span>
                </button>
                <ul role="menu" class="dropdown-menu dropdown-menu-right">
                    <li class="J_tabShowActive"><a>定位当前选项卡</a>
                    </li>
                    <li class="divider"></li>
                    <li class="J_tabCloseAll"><a>关闭全部选项卡</a>
                    </li>
                    <li class="J_tabCloseOther"><a>关闭其他选项卡</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--内容展示模块-->
        <div class="row J_mainContent" id="content-main">
            <iframe class="J_iframe" name="iframe_crmeb_main" width="100%" height="100%" src="<?php echo Url('Index/main'); ?>" frameborder="0" data-id="<?php echo Url('Index/main'); ?>" seamless></iframe>
        </div>
        <!--底部版权-->
        <div class="footer"  @touchmove.prevent>
            <div class="pull-right">© 2014-2018 <a href="http://www.crmeb.com/" target="_blank">CRMEB</a>
            </div>
        </div>
    </div>
    <!--右侧部分结束-->
    <!--右侧边栏开始-->
    <div id="right-sidebar">
        <div class="sidebar-container">
            <ul class="nav nav-tabs navs-3">
<!--                <li class="active">-->
<!--                    <a data-toggle="tab" href="#tab-1">-->
<!--                        <i class="fa fa-bell"></i>通知-->
<!--                    </a>-->
<!--                </li>-->
                <li class="active">
                    <a data-toggle="tab" href="#tab-1">
                        <i class="fa fa-gear"></i> 设置
                    </a>
                </li>
                
            </ul>
            <div class="tab-content">
<!--                <div id="tab-1" class="tab-pane active">-->
<!--                    <div class="sidebar-title">-->
<!--                        <h3><i class="fa fa-comments-o"></i> 最新通知</h3>-->
<!--                        <small><i class="fa fa-tim"></i> 您当前有0条未读信息</small>-->
<!--                    </div>-->
<!--                    <div>-->
<!--                    </div>-->
<!--                </div>-->
                <div id="tab-1" class="tab-pane active">
                    <div class="sidebar-title">
                        <h3><i class="fa fa-comments-o"></i> 提示</h3>
                        <small><i class="fa fa-tim"></i> 你可以从这里选择和预览主题的布局和样式，这些设置会被保存在本地，下次打开的时候会直接应用这些设置。</small>
                    </div>
                    <div class="skin-setttings">
                        <div class="title">设置</div>
                        <div class="setings-item">
                            <span>收起左侧菜单</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="collapsemenu" class="onoffswitch-checkbox" id="collapsemenu">
                                    <label class="onoffswitch-label" for="collapsemenu">
                                        <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="setings-item">
                                <span>固定宽度</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="boxedlayout" class="onoffswitch-checkbox" id="boxedlayout">
                                    <label class="onoffswitch-label" for="boxedlayout">
                                        <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="setings-item">
                            <span>菜单点击刷新</span>
                            <div class="switch">
                                <div class="onoffswitch">
                                    <input type="checkbox" name="refresh" class="onoffswitch-checkbox" id="refresh">
                                    <label class="onoffswitch-label" for="refresh">
                                        <span class="onoffswitch-inner"></span> <span class="onoffswitch-switch"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="title">皮肤选择</div>
                        <div class="setings-item default-skin nb">
                                <span class="skin-name ">
                         <a href="#" class="s-skin-0">
                             默认皮肤
                         </a>
                    </span>
                        </div>
                        <div class="setings-item blue-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-1">
                            蓝色主题
                        </a>
                    </span>
                        </div>
                        <div class="setings-item yellow-skin nb">
                                <span class="skin-name ">
                        <a href="#" class="s-skin-3">
                            黄色/紫色主题
                        </a>
                    </span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!--右侧边栏结束-->
</div>
<!--vue调用不能删除-->
<div id="vm"></div>
<script src="/system/frame/js/jquery.min.js"></script>
<script src="/system/frame/js/bootstrap.min.js"></script>
<script src="/static/plug/helper.js"></script>
<script src="/system/frame/js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="/system/frame/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
<script src="/system/frame/js/plugins/layer/layer.min.js"></script>
<script src="/system/frame/js/hplus.min.js"></script>
<script src="/system/frame/js/contabs.min.js"></script>
<script src="/system/frame/js/plugins/pace/pace.min.js"></script>
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
<script>
    window.newOrderAudioLink='<?php echo htmlentities($new_order_audio_link); ?>';
    window.workermanPort = '<?php echo htmlentities($workermanPort); ?>';
</script>
<script src="/system/frame/js/index.js"></script>
</body>
</html>
