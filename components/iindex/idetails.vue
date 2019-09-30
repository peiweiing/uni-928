<template>
	<view>
		
		<view class="box">
			<view class="swiper">
				<swiper class="swipercs" :indicator-dots="true" :autoplay="true" :interval="3000" :duration="1000">
					<swiper-item v-for="(v,i) in arr" :key="i">
						<image :src="v.src"></image>
					</swiper-item>
				</swiper>
				<view class="kuang">
					<view class="close">
						<text @click="fun()"><</text>
						<text class="tanchu">···</text>
					</view>
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
					<image src="../../static/i视频.png" mode=""></image>
					<text>500聊币/分钟</text>
				</view>
				<view class="right">
					<image src="../../static/i麦.png" mode=""></image>
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
				<text>{{title}}</text>
			</view>
			<view class="modulefour">
				<h4>送出的礼物</h4>
				<text>TA还没有送出礼物哦</text>
			</view>
		
		<view class="zhezhao">
			<view class="tankuang">
				<view class="tanup" @click.stop>
					<text class="tantxt">加入黑名单</text>
					<text>举报</text>
				</view>
				<view class="tanend">
					<text class="quxiao">取消</text>
				</view>
			</view>
		</view>
		
		<footer>
			<view class="foot">
				<view class="sixin">
					<image src="../../static/i私密.png" mode=""></image>
					<text>私信</text>
				</view>
				<view class="dashang">
					<image src="../../static/i打赏.png" mode=""></image>
					<text>打赏</text>
				</view>
				<view class="shipin">
					<image src="../../static/i视频.png" mode=""></image>
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
				title: '',
				arr: [
					{src:'../../static/u2.jpg'},
					{src:'../../static/u4.jpg'},
					{src:'../../static/u5.jpg'},
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
					{tab:'情感'},
					{tab:'电影'},
					{tab:'电影'},
					{tab:'婚史'},
					{tab:'婚史'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
					{tab:'恋爱'},
				]
			};
		},
		onLoad(v) {
			this.title = v.title || '';
			console.log(66666);
		},
		methods: {
			
			fun(){
				uni.switchTab({
					url: '/pages/index/index'
				});
			}
		},
		mounted (){
			var zhezhao=document.getElementsByClassName('zhezhao')[0];
			var tanchu=document.getElementsByClassName('tanchu')[0];
			var tankuang=document.getElementsByClassName('tankuang')[0];
			var quxiao=document.getElementsByClassName('quxiao')[0];
				   
				tanchu.onclick =function()  { 
					zhezhao.style.cssText=" display:flex;flex-flow:column-reverse;bottom:0"
				};
				quxiao.onclick=function(){
					zhezhao.style.display="none";
				}
				zhezhao.onclick = function()  {
					zhezhao.style.display="none";
				}
			}
	
	}
</script>
<style>
	.box{
		background-color:#ebeff3;
	}
	.swipercs{
		height: 660upx;
	}
	.swiper{
		position: relative;
	}
	.swiper image{
		width: 100%;
		height: 660upx;
	}
	.zhezhao{
		z-index: 99;
		width: 100%;
		height: 100%;
		position: fixed;
		background-color: rgba(105,105,105,0.5);
		bottom: 0;
		display: flex;
		flex-flow: column-reverse;
		display: none;
	}
	.tankuang{
		width:100%;
		height: 300upx;
		background-color: #FFFFFF;
		text-align: center;
	}
	.tankuang .tanup{
		display: flex;
		flex-flow: column;
		border-bottom: 3px solid #a9a9a9;
	}
	.tankuang .tantxt{
		border-bottom: 1px solid #A9A9A9;
	}
	.tankuang text{
		padding: 20upx;
	}
	.tankuang .tanend{
		display: flex;
		justify-content: center;
		align-items: center;
	}
	.kuang{
		width: 100%;
		position: absolute;
		left: 0;
		bottom: 0;
	}
	.kuang .close{
		position: relative;
		bottom: 400upx;
	}
	.kuang .close text{
		text-align: center;
		width: 50upx;
		height:50upx;
		border-radius: 50%;
		background-color: rgba(105,105,105,0.9);
	}
	.kuang .anniu{
		position: relative;
		bottom: 40upx;
		font-size:0.8rem ;
	}
	.kuang .close,
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
	.moduleone,.moduletwo,.modulethree,.modulefour,.foot{
		margin-bottom:20upx ;
		background-color: #fff;
	}
	.moduleone h4,.moduletwo h4,.modulethree h4,.modulefour h4{
		margin-left: 20upx;
	}
	.moduleone{
		display: flex;
		justify-content: center;
		padding: 20upx;
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
		border-radius: 50%;
	}
	.moduleone text{
		font-size: 0.8rem;
	}
	.moduletwo .block{
		width: 23%;
		display:flex;
		justify-content: center;
		align-items: center;
	}
	.moduleone .left image{
		background-color: #bd6eb9;
	}
	.moduleone .right image{
		background-color: #b769fc;
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
		font-size: 0.8rem;
		display: flex;
		justify-content:center;
		align-items: center;
		padding: 10upx;
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
		color: #fff;
		background: linear-gradient(to right, #D096C3 0%,#ff9569 80%, #e92758 100%);
	}
	footer .sixin{
		color: #ad68f1;
	}
	footer .dashang{
		color: #ed78b7;
	}
</style>
