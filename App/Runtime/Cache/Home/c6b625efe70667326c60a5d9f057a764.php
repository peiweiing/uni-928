<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>婚恋网-免费交友大厅</title>

<link rel="stylesheet" href="/Public/css/public.css" media="screen">
<link rel="stylesheet" href="/Public/css/v3.css" media="screen">
<link rel="stylesheet" href="/Public/css/button.css">
<link rel="stylesheet" href="/Public/css/vipzy.css">
<link href="/Public/css/love.css" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="/Public/css/WdatePicker.css">
<link href="/Public/css/jdialog.css" rel="stylesheet" type="text/css">
<link href="/Public/css/share_style0_16.css" rel="stylesheet">
<script type="text/javascript">
	var __module__ = "/index.php/Home";
	var __public__ = "/Public";
</script>
<script type="text/javascript" src="/Public/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/Public/js/styleAndMove.js"></script>
<script type="text/javascript" src="/Public/js/checkReg.js"></script>
<script type="text/javascript" src="/Public/js/myAjax.js"></script>
<script type="text/javascript" src="/Public/js/verifyLogin.js"></script>
<script type="text/javascript" src="/Public/js/flink.js"></script>
<script type="text/javascript" src="/Public/js/messageBox.js"></script>
<script type="text/javascript" src="/Public/js/proMess.js"></script>
<script type="text/javascript" src="/Public/js/imgCarousel.js"></script>
<script type="text/javascript" src="/Public/js/diaryComment.js"></script>
<script type="text/javascript" src="/Public/js/search.js"></script>
<script type="text/javascript" src="/Public/js/noRead.js"></script>
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
                      <form method="post" action="/index.php/Home/Login/login" name="login_form" id="ceng_loginForm">
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
                                <input type="submit" value="" style="width:135px;height:45px;background:url(/Public/images/cengLogin.png) no-repeat; border:none;cursor:pointer;" />
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

            href="/index.php/Home/Login/register">立即注册</a><br>
                        
                        <span class="li_d" style="display:none;">·用合作网站账号登录</span>
                        
                                                <a href="#" target="_blank"><img 

            src="/Public/images/qq.gif">&nbsp;&nbsp;QQ登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <a href="#" target="_blank"><img src="/Public/images/sina.gif">&nbsp;&nbsp;新浪微博登录

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
<div id="loadleft" style="display:none;position:absolute;z-index:1500;"><img src="/Public/images/jdloading.gif"/><br/>加载中...</div>
<div id="loadright" style="display:none;position:absolute;z-index:1500;"><img src="/Public/images/jdloading.gif"/><br/>加载中...</div>

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
		  <div class="logowrap"><a href="/index.php/Home/Index/index"><img src="/Public/images/240b5963bb45432a.gif" alt="婚恋网" height="64" width="160"></a></div>
		</div>
		<div class="topad">
				<a href="/index.php/Home/Index/index" target="_self"><img src="/Public/images/8e9b18b723286a1f.jpg" title="" border="0" height="76" width="118"></a>
			</div>
		<div class="tipswrap"> 
		<span class="tips_wap">
		<a href="javascript:void(0);" class="waptips" title="">手机交友</a>
		</span><span class="tips_com"><a href="<?php echo U('User/vip');?>">会员服务</a></span> <span class="tips_save"><a href="javascript:void(0);">收藏本站</a></span> 
		</div>		
            <!-- 会员中心登录状态 -->
			<!-- 前台登录状态 -->
            
                <?php if(empty($_SESSION['user'])): ?><div class="toplogin">
                        游客欢迎您
                        <a href="/index.php/Home/Login/index">登录网站</a>
                        | 
                        <a href="/index.php/Home/Login/register">免费注册</a>
                    </div>
                <?php else: ?>
                    <div class="toplogin">
                        欢迎您：
                        <!-- 判断session信息里面性别值。输出对应的头像 -->
                        <?php if($_SESSION['user']['gender']== 1): ?><img src="/Public/images/f2fde8e7d8aa2a10.gif" />
                        <?php else: ?>
                            <img src="/Public/images/87197a0d51022068.gif" /><?php endif; ?>
                        <?php echo ($_SESSION['user']['username']); ?> ，
                        <a href="/index.php/Home/User/view/act/userInfo">会员中心         
                        </a> |
                        <a href="/index.php/Home/Login/logout">退出登录</a>
                    </div><?php endif; ?>
                
            
            
        </div>
	  <div class="nav1ext"></div>
	  <div class="nav1wrap">
			<div class="nav nav1">
				<ul>
				<li><a href="/index.php/Home/Index/index">交友首页</a></li>
				<li><a href="/index.php/Home/User/view/act/userInfo">会员中心</a></li>
				<li><a href="/index.php/Home/HighSearch/index">高级搜索</a></li>
				<li><a href="/index.php/Home/UserList/index">会员列表</a></li>
				<li><a href="/index.php/Home/HighSearch/doSearch/type/localopsex">同城异性</a></li>
				<li><a href="/index.php/Home/DiaryShow/index">心情日记</a></li>
				<li><a id="demo" href="/index.php/Home/WeiBo/index">心情微播</a></li>
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
								url:'/index.php/Home/Login/fuZhi',
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

