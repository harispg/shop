<template>

</template>
<script>
  import AddToCart from './AddToCart.vue';
  import WishlistComponent from './WishlistComponent.vue';
  import ArticleRating from './ArticleRating.vue';
  import Tooltip from 'tooltip.js';
	export default {
		props: ['article'],

    watch: {
      article: function(newVal, oldVal){
        this.data = newVal;
      }
    },

    components: {WishlistComponent, AddToCart, ArticleRating},

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