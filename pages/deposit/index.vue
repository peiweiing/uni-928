<template>
	<view class="content">
		<view class="uni-flex uni-row">
			<view class="flex-item uni-bg-red">
				<text>收益聊币</text>
				<text>00.00</text>
			</view>
			<view class="flex-item uni-bg-green">
				<text>可提现金额（元）</text>
				<text>0.00</text>
			</view>
		</view>
		<view class="yt-list-cell desc-cell">
			<text class="cell-tit clamp">聊币</text>
			<input class="desc" type="text" v-model="desc" placeholder="请选择提现数量" placeholder-class="placeholder" />
		</view>
		<view class="yt-list-cell desc-cell">
			<text class="cell-tit clamp">银行卡号</text>
			<input class="desc" type="text" v-model="card" placeholder="未绑定" placeholder-class="placeholder" />
		</view>
		<button class="btn btn-card">绑定银行卡号提现</button>
		 <view class="btn money-tixian">
		 	<text class="info-tixian">提现记录</text>
		 </view>
		<view class="xiaoxi-inform">
			
			<view class="uni-padding-wrap uni-common-mt">
				<view class="inform-head"> 提现通知 </view>
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
</template>

<script>
	export default {
		data() {
			return {
				desc: '',
				card: '',
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
					icon: "none",
					title: "纵向滚动 scrollTop 值已被修改为 0"
				})
			}
		}
	}
</script>

<style lang="scss">
	page {
		background: #ebedf1;
	}
//滚动start
	.scroll-Y {
		height: 401upx;
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

	.inform-head {
		height: 40upx;
		line-height: 40upx;
		margin: 20upx auto;
		padding-left: 10upx;
		font-size: 26upx;
		display: block;
	}

	.xiaoxi-inform text {
		display: block;
		color: #cbcbcb;
		background-color: #FFFFFF;
		padding-left: 20upx;
		font-size: 30upx;
	}
//滚动end

	.uni-flex {
		background-color: #FFF;
		display: flex;
		justify-content: center;
		align-items: center;

		.flex-item {
			height: 320upx;
			width: 50%;
			line-height: 320upx;
			text-align: center;
			font-size: 30upx;
		}
	}

	.yt-list-cell {
		display: flex;
		align-items: center;
		padding: 10upx 30upx 10upx 40upx;
		line-height: 70upx;
		background-color: #FFFFFF;
		margin-top: 40upx;
		position: relative;

		&.cell-hover {
			background: #fafafa;
		}

		&.b-b:after {
			left: 30upx;
		}

		.cell-icon {
			height: 32upx;
			width: 32upx;
			font-size: 22upx;
			color: #fff;
			text-align: center;
			line-height: 32upx;
			background: #f85e52;
			border-radius: 4upx;
			margin-right: 12upx;

			&.hb {
				background: #ffaa0e;
			}

			&.lpk {
				background: #3ab54a;
			}

		}

		.cell-more {
			align-self: center;
			font-size: 24upx;
			color: #909399;
			margin-left: 8upx;
			margin-right: -10upx;
		}

		.cell-tit {
			flex: 1;
			font-size: 26upx;
			color: #909399;
			margin-right: 10upx;
		}

		.cell-tip {
			font-size: 26upx;
			color: #303133;

			&.disabled {
				color: #909399;
			}

			&.active {
				color: #fa436a;
			}

			&.red {
				color: #fa436a;
			}
		}

		&.desc-cell {
			.cell-tit {
				max-width: 120upx;
			}
		}

		.desc {
			flex: 1;
			font-size: 28upx;
			color: #303133;
		}
	}

	.btn-card {
		margin: 40upx 20upx 0 20upx;
		border-radius: 40upx;
		background-color: #b9b9b9;
		color: #FFFFFF;
		font-size: 30upx;
	}
	.money-tixian:after{
		 content: "";
		 display: block;
		 height: 0;
		 clear:both;
		 visibility: hidden;
	}
	.info-tixian{
		float: right;
		color: #D096C3;
		display: block;
		font-size: 20upx;
		padding:20upx 10upx 10upx 0;
	}
</style>
