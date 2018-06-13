<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

return array(
    
    //数据库配置
    "DBHOST"    => '',      //数据库地址
    "DBNAME"    => '',      //数据库库名
    "DBUSER"    => '',      //用户名
    "DBPWD"     => '',      //密 码
    "DBFIX"     => '',      //表前缀
    
    //系统配置
    "SHOW_TIME"         => TRUE,   //显示运行时间
    "DEBUG"             => TRUE,   //开启调试模式
    "VERSION"           => '1.2.0',//框架版本号
    "FONT"	            => PHP_PATH."/resource/font/GABRIOLA.TTF",	 //系统字体
    "NOTICE_SHOW"       => TRUE,     //是否开启提示性错误
    "ERROR_MESSAGE"     => '页面错误',//关闭调试模式显示内容
    "DATE_TIMEZONE_SET" => 'PRC',    //默认时区

    //图像水印处理
    "WATER_ON"          => 1,           //水印是否开启
    "WATER_IMG"         => PHP_PATH."/resource/water/water.png",    //水印图片
    "WATER_POS"         => 9,           //水印位置
    "WATER_PCT"         => 70,          //水印透明度
    "WATER_TYPE"        => 1,           //1为图片水印 0为文字水印
    "WATER_QUALITY"     => 80,          //水印压缩比
    "WATER_TEXT"        => "AQPHP Framework", //水印文字
    "WATER_TEXT_SIZE"   => 13,          //水印文字大小
    "WATER_TEXT_COLOR"  => "#000000",   //水印文字颜色

    //缩略图处理
    "THUMB_ON"          => 1,           //是否开启缩略图
    "THUMB_TYPE"        => 5,           //生成缩略图的方式
    "THUMB_PATH"        => UPLOAD_PATH.'/Img/'.date('Ymd'),  //缩略图保存目录
    "THUMB_WIDTH"       => 250,         //缩略图宽度
    "THUMB_HEIGHT"      => 250,         //缩略图高度
    "THUMB_PREFIX"      => "thumb_",    //缩略图前缀
    "THUMB_ENDFIX"      => "_thumb",    //缩略图后缀

    //1 固定宽度 高度自增 2固定高度 宽度自增 3固定宽度 高度裁剪 4固定高度 宽度裁剪 5缩放最大边

    //系统模板
    "TPL_STATIC"	  => PHP_PATH.'/resource/view/Static/',		 //模板资源目录
    "DEBUG_TPL"       => PHP_PATH.'/resource/view/Debug.tpl',      //错误异常模板
    "Index_TPL"       => PHP_PATH.'/resource/view/Index.tpl',      //默认演示模板
    "ERROR_TPL"		  => PHP_PATH.'/resource/view/Error.tpl',	     //错误提示模板
    "SUCCESS_TPL"	  => PHP_PATH.'/resource/view/Success.tpl',    //成功提示模板
    "REDIRECT_TPL"    => PHP_PATH.'/resource/view/Redirect.tpl',   //重定向模板


    //文件上传
    "UPLOAD_EXT_SIZE" => array(
        "jpg"=>"", "jpeg"=>"", "png"=>"",
        "gif"=>"", "bmp" =>"", "doc"=>"",
        "ppt"=>"", "xls" =>"", "rar"=>"",
        "zip"=>"", "txt" =>"",
    ),                      //文件上传大小
    "UPLOAD_PATH"     => UPLOAD_PATH."/user/".date('Ymd'),   //文件保存路径
    "UPLOAD_PATH_IMG" => UPLOAD_PATH."/img/".date('Ymd'),    //图片保存路径
    //"UPLOAD_THUME_ON" => 1, //是否对上传文件开启缩略图
    //"UPLOAD_WATERMARK_ON" => 1,//对上传文件加水印

    //验证码
    "CODE_STR"        => "1234567890qwertyuiopmnbvcxzasdfghjklMNBVCXZPOIUYTREWQASDFGHJKL",//验证码字符串
    "CODE_WIDTH"      => 100,           //验证码宽度
    "CODE_HEIGHT"     => 35,            //验证码高度
    "CODE_BG_COLOR"   => "#DCDCDC",     //背景颜色
    "CODE"            => "code",        //SESSION变量
    "CODE_LEN"        => 4,		        //验证码长度
    "CODE_FONT_SIZE"  => 28,            //字体大小
    "CODE_FONT_COLOR" => "",            //字体颜色
    
    //PATHINFO
    "PATHINFO_DLI"    => "/",           //PATHINFO分隔符
    "PATHINFO_VAR"    => "q",           //兼容模式GET变量
    "PATHINFO_FIX"    => ".action",     //伪静态扩展名
  
    //日志处理
    "LOG_START"       => TRUE,          //是否开启日志显示
    "LOG_TYPE"        => array('SQL','NOTICE','ERROR'),//日志处理类型
    "LOG_SIZE"        => 2000000,       //日志文件大小 (字节)
    
    //项目配置项
    "DEFAULT_MODULE"  => 'home' ,       //默认模块
    "DEFAULT_VERISON" => FALSE,         //默认版本
    "DEFAULT_CONTROL" => 'Index',       //默认控制器
    "DEFAULT_ACTION"  => 'index',       //默认方法
    "CONTROL_FIX"     => '',            //默认控制器后缀
    "CLASS_FIX"       => '',            //默认后缀
    "ACTION_FIX"      => '.html',       //默认后缀
    "START_TPLDIR"	  => TRUE,		    //开启模板目录
    "PUBLIC_PATH" 	  => APP_PATH.'/public',     //应用静态资源目录
    "TEMPLETE_PATH"	  => MODULE_PATH.'/templete',//应用模块视图目录
    
    //全局常量
    "VAR_MODULE"      => 'm',           //模块变量
    "VAR_VERISON"     => 'v',           //版本变量
    "VAR_CONTROL"     => 'c',           //控制器变量
    "VAR_ACTION"      => 'a',           //方法动作
    
    //第三方类库
    "ORG_CLASS_DIR"   => array('org'),  //类库目录名
    
    //SMARTY
    "SMARTY_CACHING"  => FALSE,         //是否开启缓存
    "SMARTY_LIFETIME" => 30,            //缓存时间[s]
    "SMARTY_LEFT"     => '{{',          //标签开始定界符
    "SMARTY_RIGHT"    => '}}',          //标签结束定界符
    
    //SMARTY存放位置
    "SMARTY_DIR"      => AQPHP_PATH.'/org/smarty/Smarty.class.php',
);