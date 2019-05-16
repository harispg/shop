<!-- Review -->
<div class="container">
  <a name="comments"></a>
  <div class="g-brd-y g-brd-gray-light-v4 g-py-100">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <h1 class="h3 mb-5">Comments:</h1>

        <!-- Review -->
        <div class="g-brd-bottom g-brd-gray-light-v4 g-pb-30 g-mb-50">
          <!-- Media -->
          <h3 class="h5 mb-5">Add a comment</h3>
          <!-- Comment Form -->
          <div class="g-pb-50">
            @include('comments.form')
          </div>
          <!-- End Comment Form -->

          @include('comments.list',['collection' => $allComments['root']])



        </div>
      </div>
    </div>
  </div>
      
      <!-- End Review