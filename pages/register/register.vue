<template>
	<view>
		<view class="box">
			<view class="input">
				<view class="inpcs">
					<text>+86</text>
					<input class="number" type="text" name="nickname" placeholder="请输入手机号码" @blur="fun2()"/>
					<button class="sub" type="primary" @click="sendMessage">{{word}}</button>
				</view>
				<view class="inpcs">
					<text>验证码</text>
					<input type="password" value="" placeholder="请输入验证码" />
				</view>
				<view class="inpcs">
					<text>密码</text>
					<input type="password" value="" placeholder="密码不少于6位数" />
				</view>
			</view>
			
			<view class="butcs">
				<button>确定</button>
			</view>
			<view class="txtcs">
				<text @click="login">立即登录</text>
				<text @click="forget">忘记密码？</text>
			</view>
			
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				word: '发送验证码',
				isOvertime: false,
				
				loginname:"",//注册页面用户名//判断输入框的值是否符合用户名规则
				loginpwd:"",//密码
				logincode:"",//输入的验证码
				
				dool:true,//判断是否符合用户名规则的真假
				btnbooll:true,//判断输入框内是否有值的真假
			}
		},
		methods: {
			login(){
				uni.navigateTo({
					url: '/pages/login/login'
				});
			},
			forget(){
				uni.navigateTo({
					url: '/pages/forget/forget'
				});
			},
			sendMessage(){
				if(this.isOvertime){
					return false;
				}
				let that = this,
					time = 60;
				var sendTimer = setInterval(function(){
					var sub=document.getElementsByClassName('sub')[0];
					that.isOvertime = true;
					time--;
					that.word = time+'S后重试';
					sub.style.backgroundColor='#ccc';
					if(time < 0){
						that.isOvertime = false;
						clearInterval(sendTimer);
						that.word = "获取验证码";
						sub.style.backgroundColor='#D096C3';
						sub.style.color='#fff';
					}
				},1000)
			}
		}
	}
</script>

<style>
	.box{
		height: 1080UPX;
		/* background-color: #E5E5E5; */
	}
	.input{
		width: 100%;
		padding: 20upx 0;
	}
	.inpcs{
		padding:0 20upx;
		margin: 40upx;
		display: flex;
		border-radius: 50upx;
		border-bottom: 6upx solid #D096C3;
	}
	.inpcs input{
		font-size: 0.8rem;
	}
	.inpcs text,
	.inpcs input{
		margin: 20upx;
	}
	.sub{
		width: 260upx;
		height: 60upx;
		line-height: 60upx;
		border-radius: 40upx;
		color: #FFFFFF;
		background-color:#D096C3;
	}
	.butcs{
		margin-left: 10%;
		margin:50upx 10%;
		width: 80%;
		height: 60upx;
	}
	.butcs button{
		border-radius: 40upx;
		color: #FFFFFF;
		background-color:#909399;
	}
	.txtcs{
		margin-top:80upx;
		display: flex;
		justify-content: space-around;
		align-items: center;
	}
</style>
