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
          {{-- <shop-articles></shop-articles> --}}
        <div class="row g-pt-30 g-mb-50">
        @foreach($articles as $article)
          <div class="article col-6 col-lg-3 g-mb-30">
            <shop-article :article="{{$article}}"></shop-article>
            <!-- Product -->
            {{-- <figure class="g-pos-rel g-mb-20">
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
              End Product Info

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
                     title="{{$article->isWished()?"Remove from wishlist":"Add to wishlist"}}">
                    <i class="addToWishlist fa {{$article->isWished()?"fa-heart text-danger":"fa-heart-o"}} g-font-size-18" data-article="{{$article->id}}"></i>
                  </a>
                </li>
              </ul>
              <!-- End Products Icons -->
            </div> --}}
            <!-- End Product -->
          </div>
          @endforeach
        </div>

        <modal-login></modal-login>

        <div id="loginModal" class="modal inmodal fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                        <div class="g-px-30 g-py-20">
                          <h2>Login</h2>
                        <!-- Form -->
                       <login-component></login-component>
                        <!-- End Form -->    
                        </div>              
                </div>
            </div>
          </div>
        </div>

        <div id="signupModal" class="modal inmodal fade" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                        <div class="g-px-30 g-py-20">
                          <h2>Login</h2>
                        <!-- Form -->
                       <register-component></register-component>
                        <!-- End Form -->    
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

  /*$(document).on('ready', function(){
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

    
  });*/
</script>
@endsection