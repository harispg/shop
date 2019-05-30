<template>
	<a ref="addToCart" class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
             data-tooltip="Add to cart"
             data-tooltip-placement="left"
             @click="addToCart()">
            <i class="addToCart icon-finance-100 u-line-icon-pro" ></i>
          </a>
</template>
<script>
	import Tooltip from 'tooltip.js';
	export default{
		props: ['articleId'],
		data(){
			return {
				tooltip: null,
			}
		},

		methods: {

			message(){
				swal.fire({
					type: 'success',
					title: 'Added to cart',
					showConfirmButton: false,
					timer: 700
				}); 
			},

			addToCart(){
				axios.post(
						'/articles/'+this.articleId+'/addToActiveOrder', 
						{_token:$('meta[name="csrf-token"]').attr('content')})
				.then((response) => {
						Event.$emit('itemAdded', response.data);
						this.message();
					 }).catch((error) => {
					 	if(error.response.data.message == 'Unauthenticated.'){
							Event.$emit('loginRequired');
					 	}
					 });
			},
		},

		mounted() {
			let elem = this.$el
			this.tooltip = new Tooltip(elem, {
				placement: elem.dataset.tooltipPlacement,
				title: elem.dataset.tooltip
			});
		}
	}
</script>