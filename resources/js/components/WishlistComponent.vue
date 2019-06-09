<template>
	
</template>

<script>
	import Tooltip from 'tooltip.js';
	export default {
		props: ['state', 'article_id'],

		watch: {
			state: function(newVal, oldVal) {
				this.isWished = newVal;
			}
		},

		data() {
			return {
				isWished: '',
				tooltip: null,
			}
		},

		methods: {
			heartColor(data) {
				if(data){
					return 'fa-heart text-danger';
				}else{
					return 'fa-heart-o';
				}
			},

			tooltipTitle(){
				return this.isWished ? 'Remove from wishlist' : 'Add to wishlist';
			},


			wishlistMessage(){
				this.isWished ? 
				swal.fire({
					type: 'success',
					title: 'Added to wishlist',
					showConfirmButton: false,
					timer: 700
				}) : 
				swal.fire({
					type: 'success',
					title: 'Removed from wishlist',
					showConfirmButton: false,
					timer: 700
				})
			},
			//When logging here without reloading the page you are left with old csrf token,
			//that is why we added _token data because in loginComponent we fetch new csrf and set it to the page
			//but axios uses the old token set up in resources/js/bootstrap.js file.
			heartClicked(){
				axios.post('/wishlist/'+this.article_id, {_token:$('meta[name="csrf-token"]').attr('content')}).then((response) => {
						this.isWished = this.isWished ? false : true;
						this.wishlistMessage();
						this.tooltip.updateTitleContent(this.tooltipTitle());
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
			let _this = this;
			this.isWished = this.state;
			let elem = this.$el
			this.tooltip = new Tooltip(elem, {
				placement: elem.dataset.tooltipPlacement,
				title: elem.dataset.tooltip
			});
		}

	}
</script>