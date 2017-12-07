<?php
/* Smarty version 3.1.30, created on 2017-08-28 02:28:56
  from "D:\yangyaozhong\Wnmp\html\page\application\view\Pages\create.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a3b8289083c7_89130059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7100cf48b67776461045392b34205bb6ce2dd7fa' => 
    array (
      0 => 'D:\\yangyaozhong\\Wnmp\\html\\page\\application\\view\\Pages\\create.html',
      1 => 1503901732,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a3b8289083c7_89130059 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_baseurl')) require_once 'D:\\yangyaozhong\\Wnmp\\html\\page\\trunk\\extend\\Smarty\\plugins\\function.baseurl.php';
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf-8">
		<title>PGS-页面管理系统</title>
		<meta name="renderer" content="webkit|ie-comp|ie-stand">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
		<meta http-equiv="Cache-Control" content="no-siteapp" />
		<link rel="Bookmark" href="favicon.ico" >
		<link rel="Shortcut Icon" href="favicon.ico" />
		<!--[if lt IE 9]>
		<?php echo '<script'; ?>
 type="text/javascript" src="lib/html5.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="lib/respond.min.js"><?php echo '</script'; ?>
>
		<![endif]-->
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/lib/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
> 
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/h-ui/css/H-ui.min.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/h-ui.admin/css/H-ui.admin.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/lib/Hui-iconfont/1.0.8/iconfont.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/h-ui.admin/skin/default/skin.css" id="skin" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/h-ui.admin/css/style.css" />
		<link rel="stylesheet" type="text/css" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/style.css" />
        
     
		

	</head>
	<body>
		<header class="navbar-wrapper">
			<div class="navbar navbar-fixed-top">
				<div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">PGS</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a> 
					<span class="logo navbar-slogan f-l mr-10 hidden-xs">页面生成系统</span> 
                　　<a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
					<!-- 
					<nav class="nav navbar-nav">
						<ul class="cl">
							<li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
								<ul class="dropDown-menu menu radius box-shadow">
									<li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
									<li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
									<li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
									<li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
								</ul>
							</li>
						</ul>
					</nav>
					-->
					<nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
						<ul class="cl">
							<li>超级管理员</li>
							<li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A">admin <i class="Hui-iconfont">&#xe6d5;</i></a>
								<ul class="dropDown-menu menu radius box-shadow">
									<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
									<li><a href="#">切换账户</a></li>
									<li><a href="#">退出</a></li>
								</ul>
							</li>
							<li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
								<ul class="dropDown-menu menu radius box-shadow">
									<li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
									<li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
									<li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
									<li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
									<li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
									<li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
								</ul>
							</li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
		<aside class="Hui-aside">
			<div class="menu_dropdown bk_2">
				<dl id="menu-product">
					<dt  class="selected"><i class="Hui-iconfont">&#xe616;</i> 页面管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd style="display: block;">
						<ul>
							<li><a href="<?php echo smarty_function_baseurl(array('url'=>'pages/create'),$_smarty_tpl);?>
" title="品牌管理">页面生成</a></li>
							<li><a href="product-category.html" title="分类管理">页面管理</a></li>
							<li><a href="product-list.html" title="产品管理">访问统计</a></li>
						</ul>
					</dd>
				</dl>
				<dl id="menu-admin">
					<dt><i class="Hui-iconfont">&#xe62d;</i> 用户管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
						<ul>
							<li><a href="product-brand.html" title="品牌管理">添加用户</a></li>
							<li><a href="product-category.html" title="分类管理">用户列表</a></li>
						</ul>
					</dd>
				</dl>
				<dl id="menu-system">
					<dt><i class="Hui-iconfont">&#xe62e;</i> 系统管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
						<ul>
							<li><a href="product-brand.html" title="品牌管理">系统日志</a></li>
							<li><a href="product-category.html" title="分类管理">用户列表</a></li>
						</ul>
					</dd>
				</dl>
			</div>
		</aside>
		<div class="dislpayArrow hidden-xs">
			<a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a>
		</div>
		
		<section class="Hui-article-box">
            <nav class="breadcrumb"><i class="Hui-iconfont"></i> 首页
              <span class="c-gray en">&gt;</span>
                页面生成
                <a class="btn btn-primary radius r" style="line-height:1.6em;margin-top:3px"><i class="Hui-iconfont">&#xe632;</i> 保存</a>
                <a class="btn btn-secondary radius r" id="preview" style="line-height:1.6em;margin-top:3px;margin-right:1rem;" href="javascript:;"><i class="Hui-iconfont">&#xe642;</i> 预览</a>&nbsp;&nbsp;  
            </nav>
            <article class="cl pd-20">
                <div class="web-operate">
                    <div class="web-title">
                        <fieldset>
                            <legend>页面主题设计</legend>
                            <div class="tit-area">
                                <div class="t-line">
                                    <div class="l-title">
                                        网站标题：
                                    </div>
                                    <div class="l-input">
                                        <input type="text" name="ititle" placeholder="在此输入网站标题">
                                    </div>
                                </div>                                
                                <div class="t-line">
                                    <div class="l-title">
                                        关键字：
                                    </div>
                                    <div class="l-input">
                                        <input type="text" name="ikeyword"  placeholder="在此输入网站关键字">
                                    </div>
                                </div>
                                <div class="t-line t-depict">
                                    <div class="l-title">
                                        网站描述：
                                    </div>
                                    <div class="l-input">
                                       <textarea name="idepict"  placeholder="在此输入网站描述"></textarea>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                     <div class="web-title">
                         <fieldset>
                            <legend>页面访问设置</legend>
                            <div class="tit-area">
                                <div class="t-line">
                                    <div class="l-title">
                                        网站类型：
                                    </div>
                                    <div class="l-input">
                                        <select name="itype">
                                            <option value="pc" selected>PC端</option>
                                            <option value="mobile">移动端</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="t-line">
                                    <div class="l-title">
                                        访问类型：
                                    </div>
                                    <div class="l-input">
                                        <select name="ilogon">
                                            <option value="everyone" selected>登陆后可见</option>
                                            <option value="limit">任何人可见</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                   
                </div>
                 <div class="web-content">
                    <fieldset>
                        <legend>页面内容设计</legend>
                        <div class="cont-area">
                            <div class="web-area" id="wrap">
                                 <ul>
                                    
                                 </ul>
                            </div>
                            <div class="web-add">
                                <a href="#" class="big-link" data-reveal-id="toolbar" data-animation="fade"></a>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </article>
            <footer class="footer">
                <p>Page Generation System<br> 
                Copyright ©2017 猫先生 All Rights Reserved.<br> 本后台系统由<a href="http://www.h-ui.net/" target="_blank" >猫先生</a>提供技术支持  
                <a href="@" target="_blank"></a></p>
            </footer>
        </section>
        <?php echo '<script'; ?>
 src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/jquery.min.js"><?php echo '</script'; ?>
>
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/reveal.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/model.css">	
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/jquery.reveal.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/lib/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/lib/layer/2.4/layer.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="http://www.helloweba.com/demo/js/jquery-1.7.2.min.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/jquery.form.min.js"><?php echo '</script'; ?>
> 
		
		<div id="toolbar" class="reveal-modal">
            <div class="t-title">
                <span>网页样式选择</title>
                <a class="close-reveal-modal">×</a>
            </div>
            <div class="t-main">
               <div class="btn-area">
                    <dl tag="style1">   
                        <dt><img src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/img/web/style1.png"></dt>
                        <dd>文本框样式</dd>
                    </dl>
                    <dl tag="style2">   
                         <dt><img src="http://demo.lanrenzhijia.com/2013/pic1201/demos/assets/owl2.jpg"></dt>
                        <dd>样式2</dd>
                    </dl>
                    <dl tag="style3">   
                         <dt><img src="http://demo.lanrenzhijia.com/2013/pic1201/demos/assets/owl3.jpg"></dt>
                        <dd>样式3</dd>
                    </dl>
                    <dl tag="style4">   
                        <dt><img src="http://demo.lanrenzhijia.com/2013/pic1201/demos/assets/owl4.jpg"></dt>
                        <dd>样式4</dd>
                    </dl>
                     <dl tag="style5">   
                        <dt><img src="http://demo.lanrenzhijia.com/2013/pic1201/demos/assets/owl5.jpg"></dt>
                        <dd>样式5</dd>
                    </dl>
                     <dl tag="style6">   
                        <dt><img src="http://demo.lanrenzhijia.com/2013/pic1201/demos/assets/owl6.jpg"></dt>
                        <dd>样式6</dd>
                    </dl>
                </div>
            </div>
		</div>
	</body>
	
	
	
	<div class="model">
        <div id="style1">
            <div class="m-area" tag="s1">
                <div class="m-colse">　文本框样式<span><i  class="edit Hui-iconfont" title="编辑">&#xe60c;</i><i  class="up Hui-iconfont" title="上移">&#xe6d6;</i><i  class="down Hui-iconfont" title="下移">&#xe6d5;</i><i class="delete Hui-iconfont" title="删除">&#xe6e2;</i></span></div>
                <div class="m-text" style="padding:10rem 2rem 0 2rem;font-size:3rem;width:100%;text-align:center;">页面文字...</div>
            </div>
        </div>
         <div id="style2">
            <div  class="m-area" tag="s2">
                <div class="m-colse">　样式2<span><i  class="edit Hui-iconfont" title="编辑">&#xe60c;</i><i  class="up Hui-iconfont" title="上移">&#xe6d6;</i><i  class="down Hui-iconfont" title="下移">&#xe6d5;</i><i class="delete Hui-iconfont" title="删除">&#xe6e2;</i></span></div>
            </div>
        </div>
         <div id="style3">
            <div  class="m-area" tag="s3">
                <div class="m-colse">　样式3<span><i  class="edit Hui-iconfont" title="编辑">&#xe60c;</i><i  class="up Hui-iconfont" title="上移">&#xe6d6;</i><i  class="down Hui-iconfont" title="下移">&#xe6d5;</i><i class="delete Hui-iconfont" title="删除">&#xe6e2;</i></span></div>
            </div>
        </div>
         <div id="style4">
            <div  class="m-area" tag="s4">
                <div class="m-colse">　样式4<span><i  class="edit Hui-iconfont" title="编辑">&#xe60c;</i><i  class="up Hui-iconfont" title="上移">&#xe6d6;</i><i  class="down Hui-iconfont" title="下移">&#xe6d5;</i><i class="delete Hui-iconfont" title="删除">&#xe6e2;</i></span></div>
            </div>
        </div>
        <div id="style5">
            <div  class="m-area" tag="s5">
                <div class="m-colse">　样式5<span><i  class="edit Hui-iconfont" title="编辑">&#xe60c;</i><i  class="up Hui-iconfont" title="上移">&#xe6d6;</i><i  class="down Hui-iconfont" title="下移">&#xe6d5;</i><i class="delete Hui-iconfont" title="删除">&#xe6e2;</i></span></div>
            </div>
        </div>
        <div id="style6">
            <div  class="m-area" tag="s6">
                <div class="m-colse">　样式6<span><i  class="edit Hui-iconfont" title="编辑">&#xe60c;</i><i  class="up Hui-iconfont" title="上移">&#xe6d6;</i><i  class="down Hui-iconfont" title="下移">&#xe6d5;</i><i class="delete Hui-iconfont" title="删除">&#xe6e2;</i></span></div>
            </div>
        </div>
	</div>
	
	<style>
       .l-cont .btn{position: relative;overflow: hidden;margin-right: 4px;display:inline-block; 
        *display:inline;padding:5px 7px 5px 7px;font-size:13px;line-height:19px; float: left;height: 2rem;width: 70px;
        *line-height:20px;color:#fff; 
        text-align:center;vertical-align:middle;cursor:pointer;background:#5bb75b; 
        border:1px solid #cccccc;border-color:#e6e6e6 #e6e6e6 #bfbfbf; 
        border-bottom-color:#b3b3b3;-webkit-border-radius:4px; 
        -moz-border-radius:4px;border-radius:4px;} 
       .l-cont .btn input{position: absolute;top: 0; right: 0;margin: 0;border:solid transparent; 
        opacity: 0;filter:alpha(opacity=0); cursor: pointer;} 
        .progress{position:relative; margin-left:100px;   
        width:160px;height:2rem;padding: 1px; border-radius:3px; display:none} 
        .bar {background-color: green; display:block; width:0%; height:20px;      margin-top: 5px;
        border-radius:3px; } 
        .percent{position:relative; height:2rem; display:inline-block;  
        top:-10px; left:2%; color:#fff ;font-size:14px;} 
        .files{height:22px; line-height:22px; margin:10px 0} 
        .delimg{margin-left:20px; color:#090; cursor:pointer}
        .t_input_1 {width:2rem;border: 1px solid #ccc;  padding: 2px 5px;}
	</style>
	
	<div class="model-alter s1" >
            <div class="t-title">
                <span>文本框样式属性设置</title>
                <a class="close-reveal-modal">×</a>
            </div>
             <div class="t-main">
                <input type="hidden" id="blockimg" value="">
                <div class="t-line t-area">
                    <div class="l-tit">文本内容:</div>
                    <div class="l-cont"><textarea placeholder="请输入文本框内容" >页面文字...</textarea></div>
                </div>
                 <div class="t-line">
                     <div class="l-tit">字体大小:</div>
                     <div class="l-cont">
                         <input type="number" class="t_input_1" value="3"> rem
                     </div>
                 </div>
                 <div class="t-line">
                     <div class="l-tit">字体颜色:</div>
                     <div class="l-cont">
                         <input type="color" class="t_input_2"/>
                     </div>
                 </div>
                <div class="t-line">
                    <div class="l-tit">网页背景:</div>
                    <div class="l-cont">
                        <form id="upload" action="<?php echo smarty_function_baseurl(array('url'=>'pages/accept'),$_smarty_tpl);?>
" method="post" enctype="multipart/form-data">
                            <div class="btn"> 
                                 <span>添加附件</span> 
                                 <input id="fileupload" type="file" name="bgimg"> 
                            </div> 
                            <div class="progress"> 
                                <span class="bar"></span><span class="percent">0%</span > 
                            </div> 
                            <div class="files"></div> 
                            <div id="showimg"></div> 
                        </form>
                    </div>
                </div>
                <div class="t-line t-btn">
                        <button class="submit btn btn-primary radius" type="submit"><i class="Hui-iconfont"></i> 保存</button>
						<button class="clear btn btn-default radius" type="button">&nbsp;&nbsp;取消&nbsp;&nbsp;</button>
                </div>
             </div>
	</div>
	<?php echo '<script'; ?>
 type="text/javascript">
        $(".web-area").on("click", ".delete", function(){
            $(this).parent().parent().parent().parent().remove();
        });
        $(".web-area").on("click", ".up", function(){
            var obj = $(this).parent().parent().parent().parent();
            obj.prev().before(obj);
          
        });
         $(".web-area").on("click", ".down", function(){
            var obj = $(this).parent().parent().parent().parent();
            obj.next().after(obj);
        });
        $(".web-area").on("click", ".edit", function(){
            var obj = $(this).parent().parent().parent();
            var tid = $(this).parent().parent().parent().parent().attr('id');
            
            var tag = obj.attr('tag');
            switch(tag)
            {
                case 's1':
                    $(".reveal-modal-bg").fadeIn();
                    $(".s1").attr('target', tid);
                    conttext=obj.find('.m-text').html();
                    $(".s1").find("textarea").html(conttext);
                    $(".s1").find("textarea").val(conttext);
                  
                    $(".s1").fadeIn();
                    break;
            }
        });
        $("document").ready(function()
        {
           $('#toolbar>.t-main>.btn-area>dl').mouseenter(function(){
                $(this).find('dd').css("display", "block");
                $(this).find('dd').css("top","0px").animate({"top":"-2rem"});
           });
　　       $('#toolbar>.t-main>.btn-area>dl').mouseleave(function(){
                $(this).find('dd').css("display", "none");
                $(this).find('dd').css("top","-2rem").animate({"top":"0px"});
           });
           
           $('#toolbar>.t-main>.btn-area>dl').click(function(){
                var mText=$(this).attr('tag'); 
                var tid =new Date().getTime();
                id="#"+mText;
                $(".web-area ul").append("<li id="+tid+">" + $(id).html() +"</li>");
               
           });
          $(".close-reveal-modal").click(function(){
             $(".reveal-modal-bg").fadeOut();
             $(".model-alter").fadeOut();
          });
           $(".clear").click(function(){
             $(".reveal-modal-bg").fadeOut();
             $(".model-alter").fadeOut();
          });
          
          $(".s1 .t-main .t-btn .submit").click(function(){
                //获取事件
                var text= $(this).parent().parent();
                var id = $(this).parent().parent().parent().attr('target');
                obj=$("#"+id).find('.m-text');
                textcont=text.find('textarea').val();
                textcolor = text.find('.t_input_2').val();
                textsize = text.find('.t_input_1').val();
                $("#"+id).find(".m-area").css("background-image","url("+$("#blockimg").val()+")");
                console.log($("#"+id).find(".m-area"));
                obj.html(textcont);
                obj.css("color", textcolor);
                obj.css("font-size", textsize +"rem");
                obj.css("padding-top", ($(".m-area").height() - textsize) +"rem");
                $(".reveal-modal-bg").fadeOut();
                $(".model-alter").fadeOut();
          });
          
          $("#preview").click(function()
          {
              
                var pagedata = {};
                pagedata.title = $('input[name="ititle"]').val();
                pagedata.keyword = $('input[name="ikeyword"]').val();
                pagedata.depict = $('textarea[name="idepict"]').val();
                pagedata.type = $('select[name="itype"]').val();
                pagedata.logon = $('select[name="ilogon"]').val();
                var data = [];
                var i=0;
                $(".web-area ul li").each(function(){
                    var childnode= {};
                    childnode.class = $(this).find('.m-area').attr('tag');
                    childnode.sort = i++;
                    childnode.bgimg = "";
                   switch (childnode.class) 
                   {
                        case 's1':
                              childnode.data = $(this).children(".m-area").children(".m-text").html();
                            break;
                   }
                   data.push(childnode)
                });
                pagedata.data = data;
                console.log(JSON.stringify(pagedata));

                window.open("<?php echo smarty_function_baseurl(array('url'=>'pages/preview'),$_smarty_tpl);?>
", "newwindow");
          });
          $("input[type='file']").click(function()
          {
                
          });
        });
        
        $(function () {
            var bar = $('.bar');
            var percent = $('.percent');
            var showimg = $('#showimg');
            var progress = $(".progress");
            var files = $(".files");
            var btn = $(".btn span");
            $(".demo").wrap("<form id='upload' action='<?php echo smarty_function_baseurl(array('url'=>'pages/accept'),$_smarty_tpl);?>
' method='post' enctype='multipart/form-data'></form>");
            $("#fileupload").change(function(){
                $("#upload").ajaxSubmit({
                    dataType:  'json',
                    beforeSend: function() {
                        showimg.empty();
                        progress.show();
                        var percentVal = '0%';
                        bar.width(percentVal);
                        percent.html(percentVal);
                        btn.html("上传中...");
                    },
                    uploadProgress: function(event, position, total, percentComplete) {
                        var percentVal = percentComplete + '%';
                        bar.width(percentVal)
                        percent.html(percentVal);
                    },
                    /*complete: function(xhr) {
                        $(".files").html(xhr.responseText);
                    },*/
                    success: function(data) {
                        files.html("<b>"+data.name+"("+data.size+"k)");
                        $("#blockimg").val("<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
"+"/uploads/"+data.path);
                        btn.html("添加附件");
                    },
                    error:function(xhr){
                        btn.html("上传失败");
                        bar.width('0')
                        files.html(xhr.responseText);
                    },
                    clearForm: true   
                });
            });
            
            $(".delimg").live('click',function(){
                var pic = $(this).attr("rel");
                $.post("action.php?act=delimg",{imagename:pic},function(msg){
                    if(msg==1){
                        files.html("删除成功.");
                        showimg.empty();
                        progress.hide();
                    }else{
                        alert(msg);
                    }
                });
            });
        });
	<?php echo '</script'; ?>
>
</html>
<?php }
}
