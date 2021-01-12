@extends('layouts.template')

@section('title', '| Edit User')

@section('content')
 <div class="container-fluid">
 
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> <i class='fa fa-user-plus'></i> Edit {{$user->name}}</h3>
             
              <div class="card-tools">
                 {{-- <a href="{{ url('roles_index') }}" class="btn btn-info pull-left">Roles</a>
          <a href="{{ url('permissions_index') }}" class="btn btn-info pull-left">Permissions</a>
        <a href="{{ url('users_create') }}" class="btn btn-success">Add User</a> --}}
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               

    <div class="card-body"> 

    {{ Form::open(['method'=>'POST','url'=>'user_update/'.$user->id]) }}{{-- Form model binding to automatically populate our fields with user data --}}
@csrf
    <div class="form-group">
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name', $user->name, array('class' => 'form-control', 'readonly')) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Email') }}
        {{ Form::email('email', $user->email, array('class' => 'form-control', 'readonly')) }}
    </div>

    <h5><b>Give Role</b></h5>

    <div class='form-group'>
        @foreach ($roles as $role)
            {{ Form::checkbox('roles[]',  $role->id, $user->roles ) }}
            {{ Form::label($role->name, ucfirst($role->name)) }}<br>

        @endforeach
    </div>

    <!-- <div class="form-group">
        {{ Form::label('password', 'Password') }}<br>
        {{ Form::password('password', array('class' => 'form-control')) }}

    </div>

    <div class="form-group">
        {{ Form::label('password', 'Confirm Password') }}<br>
        {{ Form::password('password_confirmation', array('class' => 'form-control')) }}


    </div> -->
    {{ Form::submit('Add', array('class' => 'btn btn-primary')) }}

    {{ Form::close() }}


</div>
</div>

</div>
</div>

@endsection
