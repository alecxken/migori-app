@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Product Stock Settings</h3>

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
                   <th>Price</th>
                   <th>Unit</th>
                   <th>Quantity</th>
                   <th>Stock Level</th>       
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 
                  @if(!empty($data))
                   @foreach ($data as $user)
                      <tr>
                        <td>{{$user->token}}</td>
                        <td>{{$user->name}}</td>
                         <td>{{$user->price}}</td>
                        <td>{{$user->unit}}</td>
                        <td>{{$user->current_stock_level}}</td>
                        @php $pass = ($user->current_stock_level * 10)/(100* $user->min_level_overall) @endphp
                        <td>
<div class="progress progress-xs">
                          <div class="progress-bar progress-bar-danger" style="width: 55%"></div>
                        </div>
                        <div class="progress-bar bg-green" role="progressbar" aria-volumenow="{{$pass}}" aria-volumemin="0" aria-volumemax="100" style="width: {{$pass}}%">
                              </div></td>
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
   
    </section>
     <script type="text/javascript">
       

     </script>
@endsection