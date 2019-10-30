<template>
	<view>
		<view class="box">
			<view class="input">
				<view class="inpcs">
					<text>+86</text>
					<input type="number" value="" placeholder="请输入手机号码" />
				</view>
				<view class="inpcs">
					<text>密码</text>
					<input type="password" value="" placeholder="请输入密码" />
				</view>
			</view>
			
			<view class="butcs">
				<button>确定</button>
			</view>
			<view class="txtcs">
				<text @click="forget">忘记密码？</text>
				<text @click="register">立即注册</text>
			</view>
			
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			}
		},
		methods: {
			register(){
				uni.navigateTo({
					url: '/pages/register/register'
				});
			},
			forget(){
				uni.navigateTo({
					url: '/pages/forget/forget'
				});
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