<link rel="stylesheet" href="/Public/css/page.css">
<style>
	.menu-item{padding-left:20px;padding-top:5px;display:block;float:left;width:74px;height:25px; margin-right: 10px;margin-top:10px;
	cursor: pointer;line-height:15px;border:1px solid #E1E1E1; background-color:#ffffff;clear:bath;}
	.mod-gift{display:block;float:left;cursor: pointer;margin-left:28px;margin-top:5px;background-color:#ffffff;}
	#layout { position:absolute;height:510px;width:730px;display:none; background:#fff;}
	.alpha { filter: alpha(Opacity=50, FinishOpacity=50, Style=0, StartX=0, StartY=0, FinishX=100, FinishY=100｝
</style>
<div id="page-index" class="page">
  <div class="ce member">
	<div class="search_top">
	<form method="post" action="/index.php/Home/UserList/index" id="search_normal" onsubmit="return searchSubmit()">
	<div class="search_in">
		
		<label id="search_scroll_bar_gender">我要找:</label>
		<select name="gender" id="gender">
			<option selected="selected" value="2">女会员</option>
			<option value="1">男会员</option>
		</select>
		
		<label id="search_scroll_bar_age">&nbsp;&nbsp;年龄:</label>
		<select name="min_age" id="min_age">
		<option value="">不限</option>
		<?php $__FOR_START_26879__=18;$__FOR_END_26879__=61;for($i=$__FOR_START_26879__;$i < $__FOR_END_26879__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
		</select>
		
		<span>~</span>
		
		<select name="max_age" id="max_age">
		<option value="">不限</option>
		<?php $__FOR_START_6212__=18;$__FOR_END_6212__=61;for($i=$__FOR_START_6212__;$i < $__FOR_END_6212__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
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
		<a class="search_all" href="/index.php/Home/HighSearch/index" id="searchMore"><span class="">更多搜索</span></a> 
		&nbsp;&nbsp;
		<!--<b>497</b> 人在线-->
	</div>
	</form>

</div> 

			
    <div class="left">
      <div class="paper-article">
        <div class="articlesec basicsec">
          <div class="pcontent">
            <div class="prwrap">
				<div class="portrait portrait-195">
				<?php if($usertable["avatar"] != null): ?><img src="/Public/Uploads/pic/<?php echo ($usertable["avatar"]); ?>" border="0" height="227" width="185">
				<?php elseif($userinfo["gender"] == 1): ?>	
					<img src="/Public/Uploads/pic/male.gif" border="0" height="227" width="185">
				<?php else: ?>
					<img src="/Public/Uploads/pic/female.gif" border="0" height="227" width="185"><?php endif; ?>
				</div>
					
				<div class="opwrap">
				</div>
            </div>

        <div class="infowrap">
        <div class="nickwrap">
		<p class="nick"><?php if($userinfo["gender"] == 1): ?><img src=" /Public/images/f2fde8e7d8aa2a10.gif" class="" border="0"><?php else: ?><img src=" /Public/images/87197a0d51022068.gif" class="" border="0"><?php endif; ?>  <?php echo ($usertable["username"]); ?>  </p>  <p class="next"> 
		<?php if(is_array($genders)): $i = 0; $__LIST__ = $genders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$xing): $mod = ($i % 2 );++$i;?><a href="/index.php/Home/HomePage/index/id/<?php echo ($xing["userid"]); ?>"><?php endforeach; endif; else: echo "" ;endif; ?>
		下一个您可能感兴趣的人»</a></p>
		</div>
        <div class="imgarrwrap introwrap">
		<div class="imgarr imgarr-n-u"></div>
		<p class="intro">内心独白：<?php echo ((isset($monologue) && ($monologue !== ""))?($monologue):"这个家伙很懒，什么都没写！"); ?></p>
		</div>
            <div class="biwrap">
                <ul class="infolist">
					<li>性　　别：<span class="certiconph"><?php if($userinfo["gender"] == 1): ?>男<?php elseif($userinfo["gender"] == 2): ?>女<?php else: ?>未填写<?php endif; ?></span></li>
					<li>婚姻状态：<?php echo ((isset($marrystatus) && ($marrystatus !== ""))?($marrystatus):"未填写"); ?><span class="certiconph"></span></li>
					<li>年　　龄：<?php echo ((isset($userinfo["age"]) && ($userinfo["age"] !== ""))?($userinfo["age"]):"0"); ?> 岁<span class="certiconph"></span></li>
					<li>学　　历：<?php echo ((isset($education) && ($education !== ""))?($education):"未填写"); ?><span class="certiconph"></span></li>
					<li>身　　高：<?php echo ((isset($userinfo["height"]) && ($userinfo["height"] !== ""))?($userinfo["height"]):"0"); ?>CM</li>
					<li>月薪收入：<?php echo ((isset($salary) && ($salary !== ""))?($salary):"未填写"); ?></li>                
					<li>星　　座：
					<?php if($birthday == 0): ?>未填写
					<?php else: ?>
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
					<?php $_RANGE_VAR_=explode(',',"12.22,1.19");if($birthday>= $_RANGE_VAR_[0] && $birthday<= $_RANGE_VAR_[1]):?>摩羯座<?php endif; endif; ?>
					</li>
					<li>生　　肖：<?php echo ((isset($shuxing) && ($shuxing !== ""))?($shuxing):"未填写"); ?></li>
					<li>所在地区：<?php echo ((isset($userinfo["hukou"]) && ($userinfo["hukou"] !== ""))?($userinfo["hukou"]):"未填写"); ?> <?php echo ($userinfo["huji"]); ?></li>
					<li>籍　　贯：<?php echo ($sheng); ?>省 <?php echo ($shi); ?></li>
					<div style="clear:both;"></div>
                </ul>
            </div>
			<div style="clear:both;"></div>
            <div class="mbtnwrap">
                <div class="center_buttons"> 
					<a href="javascript:void(0);" onclick="showBox('greet',<?php echo ($id); ?>)" > <img src=" /Public/images/a2.gif"></a> 
					<a href="javascript:void(0);" onclick="showBox('message',<?php echo ($id); ?>)"> <img src=" /Public/images/a1.gif"></a> 
					<a href="javascript:void(0);" > <img onclick="toClick(<?php echo ($id); ?>)" class="dianji" src=" /Public/images/a4.gif"></a> 
					<a href="javascript:void(0);" > <img src="/Public/images/a5.gif" onclick='return doClick();'></a> 
                </div>
            </div>
        </div>
		</div>
		</div>

		<script type="text/javascript">
			//关注操作
			function doClick(){
				$.ajax({
					url:'/index.php/Home/Attention/insert',
					type:'post',
					dataType:'json',
					data:{ id:<?php echo ($id); ?> },
					success:function(info){
						if(info['error'] == true){
							alert(info['data']);
						}else{
							alert(info['data']);
						}
					}
				});
				return false;
			}
				
			var logid = <?php echo $lookid ;?>;
			var toid = <?php echo $toid ;?>;

			$(function(){
				$(".dianji").click(function(){
					//判断是不是登陆者自己送自己礼物
					if(logid == toid){
						alert("对不起！不能给自己送礼物！");
						return;
					}else{
						//将隐藏编辑层显示
						$("#heiceng").css("display","block");
						$("#layout").css("display","block");	
					}			
				});	
				$("#doClose").click(function(){
					$("#heiceng").css("display","none");
					$("#layout").css("display","none");
				});
			});
			//关闭礼物框
			var heiceng = document.getElementById("heiceng");
			var layout = document.getElementById("layout");
			function doClose(){
				heiceng.style.display = "none";
				layout.style.display = "none";
			}

		</script>
				
		<!-- 联系方式 -->
		<div class="articlesec detailsec">		
		<div class="titlebar">
			<h1 class="title">联系方式</h1>
		</div>
		<div class="pcontent">
		<!-- 登录会员 -->
		<?php if(($id == $logid) OR ($con["jurisdiction"] == 1)): ?><ul class="infolist">
				<table class="tb-home" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tbody>
						<tr>
							<td width="8%">邮箱：</td>
							<td width="42%"><?php echo ((isset($usertable["email"]) && ($usertable["email"] !== ""))?($usertable["email"]):"未填写"); ?></td>
							<td width="8%">手机：</td>
							<td width="42%"><?php echo ((isset($con["phone"]) && ($con["phone"] !== ""))?($con["phone"]):"未填写"); ?></td>
						</tr>
						<tr>
							<td>Q Q：</td>
							<td><?php echo ((isset($con["qq"]) && ($con["qq"] !== ""))?($con["qq"]):"未填写"); ?></td>
							<td>微信：</td>
							<td><font><?php echo ((isset($con["wechat"]) && ($con["wechat"] !== ""))?($con["wechat"]):"未填写"); ?></font></td>
						</tr>
						<tr>
							<td>微博：</td>
							<td colspan="3"><font><?php echo ((isset($con["blog"]) && ($con["blog"] !== ""))?($con["blog"]):"未填写"); ?></font></td>
						</tr>
					</tbody>
				</table>
				<div style="clear:both;"></div>
			</ul>
			<?php else: ?>		
			<ul class="infolist">
				<table cellpadding="10" cellspacing="10" border="0" width="98%">
					<tbody>
						<tr>
							<td align="center">对不起，您没有权限查看联系方式，
							<a href="#" class="btn_c2"><span>升级VIP可见</span></a>						
							&nbsp;&nbsp;
							<!-- 支付费用查看 -->
							</td>
						</tr>
					</tbody>
				</table>
				<div style="clear:both;"></div>
			</ul><?php endif; ?>		
		</div>
		</div>
	<!-- 相册 -->	
		<div class="articlesec detailsec">
          <div class="titlebar">
            <h1 class="title">相册（<span id="shu"></span>张）</h1>
          </div>
		  <div class="pcontent">
			  <div class="album_Pic">
				<div class="JQ-slide">
				 <!-- <div class="JQ-slide-nav"><a class="prev" href="">‹</a><a class="next" href="#">›</a></div>-->
				  <div id="imgdiv" class="wrap">
					<ul class="JQ-slide-content imgList">
						<?php if($photos == null): ?><b>相册中没有图片！</b>
						<?php else: ?>
							<?php if(is_array($photos)): $i = 0; $__LIST__ = $photos;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$p): $mod = ($i % 2 );++$i;?><li> <a rel="example_group" href="/Public/Uploads/pic/<?php echo ($p["uploadimage"]); ?>" class="img" target="_blank"><img src="/Public/Uploads/pic/z_<?php echo ($p["uploadimage"]); ?>" alt="<?php echo ($p["info"]); ?>" title="<?php echo ($p["info"]); ?>"></a> <a href="" class="txt"><?php echo ($p["info"]); ?></a> </li><?php endforeach; endif; else: echo "" ;endif; endif; ?>
					</ul>
				  </div>
				</div>
			  </div> 
		  </div>
		</div>	
		<script type="text/javascript">
		//图片的数量
			var imgnum = <?php echo $image;?>;
			var shu = document.getElementById("shu"); 
				shu.innerHTML=imgnum.length;
		//相册图片的轮放	
		window.onload=function ()
		{
			var oDiv=document.getElementById('imgdiv');
			var oUl=oDiv.getElementsByTagName('ul')[0];
			var aLi=oUl.getElementsByTagName('li');
			var aA=document.getElementsByTagName('a');
			var timer=null;
			var iSpeed=10;
			
			oUl.innerHTML+=oUl.innerHTML;
			oUl.style.width=aLi.length*aLi[0].offsetWidth+'px';
			
			function fnMove()
			{
				if(oUl.offsetLeft<-oUl.offsetWidth/2)
				{
					oUl.style.left=0;
				}
				else if(oUl.offsetLeft>0)
				{
					oUl.style.left=-oUl.offsetWidth/2+'px';
				}
				oUl.style.left=oUl.offsetLeft+iSpeed+'px';
			}
			
			timer=setInterval(fnMove, 150);
			
			aA[0].onclick=function ()
			{
				iSpeed=-10;
			};
			aA[1].onclick=function ()
			{
				iSpeed=10;
			};
			
			oDiv.onmouseover=function ()
			{
				clearInterval(timer);
			};
			
			oDiv.onmouseout=function ()
			{
				timer=setInterval(fnMove, 150);
			};
		};
</script>		
	<!--详细资料-->
        <div class="articlesec detailsec">
        <div class="titlebar">
            <h1 class="title">详细资料</h1>
        </div>
        <div class="pcontent">
            <ul class="infolist">
				<table class="tb-home" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tbody>
						<tr>
							<td width="15%">年　　龄：</td>
							<td width="35%"><?php echo ((isset($userinfo["age"]) && ($userinfo["age"] !== ""))?($userinfo["age"]):"未透露"); ?> 岁</td>
							<td width="15%">生　　肖：</td>
							<td width="35%"><?php echo ((isset($shuxing) && ($shuxing !== ""))?($shuxing):"未透露"); ?></td>
						</tr>
						<tr>
							<td>交友类型：</td>
							<td><?php echo ((isset($lovesort) && ($lovesort !== ""))?($lovesort):"未透露"); ?></td>
							<td>血　　型：</td>
							<td><?php echo ((isset($bloodtype) && ($bloodtype !== ""))?($bloodtype):"未透露"); ?> </td>
						</tr>
						<tr>
							<td>民　　族：</td>
							<td>汉族</td>
							<td>有无子女：</td>
							<td><?php echo ((isset($child) && ($child !== ""))?($child):"未透露"); ?></td>
						</tr>
						<tr>
							<td>购车情况：</td>
							<td><?php if($car == 1): ?>暂未购车<?php else: ?>已经购车<?php endif; ?> </td>
							<td>住房情况：</td>
							<td><?php echo ((isset($house) && ($house !== ""))?($house):"未透露"); ?></td>
						</tr>
						<tr>
							<td>是否吸烟：</td>
							<td><font><?php echo ((isset($smoking) && ($smoking !== ""))?($smoking):"未透露"); ?></font></td>
							<td>是否喝酒：</td>
							<td><font><?php echo ((isset($drinking) && ($drinking !== ""))?($drinking):"未透露"); ?></font></td>
						</tr>  
					</tbody>
				</table>
				<div style="clear:both;"></div>
            </ul>
		</div>
        </div>
        <div class="articlesec detailsec">
        <div class="titlebar">
            <h1 class="title">择友要求</h1>
        </div>
        <div class="pcontent">
            <ul class="infolist">
				<table class="tb-home" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tbody>
						<tr>
							<td width="15%">性　　别：</td>
							<td width="35%"><?php if($sex == 0): ?>不限<?php elseif($sex == 1): ?>男<?php else: ?>女<?php endif; ?> </td>
							<td width="15%">照片要求：</td>
							<td width="35%"><font><?php if($ishead == 1): ?>有形象照<?php else: ?>不限<?php endif; ?></font></td>
						</tr>
						<tr>
							<td>年龄范围：</td>
							<td><?php echo ((isset($age[0]) && ($age[0] !== ""))?($age[0]):"不限"); if($age[1] != null): ?>~<?php echo ($age[1]); ?>岁<?php endif; ?></td>
							<td>身高范围：</td>
							<td><font><?php echo ((isset($weight[0]) && ($weight[0] !== ""))?($weight[0]):"不限"); if($weight[1] != null): ?>~<?php echo ($weight[1]); ?> CM<?php endif; ?></font></td>
						</tr>
						<tr>
							<td>交友类型：</td>
							<td><?php echo ((isset($type1) && ($type1 !== ""))?($type1):"不限"); ?> <?php echo ($type2); ?></td>
							<td>婚史状况：</td>
							<td><?php echo ((isset($hismarriage1) && ($hismarriage1 !== ""))?($hismarriage1):"不限"); ?> <?php echo ($hismarriage2); ?></td>
						</tr>
						<tr>
							<td>学历要求：</td>
							<td><font><?php echo ((isset($education1) && ($education1 !== ""))?($education1):"不限"); if($education2 != null): ?>~<?php echo ($education2); endif; ?></font></td>
							<td>所在地区：</td>
							<td colspan="3">
								<?php echo ((isset($shengs["name"]) && ($shengs["name"] !== ""))?($shengs["name"]):"不限"); ?> <?php echo ($shis["name"]); ?><br>
							</td>
						</tr>
					</tbody>
				</table>
				<div style="clear:both;"></div>
            </ul>
		</div>
        </div>
        <div class="articlesec detailsec">
			<div class="titlebar">
            <h1 class="title">生活描述</h1>
			</div>
			<div class="pcontent">
            <ul class="infolist">
				<table class="tb-home" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tbody>
						<tr>
							<td width="15%">家中排行：</td>
							<td width="35%"><font><?php if($tophome == null): ?>未透露<?php else: echo ($tophome); endif; ?></font></td>
							<td width="15%">最大消费：</td>
							<td width="35%"><font><?php if($consume == null): ?>未透露<?php else: echo ($consume); endif; ?></font></td>
						</tr>
						<tr>
							<td>宗教信仰：</td>
							<td><font><?php if($faith == null): ?>未透露<?php else: echo ($faith); endif; ?></font></td>
							<td>锻炼习惯：</td>
							<td><font><?php if($workout == null): ?>未透露<?php else: echo ($workout); endif; ?></font></td>
						</tr>
						<tr>
							<td>作息习惯：</td>
							<td><font><?php if($rest == null): ?>未透露<?php else: echo ($rest); endif; ?></font></td>
							<td>是否要孩子 </td>
							<td><font><?php if($havechildren == null): ?>未透露<?php else: echo ($havechildren); endif; ?></font></td>
						</tr>
						<tr>
							<td colspan="2">愿意与对方父母同住： <font><?php if($talive == null): ?>未透露<?php else: echo ($talive); endif; ?></font></td>
							<td colspan="2">喜欢制造浪漫： <font><?php if($romantic == null): ?>未透露<?php else: echo ($romantic); endif; ?></font></td>
						</tr>
						<tr>
							<td colspan="4">擅长生活技能： 
								<font>
								<?php if($lifeskill[0] != null): echo ($lifeskill[0]); ?>
								<?php elseif($lifeskill[1] != null): echo ($lifeskill[1]); ?>
								<?php elseif($lifeskill[2] != null): echo ($lifeskill[2]); ?>
								<?php elseif($lifeskill[3] != null): echo ($lifeskill[3]); ?>
								<?php elseif($lifeskill[4] != null): echo ($lifeskill[4]); else: ?>未透露<?php endif; ?>
								</font>
							</td>
						</tr>
					</tbody>
				</table>
				<div style="clear:both;"></div>
            </ul>
			</div>
        </div>
        <div class="articlesec detailsec">
        <div class="titlebar">
            <h1 class="title">兴趣爱好</h1>
        </div>
			<div class="pcontent">
				<ul class="infolist">
					<table class="tb-home" cellpadding="0" cellspacing="0" border="0" width="100%">
					<tbody>
						<tr>
							<td width="20%">喜欢的运动：</td>
							<td width="80%"><font>		
							<?php if($sport == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($sport)): $i = 0; $__LIST__ = $sport;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; echo ($vo); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</font></td>
						</tr>
						<tr>
							<td>喜欢的食物：</td>
							<td><font>
							<?php if($food == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($food)): $i = 0; $__LIST__ = $food;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fo): $mod = ($i % 2 );++$i; echo ($fo); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>						
							</font></td>
						</tr>
						<tr>
							<td>喜欢的书籍：</td>
							<td><font>
							<?php if($book == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($book)): $i = 0; $__LIST__ = $book;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$bo): $mod = ($i % 2 );++$i; echo ($bo); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>							
							</font></td>
						</tr>
						<tr>
							<td>喜欢的电影：</td>
							<td><font>
							<?php if($film == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($film)): $i = 0; $__LIST__ = $film;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$fi): $mod = ($i % 2 );++$i; echo ($fi); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</font></td>
						</tr>
						<tr>
							<td>业 余 爱 好：</td>
							<td><font>
							<?php if($interest == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($interest)): $i = 0; $__LIST__ = $interest;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$int): $mod = ($i % 2 );++$i; echo ($int); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>
							</font></td>
						</tr>
						<tr>
							<td>喜欢的旅游去处：</td>
							<td><font>
							<?php if($travel == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($travel)): $i = 0; $__LIST__ = $travel;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$tra): $mod = ($i % 2 );++$i; echo ($tra); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>						
							</font></td>
						</tr>
						<tr>
							<td>关注的节目：</td>
							<td><font>
							<?php if($attention == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($attention)): $i = 0; $__LIST__ = $attention;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$at): $mod = ($i % 2 );++$i; echo ($at); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>						
							</font></td>
						</tr>
						<tr>
							<td>娱 乐 休 闲：</td>
							<td><font>
							<?php if($leisure == null): ?>未透露
							<?php else: ?>
								<?php if(is_array($leisure)): $i = 0; $__LIST__ = $leisure;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$le): $mod = ($i % 2 );++$i; echo ($le); ?>&nbsp;<?php endforeach; endif; else: echo "" ;endif; endif; ?>							
							</font></td>
						</tr>
					</tbody>
					</table>
					<div style="clear:both;"></div>
				</ul>
			</div>
        </div>
		<div class="mbtnwrap">
			<div class="center_buttons"> 
				<a href="javascript:void(0);" onclick="showBox('greet',<?php echo ($id); ?>)" > <img src=" /Public/images/a2.gif"></a> 
				<a href="javascript:void(0);" onclick="showBox('message',<?php echo ($id); ?>)" > <img src=" /Public/images/a1.gif"></a> 
				<a href="javascript:void(0);" > <img onclick="toClick(<?php echo ($id); ?>)" class="dianji" src=" /Public/images/a4.gif"></a>
				<a href="javascript:void(0);"> <img src=" /Public/images/a5.gif" onclick='return doClick();'></a> 
			</div>
		</div>
	  </div>	  
    </div>	
    <div class="right yue1">
		<h2>会员状态</h2>
		<ul class="center">
			<li>诚信星级：<?php if($userinfo["gender"] == 1): ?><img src=" /Public/images/f2fde8e7d8aa2a10.gif" class="" border="0"><?php else: ?><img src=" /Public/images/87197a0d51022068.gif" class="" border="0"><?php endif; ?>7星</li>
			<li>访问人气：<font id="json_hits"><?php echo ($views); ?></font></li>
			<li>个人相册：<?php echo ($photonum); ?> 张</li>
			<li>心情日记：<?php echo ($dia); ?> 篇</li>
			<li>收到礼物：<?php echo ($gif); ?> 个</li>
			<li>微博动态：<?php echo ($wb); ?> 个</li>
			<li>关　　注：<?php echo ($att); ?> 个</li>
			<li>粉　　丝：<?php echo ($see); ?> 个</li>
			<li>注册时间：
				<a href="###">VIP可见&gt;&gt;</a>
			</li>
			<li>最后登录：
				<a href="###">VIP可见&gt;&gt;</a>
			</li>
			<div style="clear:both;"></div>
		</ul>
		<div class="ju">  
			<span id="tips_listen"><a id="a_listen" href="###" onclick='return doClick();'>加入关注</a></span>   
		</div>
		<div class="bao"> 
		若此会员有交友动机不纯、故意中伤、侮辱、提供虚假资料、散步广告等恶劣行为。
		<a href="###">请向网站举报</a> </div>	    	  
		<h2><img src="/Public/images/crown.png"> 推荐会员</h2>
		<?php if(is_array($recuser)): $i = 0; $__LIST__ = $recuser;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$user): $mod = ($i % 2 );++$i;?><div class="img_list"> <a href="/index.php/Home/HomePage/index/id/<?php echo ($user["userid"]); ?>" title="<?php echo ($user["user"]["username"]); ?>" target="_blank">
			<img src=" /Public/Uploads/pic/<?php echo ($user["user"]["avatar"]); ?>" class="h3h" height="96" width="80"></a><br>
			<img src="/Public/images/<?php echo ($user["icon"]); ?>" class="" border="0"><?php echo ($user["user"]["username"]); ?></div><?php endforeach; endif; else: echo "" ;endif; ?>
	    <div class="ycgg_home"></div>
	</div>
			
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>
	
