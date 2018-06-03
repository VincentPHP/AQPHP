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
 * 数据分页类
 * @author Vincent 
 */
 
class page
{
   private $total_rows;     //总记录数

   private $total_page;     //总分页数

   private $onepage_rows;   //每页显示行数

   private $self_page;      //当前页

   private $url;            //URL地址

   private $page_rows;      //页码数量

   private $start_id;       //开始ID

   private $end_id;         //结束ID

   private $desc = array(); //分页描述

    /**
     * 分页类 构造函数
     * page constructor.
     * @param int $total 总条数
     * @param int $rows 每页显示行数
     * @param int $page_rows 页码数量
     * @param string $desc
     */
   function __construct($total, $rows=10, $page_rows=8, $desc='')
   {
       $this->total_rows    = $total;           //总条数

       $this->onepage_rows  = $rows;            //每页显示行数

       $this->page_rows     = $page_rows;       //页码数量

       $this->total_page    = ceil( $this->total_rows / $this->onepage_rows);                  //总页数

       $this->self_page     = min( $this->total_page, max((int) @$_GET['page'], 1));          //当前页码

       $this->start_id      = ($this->self_page-1) * $this->onepage_rows+1;                         //起始ID

       $this->end_id        = min($this->total_rows,$this->self_page * $this->onepage_rows ); //结束ID

       $this->url           = $this->requestUrl();  //配置URL地址

       $this->desc          = $this->desc($desc);   //分页文字描述
   }


    /**
     * 配置URL地址
     * @return string 链接地址
     */
   private function requestUrl()
   {
      //得到URL地址
      $url = isset($_SERVER['REQUEST_URL']) ? $_SERVER['REQUEST_URL'] : $_SERVER['PHP_SELF'] .'?'. $_SERVER['QUERY_STRING'];

      $request_Arr = parse_url($url);               //解析URL地址 得到一个数组

      if(isset($request_Arr['query']))
      {
          parse_str($request_Arr['query'],$arr);    //解析请求参数

          unset($arr['page']);                      //删除数组中的Page元素

          //合并路径及请求参数为标准的URL地址
          $url = $request_Arr['path'] .'?'. http_build_query($arr) .'&page=';
      }
      else
      {
          //没有请求参数GET的情况下
          $url = strstr($url,'?')? $url.'page=' : $url.'?page=';
      }

      return $url;

   }


   /**
    * 配置文字分页描述
    * "pre"=>"上一页"
    * "next"=>"下一页"
    * "first"=>"首页"
    * "end"=>"末页"
    * "unit"=>"条"
    * @param array $desc 分页描述
    * @return array
    */
   private function desc($desc)
   {
       //默认文字描述
       $d = array(
           'pre'   =>  '上一页',
           'next'  =>  '下一页',
           'first' =>  '首页',
           'end'   =>  '末页',
           'unit'  =>  '条',
       );

       //获取描述进行返回
       if(empty($desc) or !is_array($desc))
       {
           return $d;
       }

       function filter($v)
       {
           return !empty($v);
       }

       //返回合并的数组
       return array_merge( $d, array_filter($desc,"filter"));
   }


   /**
    * 数据分页 SQL的limit
    */
   public function limit()
   {
       return "Limit ".max(0,($this->self_page-1) *
               $this->onepage_rows ) .','. $this->onepage_rows;
   }


   /**
    * 上一页
    */
   public function pre()
   {
      return $this->self_page > 1 ? "<a href='" . $this->url.($this->self_page-1) .
             "'>" . $this->desc['pre'] . "</a>" : '' ;    // $this->desc['pre']
   }


   /**
    * 下一页
    */
   public function next()
   {
      return $this->self_page < $this->total_page ? "<a href='".$this->url.($this->self_page+1).
             "'>" .$this->desc['next']."<a/>" : '';//$this->desc['next']
   }


   /**
    * 首页
    */
   public function first()
   {
       return $this->self_page > 1 ? "<a href='{$this->url}1'>{$this->desc['first']}</a>" : '';
   }


