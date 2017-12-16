<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

/**
 * 框架初始化
 */
function start()
{   
    $files = require_once PHP_PATH . '/common/LoadFiles.php';
 
    foreach ($files as $v)
    {
		if(is_file($v))	require $v;
    }
    
    config(require PHP_PATH . '/core/etc/Init.Config.php'); //框架常规配置项

    createDir();

    $data = '';
    foreach($files as $v)
    {
       $data .= DelSpace($v);
    }
	
    $data = '<?php'.$data."config(require PHP_PATH.'/core/etc/Init.Config.php'); ?>";
   
    file_put_contents(TEMP_PATH.'/Bootstrap.php', $data);//生成运行代码总和文件
    
    $moduleDir = MODULE_PATH.'/'.config('DEFAULT_MODULE');//默认模块路径
    
    if(!is_dir($moduleDir))
    {
        welcome();//框架演示函数
    }
}


/**
 * 创建演示控制器器及欢迎页面
 */
function welcome()
{
    $defaultModule  = MODULE_PATH.'/'.config('DEFAULT_MODULE');  //组合默认模块
    $defaultControl = config('DEFAULT_CONTROL').config('CONTROL_FIX');//组合默认控制器
    $defaultAction  = config('DEFAULT_ACTION');     //默认方法
    $actionDir      = ucfirst($defaultAction); //获取路径
    
$code[0] = <<<CODE
<?php
namespace home\controller;
use aqphp\core\controller;

class $defaultControl extends Controller{
    
    public function $defaultAction()
    {
        \$this->display();
    }
}
CODE;

$code[1] = <<<str
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎使用AQPHP框架 - 贵州华夏微联大数据有限公司</title>
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
        }
        body {
            background: #fafafa;
            overflow: hidden;
        }
        .box {
            width: 998px;
            height: auto;
            margin: 100px auto 0px;
            border: 1px solid #efefef;
            border-radius: 10px;
            background: #ffffff url("data:image/jpeg;base64,/9j/4AAQSkZJRgABAgAAZABkAAD/7AARRHVja3kAAQAEAAAAPAAA/+EDKmh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8APD94cGFja2V0IGJlZ2luPSLvu78iIGlkPSJXNU0wTXBDZWhpSHpyZVN6TlRjemtjOWQiPz4gPHg6eG1wbWV0YSB4bWxuczp4PSJhZG9iZTpuczptZXRhLyIgeDp4bXB0az0iQWRvYmUgWE1QIENvcmUgNS42LWMxNDIgNzkuMTYwOTI0LCAyMDE3LzA3LzEzLTAxOjA2OjM5ICAgICAgICAiPiA8cmRmOlJERiB4bWxuczpyZGY9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkvMDIvMjItcmRmLXN5bnRheC1ucyMiPiA8cmRmOkRlc2NyaXB0aW9uIHJkZjphYm91dD0iIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDpDMzgwNTlCOEQwMDkxMUU3QkMzN0IwNEUxQ0ZFOTMzNiIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDpDMzgwNTlCN0QwMDkxMUU3QkMzN0IwNEUxQ0ZFOTMzNiIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgQ0MgKFdpbmRvd3MpIj4gPHhtcE1NOkRlcml2ZWRGcm9tIHN0UmVmOmluc3RhbmNlSUQ9InhtcC5paWQ6MDg1NDY2RjA5NzZCMTFFNzkyQjZBMjY4MTg5M0EyMTAiIHN0UmVmOmRvY3VtZW50SUQ9InhtcC5kaWQ6MDg1NDY2RjE5NzZCMTFFNzkyQjZBMjY4MTg5M0EyMTAiLz4gPC9yZGY6RGVzY3JpcHRpb24+IDwvcmRmOlJERj4gPC94OnhtcG1ldGE+IDw/eHBhY2tldCBlbmQ9InIiPz7/7gAOQWRvYmUAZMAAAAAB/9sAhAAGBAQEBQQGBQUGCQYFBgkLCAYGCAsMCgoLCgoM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") no-repeat 338px 20px;
        }
        .welcome {
            width: 500px;
            height: 130px;
            margin: 20px auto 30px;
            padding-top: 120px;
            text-align: center;
            font-size: 45px;
            font-weight: 100;
            color: #232323;
            font-family: "Courier New";
            background: rgba(255, 255, 255, 0.7);
        }
        .content {
            width: 938px;
            height: 280px;
            margin: 0px 30px;
        }
        .content h4 {
            padding: 14px 0px;
            color: #777777;
            font-size: 16px;
            font-family: "DengXian";
            font-weight: 400;
        }
        .content input {
            width: 916px;
            height: 33px;
            line-height: 33px;
            border: 1px solid #efefef;
            border-radius: 6px;
            background: #fafafa;
            color: #7a777e;
            font-size: 15px;
            padding: 0px 10px;
            font-weight: 700;
            margin: 5px auto;
            font-family: "Courier New";
        }
        .content a {
            color: #c24b29;
        }
        .foot {
            width: 938px;
            height: 129px;
            border-top: 1px solid #f0f0f0;
            margin: 0px auto;
            text-align: center;
            line-height: 80px;
            color: #9c9899;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="box">
    <div class="welcome">
        <sapn>欢迎使用AQPHP框架</sapn>
        <br/>
        <span>version 1.0</span>
    </div>
    <div class="content">
        <h4>您正在看的网页是由AQPHP框架动态生成的。</h4>
        <h4>如果您想要编辑这个网页，您会发现它位于：</h4>
        <input type="text" value="templete/home/index/index.html">
        <h4>而此页面的对应控制器在：</h4>
        <input type="text" value="application/home/controller/Index.php">
        <h4>如果您是第一次探索AQPHP Framework，您应该首先阅读（更新中）用户指南。<a href="http://www.aqphp.com" target="_blank">使用手册</a></h4>
    </div>
    <div class="foot">
        页面渲染14豪秒 · Environment:dev
    </div>
</div>
</body>
</html>
str;
    
    //创建MVC结构目录
    $defaultDir = array();
	$dirArry = array('controller','model','view','conf');
	
    for($i=0; $i<count($dirArry); $i++)
    {
        $defaultDir[] .= $defaultModule.'/'.$dirArry[$i];
		
        if(!is_dir($defaultDir[$i]))  mkdir($defaultDir[$i], 0777, true);
    }
    
    $indexFile  = $defaultAction.config('ACTION_FIX'); //默认文件
    
    //组合控制器路径
    $fileDir[0] = $defaultModule.'/controller/'.$defaultControl.config('CLASS_FIX').'.php';
    
    //组合模板路径
    if(!config('START_TPLDIR'))
    {
        $actionFile = "{$defaultModule}/view/{$actionDir}";//View模板路径
    }
    else
    {
        $actionFile = config('TEMPLETE_PATH').'/'
            .config('DEFAULT_MODULE').'/'
            .config('DEFAULT_CONTROL'); //Templete模板路径
    }
    
    $fileDir[1]  = $actionFile.'/'.$indexFile; //方法模板文件名

    if(config('START_TPLDIR') && !is_dir($actionFile))
    {
        mkdir($actionFile, 0777, true); //创建模板目录
    }
    
    for($i=0; $i<count($fileDir); $i++)
    {
        if(!is_file($fileDir[$i]))
        {
            file_put_contents($fileDir[$i], $code[$i]); //创建默认演示文件
        }     
    }
}


/**
 * 创建环境目录
 */
function createDir()
{
   if(!is_dir(TEMP_PATH))
   {
       mkdir(TEMP_PATH, 0777); //判断目录是否存在
   }
   
   if(!is_writable(TEMP_PATH))
   {
       error("目录没有写入权限，程序无法运行");//检测目录是否有写入权限
   }

   //检测目录是否存在 不存在则创建
   $path = array(
            CACHE_PATH,LOG_PATH,TPL_PATH,
            CONFIG_PATH,UPLOAD_PATH,
            config('PUBLIC_PATH'),
            config('TEMPLETE_PATH')
   );

   for($i=0; $i<count($path); $i++)
   {
       if(!is_dir($path[$i])) mkdir($path[$i], 0777, true);
   }
}