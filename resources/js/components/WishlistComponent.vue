<template>
	<a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
	:data-tooltip="tooltipTitle()"
	data-tooltip-placement="right"

	>
	<i :class="'g-font-size-18 addToWishlist fa ' + heartColor(this.isWished)" :data-article="this.articleId" @click="heartClicked"></i>
</a>
</template>

<script>
	import Tooltip from 'tooltip.js';
	export default {
		props: ['state', 'articleId'],

		data() {
			return {
				isWished: this.state,
				tooltip: null,
				user: {},
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
				axios.post('/wishlist/'+this.articleId, {_token:$('meta[name="csrf-token"]').attr('content')}).then((response) => {
						this.isWished = this.isWished ? false : true;
						this.wishlistMessage();
						this.tooltip.updateTitleContent(this.tooltipTitle());
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