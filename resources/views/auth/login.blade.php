@extends('master')

@section('content')

    <!-- Breadcrumbs -->
    {{-- <section class="g-bg-gray-light-v5 g-py-50">
      <div class="container">
        <div class="d-sm-flex text-center">
          <div class="align-self-center">
            <h2 class="h3 g-font-weight-300 w-100 g-mb-10 g-mb-0--md">Login</h2>
          </div>

          <div class="align-self-center ml-auto">
            <ul class="u-list-inline">
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Home</a>
                <i class="g-color-gray-light-v2 g-ml-5">/</i>
              </li>
              <li class="list-inline-item g-mr-5">
                <a class="u-link-v5 g-color-main g-color-primary--hover" href="#!">Pages</a>
                <i class="g-color-gray-light-v2 g-ml-5">/</i>
              </li>
              <li class="list-inline-item g-color-primary">
                <span>Login</span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section> --}}
    <!-- Breadcrumbs -->

    <!-- Login -->
    <section class="container g-py-100">
      <div class="row justify-content-center">
        <div class="col-sm-8 col-lg-5">
          <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
            <header class="text-center mb-4">
              <h2 class="h2 g-color-black g-font-weight-600">Login</h2>
            </header>

            <!-- Form -->
            <form class="g-py-15" action="{{route('login')}}" method="POST">
              @csrf
              <div class="form-group mb-4 {{$errors->has('email')?"u-has-error-v1":""}}">
                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                <input class="form-control form-control-md {{$errors->has('email')?"rounded-0":"g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded"}} g-py-15 g-px-15" name="email" type="email"  placeholder="johndoe@gmail.com" value="{{old('email')}}"required>
                @if($errors->has('email'))
                    <small class="form-control-feedback">{{$errors->first('email')}}</small>
                @endif
              </div>

             <div class="form-group g-mb-35 {{$errors->has('email')?"u-has-error-v1":""}}">
                <div class="row justify-content-between">
                  <div class="col align-self-center">
                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                  </div>
                  <div class="col align-self-center text-right">
                    <a class="d-inline-block g-font-size-12 mb-2" href="{{route('password.request')}}">Forgot password?</a>
                  </div>
                </div>
                <input class="form-control form-control-md {{$errors->has('email')?"rounded-0":"g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded"}} g-py-15 g-px-15" name="password" type="password"  placeholder="Password" required>
                
              </div>

              <div class="row justify-content-between">
                  <div class="col-8 align-self-center">
                    <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25 mb-0">
                      <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" type="checkbox" name="remember">
                      <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                        <i class="fa" data-check-icon=""></i>
                      </div>
                      Keep signed in
                    </label>
                  </div>
                  <div class="col-4 align-self-center text-right">
                    <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="submit">Login</button>
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
                    <a class="u-icon-v1 u-icon-size--sm u-icon-slide-up--hover g-color-white g-bg-google-plus rounded-circle" href="{{route('loginGoogle')}}">
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

              {{-- <div class="d-flex justify-content-center text-center g-mb-30 pt-4">
                <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
                <span class="align-self-center g-color-gray-dark-v5 mx-4">OR</span>
                <div class="d-inline-block align-self-center g-width-50 g-height-1 g-bg-gray-light-v1"></div>
              </div>

              <div class="row no-gutters">
                <div class="col-6">
                  <button class="btn btn-block u-btn-facebook g-py-13 mr-2" type="button">
                    <i class="mr-1 fa fa-facebook"></i>
                    Facebook
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn btn-block u-btn-twitter g-py-13 ml-2" type="button">
                    <i class="mr-1 fa fa-twitter"></i>
                    Twitter
                  </button>
                </div>
              </div> --}}
            </form>
            <!-- End Form -->

            <footer class="text-center">
              <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Don't have an account? <a class="g-font-weight-600" href="{{route('register')}}">signup</a>
              </p>
            </footer>
          </div>
        </div>
      </div>
    </section>
    <!-- End Login -->
@endsection