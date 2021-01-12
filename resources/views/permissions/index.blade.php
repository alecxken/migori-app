@extends('layouts.template')

@section('title', '| Permissions')

@section('content')

 <div class="container-fluid">
 
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> <i class='fa fa-key'></i> Available Permissions</h3>
             
              <div class="card-tools">
                 {{-- <a href="{{ url('roles_index') }}" class="btn btn-info pull-left">Roles</a> --}}
           <a href="{{url('user_index') }}" class="btn btn-default pull-right">Users</a>
    <a href="{{url('roles_index') }}" class="btn btn-default pull-right">Roles</a>
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               

    <div class="card-body"> 


    <div class="table-responsive">
      <table class="table table-striped table-bordered table-hover" id="dataTables-example">


            <thead>
                <tr>
                    <th>Permissions</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                    <a href="{{ URL::to('permissions/'.$permission->id.'/edit') }}" class="btn btn-info pull-left" style="margin-right: 3px;">Edit</a>

                    {!! Form::open(['method' => 'DELETE', 'url' => ['permissions_destroy/'. $permission->id] ]) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <a href="{{ URL::to('permissions/create') }}" class="btn btn-success">Add Permission</a>

</div>
</div>

</div>
</div>

@endsection
