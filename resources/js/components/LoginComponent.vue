<template>
  <div>
    <form class="g-py-15" 
    @submit.prevent="onSubmit" 
    @keydown="form.errors.clear($event.target.name)">
    <div class="form-group mb-4">
      <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
      <input class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="email" type="email"  placeholder="johndoe@gmail.com" v-model="form.email" required>

      <small class="form-control-feedback text-danger" v-if="form.errors.has('email')" v-text="form.errors.get('email')"></small>

    </div>

    <div class="form-group g-mb-35">
      <div class="row justify-content-between">
        <div class="col align-self-center">
          <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
        </div>
        <div class="col align-self-center text-right">
          <a class="d-inline-block g-font-size-12 mb-2" href="/password/reset">Forgot password?</a>
        </div>
      </div>
      <input class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="password" type="password"  placeholder="Password" v-model="form.password" required>
      <small class="form-control-feedback text-danger" v-if="form.errors.has('password')" v-text="form.errors.get('password')"></small>

    </div>

    <div class="row justify-content-between">
      <div class="col-8 align-self-center">
        <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25 mb-0">
          <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="remember" v-model="form.remember">
          <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
            <i class="fa" data-check-icon=""></i>
          </div>
          Keep signed in
        </label>
      </div>
      <div class="col-4 align-self-center text-right">
        <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" @click.prevent="onSubmit" :disabled="form.errors.any()">Login</button>
      </div>
    </div>

    <div class="d-flex justify-content-center text-center g-mb-30 pt-4">
      <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
      <span class="align-self-center g-color-gray-dark-v3 mx-4">OR</span>
      <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
    </div>

    <!-- Form Social Icons -->
    <ul class="list-inline text-center mb-4">
      <li class="list-inline-item g-mx-2">
        <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-facebook rounded-circle" href="#!">
          <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-facebook"></i>
          <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-facebook"></i>
        </a>
      </li>
      <li class="list-inline-item g-mx-2">
        <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-twitter rounded-circle" href="#!">
          <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-twitter"></i>
          <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-twitter"></i>
        </a>
      </li>
      <li class="list-inline-item g-mx-2">
        <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-google-plus rounded-circle" href="/login/google">
          <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-google"></i>
          <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-google"></i>
        </a>
      </li>
      <li class="list-inline-item g-mx-2">
        <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-linkedin rounded-circle" href="#!">
          <i class="g-font-size-default g-line-height-1 u-icon__elem-regular fa fa-linkedin"></i>
          <i class="g-font-size-default g-line-height-0_8 u-icon__elem-hover fa fa-linkedin"></i>
        </a>
      </li>
    </ul>
  </form>
  <!-- End Form -->

  <footer class="text-center">
    <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Don't have an account? <a id="signupLink" class="g-font-weight-600" href="/register">signup</a>
    </p>
  </footer>
</div>
</template>

<script>
  import Form from '../utilities/Form.js';

  export default {

    data() {
      return {
        form: new Form({
          email: '',
          password: '',
          remember: false,
          _token: $('meta[name="csrf-token"]').attr('content')
        })
      }
    },

    methods: {

      onSubmit() {
        this.form.post('/login')
        .then(response => location.reload())
        .catch(response => console.log('Authentication not successful'));
      }
    }

  }
</script>