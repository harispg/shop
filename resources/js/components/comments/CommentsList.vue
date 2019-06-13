<template>
	<ul style="list-style-type:none;" class="pt-5 pb-5">
    <li v-for="comment in commentsCollection" :key="comment.id">
      <comment-component :comment="comment" :article_id="article_id" :is_super="is_super" :all_comments="all_comments"></comment-component>
    </li>
  </ul>
</template>
<script>
	import CommentsForm from './CommentsForm.vue';
  import CommentsList from './CommentsList.vue';
  import CommentComponent from './CommentComponent.vue';
	export default{
    name: 'comments-list',
		components:{CommentsForm, CommentsList, CommentComponent},
		props: ['collection', 'article_id', 'all_comments', 'is_super'],
		watch: {
			collection: function(newVal){
				this.commentsCollection = newVal;
			}
		},

		data(){
			return{
				commentsCollection: [],
			}
		},


		mounted(){
			this.commentsCollection = this.collection;
		},

    methods:{
      addComment(comment){
        this.commentsCollection.unshift(comment);
      }
    }
	}
</script>