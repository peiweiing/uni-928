<template>
	<view>
		<view>
			<Iswiper></Iswiper>
			<Iindex class='Iindex'></Iindex>
		</view>
	</view>
</template>

<script>
	import Iindex from '@/components/iindex/iindex.vue'
	import Iswiper from '@/components/iswiper/iswiper.vue'
	export default {
		components: {
			Iindex,
			Iswiper
		},
		data() {
			return {
				title: 'Hello'
			}
		},
		onLoad() {

		},
		methods: {

		}
	}
</script>

<style>
	.Iindex{
		display: flex;
		flex-flow: wrap;
		justify-content: space-between;
	}
</style>
