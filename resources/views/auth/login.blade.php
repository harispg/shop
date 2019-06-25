@extends('master')

@section('content')

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
              @if(request()->has('previous'))
                <input type="hidden" name="previous" value={{request()->get('previous')}}>
              @else
                <input type="hidden" name="previous" value={{\URL::previous()}}>
              @endif
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


                     <div class="row justify-content-center mb-5">
                       <a class="btn btn-outline-primary" href="{{route('loginGoogle')}}" style="text-transform:none">
                          <img width="20px" alt="Google &quot;G&quot; Logo" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png"/>
                           Login with Google
                       </a>
                     </div>
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