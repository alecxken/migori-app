@extends('layouts.template')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Suppliers Setup</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               {!! Form::open(['method'=> 'post','url' => 'order-update' ,'files' => true]) !!}

            <div class="card-body">

              <div class="row">
                
             
              <div class="form-group col-md-6">
                <label for="inputName">Order Batch Code</label>
                <input type="text" id="inputName" value="{{$user->token}}"  name="token" class="form-control" readonly="">
              </div>

              <div class="form-group col-md-6">
                <label for="inputName">Select Supplier</label>
                <input type="text" id="inputName" value="{{$user->supplier}}"  name="supplier" class="form-control" readonly="">
              </div>

             

              <div class="form-group col-md-12">
               <table class="table table-bordered table-hover order-lists table-sm" id="">
        <thead class="bg-primary">
          <tr >
          
            <th >
              Product
            </th>
            <th >
              Quantity
            </th>
              <th>
              Approved Qty
            </th>
            <th></th>
           
          </tr>
        </thead>
        <tbody>
           @php  $data = \App\ProductOrder::all()->where('token',$user->token);@endphp
           @if(!empty($data))
           @foreach($data as $vat)
          <tr id='t0'>
          
            <td>
              <input type="hidden" name="product[]" value="{{$vat->product}}">
            {{\App\Product::all()->where('token',$vat->product)->first()->name}}
            </td>
            <td>
            {{$vat->ordered_qty}}
            </td>
            <td>
            <input type="text" name="qty[]" class="form-control input-sm" value="{{$vat->ordered_qty}}">
            </td>
           </tr>
           @endforeach
           @endif

        
         

        </tbody>
       
      </table>
              </div>

               </div>

              

             
         
            </div>
            <div class="card-footer">
               <div class="col-12">
            <a href="#" class="btn btn-secondary">Cancel</a>
            <input type="submit" value="Approve & Send" class="btn btn-success float-right">
        </div>
            </div>
             {!!Form::close()!!}

       
            <!-- /.card-body -->
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