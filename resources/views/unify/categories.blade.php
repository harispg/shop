<!-- Categories -->
<div class="container g-pt-100 g-pb-70">
  <div class="text-center mx-auto g-max-width-600 g-mb-50">
          <h2 class="g-color-black mb-4">Categories of our products</h2>
          <p class="lead">We are the champions my friend. We'll keep on fighting until the end.</p>
        </div>
  <div class="row g-mx-minus-10">
    @foreach($categories as $category)
    <div class="col-sm-6 col-md-4 g-px-10 g-mb-30">
      <article class="u-block-hover">
        <img class="w-100 u-block-hover__main--zoom-v1 g-mb-minus-8" src="/{{$category->photos->first()->thumbnail_path}}" alt="Image Description">
        <div class="g-pos-abs g-bottom-30 g-left-30">
          <span class="d-block g-color-black">Categories</span>
          <h2 class="h1 mb-0">{{$category->name}}</h2>
        </div>
        <a class="u-link-v2" href="{{route('categoryArticles', ['category' => $category->id])}}"></a>
      </article>
    </div>
    @endforeach
  </div>
</div>
<!-- End Categories -->








      {{-- <!-- Categories -->
      <div class="container-fluid px-0">
        <div class="row align-items-center no-gutters">
          <div class="col-md-7 col-lg-8 u-block-hover g-bg-size-cover g-min-height-500 g-flex-centered" data-bg-img-src="assets/img-temp/1200x800/img1.jpg">
            <div class="g-flex-centered-item text-right g-pa-50">
              <h2 class="g-color-white g-font-weight-700 g-font-size-50 text-uppercase g-line-height-1 mb-4">Summer<br>Collection
              </h2>
              <span class="u-link-v5 g-color-black g-color-primary--hover g-font-size-18">Shop Now</span>
            </div>

            <a class="u-link-v2" href="#!"></a>
          </div>

          <div class="col-md-5 col-lg-4 u-block-hover g-bg-size-cover g-min-height-500 g-flex-centered" data-bg-img-src="assets/img/bg/secondary.png">
            <div class="text-center">
              <img class="img-fluid mb-3" src="assets/img-temp/500x320/img1.png" alt="Image Description">
              <h3 class="h5 u-link-v5 g-color-primary--hover g-font-weight-400 mb-3">Sneaker Shoes for Man</h3>
              <span class="g-color-primary g-font-weight-700 g-font-size-20">$45.00</span>
            </div>

            <a class="u-link-v2" href="#!"></a>
          </div>
        </div>
      </div>
      <!-- End Categories --> --}}