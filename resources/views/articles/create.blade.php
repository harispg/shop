@extends('admin.master')
@section('pluginCSS')
<link rel="stylesheet" type="text/css" href="/inspinia/css/plugins/summernote/summernote-bs4.css">
<link href="/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/inspinia/css/plugins/dropzone/dropzone.css">
@endsection
@section('content')

<div class="container">

  <div class="col-md-8 offset-2">

    <h1>Create new article</h1>

  <form class="form" enctype="multipart/form-data" method="POST" action="{{route('articles.store')}}">

    @csrf

    <div class="form-group {{$errors->has('name')?"has-error":""}}">
      <label class="col-sm-2 col-form-label pl-0" for="name">Name:</label>
      <input id="name" class="form-control" type="text" name="name" value="{{old('name')}}" required>
      @if($errors->has('name'))
      <span class="text-danger">{{$errors->first('name')}}</span>
      @endif
    </div>

    <div class="form-group {{$errors->has('description')?"has-error":""}}">
      <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
      <textarea id="description" class="form-control" type="text" name="description" value="{{old('description')}}" required> </textarea>
      @if($errors->has('description'))
      <span class="text-danger">{{$errors->first('description')}}</span>
      @endif
    </div>
    
    <div class="form-group {{$errors->has('specification')?"has-error":""}}">
      <label class="col-sm-2 col-form-label pl-0" for="specification">Specification:</label>
      <textarea id="summernote" class="form-control" type="text" name="specification" required>
        {{old('specification')}}
      </textarea>
      @if($errors->has('specification'))
      <span class="text-danger">{{$errors->first('specification')}}</span>
      @endif
    </div>

    <div class="row">
      <div class="form-group col-sm-6 {{$errors->has('price')?"has-error":""}}">
        <label class="col-sm-2 col-form-label pl-0">Price:</label>
        <input id="price" class="form-control" type="text" name="price" placeholder="1759.35" value="{{old('price')}}" required>
        @if($errors->has('price'))
        <span class="text-danger">{{$errors->first('price')}}</span>
        @endif
      </div>

      <div class="form-group col-sm-6 {{$errors->has('quantity')?"has-error":""}}">
        <label class="col-sm-2 col-form-label pl-0">Quantity:</label>
        <input id="quantity" class="form-control" type="text" name="quantity" placeholder="99" value="{{old('quantity')}}" required>
        @if($errors->has('quantity'))
        <span class="text-danger">{{$errors->first('quantity')}}</span>
        @endif
      </div>
    </div>
    
      <button  type="button" class="btn btn-primary form-control mb-3" data-toggle="modal" data-target="#photoModal">Add some photos</button>

        <button class="btn btn-primary" id="submit-all" type="submit">Save</button>

  </form>
  </div>
</div>

<div class="modal inmodal fade" 
           id="photoModal" 
           tabindex="-1" 
           role="dialog"  
           aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h4 class="modal-title">Choose some photos or add new ones for your article</h4>
            <small class="font-bold">You can do this later too, but We recomend you to do it now.</small>
        </div>
        <div class="modal-body">
            <div class="col-sm-12">
              <h2>All your photos</h2>
              <p>
                  You can select photos for your article. Latest uploaded are first. You can search by the name.
              </p>
              <label class="text-muted" for="photoSearch">Search: <input class="form-control" type="text" name="photoSearch"></label>
                <div id="photoGrid"> 
                  @foreach($photos as $photo)
                    <div class="badge m-2 bg-dark">
                      <h3 class="text-light">{{$photo->name}}</h3>
                        <img src="/{{$photo->thumbnail_path}}"> <br />
                        <label class="text-light mt-1 mr-15"> <input type="checkbox" class="i-checks"> Select</label>
                    </div>
                  @endforeach
                </div>

                <div class="form-group">
                  <button class="btn btn-primary" type="submit">Attach Photos</button>
                </div>
            </div>

                  <h2>Add new photos</h2>
            <p>
              Dropzone is very easy to use just drag photos in the box or simpley click the box and file browser for your PC will open
            </p>
            <button id="sendPhotos" type="button" class="btn btn-primary mb-1">Save photos to database</button>
            <div id="myDropzone" class="dropzone">

            </div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>

@endsection

@section('pluginScripts')
  <script type="text/javascript" src="/inspinia/js/plugins/summernote/summernote-bs4.js"></script>
  <script src="/inspinia/js/plugins/iCheck/icheck.min.js"></script>
  <script type="text/javascript" src="/inspinia/js/plugins/dropzone/dropzone.js"></script>
@endsection


@section('script')
<script type="text/javascript">

  Dropzone.autoDiscover=false;

  $(document).ready(function(){
    
    //Initialization of i-checks
    $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });

    //Initialization of summernote
    $('#summernote').summernote({
      height: 300,
      files: false,
    });

    //Initialization and customization of dropzone
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


      //Searching photos script
      var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
      $("input[name='photoSearch']").on('keyup', function() {
        var searchInput = $("input[name='photoSearch']").val();
        $.ajax({
          type: 'POST',
          url: '/findPhotos',
          method: 'POST',
          data: {_token: CSRF_TOKEN, searchQuery: searchInput},
          success: function(photos){
            renderPhotos(photos);

          }
        });

        function renderPhotos(photos){
          var numberOfPhotos = photos.length;
          var i=0;
          $("#photoGrid").html("");
          for(i; i<numberOfPhotos; i++){
            giveHtml(photos[i]); 
          }
          //need to run initialization of i-checks after rendering so checkbox can remain pretty
          $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });  
        }

        function giveHtml(photo){
          
          $("#photoGrid").append(
            '<div class="badge m-2 bg-dark">\
              <h3 class="text-light">'+photo.name+'</h3>\
              <img src="/'+photo.thumbnail_path+'"> <br />\
              <label class="text-light mt-1 mr-5"><input type="checkbox" class="i-checks"> Select</label>\
              </div>'
            );
        }
      });

          

    
  });
</script>

</script>
	
@include('flash')

@endsection
