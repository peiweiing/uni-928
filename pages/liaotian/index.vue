<template>
	<view>
		<view>
			<Liaotian></Liaotian>
		</view>
	</view>
</template>

<script>
	import Liaotian from '@/components/liaotian/liaotian.vue'
	export default {
		components: {
			Liaotian
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
	/* {
		display: flex;
		flex-flow: wrap;
		justify-content: space-between;
	} */
</style>
