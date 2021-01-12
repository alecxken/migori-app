@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Suppliers Setup</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               {!! Form::open(['method'=> 'post','url' => 'supplier-store' ,'files' => true]) !!}

            <div class="card-body">

            
              <div class="form-group">
                <label for="inputName">Supplier Code</label>
                <input type="text" id="inputName" value="{{$token}}"  name="token" class="form-control" readonly="">
              </div>

              <div class="form-group">
                <label for="inputName">Supplier Name</label>
                <input type="text" id="inputName" name="name" required="" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputName">Supplier Contact No</label>
                <input type="number" id="inputName" name="phone" required="" class="form-control">
              </div>


              <div class="form-group">
                <label for="inputName">Supplier Email Address</label>
                <input type="email" id="inputName" name="email" required="" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputDescription">Supplier Address</label>
                <textarea id="inputDescription" class="form-control" rows="1" name="address"></textarea>
              </div>


               <div class="form-group">
                <label for="inputName">Supplier Location</label>
                <input type="text" id="inputName" name="location" required="" class="form-control">
              </div>

              

             
         
            </div>
            <div class="card-footer">
               <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Submit Product" class="btn btn-success float-right">
        </div>
            </div>
             {!!Form::close()!!}

       
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <div class="col-md-8">
         
           <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Registered Suppliers</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0">
                <table class="table table-sm">
                  <thead>
                    <tr>
                      <th>#REF</th>
                      <th>Task</th>
                      <th>Progress</th>
                      <th>Label</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(!empty($data))

                      @foreach($data as $pot)
                    <tr>
                      <td>{{$pot->token}}</td>
                      <td>{{$pot->name}}</td>
                      <td>{{$pot->phone}}</td>
                      <td><span class="badge bg-danger">{{$pot->email}}</span></td>
                    
                      
                    </tr>
                    @endforeach

                    @endif
                
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
          <!-- /.card -->
        </div>
      </div>
      <div class="row">
        
      </div>
      <hr>
          
    </section>
     <script type="text/javascript">
       

     </script>
@endsection