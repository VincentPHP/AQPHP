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
use aqphp\core\Directory;

class Image
{
    //是否开启水印
    private $water_on;

    //水印图片
    public $water_img;

    //水印位置
    public $water_pos;

    //水印的透明度
    public $water_pct;

    //图像的压缩比
    public $water_quality;

    //水印文字内容
    public $water_text;

    //水印文字大小
    public $water_text_size;

    //水印文字颜色
    public $water_text_color;

    //水印文字的字体
    public $water_text_font;

    //是否开启缩略图
    private $thumb_on;

    //生成缩略图的方式
    public $thumb_type;

    //缩略图的宽度
    public $thumb_width;

    //缩略图的高度
    public $thumb_height;

    //生成缩略图文件名前缀
    public $thumb_prefix;

    //生成缩略图文件名后缀
    public $thumb_endfix;

    /**
     * 图像处理类 构造函数
     * Image constructor.
     */
    public function __construct()
    {
        //水印配置
        $this->water_on         = config("WATER_ON");
        $this->water_img        = config("WATER_TYPE") == 1 ? config("WATER_IMG") : '';
        $this->water_pct        = config("WATER_PCT");
        $this->water_pos        = config("WATER_POS");
        $this->water_text       = config("WATER_TEXT");
        $this->water_quality    = config("WATER_QUALITY");
        $this->water_text_font  = config("FONT");
        $this->water_text_color = config("WATER_TEXT_COLOR");
        $this->water_text_size  = config("WATER_TEXT_SIZE");

        //缩略图配置
        $this->thumb_on     = config("THUMB_ON");
        $this->thumb_type   = config("THUMB_TYPE");
        $this->thumb_width  = config("THUMB_WIDTH");
        $this->thumb_height = config("THUMB_HEIGHT");
        $this->thumb_prefix = config("THUMB_PREFIX");
        $this->thumb_endfix = config("THUMB_ENDFIX");
    }


    /**
     * 检测环境及图像资源
     * @param $img  图像路径
     * @return bool 检测是否通过
     */
    private function check($img)
    {
        $type = array('.jpg','.jpeg','.png','.gif');

        $imgType = strtolower(strrchr($img,'.'));

        return extension_loaded('gd') && file_exists($img) && in_array($imgType, $type);
    }


    /**
     * 获得缩略图的尺寸信息
     * @param int $img_w 原图宽度
     * @param int $img_h 原图高度
     * @param int $t_w 缩略图宽
     * @param int $t_h 缩略图高
     * @param string $t_type 处理方式
     * @return array 所需要的尺寸
     */
    private function thumb_size($img_w, $img_h, $t_w, $t_h, $t_type)
    {
        //初始化缩略图尺寸
        $w = $t_w;
        $h = $t_h;

        //初始化原图尺寸
        $cut_w = $img_w;
        $cut_h = $img_h;

        if($img_w <= $t_w && $img_h <= $t_h)
        {
            $w = $img_w;
            $h = $img_h;
        }
        else
        {
            switch ($t_type)
            {
                case 1:
                    //固定宽度 高度自增
                    $h = $t_w / $img_w * $img_h;
                    break;
                case 2:
                    //固定高度 宽度自增
                    $w = $t_h / $img_h * $img_w;
                case 3:
                    //固定宽度 高度裁剪
                    $cut_h = $img_w / $t_w * $t_h;
                    break;
                case 4:
                    //固定高度 宽度裁剪
                    $cut_w = $img_h / $t_h * $t_w;
                    break;
                case 5:
                default:
                    if(($img_w / $t_w) > ($img_h / $t_h))
                    {
                        $h = $t_w / $img_w * $img_h;
                    }
                    elseif(($img_w / $t_w) < ($img_h / $t_h))
                    {
                        $w = $t_h / $img_h * $img_w;
                    }
                    else
                    {
                        $w = $t_w;
                        $h = $t_h;
                    }
            }
        }

        //组合返回格式
        $arr[0] = $w;
        $arr[1] = $h;
        $arr[2] = $cut_w;
        $arr[3] = $cut_h;

        return $arr;
    }


