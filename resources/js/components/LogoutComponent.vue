<template>
	<div>
		<a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-font-weight-400 g-py-5 g-px-20" onclick="event.preventDefault(); getElementById('logoutForm').submit();" href="#!">
          Logout
        </a>
        <form id="logoutForm" style="visibility: hidden" action="/logout" method="POST">
          <input type="hidden" name="_token" :value="csrfToken">
        </form>
	</div>
</template>
<script>
	export default{
		data(){
			return{
				csrfToken:'',
			}
		},
		created(){
			this.csrfToken = $("meta[name='csrf-token']").attr('content');
		}

	}
</script>
