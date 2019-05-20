<template>
	<div>
		<slot></slot>
	</div>
</template>
<script>
	import {throttle} from 'lodash';
	export default {
		mounted() {
			let el = this.$el;
			let elementOffsetTop = el.offsetTop;
			$(window).on('scroll', throttle(function(){
				el.classList[
					window.scrollY >= elementOffsetTop ? 'add' : 'remove'
				]('fixed-top');
			}, 200)
			);
		}
	}
</script>