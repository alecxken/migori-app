@extends('layouts.template')

@section('title', '| Add User')

@section('content')

 <div class="container-fluid">
 
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"> <i class='fa fa-user-plus'></i> Add New User</h3>
             
              <div class="card-tools">
                 {{-- <a href="{{ url('roles_index') }}" class="btn btn-info pull-left">Roles</a>
          <a href="{{ url('permissions_index') }}" class="btn btn-info pull-left">Permissions</a>
        <a href="{{ url('users_create') }}" class="btn btn-success">Add User</a> --}}
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               

    <div class="card-body"> 

       
            
        
    {{ Form::open(array('url' => 'user_stores')) }}

    <div class="form-group">
        {{ Form::label('name', 'Full Name') }}
        {{ Form::text('name', '', array('class' => 'form-control')) }}
    </div>

    <div class="form-group">
        {{ Form::label('name', 'Phone Number') }}
        {{ Form::number('phone', '', array('class' => 'form-control')) }}
    </div>

     <div class="form-group">
        {{ Form::label('name', 'Email Address') }}
        {{ Form::email('email', '', array('class' => 'form-control')) }}
    </div>


     <div class="form-group">
        {{ Form::label('name', 'ID Number') }}
        {{ Form::text('id_number', '', array('class' => 'form-control')) }}
    </div>

      <div class="form-group">
        {{ Form::label('name', 'Base Location') }}
        {{ Form::text('store', '', array('class' => 'form-control')) }}
    </div>


   

   {{--  --}}

  </div>
  <div class="card-footer"> 

    {{ Form::submit('Submit Details', array('class' => 'btn btn-primary')) }}
</div>
    {{ Form::close() }}

</div>

</div>
</div>


@endsection
