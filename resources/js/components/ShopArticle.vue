<template>
	<div>
	<figure class="g-pos-rel g-mb-20">
              <a :href="'/articles/'+article.id"><img class="img-fluid" :src="'/'+article.photos[0].thumbnail_path" alt="Image Description"></a>  
              
              <figcaption v-if="article.new"class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover" href="#!">New Arrival</a>
              </figcaption>
            </figure>

            <div class="media">
              <!-- Product Info -->
              <div class="d-flex flex-column">
                <h4 class="h6 g-color-black mb-1">
                  <a class="u-link-v5 g-color-black g-color-primary--hover"
                   :href="'/articles/'+article.id"
                   v-text="article.name">
                  </a>
                </h4>
                <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" v-text="article.categories[0].name" :href="'/categories/'+article.categories[0].name"></a>
                <span class="d-block g-color-black g-font-size-17">{{article.price}}</span>
              </div>
              <!-- End Product Info -->

              <ul class="list-inline media-body text-right">
                <li class="list-inline-item align-middle mx-0">
                  <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                     data-toggle="tooltip"
                     data-placement="top"
                     title="Add to Cart">
                    <i class="addToCart icon-finance-100 u-line-icon-pro" 
                       :data-article="article.id" 
                       data-order=""></i>
                  </a>
                </li>
                <li class="list-inline-item align-middle mx-0">
                  <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                     data-toggle="tooltip"
                     data-placement="top"
                     :title="article.is_wished ? 'Remove from wishlist':'Add to wishlist'">
                    <i :class="'g-font-size-18 addToWishlist fa ' + isWished(article)" :data-article="article.id" @click="heartClicked"></i>
                  </a>
                </li>
              </ul>
              <!-- End Products Icons -->
            </div>
           </div>
</template>
<script>
	export default {
		props: ['article'],

    data() {
      return {
        api_token: null
      }
    },

		methods: {
			isWished(article) {
				if(article.wished){
					return 'fa-heart text-danger';
				}else{
					return 'fa-heart-o';
				}
			},

      toggleWished() {

        this.article.wished = this.article.wished ? false : true;
      },

      heartClicked(){
        axios.get('/userTokensForApiAuthentication')
        .then((response) => {
          this.api_token = response.data['API_TOKEN'];
          (this.api_token === 'Unauthenticated') ? alert('Unauthenticated') : alert('Yeaah, that is the spirit');
        });
      }
		},

    mounted() {
      axios.get('/userTokensForApiAuthentication')
        .then((response) => {
          this.api_token = response.data['API_TOKEN'];
          return axios.get('/api/articles?api_token=' + this.api_token);
        })
        .then(response => this.articles = response.data);
    }
	}
</script>