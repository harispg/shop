  @extends('master')

@section('content')

	<!-- Product Description -->
      <div class="container g-pt-50 g-pb-100">
        <div class="row">
          <div class="col-lg-7">
            <!-- Carousel -->
            <div id="carouselCus1" class="js-carousel g-pt-10 g-mb-10"
                 data-infinite="true"
                 data-fade="true"
                 data-arrows-classes="u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-14 g-color-white g-color-primary--hover rounded-circle"
                 data-arrow-left-classes="fa fa-angle-left g-left-40"
                 data-arrow-right-classes="fa fa-angle-right g-right-40"
                 data-nav-for="#carouselCus2">

                 @foreach($article->photos as $photo)
	              <div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after">
	                <img class="img-fluid w-100" src="/{{$photo->path}}" alt="Image Description">
	              </div>
              	 @endforeach

            </div>

            <div id="carouselCus2" class="js-carousel text-center u-carousel-v3 g-mx-minus-5"
                 data-infinite="true"
                 data-center-mode="true"
                 data-slides-show="3"
                 data-is-thumbs="true"
                 data-nav-for="#carouselCus1">

                 @foreach($article->photos as $photo)
	              <div class="js-slide g-cursor-pointer g-px-5">
	                <img class="img-fluid" src="/{{$photo->thumbnail_path}}" alt="Image Description">
	              </div>
                 @endforeach

            </div>
            <!-- End Carousel -->
          </div>

          <div class="col-lg-5">
            <div class="g-px-40--lg g-pt-70">
              <!-- Product Info -->
              <div class="g-mb-30">
                <h1 class="g-font-weight-300 mb-4">{{$article->name}}</h1>

                @include('ratings.rating')
                <p>{{$article->description}}</p>
              </div>
              <!-- End Product Info -->
              <!-- TAGS  -->
                <ul class="u-list-inline">
                  @foreach($article->tags as $tag) 
                  <li class="list-inline-item g-mb-10">
                    <a class="u-tags-v1 g-color-purple g-brd-around g-brd-purple g-bg-purple--hover g-color-white--hover g-py-4 g-px-10" href="{{route('tags.articles', ['tag' => $tag->name])}}">{{$tag->name}}</a>
                  </li>
                  @endforeach
                </ul>
              <!-- END TAGS -->
              <!-- Price -->
              <div class="g-mb-30">
                <h2 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-12 text-uppercase mb-2">Price</h2>
                <span class="g-color-black g-font-weight-500 g-font-size-30 mr-2">{{$article->price}}</span>
                <s class="g-color-gray-dark-v4 g-font-weight-500 g-font-size-16">{{$article->price + $article->price*0.1}}</s>
              </div>
              <!-- End Price -->

              

              <!-- Quantity -->
              <div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3 g-mb-30" role="tab">
                <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">Quantity</h5>

                <div class="js-quantity input-group u-quantity-v1 g-width-80 g-brd-primary--focus">
                  <input class="js-result form-control text-center g-font-size-13 rounded-0" type="text" 
                   @if($user = auth()->user())value="{{$item = $user->activeOrder()->getItem($article)?$user->activeOrder()->getItem($article)->quantity:'0'}}"@else
                   value="0"
                   @endif 
                  readonly>

                  <div class="input-group-addon d-flex align-items-center g-width-30 g-brd-gray-light-v2 g-bg-white g-font-size-13 rounded-0 g-pa-5">
                    <i class="js-plus g-color-gray g-color-primary--hover fa fa-angle-up"></i>
                    <i class="js-minus g-color-gray g-color-primary--hover fa fa-angle-down"></i>
                  </div>
                </div>
              </div>
              <!-- End Quantity -->
              <span id="currentNumber" class="text-success" hidden></span>
              <!-- Buttons -->
              <div class="row g-mx-minus-5 g-mb-20 g-mt-50">
                <div class="col g-px-5 g-mb-10">
                  <button id="addToCart" class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25" type="button" @if(auth()->check()) data-order="{{auth()->user()->activeOrder()->id}}"@endif data-article="{{$article->id}}">
                    Add to cart<i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
                  </button>
                </div>
                <div class="col g-px-5 g-mb-10">
                  <button id="addToWishlist" class="btn btn-block btn-outline-{{$article->isWished()?"danger":"secondary"}} g-color-gray-dark-v4 g-color-white--hover g-font-size-11 text-uppercase g-py-15" data-article="{{$article->id}}" type="button">
                    <span>{{$article->isWished()?"Remove from wishlist":"Add to wishlist"}}</span><i
                    class="align-middle
                     ml-2 fa
                     {{$article->isWished()?"fa-heart text-danger":"fa-heart-o"}}
                      g-font-size-15"></i>
                  </button>
                </div>
              </div>
              <!-- End Buttons -->

            </div>
          </div>
        </div>
      </div>
      <!-- End Product Description -->

      <!-- Description -->
      <div class="container">
        <div class="g-brd-y g-brd-gray-light-v4 g-pt-100 g-pb-70">
          <h2 class="h4 mb-3">Specification</h2>

          <div class="row">
            <div class="col-md-12 g-mb-30">
              <p>The streak started in late October. Canelas 2010, an unheralded amateur soccer team, suddenly could not stop winning.</p>
              <p>It went 10 straight matches without dropping a point, without so much as conceding a goal, a surge that brought the prospect of promotion out of its local league and into the comparative big time of the national third division.</p>
            </div>

            <div class="col-md-12 g-mb-0 g-mb-30--md"  style="overflow:hidden">
              {!! $article->specification !!}
            </div>

            
          </div>
        </div>
      </div>
      <!-- End Description -->

      <!-- comments -->
      
      @include('comments.comments')

      @include('unify.featuredProducts')
      

      <!-- Call to Action -->
      <div class="g-bg-primary">
        <div class="container g-py-20">
          <div class="row justify-content-center">
            <div class="col-md-4 mx-auto g-py-20">
              <!-- Media -->
              <div class="media g-px-50--lg">
                <i class="d-flex g-color-white g-font-size-40 g-pos-rel g-top-3 mr-4 icon-real-estate-048 u-line-icon-pro"></i>
                <div class="media-body">
                  <span class="d-block g-color-white g-font-weight-500 g-font-size-17 text-uppercase">Free Shipping</span>
                  <span class="d-block g-color-white-opacity-0_8">In 2-3 Days</span>
                </div>
              </div>
              <!-- End Media -->
            </div>

            <div class="col-md-4 mx-auto g-brd-x--md g-brd-white-opacity-0_3 g-py-20">
              <!-- Media -->
              <div class="media g-px-50--lg">
                <i class="d-flex g-color-white g-font-size-40 g-pos-rel g-top-3 mr-4 icon-real-estate-040 u-line-icon-pro"></i>
                <div class="media-body">
                  <span class="d-block g-color-white g-font-weight-500 g-font-size-17 text-uppercase">Free Returns</span>
                  <span class="d-block g-color-white-opacity-0_8">No Questions Asked</span>
                </div>
              </div>
              <!-- End Media -->
            </div>

            <div class="col-md-4 mx-auto g-py-20">
              <!-- Media -->
              <div class="media g-px-50--lg">
                <i class="d-flex g-color-white g-font-size-40 g-pos-rel g-top-3 mr-4 icon-hotel-restaurant-062 u-line-icon-pro"></i>
                <div class="media-body text-left">
                  <span class="d-block g-color-white g-font-weight-500 g-font-size-17 text-uppercase">Free 24</span>
                  <span class="d-block g-color-white-opacity-0_8">Days Storage</span>
                </div>
              </div>
              <!-- End Media -->
            </div>
          </div>
        </div>
      </div>
      <!-- End Call to Action -->

