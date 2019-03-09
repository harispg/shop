<!-- Review -->
<div class="container">
  <div class="g-brd-y g-brd-gray-light-v4 g-py-100">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <h2 class="h4 mb-5">Comments:</h2>

        <!-- Review -->
        <div class="g-brd-bottom g-brd-gray-light-v4 g-pb-30 g-mb-50">
          <!-- Media -->

          @include('comments.list',['collection' => $allComments['root']])


        <h2 class="h4 mb-5">Add a comment</h2>

        <!-- Comment Form -->
        @include('comments.form')
        <!-- End Comment Form -->

        

        <!-- Rating -->
        @include('ratings.rating')
        <!-- End Rating -->
        </div>
      </div>
    </div>
  </div>
      
      <!-- End Review