    /**
     * 图片裁剪处理
     * @param string $img        操作的图片路径
     * @param string $outfile    输出文件路径
     * @param string $t_type     裁剪图片的方式
     * @param string $t_w        缩略图宽度
     * @param string $t_h        缩略图高度
     * @return string $outfile   处理后的文件名
     */
    public function thumb($img, $outfile='', $t_type='', $t_w='', $t_h='')
    {
        //基础设置
        $t_type = $t_type ? $t_type : $this->thumb_type;
        $t_w    = $t_w    ? $t_w    : $this->thumb_width;
        $t_h    = $t_h    ? $t_h    : $this->thumb_height;

        //检测图像与环境
        if(!$this->thumb_on || !$this->check($img)) return false;

        //获得图像信息
        $img_info = getimagesize($img);
        $img_w    = $img_info[0];
        $img_h    = $img_info[1];
        $img_type = image_type_to_extension($img_info[2]);

        //获得相关尺寸信息
        $thumb_size = $this->thumb_size($img_w, $img_h, $t_w, $t_h, $t_type);

        //创建原始图像资源

        //组合函数
        $func = "imagecreatefrom".substr($img_type,1);
        $res_img = $func($img);

        //缩略图资源
        if($img_type == '.gif' || $img_type == '.png')
        {
            $res_thumb = imagecreate($thumb_size[0], $thumb_size[1]);
            $color = imagecolorallocate($res_thumb, 255, 0, 0);
        }
        else
        {
            $res_thumb = imagecreatetruecolor($thumb_size[0], $thumb_size[1]);
        }

        //制作缩略图
        if(function_exists("imagecopyresampled"))
        {
            //如果(图像重新取样)函数存在 就用重新采样
            imagecopyresampled($res_thumb, $res_img, 0, 0, 0,0,
                $thumb_size[0], $thumb_size[1], $thumb_size[2], $thumb_size[3]);
        }
        else
        {
            imagecopyresized($res_thumb, $res_img, 0, 0, 0,0,
                $thumb_size[0], $thumb_size[1], $thumb_size[2], $thumb_size[3]);
        }

        //处理透明色
        if($img_type =='.gif' || $img_type == '.png')
        {
            imagecolortransparent($res_thumb, $color);
        }

        //配置输出文件名
        $thumbPath = config("THUMB_PATH");

        Directory::create($thumbPath);  //获取上传路径 创建目录

        $info = pathinfo($img);

        $fileName = $this->thumb_prefix.$info['filename'].
                    $this->thumb_endfix.'.'.$info['extension'];

        $outfile = $outfile ? $thumbPath .'/'.$outfile : $thumbPath .'/'.$fileName;

        //保存文件
        $func = "image".substr($img_type, 1);
        $func($res_thumb, $outfile);

        //销毁图像资源
        if(isset($res_thumb)) imagedestroy($res_thumb);
        if(isset($res_img))   imagedestroy($res_img);

        return $outfile;
    }


