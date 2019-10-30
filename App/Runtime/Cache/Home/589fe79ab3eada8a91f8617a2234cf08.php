<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if gt IE 8]><![endif]-->
<html class="no-js" lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>交友中心-婚恋网</title>
<link href="/yyw/Public/css/css.css" rel="stylesheet" />
<link href="/yyw/Public/css/default.css" rel="stylesheet" />
<link type="text/css" rel="stylesheet" href="/yyw/Public/css/WdatePicker.css" />
<link rel="stylesheet" href="/yyw/Public/css/v3.css" media="screen">
<script type="text/javascript">
	var __module__ = "/yyw/index.php/Home";
	var __public__ = '/yyw/Public';
	var __url__ = '/yyw/index.php/Home/Photo';
</script>
<script type="text/javascript" src="/yyw/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/yyw/Public/js/usercp.js"></script>
<script type="text/javascript" src="/yyw/Public/js/messageChoose.js"></script>
<script type="text/javascript" src="/yyw/Public/js/proMess.js"></script>
<script type="text/javascript" src="/yyw/Public/js/diaryAdd.js"></script>
<script type="text/javascript" src="/yyw/Public/js/checkReg.js"></script>
<script type="text/javascript" src="/yyw/Public/js/checkDiary.js"></script>
<script type="text/javascript" src="/yyw/Public/js/noRead.js"></script>
<script type="text/javascript" src="/yyw/Public/js/messageBox.js"></script>
<script type="text/javascript" src="/yyw/Public/xheditor/xheditor-1.2.1.min.js"></script>
<script type="text/javascript" src="/yyw/Public/xheditor/xheditor_lang/zh-cn.js"></script>
<script language="javascript" type="text/javascript" src="/yyw/Public/My97DatePicker/WdatePicker.js"></script>
<script type="text/javascript">
	noReadMessage();
	noReadHibox();
</script>
</head>
<body>
<div id="message_ceng" style="display:none;position:absolute;z-index:200;background-color:black;"></div>
<div id="loadleft" style="display:none;position:absolute;z-index:1500;"><img src="/yyw/Public/images/jdloading.gif"/><br/>加载中...</div>
<div id="loadright" style="display:none;position:absolute;z-index:1500;"><img src="/yyw/Public/images/jdloading.gif"/><br/>加载中...</div>

<div id="message_box" style="width:600px;height:350px;display:none;position:absolute;z-index:1000;">
	<div id="message_head" style="width:100%;height:35px;background-color:#dd127b;">
		<span style="width:50px;line-height:35px;float:left;color:white;text-indent:10px;"><b>写信件</b></span>
		<a href="javascript:void(0);"><span id="close_box" style="margin-right:10px;line-height:35px;float:right;color:white;">X</span></a>
	</div>
	<div style="width:100%;height:100%;background-color:#fafff0;margin:0px;padding:0px;">
		<div id="userinfo" style="width:25%;height:100%;float:left;margin-left:-50px;">
			
		</div>
		<div id="message_main" style="width:75%;height:100%;float:left;">
			
		</div>
	</div>
</div>
<div id="pro_box" style="width:260px;height:150px;position:absolute;top:80px;display:none;z-index:2000;">
	<div style="width:100%;height:30px;background-color:#dd127b;">
		<b style="line-height:30px;margin-left:5px;">提示消息:</b>
	</div>
	<div id="pro_mess" style="width:100%;height:120px;background-color:#fafff0;text-align:center;">
		<div style="width:100%;height:50px;"></div>
		<b>添加成功！</b>
	</div>
