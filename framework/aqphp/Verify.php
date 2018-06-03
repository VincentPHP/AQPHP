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
 * 验证码类
 * @author Vincent
 */

class Verify
{
    /**
     * 图像资源
     * @var
     */
    private $image;

    /**
     * 画布宽度
     * @var Integer $width
     */
    public $width;

    /**
     * 画布高度
     * @var Integer $height
     */
    public $height;

    /**
     * 背景颜色
     * @var String $bgColor;
     */
    public $bgColor;

    /**
     * 验证码
     * @var String $code
     */
    public $code;

    /**
     * 验证码随机种子
     * @var string $codeStr
     */
    public $codeStr;

    /**
     * 验证码长度
     * @var Integer $codeLen
     */
    public $codeLen;

    /**
     * 验证码字体
     * @var String $font
     */
    public $font;

    /**
     * 字体大小
     * @var integer $fontSize
     */
    public $fontSize;

    /**
     * 验证码字体颜色
     * @var string
     */
    public $fontColor;

    /**
     * 验证码类 构造函数
     * Verify constructor.
     */
    public function __construct()
    {
    	$this->codeStr  = config("CODE_STR");
        $this->font     = config("FONT");
		$this->width    = config("CODE_WIDTH");
		$this->height   = config("CODE_HEIGHT");
		$this->bgColor  = config("CODE_BG_COLOR");
		$this->codeLen  = config("CODE_LEN");
		$this->fontSize = config("CODE_FONT_SIZE");
		$this->fontColor= config("CODE_FONT_COLOR");

		$this->create();
    }


    /**
     * 生成验证码
     */
    private function createCode()
    {
    	$code = '';
        for($i=0;$i<$this->codeLen;$i++)
        {
            $code .= $this->codeStr[mt_rand(0, strlen($this->codeStr)-1)];
        }

        $this->code = strtoupper($code);

		$_SESSION[config("CODE")] = $this->code;
    }


    /**
     * 获得验证码
     * @return String 生成的验证码
     */
    public function getCodeStr()
    {
    	$this->createCode();
        return  $this->code;
    }


    /**
     * @param $verify 用户提交的验证码字符串
     * @param bool $lower 是否不区分大小写
     * @return bool true or false
     */
    public function check($verify, $lower=true)
    {
        if(empty($verify)) error('请传递需要进行检验的验证码！');

        if($lower && strtolower(config("CODE")) == strtolower($verify))
        {
            return true;
        }
        else if(session(config("CODE")) == $verify)
        {
            return true;
        }

        return false;
    }


    /**
     * 建画布
     */
    public function create()
    {
        $w = $this->width;
        $h = $this->height;
        $bgColor = $this->bgColor;

        if(!$this->checkGD()) return false;

        $image = imagecreatetruecolor($w, $h);
                    $bgColor = imagecolorallocate($image,
                    hexdec(substr($bgColor, 1, 2)),
                    hexdec(substr($bgColor, 3, 2)),
                    hexdec(substr($bgColor, 5, 2))
                 );

        imagefill($image, 0, 0, $bgColor);

        $this->image = $image;
        $this->createFont();
        $this->createPix();
    }


    /**
     * 写入验证码文字
     */
    private function createFont()
    {
        $this->createCode();
        $color = $this->fontColor;

        $fontColor = imagecolorallocate($this->image,
        				hexdec(substr($color, 1, 2)),
                        hexdec(substr($color, 3, 2)),
                        hexdec(substr($color, 5, 2))
                     );

        $X = $this->width / $this->codeLen;

        for($i=0; $i<$this->codeLen; $i++)
        {
        	if(empty($color))
        	{
        		$fontColor = imagecolorallocate($this->image,
        						mt_rand(50,155),
        						mt_rand(50,155),
        						mt_rand(50,155)
							 );
        	}

            imagettftext($this->image, $this->fontSize,
            	mt_rand(-30, 30), $X * $i + mt_rand(3, 6),
            	mt_rand($this->height / 1.2, $this->height - 5),
         		$fontColor, $this->font, $this->code[$i]
			);
        }

        $this->fontColor = $fontColor;
    }


    /**
     * 画 线
     */
    private function createPix()
    {
       $fontColor = $this->fontColor;

       for($i=0; $i<50; $i++)
       {
           imagesetpixel($this->image,
              mt_rand(0, $this->width),
              mt_rand(0, $this->height), $fontColor
           );
       }

       for($j=0; $j<2; $j++)
       {
           imagesetthickness($this->image, mt_rand(1,2));
           imageline($this->image,
              mt_rand(0, $this->width), mt_rand(0, $this->height),
              mt_rand(0, $this->width), mt_rand(0, $this->height),
              $fontColor
           );
       }
    }


    /**
     * 显示验证码
     */
    public function getImage()
    {
        header('Content-type:image/png' );		//发送头部
        imagepng($this->image);
        imagedestroy($this->image);
    }


    /**
     * 检测GD库是否开启 imagepng函数是否可用
     * @return bool 是否开启GD库
     */
    private function checkGD()
    {
        return extension_loaded('gd') && function_exists('imagepng');
    }
}