<template>
	<view>
		
		<view class="viewbox">
			<image class="viewimg" src="../../static/timg.jpg" mode="widthFix"></image>
				<!-- <swiper class="viewtext" vertical="true" autoplay="true" circular="true" interval="3000">
					<swiper-item v-for="(v, i) in msg" :key="i">
						<navigator>{{v}}</navigator>
					</swiper-item>
				</swiper> -->
			<marquee class="viewtext" direction="up" scrolldelay="200" scrollamount="3">请勿添加陌生人微信或转账</marquee>
		</view>
		
		<view class="img" v-for="(v,i) in arr" :key="i" @click="fun(v)">
			<img :src="v.src" alt=""/>
			<text>{{v.text}}</text>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				// title:"滚动公告",
				// msg : [
				// 	'uni-app行业峰会频频亮相，开发者反响热烈',
				// 	'DCloud完成B2轮融资，uni-app震撼发布',
				// 	'36氪热文榜推荐、CSDN公号推荐 DCloud CEO文章'
				// ],
				arr:[
					{id:1,text:'12km',src:'https://img-cdn-qiniu.dcloud.net.cn/uniapp/images/shuijiao.jpg'},
					{id:10,text:'10km',src:'../../static/10.jpg'},
					{id:9,text:'11km',src:'../../static/9.jpg'},
					{id:8,text:'7km',src:'../../static/8.jpg'},
					{id:7,text:'9km',src:'../../static/7.jpg'},
					{id:6,text:'8km',src:'../../static/6.jpg'},
					{id:5,text:'4km',src:'../../static/5.jpg'},
					{id:4,text:'5km',src:'../../static/4.jpg'},
					{id:3,text:'6km',src:'../../static/3.jpg'},
					{id:2,text:'2km',src:'../../static/2.jpg'},
				]
			};
		},
		methods:{
			fun(num){
				uni.navigateTo({
					url: '/pages/index/idetails'
				});
				
				// this.$router.push("idetails"+num)
				// this.$Router.push({ name: 'idetails', params: { userId: 'num' }})
				// uni.navigateTo({
				// 	url: 'idetails?id=num'
				// });
			}
		}
	}
</script>

<style>
	.viewbox{
		width: 100%;
		height: 40upx;
		display: flex;
		background-color: #FFFFFF;
		padding: 10upx 20upx;
		/* display: none; */
	}
	.viewtext{
		/* height: 50upx; */
		/* display: flex; */
		/* justify-content: center; */
		font-size: 30upx;
	}
	.viewimg{
		width: 50upx;
		height: 40upx;
	}
	
	.img{
		display: inline-block;
		position:relative;
		width: 49%;
	}
	img{
		width: 100%;
		height: 220upx;
	}
	text{
		font-size: 14upx;
		position: absolute;
		bottom:20upx;
		left: 10upx;
	}
</style>
