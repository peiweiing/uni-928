<template>
	<view>
		<view class="boxall">
		
			<view class="box" v-for="(v,i) in arr" :key="i">
				<view class="imgcs">
					<text>{{i+1}}</text>
					<img :src="v.src" alt="">
				</view>
				<view class="boxcs">
					<view class="boxup">
						<text>{{v.name}}</text>
						<text class="txtup">♀</text>
					</view>
					<view>魅力值</view>
					<view class="txtend">{{v.time}}</view>
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
					{src:"../../static/4.jpg",name:'杨紫',time:"0:10"},
					{src:"../../static/5.jpg",name:'刘涛',time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',time:"0:20"},
					{src:"../../static/5.jpg",name:'刘涛',time:"0:20"},
					{src:"../../static/1.jpg",name:'刘涛',time:"16:00"},
					{src:"../../static/2.jpg",name:'柳岩',time:"2:00"},
					{src:"../../static/3.jpg",name:'杨幂',time:"0:50"},
				]
			};
		}
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
	.box{
		height: 160upx;
		display: flex;
		justify-content: space-between;
		align-items: center;
		background-color: #EBEFF3;
		padding: 20upx;
		border-bottom:1px solid #ccc;
	}
	.imgcs{
		width: 20%;
		display: flex;
		align-items: center;
		margin-right:20upx;
	}
	.boxcs{
		width: 80%;
		display: flex;
		justify-content: space-between;
		font-size: 0.8rem;
	}
	.boxup{
		overflow: hidden;
		display: flex;
		flex-flow: column;	
	}
	.txtup{
		text-align: center;
		width: 40upx;
		height: 40upx;
		color: #fff;
		background-color: #BD6EB9;
		border-radius: 50%;
	}
	.txtend{
		color: #BD6EB9;
	}
</style>
