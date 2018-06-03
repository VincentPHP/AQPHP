<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/
namespace aqphp;

/**
 * DEBUG 调试类
 * @author Vincent
 */



class Debug
{
   static $runTime;      //运行时间
   
   static $memory;       //内存占用
 
   static $memory_peak;  //内容峰值
   
   /**
    * 调试开始
    * @param String $start 开始标识
    */
   static function start($start)
   {
       self::$runTime[$start]     = microtime(true);
       self::$memory[$start]      = memory_get_usage();
       self::$memory_peak[$start] = memory_get_peak_usage();
   }


    /**
     * 运行时间
     * @param int $start
     * @param string $end
     * @param int|number $decimals
     * @return int 运行时间
     */
   static function runTime($start, $end='', $decimals=5)
   {
       if(!isset(self::$runTime[$start]))
       {
           error('必须设置项目起点');
       }
       
       if(empty(self::$runTime[$end]))
       {
           self::$runTime[$end] = microtime(true);//获取结束时间

           return number_format((self::$runTime[$end] - self::$runTime[$start]),$decimals);
       }
   }


    /**
     * 内存占用峰值
     * @param String $start 开始时间
     * @param string $end   结束时间
     * @return bool|mixed
     */
   static function Memory_peak($start, $end='')
   {
       if(!isset(self::$memory_peak[$start]))
       {
           return false;
       }
       
       if(!empty($end))
       {
           self::$memory_peak[$end] = memory_get_peak_usage();
       }
       
       return max(self::$memory_peak[$start], self::$memory_peak[$end]);
   }
   
   
   /**
    * 项目运行结果
    * @param int $start 开始时间
    * @param int $end   结束时间
    */
   static function show($start, $end)
   {
       $message = number_format(self::Memory_peak($start,$end) / 1024)
           . "运行时间:".self::runTime($start, $end)."&nbsp;&nbsp;内存峰值:" .'KB';
       
       $load_file_list = loadFile();
       
       $info ='';
       $i = 1;
       foreach($load_file_list as $k=>$v)
       {
           $info .= '['.$i++.']'.$k.'<br/>';
       }
       
       $E['info'] = $info."<p>$message</p>";
       
       include config("DEBUG_TPL");
   }
}