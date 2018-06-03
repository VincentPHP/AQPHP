<?php
/* Smarty version 3.1.30, created on 2018-04-19 17:32:55
  from "E:\PhpStorm Workspace\AQPHP Framework\framework\resource\view\Error.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad86247b5c856_92022193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c889dd0a53a59b6eefaf2c3849606cb277a24fa' => 
    array (
      0 => 'E:\\PhpStorm Workspace\\AQPHP Framework\\framework\\resource\\view\\Error.tpl',
      1 => 1523024448,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad86247b5c856_92022193 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title><?php echo $_smarty_tpl->tpl_vars['data']->value['msg'];?>
</title>
		<style type="text/css">
			*{padding:0px;margin: 0px;}
			.Div{
				width: 580px;
				border:1px solid #dcdcdc;
				padding: 10px;
				margin:20px;
				background-color: #fff;
				}
			#Msg{
				padding-left:20px;
				padding-right:20px; 
				font-size: 16px;
				height:40px;
				line-height: 40px;
				text-align: center;
				background-color:#666;
				color: #FFFFFF;
				float: left;
				margin-right:10px;
				}
			fieldset{
				font-size: 14px;
				padding: 10px;
				}
			legend{padding: 5px;}
			.Location{
				width: 100px;
				height: 40px;
				float: left;
				margin-left: 10px;
				background-color: #666;
				font-size:16px;
				text-align: center;
				line-height:40px; 
				}
			.Location a{
				width: 100px;
				height: 40px;
				display: block;
				text-decoration: none;
				color: #fff;
				}
			.Location a:hover{
				color: #FFF;
				background-color:#000000;
			}			 
		</style>
	</head>
	<body>
		<div class="Div">
			<h2><?php echo $_smarty_tpl->tpl_vars['data']->value['msg'];?>
</h2>
			<fieldset>
				<legend>ERROR</legend>
				<div id="Msg"></div>
				<div class="Location">
					<a href="<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
">立即转跳</a>
				</div>
			</fieldset>
		</div>	
	</body>
	<?php echo '<script'; ?>
>
		window.onload = function()
		{
			var Time = <?php echo $_smarty_tpl->tpl_vars['data']->value['time'];?>
; //设置时间[秒]
			var Message = document.getElementById('Msg');
			
			Message.innerHTML = '['+Time+']秒后跳转！'; //初始化显示秒数
		
			Time = Time-1;
			
			var G = window.setInterval(function ()
			{	
				if(Time<0)
				{
					window.clearTimeout(G); //清除动画
					window.location.href="<?php echo $_smarty_tpl->tpl_vars['data']->value['url'];?>
";//跳转地址
				}
				else
				{
					showTime();
				}
				
			}, 1000);
			
			function showTime()
			{
				Message.innerHTML = '['+Time+']秒后跳转！';
				Time--;
			}
		}
	<?php echo '</script'; ?>
>
</html><?php }
}
