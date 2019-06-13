<template>
	<div>
		<form 
		  method="POST" 
		  :action="'/comments/'+article_id"
		  @submit.prevent="submitComment">
		  <div class="g-mb-15">
		  <textarea name="body" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--focus g-resize-none rounded-3 g-py-13 g-px-15" rows="2" placeholder="Your message" v-model="form.body" @focus="addParent"></textarea>
		</div>

		<div class="row align-items-center">
		  <div class="col-5 col-sm-4 col-md-3">
		    <button class="btn u-btn-primary g-font-size-12 text-uppercase" type="submit" role="button">Add Comment</button>
		  </div>
		</div>
		</form>
	</div>
</template>
<script>
	import Form from '../../utilities/Form.js';
	export default{
		props: ['article_id', 'parent_id'],

		data(){
			return{
				form: new Form({
					parentId: Number,
					body: '',
				}),
			}
		},

		methods: {
			submitComment(){
				this.form.post('/comments/'+this.article_id)
					.then(response => {
						this.$emit('comment-added', response)
				});
			},

			addParent(){
				this.form.parentId = this.parent_id;
			}
			
		},

		created(){
			this.form.parentId = this.parent_id;
		}
		
	}
</script>