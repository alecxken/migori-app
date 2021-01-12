@extends('reports.layouts.master')
@section('title', 'OverDue Loans')
@section('footer')
    @include('reports.layouts.footer', ['setting' => $setting])
@endsection
@section('header')
    @include('reports.layouts.header', ['setting' => $setting])
@endsection
@section('title-content')
    <table  width="100%" class="table-fixed">
        <thead>
        <tr>
            <th colspan="3" align="left" class="cell-title-medium cell-text-center">
                Loans OVERDUE : {{$today}}
            </th>
        </tr>
        </thead>
    </table>
@endsection

@section('main-content')
    <table class="table table-sm">
        <thead>
            <tr>
                <th>Order Batch</th>
                <th>Product Name</th>               
                <th class="cell-text-right">Quantity</th>
            </tr>
        </thead>
        <tbody>

              @php  $data = \App\ProductOrder::all()->where('token',$user->token);@endphp
           @if(!empty($data))
          
              @foreach($data as $vat)

                      <tr id='t0'>
                            <td>{{$vat->token}}</td>                      
                            <td>{{\App\Product::all()->where('token',$vat->product)->first()->name}}</td>
                            <td class="cell-text-right">{{$vat->ordered_qty}}</td>
                      
                       </tr>
              @endforeach
              
           @endif

       
        </tbody>
    </table>
@endsection