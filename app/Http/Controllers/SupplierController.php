<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Stock;

use App\StockTransfer;

use App\Store;

use App\Product;

use App\Supplier;

use App\ProductOrder;

use App\ProductSuppluy;

use Token;


class SupplierController extends Controller
{
    //
          #Create a compnay
    public function createsupplier()
    {
         
         $token = Token::Unique('suppliers','token',5);
         $t = date("Y",strtotime("now"));
         $token = strtoupper('#SUP-'.$token.'-'.$t);
        $data = Supplier::all();
        return view('settings.supplier.create',compact('data','token'));
    }

  

 
#get a compnay
    public function getsupplier($id)
    {
        $data = Supplier::all()->where('id',$id)->first();
        return $data;
    }

#get a compnay
    public function deletesupplier($id)
    {
        $data = Supplier::findorfail($id);
        $data->delete();
        return back()->with('danger','deleted successfully');
    
    }
#stock stock
    public function storesupplier(Request $request)
    {
       $data = new Supplier();
       $data->token = $request->input('token');
        $data->name = $request->input('name');
        $data->phone = $request->input('phone');
        $data->email = $request->input('email');
        $data->address = $request->input('address');
        $data->location = $request->input('location');
        $data->registered_by = \Auth::user()->email;
        $data->documents = $request->input('documents');
        $data->owed = 0;
        $data->paid = 0;
        $data->balance = 0;        
        $data->save();



       return back()->with('status','Registered');
    }


}
