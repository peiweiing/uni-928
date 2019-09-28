<template>
	<view>
		<view class="uni-padding-wrap">
            <view class="page-section swiper">
                <view class="page-section-spacing">
                    <swiper class="swiper" :indicator-dots="indicatorDots" :autoplay="autoplay" :interval="interval" :duration="duration">
                        <swiper-item v-for="(v,i) in arr" :key="i">
							<image :src="v.src"></image>
                        </swiper-item>
                    </swiper>
                </view>
            </view>
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
				],
				indicatorDots: true,
				autoplay: true,
				interval: 2000,
				duration: 500
			};
		}
	}
</script>

<style>
	image{
		width: 100%;
		height: 100%;
	}

</style>