</div>
<div class="user_fixed-bar" id="user_header">
	<div class="user_containerss"> 
		<a href="/yyw/index.php/Home/Index/index"><img src="/yyw/Public/images/logo.gif" class="user_logo"></a>
		<ul class="user_top_menu">
		  <li><a href="/yyw/index.php/Home/UserList/index">搜索会员</a></li>
		</ul>
		<div class="user-top-setting">
			<div class="user-top-avatar">
			<?php if($_SESSION['user']['avatar']!= null): ?><a href="#" title="设置形象照">
					<img src="/yyw/Public/Uploads/pic/<?php echo ($_SESSION['user']['avatar']); ?>" border="0" height="25" width="25">
				</a>
			<?php else: ?>
				<?php if($_SESSION['user']['gender']== 1): ?><a href="#" title="设置形象照">
					<img src="/yyw/Public/images/male.gif" border="0" height="25" width="25">
				</a>
				<?php else: ?>
				<a href="#" title="设置形象照">
					<img src="/yyw/Public/images/female.gif" border="0" height="25" width="25">
				</a><?php endif; endif; ?>
			</div>
			<div class="user-top-username">
				<a href="" target="_blank" title="访问我的主页"><?php echo ($_SESSION['user']['username']); ?></a>

			</div>
			<div class="user-top-tips">
				<div id="emailContent" class="user-top-tips-list">
					<a href="/yyw/index.php/Home/Message/index/status/1">未读信件(<span class="no_read_message"></span>)</a>
			  
					<a href="/yyw/index.php/Home/Greet/index/status/1">未读问候(<span class="no_read_hibox"></span>)</a>
			  
					<a href="/yyw/index.php/Home/SystemMessage/index">系统消息(<?php if($unRead != null): echo ($unRead); else: ?>0<?php endif; ?>)</a>
				</div>
				<div id="email" class="user-top-tips-ol" name="tip_title">
				  <span class="user-top-tips-btn">信件&nbsp;<img src="/yyw/Public/images/jiantou.gif"></span>
				</div>
			</div>
			<div class="user-top-set"><a href="/yyw/index.php/Home/User/editPass">修改密码</a></div>
			<div class="user-top-logout"><a href="/yyw/index.php/Home/Login/logout">退出</a></div>
		</div>
	</div>
