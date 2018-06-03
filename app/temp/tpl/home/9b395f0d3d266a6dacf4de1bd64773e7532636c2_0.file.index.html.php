<?php
/* Smarty version 3.1.30, created on 2018-05-21 13:32:42
  from "E:\PhpStorm Workspace\AQPHP Framework\app\templete\home\Index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5b0259faeeb4e0_53177065',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9b395f0d3d266a6dacf4de1bd64773e7532636c2' => 
    array (
      0 => 'E:\\PhpStorm Workspace\\AQPHP Framework\\app\\templete\\home\\Index\\index.html',
      1 => 1526880760,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5b0259faeeb4e0_53177065 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <meta name="format-detection" content="telephone=no" />
    <meta name="format-detection" content="email=no" />
    <title>华夏微联大数据</title>
    <?php echo '<script'; ?>
 src="home/js/bowser.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="home/js/redirect.js" type="text/javascript"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
>
        var isPad = bowser.tablet;
		if(isPad){
		var meta = document.createElement("meta");
		var head = document.getElementsByTagName("head")[0];
		head.insertBefore(meta,head.childNodes[0]);
		meta.setAttribute("name","viewport");
		meta.setAttribute("content","width=device-width, initial-scale=0.6, user-scalable=0, minimum-scale=0.6, maximum-scale=0.6");
		}
    <?php echo '</script'; ?>
>
    <!--[if !IE]><!-->
	<?php echo '<script'; ?>
 src="home/js/d3.v3.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="home/js/topojson.v1.min.js" type="text/javascript"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="home/js/planetaryjs.js" type="text/javascript"><?php echo '</script'; ?>
>
    <!--<![endif]-->
    <link rel="stylesheet" type="text/css" href="css/global.css">
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="shortcut icon" href="/favicon.ico" type="image/vnd.microsoft.icon">
</head>
<body>
    <div class="wrap head_wrap_index">
        <div class="head_wrap">
        	<div class="head_bgcolor"></div>
            <div class="head">
                <div class="head_con">
                    <a href="./index.html"><h1 class="logo">Tencent</h1></a>
                    <ul class="menu_list">
                        <li ><a href="./company.html"><i class="c_line"></i>公司信息</a></li>
                        <li ><a href="./culture.html"><i class="s_line"></i><i class="c_line"></i>企业文化</a></li>
                        <li ><a href="./system.html"><i class="s_line"></i><i class="c_line"></i>业务体系</a></li>
                        <li ><a href="./investor.html"><i class="s_line"></i><i class="c_line"></i>投资者关系</a></li>
                        <li class="language_1">
                            <a href="javascript:;" class="simple" change_lang="/zh-cn/">简</a>
                            <a href="javascript:;" change_lang="/zh-hk/"><i class="s_line"></i>繁</a>
                            <a href="javascript:;" change_lang="/en-us/"><i class="s_line"></i>EN</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div><div class="banner_wrap">
    <div class="flexslider">
        <ul class="slides">
            <li class="slide-planet">
                <div class="banner_img_planet">
                    <img src="home/picture/planet.jpg" />
                    <div class="mask"></div>
                </div>
                <canvas id='rotatingGlobe' width="400" height="400"></canvas>
                <div class="text text1">赋能你我 连接未来</div>
            </li>
            <li class="slide-video">
                <div class="bg"></div>
                <video src="../video/video1.mp4" loop autoplay preload></video>
                <div class="mask"></div>
                <div class="logo"></div>
                <div class="text text2">青春无畏 冲动不止</div>
            </li>
        </ul>
    </div>
    <div class="custom-navigation">
        <div class="custom-controls-container"></div>
    </div>
</div>
<div class="banner-video">
    <div class="video">
        <div id="video18"></div>
        <div class="close">×</div>
    </div>
</div>
<div class="fullmask"></div>
<div class="main main_index">
    <div class="index_content">
        <div class="index_content_row">
            <div class="mod_article">
                <div class="intro">
                    <h3 class="intro_title article_title">
                                简介
                            </h3>
                    <span class="intro_more"><a href="./abouttencent.html">更多&gt;&gt;</a></span>
                    <div class="clearfix"></div>
                </div>
                <div class="article_con">
                    <p class="article_txt">
                    	
                    </p>
                </div>
            </div>
            <div class="mod_article_right">
                <h3 class="article_title">公司愿景</h3>
                <div class="article_con">
                    <p class="article_txt">

                    </p>
                </div>
            </div>
            <div class="mod_video">
                <h3 class="article_title">视频介绍</h3>
                <div class="video_show" id="video_show">
                    <!--加载视频插件-->
                </div>
                <img id="bg_video" src="home/picture/bg-video.jpg" alt="腾讯企业宣传视频">
                <i id="icon_play"></i>
            </div>
        </div>
        <div class="index_content_row index_content_row_2">
            <div class="mod_article">
                <h3 class="article_title">
                            <a href="./articles/8003481521633431.pdf" title="腾讯公布2017年第四季度及全年业绩【PDF file】" class="title_txt" target="_blank">腾讯公布2017年第四季度及全年业绩【PDF file】</a>
                            <span class="date">03/21</span>
                        </h3>
                <div class="article_con">
                                            <a href="./articles/8003481521633431.pdf" target="_blank" class="link_area">
                                                                    <img src="home/picture/1521623558.jpg" class="cover_img" alt="腾讯公布2017年第四季度及全年业绩【PDF file】">
                                </a>
                </div>
            </div>
            <div class="mod_article_right">
                <h3 class="article_title">
                            <a href="./articles/8003451510737482.pdf" title="腾讯公布2017年第三季度业绩【PDF file】" class="title_txt" target="_blank">腾讯公布2017年第三季度业绩【PDF file】</a>
                            <span class="date">11/15</span>
                        </h3>
                <div class="article_con">
                                            <a href="./articles/8003451510737482.pdf" target="_blank" class="link_area">
                                                                    <img src="home/picture/1510737671.jpg" class="cover_img" alt="腾讯公布2017年第三季度业绩【PDF file】">
                                </a>
                </div>
            </div>
            <div class="mod_news">
                <div class="tab_list">
                                            <a class="tab_item current" href="javascript:;"><i>1</i></a>
                                                <a class="tab_item " href="javascript:;"><i>2</i></a>
                                                <a class="tab_item " href="javascript:;"><i>3</i></a>
                                        </div>
                <div class="news_con">
                    <ul class="news_list list_1 current">
                                                                                                                <li>
                                                                    <a href="./articles/8003451502937229.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/8003431495014482.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/8003411490172512.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/8003251479983154.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/803141477384685.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/8003261479985013.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                                                    </ul>
                    <ul class="news_list list_2">
                                                    <li>
                                                                    <a href="./articles/8003381484552058.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/802741466496787.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/8003381484552142.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800031455587638.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800041455587751.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800051455587802.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                                                    </ul>
                    <ul class="news_list list_3">
                                                    <li>
                                                                    <a href="./articles/800061455587982.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800071455588038.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800081455588084.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800091455588151.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800101455588215.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                                                        <li>
                                                                    <a href="./articles/800111455588264.pdf" target="_blank" class="txt" title="">

                                                                    </a>
                                            <span class="date"></span>
                            </li>
                                                </ul>
                </div>
            </div>
        </div>
    </div>
</div>

        <div class="footer">
            <div class="footer_con">
                <div class="footer_con_wrap">
                    <div class="footer_more">
                        <h4 class="title">了解更多</h4>
                        <ul class="link_list">
                            <li><a href="javascript:;" class="tencent_vista" target="_blank" title=""><i class="ico_online"></i>街景视图</a></li>
                        </ul>
                    </div>
                    <div class="footer_attention">
                        <h4 class="title">关注我们</h4>
                        <ul class="link_list">
                            <li><a href="javascript:;" class="tencent_wx" target="_blank" title=""><i class="ico_wx"></i>微信</a></li>
                            <li><a href="http://t.qq.com/tencent" target="_blank" title=""><i class="ico_wb"></i>腾讯微博</a></li>
                            <li><a href="http://weibo.com/tencent" target="_blank" title=""><i class="ico_sina"></i>新浪微博</a></li>
                        </ul>
                    </div>
                    <div class="footer_joinus">
                        <h4 class="title">加入我们</h4>
                        <ul class="link_list">
                            <li><a href="http://hr.tencent.com/" target="_blank" title="">社会招聘</a></li>
                            <li><a href="http://join.qq.com/" target="_blank" title="">校园招聘</a></li>
                            <li><a href="http://tencent.avature.net/career" target="_blank" title="">国际招聘</a></li>
                        </ul>
                    </div>
                    <div class="footer_contact">
                        <h4 class="title">联系我们</h4>
                        <ul class="link_list">
                            <li><a href="./service.html" target="_blank" title="">客户服务</a></li>
                            <li><a href="./contactus.html" target="_blank" title="">合作洽谈</a></li>
                            <li><a href="./investor.html#info_contact" target="_blank" title="" style="display: none;">联系方式</a></li>
                        </ul>
                    </div>
                    <div class="footer_legal">
                        <h4 class="title">法律信息</h4>
                        <ul class="link_list">
                            <li><a href="./zc/termsofserviceTraditional.shtml" target="_blank" title="">服务协议</a></li>
                            <li><a href="./zc/privacypolicyTraditional.shtml" target="_blank">隐私政策</a></li>
                            <li><a href="../legal/html/zh-cn/index.html" target="_blank" title="">知识产权</a></li>
                        </ul>
                    </div>
                </div>
                <div class="footer_vista_layer">
                    <div class="vista_entrance">
                        <div class="vista_title">
                            <h3>深圳</h3>
                            <ul>
                                <li><a href="http://map.qq.com/#pano=100434Y4131229164016010&heading=356&pitch=-45&zoom=1" target="_blank">腾讯大厦</a></li>
                                <li><a href="http://map.qq.com/#pano=100430V1140902121721000&heading=336&pitch=0&zoom=1" target="_blank">朗科大厦</a></li>
                                <li><a href="http://map.qq.com/#pano=100435X2131228161553400&heading=105&pitch=2&zoom=1" target="_blank">科兴科学园</a></li>
                                <li><a href="http://map.qq.com/#pano=100454X6140902185627370&heading=322&pitch=5&zoom=1" target="_blank">大族科技中心大厦</a></li>
                                <li><a href="http://map.qq.com/#pano=100430V1140914103256000&heading=355&pitch=5&zoom=1" target="_blank">松日鼎盛大厦</a></li>
                                <li><a href="http://map.qq.com/#pano=10041022151014145529900&heading=342&pitch=-16&zoom=1" target="_blank">飞亚达科技大厦</a></li>
                                <li><a href="http://map.qq.com/#pano=100430X9150713132818830&heading=55&pitch=-15&zoom=1" target="_blank">腾讯滨海大厦</a></li>
                            </ul>
                            <h3>北京</h3>
                            <ul>
                                <li><a href="http://map.qq.com/#pano=100133Y2131227000057000&heading=2&pitch=-19&zoom=1" target="_blank">希格玛大厦</a></li>
                                <li><a href="http://map.qq.com/#pano=100132Y7140102141342630&heading=334&pitch=6&zoom=1" target="_blank">第三极大厦</a></li>
                            </ul>
                            <h3>上海</h3>
                            <ul>
                                <li><a href="http://map.qq.com/#pano=100231W8150817153226000&heading=240&pitch=-26&zoom=1" target="_blank">腾讯大厦</a></li>
                                <li><a href="http://map.qq.com/#pano=100230W8150817154829000&heading=245&pitch=-20&zoom=1" target="_blank">腾云大厦</a></li>
                            </ul>
                            <h3>广州</h3>
                            <ul>
                                <li><a href="http://map.qq.com/#pano=100631XA140104000005210&heading=291&pitch=6&zoom=1" target="_blank">TIT创意园</a></li>
                            </ul>
                            <h3>成都</h3>
                            <ul>
                                <li><a href="http://map.qq.com/#pano=100730W6150813100401030&heading=254&pitch=2&zoom=1" target="_blank">成都腾讯大厦</a></li>
                            </ul>
                        </div>
                        <div class="vista_close">
                        </div>
                    </div>
                </div>
                <div class="footer_wx_layer">
                    <div class="wx_account">
                        <div class="account_title">
                            微信公众帐号：腾讯
                        </div>
                        <div class="account_image">
                        </div>
                        <div class="account_close">
                        </div>
                    </div>
                </div>
                <div class="footer_links">
                    <ul>
                        <li><a href="./statement.html" target="_blank">法律声明</a></li>
                        <li><a href="./whistleblowing.html" target="_blank">监督举报</a></li>
                        <li><a href="./sitemap.html" target="_blank">网站地图</a></li>
                        <li class="last"><a href="./permission.html" target="_blank">粤网文【2017】6138-1456号</a></li>
                    </ul>
                </div>
                <div class="footer_copyright">
                    Copyright &copy; 1998 - <span class="footyear"></span> Tencent. All Rights Reserved.<em>腾讯公司 版权所有</em>
                </div>
            </div>
        </div>
    </div>
    <?php echo '<script'; ?>
 src="home/js/jquery-1.11.3.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="home/js/jquery.dotdotdot.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="home/js/jquery.flexslider-min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="home/js/tvp.player_v2_jq.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="home/js/index.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="home/js/template.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="home/js/script.js"><?php echo '</script'; ?>
>

</body>
</html><?php }
}
