<?php
/* Smarty version 3.1.30, created on 2018-04-20 16:59:13
  from "E:\PhpStorm Workspace\AQPHP Framework\app\templete\mancen\Index\main.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad9abe1c63969_98200483',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '865b45523de26b1ccfbb68c9199ada1d2091c073' => 
    array (
      0 => 'E:\\PhpStorm Workspace\\AQPHP Framework\\app\\templete\\mancen\\Index\\main.html',
      1 => 1515739044,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ad9abe1c63969_98200483 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="static/common/layui/css/layui.css" media="all">
    <link rel="stylesheet" href="static/common/font-awesome/css/font-awesome.min.css" media="all">
    <style>
        .info-box {
            height: 85px;
            background-color: white;
            background-color: #ecf0f5;
        }
        
        .info-box .info-box-icon {
            border-top-left-radius: 2px;
            border-top-right-radius: 0;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 2px;
            display: block;
            float: left;
            height: 85px;
            width: 85px;
            text-align: center;
            font-size: 45px;
            line-height: 85px;
            background: rgba(0, 0, 0, 0.2);
        }
        
        .info-box .info-box-content {
            padding: 5px 10px;
            margin-left: 85px;
        }
        
        .info-box .info-box-content .info-box-text {
            display: block;
            font-size: 14px;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-transform: uppercase;
        }
        
        .info-box .info-box-content .info-box-number {
            display: block;
            font-weight: bold;
            font-size: 18px;
        }
        
        .major {
            font-weight: 10px;
            color: #01AAED;
        }
          
        .main .layui-row {
            margin: 10px 0;
        }
        .layui-collapse{
        	width: 829px;
        }
        .left{
        	width: 830px;
        	margin-left: 22px;
        	float: left;
        }
        .right{
        	width: 830px;
        	margin-left: 16px;
        	float: left;
        }
    </style>
</head>

<body>
    <div class="layui-fluid main">
        <div class="layui-row layui-col-space15">
            <div class="layui-col-md3">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color:#00c0ef !important;color:white;"><i class="fa fa-ambulance" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">CPU Traffic</span>
                        <span class="info-box-number">90%</span>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color:#dd4b39 !important;color:white;"><i class="fa fa-google-plus" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Likes</span>
                        <span class="info-box-number">25,412</span>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color:#00a65a !important;color:white;"><i class="fa fa-shopping-bag" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number">654</span>
                    </div>
                </div>
            </div>
            <div class="layui-col-md3">
                <div class="info-box">
                    <span class="info-box-icon" style="background-color:#f39c12 !important;color:white;"><i class="fa fa-users" aria-hidden="true"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">New Members</span>
                        <span class="info-box-number">85</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="left">
		<div class="layui-collapse" lay-filter="test">
			<div class="layui-colla-item">
			    <h2 class="layui-colla-title">更新历史</h2>
			    <div class="layui-colla-content layui-show">
			    	<ul class="layui-timeline">
					  <li class="layui-timeline-item">
					    <i class="layui-icon layui-timeline-axis"></i>
					    <div class="layui-timeline-content layui-text">
					      <h3 class="layui-timeline-title">12月25日</h3>
					      <p>
							今天是那位大人的生日
					        <br>可是，却没有几个人记得。。。
					        <br>但正因为是那位大人，才会原谅这一切吧
					      </p>
					    </div>
					  </li>
					  <li class="layui-timeline-item">
					    <i class="layui-icon layui-timeline-axis"></i>
					    <div class="layui-timeline-content layui-text">
					      <h3 class="layui-timeline-title">1953年</h3>
					      <p>电闪雷鸣，倾盆暴雨，4只头带黑框眼镜，腰系黑色皮带的蛤从天而降。
					      	<br />真是太暴力了！他们挥舞着手中的膜法棒，所到之处，百花齐放，晴空万里！一切坏人坏事全部消失殆尽。
					      	<br />而蛤们的头上正飞速的+1s的字样
					      	<br />天空则回荡着林则徐的那首诗。
					      </p>
					      <ul>
					        <li><em>苟利国家生死以，不因祸福避趋之。</em></li>
					      </ul>
					    </div>
					  </li>
					  <li class="layui-timeline-item">
					    <i class="layui-icon layui-timeline-axis"></i>
					    <div class="layui-timeline-content layui-text">
					      <h3 class="layui-timeline-title">他来了！</h3>
					      <p>
					 		美利坚和众国国旗！那哲学的身姿！那伟岸的身躯！
					        <br>他可能会迟到，但从不缺席！
					        <br>他来了！他回来了！
					        <br>那个象征着自由与正义的男人回来了！
					      </p>
					    </div>
					  </li>
					  <li class="layui-timeline-item">
					    <i class="layui-icon layui-timeline-axis"></i>
					    <div class="layui-timeline-content layui-text">
					      <div class="layui-timeline-title">
					      	<p>
					      		过去？不！我们向往着未来！向往着自由！这是通向胜利的伟岸！执行正义的讴歌！正义或许会迟到，但绝不会缺席！
					      		<br />邪恶将被埋葬。光明将照亮所有黑暗，为世间带来永恒的希望！
					      	</p>
					      </div>
					    </div>
					  </li>
					</ul>
			    </div>
			</div>
		</div>
	</div>
    
	<div class="right">
		<div class="layui-collapse" lay-filter="test">
			<div class="layui-colla-item">
			    <h2 class="layui-colla-title">系统公告</h2>
			    <div class="layui-colla-content layui-show">
			    	<blockquote class="layui-elem-quote layui-quote-nm">
						我他喵的没说过这句话。
						<br />——鲁迅
						<br />
						<br />
						你好，我是英国人，初来日本，请多。。。。。抱歉，打扰了！
						<br />——牛顿
						<br />
						<br />
						我就是要叫紫妈怎么了，有本事她把我脸往键盘上njfsgyrgiusoidh
						<br />——蕾米莉亚
						<br />
						<br />
						被萌死戳打到就可以不用玩这游戏了。
						<br />——一位会打嗝的先哲
						<br />
						<br />
						啊~~~~我的王之力啊~~~~
						<br />——别在意名字，为王的诞生献上礼炮吧！
					</blockquote>
			    </div>
			</div>
		</div>
		
		<div class="layui-collapse" lay-filter="test" style="margin-top: 15px;">
			<div class="layui-colla-item">
			    <h2 class="layui-colla-title">自行添加</h2>
			    <div class="layui-colla-content layui-show">
			    	
			    </div>
			</div>
		</div>
	</div>
	
	
    <?php echo '<script'; ?>
 src="static/common/layui/layui.all.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
>
        layui.use('jquery', function() {
            var $ = layui.jquery;
            $('#test').on('click', function() {
                parent.message.show({
                    skin: 'cyan'
                });
            });
        });
    <?php echo '</script'; ?>
>
</body>

</html><?php }
}
