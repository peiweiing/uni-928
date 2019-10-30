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
	var __url__ = '/yyw/index.php/Home/Choose';
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
    <div class="div_">个人中心 &gt;&gt; 设置择友条件</div>
	<div class="nav-tips">设定您的择友要求，配对更对符合你心意的会员。</div>
    <!--TAB BEGIN-->
    <div class="tab_list">
	  <div class="tab_nv">
	    <ul>
		  <li class="tab_item current"><a href="/yyw/index.php/Home/Choose/index">择友条件</a></li>
		  <li class="tab_item"><a href="http://www.yyw1314.com/usercp.php?c=match">缘分速配</a></li>
	    </ul>
	  </div>
    </div>
	<!--TAB END-->
	<div class="div_smallnav_content_hover basicdata">
	   
	  <!--基本资料 Begin-->
	<form name="myform" id="myform" action="/yyw/index.php/Home/Choose/update" method="post">
	<table class="user-table table-margin lh35" cellpadding="0" cellspacing="0" border="0" width="98%">
		<tbody>
		<tr>
			<td colspan="4" style="padding-bottom:10px;"><div class="item_title" style="width:100%"><p>择友条件</p><span class="shadow"></span></div></td>
		</tr>
		<tr>
			<td class="lblock" width="20%">性 别 </td>
			<td class="rblock">
			<input checked='checked' name="sex" id="gender" type="radio" value="0" <?php if($sex == 0): ?>checked='checked'<?php endif; ?>>不限，
			<input name="sex" id="gender" value="1" type="radio" <?php if($sex == 1): ?>checked='checked'<?php endif; ?>>男会员，
			<input name="sex" id="gender" value="2" type="radio" <?php if($sex == 2): ?>checked='checked'<?php endif; ?>>女会员
			</td>
		</tr>
		<tr>
			<td class="lblock">年 龄 </td>
			<td class="rblock">
				<select name="age[]" id="startage">
					<option value="0" selected="selected">不限</option>
					<?php $__FOR_START_25652__=18;$__FOR_END_25652__=61;for($i=$__FOR_START_25652__;$i < $__FOR_END_25652__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($age[0] == $i): ?>selected='selected'<?php endif; ?>><?php echo ($i); ?></option><?php } ?>
				</select> 到 
				<select name="age[]" id="endage">
					<option value="0" selected="selected">不限</option>
					<?php $__FOR_START_12893__=18;$__FOR_END_12893__=61;for($i=$__FOR_START_12893__;$i < $__FOR_END_12893__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($age[1] == $i): ?>selected='selected'<?php endif; ?>><?php echo ($i); ?></option><?php } ?>
				</select> 岁
			</td>
		</tr>
		<tr>
			<td class="lblock">身 高 </td>
			<td class="rblock">
				<select name="weight[]" id="startheight">
					<option value="0" selected="selected">不限</option>
					
					<?php $__FOR_START_30674__=130;$__FOR_END_30674__=201;for($i=$__FOR_START_30674__;$i < $__FOR_END_30674__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($weight[0] == $i): ?>selected='selected'<?php endif; ?>><?php echo ($i); ?></option><?php } ?>
					
				</select> 到 
				<select name="weight[]" id="endheight">
					<option value="0" selected="selected" >不限</option>
					<?php $__FOR_START_12451__=130;$__FOR_END_12451__=201;for($i=$__FOR_START_12451__;$i < $__FOR_END_12451__;$i+=1){ ?><option value="<?php echo ($i); ?>" <?php if($weight[1] == $i): ?>selected='selected'<?php endif; ?>><?php echo ($i); ?></option><?php } ?>
				</select> 厘米
			</td>
		</tr>
		<tr>
			<td class="lblock">婚 史 </td>
			<td class="rblock">
			<table id="hisid" cellpadding="0" cellspacing="0" align="left" border="0" width="98%">  
				<tbody>
				<tr> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="hismarriage[]" id="marry[]" value="1" type="checkbox" <?php if(($hismarriage[0] == 1) OR ($hismarriage[1] == 1)): ?>checked='checked'<?php endif; ?>> 单身 </td> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="hismarriage[]" id="marry[]" value="2" type="checkbox" <?php if(($hismarriage[0] == 2) OR ($hismarriage[1] == 2)): ?>checked='checked'<?php endif; ?>> 已婚 </td> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="hismarriage[]" id="marry[]" value="3" type="checkbox" <?php if(($hismarriage[0] == 3) OR ($hismarriage[1] == 3)): ?>checked='checked'<?php endif; ?>> 离异 </td> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="hismarriage[]" id="marry[]" value="4" type="checkbox" <?php if(($hismarriage[0] == 4) OR ($hismarriage[1] == 4)): ?>checked='checked'<?php endif; ?>> 丧偶 </td> 
				</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<tr>
			<td class="lblock">交友类别</td>
			<td class="rblock">
			<table cellpadding="0" cellspacing="0" align="left" border="0" width="98%">
				<tbody>
				<tr> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="type[]" id="lovesort[]" value="1" type="checkbox" <?php if(($type[0] == 1) OR ($type[1] == 1)): ?>checked='checked'<?php endif; ?>> 朋友 </td> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="type[]" id="lovesort[]" value="2" type="checkbox" <?php if(($type[0] == 2) OR ($type[1] == 2)): ?>checked='checked'<?php endif; ?>> 知己 </td> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="type[]" id="lovesort[]" value="3" type="checkbox" <?php if(($type[0] == 3) OR ($type[1] == 3)): ?>checked='checked'<?php endif; ?>> 恋爱 </td> 
					<td class="hback" width="20%"> <input onclick="doClick(this,2)" name="type[]" id="lovesort[]" value="4" type="checkbox" <?php if(($type[0] == 4) OR ($type[1] == 4)): ?>checked='checked'<?php endif; ?>> 结婚 </td> 
				</tr>
				</tbody>
			</table>
			</td>
		</tr>
		<script type="text/javascript">		
		function doClick(obj, num) {
			var hisid = document.getElementsByName("type[]");
			var hismarriage = document.getElementsByName("hismarriage[]");
			var m=0;s=0;
			for(var i=0;i<hisid.length;i ++){
				if(hisid[i].checked == true){
					m=m+1;
				}
			}		
			for(var i=0;i<hismarriage.length;i ++){
				if(hismarriage[i].checked == true){
					s=s+1;
				}
			}
			if(m>num){
				alert("最多选择两项！");
				obj.checked = false;
			}			
			if(s>num){
				alert("最多选择两项！");
				obj.checked = false;
			}
		}
		</script>
		<tr>
			<td class="lblock">学 历 </td>
			<td class="rblock">
				<select name="education[]" id="startedu">
					<option selected="selected" value="">不限</option>
					<option value="1" <?php if($education[0] == 1): ?>selected='selected'<?php endif; ?>>中专以下学历</option>
					<option value="2" <?php if($education[0] == 2): ?>selected='selected'<?php endif; ?>>中专</option>
					<option value="3" <?php if($education[0] == 3): ?>selected='selected'<?php endif; ?>>大专</option>
					<option value="4" <?php if($education[0] == 4): ?>selected='selected'<?php endif; ?>>本科</option>
					<option value="5" <?php if($education[0] == 5): ?>selected='selected'<?php endif; ?>>硕士</option>
					<option value="6" <?php if($education[0] == 6): ?>selected='selected'<?php endif; ?>>博士</option>
					<option value="7" <?php if($education[0] == 7): ?>selected='selected'<?php endif; ?>>博士后</option>
				</select> 到 
				<select name="education[]" id="endedu">
					<option selected="selected" value="">不限</option>
					<option value="1" <?php if($education[1] == 1): ?>selected='selected'<?php endif; ?>>中专以下学历</option>
					<option value="2" <?php if($education[1] == 2): ?>selected='selected'<?php endif; ?>>中专</option>
					<option value="3" <?php if($education[1] == 3): ?>selected='selected'<?php endif; ?>>大专</option>
					<option value="4" <?php if($education[1] == 4): ?>selected='selected'<?php endif; ?>>本科</option>
					<option value="5" <?php if($education[1] == 5): ?>selected='selected'<?php endif; ?>>硕士</option>
					<option value="6" <?php if($education[1] == 6): ?>selected='selected'<?php endif; ?>>博士</option>
					<option value="7" <?php if($education[1] == 7): ?>selected='selected'<?php endif; ?>>博士后</option>
				</select>
			</td>
		</tr>
		<!-- 所在地区 -->
	    <tr>
			<td class="lblock">所在地区</td>
			<td class="rblock">

			<select name="area[]" id="province_1"></select>
			<select name="area[]" id="province_1"><option><?php echo ($area["name"]); ?></option></select>			
			</td>
			

		</tr>
		<tr>
			<td class="lblock">诚信星级 </td>
			<td class="rblock">
			<select name="star[]" id="star">
				<option value="">=不限=</option>
				<option value="1" <?php if($star[0] == 1): ?>selected='selected'<?php endif; ?>>1</option>
				<option selected="selected" value="2" <?php if($star[0] == 2): ?>selected='selected'<?php endif; ?>>2</option>
				<option value="3" <?php if($star[0] == 3): ?>selected='selected'<?php endif; ?>>3</option>
				<option value="4" <?php if($star[0] == 4): ?>selected='selected'<?php endif; ?>>4</option>
				<option value="5" <?php if($star[0] == 5): ?>selected='selected'<?php endif; ?>>5</option>
				<option value="6" <?php if($star[0] == 6): ?>selected='selected'<?php endif; ?>>6</option>
				<option value="7" <?php if($star[0] == 7): ?>selected='selected'<?php endif; ?>>7</option>
				<option value="8" <?php if($star[0] == 8): ?>selected='selected'<?php endif; ?>>8</option>
				<option value="9" <?php if($star[0] == 9): ?>selected='selected'<?php endif; ?>>9</option>
				<option value="10" <?php if($star[0] == 10): ?>selected='selected'<?php endif; ?>>10</option>
			</select>&nbsp;&nbsp;星&nbsp;&nbsp;
			<select name="star[]" id="starup">
			<option value=""></option>
			<option selected="selected" value="1" <?php if($star[1] == 1): ?>selected='selected'<?php endif; ?>>以上</option>
			<option value="2" <?php if($star[1] == 2): ?>selected='selected'<?php endif; ?>>以下</option>
			</select>
			</td>
		</tr>
		<tr>
			<td class="lblock">有无形象照 </td>
			<td class="rblock">
			<input checked="checked" name="ishead" id="avatar" value="1" type="radio" <?php if($ishead == 1): ?>checked='checked'<?php endif; ?>>有形象照，
			<input name="ishead" id="avatar" value="0" type="radio" <?php if($ishead == 0): ?>checked='checked'<?php endif; ?>>不限
			</td>
		</tr>

		<!-- 提交按钮 -->
		<tr>
			<td class="lblock" height="50px"></td>
			<td class="rblock" colspan="3">				
			<input name="btn_save" value="提交保存" class="button-red" type="submit">
			</td>
		</tr>
	</tbody>
	</table>
	</form>
	<!--基本资料 End-->
	  
	</div>
	<div class="clear"></div>
	<!--//div_smallnav_content_hover End-->
	</div>
	<div class="clear"></div>
	<script type="text/javascript">
	var area1 = <?php echo $areaa;?>;

		//发送一个ajax请求加载一级城市信息
		$.ajax({
			url:'/yyw/index.php/Home/Choose/loaddist',
			type:'get',
			dataType:'json',
			success:function(data){
				$info = "<option>-不限-</option>";
				for(var i=0;i<data.length;i++){
				if(data[i].id != area1){
						$info += "<option value='"+data[i].id+"'>"+data[i].name+"</option>";
					}else{
						$info += "<option value='"+data[i].id+"' selected='selected'>"+data[i].name+"</option>";
					}
				}			
				$("#province_1").html($info);
			},
		});	
		$("#province_1").change(function(){		
			citys();		
		});			
		//做级联选择事件操作
		function citys(){
			//获取事件源节点对象	
			var sel = $("#province_1");
			var uid = sel.val();//获取下拉框值
			sel.nextAll().remove();
			$.ajax({
				url:'/yyw/index.php/Home/Choose/loaddist',
				type:'get',
				data:{upid:uid},
				dataType:'json',
				success:function(data){				
					if(data==null) return;
					$info = "<select name='area[]' id='cityid'><option>-不限-</option>";
					for(var i=0;i<data.length;i++){
						$info += "<option value='"+data[i].id+"'>"+data[i].name+"</option>";	
					}
					$info +="</select>";
					sel.after($info);
				},
			});		
		}	

	</script>

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