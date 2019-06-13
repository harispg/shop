<template>
  <div v-if="shouldShow">
	<div class="media g-mb-30">
    <img class="d-flex g-width-60 g-height-60 rounded-circle g-mt-3 g-mr-20" src="/assets/img-temp/100x100/img1.jpg" alt="Image Description">
    <div class="media-body">
      <div class="d-flex align-items-start g-mb-15 g-mb-10--sm">
        <div class="d-block">
          <h5 class="h6" v-text="comment.owner.name"></h5>
          <span class="d-block g-color-gray-dark-v5 g-font-size-11" v-text="comment.created_at"></span>
        </div>
        <div class="ml-auto">

          <a 
          class="u-link-v5 
                 g-color-black 
                 g-color-primary--hover 
                 g-font-size-12 mr-5 delete" 
          v-show="is_super" 
          href="#!" 
          @click.prevent="deleteComment">DELETE</a>
          <a class="u-link-v5 g-color-black g-color-primary--hover g-font-size-12 text-uppercase replyToggler" href="#!" @click="toggleReply">Reply</a>
          <p class="text-danger delete-warning" hidden="true">Delete unsuccessful</p>
        </div>
      </div>

      <p v-text="comment.body"></p>

      <ul class="list-inline my-0">
        <li class="list-inline-item g-mr-20">
          <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
            <i class="icon-medical-022 u-line-icon-pro g-pos-rel g-top-1 g-mr-3"></i> 5
          </a>
        </li>
        <li class="list-inline-item g-mr-20">
          <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
            <i class="icon-finance-206 u-line-icon-pro g-pos-rel g-top-1 g-mr-3"></i> 1
          </a>
        </li>
      </ul>
      <div class="row reply" v-show="showForm">
        <div class="col col-sm-12">
        	<comments-form  @comment-added="addComment" :parent_id="comment.id" :article_id="article_id">
        	</comments-form>
        </div>
      </div>
    </div>
  </div>
    <ul v-if="hasReplies" style="list-style-type:none;" class="pt-5 pb-5">
        <li v-for="instance in selfCollection" :key="instance.id">
          <comment-component 
            :comment="instance" 
            :article_id="article_id" 
            :is_super="is_super" 
            :all_comments="updated_comments">
          </comment-component>
        </li>
      </ul>
  </div>
</template>
<script>
  import CommentsForm from './CommentsForm.vue';
  import CommentComponent from './CommentComponent.vue';
	export default{
    name: 'comment-component',
    components: {CommentsForm, CommentComponent},
		props: ['article_id', 'comment', 'is_super', 'all_comments'],
    watch: {
      all_comments: function(newVal){
        this.updated_comments = newVal;
      }
    },

    data(){
      return{
        isSuper: false,
        showForm: false,
        shouldShow: true,
        selfCollection: [],
        hasReplies: false,
        updated_comments: [],
      }
    },

    methods:{
      addComment(newInstance){
        Event.$emit('newComment', {comment: newInstance, parent: this.comment.id});
        this.selfCollection = this.updated_comments[this.comment.id];
        this.hasReplies = true;
        this.showForm = false;

      },

      toggleReply(){
        this.showForm = this.showForm ? false:true;
      },

      deleteComment(){
        axios.post('/comments/'+this.comment.id, {_method: 'DELETE'})
             .catch(error => {
                console.log(error);
             });
        let _this = this;
        Event.$emit('comment-deleted', {comment: _this.comment});
        this.selfCollection = [];
        this.hasReplies = false;
        this.shouldShow = false;
      }
    },
    created(){
    },
    mounted(){
      this.isSuper = this.is_super;
      this.updated_comments = this.all_comments;
      this.selfCollection = this.all_comments[this.comment.id] ? this.all_comments[this.comment.id] : [];
      this.hasReplies = (this.all_comments[this.comment.id] && this.all_comments[this.comment.id].length)?true:false;
    }
	}
</script>