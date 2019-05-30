<script>
import BasketComponent from './BasketComponent.vue';	
	export default {
		components: {BasketComponent},
		data(){
			return{
				authenticated: false,
				activeOrderId: null,
				userName: '',
			}
		},
		created(){
			let _this = this;
			axios.get('/authUser').then(response => {
				_this.authenticated = (response.data != 'Unauthenticated');
				_this.userName = (response.data != 'Unauthenticated') ? response.data.name : 'Account';
				_this.activeOrderId = (response.data != 'Unauthenticated') ? response.data.active_order_id : false;
				Event.$emit('orderIdReceived');
			});
		},
		mounted(){
			let _this = this;
			Event.$on('loggedIn', function(response) {
				_this.authenticated = true;
				_this.userName = response.user.name;
				_this.activeOrderId = response.user.active_order_id;
				Event.$emit('orderIdReceived');
			});

			Event.$on('loggedOut', function() {
				_this.authenticated = false;
				_this.activeOrderId = null;
				Event.$emit('orderIdReceived');
			});
		}

	}
</script>