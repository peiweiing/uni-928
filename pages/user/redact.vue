<template>
	<view>
		<view class="box">
			<view class="img">
				<image @click="tanchu" src="../../static/miss.png" mode=""></image>
			</view>
			<view class="input">
				<button type="primary" value="">昵称<input type="text" value=""/><button type="primary">保存</button></button>
			</view>
			<view class="module">
				<text>相册</text>
				<image @click="tianjia" src="../../static/切换.png" mode=""></image>
			</view>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				
			};
		},
		methods:{
			tanchu(){
				uni.showActionSheet({
					itemList: ['拍照', '从相册中选取'],
					success: function (res) {
						console.log('选中了第' + (res.tapIndex + 1) + '个按钮');
						if (res.tapIndex==0) {
							uni.chooseImage({
								count: 6, //默认9
								sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有
								sourceType: ['camera'], //从拍照选择
								success: function (res) {
									console.log(JSON.stringify(res.tempFilePaths));
								}
							});
						} else if (res.tapIndex==1) {
							uni.chooseImage({
								count: 6, //默认9
								sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有
								sourceType: ['album'], //从相册选择
								success: function (res) {
									console.log(JSON.stringify(res.tempFilePaths));
								}
							});
						}
					},
					fail: function (res) {
						console.log(res.errMsg);
					}
				});
			},
			tianjia(){
				uni.chooseImage({
					count: 6, //默认9
					sizeType: ['original', 'compressed'], //可以指定是原图还是压缩图，默认二者都有
					sourceType: ['album'], //从相册选择
					success: function (res) {
						console.log(JSON.stringify(res.tempFilePaths));
					}
				});
			}
		}
	}
</script>

<style>
	.img{
		text-align: center;
		padding: 30upx 0;
	}
	.img image{
		border-radius: 50%;
		width: 160upx;
		height: 160upx;
	}
	.input{
		margin: 20upx 0;
	}
	.input button{
		display: flex;
		background-color: #A9A9A9;
	}
	.input button input{
		padding: 10upx 20upx;
		text-align: left;
	}
	.module{
		margin-top:10%;
		display: flex;
		flex-flow: column;
		padding: 10upx 20upx ;
	}
	.module image{
		margin-top: 5%;
		border-radius: 20upx;
		width: 260upx;
		height: 260upx;
		padding: 20upx;
		background-color: #A9A9A9;
	}
</style>