   /**
    * 尾页
    */
   public function end()
   {
       return $this->self_page < $this->total_page ? "<a href='{$this->url}{$this->total_page}'>{$this->desc['end']}</a>" : '' ;
   }


   /**
    * 当前页的记录
    */
   public function nowpage()
   {
       return "第{$this->start_id}{$this->desc['unit']}-{$this->end_id}{$this->desc['unit']}";
   }


   /**
    * 返回当前页码
    */
   public function selfnum()
   {
       return $this->self_page;
   }

   /**
    * 前几页
    * @return string 前几页跳转按钮功能的链接
    */
   public function pres()
   {
       $num = $this->self_page - $this->page_rows;

       return $this->self_page > $this->page_rows ? "<a href='{$this->url}{$num}'>前{$this->page_rows}页</a>" : '';
   }


   /**
    * 后几页
    * @param string 后几页跳转按钮功能的链接
    * @return string
    */
   public function nexts()
   {
       $num = $this->self_page + $this->page_rows;

       return $this->self_page < $this->total_page - $this->page_rows ?
           "<a href='{$this->url}{$num}'>后{$this->page_rows}页</a>" : '';
   }


   /**
    * 统计信息
    */
   public function count()
   {
       return "总页:{$this->total_page}页&nbsp;总条:{$this->total_rows} 条数据";
   }


   /**
    * 返回分页链接及字符串
    */
   private function pagelist()
   {
       $pagelist = array();
       $start    = max(1,min($this->self_page - ceil($this->page_rows/2),$this->total_page - $this->page_rows ));  //开始ID
       $end      = min($this->total_page,$start + $this->page_rows);  //结束ID

       for($i=$start;$i<=$end;$i++)
       {
           //当前页去掉链接
           if( $i==$this->self_page )
           {
               $pagelist[$i]["url"] = '';
               $pagelist[$i]['str'] = $i;
               continue;
           }

           $pagelist[$i]["url"] = $this->url . $i; //组合链接
           $pagelist[$i]['str'] = $i;
       }

       return $pagelist;

      /*  for($i=1;$i<=$this->total_page;$i++){

           if($i==$this->self_page){

               $pagelist .="<strong>{$i}</strong>";

               continue;
           }

           $pagelist .= "<a href='{$this->url}{$i}'>{$i}</a>&nbsp;&nbsp;";

       } */
   }


   /**
    * 字符串表示的页码列表
    */
   public function strlist(){

       $arr = $this->pagelist();

       $pagelist = '';

       foreach($arr as $v){

           $pagelist .= empty($v['url']) ? "<strong>".$v['str']."</strong>" : "<a href='{$v['url']}'>{$v['str']}</a>";

       }

       return $pagelist;

   }


   /**
    * 下拉选择分页
    */
   public function select(){

       $arr = $this->pagelist();

       $str = "<select class='pageSelect'  onchange='javascript:location.href = this.options[selectedIndex].value'>";

       foreach($arr as $v){

           $str .= empty($v['url']) ? "<option value='{$this->url}{$v['str']}' selected='selected'>{$v['str']}</option>":"<option value='{$v['url']}'>{$v['str']}</option>";

       }

       $str .="</select>";

       return $str;
   }


   /**
    * 直接输入页码进行转跳
    */
   public function input(){

       $str = "<input type='text' value='{$this->self_page}' id='pageInput' class='pageInput' 
               onkeydown=\"
                    javascript:if(event.keyCode == 13)
                    {
                       location.href='{$this->url}'+this.value;
                    };
              \" />
                <button onclick = \"javascript:location.href='{$this->url}' + document.getElementById('pageInput').value;\" >跳转</button>";

       return $str;

   }


   /**
    * 显示分页菜单
    * @param integer $style_id 1、2、3是样式类型
    * @return string
    */
   public function show($style_id)
   {
       switch ($style_id){

           case 1:
            return $this->pre().$this->strlist().$this->next();

           case 2:
           return $this->pre().$this->strlist().$this->next().$this->count();

           case 3:
           return $this->pres().$this->select().$this->nexts();
       }
   }
}