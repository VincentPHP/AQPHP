<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

namespace api\controller\v1;
use api\controller\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $result = array(
            'msg'=>'ok',
            'code'=>200,
        );

        $this->ajaxReturn(json_encode($result),'json');
    }
}