@extends('master')

@section('content')
	 <!-- Breadcrumbs -->
      <section class="g-brd-bottom g-brd-gray-light-v4 g-py-30">
        <div class="container">
          <ul class="u-list-inline">
            <li class="list-inline-item g-mr-5">
              <a class="u-link-v5 g-color-text" href="{{route('home')}}">Home</a>
              <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
            </li>
            <li class="list-inline-item g-mr-5">
              <a class="u-link-v5 g-color-text" href="#!">Pages</a>
              <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
            </li>
            <li class="list-inline-item g-color-primary">
              <span>Empty Cart</span>
            </li>
          </ul>
        </div>
      </section>
      <!-- End Breadcrumbs -->

      <div class="container text-center g-py-100">
        <div class="mb-5">
          <span class="d-block g-color-gray-light-v1 g-font-size-70 g-font-size-90--md mb-4">
            <i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
          </span>
          <h2 class="g-mb-30">Your Wishlist is Currently Empty</h2>
          <p>You will find a lot of interesting products on our "Shop" page.</p>
        </div>
        <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="{{route('articles.index')}}">Start Browsing</a>
      </div>
@endsection