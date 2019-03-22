<!-- Products -->
      <div class="container g-pb-100">
        <div class="text-center mx-auto g-max-width-600 g-mb-50">
          <h2 class="g-color-black mb-4">Featured Products</h2>
          <p class="lead">We want to create a range of beautiful, practical and modern outerwear that doesn't cost the earth – but let's you still live life in style.</p>
        </div>

        <div id="carouselCus1" class="js-carousel g-pb-100 g-mx-minus-10"
             data-infinite="true"
             data-slides-show="4"
             data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
             data-arrow-left-classes="fa fa-angle-left g-left-10"
             data-arrow-right-classes="fa fa-angle-right g-right-10"
             data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
            
            @foreach($articles as $article)
            <div class="js-slide">
            <div class="g-px-10">
              <!-- Product -->
              <figure class="g-pos-rel g-mb-20">
                <img class="img-fluid" src="/{{$article->photos->first()->path}}" alt="Image Description">

                @if($article->discount > 0)
                <span class="u-ribbon-v1 g-width-40 g-height-40 g-color-white g-bg-primary g-font-size-13 text-center text-uppercase g-rounded-50x g-top-10 g-right-minus-10 g-px-2 g-py-10">-{{$article->discount}}%</span>
                @endif

                @if($article->new)
                <figcaption class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                  <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover" 
                  href="{{route('articles.new')}}">New Arrival</a>
                </figcaption>
                @endif
              </figure>

              <div class="media">
                <!-- Product Info -->
                <div class="d-flex flex-column">
                  <h4 class="h6 g-color-black mb-1">
                    <a class="u-link-v5 g-color-black g-color-primary--hover" 
                       href="{{route('articles.show', ['article' => $article->id])}}">
                      {{$article->name}}
                    </a>
                  </h4>
                  <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" 
                      href="{{route('categoryArticles', ['category'=>$article->categories->first()->id ])}}">{{$article->categories->first()->name}}</a>
                  <span class="d-block g-color-black g-font-size-17">$11.00</span>
                </div>
                <!-- End Product Info -->

                <!-- Products Icons -->
                <ul class="list-inline media-body text-right">
                  <li class="list-inline-item align-middle mx-0">
                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Add to Cart">
                      <i class="icon-finance-100 u-line-icon-pro"></i>
                    </a>
                  </li>
                  <li class="list-inline-item align-middle mx-0">
                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle" href="#!"
                       data-toggle="tooltip"
                       data-placement="top"
                       title="Add to Wishlist">
                      <i class="icon-medical-022 u-line-icon-pro"></i>
                    </a>
                  </li>
                </ul>
                <!-- End Products Icons -->
              </div>
              <!-- End Product -->
            </div>
          </div>
            @endforeach


        </div>
      </div>
      <!-- End Products -->