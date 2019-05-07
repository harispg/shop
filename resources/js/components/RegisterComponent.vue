<template>
  <form class="g-py-15" enctype="multipart/form-data" @submit.prevent="onSubmit" @keydown="form.errors.clear($event.target.name)">
    <div class="row">
      <div class='form-group col-xs-12 col-sm-12 mb-4'>
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Name:</label>
        <input class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="name" type="text" placeholder="John" v-model="form.name" required>

        <small class="form-control-feedback text-danger" v-if="form.errors.has('name')" v-text="form.errors.get('name')"></small>

      </div>
    </div>

    <div class="form-group mb-4">
      <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
      <input class="form-control form-control-md form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="email" type="email" placeholder="johndoe@gmail.com" v-model="form.email" required>

      <small class="form-control-feedback text-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></small>

    </div>

    <div class="row">
      <div class="form-group col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
        <input class="form-control form-control-md rounded-0 g-py-15 g-px-15" name="password" type="password"  placeholder="********" v-model="form.password" required>

        <small class="form-control-feedback text-danger" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></small>

      </div>


      <div class="col-xs-12 col-sm-6 mb-4">
        <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Confirm Password:</label>
        <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="password_confirmation" type="password" placeholder="Password" v-model="form.password_confirmation">
      </div>
    </div>

    <div class="form-group mb-4">
      <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Upload your photo:</label> <br />
      <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
        <input id="fileAttachment" class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded" name="photo" type="file" @change="pictureUpload($event)">
        <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
        <span class="file-name">Attach photo</span>
      </label>

      <small class="form-control-feedback text-danger" v-if="form.errors.has('photo')" v-text="form.errors.get('photo')"></small>

    </div>

    <div class="row justify-content-between mb-5">
      <div class="col-8 align-self-center">
        <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25">
          <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="terms" type="checkbox" v-model="form.terms">
          <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
            <i class="fa" data-check-icon=""></i>
          </div>
          I accept the <a href="#!">Terms and Conditions</a>
          
          <div class="g-pos-abs g-top-25 g-left-30 u-has-error-v1"> 
            <small class="form-control-feedback text-danger" v-if="form.errors.has('terms')" v-text="form.errors.get('terms')"></small>
          </div>
          
        </label>
      </div>
      <div class="col-4 align-self-center text-right">
        <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="submit" @click.prevent="onSubmit">Signup</button>
      </div>
    </div>
  </form>
</template>

<script>
  import Form from '../utilities/Form.js';
  export default {
    data() {

      return  {
        form: new Form({
          name: '',
          email: '',
          password: '',
          password_confirmation: '',
          photo: null,
          terms: false
        })
      } 
    },

    methods: {
      onSubmit() {
        this.form.postWithFile('/register')
        .then(response => window.location.href = "/email-verification")
        .catch(response => console.log('Registration failed'));
      },

      pictureUpload(event) {
        this.form.photo = event.target.files[0];
      }
    }

  }
</script>