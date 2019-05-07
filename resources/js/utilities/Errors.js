class Errors {

	/**
	 * Makes new instance of Errors
	 */
	constructor(){
		this.errors = {};
	}

	/**
	 * Checks if there are errors for the field
	 * @param  {string}  field [name of the field under validation]
	 * @return {Boolean}  
	 */
	has(field){
		return this.errors.hasOwnProperty(field);
	}

	/**
	 * Checks if there are any errors
	 * @return {[type]} [description]
	 */
	any(){
		return Object.keys(this.errors).length > 0;
	}

	/**
	 * Gets error for the field
	 * @param  {string} field [name of the field under validation]
	 * @return {String/none} [If there is an error for the field function returns message]
	 */
	get(field) {
		if (this.errors[field]){
			return this.errors[field][0];
		}
	}

	/**
	 * Records new errors for the form
	 * @param  {Object} response data [Holds data for errors]
	 * @return void
	 */
	record(response){
		this.errors = response.errors;
	}

	/**
	 * Clears errors for the given field or all errors
	 * @param  {String} field [field name]
	 * @return void
	 */
	clear(field){
		if(field) {
			delete this.errors[field];
			return;
		}

		this.errors = {};
	}
}

export default Errors;