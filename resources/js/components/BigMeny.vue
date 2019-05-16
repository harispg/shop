<template>
	<div>
		<a id="nav-link--home" class="nav-link text-uppercase g-color-primary--hover g-px-5 g-py-20 mb-0" href="/home" @mouseenter="visibility = true" @mouseleave="makeUnvisible">
			Home
		</a>
		<portal to="nav-after" >
			<div class="container g-height-300 bg-danger" 
				style="
				position:absolute;
				width: 60.5%;
				margin-left: 26rem;
				"v-if="visibility" @mouseenter="visibility = true, mouseIn = true"  @mouseleave="visibility = false, mouseIn = false">

					<div class="row h-100">
						<div class="col col-md-4 bg-info justify-content-center">
							Hello
						</div>

						<div class="col col-md-4 bg-warning justify-content-center">
							Hi
						</div>

						<div class="col col-md-4 bg-dark text-light justify-content-center">
							Bye
						</div>
					</div>
			</div> 
		</portal>
	</div>

</template>
<script>
	export default {
		props: ['items'],

		data() {
			return {
				visibility: false,
				mouseIn: false,
			}
		},

		methods: {
			makeUnvisible() {
			
					setTimeout(() => {
						if(!this.mouseIn){
						this.visibility = false;
						}
					}, 200);
			
			}
		}
	}
	
</script>