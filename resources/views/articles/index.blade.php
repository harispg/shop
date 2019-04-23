@extends('master')

@section('content')

	<!-- Products -->
      <div class="container">
        <!-- Filters -->
        <div class="d-flex justify-content-end align-items-center g-brd-bottom g-brd-gray-light-v4 g-pt-40 g-pb-20">
          <!-- Show -->
          <div class="g-mr-60">
            <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">Show:</h2>

            <!-- Secondary Button -->
            <div class="d-inline-block btn-group g-line-height-1_2">
              <button type="button" class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                9
              </button>
              <div class="dropdown-menu rounded-0">
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">All</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">5</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">15</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">20</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">25</a>
              </div>
            </div>
            <!-- End Secondary Button -->
          </div>
          <!-- End Show -->

          <!-- Sort By -->
          <div class="g-mr-60">
            <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">Sort by:</h2>

            <!-- Secondary Button -->
            <div class="d-inline-block btn-group g-line-height-1_2">
              <button type="button" class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Bestseller
              </button>
              <div class="dropdown-menu rounded-0">
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">Bestseller</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">Trending</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">Price low to high</a>
                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#!">price high to low</a>
              </div>
            </div>
            <!-- End Secondary Button -->
          </div>
          <!-- End Sort By -->

          <!-- Sort By -->
          <ul class="list-inline mb-0">
            <li class="list-inline-item">
              <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-gray-dark-v5 g-color-black--hover" href="page-list-filter-left-sidebar-1.html">
                <i class="icon-list"></i>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="u-icon-v2 u-icon-size--xs g-brd-primary g-color-primary" href="page-grid-filter-left-sidebar-1.html">
                <i class="icon-grid"></i>
              </a>
            </li>
          </ul>
          <!-- End Sort By -->
        </div>
        <!-- End Filters -->

        <!-- Products -->
        <div class="row g-pt-30 g-mb-50">
        @foreach($articles as $article)
          <div class="article col-6 col-lg-3 g-mb-30">
            <!-- Product -->
            <figure class="g-pos-rel g-mb-20">
              <a href="{{route('articles.show', ['article'=>$article->id])}}"><img class="img-fluid" src="/{{$article->photos->first()->thumbnail_path}}" alt="Image Description"></a>  
              @if($article->new)
              <figcaption class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover" href="#!">New Arrival</a>
              </figcaption>
              @endif
            </figure>

            <div class="media">
              <!-- Product Info -->
              <div class="d-flex flex-column">
                <h4 class="h6 g-color-black mb-1">
                  <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{ route('articles.show', ['article' => $article->id]) }}">
                    {{$article->name}}
                  </a>
                </h4>
                <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" href="{{route('categoryArticles', ['category'=>$article->categories->first()->name])}}">{{$article->categories->first()->name}}</a>
                <span class="d-block g-color-black g-font-size-17">{{$article->price}}</span>
              </div>
              <!-- End Product Info -->

              <ul class="list-inline media-body text-right">
                <li class="list-inline-item align-middle mx-0">
                  <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                     data-toggle="tooltip"
                     data-placement="top"
                     title="Add to Cart">
                    <i class="addToCart icon-finance-100 u-line-icon-pro" 
                       data-article="{{$article->id}}" 
                       data-order="@auth{{auth()->user()->activeOrder()->id}}@endauth"></i>
                  </a>
                </li>
                <li class="list-inline-item align-middle mx-0">
                  <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                     data-toggle="tooltip"
                     data-placement="top"
                     title="@if(auth()->check()){{$article->isWished()?"Remove from wishlist":"Add to wishlist"}}@else Add to wishlist @endif">
                    <i class="addToWishlist fa @if(auth()->check()){{$article->isWished()?"fa-heart text-danger":"fa-heart-o"}}@else fa-heart-o @endif g-font-size-18" data-article="{{$article->id}}"></i>
                  </a>
                </li>
              </ul>
              <!-- End Products Icons -->
            </div>
            <!-- End Product -->
          </div>
          @endforeach
        </div>

        <div class="modal inmodal fade" 
           id="loginModal" 
           tabindex="-1" 
           role="dialog"  
           aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                  <div class="row justify-content-center">
                    <div class="col-sm-8 g-py-80">
                      <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
                        <header class="text-center mb-4">
                          <h2 class="h2 g-color-black g-font-weight-600">Login</h2>
                        </header>

                        <!-- Form -->
                        <form id="signinForm">
                          @csrf
                          <div class="form-group mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                            <input class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="email" type="email"  placeholder="johndoe@gmail.com">
                            
                                <small class="form-control-feedback loginError text-danger"></small>
                            
                          </div>

                         <div class="form-group g-mb-35">
                            <div class="row justify-content-between">
                              <div class="col align-self-center">
                                <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                              </div>
                              <div class="col align-self-center text-right">
                                <a class="d-inline-block g-font-size-12 mb-2" href="{{route('password.request')}}">Forgot password?</a>
                              </div>
                            </div>
                            <input class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="password" type="password"  placeholder="Password" required>
                            
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
                                <button id="signinButton" class="btn btn-md u-btn-primary rounded g-py-13 g-px-25" type="button">Login</button>
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
                        </form>
                        <!-- End Form -->

                        <footer class="text-center">
                          <p id="signupLink" class="g-color-gray-dark-v5 g-font-size-13 mb-0">Don't have an account? <a class="g-font-weight-600" href="!#">signup</a>
                          </p>
                        </footer>
                      </div>
                    </div>
                  </div>                   
                </div>
            </div>
          </div>
        </div>

        <div class="modal inmodal fade" 
           id="signupModal" 
           tabindex="-1" 
           role="dialog"  
           aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-body">
                  <div class="row justify-content-center">
                    <div class="col-sm-8 g-py-80">
                      <div class="g-brd-around g-brd-gray-light-v4 rounded g-py-40 g-px-30">
                        <header class="text-center mb-4">
                          <h2 class="h2 g-color-black g-font-weight-600">Signup</h2>
                        </header>

                       <form id="signupForm" action="/register" method="POST">
                          @csrf
                        <div class="row">
                            <div class='form-group col-xs-12 col-sm-12 mb-4'>
                              <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Name:</label>
                              <input class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="name" type="text" value="{{old('name')}}" placeholder="John" required>
                              
                                  <small class="form-control-feedback su-name-error text-danger"></small>
                              
                            </div>
                        </div>

                        <div class="form-group mb-4">
                          <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Email:</label>
                          <input class="form-control form-control-md form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="email" type="email" placeholder="johndoe@gmail.com" required>
                          
                              <small class="form-control-feedback su-email-error text-danger"></small>
                          
                        </div>

                        <div class="row">
                          <div class="form-group col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Password:</label>
                            <input class="form-control form-control-md rounded-0 g-py-15 g-px-15" name="password" type="password" value="{{old('password')}}" placeholder="********" required>
                            
                              <small class="form-control-feedback su-password-error text-danger"></small>
                            
                          </div>
                          

                          <div class="col-xs-12 col-sm-6 mb-4">
                            <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Confirm Password:</label>
                            <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded g-py-15 g-px-15" name="password_confirmation" type="password" placeholder="Password">
                          </div>
                        </div>

                        <div class="form-group mb-4">
                          <label class="g-color-gray-dark-v2 g-font-weight-600 g-font-size-13">Upload your photo:</label> <br />
                          <label class="u-file-attach-v2 g-color-gray-dark-v5 mb-0">
                            <input id="fileAttachment" class="form-control form-control-md g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v4 g-brd-primary--hover rounded signupPhoto" name="photo" type="file">
                            <i class="icon-cloud-upload g-font-size-16 g-pos-rel g-top-2 g-mr-5"></i>
                            <span class="file-name">Attach photo</span>
                          </label>
                          
                              <small class="form-control-feedback su-photo-error text-danger"></small>
                          
                        </div>

                        <div class="row justify-content-between mb-5">
                          <div class="col-8 align-self-center">
                            <label class="form-check-inline u-check g-color-gray-dark-v5 g-font-size-13 g-pl-25">
                              <input id="terms" class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="terms" type="checkbox">
                              <div class="u-check-icon-checkbox-v6 g-absolute-centered--y g-left-0">
                                <i class="fa" data-check-icon=""></i>
                              </div>
                              I accept the <a href="#!">Terms and Conditions</a>
                              
                              <div class="g-pos-abs g-top-25 g-left-30 u-has-error-v1"> 
                                <small class="form-control-feedback su-terms-error text-danger"></small>
                              </div>
                              
                            </label>
                          </div>
                          <div class="col-4 align-self-center text-right">
                            <button class="btn btn-md u-btn-primary rounded g-py-13 g-px-25 signupButton" type="button">Signup</button>
                          </div>
                        </div>


                      </form>
                        <!-- End Form -->
                      </div>
                    </div>
                  </div> 
                </div>
            </div>
          </div>
        </div>

        <hr class="g-mb-60">
        {{$articles->links()}}
      </div>
      <!-- End Products -->

