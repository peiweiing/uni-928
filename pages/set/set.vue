<template>
	<view class="content">
		<view class="list-cell m-t" @click="navTo('个人资料')" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">新消息通知</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell " @click="navTo('收货地址')" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">黑名单</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" @click="navTo('实名认证')" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">清除聊天记录</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" @click="navTo('实名认证')" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">清除缓存</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" @click="navTo('实名认证')" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">常见问题</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" @click="navTo('实名认证')" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">检查版本更新</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" @click="navTo('实名认证')" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">关于同城美女约泡</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell log-out-btn" @click="toLogout">
				<text class="cell-tit">退出登录</text>
			</view>
		</view>
</template>

<script>
	export default {
		data () {
		return {}
		}
	}
</script>

<style lang="scss">
page{
		background: #ebedf1;
	}
	.list-cell{
		display:flex;
		align-items:baseline;
		padding: 20upx 30upx;
		line-height:60upx;
		position:relative;
		background: #fff;
		justify-content: center;
		border-bottom:1px solid #ebedf1;
		&.log-out-btn{
			margin: 40upx 10upx;
			background-color:#b2b1b6;
			border-radius: 10upx;
			.cell-tit{
				color: #fa436a;
				text-align: center;
				margin-right: 0;
			
			}
		}
		&.cell-hover{
			background:#fafafa;
		}
		&.b-b:after{
			left: 30upx;
		}
		&.m-t{
			margin-top: 16upx; 
		}
		.cell-more{
			align-self: baseline;
			font-size:32upx;
			color:#909399;
			margin-left:10upx;
		}
		.cell-tit{
			flex: 1;
			font-size: 28upx + 2upx;
			color: #303133;
			margin-right:10upx;
		}
		.cell-tip{
			font-size: 28upx;
			color: #909399;
		}
		switch{
			transform: translateX(16upx) scale(.84);
		}
	}
</style>
