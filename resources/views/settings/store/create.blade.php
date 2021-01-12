@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Store Setup</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               {!! Form::open(['method'=> 'post','url' => 'store-store' ,'files' => true]) !!}
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Store Token</label>
                <input type="text" id="inputName" value="{{$token}}"  name="token" class="form-control" readonly="">
              </div>


              <div class="form-group">
                <label for="inputName">Store Name</label>
                <input type="text" id="inputName" name="name" class="form-control">
              </div>

               <div class="form-group">
                <label for="inputName">Store Location</label>
                <input type="text" id="inputName" name="location" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputDescription">Store Address</label>
                <textarea id="inputDescription" class="form-control" rows="2" name="address"></textarea>
              </div>

              <div class="form-group">
                <label for="inputName">Store Phone Number</label>
                <input type="text" id="inputName" name="phone" class="form-control">
              </div>

              <div class="form-group" name="status">
                <label for="inputStatus">Status</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Closed</option>
                  <option>Active</option>
                </select>
              </div>
         
            </div>
            <div class="card-footer">
               <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Submit " class="btn btn-success float-right">
            </div>

            {!!Form::close()!!}
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-8">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Stores Created</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body table-responsive">
                
              <table id="example1" class="table table-bordered table-striped table-sm">
               <thead>
                 <tr class="box-success">  
                   <th>Token</th>
                   <th>Name</th>
                   <th>Location</th>
                   <th>Contact</th>    
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 
                  @if(!empty($data))
                   @foreach ($data as $user)
                      <tr>
                        <td>{{$user->token}}</td>
                        <td>{{$user->name}}</td>
                         <td>{{$user->location}}</td>
                        <td>{{$user->phone}}</td>
                         <td><a href="{{url('store-drop/'.$user->id
)}}" class="btn btn-danger btn-xs">Drop</a></td>
                      </tr>
                  @endforeach
                  @endif
              </tbody>
              </table>
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        <div class="col-12">
         
        </div>
      </div>
    </section>
     <script type="text/javascript">
       

     </script>
@endsection