<!-- 礼物部分开始 -->	
<div id="heiceng" style="display:none;background:black; filter: alpha(opacity=70); opacity:0.70; position:absolute;top:0px;left:0px; width:100%; height:2000px;"></div>
<div id="layout" style="display:absolute;margin-left:310px;margin-top:-1570px;">
	<div class="give-topic" id="bian">
		<div style="background-color:#dd127b;width:730px;height:34px;"><div style="float:left;margin:8px;color:white">赠送礼物</div><div style="float:right;margin:8px;"><a href="###" id="doClose" style="color:white;">X</a></div></div>
		<div class="nav-tips" style="background-color:#fefce7;width:700px;height:35px;margin:0 auto;">
			<div style="padding:8px;margin:8px">
			送给用户：<?php if($userinfo["gender"] == 1): ?><img src="/Public/images/f2fde8e7d8aa2a10.gif"  border="0"><?php else: ?><img src="/Public/images/87197a0d51022068.gif"  border="0"><?php endif; ?> <a href="#" target="_blank"><?php echo ($usertable["username"]); ?></a>&nbsp;(<?php if($userinfo["gender"] == 1): ?>男<?php else: ?>女<?php endif; ?>&nbsp;&nbsp;<?php echo ($userinfo["age"]); ?>岁&nbsp;&nbsp;
			<?php echo ($sheng); ?>省 <?php echo ($shi); ?>
			&nbsp;<?php echo ($education); ?>)
			</div>
		</div>
		<!--TAB BEGIN-->
		<div class='menu-list' style='margin-left:38px'></div>
		<!--TAB END-->
		<div class="clear"></div>
		<div class="gift-list" style="margin:15px 28px 20px 20px">
			<ul id="ulid">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class='mod-gift'>
					<a href='###' ><img class="mouseover" onclick='doSend(<?php echo ($vo["giftid"]); ?>)' src='/Public/presentimg/<?php echo ($vo["imgurl"]); ?>' height='75' width='75'>
					<span id='select-127'></span>
					</a>
					<span id='msg-127' style='display:none;'><?php echo ($vo["intro"]); ?></span>
					<div class='gift-text'>
					&nbsp;&nbsp;<?php echo ($vo["giftname"]); ?><br>
					积分：<?php echo ($vo["points"]); ?>
					</div>
				</li><?php endforeach; endif; else: echo "" ;endif; ?>	
			</ul>
		<div class="clear"></div>
		</div>

		<div class="badoo"></div>
		<div class="clear"></div> 
		<iframe name="myform" frameborder="0" style="display:none;"></iframe>		
		<div class="gift-ft">
			<form action='/index.php/Home/HomePage/doSend/id/<?php echo ($usertable["id"]); ?>' target="myform" method='post' id='myform' style='margin-top:18px'>
				<div class="panel" style="margin-left:20px">
					<label for="gift-words">赠言：</label>
					<input class="gift-words" id="words" name="word" disabled="disabled" size="85" style="height:20px" value="" type="text">
				</div>
				<div class="m-gift-send" style="margin-top:15px;float:right;margin-right:25px;">
					<div class="form_send_box">
						<i id="calendarGift" class="img i-calendar">
						选择的礼物：<span class="visual-none" id="tips-giftname"></span>&nbsp;&nbsp;&nbsp;
						积分：<span class="visual-none" id="tips-points"></span> &nbsp;&nbsp;&nbsp;
						</i> 
						<input value="确定赠送" style="cursor:pointer;background-color:#f42460;color:white;padding: 5px 10px;margin: 0px;border-radius: 3px;min-width: 65px;border:0px" type="submit">
					</div>
				</div>
			</form>
		</div>		
	</div>	
