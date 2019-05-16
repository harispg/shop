<template>
	<div class="row g-pt-30 g-mb-50">
          <div class="article col-6 col-lg-3 g-mb-30" v-for="article in articles">
              <shop-article :article="article"></shop-article>
          </div>
    </div>
</template>

<script>
  import ShopArticle from './ShopArticle.vue';
	export default{
    components: {ShopArticle},
    data() {
      return {
        articles: [],
        api_token: null
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