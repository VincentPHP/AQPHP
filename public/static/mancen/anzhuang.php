<?php
	$filename1 = "/";
	$filename2 = "/plus/*";
	$filename3 = "/dede/*";
	$filename4 = "/data/*";
	$filename5 = "/a/*";
	$filename6 = "/install";
	$filename7 = "/special";
	$filename8 = "/uploads/*";
	if(is_readable($filename1)){
		$fr1 = "[√]读";
		if(is_writable($filename1)){
			$fw1 = "[√]写";
		}else{
			$fw1 = "[×]不可写";
		}
	}else{
		$fr1 = "[×]不可读";
		if(is_writable($filename1)){
			$fw1 = "[√]写";
		}else{
			$fw1 = "[×]不可写";
		}
	}
	
	if(is_readable($filename2)){
		$fr2 = "[√]读";
		if(is_writable($filename2)){
			$fw2 = "[√]写";
		}else{
			$fw2 = "[×]不可写";
		}
	}else{
		$fr2 = "[×]不可读";
		if(is_writable($filename2)){
			$fw2 = "[√]写";
		}else{
			$fw2 = "[×]不可写";
		}
	}
	if(is_readable($filename3)){
		$fr3 = "[√]读";
		if(is_writable($filename3)){
			$fw3 = "[√]写";
		}else{
			$fw3 = "[×]不可写";
		}
	}else{
		$fr3 = "[×]不可读";
		if(is_writable($filename3)){
			$fw3 = "[√]写";
		}else{
			$fw3 = "[×]不可写";
		}
	}
	if(is_readable($filename4)){
		$fr4 = "[√]读";
		if(is_writable($filename4)){
			$fw4 = "[√]写";
		}else{
			$fw4 = "[×]不可写";
		}
	}else{
		$fr4 = "[×]不可读";
		if(is_writable($filename4)){
			$fw4 = "[√]写";
		}else{
			$fw4 = "[×]不可写";
		}
	}
	if(is_readable($filename5)){
		$fr5 = "[√]读";
		if(is_writable($filename5)){
			$fw5 = "[√]写";
		}else{
			$fw5 = "[×]不可写";
		}
	}else{
		$fr5 = "[×]不可读";
		if(is_writable($filename5)){
			$fw5 = "[√]写";
		}else{
			$fw5 = "[×]不可写";
		}
	}
	if(is_readable($filename6)){
		$fr6 = "[√]读";
		if(is_writable($filename6)){
			$fw6 = "[√]写";
		}else{
			$fw6 = "[×]不可写";
		}
	}else{
		$fr6 = "[×]不可读";
		if(is_writable($filename6)){
			$fw6 = "[√]写";
		}else{
			$fw6 = "[×]不可写";
		}
	}
	if(is_readable($filename7)){
		$fr7 = "[√]读";
		if(is_writable($filename7)){
			$f7 = "[√]写";
		}else{
			$fw7 = "[×]不可写";
		}
	}else{
		$fr7 = "[×]不可读";
		if(is_writable($filename7)){
			$fw7 = "[√]写";
		}else{
			$fw7 = "[×]不可写";
		}
	}
	
	if(is_readable($filename8)){
		$fr8 = "[√]读";
		if(is_writable($filename8)){
			$fw8 = "[√]写";
		}else{
			$fw8 = "[×]不可写";
		}
	}else{
		$fr8 = "[×]不可读";
		if(is_writable($filename8)){
			$fw8 = "[√]写";
		}else{
			$fw8 = "[×]不可写";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>齐发CMS安装界面</title>
		<link rel="stylesheet" type="text/css" href="static/common/font-awesome/css/font-awesome.css"/>
		<link rel="stylesheet" href="static/common/layui/css/layui.css" />
		<style type="text/css">
			body{
				background: url(static/mancen/images/login.jpg) no-repeat;
				background-position: center;
				background-attachment: fixed;
			}
			.CMS{
				position: absolute;
				height: 100px;
				width: 685px;
				z-index: 5;
				top: 90px;
				left: 760px;
			}
			.CMS h1{
				font-weight: 600;
				font-size: 40px;
			}
			.body{
				height: 100%;
				width: 100%;
			}
			.box{
				position: absolute;
				height: 545px;
				width: 885px;
				background-color: white;
				left: 528px;
				top: 220px;
				border-radius:10px ;
			}
			.content{
				overflow: auto;
				width: 100%;
				height: 420px;
				border-bottom: 1px solid #D7D7D0;
			}
			.content p{
				margin: 10px;
			}
			.content_bottom{
				width: 885px;
				height: 100px;
				text-align: center;
				line-height: 80px;
			}
			.layui-btn{
				width: 100px;
				height: 40px;
				font-size:18px ;
			}
			.layui-tab-title li{
				border: none;
			}
			.content_left{
				width: 442px;
				height: 420px;
				float: left;
			}
			.content_right{
				width: 442px;
				height: 420px;
				border-left:1px solid #D7D7D0;
				float: left;
			}
			.content table{
				width: 442px;
				height: 170px;
				border: 0px solid transparent;
			}
			.content table th,td{
				border-left:0px solid transparent ;
				border-right:0px solid transparent ;
				
			}
			.content table tr{
				height: 30px;
				text-align: center;
			}
			.layui-field-title{
				margin: 0px;
			}
			.mod{
				width: 100%;
				height: 100px;
			}
			.mod p{
				font-weight: 600;
				margin: 0px;
			}
			.mod span{
				font-size: 12px;
			}
			.layui-checkbox-disbaled[lay-skin="primary"] span{
				color: black;
				font-size: 12px;
			}
			.content_box{
				height: 220px;
				width: 100%;
			}
			.content_box_small{
				height: 28px;
				width: 100%;
			}
			.content_box_small span{
				color: white;
				font-size: 12px;
			}
			.content_box_small p{
				font-size: 15px;
				font-weight: 600;
			}
			.layui-tab-item h1{
				text-align: center;
			}
			.center{
				width: 454px;
				margin: auto;
				margin-top: 180px;
			}
			.center .layui-btn{
				margin-left: 170px;
				margin-top: 20px;
			}
			.layui-progress{
				margin: 20px 20px 0px 20px;
			}
			.anzhuang{
				margin: 20px;
				height: 425px;
				width: 845px;
				border: 1px solid #E6E6E6;
			}
			.cover1{
				width: 890px;
				height: 45px;
				position: absolute;
				z-index: 10;
				top: 218px;
				left: 525px;
			}
			.cover1{
				width: 890px;
				height: 45px;
				position: absolute;
				z-index: 10;
				top: 218px;
				left: 525px;
			}
			.cover2{
				width: 100px;
				height: 40px;
				position: absolute;
				z-index: 8;
				top: 703px;
				left: 1019px;
				display: none;
			}
		</style>
	</head>
	<body>
		<div class="cover1"></div>
		<div class="cover2" id="cover"></div>
		<div class="CMS">
			<h1>齐发CMS安装界面</h1>
		</div>
		<div class="body">
			<div class="box">
				<div class="layui-tab" lay-filter="demo">
					<ul class="layui-tab-title" style="margin-top: -10px;">
					    <li lay-id="0" class="layui-this">许可协议</li>
					    <li lay-id="1">环境监测</li>
					    <li lay-id="2">参数配置</li>
					    <li lay-id="3">正在安装</li>
					    <li lay-id="4">安装完成</li>
					</ul>
					<div class="layui-tab-content" style="padding: 0px;">
						<div class="layui-tab-item layui-show">
							<div class="content">
								<p>版权所有 (c)2003-2011，DedeCMS.com 保留所有权利。</p>
								
								<p>感谢您选择织梦内容管理系统（以下简称DedeCMS），DedeCMS是目前国内最强大、最稳定的中小型门户网站建设解决方案之一，基于 PHP + MySQL 的技术开发，全部源码开放。</p>
								
								<p>>DedeCMS 的官方网址是： www.dedecms.com 交流论坛： bbs.dedecms.com</p>
								
								<p>为了使你正确并合法的使用本软件，请你在使用前务必阅读清楚下面的协议条款：</p>
								<p>一、本授权协议适用且仅适用于 DedeCMS 5.x.x 版本，DedeCMS官方对本授权协议的最终解释权。</p>
								<p>二、协议许可的权利</p>
								
								<p>1、您可以在完全遵守本最终用户授权协议的基础上，将本软件应用于非商业用途，而不必支付软件版权授权费用。</p>
								
								<p>2、您可以在协议规定的约束和限制范围内修改 DedeCMS 源代码或界面风格以适应您的网站要求。</p>
								
								<p>3、您拥有使用本软件构建的网站全部内容所有权，并独立承担与这些内容的相关法律义务。</p>
								
								<p>4、获得商业授权之后，您可以将本软件应用于商业用途，同时依据所购买的授权类型中确定的技术支持内容，自购买时刻起，在技术支持期限内拥有通过指定的方式获得指定范围内的技术支持服务。商业授权用户享有反映和提出意见的权力，相关意见将被作为首要考虑，但没有一定被采纳的承诺或保证。</p>
								<p>二、协议规定的约束和限制</p>
								
								<p>1、未获商业授权之前，不得将本软件用于商业用途（包括但不限于企业网站、经营性网站、以营利为目的或实现盈利的网站）。购买商业授权请登陆 bbs.dedecms.com 了解最新说明。</p>
								
								<p>2、未经官方许可，不得对本软件或与之关联的商业授权进行出租、出售、抵押或发放子许可证。</p>
								
								<p>3、不管你的网站是否整体使用 DedeCMS ，还是部份栏目使用 DedeCMS，在你使用了 DedeCMS 的网站主页上必须加上 DedeCMS 官方网址(www.dedecms.com)的链接。</p>
								
								<p>4、未经官方许可，禁止在 DedeCMS 的整体或任何部分基础上以发展任何派生版本、修改版本或第三方版本用于重新分发。</p>
								
								<p>5、如果您未能遵守本协议的条款，您的授权将被终止，所被许可的权利将被收回，并承担相应法律责任。</p>
								<p>三、有限担保和免责声明</p>
								
								<p>1、本软件及所附带的文件是作为不提供任何明确的或隐含的赔偿或担保的形式提供的。</p>
								
								<p>2、用户出于自愿而使用本软件，您必须了解使用本软件的风险，在尚未购买产品技术服务之前，我们不承诺对免费用户提供任何形式的技术支持、使用担保，也不承担任何因使用本软件而产生问题的相关责任。</p>
								
								<p>3、电子文本形式的授权协议如同双方书面签署的协议一样，具有完全的和等同的法律效力。您一旦开始确认本协议并安装 DedeCMS，即被视为完全理解并接受本协议的各项条款，在享有上述条款授予的权力的同时，受到相关的约束和限制。协议许可范围以外的行为，将直接违反本授权协议并构成侵权，我们有权随时终止授权，责令停止损害，并保留追究相关责任的权力。</p>
								
								<p>4、如果本软件带有其它软件的整合API示范例子包，这些文件版权不属于本软件官方，并且这些文件是没经过授权发布的，请参考相关软件的使用许可合法的使用。</p>
								
								<p>协议发布时间： 2008年1月18日</p>
								
								<p>版本最新更新： 2011年2月21日 By DedeCMS.com</p>
							</div>
							
							<div class="layui-form layui-form-pane">
								<div class="content_bottom">
										<input type="checkbox" id="ty" lay-skin="primary" title="我已阅读并同意此协议">
									 	<button class="layui-btn site-demo-active" data-type="huanjing" style="background: #CDCDCD;" >同意</button>
								</div>
							</div>
					    </div>
					    
					    <div class="layui-tab-item">
							<div class="content">
								<div class="content_left">
									<fieldset class="layui-elem-field layui-field-title">
										<legend>服务器信息</legend>
									</fieldset>
									<table border="1" cellspacing="0" cellpadding="1">
										<tr>
											<th>参数</th>
											<th style="width: 100px;">&nbsp;</th>
											<th>值</th>
										</tr>
										<tr>
											<th>服务器域名</th>
											<th>&nbsp;</th>
											<th>localhost</th>
										</tr>
										<tr>
											<th>服务器操作系统</th>
											<th>&nbsp;</th>
											<th>WINNT</th>
										</tr>
										<tr>
											<th>服务器解译引擎</th>
											<th>&nbsp;</th>
											<th>Apache/2.4.27 (Win64) PHP/5.6.31</th>
										</tr>
										<tr>
											<th>PHP版本</th>
											<th>&nbsp;</th>
											<th>5.6.31</th>
										</tr>
										<tr>
											<th>系统安装目录</th>
											<th>&nbsp;</th>
											<th>E:\wamp64\www</th>
										</tr>
									</table>
									<fieldset class="layui-elem-field layui-field-title">
										<legend>系统环境监测</legend>
									</fieldset>
									<table border="1" cellspacing="0" cellpadding="1">
										<tr>
											<th style="width: 140px;">需开启的变量或函数</th>
											<th style="width: 50px;">要求</th>
											<th>实际状态及建议</th>
										</tr>
										<tr>
											<td>allow_url_fopen</td>
											<td>On</td>
											<td>[√]On (不符合要求将导致采集、远程资料本地化等功能无法应用)</td>
										</tr>
										<tr>
											<td>safe_mode</td>
											<td>Off</td>
											<td>[√]Off (本系统不支持在非win主机的安全模式下运行)</td>
										</tr>
										<tr>
											<td>GD 支持</td>
											<td>On</td>
											<td>[√]On (不支持将导致与图片相关的大多数功能无法使用或引发警告)</td>
										</tr>
										<tr>
											<td>MySQL 支持</td>
											<td>On</td>
											<td>[√]On (不支持无法使用本系统)</td>
										</tr>
									</table>
								</div>
								<div class="content_right">
									<fieldset class="layui-elem-field layui-field-title" style="margin-top: 50px;">
										<legend>目录权限监测</legend>
									</fieldset>
									<table border="1" cellspacing="0" cellpadding="1">
										<tr>
											<th style="width: 140px;">目录名</th>
											<th style="width: 50px;">读取权限</th>
											<th>写入权限</th>
										</tr>
										<tr>
											<td>/</td>
											<td><?php echo $fr1; ?></td>
											<td><?php echo $fw1; ?></td>
										</tr>
										<tr>
											<td>/plus/*</td>
											<td><?php echo $fr2; ?></td>
											<td><?php echo $fw2; ?></td>
										</tr>
										<tr>
											<td>/dede/*</td>
											<td><?php echo $fr3; ?></td>
											<td><?php echo $fw3; ?></td>
										</tr>
										<tr>
											<td>/data/*</td>
											<td><?php echo $fr4; ?></td>
											<td><?php echo $fw4; ?></td>
										</tr>
										<tr>
											<td>/a/*</td>
											<td><?php echo $fr5; ?></td>
											<td><?php echo $fw5; ?></td>
										</tr>
										<tr>
											<td>/install</td>
											<td><?php echo $fr6; ?></td>
											<td><?php echo $fw6; ?></td>
										</tr>
										<tr>
											<td>/special</td>
											<td><?php echo $fr7; ?></td>
											<td><?php echo $fw7; ?></td>
										</tr>
										<tr>
											<td>/uploads/*</td>
											<td><?php echo $fr8; ?></td>
											<td><?php echo $fw8; ?></td>
										</tr>
									</table>
								</div>
							</div>
								<div class="content_bottom">
									<button class="layui-btn layui-btn-danger site-demo-active" data-type="xieyi">返回</button>
									<button class="layui-btn site-demo-active" data-type="canshu">下一步</button>
								</div>
					    </div>
					    
					    <div class="layui-tab-item">
					    	<div class="content">
									<fieldset class="layui-elem-field layui-field-title">
										<legend>模块选择</legend>
									</fieldset>
									<div class="mod">
										<p>默认已安装模块(不需要可在后台卸载)：</p>
										<span>百度新闻、文件管理器、挑错管理、德得广告管理、投票模块、友情链接</span>
										<p>已下载并可选安装的：（不能选中的为未下载）</p>
										<form class="layui-form layui-form-pane" action="">
											<input lay-skin="primary" title="留言簿模块" disabled="" type="checkbox">
											<input lay-skin="primary" title="手机WAP浏览" disabled="" type="checkbox">
											<input lay-skin="primary" title="圈子模块" disabled="" type="checkbox">
											<input lay-skin="primary" title="小说模块" disabled="" type="checkbox">
										</form>
									</div>
									<fieldset class="layui-elem-field layui-field-title">
										<legend>数据库设定</legend>
									</fieldset>
									<div class="content_box">
										<div class="content_box_small">
											<p>
												数据库类型：<select name="interest">
															<option value="1">MySQL</option>
															<option value="2">SQLite</option>
														</select>
												<span>一般为MySQL，SQLite仅用于开发调试不建议生产中使用</span>
											</p>
											<p>
												数据库主机：<input type="text" value="localhost"/>
												<span>一般为localhost</span>
											</p>
											<p>
												数据库用户：<input type="text" value="root"/>
											</p>
											<p>
												数据库密码：<input type="text" value="dede_"/>
											</p>
											<p>
												数据表前缀：<input type="text" value="dedecmsv57utf8sp2"/>
												<span>如无特殊需要,请不要修改</span>
											</p>
											<p>
												数据库名称：<input type="text"/>
											</p>
											<p>
												数据库编码：<input checked="" type="radio">&nbsp;UTF-8
												<span>仅对4.1+以上版本的MySql选择</span>
											</p>
										</div>
									</div>
									<fieldset class="layui-elem-field layui-field-title">
										<legend>管理员初始密码</legend>
									</fieldset>
									<div class="content_box" style="height: 90px;">
										<div class="content_box_small">
											<p>
												用户名 ：<input type="text" value="admin"/>
												<span>只能用'0-9'、'a-z'、'A-Z'、'.'、'@'、'_'、'-'、'!'以内范围的字符</span>
											</p>
											<p>
												密码 ：<input type="text" value="admin"/>
											</p>
											<p>
												Cookie加密码 ：<input type="text" value="et3AyICqIKgMrDD2lUMLdfQ4l1UNXWhW"/>
											</p>
										</div>
									</div>
									<fieldset class="layui-elem-field layui-field-title">
										<legend>网站设置</legend>
									</fieldset>
									<div class="content_box" style="height: 110px;">
										<div class="content_box_small">
											<p>
												网站名称 ：<input type="text" value="我的网站"/>
											</p>
											<p>
												管理员邮箱 ：<input type="text" value="admin@dedecms.com"/>
											</p>
											<p>
												网站网址 ：<input type="text" value="http://localhost"/>
											</p>
											<p>
												CMS安装目录 ：<input type="text"/>
												<span>在根安装目录时不必理会</span>
											</p>
										</div>
									</div>
							</div>
								<div class="content_bottom">
									<button class="layui-btn layui-btn-danger site-demo-active" data-type="huanjing">返回</button>
									<button class="layui-btn site-demo-active" data-type="anzhuang">下一步</button>
								</div>
					    </div>
					    
					    <div class="layui-tab-item">
					    	<div class="layui-progress layui-progress-big" lay-showpercent="true">
								<div class="layui-progress-bar" lay-percent="70%"></div>
							</div>
							
							<div class="anzhuang">
								
							</div>
					    </div>
					    
					    <div class="layui-tab-item">
					    	<div class="center">
					    		<h1>已成功安装VLENTS.CMS后台系统，感谢您的使用!</h1>
					    		<button class="layui-btn">完成</button>
					    	</div>
					    </div>
					</div>
				</div>
			</div>
		</div>
	</body>
	<script type="text/javascript" src="static/common/layui/layui.all.js" charset="utf-8"></script>
	<script type="text/javascript">
		layui.use('element', function(){
			var $ = layui.jquery
			,element = layui.element; //Tab的切换功能，切换事件监听等，需要依赖element模块
		  
			//触发事件
			var active = {
				xieyi: function(){
					//切换到指定Tab项
					element.tabChange('demo', '0');
				}
				,huanjing: function(){
					//切换到指定Tab项
					element.tabChange('demo', '1');
				}
				,canshu: function(){
					//切换到指定Tab项
					element.tabChange('demo', '2');
				}
				,anzhuang: function(){
					//切换到指定Tab项
					element.tabChange('demo', '3');
				}
			};
		  
			$('.site-demo-active').on('click', function(){
				var othis = $(this), 
				type = othis.data('type');
				active[type] ? active[type].call(this, othis) : '';
			});
		
		});
		
		document.getElementById("ty").addEventListener("click",agree);
		function agree(){
			alert('jdak');
		}
	  	
	  	
	</script>
</html>
