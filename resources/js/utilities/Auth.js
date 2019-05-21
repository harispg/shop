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

	storeUser(data){
		this.data = data;
	}

}

export default Auth;