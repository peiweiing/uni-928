<template>
	<view class="conenten">
		<view class="index">
			<view class="index-tit">
				<view v-for="(title,index) in indexTitle" @click="cur=index" :class="{active:cur==index}">{{title}}</view>
			</view>
			<view v-show="cur==0">
				<view class="index-one">
					<view class="one-content">
						<view class="one-top">
							<view class="one-content-right">
								<view class="rightOne">0.00</view>
								<view class="rightTwo">剩余聊币</view>
							</view>
						</view>

					</view>
				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>
					<text class="cell-more yticon icon-you"></text>
				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>
					<text class="cell-more yticon icon-you"></text>
				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>
					<text class="cell-more yticon icon-you"></text>
				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>
					<text class="cell-more yticon icon-you"></text>
				</view>
				<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
					<text class="cell-tit">500</text>
					<text class="cell-tit">送个情书</text>
					<text class="cell-tip">￥10</text>
					<text class="cell-more yticon icon-you"></text>
				</view>
				<view class="uni-padding-wrap uni-common-mt">
						<view class="message">
								<view class="message-tit">充值消息</view>
								<view class="message-content">
						<scroll-view :scroll-top="scrollTop" scroll-y="true" class="scroll-Y" @scrolltoupper="upper" @scrolltolower="lower"
						@scroll="scroll">
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						<text>[是谁留痕]充值20</text>
						</scroll-view>
					</view>
				</view>
				</view>

			</view>
			<view v-show="cur==1">
				<view class="index-one">
					<view class="one-content">
						<view class="one-top">
							<view class="one-content-right">
								<view class="rightone">清欢赋</view>
								<view class="righttwo">尚未开通VIP</view>
							</view>
						</view>

					</view>
				</view>

				<view class="index-tit">
					<view v-for="(title,index) in twoTitle" @click="num=index" :class="{active:num==index}">{{title}}</view>
				</view>

				<view v-show="num==0">
					<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
						<text class="cell-tit">500</text>
						<text class="cell-tit">送个情书</text>
						<text class="cell-tip">￥10</text>
						<text class="cell-more yticon icon-you"></text>
					</view>
					<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
						<text class="cell-tit">500</text>
						<text class="cell-tit">送个情书</text>
						<text class="cell-tip">￥10</text>
						<text class="cell-more yticon icon-you"></text>
					</view>
					<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
						<text class="cell-tit">500</text>
						<text class="cell-tit">送个情书</text>
						<text class="cell-tip">￥10</text>
						<text class="cell-more yticon icon-you"></text>
					</view>
					<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
						<text class="cell-tit">500</text>
						<text class="cell-tit">送个情书</text>
						<text class="cell-tip">￥10</text>
						<text class="cell-more yticon icon-you"></text>
					</view>
					<view class="uni-padding-wrap uni-common-mt">
							<view class="message">
									<view class="message-tit">VIP特权</view>
									<view class="message-content">
							<scroll-view :scroll-top="scrollTop" scroll-y="true" class="scroll-Y" @scrolltoupper="upper" @scrolltolower="lower"
							@scroll="scroll">
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							<text>[是谁留痕]充值20</text>
							</scroll-view>
						</view>
					</view>
					</view>
				</view>

			</view>
		</view>
		<view v-show="num==1">
			<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">500</text>
				<text class="cell-tit">送个情书</text>
				<text class="cell-tip">￥10</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">500</text>
				<text class="cell-tit">送个情书</text>
				<text class="cell-tip">￥10</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">500</text>
				<text class="cell-tit">送个情书</text>
				<text class="cell-tip">￥10</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
			<view class="list-cell" hover-class="cell-hover" :hover-stay-time="50">
				<text class="cell-tit">500</text>
				<text class="cell-tit">送个情书</text>
				<text class="cell-tip">￥10</text>
				<text class="cell-more yticon icon-you"></text>
			</view>
		<view class="uni-padding-wrap uni-common-mt">
				<view class="message">
						<view class="message-tit">超级VIP特权</view>
						<view class="message-content">
				<scroll-view :scroll-top="scrollTop" scroll-y="true" class="scroll-Y" @scrolltoupper="upper" @scrolltolower="lower"
				@scroll="scroll">
				<text>jisuhifsaf</text>
				<text>jisuhifsaf</text>
				<text>jisuhifsaf</text>
				<text>jisuhifsaf</text>
					<text>jisuhifsaf</text>
					<text>jisuhifsaf</text>
					<text>jisuhifsaf</text>
					<text>jisuhifsaf</text>
				
				</scroll-view>
			</view>
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
				indexTitle: ['充值聊币', '充值会员'],
				twoTitle: ['普通VIP', '超级VIP'],
				cur: 0, //默认选中第一个tab
				num: 0,
				scrollTop: 0,
				old: {
					scrollTop: 0
				}
			}
		},
		
			methods: {
				upper: function(e) {
				
				},
				lower: function(e) {
				
				},
				scroll: function(e) {
				
					this.old.scrollTop = e.detail.scrollTop
				},
				goTop: function(e) {
					// 解决view层不同步的问题
					this.scrollTop = this.old.scrollTop
					this.$nextTick(function() {
						this.scrollTop = 0
					});
					uni.showToast({
						icon:"none",
						title:"纵向滚动 scrollTop 值已被修改为 0"
					})
				}
		
		}

	}
</script>

<style lang="scss">
	.scroll-Y {
		height: 300upx;
	}
	
	.scroll-view_H {
		white-space: nowrap;
		width: 100%;
	}
	
	.scroll-view-item {
		height: 300upx;
		line-height: 300upx;
		text-align: center;
		font-size: 36upx;
	}
	
	.scroll-view-item_H {
		display: inline-block;
		width: 100%;
		height: 300upx;
		line-height: 300upx;
		text-align: center;
		font-size: 36upx;
	}
	page {
		background: #e6e5eb;
	}

	.index-tit {
		width: 100%;
		padding: 10px 0;
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
		color: #E01212;
		border-bottom: 3px solid #e01212;
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

		switch {
			transform: translateX(16upx) scale(.84);
		}
	}

	.message-tit {
		height: 40upx;
		line-height: 40upx;
		margin: 20upx auto;
		padding-left: 10upx;
		font-size: 26upx;
	}

	.message-content text {
		display: block;
		color: #cbcbcb;
		background-color: #FFFFFF;
		padding-left: 20upx;
		font-size: 30upx;
	}
</style>
