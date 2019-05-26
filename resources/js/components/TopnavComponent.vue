<script>
import BasketComponent from './BasketComponent.vue';	
	export default {
		components: {BasketComponent},
		data(){
			return{
				authenticated: false,
				activeOrderId: null,
				itemsOrdered: 0,
				userName: 'User',
				articlesOrdered: []
			}
		},
		created(){
			let _this = this;
			axios.get('authUser').then(response => {
				_this.authenticated = (response.data != 'Unauthenticated');
				_this.userName = (response.data != 'Unauthenticated') ? response.data.name : 'Account';
				_this.activeOrderId = (response.data != 'Unauthenticated') ? response.data.active_order_id : false;
				_this.itemsOrdered = (response.data != 'Unauthenticated') ? response.data.items_ordered : false;
				if(response.data.items_ordered>0){
					axios.get('/orders/'+_this.activeOrderId+'/articles')
						 .then(response => _this.articlesOrdered = response.data);
				}
			});

		},
		mounted(){
			let _this = this;
			Event.$on('loggedIn', function(user) {
				_this.authenticated = true;
				_this.userName = user.name;
				_this.activeOrderId = user.active_order;
			});

			Event.$on('loggedOut', function() {
				_this.authenticated = false;
				_this.activeOrderId = null;
			});
		}

	}
</script>