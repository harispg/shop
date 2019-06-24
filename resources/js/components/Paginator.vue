<template>
  <ul class="pagination p-1" v-if="shouldPaginate">
	    <li class="page-item" v-show="prevUrl">
	      <a class="page-link" href="#" aria-label="Previous" rel="prev" @click.prevent="page--">
	        <span aria-hidden="true">&laquo; Previous</span>
	        <span class="sr-only">Previous</span>
	      </a>
	    </li>
<!-- 	    <li class="page-item"><a class="page-link" href="#">1</a></li>
	    <li class="page-item"><a class="page-link" href="#">2</a></li>
	    <li class="page-item"><a class="page-link" href="#">3</a></li> -->
	    <li class="page-item" v-show="nextUrl">
	      <a class="page-link" href="#" aria-label="Next" rel="next" @click.prevent="page++">
	        <span aria-hidden="true">Next &raquo;</span>
	        <span class="sr-only">Next</span>
	      </a>
	    </li>
 </ul>

</template>
<script>
	export default{
		props: ['data_set'],

		watch: {
			data_set(val){
				this.prevUrl = val.prev_page_url;
				this.nextUrl = val.next_page_url;
				this.page = val.current_page;
			},

			page(){
				this.broadcast().updateUrl();
			}
		},

		data(){
			return{
				page: 1, 
				prevUrl: false,
				nextUrl: false,
			}
		},

		computed: {
			shouldPaginate(){
				return !!this.prevUrl || !!this.nextUrl;
			}
		},

		methods: {
			broadcast(){
				this.$emit('updated', this.page);

				return this;
			},

			updateUrl(){
				history.pushState(null, null, '?page='+this.page);
			}
		}

	}
</script>