    /**
     * 生成水印图片
     * @param $img               原图路径
     * @param string $out_img    输出路径
     * @param string $water_img  水印图片路径
     * @param string $pos        选择水印位置
     * @param string $text       文字水印内容
     * @param string $pct        水印透明度
     * @return bool true or false
     */
    public function watermark($img, $out_img='', $water_img='' ,$pos='', $text='', $pct='')
    {
        //验证原图像
        if(!$this->check($img) || !$this->water_on) return false;

        //验证水印图像
        $water_img = $water_img ? $water_img : $this->water_img;
        $waterImg_on = $this->check($water_img)? 1 : 0;

        //判断另存图像
        $out_img = $out_img ? $out_img : $img;

        //水印位置
        $pos = $pos ? $pos : $this->water_pos;

        //水印文字
        $text = $text ? $text : $this->water_text;

        //水印透明度
        $pct = $pct ? $pct : $this->water_pct;

        //获取图像资源信息
        $img_info = getimagesize($img);
        $img_w = $img_info[0];
        $img_h = $img_info[1];

        //获取水印信息
        if($waterImg_on)
        {
            $w_info = getimagesize($water_img);

            $w_w = $w_info[0];
            $w_h = $w_info[1];

            //获取图像类型
            switch ($w_info[2])
            {
                case 1:
                    $w_img = imagecreatefromgif($water_img);
                    break;
                case 2:
                    $w_img = imagecreatefromjpeg($water_img);
                    break;
                case 3:
                    $w_img = imagecreatefrompng($water_img);
                    break;
            }
        }
        else
        {
            //文字水印信息
            if(empty($text) || strlen($this->water_text_color) != 7) return false;

            $text_info = imagettfbbox($this->water_text_size, 0, $this->water_text_font, $text);
            $w_w = $text_info[2] - $text_info[6];
            $w_h = $text_info[3] - $text_info[7];
        }

        //建立图像资源
        if($img_h < $w_h || $img_w < $w_w) return false;
        switch ($img_info[2])
        {
            case 1:
                $res_img = imagecreatefromgif($img);
                break;
            case 2:
                $res_img = imagecreatefromjpeg($img);
                break;
            case 3:
                $res_img = imagecreatefrompng($img);
                break;
        }

        //水印位置处理
        switch ($pos)
        {
            case 1:
                $x = $y = 25;
                break;
            case 2:
                $x = ($img_w - $w_w) / 2; //图片宽度 - 水印宽度 /2 = 水印居中
                $y = 25;
                break;
            case 3:
                $x = $img_w - $w_w -10;       //图片宽度 - 水印宽度 = 水印居右
                $y = 25;
                break;
            case 4:
                $x = 25;
                $y = ($img_h - $w_h) / 2; //图片高度 - 水印高度 = 等于水印高度居中
                break;
            case 5:
                $x = ($img_w - $w_w) / 2; //图片高度 - 水印高度 /2 = 高度居中
                $y = ($img_h - $w_h) / 2; //图片宽度 - 水印宽度 /2 = 宽度居中
                break;
            case 6:
                $x = $img_w - $w_w;
                $y = ($img_h - $w_h) / 2;
                break;
            case 7:
                $x = 25;
                $y = $img_h - $w_h - 10;
                break;
            case 8:
                $x = ($img_w - $w_w) / 2;
                $y = $img_h - $w_h - 10;
                break;
            case 9:
                $x = $img_w - $w_w - 10;
                $y = $img_h - $w_h - 10;
                break;
            default:
                $x = mt_rand(25, $img_w - $w_w);
                $y = mt_rand(25, $img_h - $w_h);
        }

        if($waterImg_on)
        {
            if($w_info[2])
            {
                //组合PNG图像水印
                imagecopy($res_img, $w_img, $x, $y, 0, 0,$w_w, $w_h);
            }
            else
            {
                //组合其余图像水印
                imagecopymerge($res_img, $w_img, $x, $y, 0, 0, $w_w, $w_h, $pct);
            }
        }
        else
        {
            //组合字体水印
            //定义颜色
            $r = hexdec(substr($this->water_text_color, 1, 2));
            $g = hexdec(substr($this->water_text_color, 3, 2));
            $b = hexdec(substr($this->water_text_color, 5, 2));

            $color = imagecolorallocate($res_img, $r, $g, $b);

            imagettftext($res_img, $this->water_text_size, 0, $x, $y, $color, $this->water_text_font, $text);
        }

        switch ($img_info[2])
        {
            case 1:
                imagegif($res_img, $out_img);
                break;
            case 2:
                imagejpeg($res_img, $out_img, $this->water_quality);
                break;
            case 3:
                imagepng($res_img, $out_img);
                break;
        }

        //释放资源
        if(isset($res_img)) imagedestroy($res_img);
        if(isset($w_img))   imagedestroy($w_img);

        return true;
    }
}