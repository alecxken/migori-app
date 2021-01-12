@extends('layouts.template')

@section('content')
{!! Form::open(['method'=> 'post','url' => 'store-stocks' ,'files' => true]) !!}
    <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="card card-secondary">
            <div class="card-header">
              <h3 class="card-title">Stock Transfer Module </h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
               
            <div class="card-body">

            


              <div class="form-group">
                <label for="inputName">Product Name</label>
                <select class="form-control" name="product">
                  @if(!empty($data))
                  @foreach($data as $datas)
                  <option>{{$datas->name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>

              <div class="form-group">
                <label for="inputName">Quantity To Transfer</label>
                <input type="number" id="inputName" name="price" required="" class="form-control">
              </div>

            <div class="form-group">
                <label for="inputName">From Store</label>
                <select class="form-control" name="product">
                  @if(!empty($store))
                  @foreach($store as $stores)
                  <option>{{$stores->name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>

              <div class="form-group">
                <label for="inputName">To Store</label>
                <select class="form-control" name="product">
                  @if(!empty($store))
                  @foreach($store as $stores)
                  <option>{{$stores->name}}</option>
                  @endforeach
                  @endif
                </select>
              </div>
         
            </div>
            <div class="card-footer">
                 <div class="col-12">
         <a href="#" class="btn btn-secondary">Cancel</a>
          <input type="submit" value="Submit Product" class="btn btn-success float-right">
        </div>
            </div>

       
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
     {{--    <div class="col-md-6">
          <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Product Stock Settings</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body table-responsive">
                 <div class="form-group">
                <label for="inputName">Product Code</label>
                <input type="text" id="inputName" value="{{$token}}"  name="token" class="form-control" readonly="">
              </div>
               <div class="form-group">                

                <label for="inputEstimatedBudget">Product Current Stock Level</label>
                <input type="number"   name="current_stock_level" id="inputEstimatedBudget"  required="" class="form-control">
              </div>
              <div class="form-group">                

                <label for="inputEstimatedBudget">Product Overall Minimum  Stock Level</label>
                <input type="number"   name="min_level_overall" id="inputEstimatedBudget" required="" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputSpentBudget">Product Store Minimum Stock Level</label>
                <input type="number"  name="min_level_store"  id="inputSpentBudget" class="form-control">
              </div>
            
             
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div> --}}
      </div>
      <div class="row">
      
      </div>
      <hr>
           {!!Form::close()!!}
    </section>
     <script type="text/javascript">
       

     </script>
@endsection