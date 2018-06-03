<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

namespace common\controller;
use common\controller\Base;

class MancenBase extends Base
{
    public function __construct()
    {
        parent::__construct();

        //拦截未登陆用户
        if(!session('mancen_id')) {

            $this->error('您还未登陆！正在转跳登陆中心...', U('mancen/Login/index'), 3);
        }

        //RBAC权限拦截
        $role = M('rbac_role')
            ->where('rr_id','=', session('role_id'))
            ->find();

        $auth = explode(',',$role['rr_auth_ca']);

        $path = CONTROL.'-'.ACTION;

        $arr = array('Index-index','Index-main','Index-navBar');

        if(!in_array($path, $auth) && !in_array($path, $arr))
        {
            $this->error('警告，您不具备该权限！', '', 3);
        }
    }
}