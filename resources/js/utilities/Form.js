import Errors from './Errors';

class Form {
	/**
	 * Constructs a new form and asigns originalData and errors
	 * @param  {Object} data [Data for the fields in the form]
	 */
	constructor(data){
		this.originalData = data;

		for(let field in data){
			this[field] = data[field];
		}

		this.errors = new Errors();
	}

	/**
	 * Resets the fields and clears errors
	 */
	reset() {

		for(let field in this.originalData){
			this[field] = '';
		}

		if(this.errors.has('email') && this.errors.get('email')=='These credentials do not match our records.'){
			return;
		}

		this.errors.clear();
	}

	/**
	 * Gets data from form fields
	 * @return {Object} Contains all fields from the form.
	 */
	data(){
		let data = new FormData();

		for(let property in this.originalData){
			if(this[property] != null){
				data.append(property, this[property]);
			}
		}

		return data;
	}

	post(url){
		return this.submit('post', url);
	}

	patch(url){
		return this.submit('patch', url);
	}

	delete(url){
		return this.submit('delete', url);
	}

	postWithFile(url) {
		return this.submit('post', url, {
			headers: {
				'Content-Type': 'multipart/form-data'
			}
		});
	}

	submit(requestType, url, headers = null) {

		return new Promise((resolve, reject) => {
			axios[requestType](url, this.data(), headers)
				.then(response => {
					this.onSuccess(response.data);

					return resolve(response.data);
				})
				.catch(error => {

					this.onFail(error.response.data);

					reject(error.response.data);
				});


		});
	}

	onSuccess(data) {

		this.reset();

	}

	onFail(errors) {

		this.errors.record(errors);

		if(this.errors.has('email') && this.errors.get('email')=='These credentials do not match our records.'){
			this.reset();
		}
	}


}

export default Form;