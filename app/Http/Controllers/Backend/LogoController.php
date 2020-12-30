<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\logo;
use Auth;

class LogoController extends Controller
{
   public function view(){
        $data['countlogo'] = Logo::count(); // count logo row number
    	$data['alldata'] = Logo::all();
    	// or use compect 
    	return view('backend.logo.view-logo',$data);
    }

    public function add(){
    	return view('backend.logo.add-logo');
    }
    
    public function store(Request $request){

        $data = new Logo();
        $data->create_by = Auth::user()->id;
    	if($request->file('image')){
            $file = $request->file('image');
            // @unlink(public_path('upload/user_img/'.$data->image));   // unlink 
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_img/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
    	return redirect()->route('logos.view')->with('success','Logo Insert Successful');
    }

    public function edit($id){
    	$editlogo = Logo::find($id);
    	return view('backend.logo.edit-logo',compact('editlogo'));
    }

    public function update(Request $request,$id){
        $data = Logo::find($id);
        $data->update_by = Auth::user()->id;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/logo_img/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/logo_img/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('logos.view')->with('success','Logo Update Successful');
    }

    public function delete(Request $request){
    	$logo = Logo::find($request->id);
    	if(file_exists('upload/logo_img/'.$logo->image) AND ! empty($logo->image)){
    		unlink('upload/logo_img/'.$logo->image);
    	}
        $logo->delete();
    	return redirect()->back()->with('success','Data Delete Successful');
    }


}
