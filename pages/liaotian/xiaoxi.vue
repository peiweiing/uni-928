<template>
	<view>
		<view class="box">
			<view class="module">
				<text class="time">2019-06-24 17:55:07</text>
				<view class="modu">
					<text class="h2">用户注意--咨询客服</text>
					<text class="times">2019-06-24 17:55:07</text>
					<text class="text">1.聊天币是用来换礼物送人的。开通vip会员才能畅通聊天，要先开通vip会员才能送礼物。2.所有人用QQ还是微信登录就已经是定位了。所以不存在这个位置有虚假。3.不要问为什么收费，就目前最顶级的世纪佳缘，它同样有些功能也是收费的</text>
				</view>
			</view>
			<view class="module">
				<text class="time">2019-06-25 10:55:07</text>
				<view class="modu">
					<text class="h2">请勿添加陌生人微信或者转账，如有不良用户请及时反馈举报</text>
					<text class="times">2019-06-25 10:55:07</text>
					<text class="text">请勿添加陌生人微信或者转账，如有不良用户请及时反馈举报</text>
				</view>
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
			
		}
	}
</script>

<style>
	uni-page-wrapper{
		background-color: #75787D!important;
	}
	.box{
		padding: 20upx;
	}
	.module{
		display: flex;
		flex-flow: column;
		justify-content: center;
		align-items: center;
	}
	.time{
		font-size: 0.1rem;
		height: 40upx;
		line-height: 40upx;
		width: 240upx;
		color: #FFFFFF;
		border-radius: 20upx;
		text-align: center;
		background-color: #555555;
	}
	.modu{
		margin: 20upx;
		padding: 20upx;
		background-color: #E4E7ED;
		display: flex;
		flex-flow: column;
	}
	.h2{
		font-size: 1rem;
	}
	.times{
		color: #909399;
		font-size: 0.2rem;
	}
	.text{
		font-size: 26upx;
	}
</style>
