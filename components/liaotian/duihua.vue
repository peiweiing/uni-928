<template>
	<view>
		<view class="box">
			<view class="nav">
				<text @click="fun()"><</text>
				<view>柳岩</view>
				<text class="tanchu">···</text>
			</view>
			<view class="main">
				<view class='mleft'>
					<image src="../../static/u2.jpg" mode=""></image>
					<text>帅哥你好</text>
				</view>
				<view class="mright" v-for="item in messagearr">
					<text>{{item}}</text>
					<image src="../../static/u1.jpg" mode=""></image>
				</view>
				
				<!-- <div id="container"> -->
				<!-- 	<div id="content">
						<div id="scroll">
							<ul id="save">你好</ul>
						</div>
					</div> -->
				<!-- <div id="edit">
						<img src="1.jpg" id="Img">
						<input type="text" name="" id="txt">
						<input type="button" name="" value="发送" id="btn">
					</div> -->
				<!-- </div> -->
			</view>
			<view class="foot">
				<view class="up">
					<a href='#d1'>
						<image @click="showl" src="../../static/表情.png" mode=""></image>
					</a>
					<input class="inp" type="text" v-model="message" value="" />
					<a href='#d2'>
						<image @click="showr" src="../../static/切换.png" mode=""></image>
					</a>
					<text class="fasong" @click="add()">发送</text>
				</view>
				<view class="end" v-if="show">
					<view id="d1" class="biaoqing">
						<image src="../../static/1.jpg" mode=""></image>
						<image src="../../static/2.jpg" mode=""></image>
						<image src="../../static/3.jpg" mode=""></image>
						<image src="../../static/4.jpg" mode=""></image>
						<image src="../../static/5.jpg" mode=""></image>
						<image src="../../static/6.jpg" mode=""></image>
						<image src="../../static/7.jpg" mode=""></image>
						<image src="../../static/8.jpg" mode=""></image>
						<image src="../../static/9.jpg" mode=""></image>
						<image src="../../static/10.jpg" mode=""></image>
						<image src="../../static/11.jpg" mode=""></image>
						<image src="../../static/12.jpg" mode=""></image>
						<image src="../../static/13.jpg" mode=""></image>
						<image src="../../static/12.jpg" mode=""></image>
						<image src="../../static/11.jpg" mode=""></image>
						<image src="../../static/10.jpg" mode=""></image>
						<image src="../../static/9.jpg" mode=""></image>
						<image src="../../static/8.jpg" mode=""></image>
					</view>
					<view id="d2" class="gengduo">
						<view class="footmain">
							<image src="../../static/d1.png" mode=""></image>
							<text>图片</text>
						</view>
						<view class="footmain">
							<image src="../../static/d2.png" mode=""></image>
							<text>语音聊天</text>
						</view>
						<view class="footmain">
							<image src="../../static/d3.png" mode=""></image>
							<text>视频聊天</text>
						</view>
						<view class="footmain">
							<image src="../../static/d4.png" mode=""></image>
							<text>文件</text>
						</view>
						<view class="footmain">
							<image src="../../static/d5.png" mode=""></image>
							<text>礼物</text>
						</view>
					</view>
				</view>
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
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				messagearr:[],
				message:'',
				// lshow:false,
				// rshow:false,
				show:false,
			}
		},
		methods: {
			fun(){
				uni.switchTab({
					url: '/pages/liaotian/index'
				});
			},
			add() {
                this.messagearr.push(this.message);
				this.message = '';
            },
			showl(){
				// this.lshow=!this.lshow;
				this.show=!this.show;
			},
			showr(){
				// this.rshow=!this.rshow;
				this.show=!this.show;
			}
			
		},
		
		mounted (){
		//点击弹窗显示隐藏
			var zhezhao=document.getElementsByClassName('zhezhao')[0];
			var tanchu=document.getElementsByClassName('tanchu')[0];
			var tankuang=document.getElementsByClassName('tankuang')[0];
			var quxiao=document.getElementsByClassName('quxiao')[0];
				tanchu.onclick =function()  { 
					zhezhao.style.cssText=" display:flex;flex-flow:column-reverse;bottom:0"
				};
				quxiao.onclick=function(){
					zhezhao.style.display="none";
				};
				zhezhao.onclick = function()  {
					zhezhao.style.display="none";
				};
				
		//切换隐藏显示
			// var qiehuan=document.getElementsByClassName('qiehuan')[0];
			// var end=document.getElementsByClassName('end')[0];
			// 	qiehuan.onclick = function()  {
			// 		end.style.display="flex";
			// 	};
			
		//获取元素
			// var inp=document.getElementsByClassName('inp')[0].value;//获取到输入框的内容
			// var fasong=document.getElementsByClassName('fasong')[0];//点击发送按钮
			// var main=document.getElementsByClassName('main')[0];//文本内容
			// var chuangjian=document.createElement('div')[0];//创建标签
			// chuangjian.innerHTML='<view class="mright"><text>nihao</text><image src="../../static/u1.jpg" mode=""></image></view>';
			// chuangjian.innerHTML=inp;
			// var chuang=document.createTextNode('nihao')
			// 	fasong.onclick=function(){
			// 		
			// 		main.push(inp);
			// 		
			// 	}
			
		}
		
	}
</script>

<style>
	.box{
		width: 100%;
		height: 100%;
	}
	.nav{
		color: #FFFFFF;
		padding: 20upx;
		display: flex;
		justify-content: space-between;
		align-items: center;
		background-color: #FA62A8;
	}
	.main{
		padding: 30upx;
	}
	.main image{
		border-radius: 50%;
		width: 50upx;
		height: 50upx;
	}
	.main text{
		padding: 10upx;
		color: #000000;
		background-color:rgba(236,236,236);
		border-radius: 25upx;
	}
	.main .mleft{
		margin: 30upx 0upx;
		display: flex;
		align-items: center;
	}
	.main .mright{
		margin: 30upx 0upx;
		display: flex;
		justify-content:flex-end;
		align-items: center;
	}
	.foot{
		position: absolute;
		left: 0;
		bottom: 0;
		width: 100%;
		display: flex;
		flex-flow: column;
		background-color: rgba(244,244,244);
	}
	.foot .up{
		padding: 10upx;
		display: flex;
		justify-content: space-between;
		align-items: center;
		flex-flow: wrap;
	}
	.foot input{
		margin: 20upx;
		flex: 1;
		border-bottom: 1px solid #75787D;
	}
	.foot .up image{
		padding: 20upx;
		color: #000000;
		width: 50upx;
		height: 50upx;
	}
	.foot .up text{
		color: #FFFFFF;
		border: 1px solid #007AFF;
		background-color: #007AFF;
	}
	.foot .end{
		height: 300upx;
		overflow: hidden;
	}
	.foot .end .biaoqing{
		height: 300upx;
		overflow: auto;
		display: flex;
		flex-flow: wrap;
		text-align: center;
		justify-content: space-between;
	}
	.foot .end .biaoqing image{
		border-radius: 50%;
		margin: 30upx;
		width: 50upx;
		height: 50upx;
	}
	.foot .end .gengduo{
		height: 300upx;
		overflow: auto;
		display: flex;
		flex-flow: wrap;
		/* display: none; */
	}
	.foot .end .footmain{
		display: flex;
		flex-flow: column;
		align-items: center;
		justify-content: space-between;
		width: 25%;
	}
	.foot .end .footmain image{
		width: 100upx;
		height: 80upx;
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
</style>
