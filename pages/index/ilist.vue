<template>
	<view>
		
		<view class="header">
			<view class="uni-up">
				<view class="uni-cs" @click="fun()">
					<
				</view>
				<uni-segmented-control :current="current" :values="items" :style-type="button" @clickItem="onClickItem" />
				<view class="uni-cs">
					
				</view>
			</view>
		</view>
		
		<view>
			<view v-show="current === 0">
				<Ilistone></Ilistone>
			</view>
			<view v-show="current === 1">
				<Ilisttwo></Ilisttwo>
			</view>
			<view v-show="current === 2">
				<Ilistthree></Ilistthree>
			</view>
		</view>
		
	</view>
</template>

<script>
	import Ilistone from '@/components/iindex/ilistone.vue'
	import Ilisttwo from '@/components/iindex/ilisttwo.vue'
	import Ilistthree from '@/components/iindex/ilistthree.vue'
	import uniSegmentedControl from '@/components/uni-segmented-control/uni-segmented-control.vue'
	export default {
		components: {
			Ilistone,
			Ilisttwo,
			Ilistthree,
			uniSegmentedControl
		},
		data() {
			return {
				current: 0,
				items: [
					'总榜',
					'月榜',
					'日榜'
				]
			}
		},
		onLoad() {

		},
		methods: {
			
			fun(){
				uni.switchTab({
					url: '/pages/index/index'
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
		color:#FFFFFF;
		display: flex;
		justify-content: space-between;
		background: linear-gradient(to right, #D096C3 0%,#ff9569 80%, #e92758 100%);
	}
	.uni-cs{
		width: 10%;
		font-size: 50upx;
		display: flex;
		align-items: center;
		justify-content: center;
		color: #fff;
	}
</style>