@endsection

@section('script')
 <script>
   $(document).on('ready', function(){

    //fill stars according to user rating of the article
      function fillStars(rating){
       var collection = $(".js-rating");
       var i=0;
       $(collection).children("li").each(function(){
        if(i<rating){
          $(this).addClass("g-color-primary ");
          i++;
        }
       });}

    //Open reply to comment form
      $(".replyToggler").on('click', function(){
        var commentId = $(this).data('comment');
        var container= $(".reply#"+commentId);
        var button = container.find("button");
        if(container.attr("hidden")){
          container.attr("hidden", false);
          container.find("textarea").focus();
          button.removeClass("g-py-15 g-px-25");
          button.html("Reply");
        }else{
          $(".reply#"+commentId).attr("hidden", true);
        }
      });

      //Users rating of the article
      var rating = $(".js-rating").data("rating-by-user");
      //ratings plugin initialization
      $.HSCore.helpers.HSRating.init();
      //draw stars acording to users rating
      fillStars(rating);

      //rating ajax
      $(".js-rating").on('click','li', function(){
        var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
        var rating = $(this).parent();
        var stars = rating.children(".click").length;
        var articleId = rating.data('article');
        $.ajax({
          type: 'POST',
          dataType: 'JSON',
          url: "/ratings/"+articleId,
          data: {_token: CSRF_TOKEN, rating: stars},
          success: function(response){
            $(".avgRating").html("Average rating: "+response[0]);
            if(response[2]==1){
              $(".usersRatings").html("Rated by: 1 person");
            }else{
              $(".usersRatings").html("Rated by: "+response[2]+" people");
            }
          },
          error: function(response){
            $(".notAllowed").html(response.statusText);
            $(".notAllowed").attr("hidden", false);
          }
        });

      });
      //deleting comments
      $(".delete").on('click', function(e){
        e.preventDefault();
        var commentId = $(this).data('comment');
        var _this = $(this);

        var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
        swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
          type: 'POST',
          method: 'DELETE',
          url: "/comments/"+commentId,
          data: {_token: CSRF_TOKEN, _method: 'DELETE'},
          success: function(response){
            _this.closest("li").attr("hidden", true);
          },
          error: function(response){
            /*swal.fire({
              type: 'error',
              title: response.responseText,
              text: 'You need to be registered to rate articles',
              showConfirmButton: false,
              timer: 1500,
            });*/
            $(".delete-warning").attr("hidden", false);
            $(".delete-warning").html(response.statusText);
          }
        });

          swal.fire({
            title:'Deleted!',
            text: 'Your category has been deleted.',
            type:'success',
            showConfirmButton:false,
            'timer': 850
          })
        }
      });
        
      });

      //Add to cart
      $("#addToCart").on('click', function(){
        var API_TOKEN = $("meta[name='api-token']").attr('content');
        if(API_TOKEN == undefined){
          swal.fire({
            type: 'info',
            title: 'Please register',
            text: 'You have to register before using all features.'
          });
          return;
        }
        var quantity = $("input.js-result").val();
        var _this = $(this);
        var orderId = $(this).data('order');
        var articleId = $(this).data('article');
        var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
        var API_TOKEN = $("meta[name='api-token']").attr('content');
        $.ajax({
          url: '/api/orders/'+orderId+'/addArticle/'+articleId,
          type:'POST',
          data:{_token:CSRF_TOKEN, api_token: API_TOKEN, quantity: quantity, order: orderId, article: articleId},
          success: function(response){
            console.log(response);
            location.reload();
          }
        });
      });
      //---END--- Add to cart
      
      //Add to wishlist
      function toggleWishlist(articleId){
        var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
        var API_TOKEN = $("meta[name='api-token']").attr('content');
        $.ajax({
            url:'/api/wishlist/'+articleId,
            method: 'post',
            data: {_token:CSRF_TOKEN, api_token:API_TOKEN}
          });
      }
      $("#addToWishlist").click(function(){
        var API_TOKEN = $("meta[name='api-token']").attr('content');
        if(API_TOKEN == undefined){
          swal.fire({
            type: 'warning',
            title: 'Please register',
            text: 'You have to register before using all features.'
          });
          return;
        }
        var button = $(this);
        var iconElement = button.find("i.fa");
        var spanElement = button.find("span");
        var classes = iconElement.attr("class");
        var articleId = button.data('article');
        if(classes.indexOf("fa-heart-o")>=0){
          button.removeClass("btn-outline-secondary");
          button.addClass("btn-outline-danger");
          spanElement.text("Remove from wishlist");
          iconElement.removeClass("fa-heart-o");
          iconElement.addClass("fa-heart");
          iconElement.addClass("text-danger");
          toggleWishlist(articleId);
          
        }else{
          button.removeClass("btn-outline-danger");
          button.addClass("btn-outline-secondary");
          spanElement.text("Add to wishlist");
          iconElement.removeClass("fa-heart");
          iconElement.addClass("fa-heart-o");
          iconElement.removeClass("text-danger");
          toggleWishlist(articleId);
        }
      });
   });

 </script>
@endsection