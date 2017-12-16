<?php
/* +----------------------------------------------------------------
 * | Software: [AQPHP framework]
 * |  WebSite: www.aqphp.com
 * |----------------------------------------------------------------
 * | Author: 赵 港 <Vincent> < admin@gzibm.com | 847623251@qq.com >
 * | WeChat: GZIDCW
 * | Copyright (C) 2015-2020, www.aqphp.com All Rights Reserved.
 * +----------------------------------------------------------------*/

/**
 * 输出错误信息
 * @param String $error 错误信息
 */
function error($error)
{
    if(config("DEBUG"))
    {
        if(!is_array($error))
        {  
            $backtrace = debug_backtrace();

            $e['message'] = $error;
    
            $info = '';
            foreach ($backtrace as $v )
            {
                $file = isset($v['file']) ? $v['file'] :'';
                $line = isset($v['line']) ? $v['line'] :'';
                $class= isset($v['class'])? $v['class']:'';
                $type = isset($v['type']) ? $v['type'] :'';
                $function = isset($v['function'])?$v['function']:'';
                $info .= $file.'&nbsp;['.$line.']&nbsp;'.$class.$type.$function.'()<br/>';
            }
            
            $e['info'] = $info;
		}
		else
        {
            $e = $error;
        }
    }
    else
    {
        $e['message'] = config("ERROR_MESSAGE");
    }
    
    include config('DEBUG_TPL');

    exit;
}


/**
 * 对象转数组
 * @param  Array $array 对象
 * @return Array $array 数组
 */
function objectToArray($array)
{
    if(is_object($array))
    {
        $array = (array)$array;
    }
    
    if(is_array($array))
    {
        foreach($array as $k=>$v)
        {
            $array[$k] = objectToArray($v);
        }
    }
    
    return $array;
}


/**
 * 提示性错误
 * @param Array $error 错误信息
 */
function notice($error)
{
    if( config("DEBUG") && config("NOTICE_SHOW"))
    {
        $time = number_format((microtime(true)-\aqphp\core\DeBug::$runTime['APP_START']),4);
        
        $memory = memory_get_usage();
        
        $message = $error[1];
        $file    = $error[2];
        $line    = $error[3];
        
        $msg = "
        <h1 style='font-size:13px;background-color:#333;
                   height:20px;width:896px;line-height:1.8em;
                   padding:3px;margin-top:10px;color:#fff;'>
            NOTICE:$message
        </h1>
        <div>
            <table style='border:1px solid #dcdcdc;width:902px;padding:5px;'>
                <tr><td>Time</td><td>File</td><td>Line</td></tr>
                <tr><td>$time</td><td>$memory</td><td>$file</td><td>$line</td></tr>
            </table>    
        </div>";

        echo $msg;
    }
}


/**
 * 实例化控制器
 * @param String $control 控制器名
 * @return bool|mixed false or 控制器名
 */
function A($control)
{
   if(strstr($control,'.'))
   { 
       $arr = explode('.', $control);
       
       $module  = $arr[0];
       $control = $arr[1];
   }
   else
   {
       $module = MODULE;
   }
   
   static $controlArr = array();
   
   $control = $control.config("CONTROL_FIX");
   
   if(isset($controlArr[$control]))
   {
       return $controlArr[$control];
   }
   
   $controlPath = MODULE_PATH.'/'.$module.'/controller/'.$control.config("CLASS_FIX").'.php';

   loadFile($controlPath);//载入文件函数
   
   $control = "\\$module\\controller\\$control";

   if(class_exists($control))
   {
       $controlArr[$control] = new $control();
       return $controlArr[$control];
   }
   else
   {    
       return false;
   }
}


/**
 * 实例化数据库表
 * @param String $tableName 表名
 * @return object 数据库表
 */
function M($tableName)
{
    return new aqphp\core\Database($tableName);
}


/**
 * 接收处理数据
 * @param String $method 数据提交方式
 * @param string $default 默认值
 * @return Array $db 提交过滤后的数据
 */
function request($method, $default='')
{
    if(empty($method))
    {
       error('请传入需要获取的数据方式 例如：POST，GET，SESSION');
    }
	
	$arr = strstr($method,'.') ? explode('.', $method) : error("请在需要获取方式后面加上'.'");
	
	$arr[1] = strtolower($arr[1]);
	
	switch(strtoupper($arr[0]))
	{
		case 'POST':
	
			if(!empty($arr[1]))
        	{
        		$data = !empty($_POST[$arr[1]]) ? $_POST[$arr[1]] : $default;
			}
			else
			{
				$data = $_POST;
			}
			
			return $data;
			
		    break;
		
		case 'GET':
			
			if(!empty($arr[1]))
        	{
        		$data = !empty($_GET[$arr[1]]) ? $_GET[$arr[1]] : $default;
			}
			else
			{
				$data = $_GET;
			}
			
			return $data;

		    break;
			
		case 'SESSION':
			
			if(!empty($arr[1]))
        	{
        		$data = !empty($_SERVER[$arr[1]]) ? $_SESSION[$arr[1]] : $default;
			}
			else
			{
				$data = $_SESSION;
			}
			
			return $data;

		    break;
	}    
}


