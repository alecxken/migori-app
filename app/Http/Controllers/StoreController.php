<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Store;

use Token;

class StoreController extends Controller
{
    //
    #Create a compnay
	public function createstore()
	{
		 $token = Token::Unique('stores','token',5);
      $t = date("Y",strtotime("now"));
      $token = strtoupper('STORE-'.$token.'-'.$t);
		$data = store::all();
		return view('settings.store.create',compact('data','token'));
	}

#get a compnay
	public function getstore($id)
	{
		$data = store::all()->where('id',$id)->first();
		return $data;
	}

#get a compnay
	public function deletestore($id)
	{
		$data = store::findorfail($id);
		$data->delete();
		return back()->with('danger','deleted successfully');
	
	}
#Store store
	public function storestore(Request $request)
	{
	   $data = new store();
		$data->token = $request->input('token');
		$data->name = $request->input('name');
		$data->location = $request->input('location');
		$data->address = $request->input('address');
		$data->capacity = $request->input('capacity');
		$data->desc = $request->input('desc');
		$data->phone = $request->input('phone');
		$data->status = $request->input('status');
       $data->save();

       return back()->with('status','Registered');
	}

#update store
	public function updatestore(Request $request)
	{
	   $id = $request->input('store_id');
	   $data = store::findorfail($id);
        $data->name = $request->input('name');
		$data->location = $request->input('location');
		$data->address = $request->input('address');
		$data->capacity = $request->input('capacity');
		$data->desc = $request->input('desc');
		$data->phone = $request->input('phone');
		$data->status = $request->input('status');
       $data->save();

       return back()->with('status','Registered');
	}
}
