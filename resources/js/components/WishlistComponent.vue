<template>
	<a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
	:data-tooltip="tooltipTitle()"
	data-tooltip-placement="right"

	>
	<i :class="'g-font-size-18 addToWishlist fa ' + heartColor(this.isAdded)" :data-article="this.articleId" @click="heartClicked"></i>
</a>
</template>

<script>
	import Tooltip from 'tooltip.js';
	export default {
		props: ['state', 'articleId'],

		data() {
			return {
				api_token: null,
				isAdded: this.state,
				tooltip: null
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
				return this.isAdded ? 'Remove from wishlist' : 'Add to wishlist';
			},

			toggleWished() {

				this.isAdded = this.isAdded ? false : true;
				axios.post('/api/wishlist/'+this.articleId, {api_token: this.api_token})
				.then(response => this.wishlistMessage())
				.catch(
					response => swal.fire({
						type: 'error',
						title: 'Some error occured, please contact administrator!',
						showConfirmButton: true,
					}));

			},

			wishlistMessage(){
				this.isAdded ? 
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

			heartClicked(){
				axios.get('/userTokensForApiAuthentication')
				.then((response) => {
					this.api_token = response.data['API_TOKEN'];
					(this.api_token === 'Unauthenticated') ? Event.$emit('heartclicked') : this.toggleWished();
					this.tooltip.updateTitleContent(this.tooltipTitle());
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