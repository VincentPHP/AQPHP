<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
* |	  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent>  < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

namespace aqphp\core;
/**
 * 异常处理类
 * @author Vincent
 */
class Exception extends \Exception
{
    /**
     * 异常处理类 构造函数
     * Exception constructor.
     * @param string $message 错误信息
     * @param int $code  错误编码
     */
    function __construct($message, $code=0)
    {
        parent::__construct($message, $code);
    }


    /**
     * 显示错误信息
     * @return string $errOr 错误信息
     */
    function show()
    {
      $trace = $this->getTrace();
      
      $error['message'] = 'Message:<strong> '.$this->message .' </strong><br/>';
      $error['message'].= 'File:'.$this->file.'['.$this->line.'] ';
      $error['message'].= $trace[0]['class'].$trace[0]['type'].$trace[0]['function'].'()';
      
      array_shift($trace);
      
      $info = '';
      foreach ($trace as $v )
      {
          $class = isset($v['class'])? $v['class']:'';
          $type  = isset($v['type']) ? $v['type'] :'';
          $file  = isset($v['file']) ? $v['file'] :'';
          $info .= $file."\t".$class.$type.$v['function'].'<br/>';
      }

      Log::write($error['message']);//写入日志
      
      $error['info']=$info;

      return $error;
    }
}