import './bootstrap.js';
import LoginComponent from './components/LoginComponent.vue';
import TopnavComponent from './components/TopnavComponent.vue';
import RegisterComponent from './components/RegisterComponent.vue';
import ArticlesCollection from './components/ArticlesCollection.vue';
import CommentsComponent from './components/comments/CommentsComponent.vue';
import ModalLogin from './components/ModalLogin.vue';	
import Sticky from './components/Sticky.vue';
import Tooltip from 'tooltip.js';
import Form from './utilities/Form.js';
import WishlistComponent from './components/WishlistComponent.vue';
import ShopArticle from './components/ShopArticle.vue';
import CategoriesComponent from './components/categories/CategoriesComponent.vue';
import Paginator from './components/Paginator.vue';
Vue.component('paginator', Paginator);
window.Event = new Vue();

if(document.getElementById("app")!=null){
	new Vue({
		el:"#app",
		components: { 
			LoginComponent, 
			TopnavComponent,
			RegisterComponent,
			//ShopArticle,
			ArticlesCollection,
			ShopArticle, 
			ModalLogin, 
			Sticky,
			WishlistComponent,
			CommentsComponent,
		},
	});
}

if(document.getElementById("wrapper")!=null){
	new Vue({
		el:"#wrapper",
		components: {
			CategoriesComponent
		}
	});
}

