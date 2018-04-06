<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

namespace aqphp;

/**
 * 结合View模板类结合SMARTY
 * @author Vincent
 */

//引入Smarty
include config('SMARTY_DIR');

class View
{
    private static $smarty = null;
    private $tplDir;
    
    public function __construct()
    {
        if(!is_null(self::$smarty)) return ;
        
        $smarty = new \Smarty(); //实例化Smarty对象

        $dir = array(
            'comDir'=>TPL_PATH.'/'.MODULE,
            'cacheDir'=>CACHE_PATH.'/'.MODULE,
        );
        
        foreach($dir as $v)
        {
            is_dir($v) || mkdir($v, 0777, true);
        }
        
        $viewTpl = MODULE_PATH.'/'.MODULE.'/view/'.CONTROL; //view模板目录
        $templeteTpl = config('TEMPLETE_PATH').'/'.MODULE.'/'.CONTROL; //Templete模板目录

        $this->tplDir = config('START_TPLDIR') ? $templeteTpl : $viewTpl ;
        
        $smarty->template_dir = $this->tplDir;  //模板目录
        $smarty->compile_dir  = $dir['comDir']; //编译目录
        $smarty->cache_dir = $dir['cacheDir'];  //缓存目录
        $smarty->caching = config('SMARTY_CACHING'); //是否缓存
        $smarty->cache_lifetime = config('SMARTY_LIFETIME');//缓存时间
        $smarty->left_delimiter = config('SMARTY_LEFT');    //开始定界符
        $smarty->right_delimiter= config('SMARTY_RIGHT');   //结束定界符
        
        //$smarty->setCaching(\Smarty::CACHING_LIFETIME_CURRENT);
        //$smarty->registerPlugin('block','dynamic', 'smarty_block_dynamic', false);//局部不缓存        

        self::$smarty = $smarty; //存入静态属性
    }

    /**
     * 渲染模板
     */
    protected function display($path='')
    {
    	if(!empty($path))
    	{
            self::$smarty->display($path);
        }
        else
        {
            $path = $this->tplDir.'/'.ACTION.config('ACTION_FIX');

            if(!is_file($path)) error('[ '.$path.' ] 该模板文件不存在');

            self::$smarty->display(ACTION.config('ACTION_FIX'), $_SERVER['REQUEST_URI']);

            exit();
        }
    }


    /**
     * 分配变量
     * @param $name 变量名
     * @param $value 值
     */
    protected function assign($name,$value)
    {
        self::$smarty->assign($name, $value);
    }


    /**
     * 是否缓存
     * @return mixed
     */
    protected function is_cached()
    {
        return self::$smarty->is_cached(ACTION.'.html', $_SERVER['REQUEST_URI']);
    }


    /**
     * 清楚缓存
     */
    protected function clear_cache()
    {
        self::$smarty->clear_cache();
    }


    /**
     * 局部不缓存
     * @param $param
     * @param $content
     * @param $smarty
     * @return mixed
     */
	protected function smarty_block_dynamic($param, $content, $smarty)
	{
    	return $content;
	}
}