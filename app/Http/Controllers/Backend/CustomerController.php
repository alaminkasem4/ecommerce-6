<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;

class CustomerController extends Controller
{
   public function view(){
   		$alldata  = User::where('usertype','customer')->where('status','1')->get();
   		return view('backend.customers.view-customer',compact('alldata'));
   	}

   public function draftView(){
   		$alldata  = User::where('usertype','customer')->where('status','0')->get();
   		return view('backend.customers.draft-customer',compact('alldata'));
   }

   public function delete(Request $request){
   	$dataDelete = User::find($request->id);
    	$dataDelete->delete();
    	if(file_exists('public/upload/user_img/'.$dataDelete->image) AND ! empty($dataDelete->image)){
    		unlink('public/upload/user_img/'.$dataDelete->image);
    	}
    	return redirect()->route('customers.draft')->with('success','Data Delete Successful');
    }

}
