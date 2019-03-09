<form method="POST" action="{{route('comments.store', ['article'=>$article->id])}}">
  @csrf
  {{-- <div class="row">
    <div class="col-md-6 form-group g-mb-30">
      <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="text" placeholder="First name">
    </div>

    <div class="col-md-6 form-group g-mb-30">
      <input class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--focus rounded-3 g-py-13 g-px-15" type="email" placeholder="Email">
    </div>
  </div> --}}
  @if(isset($parentId))
  <input type="hidden" name="parentId" value="{{$parentId}}">
  @endif
  <div class="g-mb-30">
  <textarea name="body" class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--focus g-resize-none rounded-3 g-py-13 g-px-15" rows="2" placeholder="Your message"></textarea>
</div>

<div class="row align-items-center">
  <div class="col-5 col-sm-4 col-md-3">
    <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25" type="submit" role="button">Add Comment</button>
  </div>
</div>
</form>