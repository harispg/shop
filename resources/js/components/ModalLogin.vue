<template>
	<modal 
		name="login-modal-vue"
		height="auto"
		width="100%"
		:pivotY=".5"
	>
	 	<div>
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                        <div class="g-px-30 g-py-20">
                          <div class="modal-header border-0">
                          	<h3 class="modal-title">Login</h3>
						        <button 
						        	id="closeButton"
						        	type="button" class="close" 
						        	@click="closeModal" 
						        	data-tooltip="Close" 
						        	data-tooltip-placement="top"
						        >
						          <span aria-hidden="true">&times;</span>
						        </button>
                          </div>
                        <!-- Form -->
                       <login-component @logedIn="logedIn"></login-component>
                        <!-- End Form -->    
                        </div>              
                </div>
            </div>
          </div>
        </div>            
	</modal>
</template>
<script>
	import LoginComponent from './LoginComponent.vue';
	import Tooltip from 'tooltip.js';
	export default{
	components: {LoginComponent},
	methods: {
		closeModal(){
			this.$modal.hide('login-modal-vue');
		},
		logedIn() {
			this.$modal.hide('login-modal-vue');
			swal.fire({
				type: 'success',
				title: 'You are loged in',
				showConfirmButton: false,
				timer: 700
			})
		}
	},
	created() {
		Event.$on('loginRequired', function() {
			this.$modal.show('login-modal-vue');
		});
	}

	}
</script>