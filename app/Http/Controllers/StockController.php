<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;

use App\User;

use Auth;

use App\StockTransfer;

use App\Store;

use App\Product;

use App\Supplier;

use App\ProductOrder;

use App\ProductSuppluy;

use App\OrderBatch;

use Token;

use PDF;

use App\Notifications\NewOrder;

use Illuminate\Support\Facades\Notification;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

      public function createPDF() {

        $setting = [

                'business_name'=>'Lets Trade',
                'postal_address'=>'Po Box 345',
                'physical_address'=>'Nairobi',
                'phone'=>'0723456',
                'email'=>'ss',
                'logo_url'=>'s',
                           
                        ];

       
      // retreive all records from db
     $user = OrderBatch::all()->first();
     $today = \Carbon\Carbon::now();


      // share data to view
    //return view('reports.pdfload', compact('user','setting'));
      // view()->share('employee',compact('user','setting','items'));
      $pdf = PDF::loadView('reports.pdfload', compact('user','setting'));



      // download PDF file with download method
      return $pdf->download('pdf_file.pdf');
    }

  public function stockorderviewpdf()
    {

        $data = OrderBatch::all();

        $items = ProductOrder::all();

        return view('settings.stock.index',compact('data'));

        return $items;
    }

       public function stockorder()
    {
         
         $token = Token::Unique('suppliers','token',5);
         $t = date("Y",strtotime("now"));
         $token = strtoupper('#ODR-'.$token.'-'.$t);
         $data = Supplier::all();
         $prodct = Product::all();
        return view('settings.stock.order',compact('data','token','prodct'));
    }

    public function stockorderview()
    {

        $data = OrderBatch::all();

        $items = ProductOrder::all();

        return view('settings.stock.index',compact('data'));

        return $items;
    }

       public function stockorderviewnow($id)
    {

        $user = OrderBatch::all()->where('id',$id)->first();

        return view('settings.stock.vieworder',compact('user'));

        return $items;
    }

    #stock stock
    public function storeorder(Request $request)
    {

         $dates = OrderBatch::all()->where('token',$request->input('token'))->first();

         if (!empty($dates)) 
         {
         $data =  OrderBatch::findorfail($dates->id);
         }
         else
         {
            $data = new OrderBatch();
         }
       
       $data->token =$request->input('token');
       $data->date = \Carbon\Carbon::today();
       $data->supplier =$request->input('supplier');
       $data->ordered_by =\Auth::id();
       $data->status = 'Open';
       $data->save();


             foreach ($request->input('product') as $key => $value) 
                     {
                      $date = ProductOrder::all()->where('date',\Carbon\Carbon::today()->addDays(0))->where('product',$value)->where('token',$request->input('token'))->first();


                       // if (empty($date)) 
                       //            {
                                    $insert[] =
                                     [
                                      'token' => $request->input('token'),
                                      'ordered_by'  => \Auth::id(),
                                      'date'  => \Carbon\Carbon::today()->addDays(0),
                                      'product'  => $request->input('product')[$key],
                                      'ordered_qty'  => $request->input('qty')[$key],
                                      'status'  => 'Pending',
                                    
                                     ];

                                
                                   // }
                                   //  elseif (!empty($date)) 
                                   //  {

                                  }

                     
                     if(!empty($insert))                        
                        {                    
                         \DB::table('product_orders')->insert($insert);
                        }

                    


 



       return back()->with('status','Registered');
    }

      #stock stock
    public function storeorderupdate(Request $request)
    {

         $dates = OrderBatch::all()->where('token',$request->input('token'))->first();

       //  return $request->input('token');


       $data =  OrderBatch::findorfail($dates->id);
       $data->token =$request->input('token');
       $data->approved_by =\Auth::id();
       $data->status = 'Approved';
       $data->save();


             foreach ($request->input('product') as $key => $value) 
                     {
        $date = ProductOrder::all()->where('product',$value)->where('token',$request->input('token'))->first();


                     if (!empty($date)) 
                                {

                                   $datas =  ProductOrder::findorfail($date->id);
                                   $datas->approved_qty =$request->input('qty')[$key];
                                   $datas->approved_by = \Auth::id();
                                   $datas->status = 'Approved';
                                   $datas->save();
                                    
                                  }
                              }
                    
              $export_file_name = $request->input('token').'.pdf';

              $user = $data;


                $setting = [

                        'business_name'=>'Lets Trade',
                        'postal_address'=>'Po Box 345',
                        'physical_address'=>'Nairobi',
                        'phone'=>'0723456',
                        'email'=>'ss',
                        'logo_url'=>'s',
                                   
                                ];

               $fromUser = User::find(Auth::id());

              $toUser = User::all()->where('email',Auth::user()->email)->first();

   
              Notification::send($toUser, new NewOrder($fromUser,$data));

 
              $pdf = \PDF::loadView('reports.pdftest', compact('user','setting'));
            
              $pdf->save(storage_path('authorizations/').$export_file_name);   


       return redirect('stock-order-view')->with('status','Action Completed Successfully');
    }
    
    

          #Create a compnay
    public function stocktransfer()
    {
      //    $token = Token::Unique('stocks','token',5);
      // $t = date("Y",strtotime("now"));
      // $token = strtoupper('PROD-'.$token.'-'.$t);
        $store = Store::all();
         $data = Product::all();
        return view('pages.stocktransfer',compact('data','store'));
    }

    public function storetransfer(Request $request)
    {
        return redirect('stockindex');
    }

     public function stockindex()
    {
      //    $token = Token::Unique('stocks','token',5);
      // $t = date("Y",strtotime("now"));
      // $token = strtoupper('PROD-'.$token.'-'.$t);
        $store = Store::all();
         $data = Product::all();
        return view('pages.storeindex',compact('data','store'));
    }

       #Create a compnay
    public function createstock()
    {
         $token = Token::Unique('stocks','token',5);
      $t = date("Y",strtotime("now"));
      $token = strtoupper('PROD-'.$token.'-'.$t);
        $data = stock::all();
        return view('settings.stock.create',compact('data','token'));
    }

         #Create a compnay
    public function viewstock()
    {
         
        $data = stock::all();
        //return $data;
        return view('settings.stock.index',compact('data'));
    }

#get a compnay
    public function getstock($id)
    {
        $data = Stock::all()->where('id',$id)->first();
        return $data;
    }

#get a compnay
    public function deletestock($id)
    {
        $data = Stock::findorfail($id);
        $data->delete();
        return back()->with('danger','deleted successfully');
    
    }
#stock stock
    public function storestock(Request $request)
    {
       $data = new Stock();
        $data->token = $request->input('token');
        $data->name = $request->input('name');
        $data->price = $request->input('price');
        $data->desc = $request->input('desc');
        $data->status = $request->input('status');
        $data->unit = $request->input('unit');
        $data->current_stock_level = $request->input('current_stock_level');
        $data->min_level_overall = $request->input('min_level_overall');
        $data->min_level_store = $request->input('min_level_store');
       $data->save();



       return redirect('stock-view')->with('status','Registered');
    }

#update stock
    public function updatestock(Request $request)
    {
       $id = $request->input('stock_id');
       $data = Stock::findorfail($id);
            $data->name = $request->input('name');
        $data->price = $request->input('price');
        $data->desc = $request->input('desc');
        $data->status = $request->input('status');
        $data->unit = $request->input('unit');
        $data->current_stock_level = $request->input('current_stock_level');
        $data->min_level_overall = $request->input('min_level_overall');
        $data->min_level_store = $request->input('min_level_store');
       $data->save();

       return back()->with('status','Registered');
    }
}
