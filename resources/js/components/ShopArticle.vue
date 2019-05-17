<template>
	<div>
	<figure class="g-pos-rel g-mb-20">
              <a :href="'/articles/'+this.data.id"><img class="img-fluid" :src="'/'+this.data.photos[0].thumbnail_path" alt="Image Description"></a>  
              
              <figcaption v-if="this.data.new"class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover" href="#!">New Arrival</a>
              </figcaption>
            </figure>

            <div class="media">
              <!-- Product Info -->
              <div class="d-flex flex-column">
                <h4 class="h6 g-color-black mb-1">
                  <a class="u-link-v5 g-color-black g-color-primary--hover"
                   :href="'/articles/'+this.data.id"
                   v-text="this.data.name">
                  </a>
                </h4>
                <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" v-text="this.data.categories[0].name" :href="'/categories/'+this.data.categories[0].name"></a>
                <span class="d-block g-color-black g-font-size-17">{{this.data.price}}</span>
              </div>
              <!-- End Product Info -->

              <ul class="list-inline media-body text-right">
                <li class="list-inline-item align-middle mx-0">
                  <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                     data-toggle="tooltip"
                     data-placement="top"
                     title="Add to Cart">
                    <i class="addToCart icon-finance-100 u-line-icon-pro" 
                       :data-article="this.data.id" 
                       data-order=""></i>
                  </a>
                </li>
                <li class="list-inline-item align-middle mx-0">
                  <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                     data-toggle="tooltip"
                     data-placement="top"
                     :title="this.data.is_wished ? 'Remove from wishlist':'Add to wishlist'">
                    <i :class="'g-font-size-18 addToWishlist fa ' + isWished(this.data)" :data-article="this.data.id" @click="heartClicked"></i>
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
        api_token: null,
        data: this.article
      }
    },

		methods: {
			isWished(data) {
				if(data.wished){
					return 'fa-heart text-danger';
				}else{
					return 'fa-heart-o';
				}
			},

      toggleWished() {

        this.data.wished = this.data.wished ? false : true;
        axios.post('/api/wishlist/'+this.data.id, {api_token: this.api_token});
      },

      heartClicked(){
        axios.get('/userTokensForApiAuthentication')
        .then((response) => {
          this.api_token = response.data['API_TOKEN'];
          (this.api_token === 'Unauthenticated') ? Event.$emit('heartclicked') : this.toggleWished();
        });
      }
		}
	}
</script>