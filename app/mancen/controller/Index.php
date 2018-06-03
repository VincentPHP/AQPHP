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

use common\controller\MancenBase;

class Index extends MancenBase
{
    public function index()
    {
        $this->display();
    }

    public function main()
    {
        $this->display();
    }

    public function navBar()
    {
        $data = M('rbac_role')
            ->where('rr_id', '=', session('role_id'))
            ->find();

        $ids = explode(',', $data['rr_auth_ids']);

        $str = [];

        foreach ($ids as $v) {

            $auth = M('rbac_auth')
                ->where('ra_id', '=', $v)
                ->find();

            //组合菜单格式
            if($auth['ra_parent_id'] == 0)
            {
                $arr = array(
                    'id'    =>$auth['ra_id'],
                    'title' =>$auth['ra_name'],
                    'icon'  =>$auth['ra_ico_image'],
                    'spread'=>false,
                );

                $str[$auth['ra_id']] = $arr;
            }
            else
            {
                $url = U(str_replace('-','/', $auth['ra_path']));

                $arr = array(
                    'id'    => $auth['ra_id'],
                    'title' => $auth['ra_name'],
                    'icon'  => $auth['ra_ico_image'],
                    'url'  => $url,
                );

                if(!empty($str[$auth['ra_parent_id']]['children']))
                {
                    array_push($str[$auth['ra_parent_id']]['children'], $arr);
                }
                else
                {
                    $str[$auth['ra_parent_id']]['children'] = array($arr);
                }
            }
        }

        $preg = array('/\[{/', '/(\"\d\":)*/', '/(}}\])/','/(:\[\")/');

        $replace = array('[', '', '}]', ':[{"');

        $str = preg_replace($preg, $replace, json_encode(array($str)));

        $this->ajaxReturn($str);
        exit;
    }
}
