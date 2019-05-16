import './bootstrap.js';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import BigMeny from './components/BigMeny.vue';
import ShopArticle from './components/ShopArticle.vue';
window.swal = require('sweetalert2');

new Vue({
	el:"#app",

	components: { LoginComponent, RegisterComponent, BigMeny, ShopArticle }
});

