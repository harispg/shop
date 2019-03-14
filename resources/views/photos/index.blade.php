@extends('admin.master')
@section('pluginCSS')
<link href="/inspinia/css/plugins/blueimp/css/blueimp-gallery.min.css" rel="stylesheet">
<link href="/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/inspinia/css/plugins/dropzone/dropzone.css">
@endsection
@section('content')
@csrf
<div class="row">
<div class="col-lg-12">
<div class="ibox">

    <div class="ibox-content">
    	<div class="row">
    		<div class="col-sm-12">
            	<h2>Add new photos</h2>
            	<p>
            		Dropzone is very easy to use just drag photos in the box or simpley click the box and file browser for your PC will open
            	</p>
            	<button id="sendPhotos" type="button" class="btn btn-primary mb-1">Save photos to database</button>
	            <div id="myDropzone" class="dropzone">

	            </div>
            </div>
    	</div>
    	<div class="row">
    		<div class="col-sm-12">
	            <h2>All your photos</h2>
	            <hr>
	            <label class="text-muted" for="photoSearch"><h3>Search through your photos by name: </h3><input class="form-control" type="text" name="photoSearch"></label>
	            <button type="button" id="selectAll" class="btn btn-primary ml-5">Select All</button>
	            <button type="button" id="deleteSelected" class="btn btn-primary ml-5">Delete Selected</button>
              <span class="text-muted">Pictures from dummyPics folder will not be deleted</span>
	            <div class="lightBoxGallery">
	            	@foreach($photos as $photo)
	            	<div class="badge m-2 bg-transparent border border-info">
		            	
		                <a href="{{$photo->path}}" title="{{$photo->name}}" data-photo="{{$photo->id}}" data-gallery=""><img src="{{$photo->thumbnail_path}}"></a> <br />
		                <label class="text-light mt-1 mr-5"> <input type="checkbox" class="i-checks"> Select</label>
		                <button type="button" data-photo="{{$photo->id}}" class="btn btn-primary deletePhoto">Delete</button>

		                <form class="deleteForm" data-photo="{{$photo->id}}"
		                	  visibility="hidden" 
		                	  method="POST" 
		                	  action="{{route('photoDelete', ['photo'=>$photo->id])}}">
		                	  @csrf
		                	  @method('DELETE')
		                </form>
	                </div>

	             	@endforeach
	                

	                <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
	                <div id="blueimp-gallery" class="blueimp-gallery">
	                    <div class="slides"></div>
	                    <h3 class="title"></h3>
	                    <a class="prev">‹</a>
	                    <a class="next">›</a>
	                    <a class="close">×</a>
	                    <a class="play-pause"></a>
	                    <ol class="indicator"></ol>
	                </div>

	            </div>

            </div>
            
        </div>

    </div>
</div>
</div>
</div>
@endsection

@section('pluginScripts')
<script src="/inspinia/js/plugins/blueimp/jquery.blueimp-gallery.min.js"></script>
<script src="/inspinia/js/plugins/iCheck/icheck.min.js"></script>
<script type="text/javascript" src="/inspinia/js/plugins/dropzone/dropzone.js"></script>

@endsection

@section('script')
<script type="text/javascript" src="/js/photosIndex.js"></script>
@endsection