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
	var __url__ = '/yyw/index.php/Home/UserParams';
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
	
<script type="text/javascript" src="/yyw/Public/js/jquery-1.8.3.min.js"></script>
	<div class="main_right">
	<div class="div_">个人中心 &gt;&gt; 编辑资料</div>
	<!--TAB BEGIN-->
	<div class="tab_list">
		<div class="tab_nv">
			<ul>
				<li class="tab_item current"><a href="/yyw/index.php/Home/UserParams/index">基本资料</a></li>
				<li class="tab_item"><a href="/yyw/index.php/Home/Profile/index">详细资料</a></li>
				<li class="tab_item"><a href="/yyw/index.php/Home/Monologue/index">内心独白</a></li>
				<li class="tab_item"><a href="/yyw/index.php/Home/Information/index">联系资料</a></li>
			</ul>
		</div>
	</div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover basicdata">   
		<!--基本资料 Begin-->
		<form name="myform" id="myform" action="/yyw/index.php/Home/UserParams/update" method="post">
		<table class="user-table table-margin lh35" border="0" cellpadding="0" cellspacing="0" width="98%">
			<tbody>
			<tr>
				<td colspan="4" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>基本资料</p><span class="shadow"></span></div></td>
			</tr>
			<!-- 邮箱、名称 -->
			<tr>
				<td class="lblock" width="15%">登录邮箱 <span class="f_red"></span></td>
				<td class="rblock" width="35%"><font color="#999999"><?php echo ($email); ?></font></td>
				<td class="lblock" width="15%">用 户 名 <span class="f_red"></span></td>
				<td class="rblock" width="35%">
					<?php if($userparams["gender"] == 1): ?><img src="/yyw/Public/images/f2fde8e7d8aa2a10.gif" class="" border="0">&nbsp;
					<?php else: ?>
					<img src="/yyw/Public/images/87197a0d51022068.gif" class="" border="0">&nbsp;<?php endif; ?>
					<font color="#999999"><?php echo ($username); ?></font>
				</td>
			</tr>
			<!-- 性别、生日 -->
			<tr>
				<td class="lblock">性 别 <span class="f_red"></span></td>
				<td class="rblock">
					<font color="#999999">
						<?php if($userparams["gender"] == 1): ?>男
							<?php else: ?>女<?php endif; ?>
					</font> 
				</td>
				<td class="lblock">生 日 <span class="f_red"></span></td>
				<td class="rblock"><font color="#999999"><?php echo ($ageyear); ?>-<?php echo ($agemonth); ?>-<?php echo ($ageday); ?>&nbsp;&nbsp;<?php echo ($age); ?>  岁</font></td>
			</tr>
			<!-- 星座、生肖 -->
			<tr>
				<td class="lblock">星 座 <span class="f_red"></span></td>
				<td class="rblock">
					<font color="#999999">
						<?php $_RANGE_VAR_=explode(',',"1.20,2.18");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>水瓶座<?php endif; ?>						
						<?php $_RANGE_VAR_=explode(',',"2.19,3.20");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>双鱼座<?php endif; ?>
						<?php $_RANGE_VAR_=explode(',',"3.21,4.19");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>白羊座<?php endif; ?>							
						<?php $_RANGE_VAR_=explode(',',"4.20,5.20");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>金牛座<?php endif; ?>							
						<?php $_RANGE_VAR_=explode(',',"5.21,6.21");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>双子座<?php endif; ?>							
						<?php $_RANGE_VAR_=explode(',',"6.22,7.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>巨蟹座<?php endif; ?>							
						<?php $_RANGE_VAR_=explode(',',"7.23,8.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>狮子座<?php endif; ?>					
						<?php $_RANGE_VAR_=explode(',',"8.23,9.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>处女座<?php endif; ?>						
						<?php $_RANGE_VAR_=explode(',',"9.23,10.23");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>天枰座<?php endif; ?>						
						<?php $_RANGE_VAR_=explode(',',"10.24,11.22");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>天蝎座<?php endif; ?>						
						<?php $_RANGE_VAR_=explode(',',"11.23,12.21");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>射手座<?php endif; ?>						
						<?php $_RANGE_VAR_=explode(',',"12.22,1.19");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>摩羯座<?php endif; ?>						
					</font>
				</td>
				<td class="lblock">生 肖 <span class="f_red"></span></td>
				<td class="rblock">
					<font color="#999999">
						<?php echo ($shuxing); ?>
					</font> 
				</td>
			</tr>
			<!-- 婚姻、身高 -->
			<tr>
				<td class="lblock">婚姻状态 <span class="f_red"></span></td>
				<td class="rblock"><font color="#999999"><?php echo ($marrystatus); ?></font> <span class="f_red" id="dmarrystatus"></span></td>
				<td class="lblock">身 高 <span class="f_red"></span></td>
				<td class="rblock"><font color="#999999"><?php echo ($height); ?> CM</font> <span class="f_red" id="dheight"></span></td>
			</tr>
			<!-- 户籍、有无子女 -->
			<tr>
				<td class="lblock">所在城市<span class="f_red"></span></td>
				<td class="rblock">
				<font color="#999999"><?php echo ($sheng); ?>省</font>&nbsp;&nbsp;<font color="#999999"><?php echo ($shi); ?></font>
				<span id="provinceid" class="f_red"></span>
					<span id="json_cityid">
					</span>&nbsp; <span id="dcityid" class="f_red"></span>
					<span id="json_distid">	
					</span>
				</td>
				<td class="lblock">
					有无子女 <span class="f_red"></span>
				</td>
				<td class="rblock">
					<select name="child" id="childrenstatus">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["child"] == 1): ?>selected='selected'<?php endif; ?>>无小孩</option>
						<option value="2"<?php if($userparams["child"] == 2): ?>selected='selected'<?php endif; ?>>有,和我住一起</option>
						<option value="3"<?php if($userparams["child"] == 3): ?>selected='selected'<?php endif; ?>>有,有时和我住一起</option>
						<option value="4"<?php if($userparams["child"] == 4): ?>selected='selected'<?php endif; ?>>有,不和我住一起</option>
					</select>				
					<span id="dchildrenstatus" class="f_red"></span>
				</td>
			</tr>
			<!-- 所在地、交友目的 -->
			<tr>
				<td class="lblock">户籍 <span class="f_red"></span></td>
				<td class="rblock">
				<input name="hukou" type="text" value="<?php echo ($userparams["hukou"]); ?>" size="4"/>&nbsp;省/市&nbsp;<input name="huji" type="text" value="<?php echo ($userparams["huji"]); ?>" size="4"/>&nbsp;区/县
					<span id="dnationprovinceid" class="f_red"></span>
				<span id="json_nationcityid">
			
				</span>&nbsp;<span id="dnationcityid" class="f_red"></span>
				</td>
				<td class="lblock">交友类别 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="lovesort" id="lovesort">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["lovesort"] == 1): ?>selected='selected'<?php endif; ?>>朋友</option>
						<option value="2"<?php if($userparams["lovesort"] == 2): ?>selected='selected'<?php endif; ?>>知己</option>
						<option value="3"<?php if($userparams["lovesort"] == 3): ?>selected='selected'<?php endif; ?>>恋爱</option>
						<option value="4"<?php if($userparams["lovesort"] == 4): ?>selected='selected'<?php endif; ?>>结婚</option>
					</select> <span id="dlovesort" class="f_red"></span>
				</td>
			</tr>
			<!-- 个性、血型 -->
			<tr>
				<td class="lblock">个 性 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="personality" id="personality">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["personality"] == 1): ?>selected='selected'<?php endif; ?>>浪漫迷人</option>
						<option value="2"<?php if($userparams["personality"] == 2): ?>selected='selected'<?php endif; ?>>成熟稳重</option>
						<option value="3"<?php if($userparams["personality"] == 3): ?>selected='selected'<?php endif; ?>>风趣幽默</option>
						<option value="4"<?php if($userparams["personality"] == 4): ?>selected='selected'<?php endif; ?>>乐天达观</option>
						<option value="5"<?php if($userparams["personality"] == 5): ?>selected='selected'<?php endif; ?>>活泼可爱</option>
						<option value="6"<?php if($userparams["personality"] == 6): ?>selected='selected'<?php endif; ?>>忠厚老实</option>
						<option value="7"<?php if($userparams["personality"] == 7): ?>selected='selected'<?php endif; ?>>淳朴害羞</option>
						<option value="8"<?php if($userparams["personality"] == 8): ?>selected='selected'<?php endif; ?>>温柔体贴</option>
						<option value="9"<?php if($userparams["personality"] == 9): ?>selected='selected'<?php endif; ?>>多愁善感</option>
						<option value="10"<?php if($userparams["personality"] == 10): ?>selected='selected'<?php endif; ?>>新潮时尚</option>
						<option value="11"<?php if($userparams["personality"] == 11): ?>selected='selected'<?php endif; ?>>热辣动感</option>
						<option value="12"<?php if($userparams["personality"] == 12): ?>selected='selected'<?php endif; ?>>豪放不羁</option>
					</select> 
					<span id="dpersonality"></span>
				</td>
				<td class="lblock">血 型 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="bloodtype" id="blood">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["bloodtype"] == 1): ?>selected='selected'<?php endif; ?>>A型</option>
						<option value="2"<?php if($userparams["bloodtype"] == 2): ?>selected='selected'<?php endif; ?>>B型</option>
						<option value="3"<?php if($userparams["bloodtype"] == 3): ?>selected='selected'<?php endif; ?>>O型</option>
						<option value="4"<?php if($userparams["bloodtype"] == 4): ?>selected='selected'<?php endif; ?>>AB型</option>
						<option value="5"<?php if($userparams["bloodtype"] == 5): ?>selected='selected'<?php endif; ?>>其他</option>
					</select> <span id="dblood" class="f_red"></span>
				</td>
			</tr>
			<!-- 行业、月薪 -->
			<tr>
				<td class="lblock">职 业 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="job" id="jobs">					
						<?php if(is_array($zhiye)): $i = 0; $__LIST__ = $zhiye;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$zhiye): $mod = ($i % 2 );++$i;?><option value="<?php echo ($key); ?>"<?php if($userparams["job"] == $key): ?>selected='selected'<?php endif; ?>><?php echo ($zhiye); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select> 
					<span id="djobs"></span>
				</td>
				<td class="lblock">月薪收入 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="salary" id="salary">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["salary"] == 1): ?>selected='selected'<?php endif; ?>>2000元以下</option>
						<option value="2"<?php if($userparams["salary"] == 2): ?>selected='selected'<?php endif; ?>>2000~5000元</option>
						<option value="3"<?php if($userparams["salary"] == 3): ?>selected='selected'<?php endif; ?>>5000~10000元</option>
						<option value="4"<?php if($userparams["salary"] == 4): ?>selected='selected'<?php endif; ?>>10000~20000元</option>
						<option value="5"<?php if($userparams["salary"] == 5): ?>selected='selected'<?php endif; ?>>20000元以上</option>
					</select> <span id="dsalary" class="f_red"></span>
				</td>
			</tr>
			<!-- 住房、购车 -->
			<tr>
				<td class="lblock">住房情况 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="house" id="housing">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["house"] == 1): ?>selected='selected'<?php endif; ?>>暂未购房</option>
						<option value="2"<?php if($userparams["house"] == 2): ?>selected='selected'<?php endif; ?>>需要时置房</option>
						<option value="3"<?php if($userparams["house"] == 3): ?>selected='selected'<?php endif; ?>>已购住房</option>
						<option value="4"<?php if($userparams["house"] == 4): ?>selected='selected'<?php endif; ?>>与人合租</option>
						<option value="5"<?php if($userparams["house"] == 5): ?>selected='selected'<?php endif; ?>>独自租房</option>
						<option value="6"<?php if($userparams["house"] == 6): ?>selected='selected'<?php endif; ?>>与父母同住</option>
						<option value="7"<?php if($userparams["house"] == 7): ?>selected='selected'<?php endif; ?>>住亲朋家</option>
						<option value="8"<?php if($userparams["house"] == 8): ?>selected='selected'<?php endif; ?>>住单位房</option>
					</select> <span id="dhousing"></span>
				</td>
				<td class="lblock">购车情况 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="car" id="caring">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["car"] == 1): ?>selected='selected'<?php endif; ?>>暂未购车</option>
						<option value="2"<?php if($userparams["car"] == 2): ?>selected='selected'<?php endif; ?>>已经购车</option>
					</select> <span id="dcaring"></span>
				</td>
			</tr>
			<tr>
				<td colspan="4" style="padding-top:10px;padding-bottom:10px;">
					<div class="item_title" style="width:100%"><p>外貌体型</p><span class="shadow"></span></div>
				</td>
			</tr>
			<!-- 体重、外貌自评 -->
			<tr>
				<td class="lblock">体 重 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="weight" id="weight">
						<option selected="selected" value="0">=请选择=</option>
						<?php $__FOR_START_26160__=30;$__FOR_END_26160__=151;for($i=$__FOR_START_26160__;$i < $__FOR_END_26160__;$i+=1){ ?><option value="<?php echo ($i); ?>"<?php if($userparams["weight"] == $i): ?>selected='selected'<?php endif; ?>><?php echo ($i); ?></option><?php } ?>
					</select> 公斤
				</td>
				<td class="lblock">外貌自评 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="zjappearance" id="profile">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["zjappearance"] == 1): ?>selected='selected'<?php endif; ?>>文质彬彬型</option>
						<option value="2"<?php if($userparams["zjappearance"] == 2): ?>selected='selected'<?php endif; ?>>西部牛仔型</option>
						<option value="3"<?php if($userparams["zjappearance"] == 3): ?>selected='selected'<?php endif; ?>>阳光帅气型</option>
						<option value="4"<?php if($userparams["zjappearance"] == 4): ?>selected='selected'<?php endif; ?>>风度翩翩型</option>
						<option value="5"<?php if($userparams["zjappearance"] == 5): ?>selected='selected'<?php endif; ?>>成熟魅力型</option>
						<option value="6"<?php if($userparams["zjappearance"] == 6): ?>selected='selected'<?php endif; ?>>健壮高大型</option>
						<option value="7"<?php if($userparams["zjappearance"] == 7): ?>selected='selected'<?php endif; ?>>朴实无华型</option>
						<option value="8"<?php if($userparams["zjappearance"] == 8): ?>selected='selected'<?php endif; ?>>内敛酷男型</option>
						<option value="9"<?php if($userparams["zjappearance"] == 9): ?>selected='selected'<?php endif; ?>>秀外慧中</option>
						<option value="10"<?php if($userparams["zjappearance"] == 10): ?>selected='selected'<?php endif; ?>>眉清目秀</option>
						<option value="11"<?php if($userparams["zjappearance"] == 11): ?>selected='selected'<?php endif; ?>>明眸善睐</option>
						<option value="12"<?php if($userparams["zjappearance"] == 12): ?>selected='selected'<?php endif; ?>>娇小依人</option>
						<option value="13"<?php if($userparams["zjappearance"] == 13): ?>selected='selected'<?php endif; ?>>青春活泼</option>
						<option value="14"<?php if($userparams["zjappearance"] == 14): ?>selected='selected'<?php endif; ?>>成熟魅力</option>
						<option value="15"<?php if($userparams["zjappearance"] == 15): ?>selected='selected'<?php endif; ?>>雍容华贵</option>
						<option value="16"<?php if($userparams["zjappearance"] == 16): ?>selected='selected'<?php endif; ?>>淡雅如菊</option>
					</select> 
				</td>
			</tr>	  
			<!-- 特征、发型 -->
			<tr>
				<td class="lblock">魅力部位 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="attractive" id="charmparts">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["attractive"] == 1): ?>selected='selected'<?php endif; ?>>笑容</option>
						<option value="2"<?php if($userparams["attractive"] == 2): ?>selected='selected'<?php endif; ?>>眉毛</option>
						<option value="3"<?php if($userparams["attractive"] == 3): ?>selected='selected'<?php endif; ?>>眼睛</option>
						<option value="4"<?php if($userparams["attractive"] == 4): ?>selected='selected'<?php endif; ?>>头发</option>
						<option value="5"<?php if($userparams["attractive"] == 5): ?>selected='selected'<?php endif; ?>>鼻梁</option>
						<option value="6"<?php if($userparams["attractive"] == 6): ?>selected='selected'<?php endif; ?>>嘴唇</option>
						<option value="7"<?php if($userparams["attractive"] == 7): ?>selected='selected'<?php endif; ?>>牙齿</option>
						<option value="8"<?php if($userparams["attractive"] == 8): ?>selected='selected'<?php endif; ?>>颈部</option>
						<option value="9"<?php if($userparams["attractive"] == 9): ?>selected='selected'<?php endif; ?>>耳朵</option>
						<option value="10"<?php if($userparams["attractive"] == 10): ?>selected='selected'<?php endif; ?>>手</option>
						<option value="11"<?php if($userparams["attractive"] == 11): ?>selected='selected'<?php endif; ?>>胳膊</option>
						<option value="12"<?php if($userparams["attractive"] == 12): ?>selected='selected'<?php endif; ?>>胸部</option>
						<option value="13"<?php if($userparams["attractive"] == 13): ?>selected='selected'<?php endif; ?>>腰部</option>
						<option value="14"<?php if($userparams["attractive"] == 14): ?>selected='selected'<?php endif; ?>>臀部</option>
						<option value="15"<?php if($userparams["attractive"] == 15): ?>selected='selected'<?php endif; ?>>腿</option>
						<option value="16"<?php if($userparams["attractive"] == 16): ?>selected='selected'<?php endif; ?>>脚</option>
						<option value="17"<?php if($userparams["attractive"] == 17): ?>selected='selected'<?php endif; ?>>没有太特别的</option>
					</select> 
				</td>
				<td class="lblock">发 型 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="haircut" id="hairstyle">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["haircut"] == 1): ?>selected='selected'<?php endif; ?>>顺直长发</option>
						<option value="2"<?php if($userparams["haircut"] == 2): ?>selected='selected'<?php endif; ?>>卷曲长发</option>
						<option value="3"<?php if($userparams["haircut"] == 3): ?>selected='selected'<?php endif; ?>>中等长度</option>
						<option value="4"<?php if($userparams["haircut"] == 4): ?>selected='selected'<?php endif; ?>>短发</option>
						<option value="5"<?php if($userparams["haircut"] == 5): ?>selected='selected'<?php endif; ?>>很短</option>
						<option value="6"<?php if($userparams["haircut"] == 6): ?>selected='selected'<?php endif; ?>>光头</option>
						<option value="7"<?php if($userparams["haircut"] == 7): ?>selected='selected'<?php endif; ?>>其他</option>
					</select> 
				</td>
			</tr>
			<!-- 发色、面型 -->
			<tr>
				<td class="lblock">发 色 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="haircolor" id="haircolor">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["haircolor"] == 1): ?>selected='selected'<?php endif; ?>>黑色</option>
						<option value="2"<?php if($userparams["haircolor"] == 2): ?>selected='selected'<?php endif; ?>>金色</option>
						<option value="3"<?php if($userparams["haircolor"] == 3): ?>selected='selected'<?php endif; ?>>褐色</option>
						<option value="4"<?php if($userparams["haircolor"] == 4): ?>selected='selected'<?php endif; ?>>栗色</option>
						<option value="5"<?php if($userparams["haircolor"] == 5): ?>selected='selected'<?php endif; ?>>灰色</option>
						<option value="6"<?php if($userparams["haircolor"] == 6): ?>selected='selected'<?php endif; ?>>红色</option>
						<option value="7"<?php if($userparams["haircolor"] == 7): ?>selected='selected'<?php endif; ?>>白色</option>
						<option value="8"<?php if($userparams["haircolor"] == 8): ?>selected='selected'<?php endif; ?>>挑染</option>
						<option value="9"<?php if($userparams["haircolor"] == 9): ?>selected='selected'<?php endif; ?>>光头</option>
						<option value="10"<?php if($userparams["haircolor"] == 10): ?>selected='selected'<?php endif; ?>>其它</option>
					</select>
				</td>
				<td class="lblock">脸 型 <span class="f_red"></span></td>
				<td class="rblock">
					<select name="face" id="facestyle">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["face"] == 1): ?>selected='selected'<?php endif; ?>>圆脸型</option>
						<option value="2"<?php if($userparams["face"] == 2): ?>selected='selected'<?php endif; ?>>方脸型</option>
						<option value="3"<?php if($userparams["face"] == 3): ?>selected='selected'<?php endif; ?>>长脸型</option>
						<option value="4"<?php if($userparams["face"] == 4): ?>selected='selected'<?php endif; ?>>瓜子脸型</option>
						<option value="5"<?php if($userparams["face"] == 5): ?>selected='selected'<?php endif; ?>>鸭蛋脸型</option>
						<option value="6"<?php if($userparams["face"] == 6): ?>selected='selected'<?php endif; ?>>国字脸型</option>
						<option value="7"<?php if($userparams["face"] == 7): ?>selected='selected'<?php endif; ?>>三角脸型</option>
						<option value="8"<?php if($userparams["face"] == 8): ?>selected='selected'<?php endif; ?>>菱形脸型</option>
					</select>
				</td>
			</tr>
			<!-- 体型 -->
			<tr>
				<td class="lblock">体 型 <span class="f_red"></span></td>
				<td class="rblock" colspan="3">
					<select name="size" id="bodystyle">
						<option selected="selected" value="0">=请选择=</option>
						<option value="1"<?php if($userparams["size"] == 1): ?>selected='selected'<?php endif; ?>>瘦</option>
						<option value="2"<?php if($userparams["size"] == 2): ?>selected='selected'<?php endif; ?>>较瘦</option>
						<option value="3"<?php if($userparams["size"] == 3): ?>selected='selected'<?php endif; ?>>匀称</option>
						<option value="4"<?php if($userparams["size"] == 4): ?>selected='selected'<?php endif; ?>>苗条</option>
						<option value="5"<?php if($userparams["size"] == 5): ?>selected='selected'<?php endif; ?>>高挑</option>
						<option value="6"<?php if($userparams["size"] == 6): ?>selected='selected'<?php endif; ?>>丰满</option>
						<option value="7"<?php if($userparams["size"] == 7): ?>selected='selected'<?php endif; ?>>健壮</option>
						<option value="8"<?php if($userparams["size"] == 8): ?>selected='selected'<?php endif; ?>>魁梧</option>
						<option value="9"<?php if($userparams["size"] == 9): ?>selected='selected'<?php endif; ?>>胖</option>
						<option value="10"<?php if($userparams["size"] == 10): ?>selected='selected'<?php endif; ?>>较胖</option>
					</select> 
				</td>
			</tr>
			<!-- 提交按钮  name="btn_save"-->
			<tr>
				<td class="lblock" height="50px"></td>
				<td class="rblock" colspan="3">				
					<input value="提交保存" class="button-red" type="submit">
				</td>
			</tr>
		</tbody>
		</table>
		</form>
		</div>
		<div class="clear"></div>
	</div>

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