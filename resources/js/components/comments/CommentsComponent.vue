<template>
	<div class="container">
	  <a name="comments"></a>
	  <div class="g-brd-y g-brd-gray-light-v4">
	    <div class="row justify-content-center">
	      <div class="col-lg-9">
	        <h1 class="h3 mb-5">Comments:</h1>

	        <!-- Review -->
	        <div class=" g-brd-gray-light-v4">
	          <!-- Media -->
	          <h3 class="h5 mb-5">Add a comment</h3>
	          <!-- Comment Form -->
	          <div class="g-pb-50">
	            <comments-form 
	            	@comment-added="addComment" 
	            	:parent_id="null" :article_id="article_id">
	            </comments-form class="pb-5">
	          </div>
	          <!-- End Comment Form -->
	          <!-- Comments list-->
	          	<ul style="list-style-type:none;">
				  <li v-for="comment in commentsCollection" :key="comment.id">
				    <comment-component 
				      :comment="comment" 
				      :article_id="article_id" 
				      :is_super="isSuper" 
				      :all_comments="all_comments">
				  	</comment-component>
				  </li>
				</ul>
	          <!-- End Comments list -->
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
</template>
<script>
	import CommentComponent from './CommentComponent.vue';
	import CommentsForm from './CommentsForm.vue';
	export default{
		props: ['article_id', 'first_comments'],
		components: {CommentComponent, CommentsForm},
		data(){
			return{
				isSuper: false,
				commentsCollection: [],
				all_comments: this.first_comments,
			}
		},
		methods:{
			addComment(comment){
			 console.log('appending comment to the collection of list called from comments');
			 this.commentsCollection.unshift(comment);      
			}
		},

		created(){
			let _this = this;
			Event.$on('newComment', function(data){
				if(_this.all_comments[data.parent]){
					_this.all_comments[data.parent].unshift(data.comment)
				}else{
					_this.all_comments[data.parent]=[data.comment];
				}
			});

			Event.$on('comment-deleted', function(data){
				if(_this.all_comments[data.comment.id]){
					delete _this.all_comments[data.comment.id];
				}else{
					let tempData = _this.all_comments[data.comment.parent_id].filter(function(item){
						return item.id != data.comment.id;
					});

					_this.all_comments[data.comment.parent_id] = tempData;
				}
			});
			axios.get('/authUser').then(response => {
				(response.data != 'Unauthenticated') ? _this.isSuper = response.data.superAdmin : _this.isSuper =false;
			});
		},

		mounted(){
			this.commentsCollection = this.all_comments['root'];
		}
	}
</script>