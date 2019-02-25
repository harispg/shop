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
<div class="ibox ">

    <div class="ibox-content">
    	<div class="row">
    		<div class="col-sm-9">
	            <h2>All your photos</h2>
	            <p>
	                You can select photos for your article. Latest uploaded are first. You can search by the name.
	            </p>
	        	<form>
	            <div class="lightBoxGallery">
	            	@foreach($photos as $photo)
	            	<div class="badge m-2 bg-dark">
		            	<h3 class="text-light">{{$photo->name}}</h3>
		                <a href="{{$photo->path}}" title="{{$photo->name}}" data-gallery=""><img src="{{$photo->thumbnail_path}}"></a> <br />
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

	            <div class="form-group">
	            	<button class="btn btn-primary" type="submit">Attach Photos</button>
	            </div>

	            </form>
            </div>
            <div class="col-sm-3">
            	<h2>Add new photos</h2>
            	<p>
            		Dropzone is very easy to use just drag photos in the box or simpley click the box and file browser for your PC will open
            	</p>
            	<button id="sendPhotos" type="button" class="btn btn-primary mb-1">Save photos to database</button>
	            <div id="myDropzone" class="dropzone">

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
<script type="text/javascript">

	Dropzone.autoDiscover=false;

	$(document).ready(function(){
		$('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

		$('button.deletePhoto').on('click', function(){
			console.log('click');
			var photoId = $(this).data('photo');
			
			$("form.deleteForm[data-photo="+photoId+"]").submit();
		});

		$('#myDropzone').dropzone({
	      url: '/photos',
	      paramName: 'photos',
	      autoProcessQueue: false,
      	  uploadMultiple: true,
      	  parallelUploads: 25,
      	  maxFiles: 25,
	      maxFilesize: 2,
	      acceptedFiles: 'image/*',
	      addRemoveLinks: true,
	      init: function() {
	      	  var _this = this;

	      	  $("#sendPhotos").on('click', function(e) {
	      	  	_this.processQueue();
	      	  });
	          //send all the form data along with the files:
	          this.on("sendingmultiple", function(data, xhr, formData) {
	              formData.append("_token", jQuery('input[name="_token"]').val());
	          });
	      },

	    });

		
	});
</script>
@endsection