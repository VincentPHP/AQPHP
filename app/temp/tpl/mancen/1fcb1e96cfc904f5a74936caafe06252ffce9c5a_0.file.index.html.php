<?php
/* Smarty version 3.1.30, created on 2018-04-20 18:02:44
  from "E:\PhpStorm Workspace\AQPHP Framework\app\templete\mancen\Index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad9bac4ae3992_16450548',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1fcb1e96cfc904f5a74936caafe06252ffce9c5a' => 
    array (
      0 => 'E:\\PhpStorm Workspace\\AQPHP Framework\\app\\templete\\mancen\\Index\\index.html',
      1 => 1524218546,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad9bac4ae3992_16450548 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>华夏微联大数据 - 管理中心</title>
    <link rel="stylesheet" href="static/common/layui/css/layui.css" media="all" />
    <link rel="stylesheet" href="static/common/font-awesome/css/font-awesome.min.css" media="all" />
    <link rel="stylesheet" href="static/mancen/css/app.css" media="all" />
    <link rel="stylesheet" href="static/mancen/css/themes/default.css" media="all" id="skin" kit-skin />
</head>
<body class="kit-theme">
    <div class="layui-layout layui-layout-admin kit-layout-admin">
        <div class="layui-header">
            <div class="layui-logo"><img src="static/mancen/images/logo.png" height="48" alt="华夏微联-管理中心"> </div>
            <div class="layui-logo kit-logo-mobile">VL</div>
            <ul class="layui-nav layui-layout-left kit-nav">
                <li class="layui-nav-item"><a href="javascript:;">控制台</a></li>
                <li class="layui-nav-item"><a href="javascript:;">商品管理</a></li>
                <li class="layui-nav-item">
                    <a href="javascript:;">其它系统</a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;">邮件管理</a></dd>
                        <dd><a href="javascript:;">消息管理</a></dd>
                        <dd><a href="javascript:;">授权管理</a></dd>
                    </dl>
                </li>
            </ul>
            <ul class="layui-nav layui-layout-right kit-nav">
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <i class="layui-icon">&#xe63f;</i> 皮肤
                    </a>
                    <dl class="layui-nav-child skin">
                        <dd>
                            <a href="javascript:;" data-skin="default" style="color:#009688">
                                <i class="layui-icon">&#xe658;</i>
                                默认
                            </a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-skin="orange" style="color:#ff6700;">
                                <i class="layui-icon">&#xe658;</i>
                                橘子橙
                            </a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-skin="green" style="color:#00a65a;">
                            <i class="layui-icon">&#xe658;</i>
                            原谅绿
                            </a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-skin="pink" style="color:#FA6086;">
                                <i class="layui-icon">&#xe658;</i>
                                少女粉
                            </a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-skin="blue" style="color:#00c0ef;">
                            <i class="layui-icon">&#xe658;</i>
                            天空蓝
                            </a>
                        </dd>
                        <dd>
                            <a href="javascript:;" data-skin="red" style="color:#dd4b39;">
                            <i class="layui-icon">&#xe658;</i>
                            枫叶红
                            </a>
                        </dd>
                    </dl>
                </li>
                <li class="layui-nav-item">
                    <a href="javascript:;">
                        <img src="http://m.zhengjinfan.cn/images/0.jpg" class="layui-nav-img"> Van
                    </a>
                    <dl class="layui-nav-child">
                        <dd><a href="javascript:;" kit-target data-options="{url:'basic.html',icon:'&#xe658;',title:'基本资料',id:'966'}"><span>基本资料</span></a></dd>
                        <dd><a href="javascript:;">安全设置</a></dd>
                    </dl>
                </li>
                <li class="layui-nav-item"><a href="login.html"><i class="fa fa-sign-out" aria-hidden="true"></i> 注销</a></li>
            </ul>
        </div>
        9999999999999999
        <div class="layui-side layui-bg-black kit-side">
            <div class="layui-side-scroll">
                <div class="kit-side-fold"><i class="fa fa-navicon" aria-hidden="true"></i></div>
                <!-- 左侧导航区域（可配合layui已有的垂直导航） -->

                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item layui-nav-itemed">
                        <a class="" href="javascript:;"><i class="fa fa-cog" aria-hidden="true"></i><span> 基本设置</span></a>
                        <dl class="layui-nav-child">
                        	<dd>
                                <a href="javascript:;" kit-target data-url="seting.html" data-title="系统设置" data-id='1'>
                                    <i class="fa fa-wrench"></i><span> 系统设置</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="moban.html" data-icon="fa-user" data-title="模块列表" kit-target data-id='3'><i class="fa fa-android" aria-hidden="true"></i><span> 模块列表</span></a>
                            </dd>

                        </dl>
                    </li>
                </ul>
                
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-tags" aria-hidden="true"></i><span> 广告设置</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" data-url="banner_list.html" data-icon="fa-user" data-title="广告列表" kit-target data-id='5'>
                                	<i class="fa fa-tag" aria-hidden="true"></i><span> 广告列表</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="banner_add.html" data-icon="fa-user" data-title="添加广告" kit-target data-id='85'>
                                	<i class="fa fa-share-alt" aria-hidden="true"></i><span> 添加广告</span></a>
                            </dd>

                        </dl>
                    </li>
                </ul>
                
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-users" aria-hidden="true"></i><span> 用户管理</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-url="user_list.html" data-title="用户列表" data-id='6'>
                                   <i class="fa fa-address-book"></i><span> 用户列表</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" kit-target data-url="tianjiayonghu.html" data-title="添加用户" data-id='15'>
                                   <i class="fa fa-user-plus"></i><span> 添加用户</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="grade_list.html" data-icon="fa-user" data-title="角色列表" kit-target data-id='7'>
                                	<i class="fa fa-user" aria-hidden="true"></i><span> 角色列表</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" data-url="tianjiajuese.html" data-icon="fa-user" data-title="添加角色" kit-target data-id='16'>
                                	<i class="fa fa-user-plus" aria-hidden="true"></i><span> 添加角色</span></a>
                            </dd>

                        </dl>
                    </li>
                </ul>
                
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-street-view" aria-hidden="true"></i><span> 会员管理</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-url="member_list.html" data-title="会员列表" data-id='8'>
                                    <i class="fa fa-user-circle"></i><span> 会员列表</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" kit-target data-url="" data-title="添加会员" data-id='14'>
                                    <i class="fa fa-user-plus"></i><span> 添加会员</span></a>
                            </dd>

                        </dl>
                    </li>
                </ul>
                
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-phone-square" aria-hidden="true"></i><span> 预约管理</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-url="message.html" data-title="预约列表" data-id='9'>
                                    <i class="fa fa-phone"></i><span> 预约列表</span></a>
                            </dd>

                        </dl>
                    </li>
                </ul>
                
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-sitemap" aria-hidden="true"></i><span> 分类管理</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-url="fenlei.html" data-title="分类列表" data-id='10'>
                                    <i class="fa fa-list-ol"></i><span> 分类列表</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" kit-target data-url="" id="fenlei" data-title="添加分类" data-id='36'>
                                    <i class="fa fa-list-ul"></i><span> 添加分类</span></a>
                            </dd>
                        </dl>
                    </li>
                </ul>
                
                <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-file-text" aria-hidden="true"></i><span> 文章管理</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-url="Article.html" data-title="文章列表" data-id='11'>
                                    <i class="fa fa-bold"></i><span> 文章列表</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" kit-target data-url="wenzhang.html" data-title="添加文章" data-id='12'>
                                    <i class="fa fa-italic"></i><span> 添加文章</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" kit-target data-url="" data-title="添加分类" data-id='13'>
                                    <i class="fa fa-font"></i><span> 添加分类</span></a>
                            </dd>

                        </dl>
                    </li>
                </ul>
                
                 <ul class="layui-nav layui-nav-tree" lay-filter="kitNavbar" kit-navbar>
                    <li class="layui-nav-item">
                        <a class="" href="javascript:;"><i class="fa fa-upload" aria-hidden="true"></i><span> 数据库管理</span></a>
                        <dl class="layui-nav-child">
                            <dd>
                                <a href="javascript:;" kit-target data-url="shujuku.html" data-title="数据库列表" data-id='2'>
                                    <i class="fa fa-tasks"></i><span> 数据库列表</span></a>
                            </dd>
							<dd>
                                <a href="javascript:;" kit-target data-url="" data-title="备份数据库" data-id='32'>
                                    <i class="fa fa-save"></i><span> 备份数据库</span></a>
                            </dd>
                            <dd>
                                <a href="javascript:;" kit-target data-url="" data-title="优化数据库" data-id='49'>
                                    <i class="fa fa-tint"></i><span> 优化数据库</span></a>
                            </dd><dd>
                                <a href="javascript:;" kit-target data-url="" data-title="修复数据库" data-id='76'>
                                    <i class="fa fa-wrench"></i><span> 修复数据库</span></a>
                            </dd>
                        </dl>
                    </li>
                </ul>
                
            </div>
        </div>
        <div class="layui-body" id="container">
            <!-- 内容主体区域 -->
            <div style="padding: 15px;">
                <i class="layui-icon layui-anim layui-anim-rotate layui-anim-loop">&#xe63e;</i>
                请稍等...
            </div>
        </div>

        <div class="layui-footer">
            <!-- 底部固定区域 -->
            2018 &copy;
            <a href="http://www.aqphp.com/" target="_blank">www.aqphp.com</a>
        </div>
    </div>
   
    <?php echo '<script'; ?>
 src="static/common/layui/layui.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        var message;
        layui.config({
            base: 'static/mancen/js/',
            version: '1.0.1'
        }).use(['app', 'message'], function() {
            var app = layui.app,
                $ = layui.jquery,
                layer = layui.layer;
            //将message设置为全局以便子页面调用
            message = layui.message;
            //主入口
            app.set({
                type: 'iframe'
            }).init();

			
			$("#fenlei").click(function()
				{
					//添加弹框
					layer.open({
					  	type: 2,  //iframe
					  	title: '添加分类',
					  	shadeClose: true,
					  	shade: 0.8,
					 	area: ['355px', '41%'],         //弹框默认宽高
					  	content: 'tianjiafenlei.html',  //iframe的url
						resize:true						//允许窗口拉伸
					}); 
				});
			
            $('dl.skin > dd').on('click', function() {
                var $that = $(this);
                var skin = $that.children('a').data('skin');
                switchSkin(skin);
            });
            var setSkin = function(value) {
                    layui.data('kit_skin', {
                        key: 'skin',
                        value: value
                    });
                },
                getSkinName = function() {
                    return layui.data('kit_skin').skin;
                },
                switchSkin = function(value) {
                    var _target = $('link[kit-skin]')[0];
                    _target.href = _target.href.substring(0, _target.href.lastIndexOf('/') + 1) + value + _target.href.substring(_target.href.lastIndexOf('.'));
                    setSkin(value);
                },
                initSkin = function() {
                    var skin = getSkinName();
                    switchSkin(skin === undefined ? 'default' : skin);
                }();
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
