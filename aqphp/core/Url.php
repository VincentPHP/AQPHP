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
 * 路由处理类
 * @author Vincent
 */
 
final class Url
{
    /**
     * 保存PATHINFO信息
     * @var String $pathInfo
     */
    static $pathInfo;   
    
    /**
     * 解析URL
     */ 
    static function parseUrl()
    {
       if(self::pathInfo() != FALSE)
       {
          $info = explode(config('PATHINFO_DLI'),self::$pathInfo);
          
          if($info[0] != config('VAR_MODULE'))
          {
              $get['m'] = $info[0];
              array_shift($info);
              
              $get['c'] = $info[0];
              array_shift($info);
              
              $get['a'] = $info[0];
              array_shift($info);
          }
          
          for($i=0;$i<count($info);$i+=2)
          {
              $get[$info[$i]] = $info[$i+1];
          }
          
          $_GET = $get;
          
       }

       define("MODULE", isset($_GET['m']) && !empty($_GET['m']) ? $_GET['m']:config('DEFAULT_MODULE'));
       define("CONTROL",isset($_GET['c']) && !empty($_GET['c']) ? $_GET['c']:config('DEFAULT_CONTROL'));
       define("ACTION", isset($_GET['a']) && !empty($_GET['a']) ? $_GET['a']:config('DEFAULT_ACTION'));
    }


    /**
     * 解析PATHINFO
     * @return bool
     */
    static function pathInfo()
    {
        //获得PATHINFO变量
        if(!empty($_GET[config('PATHINFO_VAR')]))
        {
            $pathInfo = $_GET[config('PATHINFO_VAR')];
        }
        else if(!empty($_SERVER['PATH_INFO']))
        {
            $pathInfo = $_SERVER['PATH_INFO'];
        }
        else
        {
            return FALSE;
        }
        
        $pathInfo_FIX = '.'.trim(config('PATHINFO_FIX'),'.');
        $pathInfo = str_ireplace($pathInfo_FIX, '', $pathInfo);
        $pathInfo = trim($pathInfo, '/');
        
        if(stripos($pathInfo, config('PATHINFO_DLI')) == FALSE)
        {
            return FALSE;
        }
        
        self::$pathInfo = $pathInfo;

        return TRUE;
    }
}