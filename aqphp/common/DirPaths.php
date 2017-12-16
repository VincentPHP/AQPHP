<?php
/* +----------------------------------------------------------------
 * | Software: [aqphp framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

//配置框架的目录结构
define("CACHE_DIR", 'cache');//缓存目录
define("LOG_DIR"  , 'log'  );//日志目录
define("TPL_DIR"  , 'tpl'  );//编译目录

define("MODULE_DIR"  , 'application');//模块目录

define("STATIC_DIR"  , 'db'    );//框架资源目录
define("PHP_CORE_DIR", 'core'  );//框架核心目录
define("PHP_ORG_DIR" , 'org'   );//框架插件目录

define("CONFIG_DIR"  , 'conf'  );//应用配置目录
define("COMMON_DIR"  , 'common');//应用公共目录
define("UPLOAD_DIR"  , 'upload');//上传文件目录

//缓存目录
define("CACHE_PATH", TEMP_PATH.'/'.CACHE_DIR);
define("LOG_PATH"  , TEMP_PATH.'/'.LOG_DIR  );
define("TPL_PATH"  , TEMP_PATH.'/'.TPL_DIR  );

define("STATIC_PATH"  , PHP_PATH.'/'.STATIC_DIR   ); //框架静态资源目录
define("PHP_ORG_PATH" , PHP_PATH.'/'.PHP_ORG_DIR  ); //框架第三方插件目录
define("PHP_LIBS_PATH", PHP_PATH.'/'.PHP_CORE_DIR ); //框架核心类文件目录

if(!defined("MODULE_PATH")) define("MODULE_PATH", APP_PATH .'/'. MODULE_DIR);
define("COMMON_PATH", MODULE_PATH.'/'.COMMON_DIR);
define("CONFIG_PATH", COMMON_PATH.'/'.CONFIG_DIR);
define("UPLOAD_PATH", APP_PATH   .'/'.UPLOAD_DIR);