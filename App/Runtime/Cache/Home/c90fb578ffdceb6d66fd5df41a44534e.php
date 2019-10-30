<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>婚恋网-免费交友大厅</title>

<link rel="stylesheet" href="/yyw/Public/css/public.css" media="screen">
<link rel="stylesheet" href="/yyw/Public/css/v3.css" media="screen">
<link rel="stylesheet" href="/yyw/Public/css/button.css">
<link rel="stylesheet" href="/yyw/Public/css/vipzy.css">
<link href="/yyw/Public/css/love.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/yyw/Public/css/WdatePicker.css">
<link href="/yyw/Public/css/jdialog.css" rel="stylesheet" type="text/css">
<link href="/yyw/Public/css/share_style0_16.css" rel="stylesheet">
<script type="text/javascript">
	var __module__ = "/yyw/index.php/Home";
	var __public__ = "/yyw/Public";
</script>
<script type="text/javascript" src="/yyw/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/yyw/Public/js/styleAndMove.js"></script>
<script type="text/javascript" src="/yyw/Public/js/checkReg.js"></script>
<script type="text/javascript" src="/yyw/Public/js/myAjax.js"></script>
<script type="text/javascript" src="/yyw/Public/js/verifyLogin.js"></script>
<script type="text/javascript" src="/yyw/Public/js/flink.js"></script>
<script type="text/javascript" src="/yyw/Public/js/messageBox.js"></script>
<script type="text/javascript" src="/yyw/Public/js/proMess.js"></script>
<script type="text/javascript" src="/yyw/Public/js/imgCarousel.js"></script>
<script type="text/javascript" src="/yyw/Public/js/diaryComment.js"></script>
<script type="text/javascript" src="/yyw/Public/js/search.js"></script>
<script type="text/javascript" src="/yyw/Public/js/noRead.js"></script>
<style type="text/css">
	li.greeting_hover{
		background-color:#bc8f8f;
	}
	a.current{background-color:#d83473;color:white;}
</style>

</head>
<body>
<!-- 判断用户是否登录弹出层 -->
<div id="jd_dialog" style="left: 50%; top: 120px; display:none;"> <!-- 1 -->
    <div id="jd_dialog_s" style="width: 618px; height: 406px;"> </div>
    <div id="jd_dialog_m" style="width: 610px; display:none;"> <!-- 2 -->
        <!-- 横条 -->
        <div id="jd_dialog_m_h">
            <span id="jd_dialog_m_h_l">会员登录</span>
            <span id="jd_dialog_m_h_r" title="关闭">x</span>
        </div>
        <div id="jd_dialog_m_b_1" style="top: 30px; width: 610px; height: 350px; display: none;"> </div>
        <!-- 内容 -->
        <div id="jd_dialog_m_b_2" style="">
            <div class="loginbox" style="margin:0 auto; margin-left:130px;">
                <div class="log_box">
                      <form method="post" action="/yyw/index.php/Home/Login/login" name="login_form" id="ceng_loginForm">
                            <div class="form_li  desc">
                                登录网站
                            </div>
                            <div class="formtip">
                              <p id="login_errorMsg" class="color5"></p>
                            </div>
                            <!-- 账号 -->
                            <div class="form_li pas">
                              <label class="lo_la">账　号：</label>
                              <input name="username" id="ceng_loginName" value="用户名/邮箱" class="w1" type="text">
                            </div>
                            <!-- 密码 -->
                            <div class="form_li pas">
                                  <label class="lo_la">密　码：</label>
                                  <input name="password" id="ceng_passWord" class="w1" type="password">
                            </div>
                            <div class="form_li">
                                <!-- 登陆按钮 -->
                                <a id="btn_a1" href="javascript:void(0);">
                                <!-- <button class="login_register" onclick="return checklogin();">登  录</button> -->
                                <input type="submit" value="" style="width:135px;height:45px;background:url(/yyw/Public/images/cengLogin.png) no-repeat; border:none;cursor:pointer;" />
                                </a>
                                <!-- 忘记密码 -->
                                <a href="#" target="_blank">忘记密码</a>
                          
                            </div>                
                            
                        </form>
                        <script type="text/javascript">
                            verifyLogin('ceng_loginForm', 'ceng_loginName', 'ceng_passWord');
                        </script>
                        
                </div>
                <div class="cooperation">
                      <p class="login_list clearfix color3"> <span class="li_d">·</span>没有账号？ <a class="no_ico" 

            href="/yyw/index.php/Home/Login/register">立即注册</a><br>
                        
                        <span class="li_d" style="display:none;">·用合作网站账号登录</span>
                        
                                                <a href="#" target="_blank"><img 

            src="/yyw/Public/images/qq.gif">&nbsp;&nbsp;QQ登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#" target="_blank"><img src="/yyw/Public/images/sina.gif">&nbsp;&nbsp;新浪微博登录

            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                  
                      </p>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- style height:1942px; -->
<div id="jd_shadow" style="width: 0px; height: 0px; display:none;"> </div><!-- 3 -->
<!-- 弹出层结束 -->
<?php if($_SESSION['user']== null): ?><span id="notlogined"></span>
<?php else: ?>
<span id="logined"></span><?php endif; ?>
<script type="text/javascript">
    //调用弹出层函数 loadLogin
    loadLogin();
</script>

<div id="message_ceng" style="display:none;position:absolute;z-index:200;background-color:black;"></div>
<div id="loadleft" style="display:none;position:absolute;z-index:1500;"><img src="/yyw/Public/images/jdloading.gif"/><br/>加载中...</div>
<div id="loadright" style="display:none;position:absolute;z-index:1500;"><img src="/yyw/Public/images/jdloading.gif"/><br/>加载中...</div>

<div id="message_box" style="width:600px;height:350px;display:none;position:absolute;z-index:1000;">
	<div id="message_head" style="width:100%;height:35px;background-color:#dd127b;">
		<span style="width:50px;line-height:35px;float:left;color:white;text-indent:10px;"><b>写信件</b></span>
		<a href="javascript:void(0);"><span id="close_box" style="margin-right:10px;line-height:35px;float:right;color:white;">X</span></a>
	</div>
	<div style="width:100%;height:100%;background-color:#fafff0;">
		<div id="userinfo" style="width:25%;height:100%;float:left;">
			
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

<div id="header">
	  <div class="topwrap">
		<div class="hwrap">
		  <div class="logowrap"><a href="/yyw/index.php/Home/Index/index"><img src="/yyw/Public/images/240b5963bb45432a.gif" alt="婚恋网" height="64" width="160"></a></div>
		</div>
		<div class="topad">
				<a href="/yyw/index.php/Home/Index/index" target="_self"><img src="/yyw/Public/images/8e9b18b723286a1f.jpg" title="" border="0" height="76" width="118"></a>
			</div>
		<div class="tipswrap"> 
		<span class="tips_wap">
		<a href="javascript:void(0);" class="waptips" title="">手机交友</a>
		</span><span class="tips_com"><a href="#">会员服务</a></span> <span class="tips_save"><a href="javascript:void(0);">收藏本站</a></span> 
		</div>		
            <!-- 会员中心登录状态 -->
			<!-- 前台登录状态 -->
            
                <?php if(empty($_SESSION['user'])): ?><div class="toplogin">
                        游客欢迎您
                        <a href="/yyw/index.php/Home/Login/index">登录网站</a>
                        | 
                        <a href="/yyw/index.php/Home/Login/register">免费注册</a>
                    </div>
                <?php else: ?>
                    <div class="toplogin">
                        欢迎您：
                        <!-- 判断session信息里面性别值。输出对应的头像 -->
                        <?php if($_SESSION['user']['gender']== 1): ?><img src="/yyw/Public/images/f2fde8e7d8aa2a10.gif" />
                        <?php else: ?>
                            <img src="/yyw/Public/images/87197a0d51022068.gif" /><?php endif; ?>
                        <?php echo ($_SESSION['user']['username']); ?> ，
                        <a href="/yyw/index.php/Home/User/view/act/userInfo">会员中心         
                        </a> | <a href="#">在线充值</a> | 
                        <a href="/yyw/index.php/Home/Login/logout">退出登录</a>
                    </div><?php endif; ?>
                
            
            
        </div>
	  <div class="nav1ext"></div>
	  <div class="nav1wrap">
			<div class="nav nav1">
				<ul>
				<li><a href="/yyw/index.php/Home/Index/index">交友首页</a></li>
				<li><a href="/yyw/index.php/Home/User/view/act/userInfo">会员中心</a></li>
				<li><a href="/yyw/index.php/Home/HighSearch/index">高级搜索</a></li>
				<li><a href="/yyw/index.php/Home/UserList/index">会员列表</a></li>
				<li><a href="/yyw/index.php/Home/HighSearch/doSearch/type/localopsex">同城异性</a></li>
				<li><a href="/yyw/index.php/Home/DiaryShow/index">心情日记</a></li>
				<li><a id="demo" href="/yyw/index.php/Home/WeiBo/index">心情微播</a></li>
				</ul>
				<script>
				/*
					var notlogined = $("#notlogined");
					var data;
					$("#demo").click(function(){
						if(notlogined) {
							//alert('in');
							data = "val="+$(this).attr('href');
							alert(data);
							
							$.ajax({
								url:'/yyw/index.php/Home/Login/fuZhi',
								type:'post',
								dataType:'text',
								data:data,
								success:function(data){
									//alert(data);
								},
								error:function(){
								
								},
							});
							//return false;
						}
					})
					*/
				</script>
			</div>
			<div class="shadow shadow-l"></div>
			<div class="shadow shadow-r"></div>
	  </div>
	  <div class="btmwrap">
		<div class="divider"></div>
	  </div>
	</div>
<div id="page-index" class="page">


  <div class="indexbg">
    <div class="index"> 
           <div class="loginwrap" style="height:10000px">
		<!-- 搜索 -->
			<div class="search_top">
	<form method="post" action="/yyw/index.php/Home/UserList/index" id="search_normal" onsubmit="return searchSubmit()">
	<div class="search_in">
		
		<label id="search_scroll_bar_gender">我要找:</label>
		<select name="gender" id="gender">
			<option selected="selected" value="2">女会员</option>
			<option value="1">男会员</option>
		</select>
		
		<label id="search_scroll_bar_age">&nbsp;&nbsp;年龄:</label>
		<select name="min_age" id="min_age">
		<option value="">不限</option>
		<?php $__FOR_START_1960__=18;$__FOR_END_1960__=61;for($i=$__FOR_START_1960__;$i < $__FOR_END_1960__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
		</select>
		
		<span>~</span>
		
		<select name="max_age" id="max_age">
		<option value="">不限</option>
		<?php $__FOR_START_8897__=18;$__FOR_END_8897__=61;for($i=$__FOR_START_8897__;$i < $__FOR_END_8897__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
		</select>
		
		<label id="search_scroll_bar_workCity">&nbsp;&nbsp;地区:</label>
		<select name="province" id="province"  style="width:80px;">
			
		</select>&nbsp;
		<span id="json_s_dist2">
		</span>&nbsp;
		<span id="json_s_dist3">
		</span>&nbsp;&nbsp;

		<input type="checkbox" name="avatar" value="1" id="s_avatar" />
		<label for="s_p_img">有形象照</label>
		&nbsp;&nbsp;<a class="ser" href="">
		<button type="submit">搜 索</button></a>
		<a class="search_all" href="/yyw/index.php/Home/HighSearch/index" id="searchMore"><span class="">更多搜索</span></a> 
		&nbsp;&nbsp;
		<!--<b>497</b> 人在线-->
	</div>
	</form>

</div> 

	

            <div style="visibility: visible; width: 700px; height: 290px; overflow: hidden; position: relative;" class="ads">
				<div style="width: 700px; height: 290px; overflow: hidden; position: relative;" id="KSS_moveBox">
                    <div style="float: left;" id="KSS_XposBox">
                        <!-- 图片区域 -->
                        <ul style="float: left;position:absolute;" id="KSS_content">
                            <a href="#"><img src="/yyw/Public/images/441966a33680197b.jpg" alt="成功牵手 红娘带我迈向幸福" height="290" width="700"></a>
                            <a href="#"><img src="/yyw/Public/images/f88b0b8a7a9cd663.jpg" alt="爱要大声说出来" height="290" width="700"></a>
                            <a href="#"><img src="/yyw/Public/images/dd9269073dad452a.jpg" alt="诚信交友" height="290" width="700"></a>
                        </ul>
                        
                    </div>
                </div>
				
				
				<div style="height: 30px; width: 100%; position: absolute; bottom: 0px; left: 0px; background: none repeat scroll 0% 0% rgb(254, 145, 195); opacity: 0.5;" class="KSS_titleBar">
                </div>
                <div style="height: 30px; width: 100%; position: absolute; bottom: 0px; left: 0px;" class="KSS_titleBox">
                    <!-- 显示图片标题 -->
                    <h2 id="showH" class="title" style="margin: 3px 0px 0px 6px; padding: 0px; font-size: 14px; color: rgb(255, 255, 255); font-family: Verdana; font-weight: bold;">成功牵手 红娘带我迈向幸福</h2>
                </div>
                <div class="KSS_btnBox" style="position:absolute;right:10px;bottom:5px; z-index:100">
                    <ul id="btnlistID" style="margin:0;padding:0; overflow:hidden">
                        <li style="list-style: none outside none; float: left; width: 18px; height: 18px; border-width: 1px; border-color: rgb(255, 206, 255); border-style: solid; background: none repeat scroll 0% 0% rgb(216, 52, 115); text-align: center; cursor: pointer; margin-left: 3px; font-size: 12px; font-family: Verdana; line-height: 18px; opacity: 0.7; color: rgb(255, 255, 255);">1</li>
                        <li style="list-style: none outside none; float: left; width: 18px; height: 18px; border-width: 1px; border-color: rgb(204, 204, 204); border-style: solid; background: none repeat scroll 0% 0% rgb(255, 255, 255); text-align: center; cursor: pointer; margin-left: 3px; font-size: 12px; font-family: Verdana; line-height: 18px; opacity: 0.7; color: rgb(0, 0, 0);">2</li>
                        <li style="list-style: none outside none; float: left; width: 18px; height: 18px; border-width: 1px; border-color: rgb(204, 204, 204); border-style: solid; background: none repeat scroll 0% 0% rgb(255, 255, 255); text-align: center; cursor: pointer; margin-left: 3px; font-size: 12px; font-family: Verdana; line-height: 18px; opacity: 0.7; color: rgb(0, 0, 0);">3</li>
                    </ul>
                </div>
            </div>
            <script type="text/javascript">
                //调用图片轮播函数
                Nav();
            </script>

        <div class="huar">
		  
            <!-- 用户信息判断有没有登陆 -->
            <?php if(empty($_SESSION['user'])): ?><div class="llgo">
                <div class="onlinecount">
                    <p><span class="left"><em class="numwcomma"> 30秒  </em></span>免费注册婚恋网寻找真爱</p>
                </div>
                <form method="post" action="/yyw/index.php/Home/Login/login" name="login_form" id="nav_loginForm">
                    <input value="" name="forward" type="hidden">
                    <div class="fitem" style="position: relative;">
                        <label>帐　号：</label>
                        <input name="username" id="nav_loginName" value="用户名/邮箱" class="login_input1" type="text">
                    </div>

                    <p class="fitem">
                        <label>密　码：</label>
                        <input name="password" id="nav_passWord" class="login_input1" maxlength="16" type="password">
                    </p>

                    <p class="fitem-tips" style="margin-left:55px;">
                        <a class="rp" target="_blank" href="#">忘记密码？点击取回密码</a>
                    </p>
                    <p class="fitem-btn">
                        
                        <input type="submit" value="登录" class="button button-major button-login" />
                        <a class="button button-minor button-reg" href="/yyw/index.php/Home/Login/register">免费注册</a>
                    </p>
                </form>
                <!-- --------------------------------------------------- -->
                <script type="text/javascript">
                    verifyLogin('nav_loginForm', 'nav_loginName', 'nav_passWord');
                </script>
                <div class="hezuo_pt">
                    <p class="hezuo_wz">用合作网站账号登录</p>
                    <p class="hezuo_dl">
                        <a href="#"><img src="/yyw/Public/images/qq.gif" /> QQ登录</a>
                        <a href="#"><img src="/yyw/Public/images/sina.gif" /> 新浪微博登录</a>
                          
                    </p>
                </div>
            </div>
            
            <?php else: ?>
            <div class="llgo">
                <div class="login_gooo">
                        <div class="login_xxxxx">
							<?php if($_SESSION['user']['avatar']!= null): ?><a href="#" class="login_gohead" title="<?php echo ($userInfo['username']); ?>">
									<img src="/yyw/Public/Uploads/pic/<?php echo ($_SESSION['user']['avatar']); ?>" border="0" height="227" width="185">
								</a>
							<?php else: ?>
								<?php if($_SESSION['user']['gender']== 1): ?><a href="#" class="login_gohead" title="<?php echo ($userInfo['username']); ?>">
									<img src="/yyw/Public/images/male.gif" border="0" height="227" width="185">
								</a>
								<?php else: ?>
								<a href="#" class="login_gohead" title="<?php echo ($userInfo['username']); ?>">
									<img src="/yyw/Public/images/female.gif" border="0" height="227" width="185">
								</a><?php endif; endif; ?>
                            <div class="login_xinxi">
                                <div>
                                    <?php if($_SESSION['user']['gender']== 1): ?><img src="/yyw/Public/images/f2fde8e7d8aa2a10.gif" />
                                    <?php else: ?>
                                        <img src="/yyw/Public/images/87197a0d51022068.gif" /><?php endif; ?>
                                    <?php echo ($_SESSION['user']['username']); ?>
                                </div>
                                <div>积分：<?php echo ($userInfo['points']); ?></div>
                                <div>相册：0 张 <a href="#">上传</a></div>
                                <div><a href="#">退出登录</a>&nbsp;</div>
                            </div>
                            <div class="c"></div>
                        </div>
                        <div class="login_hudong">

                            <div><img src="/yyw/Public/images/y1.gif">信件：(<a href="/yyw/index.php/Home/Message/index/status/unread" class="no_read_message"></a>)</div>
                            <div><img src="/yyw/Public/images/y2.gif">人气：(<a href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($views["id"]); ?>"><?php echo ($views["views"]); ?></a>)</div>
                            <div><img src="/yyw/Public/images/y3.gif">日记：(<a href="/yyw/index.php/Home/Diary/index"><?php echo ($diarytotal); ?></a>)</div>
                            <div><img src="/yyw/Public/images/y4.gif">礼物：(<a href="/yyw/index.php/Home/Present/index"><?php echo ($present); ?></a>)</div>
                        </div>
						<script type="text/javascript">
							noReadMessage();
						</script>
                        <div class="login_goge"><a href="/yyw/index.php/Home/User/view/act/userInfo">进入个人中心</a></div>
                </div>
            </div><?php endif; ?>

		  
        </div>
      </div>
    </div>
  </div>
  <div class="bigline"></div>
  <div class="index1">
		<div class="left3">
		  
			<h2 class="hh3">
				<label>
					<a class="recom current" name="female" href="javascript:void(0);">推荐女会员</a>
				</label> 
				<label>
					<a class="recom" name="male" href="javascript:void(0);">推荐男会员</a>
				</label>
				<label>
					<a class="recom" name="new" href="javascript:void(0);">最新会员</a>
				</label>
				
				<a href="/yyw/index.php/Home/UserList/index" class="more3">查看更多&gt;&gt;</a> 
			</h2>

<script type="text/javascript">
	$('.hh3 a.recom').mouseover(function(){
		$('.hh3 a.recom').removeClass('current');
		$(this).addClass('current');
		var name = $(this).attr('name');
		$('.left3list').hide();
		$("div[name='"+name+"']").show();
	});
</script>
			<div class="left3list" name="female" style="display:block;" id="tab_label_0">
				<ul> 
					<?php if(is_array($female)): $i = 0; $__LIST__ = $female;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$female): $mod = ($i % 2 );++$i;?><li>
						<a href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($female["userid"]); ?>" target="_blank">
							<img src="/yyw/Public/Uploads/pic/<?php echo ($female["user"]["avatar"]); ?>" title="<?php echo ($female["user"]["username"]); ?>" height="110px" width="90px">
						</a>
						<div class="areaf"> 
							<span><?php echo ($female["cityid"]); ?></span> 
							<span><?php echo ($female["age"]); ?>岁</span> 
						</div>
						<div class="guangzh">
							<a href="javascript:void(0);" onclick="showBox('greet',<?php echo ($female["userid"]); ?>)">打招呼</a>
							<a href="javascript:void(0);" onclick="showBox('message',<?php echo ($female["userid"]); ?>)">写信件</a>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="left3list" name="male" style="display:none;" id="tab_label_0">
				<ul> 
					<?php if(is_array($male)): $i = 0; $__LIST__ = $male;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$male): $mod = ($i % 2 );++$i;?><li>
						<a href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($male["userid"]); ?>" target="_blank">
							<img src="/yyw/Public/Uploads/pic/<?php echo ($male["user"]["avatar"]); ?>" title="<?php echo ($male["user"]["username"]); ?>" height="110px" width="90px">
						</a>
						<div class="areaf"> 
							<span><?php echo ($male["cityid"]); ?></span> 
							<span><?php echo ($male["age"]); ?>岁</span> 
						</div>
						<div class="guangzh">
							<a href="javascript:void(0);" onclick="showBox('greet',<?php echo ($male["userid"]); ?>)">打招呼</a>
							<a href="javascript:void(0);" onclick="showBox('message',<?php echo ($male["userid"]); ?>)">写信件</a>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			<div class="left3list" name="new" style="display:none;" id="tab_label_0">
				<ul> 
					<?php if(is_array($newuser)): $i = 0; $__LIST__ = $newuser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$new): $mod = ($i % 2 );++$i;?><li>
						<a href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($new["id"]); ?>" target="_blank">
							<img src="/yyw/Public/Uploads/pic/<?php echo ($new["avatar"]); ?>" title="<?php echo ($new["uusername"]); ?>" height="110px" width="90px">
						</a>
						<div class="areaf"> 
							<span><?php echo ($new["params"]["cityid"]); ?></span> 
							<span><?php echo ($new["params"]["age"]); ?>岁</span> 
						</div>
						<div class="guangzh">
							<a href="javascript:void(0);" onclick="showBox('greet',<?php echo ($new["id"]); ?>)">打招呼</a>
							<a href="javascript:void(0);" onclick="showBox('message',<?php echo ($new["id"]); ?>)">写信件</a>
						</div>
					</li><?php endforeach; endif; else: echo "" ;endif; ?>
				</ul>
			</div>
			
		</div>
		
		</div>
		<div style="clear:both;"></div>
  </div>
  <div class="bigline"></div>

      <div class="inad1"><a><img src="/yyw/Public/images/0b90808b85fb02ef.jpg" title="" border="0" height="90" width="976"></a></div>
  <div class="bigline"></div>
  

	<div class="index6">
		<div class="left4">
			<h2 class="hh3">
			<em>内心独白</em>	  
			<label>
				<a id="vip_label_tag" href="javascript:void(0);" class="nnn">全部
				</a>
			</label> 
				<a class="more3" href="/yyw/index.php/Home/UserList/index/type/mon">查看更多&gt;&gt;</a> 
			</h2>
			
			<ul id="vip_label_0" style="display:block;">
			<?php if(is_array($monuser)): $i = 0; $__LIST__ = $monuser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$mon): $mod = ($i % 2 );++$i;?><li>
					<a class="head5" href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($mon["userid"]); ?>">
						<img src="/yyw/Public/Uploads/pic/<?php echo ($mon["user"]["avatar"]); ?>" title="<?php echo ($mon["user"]["username"]); ?>" alt="<?php echo ($mon["user"]["username"]); ?>" height="135px" width="112px">
					</a>
					<div class="headr5">
						<span class="headr5_2"><a href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($mon["userid"]); ?>"><?php echo ($mon["user"]["username"]); ?></a></span>
						<img src="/yyw/Public/images/<?php echo ($mon["icon"]); ?>" class="" border="0">
						<div class="headr5_1"> <?php echo ($mon["age"]); ?> 岁　<?php echo ($mon["provinceid"]); ?> <?php echo ($mon["provinceid"]); ?> <?php echo ($mon["education"]); ?><br>
						  <?php echo ($mon["mon"]); ?>
						  <a href="/yyw/index.php/Home/HomePage/index/id/<?php echo ($mon["userid"]); ?>" target="_blank">查看资料</a>
						</div>
						<div class="headr5_3"> 
							<span class="d3">
								<a href="javascript:void(0);"  onclick="showBox('greet',<?php echo ($mon["userid"]); ?>)">
									<span class="icon24 icon24-follow"></span>打招呼
								</a>
							</span> 
							<span class="d4">
								<a href="javascript:void(0);" onclick="showBox('message',<?php echo ($mon["userid"]); ?>)">
									<span class="icon24 icon24-follow"></span>写信件
								</a>
							</span>
						</div>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>
				
				<div style="clear:both"></div>
			</ul>


		


		</div>

		<div class="right4">
			<h2 class="righth4">
				<span>最热日记</span>
				<a href="/yyw/index.php/Home/DiaryShow/index" target="_blank">更多&gt;&gt;</a>
			</h2>
			<div class="qiulist">
				<?php if(is_array($hotdiary)): $i = 0; $__LIST__ = $hotdiary;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$hot): $mod = ($i % 2 );++$i;?><div class="r4list">
					<a href="/yyw/index.php/Home/DiaryShow/single/id/<?php echo ($hot["id"]); ?>" target="_blank" title="<?php echo ($hot["title"]); ?>"><?php echo ($hot["title"]); ?></a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
            <!-- 网站公告 -->
            
            <h2 class="righth4" style="background:#f0edeb;">
				<span>网站公告</span>
				<a href="/yyw/index.php/Home/Notice/lists" target="_self">更多&gt;&gt;</a>
			</h2>
			<div class="qiulist">
                <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="r4list">
					<a href="/yyw/index.php/Home/Notice/detail/id/<?php echo ($vo['id']); ?>" target="_self" title="<?php echo ($vo['title']); ?>"><?php echo ($vo['title']); ?></a>
				</div><?php endforeach; endif; else: echo "" ;endif; ?>
				
			</div>
            
			<div class="qiutu">
				<a><img src="/yyw/Public/images/22f234bcef1ae435.jpg" title="" border="0" height="120" width="233"></a>
			</div>
		  
			<div class="w230"><a><img src="/yyw/Public/images/cac9dc3e954d433e.jpg" title="" border="0" height="81" width="233"></a>
			</div>
		  
			<div class="index_info_box">	
				<a href="#" class="infot"><img src="/yyw/Public/images/ads3.jpg"></a>
				<h4><a href="#">VIP会员</a></h4>
				<p>服务期内，免费查看任何信件，方便！</p>
			</div>
            

			<div style="clear:both;"></div>
		</div>
		<div style="clear:both;"></div>
	</div>
	<div class="bigline"></div>
	<div class="shouyegg">
		<a href="<?php echo ($advertising["link"]); ?>" target="_blank"><img src="/yyw/Public/Uploads/pic/<?php echo ($advertising["uploadfiles"]); ?>" style="width:980;height:90" title="<?php echo ($advertising["title"]); ?>" alt="<?php echo ($advertising["title"]); ?>"></a>
	</div>
	<div class="bigline"></div>
	
