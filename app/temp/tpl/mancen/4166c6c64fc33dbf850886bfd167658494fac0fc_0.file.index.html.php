<?php
/* Smarty version 3.1.30, created on 2018-05-15 17:54:34
  from "E:\PhpStorm Workspace\AQPHP Framework\app\templete\mancen\Login\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5afaae5a87b830_01845896',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4166c6c64fc33dbf850886bfd167658494fac0fc' => 
    array (
      0 => 'E:\\PhpStorm Workspace\\AQPHP Framework\\app\\templete\\mancen\\Login\\index.html',
      1 => 1526378057,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5afaae5a87b830_01845896 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width" />
    <title>齐发CMS - 基于Web的通用管理系统轻量级解决方案</title>
    <meta name="keywords" content="vlents,齐发CMS官网,齐发CMS下载,齐发CMS框架,轻量级开发框架,通用后台管理系统">
    <meta name="description" content="齐发CMS是一款基于Web的通用管理系统轻量级解决方案">
    <link href="static/common/layui/css/layui.css" rel="stylesheet" />
    <link href="static/mancen/css/login.css" rel="stylesheet" />
    <link href="static/mancen/css/animate.css" rel="stylesheet" />

</head>
<body>
    <div class="elight-product-box animated fadeInUp">
        <h2>齐发CMS通用管理系统轻量级解决方案</h2>
        <ul class="product-desc">
            <li>齐发CMS是一套基于 PHP 7.2 + Layui 开发的通用管理系统快速开发框架。</li>
            <li>系统操作界面简洁，项目结构清晰，功能模块化设计，支撑框架轻量高效。</li>
            <li>目前完成框架搭建和实现基础功能，代码层级分离，注释完整，可快速重构，提高开发效率。</li>
            <li>支持SQL Server、SQL Server CE、MySQL、PostgreSQL和Oracle等多种数据库类型。</li>
            <li>该解决方案适用于OA、电商平台、CRM、物流管理、教务管理等各类管理系统开发。</li>
            <li>兼容除IE8以下所有浏览器，暂不支持移动端，后续会支持以及添加更多功能。</li>
            <li>演示用户名：admin 密码：6个0，该演示系统基于云虚拟机，体验效果可能不佳，还请见谅。</li>
        </ul>
        <div class="product-btns">
            <a class="layui-btn layui-btn-small" target="_blank" href="#">
                <i class="layui-icon">&#xe609;</i>&nbsp;框架介绍
            </a>
            <a class="layui-btn layui-btn-warm layui-btn-small" target="_blank" href="https://github.com/VincentPHP/AQPHP">
                <i class="layui-icon">&#xe601;</i>&nbsp;贡献代码
            </a>
            <a class="layui-btn layui-btn-danger layui-btn-small" target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=847623251&site=qq&menu=yes">
                <i class="layui-icon">&#xe606;</i>&nbsp;联系技术
            </a>
        </div>
    </div>
    <div class="elight-login-box animated fadeInRight">
        <div class="elight-login-header">齐发CMS - 后台管理系统</div>
        <div class="elight-login-body">
            <form class="layui-form">
                <div class="layui-form-item">
                    <label class="login-icon"><i class="layui-icon">&#xe612;</i></label>
                    <input type="text" name="email" lay-verify="required" autocomplete="off" placeholder="账号/已认证邮箱" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <label class="login-icon">
                        <i class="layui-icon">&#xe642;</i>
                    </label>
                    <input type="password" name="password" lay-verify="required" autocomplete="off" placeholder="登陆密码" class="layui-input">
                </div>
                <div class="layui-form-item">
                    <div class="login-code-box">
                        <label class="login-icon"><i class="layui-icon">&#xe62d;</i></label>
                        <input type="text" name="verifycode" lay-verify="required" autocomplete="off" placeholder="验证码" class="layui-input">
                        <img id="verify" height="34" src="?m=mancen&c=Login&a=verify" title="点击更换验证码">
                    </div>
                    <input class="elight-pull-right" type="checkbox" lay-skin="primary" name="isSaveAccount" value="true" title="记住账号" />
                </div>
                <div class="layui-form-item">
                    <button class="layui-btn btn-submit" lay-submit lay-filter="login">立即登录</button>
                </div>
            </form>
        </div>
        <div class="elight-login-fooder"></div>
    </div>
</body>
</html>

<?php echo '<script'; ?>
 src="static/common/layui/layui.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
    layui.use(['layer', 'form','jquery'], function ()
    {
        var $ = layui.jquery,
            layer = layui.layer,
            form = layui.form;

        form.on('submit(login)', function (data)
        {
            $(".btn-submit").html("正在登录...");
            $(".btn-submit").attr('disabled', true).addClass('layui-disabled');
            $.ajax({
                url: "?m=mancen&c=Login&a=index",
                data: data.field,
                type: "post",
                dataType: "json",
                success: function (result) {

                    if (result.state == 1) {

                        $(".btn-submit").html("登录成功，跳转中...");

                        setTimeout(function()
                        {
                            location.href=result.url;
                        }, 1500);

                    } else {

                        $(".btn-submit").html("立即登录");
                        $(".btn-submit").attr('disabled', false).removeClass('layui-disabled');
                        $("#verifyCode").trigger('click');
                        layer.msg(result.msg, result.state);
                    }
                }
            });
            return false;
        });

        $("#verify").click(function ()
        {
            $(this).attr("src", "?m=mancen&c=Login&a=verify&r=" + Math.random());
        });
    });
<?php echo '</script'; ?>
><?php }
}
