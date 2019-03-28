<div class="g-py-15">
  <ul class="list-unstyled mb-3">
    @foreach($order->items as $key=>$item)
    <!-- Product -->
    <li class="d-flex justify-content-start {{$key > 0?"g-brd-top g-brd-gray-light-v3 pt-4 mt-4":""}}">
      <img class="g-width-100 g-height-100 mr-3" src="/{{$item->photo()->thumbnail_small}}" alt="Image Description">
      <div class="d-block">
        <h4 class="h6 g-color-black">{{$item->name()}}</h4>
        <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_4 mb-1">
          <li>Color: Black</li>
          <li>Price: $ {{$item->price()}}</li>
          <li>QTY: {{$item->quantity}}</li>
        </ul>
        <span class="d-block g-color-black g-font-weight-400">$ {{$item->total()}}</span>
      </div>
    </li>
    <!-- End Product -->
    @endforeach
  </ul>
</div>