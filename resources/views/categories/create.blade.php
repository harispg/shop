@extends('admin.master')



@section('pluginCSS')
<link href="/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection



@section('content')
<h1 class="display-4">Product categories</h1>

@can('categories.create')
<div class="widget style1 lazur-bg col-2 btn" data-toggle="modal" data-target="#newCategory">    
  <h2 class="font-bold">New Category</h2>
</div>
@endcan

<!-- New Category modal -->
<div class="modal inmodal fade" 
 id="newCategory" 
 tabindex="-1" 
 role="dialog"  
 aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
            <h1>Create new Category</h1>
            
        </div>
        <div class="modal-body newCategory">
            
              <div class="form-group">
                <label class="col-sm-2 col-form-label pl-0" for="name">Name:</label>
                <input id="nameNew" class="form-control" type="text" name="name" value="" required>
                <span id="nc-name-error" class="text-danger name"></span>
              </div>

              <div class="form-group">
                <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
                <textarea id="descriptionNew" class="form-control" type="text" name="description" required></textarea>  
                <span id="nc-description-error" class="text-danger"></span>
              </div>

              <div class="form-group">
                    <label for="photo" class="col-sm-2 col-fomr-label pl-0">Choose photo...</label>
                <div class="custom-file">
                    <input id="photoNew" type="file" name="photo" class="custom-file-input">
                    <label for="photo" class="custom-file-label"> </label>
                </div>  
                <span id="nc-photo-error" class="text-danger"></span>
              </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary save">Save changes</button>
        </div>
    </div>
  </div>
</div>
<!-- New Category modal END -->

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
      <div class="col-lg-12">
      <div class="ibox ">
          <div class="ibox-title">
              <h5>Basic Data Tables example with responsive plugin</h5>
              {{-- <div class="ibox-tools">
                  <a class="collapse-link">
                      <i class="fa fa-chevron-up"></i>
                  </a>
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                      <i class="fa fa-wrench"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-user">
                      <li><a href="#" class="dropdown-item">Config option 1</a>
                      </li>
                      <li><a href="#" class="dropdown-item">Config option 2</a>
                      </li>
                  </ul>
                  <a class="close-link">
                      <i class="fa fa-times"></i>
                  </a>
              </div> --}}
          </div>
          <div class="ibox-content">

              <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover categories-table" >
          <thead>
          <tr>
              <th>Date modified</th>
              <th>Category name</th>
              <th>Description</th>
              <th>Photo</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
          </thead>
          <tbody>
            @foreach($categories as $category)
          <tr class="gradeA">
              <td name="date" id="date{{$category->id}}">{{$category->updated_at}}</td>
              <td name="name" id="name{{$category->id}}">{{$category->name}}</td>
              <td name="description" id="description{{$category->id}}">{{$category->description}}</td>
              <td name="photo">
                <img id="photo{{$category->id}}" src="/{{$category->photos()->first()->thumbnail_path}}" width="100" height="100" />
              </td>
              <td name="edit" class="center">
                <button class="btn btn-outline-primary edit" data-category="{{$category->id}}">Edit</button>
              </td>
              <td name="delete" class="center">
                <button class="btn btn-outline-primary delete" data-category="{{$category->id}}">Delete</button>
              </td>
          </tr>


          <!-- EDIT MODAL -->
          <div class="modal inmodal fade" 
           id="editModalCat{{$category->id}}" 
           tabindex="-1" 
           role="dialog"  
           aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                  <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                      <h4 class="modal-title">Edit {{$category->name}} category</h4>
                      <small class="font-bold">You can edit your category name, description or chose a new photo</small>
                  </div>
                  <div id="{{$category->id}}" class="modal-body">
                      
                        <div class="form-group">
                          <label class="col-sm-2 col-form-label pl-0" for="name">Name:</label>
                          <input class="form-control" type="text" name="name" value="{{$category->name}}" required>
                          <span id="ec-name-error-{{$category->id}}"class="text-danger name"></span>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
                          <textarea class="form-control" type="text" name="description" required>{{$category->description}}</textarea>  
                          <span id="ec-description-error-{{$category->id}}"class="text-danger"></span>
                        </div>

                        <button type="button" class="btn btn-warning ec-photo-toggle" data-category="{{$category->id}}">Change photo</button>

                        <div id="ec-photo-{{$category->id}}" class="form-group" hidden>
                          <label for="photoEdit" class="col-sm-3 col-fomr-label pl-0">Choose new photo...</label>
                          <div class="custom-file">
                              <input type="file" name="photoEdit" class="custom-file-input ec-photo">
                              <label for="photoEdit" class="custom-file-label text-muted">Previous photo will be deleted...</label>
                          </div>  
                          <span id="ec-photo-error-{{$category->id}}"class="text-danger"></span>
                        </div>

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary ec-save" data-category="{{$category->id}}">Save changes</button>
                  </div>
              </div>
            </div>
          </div>

          <!-- EDIT MODAL END-->

          @endforeach
          </tbody>
          </table>
              </div>

          </div>
      </div>
  </div>
  </div>
</div>
@endsection



@section('pluginScripts')
<script src="/inspinia/js/plugins/dataTables/datatables.min.js"></script>
<script src="/inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
@endsection



@section('script')
<script src="/js/categoriesCreate.js"></script>
@endsection

