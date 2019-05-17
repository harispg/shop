import './bootstrap.js';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import BigMeny from './components/BigMeny.vue';
import ShopArticle from './components/ShopArticle.vue';
import ModalLogin from './components/ModalLogin.vue';	
window.swal = require('sweetalert2');
window.Event = new Vue();

new Vue({
	el:"#app",

	components: { LoginComponent, RegisterComponent, BigMeny, ShopArticle, ModalLogin },
});

