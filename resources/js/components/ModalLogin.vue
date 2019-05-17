<template>
	<modal 
	name="login-modal-vue"
	height="auto"
	width="30%"
	:pivotY=".5"
	>
	 	<div>
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                        <div class="g-px-30 g-py-20">
                          <h2>Login</h2>
                        <!-- Form -->
                       <login-component></login-component>
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
	export default{
	components: {LoginComponent},
	created() {
		Event.$on('heartclicked', function() {

			this.$modal.show('login-modal-vue');
		});
	}

	}
</script>