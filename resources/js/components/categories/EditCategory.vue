<template>
	<div>
		<button class="btn btn-outline-primary edit" @click="toggleModal()">Edit</button>
		<!-- EDIT MODAL -->
          <div class="modal inmodal fade" 
           :id="'modal'+category.id"
           tabindex="-1" 
           role="dialog"  
           aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title">Edit {{ category.name }} category</h4>
                      <small class="font-bold">You can edit your category name, description or chose a new photo</small>
                  </div>
                  <div class="modal-body">
                      <form @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
                        <div class="form-group">
                          <label class="col-sm-2 col-form-label pl-0" for="name">Name:</label>
                          <input class="form-control" type="text" name="name" v-model="form.name" required>
                          <span class="text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></span>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
                          <textarea class="form-control" type="text" name="description"  v-model="form.description" required></textarea>  
                          <span class="text-danger" v-if="form.errors.has('description')" v-text="form.errors.get('description')"></span>
                        </div>

                        <button type="button" class="btn btn-info" v-if="!changePhoto" @click="changePhoto=! changePhoto">Change photo</button>

                        <div class="form-group border border-info p-2" v-if="changePhoto">
                          <label for="photoEdit" class="col-sm-3 col-fomr-label pl-0">Choose new photo...</label>
                          <div class="custom-file">
		                    <input id="photoNew" type="file" name="photo" class="custom-file-input" @change="addPicture($event)">
		                    <label for="photo" class="custom-file-label">Previous photo will be deleted...</label>
		                </div> 
                          <button type="button" class="btn btn-outline-info mt-3" @click.prevent="cancelChangingPhoto()">Cancel</button>  
                          <span class="text-danger"></span>
                        </div>
                      </form>

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary ec-save" @click="onSubmit">Save changes</button>
                  </div>
              </div>
            </div>
          </div>
          <!-- EDIT MODAL END-->
	</div>
</template>
<script>
	import Form from '../../utilities/Form.js'
	export default{
		props: ['category'],

		data(){
			return {
				form: new Form({
					name: this.category.name,
					description: this.category.description,
					photo: '',
					_method: 'PATCH',
				}),

				changePhoto: false,
			}
		},

		methods: {
			toggleModal(){
				$("#modal"+this.category.id).modal('toggle');
			},

			onSubmit(){
				let _this = this;
				this.form.postWithFile('/categories/'+this.category.name)
						 .then(response => {
						 	_this.$emit('category_updated', response)
						 	_this.refillFormData(response);
						 	_this.toggleModal();
						 })
						 .catch(error => console.log(error.response));
			},

			addPicture(event){
				this.form.photo = event.target.files[0];
				let fileName = $(event.target).val().split('\\').pop();
				$(event.target).next('.custom-file-label').addClass("selected").html(fileName);
				this.form.errors.clear('photo');
			},

			cancelChangingPhoto(){
				this.changePhoto=!this.changePhoto
				this.form.photo = '';
			},

			refillFormData(response){
				this.form.name = response.name;
				this.form.description = response.description;
			}
		}

	}
</script>