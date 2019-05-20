import './bootstrap.js';
import LoginComponent from './components/LoginComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import BigMeny from './components/BigMeny.vue';
import ShopArticle from './components/ShopArticle.vue';
import ModalLogin from './components/ModalLogin.vue';	
import Sticky from './components/Sticky.vue';
import Tooltip from 'tooltip.js';
window.Event = new Vue();

Vue.directive('tooltip',{
	bind(elem, bindings){
		new Tooltip(elem, {
			placement: bindings.arg,
			title: bindings.value
		});
	}
});

new Vue({
	el:"#app",

	components: { LoginComponent, RegisterComponent, BigMeny, ShopArticle, ModalLogin, Sticky },

	mounted() {
		$("[data-tooltip]").each(function() {
			let elem = this;
			new Tooltip(elem, {
				placement: elem.dataset.tooltipPlacement || 'top',
				title: elem.dataset.tooltip
			});

		});
	}
});

