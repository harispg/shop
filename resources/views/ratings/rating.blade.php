<article-rating inline-template :article="{{$article}}" :p_user="{{auth()->user()?auth()->user():'"Unauthenticated"'}}">
  <div>
  <modal-login></modal-login>
    <div class="col-5 col-sm-4 col-md-6 mt-2 mb-5">
    <h3 class="h6 mb-1">Rate:</h3>
    
    <ul class="js-rating u-rating-v1 g-font-size-20 g-color-gray-light-v3 mb-0" 
      data-hover-classes="g-color-primary" @click="addStars($event.target)">
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
    <p class="avgRating mb-0" v-text="averageRating"></p>
    <p class="usersRatings mb-0" v-show="timesRated" v-cloak>@{{ratedByUsers}}</p>
    </div>
  </div>
</article-rating>