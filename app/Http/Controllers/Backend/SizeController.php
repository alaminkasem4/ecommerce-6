<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SizeRequest;
use App\Model\Size;
use Auth;


class SizeController extends Controller
{
    public function view(){
    	$data['alldata'] = Size::all();
    	return view('backend.sizes.view-size',$data);
    }

    public function add(){
    	return view('backend.sizes.add-size');
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:sizes,name'
        ]);
        $data = new Size();
        $data->name = $request->name;
        $data->created_by   = Auth::user()->id;
        $data->save();
    	return redirect()->route('sizes.view')->with('success','Inserted Successful');
    }

    public function edit($id){
    	$editdata = Size::find($id);
    	return view('backend.sizes.add-size',compact('editdata'));
    }

    public function update(SizeRequest $request,$id){
        $data = Size::find($id);
        $data->name = $request->name;
        $data->updated_by   = Auth::user()->id;
        $data->save();
        return redirect()->route('sizes.view')->with('success','Update Successful');
    }

    public function delete(Request $request){
    	$dataDelete = Size::find($request->id);
        $dataDelete->delete();
    	return redirect()->back()->with('success','Delete Successful');
    }
}
