<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

//框架常量
define('IS_POST', ($_SERVER['REQUEST_METHOD'] == 'POST') ? TRUE : FALSE ); //是否是POST请求
define('IS_GET' , ($_SERVER['REQUEST_METHOD'] == 'GET' ) ? TRUE : FALSE ); //是否是GET请求
define('IS_WIN' , strstr(PHP_OS, 'WIN') ? TRUE : FALSE);     //是否是WIN系统
define('IS_CLI' , PHP_SAPI == 'cli' ? TRUE : FALSE);                       //是否是CLI模式
define('IS_CGI' , substr(PHP_SAPI, 0, 3) == 'cgi' ? TRUE : FALSE); //是否是IIS CGI模式
define('IS_AJAX'  , isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'); //是否是AJAX请求
define('IS_HTTPS' , isset($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) == 'no'); //是否是HTTPS协议
define('IS_WECHAT', strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== FALSE); //是否是微信浏览器
define('IS_DELETE', $_SERVER['REQUEST_METHOD'] == 'DELETE' ? isset($_POST['_method']) && $_POST['_method'] == 'DELETE' : FALSE); //是否是DELETE请求

//系统常量
define('DS' , DIRECTORY_SEPARATOR);      //系统层级目录符号
define('NOW', $_SERVER['REQUEST_TIME']); //请求开始时间戳
define('NOW_MICROTIME', microtime(TRUE)); //时间戳 微妙数

//网址常用
define('__ROOT__', trim('http:/'.'/'.$_SERVER['HTTP_HOST'].dirname($_SERVER['SCRIPT_NAME'] ), '/\\'));
define('__URL__',  trim('http:/'.'/'.$_SERVER['HTTP_HOST'].'/'.trim($_SERVER['REQUEST_URI'], '/\\'), '/'));
define('__HISTORY__', isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : ''); //获取前一页链接

//框架信息
define('VERSION', config('VERSION')); //框架版本号