import './bootstrap.js';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';

window.swal = require('sweetalert2');

new Vue({
	el:"#app",

	components: { LoginComponent, RegisterComponent }
});

