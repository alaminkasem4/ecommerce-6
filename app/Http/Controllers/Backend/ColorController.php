<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ColorRequest;
use App\Model\Color;
use Auth;
class ColorController extends Controller
{
   public function view(){
    	$data['alldata'] = Color::all();
    	return view('backend.colors.view-color',$data);
    }

    public function add(){
    	return view('backend.colors.add-color');
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:colors,name'
        ]);
        $data = new Color();
        $data->name = $request->name;
        $data->created_by   = Auth::user()->id;
        $data->save();
    	return redirect()->route('colors.view')->with('success','Inserted Successful');
    }

    public function edit($id){
    	$editdata = Color::find($id);
    	return view('backend.colors.add-color',compact('editdata'));
    }

    public function update(ColorRequest $request,$id){
        $data = Color::find($id);
        $data->name = $request->name;
        $data->updated_by   = Auth::user()->id;
        $data->save();
        return redirect()->route('colors.view')->with('success','Update Successful');
    }

    public function delete(Request $request){
    	$dataDelete = Color::find($request->id);
        $dataDelete->delete();
    	return redirect()->back()->with('success','Delete Successful');
    }
}
