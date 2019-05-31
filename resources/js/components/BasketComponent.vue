<template>
	<div class="u-basket d-inline-block g-z-index-3">
		<div class="g-py-10 g-px-6">
			<a href="#!" id="basket-bar-invoker" class="u-icon-v1 g-color-black g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
			aria-controls="basket-bar"
			aria-haspopup="true"
			aria-expanded="false"
			data-dropdown-target="#basket-bar"
			data-dropdown-type="css-animation"
			data-dropdown-duration="300"
			data-dropdown-hide-on-scroll="false"
			data-dropdown-animation-in="fadeIn"
			data-dropdown-animation-out="fadeOut">
			<span class="basketNumberOfArticles u-badge-v1--sm g-color-white g-bg-primary g-font-size-11 g-line-height-1_4 g-rounded-50x g-pa-4" style="top: 6px !important; right: 4px !important;" v-text="order.items_count"></span>
			<i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
		</a>
	</div>

	<div id="basket-bar" class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-text-transform-none g-bg-white g-brd-around g-brd-gray-light-v4"
	aria-labelledby="basket-bar-invoker">
	<div class="g-brd-bottom g-brd-gray-light-v4 g-pa-15 g-mb-10">
		<span class="d-block h6 text-center text-uppercase mb-0">Shopping Cart</span>
	</div>
	<div class="js-scrollbar g-height-200">
		<!-- Product -->
		<div>	
			<basket-item :item="item" @totalUpdated="function(amount){total+=amount}" v-for="item in items" :key="item.id"></basket-item>	
		</div>
		<!-- End Product -->

		<div class="container text-center" v-if="!order.items_count">
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
			}
		},

		computed: {
			orderUrl(){
				return '/orders/'+this.order.id+'/show';
			},

			showTotal(){
				return this.total.toFixed(2);
			}
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
				let newItem = _this.items.filter(anItem => {
					return anItem.id === item.id
				});
				if(newItem.length <= 0){
					_this.items.unshift(item);
				    _this.order.items_count ++;
				    _this.total += item.price;
				}
			});
		}
	}
</script>