</div>
</div>
<script type="text/javascript">
	//获取礼物信息
	function doSend(id){
		$.ajax({
			url: '/index.php/Home/HomePage/loadpresent',
			type: 'post',
			data: {id:id},
			dataType: 'json',
			success:function(info){
				$("#words").val(info['intro']);
				$("#tips-giftname").html(info['giftname']);
				$("#tips-points").html(info['points']);
				$("<input name='id' value='"+info['giftid']+"' type='hidden'/>").appendTo("#myform");
			},
		});
	}
	//返回发送礼物信息
	function doreturn(info){
		if(info=="false"){
			alert("发送失败！");
			return;
		}else if(info=="notok"){
			alert("对不起！您的积分不足！");
			return;
		}
		alert("发送成功!");
	}
	
</script>
<!-- 礼物部分结束 -->  
</div>	
<script type="text/javascript">
	//屏幕分辨率大小变动调节div位置
	reSizeDiv();
	function reSizeDiv(){
		var s = document.body.offsetWidth;  //(带浏览器边框的宽度)

		if(isFirefox=navigator.userAgent.indexOf("Firefox")>0)
			s=window.innerWidth;
			var a = 1024;  //要变换的临界点
		if(s > a){
			$("#layout").animate({ 
				marginLeft: "300px",
				marginTop: "-1820px",
			}, 1000 );
		}else{
			$("#layout").animate({ 
				marginLeft: "125px",
				marginTop: "-1820px",
			}, 1000 );
		}
	}
			
