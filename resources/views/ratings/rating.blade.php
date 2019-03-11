<div class="col-5 col-sm-4 col-md-6 mt-2 mb-5">
  <h3 class="h6 mb-1">Rate:</h3>

  <ul class="js-rating u-rating-v1 g-font-size-20 g-color-gray-light-v3 mb-0" 
  data-article="{{$article->id}}" 
  data-rating-by-user="{{$article->ratingByUser(auth()->user())}}" data-hover-classes="g-color-primary">
    <li class="g-line-height-1_4">
      <i class="fa fa-star"></i>
    </li>
    <li class="g-line-height-1_4">
      <i class="fa fa-star"></i>
    </li>
    <li class="g-line-height-1_4">
      <i class="fa fa-star"></i>
    </li>
    <li class="g-line-height-1_4">
      <i class="fa fa-star"></i>
    </li>
    <li class="g-line-height-1_4">
      <i class="fa fa-star"></i>
    </li>
  </ul>
  <p class="avgRating mb-0">{{$article->ratings->count()?"Average rating: ".$article->avgRating():"Not rated"}}</p>
  <span class="notAllowed text-danger pt-0 mt-0" hidden="true"></span>
</div>