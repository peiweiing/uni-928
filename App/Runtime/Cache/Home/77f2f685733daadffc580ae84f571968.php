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

<div class="ce reg">
    <div class="left">
<div class="reg_left_title">
        <!-- <h1>30秒免费注册， 开启您的择友之旅~</h1> -->
        <!-- 扣不下背景图片只有。。生生的放在这 -->
        <img src="/Public/images/title.png" width="270" height="45" />
      </div>
	  <form method="post" action="/index.php/Home/Login/insert" name="register_form" onsubmit="return checkSubmit()" id="register_form">
        <div class="form_box">
          <input value="" name="forward" type="hidden">
          
		  <div class="reg_tips_center">账号信息 带*号必填</div>
          <div id="div_email" class="form_li">
            <label><font color="red">*</font> 昵　　称：</label>
            <input name="username" id="username" onblur="ajaxInfo('username')" class="w1" maxlength="16" type="text">  <span id="tip_username"></span>
			<br><font color="#999999">长度3-16个字符，1个汉字=2个字符
			<br>格式由26个字母，数字，汉字，下横线，中横线组成。</font>
		  </div>
          <div class="form_li">
            <label><font color="red">*</font> 登录密码：</label>
            <input name="password" id="password" onblur="checkPassWord()" class="w1" type="password"> <font id="tip_password" color="#999999">长度6-16个字符</font>
          </div>
          <div class="form_li">
            <label><font color="red">*</font> 确认密码：</label>
            <input name="confirmpassword" id="confirmpassword" onblur="checkConfirmPassWord()" class="w1" type="password" />
            <font id="tip_confirpassword" color="#999999"> 输入以上密码</font>
          </div>
          <div class="form_li">
            <label><font color="red">*</font> 常用邮箱：</label>
            <input name="email" id="email" class="w1" onblur="ajaxInfo('email')" type="text"> <font color="red">*</font> <span id="tip_email"><font color="#999999"> 用于登陆，认证，找回密码和会员信件提醒</font></span>
          </div>
		    <div class="form_li">
                <label><font color="red">*</font> 验&nbsp;证&nbsp;码&nbsp;：</label>
                <input id="checkcodes" name="verify" class="w2" maxlength="8" type="text" />
                <!-- /index.php/Home/Login/getCode -->
                <img id="getCode" onclick="refeshCode()" src="/index.php/Home/Login/getCode" style="position:relative;top:12px;" />
                 
                <a href="javascript:void(0);" onclick="refeshCode()" id="refeshCode"> 换一张</a>
                
                
                <!-- document.getElementById('code').src='/index.php/Home/Login/getCode' -->
                <span id="tip_checkcodes"><font color="#999999">请输入验证码</font></span>
                <!--<span id="tip_checkcode"><?php echo ($verifyInfo); ?></span>-->
            </div>
			<script type="text/javascript">
				
				
				
			</script>
    
		  <div class="reg_tips_center">基本信息 带*号必填</div>
          <div class="bitian">
            <div id="div_gender" class="form_li">
              <label><font color="red">*</font>  您的性别：</label>
              <input name="gender" id="gender" value="1" checked="checked" type="radio">男， 
              <input name="gender" id="gender" value="2" type="radio">女 
              <span id="dgender" class="f_red"></span> 
              <font color="#999999">(一旦选择不能修改)</font>
            </div>
            <div id="div_birthday" class="form_li">
              <label><font color="red">*</font> 出生日期：</label>
              <select name="ageyear" id="ageyear">
                <option selected="selected" value="">请选择</option>
                <option value="1996">1996</option><option value="1995">1995</option>
                <option value="1994">1994</option><option value="1993">1993</option>
                <option value="1992">1992</option><option value="1991">1991</option>
                <option value="1990">1990</option><option value="1989">1989</option>
                <option value="1988">1988</option><option value="1987">1987</option>
                <option value="1986">1986</option><option value="1985">1985</option>
                <option value="1984">1984</option><option value="1983">1983</option>
                <option value="1982">1982</option><option value="1981">1981</option>
                <option value="1980">1980</option><option value="1979">1979</option>
                <option value="1978">1978</option><option value="1977">1977</option>
                <option value="1976">1976</option><option value="1975">1975</option>
                <option value="1974">1974</option><option value="1973">1973</option>
                <option value="1972">1972</option><option value="1971">1971</option>
                <option value="1970">1970</option><option value="1969">1969</option>
                <option value="1968">1968</option><option value="1967">1967</option>
                <option value="1966">1966</option><option value="1965">1965</option>
                <option value="1964">1964</option><option value="1963">1963</option>
                <option value="1962">1962</option><option value="1961">1961</option>
                <option value="1960">1960</option><option value="1959">1959</option>
                <option value="1958">1958</option><option value="1957">1957</option>
                <option value="1956">1956</option><option value="1955">1955</option>
                <option value="1954">1954</option>
              </select>年
			  <select name="agemonth" id="agemonth">
                <option selected="selected" value="">请选择</option>
                <option value="1">1</option><option value="2">2</option>
                <option value="3">3</option><option value="4">4</option>
                <option value="5">5</option><option value="6">6</option>
                <option value="7">7</option><option value="8">8</option>
                <option value="9">9</option><option value="10">10</option>
                <option value="11">11</option><option value="12">12</option>
              </select>月
                <!--135781012 31 2 28 30 4 6 9 11--> 
			  <select name="ageday" id="ageday">
                <option selected="selected" value="">请选择</option>
                <option value="1">1</option><option value="2">2</option>
                <option value="3">3</option><option value="4">4</option>
                <option value="5">5</option><option value="6">6</option>
                <option value="7">7</option><option value="8">8</option>
                <option value="9">9</option><option value="10">10</option>
                <option value="11">11</option><option value="12">12</option>
                <option value="13">13</option><option value="14">14</option>
                <option value="15">15</option><option value="16">16</option>
                <option value="17">17</option><option value="18">18</option>
                <option value="19">19</option><option value="20">20</option>
                <option value="21">21</option><option value="22">22</option>
                <option value="23">23</option><option value="24">24</option>
                <option value="25">25</option><option value="26">26</option>
                <option value="27">27</option><option value="28">28</option>
                <option value="29">29</option><option value="30">30</option>
                <option value="31">31</option>
              </select>日
			  <font color="#999999">(一旦选择不能修改)</font>
			</div>
            <div id="div_marriage" class="form_li">
              <label><font color="red">*</font>  婚姻状况：</label>
              <select name="marrystatus" id="marrystatus">
                <option selected="selected" value="">=请选择=</option>
                <option value="1">未婚</option>
                <option value="2">已婚</option>
                <option value="3">离异</option>
                <option value="4">丧偶</option></select>
				<font color="#999999">(一旦选择不能修改)</font>
            </div>
            <div id="div_eduction" class="form_li">
              <label><font color="red">*</font>  学　　历：</label>
              <select name="education" id="education">
                <option selected="selected" value="">=请选择=</option>
                <option value="1">中专以下学历</option>
                <option value="2">中专</option>
                <option value="3">大专</option>
                <option value="4">本科</option>
                <option value="5">硕士</option>
                <option value="6">博士</option>
                <option value="7">博士后</option>
              </select>
              <font color="#999999">(一旦选择不能修改)</font>
            </div>
            <div id="div_height" class="form_li">
              <label><font color="red">*</font>  身　　高：</label>
              <select name="height" id="height">
                  <option value="">=请选择=</option>
                  <option value="130">130</option>
                  <option value="131">131</option>
                  <option value="132">132</option>
                  <option value="133">133</option>
                  <option value="134">134</option>
                  <option value="135">135</option>
                  <option value="136">136</option>
                  <option value="137">137</option>
                  <option value="138">138</option>
                  <option value="139">139</option>
                  <option value="140">140</option>
                  <option value="141">141</option>
                  <option value="142">142</option>
                  <option value="143">143</option>
                  <option value="144">144</option>
                  <option value="145">145</option>
                  <option value="146">146</option>
                  <option value="147">147</option>
                  <option value="148">148</option>
                  <option value="149">149</option>
                  <option value="150">150</option>
                  <option value="151">151</option>
                  <option value="152">152</option>
                  <option value="153">153</option>
                  <option value="154">154</option>
                  <option value="155">155</option>
                  <option value="156">156</option>
                  <option value="157">157</option>
                  <option value="158">158</option>
                  <option value="159">159</option>
                  <option value="160" selected="selected">160</option>
                  <option value="161">161</option>
                  <option value="162">162</option>
                  <option value="163">163</option>
                  <option value="164">164</option>
                  <option value="165">165</option>
                  <option value="166">166</option><option value="167">167</option><option value="168">168</option><option value="169">169</option><option value="170">170</option><option value="171">171</option><option value="172">172</option><option value="173">173</option><option value="174">174</option><option value="175">175</option><option value="176">176</option><option value="177">177</option><option value="178">178</option><option value="179">179</option><option value="180">180</option><option value="181">181</option><option value="182">182</option><option value="183">183</option><option value="184">184</option><option value="185">185</option><option value="186">186</option><option value="187">187</option><option value="188">188</option><option value="189">189</option><option value="190">190</option><option value="191">191</option><option value="192">192</option><option value="193">193</option><option value="194">194</option><option value="195">195</option><option value="196">196</option><option value="197">197</option><option value="198">198</option><option value="199">199</option><option value="200">200</option>
              </select> CM <font color="#999999">(一旦选择不能修改)</font>
            </div>
            <div id="div_workCity" class="form_li form_city">
              <label><font color="red">*</font>  所在地区：</label>
              <select name="provinceid" id="provinceid">

              </select>&nbsp;
                
          </div>
            <script type="text/javascript">
                $(function(){
                    //加载注册城市街道信息
                    var upid = 0;
                    myAjax('/index.php/Home/Login/addrAjax', 'get', 'json', upid, function(data){
                        var $options = "<option>=请选择=</option>";
                        $.each(data, function(i){
                            $options += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";    
                        })
                        $("#provinceid").append($options);        
                    });

                    $("#provinceid").change(function(){
                        var sel = $(this);
                        var id = sel.val();
                        sel.nextAll().remove();
                        if(id>0){
                            //调用自定义ajax函数
                            myAjax('/index.php/Home/Login/addrAjax', 'get', 'json', {upid:id}, function(data){
                                if(data == null) {
                                    return;
                                }
                                var $options = "<select name='cityid' id='cityid'>";
                                    $options += "<option>=请选择=</option>";
                                $.each(data, function(i){
                                    $options += "<option value='"+data[i]['id']+"'>"+data[i]['name']+"</option>";    
                                })
                                $options += "</select>";
                                sel.after($options);
                            });
                        }   
                    })
                });
            </script>
									
		    			
			
			
          </div>

          <div class="form_li">
            <div class="serve_text">
              <input onclick="checkAgree()" name="agree" id="agree" value="true" type="checkbox">
              <label>
                    <a href="http://www.yyw1314.com/index.php?c=about&amp;a=detail&amp;id=8" target="_blank">注册条款</a> 和 
                    <a href="http://www.yyw1314.com/index.php?c=about&amp;a=detail&amp;id=7" target="_blank">隐私政策</a>               </label>
                
            </div>
            <div class="tijiao"> 
			  <a class="btn_a1" id="a_register_submit" style="pointer:hand;">
              <!-- <button class="button_register" style="pointer:hand;" type="button" onclick="return checkreg();">免费注册</button> -->

                <input type="submit" value="" style="width:113px;border:none;background:url(/Public/images/register.png) no-repeat;" />
              </a> 
          </div>

          
          
          </div>
        </div>
      </form>
    </div>
    <div class="right"> 
	  <a class="login" href="/index.php/Home/Login/index">已有帐号？ 点此登录&gt;&gt;</a>
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
        <script type="text/javascript">

            function ajaxInfo(item){
                
                if(item == "username"){
                    var notice = '昵称';
                    var verify = $("#"+item).val().match(/^([\u4E00-\uFA29]|[\uE7C7-\uE7F3]|[a-zA-Z0-9]){3,16}$/);
					//var verify = $("#"+item).val().match(/^[\w-_]{3,16}$/);
                }else{
                    var notice = '邮箱';
                    var verify = $("#"+item).val().match(/^[_.0-9a-z-]+@([0-9a-z][0-9a-z-]+.)+[a-z]{2,3}$/);
                }
                
                if($("#"+item).val().length == 0){
                    $("#tip_"+item).css('color', 'red').html(notice+"不能为空!");
                    return false;
                }else if(verify == null){
                    $("#tip_"+item).css('color', 'red').html(notice+"格式不正确");
                    return false;            
                }
                var result;
                //调用自定义ajax函数
                var data = 'inputName='+item+'&inputValue='+$("#"+item).val();
                myAjax("/index.php/Home/Login/unique", 'get', 'text', data, function(data){
                    if(data != 0){
                        $("#tip_"+item).css('color', 'green').html("该"+notice+"可以使用");
                        result = true;
                    }else{
                        $("#tip_"+item).css('color', 'red').html("该"+notice+"已被注册");
                        result = false;
                    }
                }, false);
                return result;

            }

          
        </script>
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