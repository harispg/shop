@extends('master')
@section('content')
    <section class="container g-py-100">
      <div class="row justify-content-center">
        <div class="col-sm-10 col-md-9 col-lg-6">
          <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
            <header class="text-center mb-4">
              <h2 class="h2 g-color-black g-font-weight-600">Signup</h2>
            </header>

            <!-- Form -->
            <form class="g-py-15" enctype="multipart/form-data" method="POST" action="{{route('register')}}">
                @csrf
              <div class="row">
                  <div class='form-group col-xs-12 col-sm-12 mb-4 {{$errors->has('name')?"u-has-error-v1":""}}'>
                    <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Name:</label>
                    <input class="form-control form-control-md {{$errors->has('name')?"rounded-0":"g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded"}} g-py-15 g-px-15" name="name" type="text" value="{{old('name')}}" placeholder="John" required>
                    @if($errors->has('name'))
                        <small class="form-control-feedback">{{$errors->first('name')}}</small>
                    @endif
                  </div>
              </div>

              <div class="form-group mb-4 {{$errors->has('email')?"u-has-error-v1":""}}">
                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                <input class="form-control form-control-md form-control-md {{$errors->has('email')?"rounded-0":"g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded"}} g-py-15 g-px-15" name="email" type="email" value="{{old('email')}}" placeholder="johndoe@gmail.com" required>
                @if($errors->has('email'))
                    <small class="form-control-feedback">{{$errors->first('email')}}</small>
                @endif
              </div>

              <div class="row">
                <div class="form-group col-xs-12 col-sm-6 mb-4 {{$errors->has('password')?"u-has-error-v1":""}}">
                  <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                  <input class="form-control form-control-md rounded-0{{$errors->has('password')?"g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded":""}} g-py-15 g-px-15" name="password" type="password" value="{{old('password')}}" placeholder="********" required>
                  @if($errors->has('password'))
                    <small class="form-control-feedback">{{$errors->first('password')}}</small>
                  @endif
                </div>
                

                <div class="col-xs-12 col-sm-6 mb-4">
                  <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Confirm Password:</label>
                  <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="password_confirmation" type="password" placeholder="Password">
                </div>
              </div>

              <div class="form-group mb-4 {{$errors->has('photo')?"u-has-error-v1":""}}">
                <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                  <input id="fileAttachment" class="form-control form-control-md {{$errors->has('photo')?"rounded-0":"g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded"}}" name="photo" type="file">
                  <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                  <span class="file-name">Attach file</span>
                </label>
                @if($errors->has('photo'))
                    <small class="form-control-feedback">{{$errors->first('photo')}}</small>
                @endif
              </div>

              {{-- <div class="form-group mb-4 {{$errors->has('photo')?"u-has-error-v1":""}}">
                <label class="custom-file g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">
                <input class="form-control form-control-md {{$errors->has('photo')?"rounded-0":"g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded"}} g-py-15 g-px-15" id="file" name="photo" type="file" value="{{old('photo')}}" placeholder="johndoe@gmail.com" required>
                <span class="custom-file-label rounded-0"></span></label>
                @if($errors->has('photo'))
                    <small class="form-control-feedback">{{$errors->first('photo')}}</small>
                @endif
              </div> --}}

              <div class="row justify-content-between mb-5">
                <div class="col-8 align-self-center {{$errors->has('terms')?"u-has-error-v1":""}}">
                  <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25">
                    <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0 {{$errors->has('terms')?"form-control-feedback":""}}" name="terms" type="checkbox">
                    <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                      <i class="fa" data-check-icon=""></i>
                    </div>
                    I accept the <a href="#!">Terms and Conditions</a>
                    @if($errors->has('terms'))
                    <div class="g-pos-abs g-top-25 g-left-30 u-has-error-v1"> 
                      <small class="form-control-feedback">{{$errors->first('terms')}}</small>
                    </div>
                    @endif
                  </label>
                </div>
                <div class="col-4 align-self-center text-right">
                  <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="submit">Signup</button>
                </div>
              </div>


            </form>
            <!-- End Form -->

            <footer class="text-center">
              <p class="g-color-gray-dark-v5 g-font-size-13 mb-0">Already have an account? <a class="g-font-weight-600" href="{{route('login')}}">signin</a>
              </p>
            </footer>
          </div>
        </div>
      </div>
    </section>
@endsection

@section('script')
<script type="text/javascript">
  $(document).ready(function(){
    
    $("input[type='file']").change(function(){
    var filename = $('input[type=file]').val().split('\\').pop();
    $("span.file-name").html(filename);
    });
  });
</script>
@endsection