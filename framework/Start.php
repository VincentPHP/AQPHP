<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

use Aqphp\Bin\App;

/**
 * Class Start
 */
class Start
{

    public static function run()
    {
        //记录开始运行时间
        self::runTime("start");

        //项目初始化
        if(!defined("APP_PATH"))
        {
            define("APP_PATH", dirname($_SERVER['SCRIPT_FILENAME']));
        }

        define("PHP_PATH"  , dirname(__FILE__));//框架外目录
        define("TEMP_PATH" , MODULE_PATH.'/temp');   //缓存目录
        define("AQPHP_PATH", PHP_PATH.'/aqphp');     //框架内目录

        require 'RunTime.php';  //引入初始化文件

        $run = new RunTime();   //框架初始化
        $run->start();

        require AQPHP_PATH.'/bin/App.php';

        App::run();             //运行项目

        self::runTime("end"); //记录结束运行时间
    }


    /**
	 * 计算运行时间
	 * @param string $start 开始时间
	 * @param string $end 结束时间
	 * @param int $decimial 显示几位数
	 * @return int 总消耗时间
	 */
	private static function runTime($start, $end='', $decimial=3)
	{
		static $times = array();

		if($end != '')
		{
			$times[$end] = microtime();

			return number_format($times[$end] - $times[$start], $decimial);
		}

		$times[$start] = microtime();
	}
}

Start::run();