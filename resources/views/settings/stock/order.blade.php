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
               {!! Form::open(['method'=> 'post','url' => 'order-store' ,'files' => true]) !!}

            <div class="card-body">

              <div class="row">
                
             
              <div class="form-group col-md-6">
                <label for="inputName">Order Batch Code</label>
                <input type="text" id="inputName" value="{{$token}}"  name="token" class="form-control" readonly="">
              </div>

              <div class="form-group col-md-6">
                <label for="inputName">Select Supplier Name</label>
                <select class="form-control input-sm" name="supplier" required="">
                  <option value="">Choose Supplier</option>
                  @if(!empty($data))
                    @foreach($data as $datas)
                      <option>{{$datas->name}}</option>
                    @endforeach
                  @endif
                </select>
          
              </div>

              <div class="form-group col-md-12">
               @include('settings.stock.orderlist')
              </div>

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
     
      </div>
      <div class="row">
        
      </div>
      <hr>
          
    </section>
     <script type="text/javascript">
       

     </script>
@endsection