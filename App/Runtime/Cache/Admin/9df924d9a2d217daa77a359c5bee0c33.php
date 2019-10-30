<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=7" />
<title>基于ThinkPHP &#38; J-UI 框架的CRM 系统</title>

<link href="/Public/dwz/themes/default/style.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/Public/dwz/themes/css/core.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/Public/dwz/themes/css/print.css" rel="stylesheet" type="text/css" media="print"/>
<link href="/Public/dwz/uploadify/css/uploadify.css" rel="stylesheet" type="text/css" media="screen"/>
<link href="/Public/css/gd_dwz.css" rel="stylesheet" type="text/css"/>
<!--[if IE]>
<link href="/Public/dwz/themes/css/ieHack.css" rel="stylesheet" type="text/css" media="screen"/>
<![endif]--> 

<script src="/Public/dwz/js/speedup.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery-1.7.1.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery.cookie.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery.validate.js" type="text/javascript"></script>
<script src="/Public/dwz/js/jquery.bgiframe.js" type="text/javascript"></script>

<script src="/Public/dwz/xheditor/xheditor-1.1.12-zh-cn.min.js" type="text/javascript"></script>
<script src="/Public/dwz/uploadify/scripts/swfobject.js" type="text/javascript"></script>
<script src="/Public/dwz/uploadify/scripts/jquery.uploadify.v2.1.0.js" type="text/javascript"></script>


<script src="/Public/dwz/js/dwz.min.js" type="text/javascript"></script>
<script src="/Public/dwz/js/dwz.regional.zh.js" type="text/javascript"></script>
<!-- <script src="/Public/js/systemMessage.js" type="text/javascript"></script> -->

<script type="text/javascript">
$(function(){
	DWZ.init("/Public/dwz/dwz.frag.xml", {
		//loginUrl:"login_dialog.html", loginTitle:"登录",	// 弹出登录对话框
		//loginUrl:"login.html",	// 跳到登录页面
		statusCode:{ ok:200, error:300, timeout:301}, //【可选】
		pageInfo:{ pageNum:"pageNum", numPerPage:"numPerPage", orderField:"_order", orderDirection:"_sort"}, //【可选】
		debug:false,	// 调试模式 【true|false】
		callback:function(){
			initEnv();
			$("#themeList").theme({ themeBase:"/Public/dwz/themes"}); // themeBase 相对于index页面的主题base路径
		}
	});
});

</script>
</head>

