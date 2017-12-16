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
 * 计算运行时间
 * @param string $start 开始时间
 * @param string $end 结束时间
 * @param int $decimial 显示几位数
 * @return int 总消耗时间
 */
function runTime($start, $end='', $decimial=3)
{
    static $times = array();

    if($end != '')
    {
        $times[$end] = microtime();

        return number_format($times[$end] - $times[$start], $decimial);
    }

    $times[$start] = microtime();
}

runTime("start");  //记录开始运行时间

//项目初始化
if(!defined("APP_PATH"))
{
    define("APP_PATH", dirname($_SERVER['SCRIPT_FILENAME']));    
}

define("PHP_PATH", dirname(__FILE__));   //框架主目录
define("TEMP_PATH", APP_PATH.'/temp');        //临时目录

$runTime_file = TEMP_PATH.'/Bootstrap.php11';   //加载编译文件

if(is_file($runTime_file))
{
    require $runTime_file; 
}
else
{	
    include PHP_PATH . '/common/Bootstrap.php';
    start();
}

aqphp\core\App::run();//运行项目

runTime("end"); //记录结束运行时间