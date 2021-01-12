@extends('layouts.template')

@section('title', '| Add Role')

@section('content')


 <div class="container-fluid">
 
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> <i class='fa fa-key'></i> Add Role</h3>
             
              <div class="card-tools">
                 {{-- <a href="{{ url('roles_index') }}" class="btn btn-info pull-left">Roles</a>
          <a href="{{ url('permissions_index') }}" class="btn btn-info pull-left">Permissions</a>
        <a href="{{ url('users_create') }}" class="btn btn-success">Add User</a> --}}
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               

    <div class="card-body"> 



    {{ Form::open(array('url' => 'roles_store')) }}
@csrf
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('name') }}</strong>
            </span>
        @endif
        {{ Form::text('name', null, array('class' => 'form-control')) }}
    </div>

    <h5><b>Assign Permissions</b></h5>

    <div class='form-group'>
        @foreach ($permissions as $permission)
            {{ Form::checkbox('permissions[]',  $permission->id ) }}
            {{ Form::label($permission->name, ucfirst($permission->name)) }}<br>

        @endforeach
    </div>

    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}

</div>
</div>
</div>
</div>


@endsection
