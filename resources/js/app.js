import './bootstrap.js';
import LoginComponent from './components/LoginComponent.vue';
import TopnavComponent from './components/TopnavComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import BigMeny from './components/BigMeny.vue';
import ArticlesCollection from './components/ArticlesCollection.vue';
//import ShopArticle from './components/ShopArticle.vue';
import ModalLogin from './components/ModalLogin.vue';	
import Sticky from './components/Sticky.vue';
import Tooltip from 'tooltip.js';
import Form from './utilities/Form.js';
import ArticleRating from './components/ArticleRating.vue';
import WishlistComponent from './components/WishlistComponent.vue';
window.Event = new Vue();

if(document.getElementById("app")!=null){
	new Vue({
	el:"#app",
	
	components: { 
		LoginComponent, 
		TopnavComponent,
		RegisterComponent, 
		BigMeny, 
		//ShopArticle,
		ArticlesCollection, 
		ModalLogin, 
		Sticky,
		ArticleRating,
		WishlistComponent
	},

	mounted() {
	}
	});
}

