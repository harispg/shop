<template>
	<div class="u-basket d-inline-block g-z-index-3">
		<div class="g-py-10 g-px-6">
			<a href="#!" class="u-icon-v1 
			g-color-black 
			g-color-primary--hover 
			g-font-size-17 
			g-text-underline--none--hover" 
			@mouseenter="showBasket = true"
			@mouseleave="showBasket = false">
			<span class="basketNumberOfArticles u-badge-v1--sm g-color-white g-bg-primary g-font-size-11 g-line-height-1_4 g-rounded-50x g-pa-4" style="top: 6px !important; right: 4px !important;" v-text="order.items_count"></span>
			<i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
		</a>
	</div>
	<transition name="fade">
	<div v-if="showBasket" @mouseenter="showBasket = true" @mouseleave="showBasket = false" class="u-basket__bar u-dropdown--css-animation g-text-transform-none g-bg-white g-brd-around g-brd-gray-light-v4">
	<div class="g-brd-bottom g-brd-gray-light-v4 g-pa-15 g-mb-10">
		<span class="d-block h6 text-center text-uppercase mb-0">Shopping Cart</span>
	</div>
	<div class="g-height-200" style="overflow: auto">
		<!-- Product -->
		<div v-show="order.items_count">	
			<basket-item v-for="item in items" :key="item.id" :item="item"></basket-item>	
		</div>
		<!-- End Product -->

		<div class="container text-center" v-show="!order.items_count">
			<div class="mb-5">
				<h4 class="mt-5">Your Cart is Currently Empty</h4>
			</div>
			<a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="/articles">Start Shopping</a>
		</div>

	</div>

	<div class="clearfix g-px-15">
		<div class="row align-items-center text-center g-brd-y g-brd-gray-light-v4 g-font-size-default">
			<div class="col g-brd-right g-brd-gray-light-v4">
				<strong class="d-block g-py-10 text-uppercase g-color-main g-font-weight-500 g-py-10">Total</strong>
			</div>
			<div class="col">
				<strong class="d-block g-py-10 g-color-main g-font-weight-500 g-py-10" v-text="'$ '+showTotal"></strong>
			</div>
		</div>
	</div>

	<div class="g-pa-20">
		<div class="text-center g-mb-15">
			<a class="text-uppercase g-color-primary g-color-main--hover g-font-weight-400 g-font-size-13 g-text-underline--none--hover" :href="orderUrl">
				View Cart
				<i class="ml-2 icon-finance-100 u-line-icon-pro"></i>
			</a>
		</div>
	</div>
</div>
</transition>
</div>
</template>
<script>
	import BasketItem from './BasketItem.vue';
	export default{
		components: {BasketItem},
		props: ['orderid'],

		data() {
			return {
				order: {},
				items: [],
				total: 0,
				showBasket: false
			}
		},

		methods: {
			itemExists(item){
				for(let i=0; i<this.items.length; i++){
					if(this.items[i].id == item.id){
						return true;
					}
				}
				return false;
			},

			updateItemQuantity(item){
				for(let i=0; i<this.items.length; i++){
					if(this.items[i].id == item.id){
						this.items[i] = item;
					}
				}
			},

			appendItem(item){
				this.items.unshift(item);
				this.order.items_count ++;
			},

			calculateTotal(){
				this.total = 0;
				for(let i=0; i<this.items.length; i++){
					this.total += this.items[i].total;
				}
			}
		},

		computed: {
			orderUrl(){
				return '/orders/'+this.order.id+'/show';
			},

			showTotal(){
				return this.total.toFixed(2);
			},
		},

		mounted(){
			axios.get('/orders/'+this.orderid)
					 .then(response =>  {
					 	_this.order = response.data;
					 	_this.items = response.data.items;
					 	_this.total = response.data.total;
					 });
			let _this = this;
			Event.$on('itemAdded', function(item){
				_this.itemExists(item) ? _this.updateItemQuantity(item) : _this.appendItem(item);
				_this.calculateTotal();
			});

			Event.$on('itemRemoved', function(data){
				let item=data;
				let itemsLeft = _this.items.filter(function(oneOfItems){
					return oneOfItems.id != item.id;
				});
				_this.items = itemsLeft;
				_this.order.items_count --;
				_this.calculateTotal();
			})
		}
	}
</script>
<style>
	.fade-enter-active, .fade-leave-active {
	  transition: opacity .5s;
	}
	.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
	  opacity: 0;
	}
</style>