</div>
<div class="user_main">
   
    <div class="user_main_left">

		<div class="user_info_">
			<div class="J_UserLogo">
			<?php if($_SESSION['user']['avatar']!= null): ?><a href="#" title="设置形象照">
					<img src="/yyw/Public/Uploads/pic/<?php echo ($_SESSION['user']['avatar']); ?>" border="0" height="58" width="48">
				</a>
			<?php else: ?>
				<?php if($_SESSION['user']['gender']== 1): ?><a href="#" title="设置形象照">
					<img src="/yyw/Public/images/male.gif" border="0" height="58" width="48">
				</a>
				<?php else: ?>
				<a href="#" title="设置形象照">
					<img src="/yyw/Public/images/female.gif" border="0" height="58" width="48">
				</a><?php endif; endif; ?>
			</div>
			<div class="J_UserInfoBox">
				<?php if($_SESSION['user']['gender']== 1): ?><img src="/yyw/Public/images/f2fde8e7d8aa2a10.gif" />
				<?php else: ?>
					<img src="/yyw/Public/images/87197a0d51022068.gif" /><?php endif; ?>
					<a href="#" target="_blank" title="访问我的主页"><?php echo ($_SESSION['user']['username']); ?></a>&nbsp;

				<br>
					
			<font color="green"><?php if($userother1["jurisdiction"] == 1): ?>(VIP会员)<?php else: ?>(普通会员)<?php endif; ?></font>
		  </div>
		  <div class="clear"> </div>
		</div>
		<div class="user-info-tip">
		  <p>
			<a href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($_SESSION['user']['id']); ?>" target="_blank">预览我的个人主页</a><br>
					<font color="green"><?php if($userother["lovestatus"] == 1): ?>征友进行中<?php else: ?>已关闭征友<?php endif; ?></font>
					<a href="<?php echo U('User/loveStatus');?>">修改</a>
		  </p>
		</div>
		<div class="user-info-tip">
		  <div class="user-info-tip-left">
			<table border="0" cellpadding="0" cellspacing="0" align="center">
			  <tbody><tr>
				<td class="numberInbox">
					<div class="numberR"><a href="/yyw/index.php/Home/Message/index/status/1" class="no_read_message"></a></div>
				</td>
			  </tr>
			  <tr>
				<td height="30">收件箱</td>
			  </tr>
			</tbody></table>
		  </div>
		  <div class="user-info-tip-right">
			<table border="0" cellpadding="0" cellspacing="0" align="center">
			  <tbody><tr>
				<td class="numberInbox">
					<div class="numberR"><a href="/yyw/index.php/Home/Greet/index/status/1" class="no_read_hibox"></a></div>
				</td>
			  </tr>
			  <tr>
				<td height="30">打招呼</td>
			  </tr>
			</tbody></table>
		  </div>
		  <div class="clear"></div>
		</div>
		
		<div class="user_menu_hr"></div>
		<div class="user_menu_item">
		  <ul>
			<li><img src="/yyw/Public/images/562879.png"><a href="/yyw/index.php/Home/User/view/act/userInfo">交友帐号</a></li>
		  </ul>
		  <div class="clear"></div>
		</div>
		<div class="user_menu_hr"></div>

		<div class="user_menu_item">
		  <ul>
			<li><img src="/yyw/Public/images/562810.png"><a href="/yyw/index.php/Home/Message/index"><b><font color="red">我的信件</font></b></a></li>
			<li><img src="/yyw/Public/images/562717.png"><a href="/yyw/index.php/Home/Greet/index">我的问候</a></li>
			<li><img src="/yyw/Public/images/562812.png"><a href="/yyw/index.php/Home/SystemMessage/index">系统消息</a></li>
			<li><img src="/yyw/Public/images/562785.png"><a href="/yyw/index.php/Home/Present/index">我的礼物</a></li>
			<li><img src="/yyw/Public/images/562709.png"><a href="/yyw/index.php/Home/Attention/index"><b><font color="red">我的关注</font></b></a></li>
			<li><img src="/yyw/Public/images/562808.png"><a href="/yyw/index.php/Home/ByAttention/index">我的粉丝</a></li>
			<li><img src="/yyw/Public/images/562779.png"><a href="/yyw/index.php/Home/BySee/index">谁看过我</a></li>
			<li><img src="/yyw/Public/images/562757.png"><a href="/yyw/index.php/Home/See/index">我看过谁</a></li>
		  </ul>
		  <div class="clear"></div>
		</div>
		<div class="user_menu_hr"></div>

		<div class="user_menu_item">
		  <ul>
			<li><img src="/yyw/Public/images/562711.png"><a href="/yyw/index.php/Home/Photo/set">形象照</a></li>
			<li><img src="/yyw/Public/images/562793.png"><a href="/yyw/index.php/Home/PhotoAlbum/index">我的相册</a><span><a href="/yyw/index.php/Home/PhotoAlbum/add">上传</a></span></li>
			<li><img src="/yyw/Public/images/562783.png"><a href="/yyw/index.php/Home/UserParams/index"><b><font color="red">编辑资料</font></b></a></li>
			<li><img src="/yyw/Public/images/562843.png"><a href="/yyw/index.php/Home/Choose/index">择友条件</a></li>
		  </ul>
		  <div class="clear"></div>
		</div>
		<div class="user_menu_hr"></div>

		<div class="user_menu_item">
		  <ul>
			<li><img src="/yyw/Public/images/562885.png"><a href="/yyw/index.php/Home/Diary/index">我的日记</a><span><a href="/yyw/index.php/Home/Diary/add">发表</a></span></li>
		  </ul>
		  <div class="clear"></div>
		</div>
		<div class="user_menu_hr"></div>

		<div class="user_menu_item">
		  <ul>
				<li><img src="/yyw/Public/images/562875.png"><a href="/yyw/index.php/Home/UserPoints/index">积分记录</a></li>
		  </ul>
		  <div class="clear"></div>
		</div>
	</div>
	<!--//user_main_left End-->
	
	<div class="main_right">
		<div class="div_">个人中心 &gt;&gt; 设置形象照</div>
		<!--TAB BEGIN-->
		<div class="tab_list">
			<div class="tab_nv">
				<ul>
					<li class="tab_item"><a href="/yyw/index.php/Home/PhotoAlbum/index">我的相册</a></li>
					<li class="tab_item"><a href="/yyw/index.php/Home/PhotoAlbum/add">上传相册</a></li>
					<li class="tab_item current"><a href="/yyw/index.php/Home/Photo/set">设置形象照</a></li>
				</ul>
			</div>
		</div>
		<!--TAB END-->
		<!--div_smallnav_content_hover Begin-->
		<div class="div_smallnav_content_hover">
			<div class="item_title item_margin"><p>设置形象照</p><span class="shadow"></span></div>
			<div class="nav-tips">温馨提示：[√]表示审核通过，[X]表示审核未通过，[?]表示审核中。请上传您的单人真实照片，要求五官清晰。</div>		
			<form onSubmit="return doSubmit()" action="/yyw/index.php/Home/Photo/upload" method="post" enctype="multipart/form-data" name="upload_form" id="upload_form">
			<table class="user-table table-margin lh25" border="0" cellpadding="0" cellspacing="0" width="98%">
				<tbody>
					<tr>
						<td class="lblock" align="center" width="20%">
						<?php if($pic != null): ?><img src="/yyw/Public/Uploads/pic/<?php echo ($pic); ?>" border="0" height="227" width="185">
						<?php elseif($gender == 1): ?>	
							<img src="/yyw/Public/Uploads/pic/male.gif" border="0" height="227" width="185">
						<?php else: ?>
							<img src="/yyw/Public/Uploads/pic/female.gif" border="0" height="227" width="185"><?php endif; ?>当前形象照
						</td>
						<td class="rblock" valign="top">
							<table class="user-table table-margin lh35" border="0" cellpadding="0" cellspacing="0" width="98%">
							<!-- 状态 -->
							<tbody>
								<tr>
									<td class="lblock" width="15%">审核状态：</td>
									<td class="rblock">还没设置形象照</td>
								</tr>
								<!-- 删除 -->
								<tr>
									<td class="lblock">删除操作：</td>
									<td class="rblock"> <a href="javascript:if(confirm('确认删除吗?'))window.location='/yyw/index.php/Home/Photo/del'">删除</a>&nbsp;  </td>
								</tr>
								<!-- 上传形象照 -->
								<tr>
									<td class="lblock">上传头像：<span style="color:red">*</span></td>
									<td class="rblock"><input name="pic" class="filePrew" id="uploadpart" type="file"> <span id="duploadpart" class="f_red"></span></td>
								</tr>
								<tr>
									<td colspan="2" height="20"></td>
								</tr>
								<!-- 上传按钮 -->
								<tr>
									<td class="lblock"></td>
									<td style="display:block" id="id_uploadbox" class="rblock">
									<input id="btn_upload" value="开始上传" class="button-red" type="submit">&nbsp;&nbsp;&nbsp;
									<input id="btn_select" value="从相册选择形象照" class="button-green" onclick="javascript:window.location.href='/yyw/index.php/Home/PhotoAlbum/index';" type="button">
									</td>
								</tr>
								<!-- 上传进度 -->
								<tr>
									<td class="left"></td>
									<td class="right" id="id_loadingbar" style="display:none"><img src="/yyw/Public/images/uploading.gif" alt="照片上传中" border="0" height="19" width="220">照片上传中，请稍等...</td>
								</tr>
								<script type="text/javascript">
									function doSubmit(){
										var loadid = document.getElementById("id_loadingbar");
										var sle = document.getElementById("id_uploadbox");
										var uploadpart = document.getElementById("uploadpart").value;
										
										if(uploadpart == 0){
											alert("请选择要上传的图片！");
											return false;
										}
										//判断是否可见
										if(loadid.style.display=="block"){
											loadid.style.display="none";
										}else{
											loadid.style.display="block";
											sle.style.display="none";
										}
								
									}	
								</script>
							</tbody>
							</table>
						</td>
					</tr>
				</tbody>
			</table>
			</form>
			
			<table class="user-table table-margin lh25" border="0" cellpadding="0" cellspacing="0" width="98%">
			 <tbody>
				<tr>
					<td>
						<br>
						<b>温馨提示：</b><br>
						点击浏览，选择您想要上传作为形象照的照片；<br>
						仅支持PNG，JPG，JPEG，GIF格式，5M以下文件；<br>
						请上传您的单人真实照片，要求五官清晰。请勿上传明星、名人或他人照片，您将对此负法律责任；<br>
						如果您的照片被会员投诉为假照片，经查实会将您列入网站黑名单，以后都将无法注册和登录。
					</td>
				</tr>
			</tbody>
			</table>
		</div>
	</div>
	<div class="clear"> </div>

	  <div style="clear:both;"> </div>
	  <!--//user_main_right End--> 