/**
 * 生成唯一序列号
 * @param String $var 参数
 * @return String  生成后的字符串
 */
function md5Str($var)
{
    return md5(serialize($var));
}


/**
 * 实例化对象或执行方法
 * @param String $class  实例化类
 * @param String $method 方法名
 * @param Array  $args   对象参数
 * @return Object $result  返回一个对象
 */
function O($class, $method=null, $args=array())
{
    static $result = array();
    
    $name = empty($args)? $class.$method : $class.$method.md5Str($args);
      
    if(!isset($result[$name]))
    {
        $obj = new $class();
        
        if(!is_null($method) && method_exists($obj, $method))
        {
            if(!empty($args))
            {
               $result[$name] = call_user_func_array(array(&$obj, $method),array($args));
            }
            else
            {
                $result[$name] = $obj->$method();
            }
        }
        else
        {
            $result[$name] = $obj;
        }
    }
    
    return $result[$name];
}


/**
 * 载入某个文件
 * @param String $file 需要载入的文件名
 * @return array 已载入的文件
 */
function loadFile($file='')
{
    static $fileArr = array();
        
    if(empty($file)) return $fileArr;
    
    $filePath = realpath($file);

    if(isset($fileArr[$filePath]))
    {
       return $fileArr[$filePath];
    }

    if(!is_file($filePath))
    {
       error('文件'.$file.'不存在');
    }

    require $filePath;

    $fileArr[$filePath] = true;
}


/**
 * 配置文件处理
 * @param String $name 配置项名
 * @param String $value 为配置项设置值
 * @return Array|bool 返回配置后的结果
 */
function config($name, $value=null)
{
    static $config = array();
    
    if(is_null($name)) //无name值 返回空数组
    {
        return $config;
    }
    
    if(is_string($name))
    {
       $name = strtolower($name); //转换为小写
        
       if(!strstr($name,'.'))
       {
           if(is_null($value)) //判断是否存在默认值
           {
               return isset($config[$name]) ? $config[$name] : null ; //无默认值情况下 返回配置项值
           }
           else
           {
               $config[$name] = $value; //有值 则赋值给配置项
               return;
           }
       }
       else
       {
           $name = explode(".", $name);

           if(is_null($value))
           {
               return isset($config[$name[0][1]]) ? $config[$name[0][1]] : null ;
           }
           else
           {
               $config[$name[0][1]] = $value ;
               return;
           }
       }
   }
    
   if(is_array($name))
   {
       $config = array_merge($config, array_change_key_case($name));//合并数组 数组键名转换为大写
       return true;
   }
}


/**
 * 格式化内容 去空白
 * @param String $fileName 文件名
 * @return String 去掉空白及注释后的文件内容
 */
function delSpace($fileName)
{
    $data = file_get_contents($fileName);
    
    $data = substr($data,0,5) == '<?php'? substr($data,5) : $data ;//删除php开始标记
    $data = substr($data,-2) == '?>' ? substr($data,0,-2) : $data ;//删除php结束标记
    
    $pregArr = array('/\/\*.*?\*\/\s*/is','/\/\/.*?[\r\n]/is','/(?!\w)\s*?(?!\w)/is');

    return  preg_replace($pregArr,'', $data);//正则替换
}


/**
 * 格式化打印
 * @param String $msg 打印的内容
 */
function P($msg)
{
    echo '<pre>';
    
    print_r($msg);
    
    echo '</pre>';
}


/**
 * 转跳函数 
 * @param String $url 模块/控制/方法
 * @return string $db 转跳网址
 */
function U($url)
{	
    $module = MODULE;
    $control= CONTROL;
    
	if(strstr($url, '/'))
	{
		$urlData = explode('/', $url);
				
		switch(count($urlData))
		{
			case 1:
				$data = "/?m={$module}&c={$control}&a={$urlData[0]}";
			    break;
			case 2:
				$data = "/?m={$module}&c={$urlData[0]}&a={$urlData[1]}";
			    break;
			default:
				$data = "/?m={$urlData[0]}&c={$urlData[1]}&a={$urlData[2]}";
			    break;
		}
	}	
	else
	{
		$data = "/?m={$module}&c={$control}&a={$url}";
	}
	
	return $data;
}


/**
 * 设置SESSION 或 获取SESSION值
 * @param String $string SESSION名
 * @param String $value  SESSION值
 * @return String $_SESSION  
 */
function session($string, $value='Return')
{
    if(!isset($string))
    {
        error('请输入需要设置或需要获取的SESSION名');
    }
    
    if($value == 'Return')
    {
        $info = isset($_SESSION[$string]) && !is_null($_SESSION[$string]) ? $_SESSION[$string] : FALSE;
    }
    else if($value == '')
    {
        unset($_SESSION[$string]);

        session_destroy();

        $info = FALSE;
    }
    else
    {
        $_SESSION[$string] = $value;

        $info = TRUE;
    }

    return $info;
}