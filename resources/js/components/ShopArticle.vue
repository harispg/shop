<template>
	<div class="article col-6 col-lg-3 g-mb-30">
		<input type="text" v-model="chosenId">
		<button class="btn btn-primary" @click="getArticle">Get Article</button>
		<!-- Product -->
		<figure class="g-pos-rel g-mb-20" v-if="anyArticles">
			<a href="/articles/1"><img 
				class="img-fluid" 
				:src="anyArticles() ? article.photos[0].thumbnail_path : ''" alt="Image Description"></a>  

			<figcaption class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
				<a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover" href="#!">New Arrival</a>
			</figcaption>

		</figure>

		<div class="media">
			<!-- Product Info -->
			<div class="d-flex flex-column">
				<h4 class="h6 g-color-black mb-1">
					<a class="u-link-v5 g-color-black g-color-primary--hover" href="/articles/1" v-text="article.name">
						
					</a>
				</h4>
				<a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" href="#" v-text="article.category"></a>
				<span class="d-block g-color-black g-font-size-17" v-text="article.price"></span>
			</div>
			<!-- End Product Info -->

			<ul class="list-inline media-body text-right">
				<li class="list-inline-item align-middle mx-0">
					<a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
					data-toggle="tooltip"
					data-placement="top"
					title="Add to Cart">
					<i class="addToCart icon-finance-100 u-line-icon-pro" 
					data-article="1" 
					data-order="1"></i>
				</a>
			</li>
			<li class="list-inline-item align-middle mx-0">
				<a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
				data-toggle="tooltip"
				data-placement="top"
				title="Add to wishlist">
				<i class="addToWishlist fa fa-heart-o" data-article="1"></i>
			</a>
		</li>
	</ul>
	<!-- End Products Icons -->
</div>
<!-- End Product -->
</div>
</template>
<script>
	//import Article from '../utilities/Article.js';
	export default {

		//props: ['src'],

		data() {
			return {
				article: {},
				chosenId: 1
			}
		},

		methods: {
			getArticle(){
				axios.get('/apiarticles/'+this.chosenId)
					 .then(response => this.article = response.data)
					 .catch(response => {
					 	var str = response.response.data.message;
					 	if(str.indexOf('No query result')>-1){
					 		alert('That article does not exist');
					 	}else{
					 		alert('Whoops some error ocured');
					 	}
					 });
			},

			anyArticles() {
				return this.article.photos != undefined;
			}
		}
	}
</script>