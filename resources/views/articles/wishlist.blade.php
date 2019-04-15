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
              <span>Wishlist</span>
            </li>
          </ul>
        </div>
      </section>
      <!-- End Breadcrumbs -->
<div class="container g-mb-100 g-px-50">
<div class="rounded  g-brd-gray-light-v4 g-overflow-x-scroll g-overflow-x-visible--lg g-pa-30">
  <table class="text-center w-100">
    <thead class="h6 g-brd-bottom g-brd-gray-light-v4 g-color-black text-uppercase">
      <tr>
        <th class="g-font-weight-500 text-left g-pb-20">Product</th>
        <th class="g-font-weight-500 g-width-130 g-pb-20">Regular price</th>
        <th class="g-font-weight-500 g-width-50 g-pb-20">Discount</th>
        <th class="g-font-weight-500 g-width-130 g-pb-20">Price with discount</th>
        <th></th>
      </tr>
    </thead>

    <tbody>
      <!-- Item-->
      @foreach($articles as $key=>$article)
      <tr class="{{$key<count($articles)-1?"g-brd-bottom g-brd-gray-light-v4":""}}">
        <td class="text-left g-py-25">
          <img class="d-inline-block g-width-100 mr-4" src="{{$article->getSmallPhoto()}}" alt="Image Description">
          <div class="d-inline-block align-middle">
            <h4 class="h6 g-color-black">{{$article->name}}</h4>
            <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_6 mb-0">
              <li>Color: Black</li>
              <li>Size: MD</li>
            </ul>
          </div>
        </td>
        <td class="g-color-gray-dark-v2 g-font-size-13">$ {{$article->price}}</td>
        <td class="g-color-gray-dark-v2 g-font-size-13">{{$article->discount}}%</td>
        <td class="g-color-gray-dark-v2 g-font-size-13">$ {{$article->discountedPrice()}}</td>
        <td class="text-right g-color-black"><span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
            <i class="mt-auto fa fa-trash" data-article="{{$article->id}}"></i>
          </span></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
</div>
@endsection

@section('script')
  <script>
    function toggleWishlist(articleId){
        var CSRF_TOKEN = $("meta[name='csrf-token']").attr('content');
        var API_TOKEN = $("meta[name='api-token']").attr('content');
        $.ajax({
            url:'/api/wishlist/'+articleId,
            method: 'post',
            data: {_token:CSRF_TOKEN, api_token:API_TOKEN}
          });
      }
    $("i.fa-trash").click(function(){
      toggleWishlist($(this).data('article'));
      location.reload();
    });
  </script>
@endsection