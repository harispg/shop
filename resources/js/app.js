import './bootstrap.js';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import BigMeny from './components/BigMeny.vue';
import ShopArticle from './components/ShopArticle.vue';
import ModalLogin from './components/ModalLogin.vue';	
import Sticky from './components/Sticky.vue';
import Tooltip from 'tooltip.js';
import Auth from './utilities/Auth.js';
import Form from './utilities/Form.js';
window.Auth = new Auth();
window.Event = new Vue();
new Vue({
	el:"#app",
	
	components: { 
		LoginComponent, 
		RegisterComponent, 
		BigMeny, 
		ShopArticle, 
		ModalLogin, 
		Sticky 
	},

	mounted() {
	}
});

