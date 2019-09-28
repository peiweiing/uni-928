<template>
	<view>
		<view class="img" v-for="(v,i) in arr" :key="i" @click="fun(v.id)">
			<img :src="v.src" alt=""/>
			<text>{{v.text}}</text>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				arr:[
					{id:1,text:'12km',src:'https://img-cdn-qiniu.dcloud.net.cn/uniapp/images/shuijiao.jpg'},
					{id:2,text:'2km',src:'../../static/2.jpg'},
					{id:3,text:'6km',src:'../../static/3.jpg'},
					{id:4,text:'5km',src:'../../static/4.jpg'},
					{id:5,text:'4km',src:'../../static/5.jpg'},
					{id:6,text:'8km',src:'../../static/6.jpg'},
					{id:7,text:'9km',src:'../../static/7.jpg'},
					{id:8,text:'7km',src:'../../static/8.jpg'},
					{id:9,text:'11km',src:'../../static/9.jpg'},
					{id:10,text:'10km',src:'../../static/10.jpg'},
				]
			};
		},
		methods:{
			fun(num){
				this.$router.push("idetails"+num)
				// this.$Router.push({ name: 'idetails', params: { userId: 'num' }})
				// uni.navigateTo({
				// 	url: 'idetails?id=num'
				// });
			}
		}
	}
</script>

<style>
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
