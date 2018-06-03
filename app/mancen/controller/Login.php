<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

namespace mancen\controller;

use aqphp\Controller;
use aqphp\Verify;

class Login extends Controller
{
    public function index()
    {
        if (IS_POST) {
            $data = request('post.');

            //是否记住用户名及密码
            $isSave = isset($data['isSaveAccount']) ? $data['isSaveAccount'] : false;

            if (strtolower(session('code')) != strtolower($data['verifycode'])) {
                $this->error('您输入验证码不正确，请重新输入!', U('Index/index'), 3);
            }

            $model = M('manager_list');

            //获取账户信息
            $result = $model
                ->where('ml_email', '=', $data['email'])
                ->find();

            if ($result && (md5($data['password']) == $result['ml_password'])) {
                //设置session
                session('mancen_id', $result['ml_id']);
                session('role_id', $result['ml_role_id']);

                //设置cookie过期时间
                if ($isSave) {
                    $time = time() + 60 * 60 * 24 * 30;

                    setcookie('name', $data['email'], $time);

                    setcookie('pass', $data['password'], $time);
                }

                $this->success('登陆成功，正在转跳管理中心..', U('Index/index'), 2);

                exit;
            } else {
                $this->error('用户名或密码错误，请重新登陆！', U('Index/index'), 3);
            }
        }

        $this->display();
    }


    public function verify()
    {
        $verify = new Verify();
        $verify->getImage();
    }
}