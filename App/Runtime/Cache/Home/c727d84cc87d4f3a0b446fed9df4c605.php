<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<title>易缘网-免费交友大厅</title>

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
		  <div class="logowrap"><a href="/yyw/index.php/Home/Index/index"><img src="/yyw/Public/images/240b5963bb45432a.gif" alt="易缘网" height="64" width="160"></a></div>
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

  <div class="ce reg">
    <div class="left">
        <!-- 会员您登陆 -->
<div class="loginbox">
        <div class="log_box">
            <form method="post" action="/yyw/index.php/Home/Login/login" name="login_form" id="login_loginForm">
                <div class="form_li  desc">
                    登录网站
                </div>
                <div class="formtip">
                  <p id="login_error_msg" class="color5"></p>
                </div>
                <!-- 账号 -->
                <div class="form_li pas">
                  <label class="lo_la">账　号：</label>
                  <input name="username" id="login_loginName" value="用户名/邮箱" class="w1" type="text">
                </div>
                <!-- 密码 -->
                <div class="form_li pas">
                      <label class="lo_la">密　码：</label>
                      <input name="password" id="login_passWord" class="w1" type="password">
                </div>
                <div class="form_li">
                    <!-- 登陆按钮 -->
                    <a class="btn_a1" href="javascript:void(0);">
                    <!-- <button class="login_register" onclick="return checklogin();">登  录</button> -->
                    <input type="submit" value="" style="width:81px;height:34px;background:url(/yyw/Public/images/login.png) no-repeat" />
                    </a>
                    <!-- 忘记密码 -->
                    <a href="#">忘记密码</a>
              
                </div>                
                
            </form>
            <script type="text/javascript">
                 verifyLogin('login_loginForm', 'login_loginName', 'login_passWord');
            </script>
        </div>
        <div class="cooperation">
          <p class="login_list clearfix color3"> <span class="li_d">·</span>没有账号？ <a class="no_ico" href="/yyw/index.php/Home/Login/register">立即注册</a><br>
		    
            <span class="li_d" style="display:none;">·用合作网站账号登录</span>
			
									<a href="#"><img src="/yyw/Public/images/qq.gif">&nbsp;&nbsp;QQ登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a href="#"><img src="/yyw/Public/images/sina.gif">&nbsp;&nbsp;新浪微博登录</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					  
		  </p>
        </div>
</div>
    </div>
    <div class="right"> 
	  <a class="login" href="/yyw/index.php/Home/Login/register">没有账号？点击注册&gt;&gt;</a>
	        <ul class="list">
        <li class="first"> 
		  <span class="ico ico-pro"></span>
          <div class="info">
            <h4>高素质、诚信的交友会员</h4>
            <p>面向渴望爱情婚姻的单身人士</p>
            <p>需提交详细资料和身份证件</p>
            <p>专业的人工审核跟进</p>
          </div>
        </li>
        <li> 
		  <span class="ico ico-date"></span>
          <div class="info">
            <h4>以“约会”为主导交友模式</h4>
            <p>自主定制约会，挑选约会对象</p>
            <p>通过约会观察</p>
            <p>直接快速判断是否适合交往</p>
          </div>
        </li>
        <li> 
		  <span class="ico ico-secu"></span>
          <div class="info">
            <h4>安全的交友平台</h4>
            <p>涉及隐私的资料都被保密</p>
            <p>约会双方必须验证联系方式</p>
            <p>成功后由网站代为交换</p>
          </div>
        </li>
        <div style="clear:both;"></div>
      </ul>
    </div>
    <div style="clear:both;"></div>
  </div>
  <div style="clear:both;"></div>

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
             <dt>关于易缘</dt>
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
            <p>易缘网手机版</p>
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