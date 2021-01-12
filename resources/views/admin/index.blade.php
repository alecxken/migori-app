@extends('layouts.template')

@section('title', '| Users')

@section('content')

 <div class="container-fluid">
 
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">User Management</h3>
             
              <div class="card-tools">
                 <a href="{{ url('roles_index') }}" class="btn btn-info pull-left">Roles</a>
          <a href="{{ url('permissions_index') }}" class="btn btn-info pull-left">Permissions</a>
        <a href="{{ url('users_create') }}" class="btn btn-success">Add User</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               
         <div class="card-body table-responsive" id="table_wrapper">
                
                     <table id="example2" class="table table-bordered table-striped table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <!-- <th>Date/Time Added</th> -->
                    <th>User Roles</th>
                    <th>Operations</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>@if(is_null($user->roles()))

                      <p>No Role</p>
                      @else

                      {{  $user->roles()->pluck('name')->implode(' ,') }}</td>
                      @endif
                    {{-- Retrieve array of roles associated to a user and convert to string --}}
                    <td>
                      <div class="row">
                           {!! Form::open([ 'method' => 'post', 'url' => ['user_edit/'. $user->id] ]) !!}
                      {!! Form::submit('Edit ', ['class' => 'btn btn-primary btn-xs pull-left']) !!}
                      {!! Form::close() !!}
                      {!! Form::open(['method' => 'DELETE', 'url' => ['user_destroy/'.$user->id] ]) !!}
                      {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-xs pull-left']) !!}
                      {!! Form::close() !!}
                      </div>
                   

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
      </div>
    </div>
</div>
</div>
</div>
</div>

<script type="text/javascript">
  
  
//      $(document).ready(function() {
// var table = $('#report-table').DataTable(
//     {
//     paging     : true,
//     lengthChange: true,
//     searching   : true,
//     ordering   : true,
//     info       : true,
//     autoWidth   : true,
//     buttons: [
//         'excel'
//     ]
//     });

//     table.buttons().container()
//         .appendTo( '#table_wrapper .col-sm-6:eq(0)' );

// } );
</script>

@endsection
