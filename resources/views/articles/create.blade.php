@extends('admin.master')
@section('pluginCSS')
<link rel="stylesheet" type="text/css" href="/inspinia/css/plugins/summernote/summernote-bs4.css">
<link href="/inspinia/css/plugins/iCheck/custom.css" rel="stylesheet">
<link href="/inspinia/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="/inspinia/css/plugins/dropzone/dropzone.css">
@endsection
@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
  <div class="col-lg-9">
      <h2>Create article</h2>
      <ol class="breadcrumb">
          <li class="breadcrumb-item">
              <a href="/admin">Admin</a>
          </li>
          <li class="breadcrumb-item">
              <a href="{{route('admin.articles.index')}}">Articles index</a>
          </li>
          <li class="breadcrumb-item active">
              <strong>Create article</strong>
          </li>
      </ol>
  </div>
</div>
  <div class="row">
  <div class="col-md-6">

    <h1>Create new article</h1>

  <form class="form" enctype="multipart/form-data" method="POST" action="{{route('articles.store')}}">

    @csrf

    <div class="row">
      <div class="form-group col-sm-6 {{$errors->has('name')?"has-error":""}}">
        <label class="col-sm-2 col-form-label pl-0">Name:</label>
        <input id="name" class="form-control" type="text" name="name" placeholder="Eneter Product name" value="{{old('name')}}" required>
        @if($errors->has('name'))
        <span class="text-danger">{{$errors->first('name')}}</span>
        @endif
      </div>

      <div class="form-group col-sm-6 {{$errors->has('sku')?"has-error":""}}">
        <label class="col-sm-2 col-form-label pl-0">SKU:</label>
        <input id="sku" class="form-control" type="text" name="sku" placeholder="Enter product SKU" value="{{old('sku')}}" required>
        @if($errors->has('sku'))
        <span class="text-danger">{{$errors->first('sku')}}</span>
        @endif
      </div>
    </div>

    <div class="form-group {{$errors->has('description')?"has-error":""}}">
      <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
      <textarea id="description" class="form-control" type="text" name="description" required>{{old('description')}}</textarea>
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

    <div class="row">
      <div class="form-group col-sm-6 {{$errors->has('discount')?"has-error":""}}">
        <label class="col-sm-2 col-form-label pl-0">Discount:</label>
        <input id="discount" class="form-control" type="text" name="discount" placeholder="Eneter discount" 
          value="{{old('discount')}}" required>
        @if($errors->has('discount'))
        <span class="text-danger">{{$errors->first('discount')}}</span>
        @endif
      </div>

      <div class="form-group col-sm-3">
        <label class="col-sm-2 col-form-label pl-0">NEW:</label><br>
        <input id="newArticle" type="checkbox" name="new" style="height: 1.5rem; width: 1.5rem;">
      </div>

      <div class="form-group col-sm-3">
        <label class="col-sm-2 col-form-label pl-0">FETURED:</label><br>
        <input id="featuredArticle" type="checkbox" name="featured" style="height: 1.5rem; width: 1.5rem;">
      </div>
    </div>

    <div class="form-group pb-3 {{$errors->has('specification')?"has-error":""}}">
      <label class="col-sm-3 col-form-label pl-0" for="category">Choose category:</label>
      <select class="form-control" name="category" required>
        @foreach($categories as $category)
          <option value="{{$category->id}}"> {{$category->name}} </option>
        @endforeach
      </select>
      @if($errors->has('category'))
      <span class="text-danger">{{$errors->first('category')}}</span>
      @endif
    </div>

    <div class="form-group pb-3">
      <label for="tags">Add some tags:</label> <br>
      <input class="form-control" type="text" name="tags" value="{{old('tags')}}" data-role="tagsinput">
    </div>

    <input id="photoIDs" type="text" name="photos" hidden value="{{old('photos')}}">
    <div class="row mb-5">
      <div class="col col-md-6">
      <button  type="button" 
               class="btn btn-primary btn-block mb-1" 
               data-toggle="modal" 
               data-target="#photoModal">Add some photos</button>
      @if(!$errors->has('photos'))
        <span id="selectedPhotosNumber" class="form-text"></span class="form-text">
      @else
        <span id="photosError" class="form-text text-danger">{{$errors->first('photos')}}</span>
      @endif
      </div>
      <div class="col col-md-6">
        <button class="btn btn-primary float-right" type="submit">Save article</button>
      </div>
    </div>
  </form>
  </div>
  <div class="col col-md-6 article-photos">
    
    <h2>Selected Photos:</h2>
    <div class="selected-photos-content">  
    <!-- Java Script will render content here after user selects them-->
    </div>
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
          <h2>Add new photos</h2>
            <p>
              Dropzone is very easy to use just drag photos in the box or simpley click the box and file browser for your PC will open
            </p>
            <button id="sendPhotos" type="button" class="btn btn-info mb-1">Save photos to database</button>
            <div id="myDropzone" class="dropzone">

            </div>
            <div class="col-sm-12">
              <h2>All your photos</h2>
              <p>
                  You can select photos for your article. Latest uploaded are first. You can search by the name.
              </p>
              <label class="text-muted" for="photoSearch">Search: <input class="form-control" type="text" name="photoSearch"></label>
              <div class="form-group">
                  <button class="btn btn-info submitPhotos" type="button">Attach selected Photos</button>
                </div>
                <div id="photoGrid"> 
                  @foreach($photos as $photo)
                    
                        <img class="img mr-4 mb-4" src="/{{$photo->thumbnail_small}}" data-photo="{{$photo->id}}">
                      
                  @endforeach
                </div>

                <div class="form-group">
                  <button class="btn btn-info submitPhotos" type="button">Attach selected Photos</button>
                </div>
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
  @include('flash')
