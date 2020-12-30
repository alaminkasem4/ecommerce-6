<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User; //model

class UsersController extends Controller
{
    //
    public function view(){
    	$data['alldata'] = User::where('usertype','Admin')->where('status','1')->get();
    	// or use compect 
    	return view('backend.users.view-user',$data);
    }

    public function add(){
    	return view('backend.users.add-user');
    }
    public function store(Request $request){
    	$this->validate($request,[
    		'role'        =>'required',
    		'name'	          => 'required',
    		'email'	          => 'required|unique:users,email',
    		'new_password'    => 'required|min:8',
    		'confrim_password'=> 'required|same:new_password|min:8',
    	]);
       	$data 		    = new User();
    	$data->usertype = 'Admin';
        $data->role     = $request->role;
    	$data->name 	= $request->name;
    	$data->email 	= $request->email;
    	$data->password = bcrypt($request->new_password);
    	$data->save();
    	return redirect()->route('users.view')->with('success','Data Insert Successful');
    }

    public function edit($id){
    	$editdata = User::find($id);
    	return view('backend.users.edit-user',compact('editdata'));
    }

    public function update(Request $request,$id){
    	$this->validate($request,[
    		'role'    =>'required',
    		'name'	  =>'required',
    		'email'	  =>'required',
    	]);
       	$data 		    = User::find($id);
    	$data->role     = $request->role;
    	$data->name 	= $request->name;
    	$data->email 	= $request->email;
    	$data->save();
    	return redirect()->route('users.view')->with('success','User Data Update Successful');
    }

    public function delete(Request $request){
    	$dataDelete = User::find($request->id);
    	$dataDelete->delete();
    	if(file_exists('public/upload/user_img/'.$dataDelete->image)AND ! empty($dataDelete->image)){
    		unlink('public/upload/user_img/'.$dataDelete->image);
    	}
    	return redirect()->back()->with('success','Data Delete Successful');
    }
}
