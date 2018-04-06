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
use Aqphp\Dir;
use Aqphp\Image;

/**
 * 文件上传类
 * @package aqphp
 */
class Upload
{
    //文件上传类型
    public $exts;

    //文件上传大小
    public $size;

    //文件保存目录
    public $path;

    //文件上传表单
    public $field;

    //错误信息
    public $error;

    //是否开启缩略图
    public $thumb_on;

    //缩略图参数
    public $thumb =1;

    //水印处理
    public $waterMark_on;

    //上传成功文件信息
    public $uploadFiles = array();


    /**
     * 上传文件类 构造函数
     * Upload constructor.
     * @param string $path 保存路径
     * @param array $ext_size 文件类型与大小
     * @param int $thumb 缩略图参数
     * @param int $waterMark 是否开启缩略图
     */
    public function __construct($path="", $ext_size=array(), $thumb=1, $waterMark=1)
    {
        //缩略产图
        $this->thumb_on = empty($waterMark) ? 0 : 1;

        //水印配置
        $this->waterMark_on = empty($thumb) ? 0 : 1;

        $this->path = empty($path) ? config("UPLOAD_PATH") : $path;

        if(!empty($ext_size) && is_array($ext_size))
        {
            $this->exts = array_keys($ext_size);
            $this->size = $ext_size;
        }
        else
        {
            $this->exts = array_keys(config("UPLOAD_EXT_SIZE"));
            $this->size = config("UPLOAD_EXT_SIZE");
        }

        $this->thumb = $thumb;
    }


    /**
     * 文件上传
     * @return array 上传后的文件列表
     */
    public function upload()
    {
        if(!$this->checkDir())
        {
            $this->error = '目录'.$this->path.'创建失败或不可写';
            return false;
        }

        $files = $this->format();

        foreach($files as $v)
        {
            $info = pathinfo($v['name']);

            $v['ext']      = $info['extension'];
            $v['filename'] = $info['filename'];

            if(!$this->checkFile($v))
            {
                continue;   //跳过本次
            }

            $uploadFile = $this->save($v);

            if($uploadFile)
            {
                $this->uploadFiles[] = $uploadFile;
            }
        }

        return $this->uploadFiles;
    }


    /**
     * 存储上传文件
     * @param array $file 上传文件数组
     * @return array|bool
     */
    private function save($file)
    {
        $is_img = 0;
        $img_type = array('jpg','jpeg','png','bmp');

        $filePath = $this->path.'/'.$file['filename'].time().'.'.$file['ext'];

        if(in_array($file['ext'], $img_type) &&
            getimagesize($file['tmp_name']))
        {
            $filePath = config("UPLOAD_PATH_IMG").'/'.time().'.'.$file['ext'];
            $is_img = 1;
        }

        if(!move_uploaded_file($file['tmp_name'], $filePath))
        {
            $this->error = '上传文件失败';
            return false;
        }

        if(!$is_img)
        {
            return array('path' => $filePath);
        }

        //对图像文件进行处理
        $img = new Image();

        //缩略图处理
        if($this->thumb_on)
        {
            $args = array();

            if(is_array($this->thumb))
            {
                array_unshift($args, $filePath,"");
                $args = array_merge($args, $filePath);
            }
            else
            {
                array_unshift($args, $filePath);
            }

            $thumbPath = call_user_func_array(array($img, "thumb"), $args);
        }

        //水印处理
        if($this->waterMark_on)
        {
            $img->watermark($filePath);
        }

        return array('path'=>$filePath, 'thumb'=>$thumbPath);
    }


    /**
     * 目录验证
     * @return bool true or false
     */
    private function checkDir()
    {
        $path = $this->path;

        if(!Dir::Create($path) || !is_writeable($path))
        {
            return false;
        }

        $img_path = config("UPLOAD_PATH_IMG");

        if(!Dir::Create($img_path) || !is_writeable($img_path))
        {
            return false;
        }

        return true;
    }


    /**
     * 格式化数据
     * @return array|bool
     */
    private function format()
    {
        $files = $_FILES;

        if(!isset($files))
        {
            $this->error = '没有收到任何文件上传';
            return false;
        }

        $info = array();
        $num  =  0;

        foreach ($files as $v)
        {
            if(is_array($v['name']))
            {
                $count = count($v['name']);

                for($i=0; $i<$count; $i++)
                {
                    foreach($v as $m=>$k)
                    {
                        $info[$num][$m] = $k[$i];
                    }

                    $num ++;
                }
            }
            else
            {
                $info[$num] = $v;
                $num ++;
            }
        }

        return $info;
    }


    /**
     * 验证上传文件
     * @param String $file
     * @return bool true or false
     */
    private function checkFile($file)
    {
        if($file['error'] != 0)
        {
            $this->error = $this->error($file['error']);
            return false;
        }

        $ext_size = empty($this->size) ? config("UPLOAD_EXT_SIZE") : $this->size;
        $ext      = strtolower($file['ext']);

        if(!in_array($ext, $this->exts))
        {
            $this->error = '上传文件类型非法';
            return false;
        }

        if(!empty($ext_size) && $file['size'] > $ext_size)
        {
            $this->error = '上传文件过大';
            return false;
        }

        if(!is_uploaded_file($file['tmp_name']))
        {
            $this->error = '非法文件';
            return false;
        }

        return true;
    }


    /**
     * 获得错误类型
     * @param Number $type 错误编码
     */
    private function error($type)
    {
        switch ($type)
        {
            case UPLOAD_ERR_INI_SIZE:
                $this->error = '超过PHP.INI配置文件指定大小';
                break;

            case UPLOAD_ERR_FORM_SIZE:
                $this->error = '上传文件超过HTML表单指定大小';
                break;

            case UPLOAD_ERR_NO_FILE:
                $this->error = '没有上传任何文件';
                break;

            case UPLOAD_ERR_PARTIAL:
                $this->error = '文件只上传了一部分';
                break;

            case UPLOAD_ERR_NO_TMP_DIR:
                $this->error = '没有上传的临时目录';
                break;

            case UPLOAD_ERR_CANT_WRITE:
                $this->error = '不能写入临时上传文件';
                break;
        }
    }


    /**
     * 开放错误信息
     * @return String Error Message
     */
    public function getError()
    {
        return $this->error;
    }
}