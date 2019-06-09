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
          <add-to-cart :articleId="this.data.id"></add-to-cart>
        </li>
        <li class="list-inline-item align-middle mx-0">
          <wishlist-component :state="this.data.wished" :article_id="this.data.id" inline-template>
            <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
              :data-tooltip="tooltipTitle()"
              data-tooltip-placement="right"

              >
              <i :class="'g-font-size-18 addToWishlist fa ' + heartColor(this.isWished)" :data-article="this.article_id" @click="heartClicked"></i>
            </a>
          </wishlist-component>
        </li>
      </ul>
      <!-- End Products Icons -->
    </div>
  </div>
</template>
<script>
  import AddToCart from './AddToCart.vue';
  import WishlistComponent from './WishlistComponent.vue';
  import Tooltip from 'tooltip.js';
	export default {
		props: ['article'],

    watch: {
      article: function(newVal, oldVal){
        this.data = newVal;
      }
    },

    components: {WishlistComponent, AddToCart},

    data() {
      return {
        data: '',
      }
    },

    created(){
      this.data = this.article;
    }
	}
</script>