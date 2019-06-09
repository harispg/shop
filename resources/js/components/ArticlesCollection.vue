<template>
	
</template>
<script>
	import ShopArticle from './ShopArticle.vue';
	export default{
		components: {ShopArticle},
		props: ['items'],
		data() {
			return {
				articles: [],
			}
		},
		mounted(){
			this.articles = this.items;
			let _this = this;
			Event.$on('loggedIn', response => {
				let wishedArticles = response.user.articles;
				for(let i=0; i<wishedArticles.length; i++){
					for(let j=0; j<_this.articles.length; j++){
						if(_this.articles[j].id == wishedArticles[i].id){
							_this.articles[j].wished = true;
						}
					}
				}
			});
		}
	}
</script>