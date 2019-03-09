<ul style="list-style-type:none;">
  @foreach($collection as $comment)
  <li>
  <div class="media g-mb-30">
    <img class="d-flex g-width-60 g-height-60 rounded-circle g-mt-3 g-mr-20" src="/assets/img-temp/100x100/img1.jpg" alt="Image Description">
    <div class="media-body">
      <div class="d-flex align-items-start g-mb-15 g-mb-10--sm">
        <div class="d-block">
          <h5 class="h6">{{$comment->owner->name}}</h5>

          <!-- Rating -->
          <ul class="js-rating u-rating-v1 g-font-size-13 g-color-gray-light-v3 mb-0" data-hover-classes="g-color-primary">
            <li class="g-color-primary g-line-height-1_4">
              <i class="fa fa-star"></i>
            </li>
            <li class="g-color-primary g-line-height-1_4">
              <i class="fa fa-star"></i>
            </li>
            <li class="g-color-primary g-line-height-1_4">
              <i class="fa fa-star"></i>
            </li>
            <li class="g-color-primary g-line-height-1_4">
              <i class="fa fa-star"></i>
            </li>
            <li class="g-color-primary g-line-height-1_4">
              <i class="fa fa-star"></i>
            </li>
          </ul>
          <!-- End Rating -->

          <span class="d-block g-color-gray-dark-v5 g-font-size-11">{{$comment->created_at}}</span>
        </div>
        <div class="ml-auto">
          <a class="u-link-v5 g-color-black g-color-primary--hover g-font-size-12 text-uppercase replyToggler" href="#!" data-comment="{{$comment->id}}">Reply</a>
        </div>
      </div>

      <p>{{$comment->body}}</p>

      <ul class="list-inline my-0">
        <li class="list-inline-item g-mr-20">
          <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
            <i class="icon-medical-022 u-line-icon-pro g-pos-rel g-top-1 g-mr-3"></i> 5
          </a>
        </li>
        <li class="list-inline-item g-mr-20">
          <a class="g-color-gray-dark-v5 g-text-underline--none--hover" href="#!">
            <i class="icon-finance-206 u-line-icon-pro g-pos-rel g-top-1 g-mr-3"></i> 1
          </a>
        </li>
      </ul>
      <div id="{{$comment->id}}" class="row reply" hidden="true">
        <div class="col col-sm-12">
        @include('comments.form',['parentId'=>$comment->id])
        </div>
      </div>
    </div>
    
    
    
  </div>
  <!-- End Media -->
  @if(isset($allComments[$comment->id]))
  @include('comments.list',['collection' => $allComments[$comment->id]])
  @endif
  </li>
  @endforeach
</ul>