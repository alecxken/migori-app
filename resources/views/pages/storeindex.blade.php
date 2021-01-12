@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="row">

        <div class="col-md-12">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Stock Transfer Report Page</h3>

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
                   <th>Product Name</th>
                   <th>Quantity</th>
                   <th>Cost </th>
                   <th>From</th>
                   <th>To</th>  
                   <th>Authorization</th>      
                   <th>Action</th>                               
                </tr>
              </thead>
               <tbody> 

                  <tr >  
                   <td>EKE-TRAN-2028#</td>
                   <td>Cement</td>
                   <td>10</td>
                   <td>Ksh {{number_format(5600)}} </td>
                   <td>HQ Store</td>
                   <td>Mlimani Store</td>  
                   <td>Auth : Ali Musa<br> App: Trizzah<br>{{\Carbon\Carbon::yesterday()->format('d F Y')}}</td>      
                   <td><label class="btn btn-primary btn-xs">Approve</label></td>                               
                </tr>

                 <tr >  
                   <td>EKE-TRAN-2028#</td>
                   <td>Y6 Steel</td>
                   <td>156</td>
                   <td>Ksh {{number_format(156000)}} </td>
                   <td>Mlimani Store</td>
                   <td>Kianzu Store</td>  
                   <td>Auth : James<br> App: Mike<br>{{\Carbon\Carbon::today()->format('d F Y')}}</td>      
                   <td><label class="btn btn-primary btn-xs">Approve</label></td>                               
                </tr>
                  @if(!empty($datas))
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