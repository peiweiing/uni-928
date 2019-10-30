<template>
	<view class="content">
		<view class="tongzhi">
			<view class="uni-padding-wrap">
				<view class="uni-swiper-msg">
					<view class="uni-swiper-msg-icon">
						<!-- 	<image src="https://img-cdn-qiniu.dcloud.net.cn/uniapp/images/uni@2x.png" mode="widthFix"></image> -->
					</view>
					<swiper vertical="true" autoplay="true" circular="true" interval="3000">
						<swiper-item v-for="(item, index) in msg" :key="index" class="swiper-item">
							<navigator>{{item}}</navigator>
						</swiper-item>
					</swiper>
				</view>
			</view>

		</view>

		<view class="people">
			<view class="people-top">
				<view class="people-left">
					<text>本周邀请</text>
					<text>男0</text>
					<text>女0</text>
				</view>
				<view class="people-right">
					<text>新邀请人分成</text>
					<text>男30%</text>
					<text>女8%</text>
				</view>
			</view>
			<view class="people-bottom">
				<text>本周邀请男生身上达到1-20（邀请奖励）30%</text>
				<text>本周邀请男生身上达到1-20（邀请奖励）30%</text>
			</view>

		</view>
		<view class="footer-tit">
			<view class="index-tit">
				<view v-for="(title,index) in twoTitle" @click="num=index" :class="{active:num==index}">{{title}}</view>
			</view>
			<view v-show="num==0">
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>

				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>

				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>

				</view>
			</view>
			<view v-show="num==1">
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>

				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>

				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>

				</view>
			</view>
			<view v-show="num==2">
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>
				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">

					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>
				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-img"> <image src="../../static/私密.png" mode=""></image></text>
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">0</text>
				</view>
			</view>
		</view>
		
	</view>
</template>

<script>

	export default {
	
		data() {
			return {
				twoTitle: ['奖励排行', '人数排行', '我邀请的人'],
				num: 0,
				msg: [
					'uni-app行业峰会频频亮相，开发者反响热烈',
					'DCloud完成B2轮融资，uni-app震撼发布',
					'36氪热文榜推荐、CSDN公号推荐 DCloud CEO文章'
				]
			}
		},
		methods: {

		}
	}
</script>

<style lang="scss">
	.uni-swiper-msg uni-swiper {
		width: 100%;
		height: 25px;
		background-color: #fd8cba;
	}

	.uni-swiper-msg-icon image {
		width: 30upx;
		height: 30upx;
	}

	.swiper-item {
		font-size: 28upx;
	}

	.people-top {
		display: flex;
		justify-content: space-between;
		background-color: #fe8b90;
	}

	.people-left,
	.people-right {
		width: 50%;
		display: flex;
		flex-direction: column;
		justify-content: center;
		margin: 40upx 0;

	}

	.people-left {
		border-right: 2upx solid #FFFFFF;
	}

	.people-left text {
		padding-bottom: 20upx;
	}

	.people-right text {
		padding-bottom: 20upx;
	}

	.people-left,
	.people-right text {
		text-align: center;
		color: #FFFFFF;
		font-size: 28upx;
	}

	.people-bottom {
		display: flex;
		flex-direction: column;
		height: 120upx;
		padding-top: 60upx;
		background-color: #fdb698;
	}

	.people-bottom text {

		font-size: 24upx;
		color: #FFFFFF;
		text-align: center;
	}

	.index-tit {
		width: 100%;
		display: flex;
		border-top: 1px solid #E5E5E5;
		background: #FFFFFF;
	}

	.index-tit>view {
		width: 50%;
		height: 98%;
		font-size: 14px;
		font-family: "pingfang";
		padding: 10px 0;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.active {
		color: #000;
		font-weight: 600;
		border-bottom: 4upx solid #f7357c;
		width: 80%;
		justify-content: center;
	}

	.index-one {
		width: 100%;
		height: 200upx;
		background-color: #EBEFF3;
		display: flex;
		justify-content: center;
		align-items: center;
	}

	.one-content .rightOne {
		font-size: 48upx;
		color: #000;
	}

	.one-content .rightTwo {
		font-size: 20upx;
		color: #ebc6ea;
	}

	.list-cell {
		display: flex;
		align-items: baseline;
		padding: 20upx 30upx;
		line-height: 60upx;
		position: relative;
		background: #fff;
		justify-content: center;
		border-bottom: 1px solid #ebedf1;

		.cell-tit {
			flex: 1;
			font-size: 28upx + 2upx;
			color: #303133;
			margin-right: 10upx;
		}
		.cell-img{
			background-color: #C0C0C0;
			border-radius: 50%;
			width: 80upx;
			height: 72upx;
			margin-right: 20upx;
		}
		.cell-img image{
			vertical-align: middle;
			margin-right: 20upx;
			width: 100%;
		   height: 72upx;
			
		}

		switch {
			transform: translateX(16upx) scale(.84);
		}
	}
</style>
