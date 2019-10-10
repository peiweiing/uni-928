<template>
	<view>
		<view class="boxall">
			<!-- <text>我的好友</text>
			<text>我的通话</text> -->
			<view class="header">
				<view class="topcs">
					<text @click="fun()">我的好友</text>
					<text @click="fen()">我的通话</text>
				</view>
				<view class="box" @click="xiaoxi">
					<view class="imgcs">
						<img src="../../static/L系统消息.png" alt="">
					</view>
					<view class="txtcs">
						<text class="txtup">系统消息</text>
						<text class="txtend">系统消息</text>
					</view>
				</view>
				<view class="box" @click="zixun">
					<view class="imgcs">
						<img src="../../static/L客户咨询.png" alt="">
					</view>
					<view class="txtcs">
						<text class="txtup">客户咨询</text>
						<text class="txtend">欢迎来撩客服小姐姐</text>
					</view>
				</view>
				<view class="box" @click="tixin">
					<view class="imgcs">
						<img src="../../static/L同城提醒.png" alt="">
					</view>
					<view class="txtcs">
						<text class="txtup">同城美女相约</text>
						<text class="txtend">同城美女相约提醒</text>
					</view>
				</view>
				
			</view>
		
			<view class="box" v-for="(v,i) in arr" :key="i" @click="liaotian">
				<view class="imgcs">
					<img :src="v.src" alt="">
				</view>
				<view class="boxtxt">
					<view class="boxcs">
						<text class="txtup">{{v.name}}</text>
						<text class="txtend">{{v.text}}</text>
					</view>
					<view class="boxend">
						<text class="txtend">{{v.time}}</text>
					</view>
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
					{src:"../../static/1.jpg",name:'刘涛',text:"帅哥有空吗",time:"16:00"},
					{src:"../../static/2.jpg",name:'柳岩',text:"帅哥你有空吗",time:"2:00"},
					{src:"../../static/3.jpg",name:'杨幂',text:"帅哥你有没有空",time:"0:50"},
					{src:"../../static/4.jpg",name:'杨紫',text:"帅哥你到底有空吗",time:"0:10"},
					{src:"../../static/5.jpg",name:'刘涛',text:"帅哥你到底有没有空",time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',text:"帅哥你到底有没有空",time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',text:"帅哥你到底有没有空",time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',text:"帅哥你到底有没有空",time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',text:"帅哥你到底有没有空",time:"0:20"},
				]
			};
		},
		methods: {
			fun() {
				uni.navigateTo({
					url: '/pages/login/login'
				});
			},
			fen(){
				uni.navigateTo({
					url: '/pages/register/register'
				});
			},
			liaotian(){
				uni.navigateTo({
					url:'../../pages/duihua/duihua'
				})
			},
			xiaoxi(){
				uni.navigateTo({
					url:'../../pages/liaotian/xiaoxi'
				})
			},
			tixin(){
				uni.navigateTo({
					url:'../../pages/liaotian/tixin'
				})
			},
			zixun(){
				uni.navigateTo({
					url:'../../pages/client/index'
				})
			}
		},
	}
</script>

<style>
	img{
		width: 80upx;
		height: 80upx;
		border-radius: 50%;
	}
	.header{
		position: sticky;
		top: 0;
		left: 0;
	}
	.topcs{
		display: flex;
		justify-content: space-between;
		padding: 20upx;
		color: #fff;
		background-color: #FA62A8;
	}
	.box{
		height: 160upx;
		display: flex;
		align-items: center;
		background-color: #EBEFF3;
		padding:10upx 20upx;
		border-bottom:1px solid #ccc;
	}
	.imgcs{
		margin-right:20upx;
	}
	.txtcs,
	.boxcs{
		width: 520UPX;
		overflow: hidden;
		display: flex;
		flex-flow: column;	
	}
	.txtup{
		font-size: 0.9rem;
	}
	.txtend{
		font-size: 0.6rem;
		color: #A9A9A9;
	}
	.boxtxt{
		display: flex;
	}
	.boxend{
		display: flex;
		align-items:flex-start;
	}
</style>
