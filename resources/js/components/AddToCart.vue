<template>

</template>
<script>
	import Tooltip from 'tooltip.js';
	export default{
		props: ['article_id'],
		data(){
			return {
				tooltip: null,
				quantity: 1
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
				let quantity = $(".js-result").val();
				axios.post(
						'/articles/'+this.article_id+'/addToActiveOrder', 
						{_token:$('meta[name="csrf-token"]').attr('content'), quantity: quantity})
				.then((response) => {
						Event.$emit('itemAdded', response.data);
						this.message();
					 }).catch((error) => {
					 	if(error.response.data.message == 'Unauthenticated.'){
							Event.$emit('loginRequired');
					 	}else{
					 		location.reload();
					 	}
					 });
			},
		},

		mounted() {
			let elem = this.$el
			if(this.$el.dataset.tooltip !==undefined){                  //checking if there are any data attributes, 
				this.tooltip = new Tooltip(elem, {          //should change just for tooltip. But it throws error
					placement: elem.dataset.tooltipPlacement,//cannot read property length of undefined
					title: elem.dataset.tooltip
				});
			}
		}
	}
</script>