</div>	
<div id="footer">
<div class="footer-wrap">
    	<div class="footer-center">
         <div class="footer-center-l">
           <div class="siteGuide">
            <dl class="def">
            <dt>常见问题</dt>
                <dd><a href="#" target="_blank" rel="nofollow">注册会员</a></dd>
    			<dd><a href="#" target="_blank" rel="nofollow">完善资料</a></dd>
    			<dd><a href="#" target="_blank" rel="nofollow">诚信认证</a></dd>
            </dl>
            <dl>
             <dt>交友须知</dt>
                <dd><a href="#" target="_blank">免责申明</a></dd>
				<dd><a href="#" target="_blank">注册条款</a></dd>
				<dd><a href="#" target="_blank">交友须知</a></dd>
            </dl>
            <dl>
             <dt>关于婚恋</dt>
                <dd><a href="#" target="_blank" rel="nofollow">网站介绍</a></dd>
				<dd><a href="#" target="_blank" rel="nofollow">文化使命</a></dd>
				<dd><a href="#" target="_blank" rel="nofollow">大事记录</a></dd>
            </dl>
            <dl>
             <dt>合作联系</dt>
             	<dd><a href="#" target="_blank" rel="nofollow">商务合作</a></dd>
				<dd><a href="#" target="_blank" rel="nofollow">加入我们</a></dd>
				<dd><a href="#" target="_blank" rel="nofollow">联系我们</a></dd>
            </dl>
            <dl>
             <dt>帮助中心</dt>
                <dd><a href="#" target="_blank" rel="nofollow">忘记密码</a></dd>
				<dd><a href="#" target="_blank" rel="nofollow">常见问题</a></dd>
				<dd><a href="#" target="_blank" rel="nofollow">在线客服</a></dd>
            </dl>
           </div>
         <div class="hotHotel">
            <h2>热门城市交友网</h2>
             <span><a href="#" target="_blank">北京交友网</a> </span>
             <span><a href="#" target="_blank">大连交友网</a> </span>
             <span><a href="#" target="_blank">沈阳交友网</a> </span>
             <span><a href="#" target="_blank">天津交友网</a> </span>
             <span><a href="#" target="_blank">哈尔滨交友网</a> </span>
             <span><a href="#" target="_blank">上海交友网</a> </span>
             <span><a href="#" target="_blank">南京交友网</a> </span>
             <span><a href="#" target="_blank">苏州交友网</a> </span>
             <span><a href="#" target="_blank">杭州交友网</a> </span>
             <span><a href="#" target="_blank">无锡交友网</a> </span>
             <span><a href="#" target="_blank">厦门交友网</a> </span>
             <span><a href="#" target="_blank">宁波交友网</a> </span>
             <span><a href="#" target="_blank">青岛交友网</a> </span>
             <span><a href="#" target="_blank">济南交友网</a> </span>
             <span><a href="#" target="_blank">合肥交友网</a> </span>
             <span><a href="#" target="_blank">福州交友网</a> </span>
             <span><a href="#" target="_blank">郑州交友网</a> </span>
             <span><a href="#" target="_blank">武汉交友网</a> </span>
             <span><a href="#" target="_blank">成都交友网</a> </span>
             <span><a href="#" target="_blank">重庆交友网</a> </span>
             <span><a href="#" target="_blank">西安交友网</a> </span>
             <span><a href="#" target="_blank">广州交友网</a> </span>
             <span><a href="#" target="_blank">深圳交友网</a> </span>
                  
           </div>
           <!-- 友情链接 -->
        <div class="cooperation">
            <ul class="tabaa">
                <li class="current" id="partner" tab="">合作伙伴</li>
                <li id="footlinks" tab="" class="">友情链接</li>            
            </ul>
            <div class="contents" style="display:block;">
                <a class="img"><img src="/yyw/Public/images/20120312142409.gif" style="display: block;"></a>
             	<a class="img"><img src="/yyw/Public/images/20140217160303.png" style="display: block;"></a>
             	<a class="img"><img src="/yyw/Public/images/20120312142014.jpg" style="display: block;"></a>
             	<a class="img"><img src="/yyw/Public/images/20131009170718.png" style="display: block;"></a>
             	<a class="img"><img src="/yyw/Public/images/20120312142338.gif" style="display: block;"></a>
             	<a class="img"><img src="/yyw/Public/images/20120419173721.png" style="display: block;"></a>
             	<a class="img"><img src="/yyw/Public/images/20140210180252.jpg" style="display: block;"></a>
            </div>
            <div class="contents" style="display:none;">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lin): $mod = ($i % 2 );++$i;?><a href="<?php echo ($lin["website"]); ?>" title="<?php echo ($lin["webinfo"]); ?>"><?php echo ($lin["webname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
         </div>
         <div class="footer-center-r" style="background:url('/yyw/Public/images/footer_icons.png') no-repeat left top;">
          <div class="service">
           <p class="say">永久免费交友网<br>2,000,000单身男女的选择</p>
          </div>
                    <div class="app">
           <div class="weixin"></div>
           <div class="mobileApp">
            <p>婚恋网手机版</p>
            <a href="#" class="iphoneApp"></a>
            <a href="#" class="androidApp"></a>
            <a href="#" class="weibo mt20"></a>
           </div>
          </div>
 <div class="dxl_share share_qk">
          <div data-bd-bind="1403340319209" class="bdsharebuttonbox bdshare-button-style0-16"><a href="#" class="bds_more" data-cmd="more">分享到：</a><a href="#" class="bds_qzone" data-cmd="qzone" title="分享到QQ空间"></a><a href="#" class="bds_tsina" data-cmd="tsina" title="分享到新浪微博"></a><a href="#" class="bds_tqq" data-cmd="tqq" title="分享到腾讯微博"></a><a href="#" class="bds_renren" data-cmd="renren" title="分享到人人网"></a><a href="#" class="bds_weixin" data-cmd="weixin" title="分享到微信"></a></div>

<div style="display:none">
        <a href="#" target="_blank"><img src="/yyw/Public/images/21.gif" border="0" height="20" width="20"></a>
<span id="cnzz_stat_icon_5809997"><a href="#" target="_blank" title="站长统计"><img src="/yyw/Public/images/pic1.gif" border="0" hspace="0" vspace="0"></a></span>
</div>
          </div>     
         </div>
        </div>
    </div>
	  </div>



<div id="BAIDU_DUP_wrapper_u1554198_0"></div>

<div style="position: absolute; top: -1970px; left: -1970px;" id="_my97DP"></div>

</body>
</html>