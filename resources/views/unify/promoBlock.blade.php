      <!-- Promo Block -->
      @if(App\Article::all()->count()>0)
      <section class="g-min-height-100vhg-flex-centered g-bg-secondary g-pos-rel">
        <div class="container g-pt-100 g-pb-70">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-8 col-lg-6 order-md-2 g-mb-30">
              <div class="g-pos-rel">
                <img class="img-fluid w-100" src="{{App\Article::first()->photos->first()->thumbnail_path}}" alt="Image Description">
                <span class="u-icon-v1 g-width-85 g-height-85 g-brd-3 g-brd-white g-color-white g-bg-primary g-font-weight-300 g-font-size-22 rounded-circle g-pos-abs g-top-100 g-left-0 g-brd-around">
                  <i class="g-font-style-normal">{{$number=explode('.', App\Article::first()->price)[0]}}.<span class="g-font-size-16">{{$number=explode('.', App\Article::first()->price)[1]}}</span></i>
                </span>
              </div>
            </div>

            <div class="col-md-4 order-md-1 g-mb-30">
              <div class="g-mb-30">
                <h1 class="g-color-primary g-font-weight-400 g-font-size-40 mb-0">{{App\Article::first()->categories->first()->name}}</h1>
                <h2 class="g-color-dark g-font-weight-300 g-font-size-75 g-line-height-1 mb-4">{{App\Article::first()->name}}</h2>
                <p class="lead">{{App\Article::first()->description}}</p>
              </div>

              <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25 g-mb-70" href="{{route('articles.show',['article'=> App\Article::first()->id])}}">Shop Now</a>

              <!-- Countdown -->
              <div class="text-uppercase">
                <div class="js-countdown u-countdown-v3 g-line-height-1_3 g-color-black"
                     data-end-date="2020/01/31"
                     data-month-format="%m"
                     data-days-format="%D"
                     data-hours-format="%H"
                     data-minutes-format="%M"
                     data-seconds-format="%S">
                  <div class="d-inline-block text-center g-mx-15 mb-3">
                    <div class="js-cd-days g-color-lightred g-font-weight-500 g-font-size-15">12</div>
                    <span class="g-color-gray-dark-v4 g-font-size-11">Days</span>
                  </div>

                  <div class="hidden-down d-inline-block align-top g-font-size-15">:</div>

                  <div class="d-inline-block text-center g-mx-15 mb-3">
                    <div class="js-cd-hours g-font-weight-500 g-font-size-15">01</div>
                    <span class="g-color-gray-dark-v4 g-font-size-11">Hours</span>
                  </div>

                  <div class="hidden-down d-inline-block align-top g-font-size-15">:</div>

                  <div class="d-inline-block text-center g-mx-15 mb-3">
                    <div class="js-cd-minutes g-font-weight-500 g-font-size-15">52</div>
                    <span class="g-color-gray-dark-v4 g-font-size-11">Minutes</span>
                  </div>

                  <div class="hidden-down d-inline-block align-top g-font-size-15">:</div>

                  <div class="d-inline-block text-center g-mx-15 mb-3">
                    <div class="js-cd-seconds g-font-weight-500 g-font-size-15">52</div>
                    <span class="g-color-gray-dark-v4 g-font-size-11">Seconds</span>
                  </div>
                </div>
              </div>
              <!-- End Countdown -->
            </div>
          </div>
        </div>
      </section>
      @endif
      <!-- End Promo Block -->