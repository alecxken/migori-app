@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Product Order Page</h3>

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
                   <th>Date</th>
                   <th>Supplier</th>
                   <th>Ordered By</th>
                   <th>Status</th>       
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 
                  @if(!empty($data))
                   @foreach ($data as $user)
                      <tr>
                        <td>{{$user->token}}</td>
                        <td>{{$user->date}}</td>
                         <td>{{$user->supplier}}</td>
                        <td>{{$user->ordered_by}}</td>
                        <td>{{$user->status}}</td>
                 
                         <td>
                          <a href="{{url('stock-view/'.$user->id
)}}" class="btn btn-success btn-xs">View</a>

<a href="{{url('store-drop/'.$user->id
)}}" class="btn btn-danger btn-xs">Drop</a>
</td>
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
   
    </section>
     <script type="text/javascript">
       

     </script>
@endsection