<!--//user_main End--> 


<style>
.emface-border{
 border:1px solid #A7D2E2;
 width:436px;
 position:absolute;
 background-color:#ffffff;
 left:0px;
 top:0px;
}

.emface-bg{
 padding:5px;
 background-color:#EFF7FA;
 width:425px;
 text-align:right;
}
a.face-body, a.face-body:hover,a.face-body:visited,a.face-body:link{float:left;width:29px;height:29px;margin:0;padding:0;}

.eif-preview-pannel {
	position:absolute;left:0px;top:0px;width:85px;height:85px;border:1px solid #0000FF;
	background-color:#FFF;z-index:1002;
	display:none;
}

.eif-pannel {
	display:none;
	position:absolute;
	/*
	top:-1000px;left:-1000px;
	*/
	z-index:1000;
}
.eif-content {
	background-image:url(tpl/templets/default/cp/images/face_gif.png);
	background-repeat:no-repeat;width:438px;height:206px;overflow:hidden
}
</style>
<div id="emface_preview_pannel" class="eif-preview-pannel"></div>
<div id="emface_pannel" class="eif-pannel">
  <div class="emface-border">
	<div class="emface-bg"><a href="###" ><img src="/yyw/Public/images/em_close.gif" border="0"></a></div>
	<div class="clear"></div>

	</div>
