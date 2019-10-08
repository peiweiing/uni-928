<template>
	<view>
		<view class="imgcs">
			<image v-for="(v,i) in arr" :key="i" :src="v.src" mode=""></image>
		</view>
	</view>
</template>

<script>
	export default {
		data() {
			return {
				arr: [
					{src:'../../static/1.jpg'},
					{src:'../../static/2.jpg'},
					{src:'../../static/3.jpg'},
					{src:'../../static/4.jpg'},
					{src:'../../static/5.jpg'},
					{src:'../../static/6.jpg'},
					{src:'../../static/7.jpg'},
					{src:'../../static/8.jpg'},
					{src:'../../static/9.jpg'},
					{src:'../../static/10.jpg'},
				],
			};
		}
	}
</script>

<style>
	.imgcs{
		display: flex;
		flex-flow: wrap;
		justify-content:space-between;
	}
	image{
		width: 49%;
		height:600upx;
		margin-bottom: 10upx;
	}
</style>