@endsection


@section('script')

<script type="text/javascript">

  Dropzone.autoDiscover=false;

  $(document).ready(function(){

    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    var API_TOKEN = $("meta[name='api-token']").attr("content");
    

    //Initialization of summernote
    $('#summernote').summernote({
      height: 300,
      files: false,
    });

    //Initialization and customization of dropzone
    $('#myDropzone').dropzone({
        url: '/api/photos',
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

            $("button#sendPhotos").on('click', function(e) {
              _this.processQueue();
            });
            //send all the form data along with the files:
            this.on("sendingmultiple", function(data, xhr, formData) {
                formData.append("_token", jQuery('input[name="_token"]').val());
                formData.append("api_token", API_TOKEN);
            });

            this.on("queuecomplete", function(e, response){
              $.ajax({
                type: 'POST',
                url: '/api/allPhotos',
                method: 'POST',
                data: {_token: CSRF_TOKEN, api_token: API_TOKEN},
                success: function(photos){
                  renderPhotos(photos);
                }
              });
            });
        },
      });


      //Searching photos script
      $("input[name='photoSearch']").on('keyup', function() {
        var searchInput = $("input[name='photoSearch']").val();
        $.ajax({
          type: 'POST',
          url: '/api/findPhotos',
          method: 'POST',
          data: {_token: CSRF_TOKEN, api_token: API_TOKEN, searchQuery: searchInput},
          success: function(photos){
            renderPhotos(photos);
          }
        });
      });

      function renderPhotos(photos){
          var numberOfPhotos = photos.length;
          var i=0;
          $("#photoGrid").html("");
          for(i; i<numberOfPhotos; i++){
            giveHtml(photos[i]); 
          }
        };

        function giveHtml(photo){
          
          $("#photoGrid").append(
            '<img src="/'+photo.thumbnail_small+'" class="img mr-4 mb-4" data-photo="'+photo.id+'">'
            );
        };

      //Handeling clicked photos
      $(".submitPhotos").on('click', function(){
        var photo_ids = [];
        $("img.img-clicked").each(function(){
        photo_ids.push($(this).data("photo"));
        });
        if($("span#photosError").length != 0){
          var spanInQuestion = $("span#photosError");
          spanInQuestion.removeClass('text-danger');
          spanInQuestion.attr('id', 'selectedPhotosNumber');
        }
        $("span#selectedPhotosNumber").text("You selected: " + photo_ids.length + " photos.");
        $("input#photoIDs").attr("value", photo_ids.join("_"));
        if(photo_ids.length > 0){
          $.ajax({
            url: '/api/allPhotos',
            type: 'POST',
            method: 'POST',
            data:{_token: CSRF_TOKEN, api_token: API_TOKEN, photoIds: photo_ids},
            success: function(photos){
              $(".selected-photos-content").html("");
              //$(".article-photos").append("<h2 class='newlySelectedPhotos'>New photos:</h2>");
              var i = 0;
              for(i;i<photos.length;i++){
                $(".selected-photos-content").append('<img src="/'+photos[i].thumbnail_small+'" class="img mr-4 mb-4" photo-data="'+photos[i].id+'">');
              }
              photo_ids = [];
            }
          });
        }else{
          $(".selected-photos-content").html("");
        }
        $("div.modal#photoModal").modal('toggle');
      });

      //on img click
      $(".modal").on('click', '.img', function(){
        $(this).toggleClass("img-clicked");
      });

  });
</script>


	


@endsection


