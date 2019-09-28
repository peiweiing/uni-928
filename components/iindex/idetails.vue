<template>
	<view>
		
		<view class="box">
			<view class="swiper">
				<swiper :indicator-dots="true" :autoplay="true" :interval="3000" :duration="1000">
					<swiper-item v-for="(v,i) in arr" :key="i">
						<image :src="v.src"></image>
					</swiper-item>
				</swiper>
				<view class="kuang">
					<view class="anniu">
						<view class="left">
							<text>空闲</text>
						</view>
						<view class="right">
							<text>+好友</text>
						</view>
					</view>
					<view class="bottom" v-for="(v,i) in brr" :key="i">
						<text>{{v.txt}}</text>
						<text>{{v.age}}</text>
						<text>{{v.dis}}</text>
						<text style="margin-left: -40upx;margin-right: 40upx;">魅力值{{v.bsi}}</text>
					</view>
				</view>
			</view>
			<view class="moduleone">
				<view class="left">
					<image src="../../static/收货地址.png" mode=""></image>
					<text>500聊币/分钟</text>
				</view>
				<view class="right">
					<image src="../../static/收货地址.png" mode=""></image>
					<text>500聊币/分钟</text>
				</view>
			</view>
			<view class="moduletwo">
				<h4>聊天话题</h4>
				<block class="block" v-for="(v,i) in tab" :key="i">
					<text>{{v.tab}}</text>	
				</block>
			</view>
			<view class="modulethree">
				<h4>守护的礼物</h4>
				<text>TA还没有收到礼物哦</text>
			</view>
			<view class="modulefour">
				<h4>送出的礼物</h4>
				<text>TA还没有送出礼物哦</text>
			</view>
		<footer>
			<view class="foot">
				<view class="sixin">
					<image src="../../static/收货地址.png" mode=""></image>
					<text>私信</text>
				</view>
				<view class="dashang">
					<image src="../../static/收货地址.png" mode=""></image>
					<text>打赏</text>
				</view>
				<view class="shipin">
					<image src="../../static/收货地址.png" mode=""></image>
					<text>看看TA</text>
				</view>
			</view>
		</footer>
		</view>
	
	</view>
</template>
<script>
	export default {
		data() {
			return {
				arr: [
					{src:'../../static/1.jpg'},
					{src:'../../static/2.jpg'},
					{src:'../../static/3.jpg'},
				],
				brr:[
					{txt:"asd",age:'20岁',dis:"20km",bsi:"4.00"},
					// {txt:"bsd",age:'18岁',dis:"15km",bsi:"2.00"},
					// {txt:"csd",age:'22岁',dis:"30km",bsi:"0.50"},
					// {txt:"dsd",age:'26岁',dis:"18km",bsi:"0.10"},
					// {txt:"esd",age:'24岁',dis:"9km",bsi:"0.20"},
				],
				tab:[
					{tab:'情感'},
					{tab:'电影'},
					{tab:'婚史'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
				]
			};
		}
	}
</script>
<style>
	.box{
		background-color:#ebeff3;
	}
	.swiper{
		position: relative;
	}
	.swiper image{
		width: 100%;
	}
	.kuang{
		width: 100%;
		position: absolute;
		left: 0;
		bottom: 0;
	}
	.kuang .anniu{
		font-size:0.8rem ;
	}
	.kuang .anniu,
	.kuang .bottom{
		display: flex;
		justify-content: space-between;
		align-items: center;
		padding: 10upx 20upx;
	}
	.kuang .anniu .left,
	.kuang .anniu .right{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.kuang .anniu .left{
		width: 110upx;
		height: 60upx;
		border-radius: 60upx ;
		background-color: #90d156;
	}
	.kuang .anniu .right{
		width: 130upx;
		height: 60upx;
		border-radius: 60upx ;
		background-color: #ccc;
	}
	.kuang .bottom{
		width: 100%;
		height: 60upx;
		background-color:rgba(105,105,105,0.5);
	}
	.moduleone,.moduletwo,.modulethree,.modulefour{
		margin-bottom:20upx ;
		background-color: #fff;
	}
	.moduleone h4,.moduletwo h4,.modulethree h4,.modulefour h4{
		margin-left: 20upx;
	}
	.moduleone{
		display: flex;
		justify-content: center;
	}
	.moduleone .left,
	.moduleone .right{
		width: 50%;
		display: flex;
		flex-flow: column;
		align-items: center;
	}
	.moduleone image{
		width: 60upx;
		height: 60upx;
	}
	.moduleone text{
		font-size: 0.8rem;
	}
	.moduletwo .block{
		display:flex;
		justify-content: center;
		align-items: center;
	}
	.moduletwo text{
		display: inline-block;
		text-align: center;
		font-size: 0.9rem;
		margin: 30upx 0 30upx 40upx;
		width:120upx ;
		height:50upx ;
		border: 1px solid #d096c3;
		border-radius: 40upx;
	}
	.modulethree text,
	.modulefour text{
		display: flex;
		margin: 30upx 0 20upx 40upx;
		padding: 0 0 30upx 0;
		font-size: 0.6rem;
	}
	footer{
		width: 100%;
		background-color:#EBEFF3 ;
		position: sticky;
		left: 0;
		bottom:0;
	}
	footer .foot{
		display: flex;
		justify-content:center;
		align-items: center;
	}
	footer image{
		width: 60upx;
		height: 60upx;
	}
	footer .sixin,
	footer .dashang{
		display: flex;
		flex-flow: column;
		width: 25%;
	}
	footer .shipin{
		display: flex;
		justify-content: center;
		align-items: center;
		border-radius: 30upx;
		height: 80upx;
		width: 220upx;
		background-color:#D096C3;
	}
</style>
