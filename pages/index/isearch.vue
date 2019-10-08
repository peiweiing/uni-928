<template>
	<view class="box">
		<view class="viewcs">
			<view class="txtcs">
				<text>搜索指定内容</text>
				<view class="butcs">
					<button>聊号</button>
					<button>昵称</button>
				</view>
			</view>
		</view>
	</view>
</template>

<script>
</script>

<style>
	.box{
		position: relative;
	}
	.viewcs{
		width: 100%;
		position: absolute;
		left: 0;
		top: 150upx;
	}
	.txtcs{
		display: flex;
		flex-flow: column;
	}
	.txtcs text{
		text-align: center;
	}
	.butcs{
		margin-top: 100upx;
		display: flex;
	}
</style>
