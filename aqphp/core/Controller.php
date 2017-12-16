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
use aqphp\core\View;

/** 
 * 公共控制器类
 * @author Vincent
 */ 

class Controller extends View
{
    /**
     * 提示成功 并转跳
     * @param string $msg 提示信息
     * @param string $url 跳转网址
     * @param int $time   显示时间
     */
    protected function success($msg, $url='', $time=3)
    {
        if(IS_AJAX)
        {
            header("Content-type:application/json;");

            //返回Json格式数据
            $result = array(
                'msg'   => $msg,
                'url'   => $url,
                'time'  => $time,
                'state' => 1,
            );

            echo json_encode($result);
        }
        else
        {
            $data = array('msg'=>$msg, 'url'=>$url, 'time'=>$time);

            $this->assign('data', $data);

            $this->display(config("SUCCESS_TPL"));
        }
    }


    /**
     * 提示失败 并转跳
     * @param string $msg
     * @param string $url
     * @param int $time
     */
    protected function error($msg, $url='', $time=3)
    {
        if(IS_AJAX)
        {
            header("Content-type:application/json;");

            //返回Json格式数据
            $result = array(
                'msg'   => $msg,
                'url'   => $url,
                'time'  => $time,
                'state' => 0,
            );

            echo json_encode($result);

            exit;
        }
        else
        {
            $data = array('msg'=>$msg, 'url'=>$url, 'time'=>$time);

            $this->assign('data', $data);

            $this->display(config("ERROR_TPL"));

            exit;
        }
    }


    /**
     * 重定向
     * @param $msg
     * @param string $url
     * @param int $time
     */
    protected function redirect($msg, $url='', $time=3)
    {
        $data = array('msg'=>$msg, 'url'=>$url, 'time'=>$time);

        $this->assign('data', $data);

        $this->display(config("REDIRECT_TPL"));

        exit;
    }
}