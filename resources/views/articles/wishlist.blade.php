@extends('master')

@section('content')
<div class="rounded g-brd-around g-brd-gray-light-v4 g-overflow-x-scroll g-overflow-x-visible--lg g-pa-30">
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
          <img class="d-inline-block g-width-100 mr-4" src="assets/img-temp/150x150/img6.jpg" alt="Image Description">
          <div class="d-inline-block align-middle">
            <h4 class="h6 g-color-black">{{$article->name}}</h4>
            <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_6 mb-0">
              <li>Color: Black</li>
              <li>Size: MD</li>
            </ul>
          </div>
        </td>
        <td class="g-color-gray-dark-v2 g-font-size-13">$ {{$article->price}}</td>
        <td class="g-color-gray-dark-v2 g-font-size-13">$ {{$article->discount}}</td>
        <td class="g-color-gray-dark-v2 g-font-size-13">$ {{$article->discountedPrice()}}</td>
        <td class="text-right g-color-black"><span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
            <i class="mt-auto fa fa-trash"></i>
          </span></td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>
@endsection