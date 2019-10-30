<template>
	<view>
		<view class="box">
			<view class="user">
				<view class="up" v-for="(v,i) in arr" :key='i'>
					<image :src="v.src" mode=""></image>
					<text>{{v.text}}</text>
					<text>{{v.txt}}</text>
				</view>
			</view>
			<view class="choose">
				<view class="end" @click="close">
					<image src="../../static/shipin1.png" mode=""></image>
					<text>拒绝</text>
				</view>
				<view class="end" @click="go">
					<image src="../../static/shipin2.png" mode=""></image>
					<text>接收</text>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				arr:[
					{src:'../../static/u1.jpg',text:'美女',txt:'邀请你进行通话',}
				]
			}
		},
		methods: {
			close(){
				uni.switchTab({
					url: '/pages/liaotian/index'
				});
			},
			go(){
				uni.navigateTo({
					url: '/pages/moneyCz/index'
				});
			}
		}
	}
</script>

<style>
	uni-page-body {
		height: 100%;
		background-color: #36343C;
	}
	.user{
		padding: 14%;
	}
	.user .up{
		font-size: 0.8rem;
		color: #FFFFFF;
		display: flex;
		flex-flow: column;
		align-items: center;
	}
	.user .up image{
		width: 200upx;
		height: 200upx;
	}
	.choose{
		margin-top: 60%;
		margin-bottom: 10%;
		font-size: 0.1rem;
		display: flex;
		justify-content: space-around;
		align-items: flex-end;
	}
	.choose .end{
		color: #FFFFFF;
		display: flex;
		flex-flow: column;
		align-items: center;
	}
	.choose .end image{
		width: 140upx;
		height: 140upx;
	}
</style>
