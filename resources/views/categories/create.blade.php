@extends('admin.master')



@section('pluginCSS')
<link href="/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection



@section('content')
<h1>Product categories</h1>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row">
      <div class="col-lg-12">
      <div class="ibox ">
          <div class="ibox-title">
              <h5>Basic Data Tables example with responsive plugin</h5>
              <div class="ibox-tools">
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
              </div>
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
                      
                        <div class="form-group {{$errors->has('name')?"has-error":""}}">
                          <label class="col-sm-2 col-form-label pl-0" for="name">Name:</label>
                          <input id="name" class="form-control" type="text" name="name" value="{{$category->name}}" required>
                          @if($errors->has('name'))
                          <span class="text-danger">{{$errors->first('name')}}</span>
                          @endif
                        </div>

                        <div class="form-group {{$errors->has('description')?"has-error":""}}">
                          <label class="col-sm-2 col-form-label pl-0" for="description">Description:</label>
                          <textarea id="description" class="form-control" type="text" name="description" required>{{$category->description}}</textarea>
                          @if($errors->has('description'))
                          <span class="text-danger">{{$errors->first('description')}}</span>
                          @endif
                        </div>

                  </div>

                  <div class="modal-footer">
                      <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                      <button type="button" class="btn btn-primary save" data-category="{{$category->id}}">Save changes</button>
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
      var categoryId = saveButton.data('category');
      var name = $("div.modal-body#"+categoryId).find('input[name="name"]').val();
      var description = $("div.modal-body#"+categoryId).find("textarea[name='description']").html();   
      $.ajax({
          type: 'POST',
          url: "/categories/"+categoryId,
          method: 'POST',
          data: {_token: CSRF_TOKEN, _method: 'PATCH', name: name, description: description},
          success: function(odgovor){
            console.log(odgovor);
          },
          error: function(response){
            console.log(response.responseJSON.errors.name);
          }
        
      });

    });

});
</script>


@endsection