</div> 
<div class="user_footer">
  <p>
	&nbsp;红娘客服 &nbsp;24小时服务QQ：<a target="_blank" href="#"><img src="/yyw/Public/images/pa.gif" alt="点击这里给我发消息" title="点击这里给我发消息" border="0"></a>&nbsp;
</p>
<p>
	<a href="#" target="_blank">婚恋网<span style="color:#666666;font-family:Tahoma, Verdana;line-height:22px;"><u>(www.hunlian.com)</u></span></a>婚恋交友版权所有 © 2010-<span id="footer-copyright-year">2015&nbsp;</span> 
</p>
</div>
<!--//user_footer End-->

<style>
.popwin-box{
  position:fixed;
  bottom:0px; 
  right:0px;
  background:url("/yyw/Public/images/popwin_bg.jpg") repeat-x bottom;

  width:100%;
}
.popwin-main {
	width:330px; 
	border:1px solid #f0f0f0; 
	margin-bottom:1px;
	bottom: 29px;
	position: absolute;
	z-index: 9;
	background:#ffffff;

}
.popwin-titlebar{background:#F0EDEB; padding:8px;height:20px;}
.popwin-title{ color: #C70067;display: inline;float: left;font-family: Microsoft YaHei,SimHei;font-size: 14px;line-height: 20px;}
.popwin-min{float:right; width:13px; height:10px; border-top:3px solid #D83473; line-height:20px; cursor:pointer;margin-top:5px;}

.popwin-menu{
	width:330px;height:30px;
	background:url("/yyw/Public/images/popwin_bg.jpg") repeat-x bottom;
}
.popwin-menu li{
	float:left; width:80px; text-align:center;padding:7px 0 0 0; 
	border-left:1px solid #ddd; position:relative;
}   
.popwin-menu li img {vertical-align:middle;padding-bottom:2px;}
.popwin-menu li:hover{cursor:pointer;}
.popwin-menu .popwin-tx{
	width: 8px; height: 8px; 
	background: url(/yyw/Public/images/icon.png) repeat scroll -100px -275px transparent; 
	position:absolute; top:9px; left:3px; display:none;
}
.popwin-menu span{padding-top:5px;}

.popwin-content {
	width:310px;padding:10px;background:#ffffff;
}
.popwin-content .popwin-nothing{
	padding:20px;line-height:20px;text-align:center;color:#666666;
}



.zm_popwin_left {
	float:left;width:50%;height:30px;color:#666666;
	position:fixed;
	bottom:0px; 
}
.zm_popwin_left ul li {
	float:left;line-height:30px;height:30px;
}
.zm_popwin_left ul li img {
	vertical-align:middle;
}
.zm_popwin_left .zm_popwin_rightbor {border-right:1px solid #ccc;}

.zm_popwin_right {
	float:right;width:330px;
}
</style>
	<div class="popwin-box">
	  
		  <div class="zm_popwin_left">
			<ul>
			  <li style="padding-left:20px;padding-right:10px;" class="zm_popwin_rightbor"><a href="/yyw/index.php/Home/User/view/act/userInfo">会员中心</a></li>
			  <li style="padding-left:10px;padding-right:10px;" class="zm_popwin_rightbor"><img src="/yyw/Public/images/popwin_avatar.gif"><a href="/yyw/index.php/Home/Photo/set">设置形象照</a></li>
			  
			  <li style="padding-left:10px;padding-right:10px;">
				<a href="<?php echo U('User/vip');?>"><img src="/yyw/Public/images/cid.png" src="/yyw/Public/css/popwin_vip.png" title="VIP服务" /></a>&nbsp;
				<a href="/yyw/index.php/Home/Choose/index">修改择友条件</a>
			  </li>

			</ul>
			<div style="clear:both;"></div>
		  </div>
		  <!--//zm_popwin_left End-->

		  <div class="zm_popwin_right">

				  <div class="popwin-main" style="display:none;" id="popwin-main">
						<div class="popwin-titlebar">
						  <span class="popwin-title"></span>
						  <div class="popwin-min" title="关闭消息"></div>
						  <div class="clear"></div>
						</div>
						<div class="popwin-content" id="popwin-data">
						
						</div>
				  </div>
				  <!--/popwin_main End-->
				
					<input id="click_menu_value" value="" type="hidden">
					<div class="popwin-menu">
						<ul id="uuid">
							  <li onclick="obj_click_menu('msg', '2', '我的信件');">
									<img src="/yyw/Public/images/popwin_letter.gif">信件
									<span id="popwinmsg"></span>
							  </li>

							  <li onclick="obj_click_menu('hi', '1', '我的招呼');">
									<img src="/yyw/Public/images/popwin_hi.gif">招呼
									<span id="popwinhi">
										
									</span>
							  </li>

							  <li onclick="obj_click_menu('gift', '3', '我的礼物');">
									<img src="/yyw/Public/images/popwin_gift.gif">礼物
									<span id="popwingift">
										
									</span>
							  </li>
							  <li onclick="obj_click_menu('sysmsg', '1', '我的消息');">
									<img src="/yyw/Public/images/popwin_gg.gif">消息
									<span id="popwinsysmsg"></span>
							  </li>
						</ul>
					</div>
				  <!--//popwin-menu End-->
		 
		  </div>
		  <!--//zm_popwin_right End-->
		  <div style="clear"></div>

	</div>

	<div style="display: none; position: fixed; left: 0px; top: 0px; width: 100%; height: 100%; cursor: move; opacity: 0; background: none repeat scroll 0% 0% rgb(255, 255, 255);"></div>
	<div style="position: absolute; top: -1970px; left: -1970px;" id="_my97DP">
	</div>
</body>
</html>