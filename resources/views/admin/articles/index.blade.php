@extends('admin.master')

@section('pluginCSS')
<link href="/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
@endsection


@section('content')
<h1>Manage articles</h1>
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
                    <table class="table table-striped table-bordered table-hover articles-table" >
                    <thead>
                    <tr>
                        <th>Last updated</th>
                        <th>SKU</th>
                        <th>Name</th>
                        {{-- <th>Description</th> --}}
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Avg. discount</th>
                        <th>Status</th>
                        <th>Popularity</th>
                        <th>Edit</th>
                    	  <th>Delete</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($articles as $article)
                    <tr class="gradeX">
                        <td>{{$article->updated_at}}</td>
                        <td class="centar">{{$article->sku}}</td>
                        <td class="centar">{{$article->name}}</td>
                        {{-- <td>{{$article->description}}</td> --}}
                        <td>{{$article->price}}</td>
                        <td>{{$article->quantity}}</td>
                        <td>17%</td>
                        <td>{{$article->quantity>0?$article->quantity . ' pcs available':'not available'}}</td>
                        <td>Popularity</td>
                        <td class="center"><a
                          class="btn btn-outline-info edit text-info"
                          href="{{route('articles.edit', ['article'=>$article->id])}}" 
                          data-article="{{$article->id}}">Edit</a></td>
                        <td class="center"><button 
                          type="button" 
                          class="btn btn-outline-info delete" 
                          data-article="{{$article->id}}">Delete</button></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Last updated</th>
                        <th>SKU</th>
                        <th>Name</th>
                        {{-- <th>Description</th> --}}
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Avg. discount</th>
                        <th>Status</th>
                        <th>Popularity</th>
                        <th>Edit</th>
                    	  <th>Delete</th>
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
@include('flash')
<script type="text/javascript">
  $(document).ready(function(){
    var CSRF_TOKEN = $("meta[name='csrf-token']").attr("content");
    var API_TOKEN = $("meta[name='api-token']").attr("content");

    //Initialization and customization of data tables
    var table = $('.articles-table').DataTable({
      pageLength: 25,
      responsive: true,
      dom: '<"html5buttons"B>lTfgitp',
      buttons: [
          {
            extend: 'copy',
            exportOptions: {
            columns: [1,2,3,4,5,6,7]
            }
          },
          {
            extend: 'csv', 
            exportOptions: {
            columns: [1,2,3,4,5,6,7]
            }
          },
          {
            extend: 'excel', 
            title: 'Articles Categories',
            exportOptions: {
            columns: [1,2,3,4,5,6,7]
            }
          },
          {
            extend: 'pdf', 
            title: 'Articles Categories',
            exportOptions: {
            columns: [1,2,3,4,5,6,7]
            }
          },
          {
            extend: 'print',
            customize: function (win)
            {
              $(win.document.body).addClass('white-bg');
              $(win.document.body).css('font-size', '10px');

              $(win.document.body).find('table')
                      .addClass('compact')
                      .css('font-size', 'inherit');
            }
          }
      ],
      "order": [[0, 'desc']],
      "columnDefs": [
        { "orderable": false, "targets": [8,9] }
      ]
    });
    //---END--- of Initialization and customization of data tables
    
    $(".articles-table").on('click', 'button.delete', function(){
      var _this = $(this);
      var row = _this.closest("tr");
      var articleId = _this.data('article');







      swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: '/api/articles/'+articleId,
            type: 'POST',
            dataType: 'JSON',
            data: {_token: CSRF_TOKEN, api_token: API_TOKEN, _method: 'DELETE', article: articleId},
            success: function(response){
              table.row(row).remove().draw();
            },
            error: function(response){

              console.log(response);
            }
          });
          swal.fire({
            title:'Deleted!',
            text: 'Your article has been deleted.',
            type:'success',
            showConfirmButton:false,
            timer: 800
          })
        }
      });

    });
    
  });
</script>
@endsection