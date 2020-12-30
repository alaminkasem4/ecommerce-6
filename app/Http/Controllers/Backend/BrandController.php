<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\BrandRequest;
use App\Model\Brand;
use Auth;

class BrandController extends Controller
{
   public function view(){
    	$data['alldata'] = Brand::all();
    	return view('backend.brands.view-brand',$data);
    }

    public function add(){
    	return view('backend.brands.add-brand');
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:brands,name'
        ]);
        $data = new Brand();
        $data->name = $request->name;
        $data->created_by   = Auth::user()->id;
        $data->save();
    	return redirect()->route('brands.view')->with('success','Inserted Successful');
    }

    public function edit($id){
    	$editdata = Brand::find($id);
    	return view('backend.brands.add-brand',compact('editdata'));
    }

    public function update(BrandRequest $request,$id){
        $data = Brand::find($id);
        $data->name = $request->name;
        $data->updated_by   = Auth::user()->id;
        $data->save();
        return redirect()->route('brands.view')->with('success','Update Successful');
    }

    public function delete(Request $request){
    	$dataDelete = Brand::find($request->id);
        $dataDelete->delete();
    	return redirect()->back()->with('success','Delete Successful');
    }

}
