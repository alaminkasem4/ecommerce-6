<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Slider;
use Auth;


class SlidersController extends Controller
{
    public function view(){

    	$data['alldata'] = Slider::all();
    	return view('backend.sliders.view-slider',$data);
    }

    public function add(){
    	return view('backend.sliders.add-slider');
    }
    
    public function store(Request $request){

        $data = new Slider();
        $data->create_by = Auth::user()->id;
        $data->slider_title = $request->slider_title;
        $data->slider_text  = $request->slider_text;
       
    	if($request->file('image')){
            $file = $request->file('image');
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/sliders_img/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
    	return redirect()->route('sliders.view')->with('success','Slider Data Inserted Successful');
    }

    public function edit($id){
    	$editslider = Slider::find($id);
    	return view('backend.sliders.edit-slider',compact('editslider'));
    }

    public function update(Request $request,$id){
        $data = Slider::find($id);
        $data->update_by = Auth::user()->id;
        $data->slider_title = $request->slider_title;
        $data->slider_text  = $request->slider_text;
        if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/sliders_img/'.$data->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/sliders_img/'),$filename);
            $data['image'] = $filename;
        }
        $data->save();
        return redirect()->route('sliders.view')->with('success','Slider Update Successful');
    }

    public function delete(Request $request){
    	$slider = Slider::find($request->id);
    	if(file_exists('upload/sliders_img/'.$slider->image) AND ! empty($slider->image)){
    		unlink('upload/sliders_img/'.$slider->image);
    	}
        $slider->delete();
    	return redirect()->back()->with('success','Data Delete Successful');
    }


}
