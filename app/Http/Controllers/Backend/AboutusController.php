<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\About; 
use Auth;

class AboutusController extends Controller
{
    
    public function view(){
    	$data['alldata'] = About::all();
    	return view('backend.Aboutus.view-aboutUs',$data);
    }

    public function add(){
    	return view('backend.Aboutus.add-aboutUs');
    }
    
    public function store(Request $request){

        $data = new About();
        $data->create_by   = Auth::user()->id;
        $data->description = $request->description;
        $data->save();
    	return redirect()->route('aboutus.view')->with('success','AboutUs Data Inserted Successful');
    }

    public function edit($id){
    	$editAboutUs = About::find($id);
    	return view('backend.Aboutus.edit-aboutUs',compact('editAboutUs'));
    }

    public function update(Request $request,$id){
        $data = About::find($id);
        $data->update_by   = Auth::user()->id;
        $data->description = $request->description;
        $data->save();
        return redirect()->route('aboutus.view')->with('success','AboutUs Update Successful');
    }

    public function delete(Request $request){
    	$aboutUs = About::find($request->id);
        $aboutUs->delete();
    	return redirect()->back()->with('success','Data Delete Successful');
    }
}
