<template>
	<view>
		
		<view class="header">
			<view class="uni-up">
				<view class="uni-cs" @click="fse()">
					<image class="imgcs" src="../../static/搜索白.png" mode=""></image>
				</view>
				<uni-segmented-control :current="current" :values="items" :style-type="button" @clickItem="onClickItem" />
				<view class="uni-cs" @click="fun()">
					榜单
				</view>
			</view>
		</view>
			
			
			<view>
				<view v-show="current === 0">
					<Iswiper></Iswiper>
					<Iindexone class='Iindex'></Iindexone>
				</view>
				<view v-show="current === 1">
					<Iswiper></Iswiper>
					<Iindextwo class='Iindex'></Iindextwo>
				</view>
				<view v-show="current === 2">
					<Iswiper></Iswiper>
					<Iindexthree class='Iindex'></Iindexthree>
				</view>
			</view>
		
	</view>
</template>

<script>
	import Iswiper from '@/components/iswiper/iswiper.vue'
	import Iindexone from '@/components/iindex/iindexone.vue'
	import Iindextwo from '@/components/iindex/iindextwo.vue'
	import Iindexthree from '@/components/iindex/iindexthree.vue'
	import uniSegmentedControl from '@/components/uni-segmented-control/uni-segmented-control.vue'
	export default {
		components: {
			Iswiper,
			Iindexone,
			Iindextwo,
			Iindexthree,
			uniSegmentedControl
		},
		data() {
			return {
				current: 0,
				items: [
					'活跃',
					'新人',
					'附近'
				]
			}
		},
		onLoad() {

		},
		methods: {
			
			fun(){
				uni.navigateTo({
					// url: '/components/iindex/iindextwo'
					url: '/pages/index/ilist'
				});
			},
			fse(){
				uni.navigateTo({
					// url: '/components/iindex/iindextwo'
					url: '/pages/index/isearch'
				});
			},
			onClickItem(index) {
				if (this.current !== index) {
					this.current = index
				}
			}
		}
	}
</script>

<style>
	.header{
		z-index: 99;
		background-color: #FFF;
		position: sticky;
		top: 0;
		left: 0;
	}
	.Iindex{
		display: flex;
		flex-flow: wrap;
		justify-content: space-between;
	}
	.uni-up{
		color: #FFFFFF;
		display: flex;
		justify-content: space-between;
		background: linear-gradient(to right, #D096C3 0%,#ff9569 80%, #e92758 100%);
	}
	.uni-cs{
		font-size: 30upx;
		display: flex;
		justify-content: space-between;
		align-items: center;
		color: #fff;
	}
	.uni-cs .imgcs{
		width: 50upx;
		height: 50upx;
		color: #FFFFFF;
	}
</style>
