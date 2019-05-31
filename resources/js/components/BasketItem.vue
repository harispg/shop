<template>
	<div class="u-basket__product g-brd-none g-px-20">
		<div class="row no-gutters g-pb-5">
				<div class="col-4 pr-3">
					<a class="u-basket__product-img" href="#!">
						<img class="img-fluid" :src="photoPath" alt="Image Description">
					</a>
				</div>

				<div class="col-8">
					<h6 class="g-font-weight-400 g-font-size-default">
						<a class="g-color-black g-color-primary--hover g-text-underline--none--hover" href="'/articles/'+item.id" v-text="item.name"></a>
					</h6>                                                 
					<small class="g-color-primary g-font-size-12" v-text="item.quantity +' x ' + item.price"></small>
				</div>
			</div>
			<button type="button" class="u-basket__product-remove" :data-item="item.id" @click="removeItem()">&times;</button>
	</div>
</template>
<script>
	export default{
		props: ['item'],
		computed: {
			photoPath(){
				return '/'+this.item.photo;
			}
		},

		methods: {
			removeItem(){
				axios.post('/orders/'+this.item.order_id+'/items/'+this.item.id,{_method:'DELETE'})
					.then(response => Event.$emit('itemRemoved', response.data))
					.catch(error => console.log(error.response.data));
			}
		},

		mounted(){
			let _this = this;
			Event.$on('itemAdded', function(item){
				if(_this.item.id === item.id){
					_this.item.quantity ++;
					_this.$emit('totalUpdated', item.price);
				}
			})
		}

	}
</script>