<?php if (!defined('THINK_PATH')) exit();?>
<div class="pageContent">
    <div>
        <!-- cursor:pointer; -->
        
    </div>
	<form method="post" action="/yyw/index.php/Admin/SystemMessage/insert/navTabId/listsystemmessage/callbackType/closeCurrent"  class="pageForm required-validate" 
        onsubmit="return validateCallback(this,navTabAjaxDone);"><?php  ?>
        
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>性别：</dt>
                <dd>
                    <input type="radio" name="gender" value="" checked>不限
                    <input type="radio" name="gender" value="1">男
                    <input type="radio" name="gender" value="0">女
                </dd>
			</dl>
			
			<dl style="width:100%;">
				<dt>年龄范围：</dt>
                <dd>
                    <select name="startAge">
                        <option value="">=不限=</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                    </select><span style="display:block;float:left;margin:3px 2px 0px 2px;">岁~</span>
                    
                    <select name="endAge">
                        <option value="">=不限=</option>
                        <option value="18">18</option>
                        <option value="19">19</option>
                        <option value="20">20</option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                        <option value="32">32</option>
                        <option value="33">33</option>
                        <option value="34">34</option>
                        <option value="35">35</option>
                        <option value="36">36</option>
                        <option value="37">37</option>
                        <option value="38">38</option>
                        <option value="39">39</option>
                        <option value="40">40</option>
                    </select>&nbsp;岁
				</dd>
			</dl>
			<dl style="width:100%;">
				<dt>注册时间：</dt>
				<dd>
                    <input type="text" name="regTime" value="" size="4" /><span style="display:block;float:left;margin:3px 2px 0px 2px;">天</span>
                    <select name="regRange">
                        <option value="in">之内</option>
                        <option value="out">之外</option>
                    </select>&nbsp;注册的会员
                </dd>
            </dl>

            <dl style="width:100%;">
				<dt>登陆时间：</dt>
				<dd>
                <input type="text" name="loginTime" value=""  size="4" /><span style="display:block;float:left;margin:3px 2px 0px 2px;">天</span>
                    <select name="loginRange">
                        <option value="in">之内</option>
                        <option value="out">之外</option>
                    </select>&nbsp;登陆的会员
                    
				</dd>
            </dl>
            <dl style="width:100%;">
                <dt>所在地区：</dt>
                <dd>
                    <select name="provinceid">
                        <option value="">所有省市</option>
                        <option value="1">北京</option>
                        <option value="2">天津</option>
                        <option value="3">河北</option>
                        <option value="4">山西</option>
                        <option value="5">内蒙</option>
                        <option value="6">辽宁</option>
                        <option value="7">吉林</option>
                        <option value="8">黑龙江</option>
                        <option value="9">上海</option>
                        <option value="10">江苏</option>
                        <option value="11">浙江</option>
                        <option value="12">安徽</option>
                        <option value="13">福建</option>
                        <option value="14">江西</option>
                        <option value="15">山东</option>
                        <option value="16">河南</option>
                        <option value="17">湖北</option>
                        <option value="18">湖南</option>
                        <option value="19">广东</option>
                        <option value="20">广西</option>
                        <option value="21">海南</option>
                        <option value="22">重庆</option>
                        <option value="23">四川</option>
                        <option value="24">贵州</option>
                        <option value="25">云南</option>
                        <option value="26">西藏</option>
                        <option value="27">陕西</option>
                        <option value="28">甘肃</option>
                        <option value="29">青海</option>
                        <option value="30">宁夏</option>
                        <option value="31">新疆</option>
                        <option value="32">台湾</option>
                        <option value="33">香港</option>
                        <option value="34">澳门</option>
                        <option value="35">海外</option>
                        <option value="36">其他</option>
                    </select>
                </dd>
            </dl>
            <hr style="width:67%;line-height:20px;height:1px;float:left;clear:both;" />
            <dl style="width:100%;">
                <dt>消息标题：</dt>
                <dd>
                    <input type="text" name="title" value="" class="required" style="width:100%;" />
                </dd>
            </dl>
            <dl style="width:100%;">
                <dt>消息内容：</dt>
                <dd>
                    <textarea class="etitor required" name="content" cols="60" rows="15"></textarea>
                </dd>
            </dl>
		</div>
        
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">发送</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>