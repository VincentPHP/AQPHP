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

/**
 * 框架目录文件操作类
 * @author Vincent
 */

final class Directory
{
    /**
     * 转换为标准目录结构
     * @param string $dirName 目录路径
     * @return string 标准化处理后的目录路径
     */
    static function dirPath($dirName)
    {
        $dirName = str_ireplace('\\', '/', $dirName);

        return substr($dirName,-1) == '/' ? $dirName : $dirName.'/';
    }
    
    
    /**
     * 获取文件扩展名
     * @param string $fileName 文件名称
     * @return String 文件后缀名 不带'.'
     */
    static function getExt($fileName)
    {
        return substr(strrchr($fileName, '.'), 1);
    }


    /**
     * 获得目录内容
     * @param string $dirName 目录名
     * @param string $exts 需要获取的文件 的扩展名 (默认所有文件)
     * @param int|number $son 是否获得子目录
     * @param array $list 内容列表 (默认是数组)
     * @return array $list 返回内容列表
     */
    static  function tree($dirName, $exts='', $son=0, $list=array())
    {
        $dirName = self::DirPath($dirName);
        
        if(is_array($exts))
        {
            $exts = implode('|',$exts);
        }
        
        static $id = 0;
        foreach(glob($dirName."*") as $v )
        {
            $id++;
            if(!$exts || preg_match("/\.($exts)/i",$v))
            {
                $list[$id]['name']    = basename($v);
                $list[$id]['path']    = realpath($v);
                $list[$id]['type']    = filetype($v);
                $list[$id]['size']    = filesize($v);
                $list[$id]['ctime']   = filectime($v);
                $list[$id]['atime']   = fileatime($v);
                $list[$id]['isread']  = is_readable($v);
                $list[$id]['iswrite'] = is_writeable($v);
            }
            
            if(is_dir($v))
            {
                $list = self::Tree($v,$exts,$son,$list);
            }
        }
        
        return $list;
    }


    /**
     * 只获取目录结构
     * @param string $dirName 路径
     * @param int $pid 父级
     * @param int $son 子级
     * @param array $list
     * @return array 目录结构列表
     */
    static function treeDir($dirName, $pid=0, $son=0, $list=array())
    {
        $dirName = self::dirPath($dirName);
        
        static $id = 0;
        foreach (glob($dirName.'*') as $v)
        {
            if(is_dir($v))
            {
                $id++;
                $list[$id]['id']    = $id;
                $list[$id]['pid']  = $pid;
                $list[$id]['name'] = basename($v);
                $list[$id]['path'] = realpath($v);
                
                if($son)
                {
                    $list = self::Tree($v, $id, $son, $list);
                }
            }
        }
        
        return $list;
    }


    /**
     * 删除目录
     * @param string $dirName 目录路径
     * @return bool 删除结果
     */
    static function del($dirName)
    {
        $dirPath = self::dirPath($dirName);
        
        if(!is_dir($dirPath)) return FALSE;
        
        foreach(glob($dirPath.'*') as $v)
        {
            is_dir($v) ? self::del($v) : unlink($v);
        }

        return rmdir($dirPath);
    }
    
    
    /**
     * 层级目录结构创建
     * @param string $dirName 创建目录路径
     * @param String $auth 文件权限
     * @return boolean
     */
    static function create($dirName, $auth="0777")
    {
        $dirPath = self::dirPath($dirName);
        
        if(is_dir($dirPath)) return true;
        
        $dirArr = explode("/",$dirPath);
        
        $dir = '';
        foreach($dirArr as $v)
        {
            $dir .= $v.'/';
            if(is_dir($dir))continue;
            mkdir($dir, $auth);
        }
        
        return is_dir($dirPath);
    }


    /**
     * 复制目录及内容
     * @param string $oldPath 源路径
     * @param string $newPath 新路径
     * @return bool
     */
    static function copy($oldPath, $newPath)
    {
        $oldDir = self::dirPath($oldPath);
        $newDir = self::dirPath($newPath);

        if(!is_dir($oldDir)) error('复制失败:['.$oldDir.'] 目录不存在');
        if(!is_dir($newDir)) self::create($newDir);
        
        foreach(glob($oldDir.'*') as $v)
        {
            $toFile = $newDir.basename($v);

            if(is_file($toFile)) continue;

            if(is_dir($v))
            {
                self::copy($v, $toFile);
            }
            else
            {
                copy($v, $toFile);
                chmod($toFile, '0777');
            }
        }
        
        return TRUE;
    }
}