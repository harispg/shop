@extends('admin.master')

@section('content')

<div class="col col-sm-12">
	<h1 class="g-mb-70">New product:</h1>
			<!-- General Forms -->
	<form enctype="multipart/form-data" class="g-brd-around g-brd-gray-light-v4 g-pa-30 g-mb-30" action="{{route('articles.store')}}" method="POST">
			@csrf
		<div class="row">
			<div class="col">
			  <!-- Text Input -->
				  <div class="form-group g-mb-20 {{$errors->has('name')?"u-has-error-v1":""}}">
				    <label class="g-mb-10" for="name">Name</label>
				    <input id="name" name="name" class="form-control form-control-md g-brd-gray-light-v3--focus rounded-0" type="text"  value="{{old('name')}}" placeholder="T-shirt" required>
				    @if($errors->has('name'))
				    <small class="form-control-feedback">{{$errors->first('name')}}</small>
				    @endif
				  </div>
			  <!-- End Text Input -->



			  	<div class="form-group g-mb-20 {{$errors->has('description')?"u-has-error-v1":""}}">
                <label class="g-mb-10" for="description">Description</label>

                <textarea
                	id="articleDescription"
	                class="form-control 
	                	   form-control-md
	                	   g-brd-gray-light-v3 
	                	   g-brd-gray-light-v3--focus 
	                	   rounded-0 
	                	   g-resize-none 
	                	   g-overflow-hidden" 
	                name="description"
	                rows="4"
	                placeholder="Article description"
	                required>{{old('description')}}</textarea>

                @if($errors->has('description'))
                	<small class="form-control-feedback">{{$errors->first('description')}}</small>
                @endif
			  </div>


					  <div class="row">
						<div class="form-group g-mb-20 g-pl-15 {{$errors->has('price')?"u-has-error-v1":""}}">
						    <label class="g-mb-10" for="name">Price</label>
						    <input name="price" class="form-control form-control-md rounded-0 g-brd-gray-light-v3--focus" type="text"  value="{{old('price')}}" placeholder="555.45" required>
						    @if($errors->has('price'))
						    <small class="form-control-feedback">{{$errors->first('price')}}</small>
						    @endif
				  		</div>

						<div class="form-group g-mb-20 g-pl-170 {{$errors->has('quantity')?"u-has-error-v1":""}}">
						    <label class="g-mb-10" for="name">Quantity</label>
						    <input name="quantity" class="form-control form-control-md rounded-0 g-brd-gray-light-v3--focus" type="text"  value="{{old('quantity')}}" placeholder="123" required>
						    @if($errors->has('quantity'))
						    <small class="form-control-feedback">{{$errors->first('quantity')}}</small>
						    @endif
				  		</div>
		              </div>
          			</div>

              
         </div>
         <!-- Horisontal line -->
		<hr class="g-brd-gray-light-v4 g-mx-minus-30">

		<!-- File input advanced-->
		<div class="form-group mb-0">
	        <h4 class="h6 g-font-weight-600 g-color-black g-mb-20">Advanced File input</h4>
	        <input class="js-file-attachment" name="photos" type="file">
	    </div>

	 	@if($errors->has('photos.*'))
	    	<div class="alert alert-danger"> 
	    		<ul>
	    		@foreach($errors->get('photos.*') as $error)
	    			<li>{{$error[0]}}</li>
	    		@endforeach
	    		</ul>
	    	</div>
	    @endif
	    <!-- End file input advanced -->

		<!-- Horisontal line -->
		<hr class="g-brd-gray-light-v4 g-mx-minus-30">
         <button 
         class="btn btn-md btn-xl--md 
 		   u-btn-secondary 
 		   g-width-120--md 
 		   g-font-size-12 
 		   g-font-size-default--md" 
         type="submit">
         	Save Article
     	 </button>
	</form>
			<!-- End Form -->
</div>

@endsection

@section('script')

@endsection
