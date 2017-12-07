<?php
/* Smarty version 3.1.30, created on 2017-08-27 23:12:43
  from "D:\yangyaozhong\Wnmp\html\page\application\view\Index\index.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_59a38a2b015551_76469242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8b688c9810c5e39d55324b525c09e4e393352803' => 
    array (
      0 => 'D:\\yangyaozhong\\Wnmp\\html\\page\\application\\view\\Index\\index.html',
      1 => 1495675378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_59a38a2b015551_76469242 (Smarty_Internal_Template $_smarty_tpl) {
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
					<dt><i class="Hui-iconfont">&#xe616;</i> 页面管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
					<dd>
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
          
                <a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont"></i></a>
            </nav>

        </section>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/lib/jquery/1.9.1/jquery.min.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/lib/layer/2.4/layer.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/h-ui/js/H-ui.js"><?php echo '</script'; ?>
> 
		<?php echo '<script'; ?>
 type="text/javascript" src="<?php echo $_smarty_tpl->tpl_vars['PUBLIC']->value;?>
/static/h-ui.admin/js/H-ui.admin.page.js"><?php echo '</script'; ?>
> 
	</body>
</html>
<?php }
}
