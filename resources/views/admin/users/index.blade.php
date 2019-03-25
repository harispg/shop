@extends('admin.master')

@section('pluginCSS')
<link href="/inspinia/css/plugins/dataTables/datatables.min.css" rel="stylesheet">
<link href="/inspinia/css/plugins/select2/select2.min.css" rel="stylesheet">

@endsection


@section('content')

<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-9">
        <h2>Users index</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin">Admin</a>
            </li>
            <li class="breadcrumb-item">
                <strong>Users</strong>
            </li>
        </ol>
    </div>
</div>

<div class="row wrapper wrapper-content animated fadeInRight">

          <h1 class="pl-3">Manage users</h1>
          <div class="col-lg-12">
            <div class="ibox">
              <div class="ibox-title">
                  <h5>Users table</h5>
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
                    <table class="table table-striped table-bordered table-hover users-table" >
                    <thead>
                    <tr>
                        <th>Last updated</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Super Admin</th>
                        <th>Role</th>
                        <th>Number of logins</th>
                        <th>Email verified</th>
                        <th>Number of orders</th>
                        <th>Last purchase date orderlink</th>
                        <th>last login</th>
                        <th>Total spent</th>
                        <th>Profile</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                    <tr class="gradeX">
                        <td>{{$user->updated_at}}</td>
                        <td><img src="/{{$user->avatar}}" style="height: 6em; width: 6em"></td>
                        <td class="centar">{{$user->name}}</td>
                        <td class="centar">{{$user->email}}</td>
                        <td><input class="user-superAdmin" type="checkbox" name="superAdmin" data-superAdmin="{{$user->superAdmin}}" {{$user->superAdmin?"checked":""}}></td>
                        <td class="centar">{{$user->roles->count()?$user->roles->first()->name:"no role"}}</td>
                        <td>{{$user->numberOfLogins}}</td>
                        <td>{{$user->email_verified_at}}</td>
                        <td>11</td>
                        <td>{{now()}}</td>
                        <td>{{$user->updated_at}}</td>
                        <td>1536,47</td>
                        <td class="center"><a
                          class="btn btn-outline-info profile text-info"
                          href="{{route('admin.users.show', ['user'=>$user->id])}}" 
                          data-user="{{$user->id}}">Profile</a></td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <th>Last updated</th>
                        <th>Avatar</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Super Admin</th>
                        <th>Role</th>
                        <th>Number of logins</th>
                        <th>Email verified</th>
                        <th>Number of orders</th>
                        <th>Last purchase date orderlink</th>
                        <th>last login</th>
                        <th>Total spent</th>
                        <th>Profile</th>
                    </tr>
                    </tfoot>
                    </table>
                  </div>

              </div>
          </div>
      </div>

  </div>

  <div id="banModal" class="modal" hidden>
    
  </div>


@endsection

@section('pluginScripts')
<script src="/inspinia/js/plugins/dataTables/datatables.min.js"></script>
<script src="/inspinia/js/plugins/dataTables/dataTables.bootstrap4.min.js"></script>
<script href="/backend/assets/vendor/bsMultiSelect.js" rel="stylesheet"></script>
<script src="/inspinia/js/plugins/select2/select2.full.min.js"></script>


@endsection

@section('script')
@include('flash')
<script type="text/javascript">
  $(document).ready(function(){
    var CSRF_TOKEN = $("meta[name='csrf-token']").attr("content");
    var API_TOKEN = $("meta[name='api-token']").attr("content");


    //Initialization and customization of data tables
    var table = $('.users-table').DataTable({
      pageLength: 25,
      responsive: true,
      dom: '<"html5buttons"B>lTfgitp',
      buttons: [
          {
            extend: 'copy',
            exportOptions: {
            columns: [2,3,4,5,6,7,8,9,10,11]
            }
          },
          {
            extend: 'csv', 
            exportOptions: {
            columns: [2,3,4,5,6,7,8,9,10,11]
            }
          },
          {
            extend: 'excel', 
            title: 'Users table',
            exportOptions: {
            columns: [2,3,4,5,6,7,8,9,10,11]
            }
          },
          {
            extend: 'pdf', 
            title: 'Users table',
            exportOptions: {
            columns: [2,3,4,5,6,7,8,9,10,11]
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
        { "orderable": false, "targets": [1,4,12] }
      ]
    });
    //---END--- of Initialization and customization of data tables
    
  });
</script>
@endsection