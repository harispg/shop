<!-- Categories -->
<a name="categories"></a>
<div class="container g-pt-100 g-pb-70">
  <div class="text-center mx-auto g-max-width-600 g-mb-50">
          <h2 class="g-color-black mb-4">Categories of our products</h2>
          <p class="lead">We are the champions my friends, we'll keep on fighting 'til the end.</p>
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
        <a class="u-link-v2" href="{{route('categoryArticles', ['category' => $category->name])}}"></a>
      </article>
    </div>
    @endforeach
  </div>
</div>
<!-- End Categories -->