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
 * 数据库操作类
 * @property \mysqli
 * @author Vincent
 */

class Db
{
    /**
     * 数据库连接
     * @var String $mysqli 数据库连接
     */
    protected $mysqli;
    
    /**
     * 实例化的表名
     * @var String $table 表名
     */
    protected $table;
    
    /**
     * 选项
     * @var String $opt 选项
     */
    protected $opt;

    /**
     * 数据库类 构造方法
     * Db constructor.
     * @param String $tabName 数据库表名
     */
    function __construct($tabName)
    {
        $this->config($tabName);
    }


    /**
     * 配置方法
     * @param $tabName
     */
    protected function config($tabName)
    {
        $this->table = config('DBFIX').$tabName;

        $this->data = new \mysqli(config('DBHOST'), config('DBUSER'),
                                  config('DBPWD'), config('DBNAME'));

        if(mysqli_connect_errno())
        {
            echo "数据库连接错误" . mysqli_connect_errno();
            exit();
        }
        
        $this->data->query("SET NAMES 'UTF8");
        
        $this->opt['field'] = "*";
        
        $this->opt['where'] = $this->opt['order'] = $this->opt['limit'] = $this->opt['group'] = '';
    }


    /**
     * 获取表名
     * @return array
     */
    function tbFields()
    {
        $result = $this->data->query("DESC {$this->table}");
        
        $fieldArr = array();
        
        while (($row = $result->fetch_assoc()) != FALSE )
        {
            $fieldArr[] = $row['Field'];    
        }
        
        return $fieldArr;
    }


    /**
     * SQL Field 获得查询的字段
     * @param String | array $field 需要的查询的字段名 可以是字符串或数组
     * @return array 字段列表
     */
    function field($field)
    {
        $fieldArr = is_string($field) ? explode( ",", $field ) : $field ;   //如果是字符串以逗号分割为数组
        
        if(is_array($fieldArr))
        {    
            $field = '';        //定义空数组 接收循环组合的数据
            
            foreach($fieldArr as $v)
            {
                $field .= "`" . $v . "`" . ","; //组合需要的格式 多一个,号
            }
        }
        
        $this->opt['field'] = rtrim( $field, ',' );//截取多余的，号，并保存到OPT里 
        
        return  $this->opt['field'];
    }


    /**
     * 数据数组转换为字符串格式 同时进行转义
     * @param  Array $value 需要转换的数组
     * @return String 转换后的数组
     */
    protected function values($value)
    {
        $strValue = '';

    	if( !get_magic_quotes_gpc() )
    	{
    		foreach( $value as $v )
    		{
    			$strValue .= "'" . addslashes( $v ) . "',";	
    		}  		
    	}
    	else 
    	{
			foreach( $value as $v )
			{
				$strValue .= "'$v',";
			}
		}
		
    	return rtrim( $strValue );
    }


    /**
     * SQL条件查询 WHERE
     * @param  string $text 字段
     * @param  String $where 条件
     * @param  String $value 数值
     * @return Db $this
     */
    function where($text, $where, $value)
    {
    	$whereData = is_array($text) ? $text : $text.$where."'{$value}'";

        $this->opt['where'] = "WHERE ".$whereData;//如果传参的内容为字符串直接返回 不是则为空

        return $this;
    }


    /**
     * SQL LIMIT 分页语句
     * @param String $limit 分页条件
     * @return Db $this
     */
    function limit($limit)
    {
        $this->opt['limit'] = is_string($limit) ? "LIMIT " . $limit : '' ;

        return $this;
    }


    /**
     * 排序 ORDER
     * @param String $order 排序
     * @return Db $this
     */
    function order($order)
    {
        $this->opt['order'] = is_string($order) ? "ORDER BY " . $order : '' ;

        return $this;
    }


    /**
     * 分组 GROUP
     * @param string $group 分组
     * @return Db $this
     */
    function group($group)
    {
        $this->opt['group'] = is_string($group) ? "GROUP BY " . $group : '' ;

        return $this;
    }


    /**
     * 查询 SELECT
     * @return array 查询后的数据
     */
    function select()
    {
        //组合SQL语句
        $sql = "SELECT {$this->opt['field']} FROM {$this->table} {$this->opt['where']}
                {$this->opt['group']} {$this->opt['limit']} {$this->opt['order']}";

        return $this->sql($sql);
    }


    /**
     * 获取单条数据
     * @return array 获取单条数据
     */
    function find()
    {
        $sql = "SELECT {$this->opt['field']} FROM {$this->table} {$this->opt['where']}";
        
		$result = $this->data->query($sql) or die($this->dbError());

        $row = $result->fetch_assoc();
		
        return $row;   
    }


    /**
     * 删除 DELETE
     * @param String $id 需要查找的id
     * @return int 删除的ID号
     */
    function delete( $id = '' )
    {
        if($id == '' && empty($this->opt['where']))
        {  
            die('查询的条件不能为空');
        }
            
        if($id != '')
        {
            if(is_array($id))
            {
                $id = implode(',', $id);
            }
            
            $this->opt['where'] = "WHERE id IN (" . $id . ")";

        }
         
        $sql = "DELETE FROM {$this->table} {$this->opt['where']} {$this->opt['limit']}";
		
        return $this->query($sql);
    }


    /**
     * 添加数据 INSERT
     * @param array $args 需要添加数据  类型数组
     * @return bool|string 是否添加成功 成功返回新ID
     */
    function insert($args)
    {
    	is_array($args) or die('参数非数组');
		
        $fidles = $this->field(array_keys($args));

        $values = rtrim( $this->values(array_values($args)),',');

        $sql = "INSERT INTO {$this->table}($fidles) values($values)";

    	if($this->query($sql) > 0)
        {
    		return $this->data->insert_id;
    	}

		return FALSE;
    }


    /**
     * UPDATE 更新方法
     * @param array $args 需要更新的数据内容 类型为数组
     * @return int 更新的条数
     */
    function update($args)
    {
    	is_array( $args ) or die('参数非数组'); 
    	
    	if(empty($this->opt['where'])) die('条件不能为空');
    	
    	$set = '';
    	
    	$gpc = get_magic_quotes_gpc();
    	
    	foreach ($args as $v=>$k)
    	{    	    
    		$v = !$gpc ? addslashes($v) : $v ; //转义处理	
    		$set .= "`{$v}`='".$k."',";
    	}
    	
		$set = rtrim($set,','); 		
		$sql = "UPDATE {$this->table} SET $set {$this->opt['where']}";

    	return $this->query($sql);
    }


    /**
     * count 分页查询
     * @param string $tabname 需要查询的表
     * @return array 查询后的数据列表
     */
    function count($tabname = '')
    {
		$tabname = $tabname=='' ? $this->table : $tabname ;
		
		$sql = "SELECT 'id' FROM {$tabname} {$this->opt['where']}";
		
		return $this->query($sql);
    }


    /**
     * 没有结果集
     * @param string $sql 执行的SQL语句
     * @return int 返回影响条数
     */
    function query($sql)
    {
        $this->data->query($sql) or die($this->dbError());

        return $this->data->affected_rows;
    }


    /**
     * 发送SQL返回结果集
     * @param String $sql 执行的SQL语句
     * @return array 返回的数据集
     */
    function sql($sql)
    {
        $result = $this->data->query($sql) or die($this->dbError());
        
        $resultArr = array();
        
        while (($row = $result->fetch_assoc()) != FALSE)
        {
            $resultArr[] = $row;  
        }
	
        return $resultArr;
    }


    /**
     * 返回错误信息
     * @return String 返回错误信息
     */
    function dbError()
    {
        return $this->data->error;
    }
}