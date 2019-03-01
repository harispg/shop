@extends('admin.master')



@section('pluginCSS')
<link href="/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection



@section('content')
<h1 class="display-4">Product categories</h1>

<div class="widget style1 lazur-bg col-2 btn" data-toggle="modal" data-target="#newCategory">    
  <h2 class="font-bold">New Category</h2>
</div>

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
            <button type="button" class="btn btn-primary save" data-category="">Save changes</button>
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
          <table class="table table-striped table-bordered table-hover dataTables-example" >
          <thead>
          <tr>
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
              <td>{{$category->name}}</td>
              <td>{{$category->description}}</td>
              <td>
                <img src="/Images/Articles/tn-15509173068620015.jpg" width="100" height="100" />
              </td>
              <td class="center">
                <button class="btn btn-outline-primary edit" data-toggle="modal" data-target="#editModalCat{{$category->id}}" data-category="{{$category->id}}">Edit</button>
              </td>
              <td class="center">
                <button class="btn btn-outline-primary delete" data-toggle="modal" data-target="#deleteModal" data-category="{{$category->id}}">Delete</button>
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
                          <input id="name" class="form-control" type="text" name="name" value="{{$category->name}}" required>
                          <span id="name{{$category->id}}"class="text-danger name"></span>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
                          <textarea id="description" class="form-control" type="text" name="description" required>{{$category->description}}</textarea>  
                          <span id="description{{$category->id}}"class="text-danger"></span>
                        </div>

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary edit" data-category="{{$category->id}}">Save changes</button>
                  </div>
              </div>
            </div>
          </div>

          <!-- EDIT MODAL END-->


          @endforeach
          </tbody>
          <tfoot>
          <tr>
              <th>Rendering engine</th>
              <th>Browser</th>
              <th>Platform(s)</th>
              <th>Engine version</th>
              <th>CSS grade</th>
          </tr>
          </tfoot>
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
<script>
$(document).ready(function(){

  //initialization of custom-file-upload
  $('.custom-file-input').on('change', function() {
     let fileName = $(this).val().split('\\').pop();
     $(this).next('.custom-file-label').addClass("selected").html(fileName);
  }); 
  var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    $('.dataTables-example').DataTable({
        pageLength: 25,
        responsive: true,
        dom: '<"html5buttons"B>lTfgitp',
        buttons: [
            { extend: 'copy'},
            {extend: 'csv'},
            {extend: 'excel', title: 'ExampleFile'},
            {extend: 'pdf', title: 'ExampleFile'},

            {extend: 'print',
             customize: function (win){
                    $(win.document.body).addClass('white-bg');
                    $(win.document.body).css('font-size', '10px');

                    $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
            }
            }
        ]

    });

    $("button.btn.btn-primary.save").on('click', function(){
      var saveButton = $(this);
      var name = $("input#nameNew").val();
      var description = $("textarea#descriptionNew").val();
      var photo = $("input#photoNew")[0].files[0];
      var formData = new FormData;
      formData.append('photo', photo);
      formData.append('name', name );
      formData.append('description', description);
      $.ajax({
          type: 'POST',
          dataType: 'JSON',
          contentType: false,
          cache: false,
          processData: false,
          url: "/api/categories",
          method: 'POST',
          data: formData,
          success: function(response){
            $("span#nc-name-error").html("");
            $("span#nc-description-error").html("");
            $("span#nc-photo-error").html("");
            
            $("#newCategory").modal('toggle');

            swal.fire({
              title: "Done",
              html: "Sucessfully created category",
              type: "success",
              showConfirmButton: false,
              timer: 1500
              });
          },
          error: function(response){
            console.log(response);
            if(response.responseJSON.errors != null){
            var errors=response.responseJSON.errors;
            var nameError = errors.name;
            var descriptionError = errors.description;
            var photoError = errors.photo;
            var nameErrorSpan = $("span#nc-name-error");
            var descriptionErrorSpan = $("span#nc-description-error");
            var photoErrorSpan = $("span#nc-photo-error");

            if(nameError != null){
              nameErrorSpan.html(nameError);
            }else{
              nameErrorSpan.html("");
            }

            if(descriptionError != null){
              descriptionErrorSpan.html(descriptionError);
            }else{
              descriptionErrorSpan.html("");
            }

            if(photoError != null){
              photoErrorSpan.html(photoError);
            }else{
              photoErrorSpan.html("");
            }
            }
            
          }
        
      });

    });

    $("button.btn.btn-primary.edit").on('click', function(){
      var saveButton = $(this);
      var categoryId = saveButton.data('category');
      var name = $("div.modal-body#"+categoryId).find('input[name="name"]').val();
      var description = $("div.modal-body#"+categoryId).find("textarea[name='description']").val();
      $.ajax({
          type: 'POST',
          url: "/api/categories/"+categoryId,
          method: 'POST',
          data: {_token: CSRF_TOKEN, _method: 'PATCH', name: name, description: description},
          success: function(odgovor){
            console.log(odgovor);
          },
          error: function(response){
            var errors = response.responseJSON.errors;
            var nameError = errors.name;
            var descriptionError = errors.description;
            var nameErrorSpan = $("span#name"+categoryId);
            var descriptionErrorSpan = $("span#description"+categoryId);

            if(nameError != null){
              nameErrorSpan.html(nameError);
            }

            if(descriptionError != null){
              descriptionErrorSpan.html(descriptionError);
            }
          }
        
      });

    });

});
</script>


@endsection

