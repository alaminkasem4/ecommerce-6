<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Model\Category;
use Auth;

class CategoryController extends Controller
{
    public function view(){
    	$data['alldata'] = Category::all();
    	return view('backend.categories.view-category',$data);
    }

    public function add(){
    	return view('backend.categories.add-category');
    }
    
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|unique:categories,name'
        ]);
        $data = new Category();
        $data->name = $request->name;
        $data->created_by   = Auth::user()->id;
        $data->save();
    	return redirect()->route('categories.view')->with('success','Data Inserted Successful');
    }

    public function edit($id){
    	$editCategory = Category::find($id);
    	return view('backend.categories.add-category',compact('editCategory'));
    }

    public function update(CategoryRequest $request,$id){
        $data = Category::find($id);
        $data->name = $request->name;
        $data->updated_by   = Auth::user()->id;
        $data->save();
        return redirect()->route('categories.view')->with('success','Update Successful');
    }

    public function delete(Request $request){
    	$dataDelete = Category::find($request->id);
        $dataDelete->delete();
    	return redirect()->back()->with('success','Delete Successful');
    }
}
