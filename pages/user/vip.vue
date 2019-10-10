<template>
	<view class="box">
		<view class="close">
			<text  @click="fun"><</text>
			<text>VIP</text>
			<text></text>
		</view>
		<view class="up">
			<view class="module">
				<a href="#d1">普通vip</a>
			</view>
			<view class="module">
				<a href="#d2">超级vip</a>
			</view>
		</view>
		<view class="center">
			
		</view>
		<view class="end">
			<view id="d1" class="modu">
				<text class="bgc">普通VIP特权</text>
				<view class="text">
					<text>vip特权</text>
					<text class="f-20">成为vip会员可享受聊天和提现，每个月完成20天分享到朋友圈任务即可享受一次领取话费。</text>
				</view>
				<view class="text">
					<text>vip特权</text>
					<text class="f-20">还在等待TA的回复吗？其实TA已经和其他会员聊上了，成为会员立刻私聊</text>
				</view>
			</view>
			<view id="d2" class="modu">
				<text class="bgc">超级VIP特权</text>
				<view class="text">
					<text>超级vip特权</text>
					<text class="f-20">享受到普通会员所有的权利的同时邀请赚钱快，优先提现，优先处理问题完成20天分享到朋友圈任务即可领取话费。</text>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		components: {
			
		},
		data() {
			return {
				
			}
		},
		onLoad() {
	
		},
		methods: {
			
			fun(){
				uni.switchTab({
					// url: '/components/iindex/iindextwo'
					url: '/pages/user/index'
				});
			},
		}
	}
</script>

<style>
	.close{
		display: flex;
		justify-content: space-between;
		padding: 6upx 10upx;
		background-color: #FA62A8;
	}
	.center{
		background-color:#B9B9B9 ;
		height:300upx;
		margin-bottom: 30upx;
	}
	.up{
		display: flex;
		justify-content: space-between;
		margin: 10upx 20%;
	}
	.end{
		height: 900upx;
		overflow: hidden;
	}
	.modu{
		height: 900upx;
		overflow: hidden;
		display: flex;
		flex-flow: column;
	}
	.bgc{
		background-color: #B9B9B9;
		padding: 20upx;
	}
	.text{
		display: flex;
		flex-flow: column;
		padding: 20upx;
		padding-left: 80upx;
	}
	.f-20{
		font-size:0.6rem;
	}
	a{
		text-decoration: none;
	}
</style>
