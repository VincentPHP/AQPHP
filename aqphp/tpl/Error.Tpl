<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>{{$data['msg']}}</title>
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
			<h2>{{$data['msg']}}</h2>
			<fieldset>
				<legend>ERROR</legend>
				<div id="Msg"></div>
				<div class="Location">
					<a href="{{$data['url']}}">立即转跳</a>
				</div>
			</fieldset>
		</div>	
	</body>
	<script>
		window.onload = function()
		{
			var Time = {{$data['time']}}; //设置时间[秒]
			var Message = document.getElementById('Msg');
			
			Message.innerHTML = '['+Time+']秒后跳转！'; //初始化显示秒数
		
			Time = Time-1;
			
			var G = window.setInterval(function ()
			{	
				if(Time<0)
				{
					window.clearTimeout(G); //清除动画
					window.location.href="{{$data['url']}}";//跳转地址 
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
	</script>
</html>