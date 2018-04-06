<html>
    <head>
        <title>错误调试页面</title>
     	<style>
             *{padding:0px;margin:0px;}
             body{margin:20px;}
             #DeBug{width:880px;border:1px solid #dcdcdc;margin-top:20px;padding:10px;}
             fieldset{padding:10px;font-size:14px;}
             legend{padding:5px;}
             p{background-color:#666;font-size:12px;color:#fff;margin-top:10px;padding:3px;}
        </style>
    </head>
    <body>
        <div id="DeBug">
            <h2>DEBUG</h2>
            
            <?php if(isset($e['message'])){ ?>
            <fieldset>
            	<legend>ERROR</legend>
            	<?php echo $e['message'];?>
            </fieldset>
            <?php }?>
            
            <?php if(isset($e['info'])){ ?>
            <fieldset>
            	<legend>TRACE</legend>
            	<?php echo $e['info'];?>
            </fieldset>
            <?php }?>
            
        </div>
    </body>
</html>