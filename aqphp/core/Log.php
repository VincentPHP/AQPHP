<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/
namespace aqphp\core;

/**
 * 系统运行日志类
 * @author Vincent
 */
 
class Log
{
   static $log = array();
   
   /**
    * 记录日志内容
    * @param string $message 日志信息
    * @param string $type   日志类型 错误 |提醒 |警告|SQL
    */
   static function set($message, $type='NOTICE')
   {   
       if(in_array($type,config('LOG_TYPE')))
       {
           self::$log[] = $message.'['.date("y-m-d H:i:s").']'."\r\n";
       }
   }


   /**
    * 储存日志内容到日志文件里
    * @param int $messageType 0=系统配置处理 2=发送邮件处理 3=自定义系统处理
    * @param int $destination 第一项是3的情况下 这里是文件 2的情况下 是邮箱地址
    * @param string $extraHeaders
    */
   static function save($messageType=3, $destination=null, $extraHeaders=null)
   {
       if(!config('LOG_START'))return;
       
       if(is_null($destination))
       {
           $destination = LOG_PATH.'/'.date("Y_m_d").'.log';
       }
       
       if($messageType == 3)
       {
           if(is_file($destination) && filesize($destination)>config('LOG_SIZE'))
           {
                rename($destination,dirname($destination).'/'.time().'.log');
           }    
       }
       
       error_log(implode(',', self::$log), $messageType, $destination);
   }


   /**
    * 直接写入日志文件
    * @param string $message 日志内容信息
    * @param int $messageType 存储方式
    * @param int $destination 文件地址 或者是邮箱地址
    * @param string $extraHeaders 头请求 选择储存方式2的时候有用
    */
   static function write($message, $messageType=3, $destination=null, $extraHeaders=null)
   {
       if(!config('LOG_START'))return;
        
       if(is_null($destination))
       {
           $destination = LOG_PATH.'/'.date("Y_m_d").'.log';
       }
        
       if($messageType == 3)
       {
           if(is_file($destination) && filesize($destination)>config('LOG_SIZE'))
           {
               rename($destination,dirname($destination).'/'.time().'.log');
           }
       }

       $message = $message.date('y-m-d h:i:s')."\r\n";

       error_log($message, $messageType, $destination);
    }
}