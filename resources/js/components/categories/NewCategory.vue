<template>
	<div>
		<button class="btn btn-info btn-lg font-weight-bold" 
				data-toggle="modal" 
				data-target="#newCategory">
					New Category
		</button>
		<!-- New Category modal -->
		<div class="modal inmodal fade" 
		 id="newCategory" 
		 tabindex="-1" 
		 role="dialog"  
		 aria-hidden="true">
		  <div class="modal-dialog modal-lg">
		    <div class="modal-content">
		        <div class="modal-header">
		            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
		            <h1>Create new Category</h1>
		        </div>
		        <div class="modal-body newCategory">
		        	<form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
		              <div class="form-group">
		                <label class="col-sm-2 col-form-label pl-0" for="name">Name:</label>
		                <input class="form-control" type="text" name="name" v-model="form.name" required>
		                <span class="text-danger name" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
		              </div>
		              <div class="form-group">
		                <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
		                <textarea class="form-control" type="text" name="description" v-model="form.description" required></textarea>  
		                <span class="text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
		              </div>
		              <div class="form-group">
		                    <label for="photo" class="col-sm-2 col-fomr-label pl-0">Choose photo...</label>
		                <div class="custom-file">
		                    <input id="photoNew" type="file" name="photo" class="custom-file-input" @change="addPicture($event)">
		                    <label for="photo" class="custom-file-label"> </label>
		                </div>  
		                <span class="text-danger" v-if="form.errors.has('photo')" v-text="form.errors.get('photo')"></span>
		              </div>
		            </form>
		        </div>
		        <div class="modal-footer">
		            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
		            <button type="button" class="btn btn-primary save" @click="onSubmit">Save category</button>
		        </div>
		    </div>
		  </div>
		</div>
	</div>
</template>
<script>
	import Form from '../../utilities/Form.js'
	export default {
		data(){
			return {
				form: new Form({
					name: '',
					description: '',
					photo: ''
				})
			}
		},

		methods: {
			onSubmit(){
				let _this = this;
				this.form.postWithFile('/categories')
						 .then(response => {
						 	_this.form.reset();
						 	$("#newCategory").modal('toggle');
						 })
						 .catch(error => console.log(error.message));
			},
			addPicture(event){
				this.form.photo = event.target.files[0];
				let fileName = $(event.target).val().split('\\').pop();
				$(event.target).next('.custom-file-label').addClass("selected").html(fileName);
				this.form.errors.clear('photo');
			},
		}
	}
</script>