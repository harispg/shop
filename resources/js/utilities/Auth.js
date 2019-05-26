class Auth{
	constructor(){
		this.data = null;
		axios.get('/authUser').then(response => this.data = response.data);
	}

	check(){
		return (this.data != 'Unauthenticated');
	}

	user(){
		return this.check() ? this.data : null;
	}

	name(){
			if(this.data == null || this.data == 'Unauthenticated'){
				return null
			}else{
				return this.data.name
			}
	}

	storeUser(data){
		this.data = data;
	}

	update(){
		axios.get('/authUser').then(response => this.data = response.data);
	}

}

export default Auth;