<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/
namespace aqphp\Bin;

use aqphp\Debug;
use aqphp\Log;
use aqphp\Route;

/**
 * App 框架核心类
 * @author Vincent
 * @package aqphp\core
 */
class App
{
    /**
     * 核心调动方法
     */
   public static function run()
    {
        spl_autoload_register(array(__CLASS__, "autoLoad"));//配置自动加载类文件
        
        set_error_handler(array(__CLASS__, "error"));       //注册错误处理方法
        
        set_exception_handler(array(__CLASS__, "exception"));//注册异常处理方法
        
        //是否转义
        define("MAGIC_QUOTES_GPC", get_magic_quotes_gpc() ? true : false);
        
        //设置时区
        if(function_exists('date_default_timezone_set'))
        {
            date_default_timezone_set(config("DATE_TIMEZONE_SET"));
        }
        
        session_id() || session_start(); //开启SESSION
        
        self::config();//初始化配置
        
        //调试开始
        if(config("DEBUG"))
        {
            Debug::start("APP_START");
        }
        
        //初始化框架
        self::init();
        
        //开启调试
        if(config("DEBUG"))
        {
            Debug::show("APP_START","APP_END");
        }

        //日志存储
        Log::save();
    }
    
    
    /**
     * 初始化配置
     */
    public static function init()
    {
        Route::parseUrl();//调用路由

        $control = A(MODULE.'.'.CONTROL);

        $action  = ACTION;

        if(!method_exists($control, $action))
        {
            error('[ '.CONTROL.config('CONTROL_FIX')." ]控制器中的[ {$action} ]动作不存在");
        }
       
        $control->$action();
    }


    /**
     * 初始化配置文件处理
     */
    public static function config()
    {    
        $configFile = CONFIG_PATH.'/Config.php';
        
        if(is_file($configFile))
        {
            config(require $configFile);
        }   
    }


    /**
     * 异常处理
     * @param array $exception 异常信息
     */
    public static function exception($exception)
    {
        error($exception);
    }


    /**
     * 显示加载错误
     * @param String $errNo   错误类型
     * @param String $errStr  错误内容
     * @param String $errFile 错误文件
     * @param String $errLine 错误行号
     */
    public static function error($errNo, $errStr, $errFile, $errLine)
    {
        switch ($errNo)
        {
            case E_ERROR:
    
            case E_USER_ERROR:
    
                //错误信息
                $errMsg = "ERROR:[{$errNo}]<strong> {$errStr} </strong> <br/>File:{$errFile}[{$errLine}]";
    
                //进行日志写入
                Log::write("ERROR:[{$errNo}][{$errStr}] File:{$errFile}[{$errLine}]");
    
                //提示错误
                error($errMsg);

                break;
    
            case E_NOTICE:
    
            case E_WARNING:
    
            default:
    
                //错误信息
                $errMsg = "NOTICE:[{$errNo}][{$errStr}] File:{$errFile}"."[{$errLine}]";

                //进行日志记录
                Log::set("NOTICE:[{$errNo}][{$errStr}] File:{$errFile}[{$errLine}]","NOTICE");
                 
                //提示错误信息
                notice(func_get_args());

                break;
        }
    }
 

    /**
     * 自动加载类文件
     * @param string $className 需要加载的类名
     */
    public static function autoLoad($className)
    {
        //替换'\'为'/'斜杠
        $className = str_replace('\\','/', $className).config('CLASS_FIX').'.php';

        if (strpos($className,'controller')) {

            $classFile = '../'.MODULE_DIR.'/'.$className;

        } else {

            $classFile = '../'.PHP_DIR.'/'.$className;
        }

        //载入文件
        file_exists($classFile) && loadFile($classFile);
    }
}