<body scroll="no">
	<div id="layout">
		<div id="header">
			<div class="headerNav">
				<a class="logo" href="#">标志</a>
				<ul class="nav">
					<li><a href="#" target="_blank">欢迎您：<?php echo ($_SESSION['adminuser']['username']); ?></a></li>
					<li><a href="/index.php/Admin/Login/password" target="dialog">修改密码</a></li>
					<li><a href="/index.php/Admin/Login/logout">退出</a></li>
				</ul>
				
				<ul class="themeList" id="themeList">
					<li theme="default"><div class="selected">蓝色</div></li>
					<li theme="green"><div>绿色</div></li>
					<li theme="purple"><div>紫色</div></li>
					<li theme="silver"><div>银色</div></li>
					<li theme="azure"><div>天蓝</div></li>
				</ul>
			</div>
		</div>

		<div id="leftside">
			<div id="sidebar_s">
				<div class="collapse">
					<div class="toggleCollapse"><div></div></div>
				</div>
			</div>
			<div id="sidebar">
				<div class="toggleCollapse"><h2>主菜单</h2><div>收缩</div></div>
				<div class="accordion" fillSpace="sidebar">
				
					<div class="accordionHeader">
						<h2><span>Folder</span>用户管理</h2>
						
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a title="会员管理">会员管理</a>
								<ul>
									<li><a href="/index.php/Admin/User/index" target="navTab" rel="listuser">会员列表</a></li>
								</ul>
							</li>
							<li><a title="积分管理">积分管理</a>
								<ul>
									<li><a href="/index.php/Admin/UserPoints/index" target="navTab" rel="listuserpoints" title="积分记录" >积分记录列表</a></li>
								</ul>
							</li>
                            <li><a title="订单管理">订单管理</a>
								<ul>
									<li><a href="/index.php/Admin/Order/index" target="navTab" rel="listuserpoints" title="订单管理" >订单列表</a></li>
								</ul>
							</li>
							<li><a href="/index.php/Admin/User/add" target="dialog" rel="listuser" title="添加管理员" >添加管理员</a></li>
						</ul>
					</div>
					
					
					<div class="accordionHeader">
						<h2><span>Folder</span>资料管理</h2>
						
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a title="会员资料">会员资料</a>
								<ul>
									<li><a href="/index.php/Admin/UserParams/index" target="navTab" rel="listparams">资料列表</a></li>
								</ul>				
								<ul>
									<li><a href="/index.php/Admin/Profile/index" target="navTab" rel="listprofile">详细列表</a></li>
								</ul>					
							</li>
							<li><a title="择友条件">择友条件</a>
								<ul>
									<li><a href="/index.php/Admin/Choose/index" target="navTab" rel="listchoose" title="条件列表" >条件列表</a></li>
								</ul>
							</li>
						</ul>
					</div>				
					
					<div class="accordionHeader">
						<h2><span>Folder</span>图片管理</h2>					
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a title="会员相册">会员相册</a>
								<ul>
									<li><a href="/index.php/Admin/UserPhotoAlbum/index" target="navTab" rel="listuserphotoalbum">上传相册</a></li>
								</ul>	
							</li>
							<li><a title="礼物管理">礼物管理</a>
								<ul>
									<li><a href="/index.php/Admin/GiftRecord/index" target="navTab" rel="listgiftrecord" title="礼物列表" >礼物列表</a></li>
								</ul>
							</li>
						</ul>
					</div>
					
					<div class="accordionHeader">
						<h2><span>Folder</span>系统管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a title="消息管理">消息管理</a>
								<ul>
									<li><a href="/index.php/Admin/SystemMessage/index" target="navTab" rel="listsystemmessage" title="系统消息列表" >系统消息列表</a></li>
									
									<li><a href="/index.php/Admin/SystemMessage/add" target="navTab" rel="listsystemmessage" width="550" height="300">发布系统消息</a></li>
								</ul>
							</li>
							<li><a title="公告管理">公告管理</a>
								<ul>
									<li><a>公告列表</a>
										<ul>
											<li><a href="/index.php/Admin/Notice/index" target="navTab" rel="listnotice"  title="网站公告" >网站公告主页</a></li>
									<li><a href="/index.php/Admin/Notice/add" target="navTab" width="550" height="300">添加网站公告</a></li>
										</ul>
									</li>
									
									<li><a>公告分类</a>
										<ul>
											<li><a href="/index.php/Admin/NoticeCategory/index" target="navTab" rel="listnoticecategory" title="网站公告类别" >公告类别主页</a></li>
									<li><a href="/index.php/Admin/NoticeCategory/add" target="dialog" width="550" height="300" title="添加公告分类">添加公告分类</a></li>

										</ul>
									</li>
								</ul>
							</li>
							<li><a title="友情链接">友情链接</a>
								<ul>
									<li><a href="/index.php/Admin/Friendlink/index" target="navTab" rel="listfriendlink" title="链接列表" >链接列表</a></li>
								</ul>
							</li>
							<li><a title="友情链接">广告管理</a>
								<ul>
									<li><a href="/index.php/Admin/Advertising/index" target="navTab" rel="listadvertising" title="链接列表" >广告列表</a></li>
								</ul>
							</li>
						</ul>
					</div>
					
					
					<div class="accordionHeader">
						<h2><span>Folder</span>内容管理</h2>
					</div>
					<div class="accordionContent">
						<ul class="tree treeFolder">
							<li><a>信件管理</a>
								<ul>
									<li><a href="/index.php/Admin/UserMessage/index" target="navTab" rel="listmessage">发信记录</a></li>
								</ul>
							</li>
							
							<li><a>问候管理</a>
								<ul>
									<li><a href="/index.php/Admin/Hibox/index" target="navTab" rel="listhibox">问候记录</a></li>
									<li><a>问候语管理</a>
										<ul>
											<li><a href="/index.php/Admin/Greet/index" target="navTab" rel="listgreet">问候语</a></li>
											<li><a href="/index.php/Admin/Greet/add" target="dialog" rel="greetadd">添加问候语</a></li>
										</ul>
									</li>
									
								</ul>
							</li>
	
							<li><a>日记管理</a>
								<ul>
									<li><a href="/index.php/Admin/Diary/index" target="navTab" rel="listdiary" title="日记列表" >日记列表</a></li>
									<li><a href="/index.php/Admin/DiaryComment/index" target="navTab" rel="listdiarycomment">日记评论列表</a></li>
									<li><a>日记分类</a>
										<ul>
											<li><a href="/index.php/Admin/DiaryCategory/index" target="navTab" rel="listdiarycategory">日记分类</a></li>
											<li><a href="/index.php/Admin/DiaryCategory/add" target="dialog" width='550' height='200' rel="categoryadd">添加分类</a></li>	
										</ul>
									</li>
								</ul>
							</li>
							<li><a>微博管理</a>
								<ul>
									<li><a href="/index.php/Admin/Wbreview/index" target="navTab" rel="listwbreview">微博列表</a></li>
									<li><a href="/index.php/Admin/Phwb/index" target="navTab" rel="listphwb">评论列表</a></li>
								</ul>
							</li>
							<li><a>打招呼管理</a>
								<ul>
									<li><a href="/index.php/Admin/Attention/index" target="navTab" rel="listattention">打招呼列表</a></li>
								</ul>
							</li>
							<li><a>看过管理</a>
								<ul>
									<li><a href="/index.php/Admin/See/index" target="navTab" rel="listsee" title='每一个月清理一次'>看过手动清理</a></li>
								</ul>
							</li>
                            <li><a>文章管理</a>
								<ul>
									<li><a href="/index.php/Admin/Article/index" target="navTab" rel="listsee" title='每一个月清理一次'>文章管理</a></li>
								</ul>
							</li>
						</ul>
					</div>
				
				
				</div>
                
			</div>
		</div>
		<div id="container">
			<div id="navTab" class="tabsPage">
				<div class="tabsPageHeader">
					<div class="tabsPageHeaderContent"><!-- 显示左右控制时添加 class="tabsPageHeaderMargin" -->
						<ul class="navTab-tab">
							<li tabid="main" class="main"><a href="javascript:;"><span><span class="home_icon">我的主页</span></span></a></li>
						</ul>
					</div>
					<div class="tabsLeft">left</div><!-- 禁用只需要添加一个样式 class="tabsLeft tabsLeftDisabled" -->
					<div class="tabsRight">right</div><!-- 禁用只需要添加一个样式 class="tabsRight tabsRightDisabled" -->
					<div class="tabsMore">more</div>
				</div>
				<ul class="tabsMoreList">
					<li><a href="javascript:;">主页</a></li>
				</ul>
				<div class="navTab-panel tabsPageContent layoutBox">
					<div class="page unitBox">
						<div class="accountInfo">
							<p>dwz婚恋网内容管理系统
								<a href="#" target="_blank"></a>
							</p>
							
						</div>
						
						<div class="pageFormContent" layoutH="80" style="margin-right:230px">

						
						<!--
						<div style="width:230px;position: absolute;top:60px;right:0" layoutH="80">
							<img src="001.jpg" width="200">
							
							<h2>事件消息</h2>
							<ul>
								<li >1.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >2.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >3.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >4.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
								<li >5.XXXXXXXXXXXXXXXXXXXXXXXxx</li>
							</ul>
						</div>
						
						-->
						
					</div>
					
					
				</div>
			</div>
		</div>

	</div>

	<div id="footer">Copyright &copy; 2012 <a href="demo_page2.html" target="dialog">开发团队</a><!-- Tel：--></div>
</body>
</html>