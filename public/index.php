<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/
header("Content-type:text/html;charset=utf-8");

//项目目录
define("APP_PATH", __DIR__.'/..');

//模块目录
define("MODULE_PATH", APP_PATH.'/app');

//引入框架文件
require __DIR__ . '/../framework/Start.php';