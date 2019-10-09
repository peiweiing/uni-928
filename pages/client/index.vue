<template>
	<view class="content">
		<view class="h-title">客户咨询</view>
		<view class="h-conent">
				<view class="conent-title">
					您好！为了给您提供方便的服务，期待你您的建议
				</view>
			<view class="uni-textarea">
				<textarea placeholder-style="font-size:10upx" placeholder="请将你给的宝贵哪的建议王铮的发送个哦我们,我们会让你只能听建议"/>
				</view>
				<button class="btn-jianyi">提交</button>
		</view>
	</view>
</template>

<script>
</script>

<style lang="scss">
	page{
		background-color: #fafafa;
	}
	.content {
		margin:20upx;
		.h-title {
			padding-bottom:20upx ;
			}
		}
		.conent-title{
			font-size: 30upx;
			padding:30upx 0 ;
			font-weight: 400;
		}
		.uni-textarea textarea{
			width: 95%;
			height: 200upx;
			border-radius: 20upx;
			background-color: #FFFFFF;
			box-shadow: 0 0 2px 2px #d6d6d6;
			padding: 20upx 20upx;
			font-size: 30upx;
			}
			.btn-jianyi{
				margin: 40upx 60upx 0 60upx ;
				color: #fff;
				background-color: #fc61ab;
			}
	
	
</style>
