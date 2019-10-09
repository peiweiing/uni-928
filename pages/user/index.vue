<template>
	<view class="container">
		<view></view>
		<view class="user-section">
			<image class="bg" src="/static/user-bg.jpg"></image>
			<view class="user-info-box">
				<view class="portrait-box">
					<image class="portrait" :src="'/static/missing-face.png'"></image>
				</view>
				<view class="userInfo">
					<view class="info-box">
						<text class="username">客人</text>
					</view>
					<view class="ziliao">
						<text class="user-Id">{{'ID号:110101'}}</text>
					</view>
				</view>
				<view class="edit"> 编辑资料</view>
				<view class="pay-money">
					<text>收益的聊币</text>
					<text>总理奥比</text>
					<text>购买的聊币</text>
				</view>
				<view class="money-num">
					<text>{{'0.00'}}</text>
					<text>{{'0.00'}}</text>
					<text>{{'0.00'}}</text>
				</view>
			</view>

		</view>
		<view class="money">
			<view class="deposit" @click="navTo('/pages/deposit/index')">提现</view>
			<view class="recharge"  @click="navTo('/pages/moneyCz/index')">充值</view>
		</view>
		<view class="history-section icon">
			<list-cell icon="icon-iconfontweixin" iconColor="#e07472" title="同城约泡" tips="查看VIP特权"></list-cell>
			<list-cell icon="icon-iconfontweixin" iconColor="#e07472" title="邀请赚钱" @eventClick="navTo('/pages/invite/invite')"></list-cell>
			<list-cell icon="icon-dizhi" iconColor="#5fcda2" title="收支明细" @eventClick="navTo('/pages/address/address')"></list-cell>
			<list-cell icon="icon-share" iconColor="#9789f7" title="情书"></list-cell>
			<list-cell icon="icon-pinglun-copy" iconColor="#ee883b" title="谁看过我"></list-cell>
			<list-cell icon="icon-shoucang_xuanzhongzhuangtai" iconColor="#54b4ef"></list-cell>
			<list-cell icon="icon-shezhi1" iconColor="#e07472" title="撩妹指南" @eventClick="navTo('/pages/set/set')"></list-cell>
			<list-cell icon="icon-shezhi1" iconColor="#e07472" title="客户咨询 " @eventClick="navTo('/pages/client/index')"></list-cell>
		</view>

	</view>
	</view>


</template>

<script>
	import listCell from '@/components/uuser/mix-list-cell.vue';
	import {
		mapState
	} from 'vuex';
	export default {
		components: {
			listCell
		},

		data() {
			return {

			}
		},
		// #ifndef MP
		onNavigationBarButtonTap(e) {
			this.navTo('/pages/set/set');
		},
		// #endif
		computed: {
			...mapState(['hasLogin', 'userInfo'])
		},
		methods: {
			navTo(url) {
				// if (!this.hasLogin) {
				// 	url = '/pages/set/set';
				// }
				uni.navigateTo({
					url
				})
			}
		}
	}
</script>

<style lang="scss">
	%flex-center {
		display: flex;
		flex-direction: center;
		justify-content: center;
		align-items: center;
	}

	%section {
		display: flex;
		justify-content: space-around;
		align-content: center;
		background: #fff;
		border-radius: 10upx;
	}

	.user-section {
		height: 378upx;
		padding: 100upx 30upx 0;
		position: relative;

		font-size: 30upx;

		.bg {
			position: absolute;
			left: 0;
			top: 0;
			width: 100%;
			filter: blur(1px);
			opacity: .7;
		}
	}

	.user-info-box {
		height: 180upx;
		display: flex;
		flex-direction: column;
		align-items: center;
		position: relative;
		z-index: 1;

		.userInfo {
			display: flex;
			justify-content: center;
		}

		.portrait {
			width: 130upx;
			height: 130upx;
			border: 5upx solid #fff;
			border-radius: 50%;
		}

		.username {
			margin-left: 20upx;
		}

		.pay-money {
			width: 100%;
			display: flex;
			justify-content: center;
		}

		.pay-money text {
			flex: 1;
		}

		.money-num {
			display: flex;
			width: 100%;
		}

		text {
			flex: 1;
			text-align: center;
		}
	}

	vip-card-box {
		display: flex;
		flex-direction: column;
		color: #f7d680;
		height: 240upx;
		background: linear-gradient(left, rgba(0, 0, 0, .7), rgba(0, 0, 0, .8));
		border-radius: 16upx 16upx 0 0;
		overflow: hidden;
		position: relative;
		padding: 20upx 24upx;

		.card-bg {
			position: absolute;
			top: 20upx;
			right: 0;
			width: 380upx;
			height: 260upx;
		}

		.b-btn {
			position: absolute;
			right: 20upx;
			top: 16upx;
			width: 132upx;
			height: 40upx;
			text-align: center;
			line-height: 40upx;
			font-size: 22upx;
			color: #36343c;
			border-radius: 20px;
			background: linear-gradient(left, #f9e6af, #ffd465);
			z-index: 1;
		}

		.tit {
			font-size: 28upx+2upx;
			color: #f7d680;
			margin-bottom: 28upx;

			.yticon {
				color: #f6e5a3;
				margin-right: 16upx;
			}
		}

		.e-b {
			font-size: 24upx;
			color: #d8cba9;
			margin-top: 10upx;
		}
	}

	.tj-sction {
		.tj-item {
			flex-direction: column;
			height: 140upx;
			font-size: 24upx;
			color: #75787d;
		}

		.num {
			font-size: 32upx;
			color: #303133;
			margin-bottom: 8upx;
		}
	}

	.history-section {
		padding: 0;
		margin-top: 0upx;
		background: #fff;
		border-radius: 10upx;

		.sec-header {
			display: flex;
			align-items: center;
			font-size: 28upx;
			color: #303133;
			line-height: 40upx;
			margin-left: 30upx;

			.yticon {
				font-size: 44upx;
				color: #5eba8f;
				margin-right: 16upx;
				line-height: 40upx;
			}
		}

		.h-list {
			white-space: nowrap;
			padding: 30upx 30upx 0;

			image {
				display: inline-block;
				width: 160upx;
				height: 160upx;
				margin-right: 20upx;
				border-radius: 10upx;
			}
		}
	}

	.money {
		display: flex;
		justify-content: center;
		color: #fff;

		.deposit {
			width: 50%;
			height: 102upx;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #ff77de;
			border-right: 1px solid #fc61ab;
		}

		.recharge {
			width: 50%;
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: #ff77de;
		}

	}
</style>