@endsection

@section('script')
<script>

  $(document).on('ready', function(){
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

    //Add to cart
    $(".article").on('click', '.addToCart', function(){
      var orderId = $(this).data('order');
      var articleId = $(this).data('article');

      $.ajax('/userTokensForApiAuthentication',{
          method: 'GET'
        }).done(auth_check_callback);

      function auth_check_callback(tokens){
        if(tokens.API_TOKEN == 'Unauthenticated'){
          $("#loginModal").modal('toggle');

          $("button#signinButton").on('click', function(){

            var formData = new FormData(document.getElementById("signinForm"));

            $.ajax({
                url: '/login',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
            }).done(function(response) {
              $("#loginModal").modal('toggle');
              setTimeout(function(){
              location.reload();
            }, 300);
            }).fail(function(response){
              if (response.responseJSON.errors != null){
                $(".loginError").text(response.responseJSON.errors.email);
              }
            });
          });
            return;
        }else{
          $.ajax('/api/orders/'+orderId+'/addArticle/'+articleId,{
            type: 'POST',
            data:{_token: tokens.CSRF_TOKEN, api_token: tokens.API_TOKEN},
          }).done(function(items){
            location.reload();
          });
        }
      }

      
    });

    $("#signupLink").on('click', function(e) {
      e.preventDefault();
      e.stopPropagation();
      $("#loginModal").modal("toggle");
      $("#signupModal").modal("toggle");
    });

    $("button.signupButton").on('click', function(){
      var formData = new FormData(document.getElementById("signupForm"));

      $.ajax({
                url: '/register',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
            }).done(function(response) {
              $("#signupModal").modal('toggle');
              setTimeout(function(){
              location.reload();
            }, 300);
            }).fail(function(response){

              $(".su-name-error").text("");
              $(".su-email-error").text("");
              $(".su-password-error").text("");
              $(".su-photo-error").text("");
              $(".su-terms-error").text("");

              if (response.responseJSON.errors != null){
                var errors = response.responseJSON.errors;
                if(errors.name != null){
                  $(".su-name-error").text(errors.name);
                }
                if(errors.email != null){
                  $(".su-email-error").text(errors.email);
                }
                if(errors.password != null){
                  $(".su-password-error").text(errors.password);
                }
                if(errors.photo != null){
                  $(".su-photo-error").text(errors.photo);
                }
                if(errors.terms != null){
                  $(".su-terms-error").text(errors.terms);
                }
              }
            });
    });
    //---END---Add to cart
    

    //File name change
    $('.fileAttachment').on('change', function() {
       let fileName = $(this).val().split('\\').pop();
       $(this).next('.file-name').html(fileName);
    });
    

    //Add to wishlist

    $("i.addToWishlist").click(function(){
      var iconElement = $(this);
      var parentElement = iconElement.parent();
      var classes = iconElement.attr("class");
      var articleId = iconElement.data('article');

      function toggleWishlist(articleId){

        $.ajax('/userTokensForApiAuthentication',{
            method: 'GET'
          }).done(auth_check_callback);

        function auth_check_callback(tokens){
        if(tokens.API_TOKEN == 'Unauthenticated'){
          $("#loginModal").modal('toggle');

          $("button#signinButton").on('click', function(){

            var formData = new FormData(document.getElementById("signinForm"));

            $.ajax({
                url: '/login',
                type: 'POST',
                contentType: false,
                cache: false,
                processData: false,
                data: formData,
            }).done(function(response) {
              $("#loginModal").modal('toggle');
              setTimeout(function(){
              location.reload();
            }, 300);
            }).fail(function(response){
              if (response.responseJSON.errors != null){
                $(".loginError").text(response.responseJSON.errors.email);
              }
            });
          });
            return;
          }else{
            $.ajax('/api/wishlist/'+articleId,{
              type: 'POST',
              data:{_token: tokens.CSRF_TOKEN, api_token: tokens.API_TOKEN},
            });
          }
        }  
      }



      if(classes.indexOf("fa-heart-o")>=0){
        parentElement.tooltip('hide')
        .attr('data-original-title', 'Remove from wishlist')
        .tooltip('show');
        iconElement.removeClass("fa-heart-o");
        iconElement.addClass("fa-heart");
        iconElement.addClass("text-danger");
        toggleWishlist(articleId);
        
      }else{
        parentElement.tooltip('hide')
        .attr('data-original-title', 'Add to wishlist')
        .tooltip('show');
        iconElement.removeClass("fa-heart");
        iconElement.addClass("fa-heart-o");
        iconElement.removeClass("text-danger");
        toggleWishlist(articleId);
      }

    });

    
  });
</script>
@endsection