</script>

</div>	
<div id="footer">
<div class="footer-wrap">
    	<div class="footer-center">
         <div class="footer-center-l">
           <div class="siteGuide">
            <dl class="def">
            <dt>常见问题</dt>
              <?php if(is_array($cjwt)): $i = 0; $__LIST__ = $cjwt;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Article/show',array('id'=>$vo['id']));?>" target="_blank" rel="nofollow"><?php echo ($vo["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
    			
            </dl>
            <dl>
             <dt>交友须知</dt>
               <?php if(is_array($jyxz)): $i = 0; $__LIST__ = $jyxz;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Article/show',array('id'=>$vo['id']));?>" target="_blank" rel="nofollow"><?php echo ($vo["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <dl>
             <dt>关于婚恋</dt>
                <?php if(is_array($gyhl)): $i = 0; $__LIST__ = $gyhl;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Article/show',array('id'=>$vo['id']));?>" target="_blank" rel="nofollow"><?php echo ($vo["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <dl>
             <dt>合作联系</dt>
             	<?php if(is_array($hzlx)): $i = 0; $__LIST__ = $hzlx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Article/show',array('id'=>$vo['id']));?>" target="_blank" rel="nofollow"><?php echo ($vo["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
            </dl>
            <dl>
             <dt>帮助中心</dt>
                <?php if(is_array($bzzx)): $i = 0; $__LIST__ = $bzzx;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><dd><a href="<?php echo U('Article/show',array('id'=>$vo['id']));?>" target="_blank" rel="nofollow"><?php echo ($vo["title"]); ?></a></dd><?php endforeach; endif; else: echo "" ;endif; ?>
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
                <a class="img"><img src="/Public/images/20120312142409.gif" style="display: block;"></a>
             	<a class="img"><img src="/Public/images/20140217160303.png" style="display: block;"></a>
             	<a class="img"><img src="/Public/images/20120312142014.jpg" style="display: block;"></a>
             	<a class="img"><img src="/Public/images/20131009170718.png" style="display: block;"></a>
             	<a class="img"><img src="/Public/images/20120312142338.gif" style="display: block;"></a>
             	<a class="img"><img src="/Public/images/20120419173721.png" style="display: block;"></a>
             	<a class="img"><img src="/Public/images/20140210180252.jpg" style="display: block;"></a>
            </div>
            <div class="contents" style="display:none;">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$lin): $mod = ($i % 2 );++$i;?><a href="<?php echo ($lin["website"]); ?>" title="<?php echo ($lin["webinfo"]); ?>"><?php echo ($lin["webname"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
         </div>
         <div class="footer-center-r" style="background:url('/Public/images/footer_icons.png') no-repeat left top;">
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
        <a href="#" target="_blank"><img src="/Public/images/21.gif" border="0" height="20" width="20"></a>
<span id="cnzz_stat_icon_5809997"><a href="#" target="_blank" title="站长统计"><img src="/Public/images/pic1.gif" border="0" hspace="0" vspace="0"></a></span>
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