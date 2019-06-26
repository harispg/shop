<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Title -->
    <title>Welcome to our shop</title>

    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-- Favicon -->
    <link rel="shortcut icon" href="../favicon.ico">

    <!-- Google Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">
    
    <link rel="stylesheet" type="text/css" href="/css/app.css">
    <!-- CSS Global Compulsory -->
{{--     <link rel="stylesheet" href="/unifyAssets/vendor/bootstrap/bootstrap.min.css">
 --}}    <link rel="stylesheet" href="/unifyAssets/vendor/icon-line/css/simple-line-icons.css">


    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="/unifyAssets/vendor/icon-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/icon-line-pro/style.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/slick-carousel/slick/slick.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/icon-hs/style.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/chosen/chosen.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/animate.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/hamburgers/hamburgers.min.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/hs-megamenu/src/hs.megamenu.css">
    <link rel="stylesheet" href="/unifyAssets/vendor/malihu-scrollbar/jquery.mCustomScrollbar.min.css">


    <!-- CSS Unify Theme -->
    <link rel="stylesheet" href="/assets/css/styles.e-commerce.css">



    <!-- CSS Customization -->
    <link rel="stylesheet" href="/unifyAssets/css/custom.css">
  </head>

  <body>
    <main id="app">
      <!-- Header -->
      <header id="js-header" class="u-header u-header--static u-shadow-v19">
        <!-- Top Bar -->
        @include('partials.topnav')
        <!-- End Top Bar -->

        <div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
          <nav class="js-mega-menu navbar navbar-expand-lg">
            <div class="container">
              <!-- Responsive Toggle Button -->
              <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0" type="button"
                      aria-label="Toggle navigation"
                      aria-expanded="false"
                      aria-controls="navBar"
                      data-toggle="collapse"
                      data-target="#navBar">
                <span class="hamburger hamburger--slider g-pr-0">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
              </button>
              <!-- End Responsive Toggle Button -->
              <!-- Navigation -->
              <div id="navBar" class="collapse navbar-collapse align-items-center flex-sm-row g-pt-15 g-pt-0--lg">
                <ul class="navbar-nav mx-auto">
                  <!-- Home - Submenu -->
                  <li class="nav-itemg-mx-10--lg g-mr-50--xl pr-lg-5">
                  <a id="nav-link--home" 
                     class="nav-link 
                            text-uppercase 
                            g-color-primary--hover 
                            g-px-5 g-py-20 mb-0" href="/">Home</a>
                  </li>
                  <!-- End Home - Submenu -->

                  <!-- Pages - Submenu -->
                  <li class="nav-itemg-mx-10--lg g-mx-50--xl px-lg-5">
                    <a id="nav-link--pages" class="nav-link text-uppercase g-color-primary--hover g-px-5 g-py-20" href="{{route('articles.index')}}">
                      Products
                    </a>
                  </li>

                  <!-- Categories - Mega Menu -->
                  <li class="hs-has-mega-menu nav-item g-mx-10--lg g-mx-50--xl px-lg-5"
                      data-animation-in="fadeIn"
                      data-animation-out="fadeOut"
                      data-position="right">
                    <a id="mega-menu-label-3" class="nav-link text-uppercase g-color-primary--hover g-px-5 g-py-20" href="{{route('home')."#categories"}}" aria-haspopup="true" aria-expanded="false">
                      Categories
                      <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i>
                    </a>

                    <!-- Mega Menu -->
                    <div class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mt-17" aria-labelledby="mega-menu-label-3">
                      <div class="row">
                        @foreach(App\Category::all()->chunk(4) as $set)
                        <div class="col-sm-6 col-lg-2 g-mb-30 g-mb-0--md">
                          <!-- Links -->
                          @foreach($set as $category)
                          <div class="mb-5">
                            <span class="d-block g-font-weight-500 text-uppercase mb-2">{{$category->name}}</span>

                            <ul class="list-unstyled">
                              @if($category->articles->count() >=4)
                              @foreach($category->articles->take(4)->all() as $article)
                              <li><a class="d-block g-color-text g-color-primary--hover g-text-underline--none--hover g-py-5" href="{{route('articles.show', ['article' => $article->id])}}">{{$article->name}}</a></li>
                              @endforeach
                              @endif
                            </ul>
                          </div>
                          @endforeach
                          <!-- End Links -->
                        </div>
                        @endforeach

                        <div class="col-md-6 col-lg-4 g-mb-30 g-mb-0--md">
                          @if(App\Article::all()->where('featured',true)->isNotEmpty() && $article = App\Article::all()->where('featured', true)->random())
                          <article class="g-pos-rel">
                            <img class="img-fluid" src="/{{$article->photos->first()->path}}" alt="Image Description">

                            <div class="g-pos-abs g-bottom-30 g-left-30">
                              <span class="d-block g-color-gray-dark-v4 mb-2">{{$article->description}}</span>
                              <span class="d-block h4">{{$article->name}}</span>
                              <span class="d-block g-color-gray-dark-v3 g-font-size-16 mb-4">{{$article->price}}</span>
                              <a class="btn u-btn-primary u-shadow-v29 g-font-size-12 text-uppercase g-py-10 g-px-20" href="#!">Add to Cart</a>
                            </div>
                          </article>
                          @endif
                        </div>
                      </div>
                    </div>
                    <!-- End Mega Menu -->
                  </li>
                  <!-- End Categories - Mega Menu -->

                  <!-- New Arrivals - Mega Menu -->
                  <li class="hs-has-mega-menu nav-item g-ml-10--lg g-ml-50--xl px-lg-5"
                      data-animation-in="fadeIn"
                      data-animation-out="fadeOut"
                      data-position="right">
                    <a id="mega-menu-label-5" class="nav-link text-uppercase g-color-primary--hover g-px-5 g-py-20" href="#!" aria-haspopup="true" aria-expanded="false">
                      New Arrivals
                      <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i>
                    </a>

                    <!-- Mega Menu -->
                    <div class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mt-17" aria-labelledby="mega-menu-label-5">
                      <div class="row">
                        @foreach(App\Article::all()->take(3) as $article)
                        <div class="col-md-4 g-mb-30 g-mb-0--md">
                          <!-- Article -->
                          <article class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-bluegray-opacity-0_3--after text-center g-px-40 g-py-80" data-bg-img-src="{{$article->photos->first()->thumbnail_small}}">
                            <div class="g-pos-rel g-z-index-1">
                              <span class="d-block g-color-white g-font-weight-400 text-uppercase mb-3">{{$article->categories->first()->name}}</span>
                              <span class="d-block h2 g-color-white mb-4">{{$article->name}}</span>
                              <a class="btn u-btn-white g-brd-primary--hover g-color-white--hover g-bg-primary--hover g-font-size-11 text-uppercase g-py-10 g-px-20" href="#!">Shop Now</a>
                            </div>
                          </article>
                          <!-- End Article -->
                        </div>
                        @endforeach
                      </div>
                    </div>
                    <!-- End Mega Menu -->
                  </li>
                  <!-- End New Arrivals - Mega Menu -->
                </ul>
              </div>
              <!-- End Navigation -->
            </div>
          </nav>
        </div>
        <portal-target name="nav-after"></portal-target>
        {{-- <sticky>
         <div class="container-fluid bg-info p-5">
            IDEMO NA MORE, SVI NA KUPANJE. ALI ISTO NEĆEMO JER JE POMET.
          </div>
        <sticky> --}}

      </header>
      <!-- End Header -->