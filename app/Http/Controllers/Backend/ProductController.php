<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Category;
use App\Model\Brand;
use App\Model\Size;
use App\Model\Color;
use App\Model\Product;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\ProductSubImage;
use Auth;
use DB;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function view(){
    	$data['alldata'] = Product::orderBy('id','desc')->get();
    	return view('backend.products.view-product',$data);
    }

    public function add(){
    	$data['categories'] = Category::all();
    	$data['brands'] = Brand::all();
    	$data['sizes'] = Size::all();
    	$data['colors'] = color::all();
    	return view('backend.products.add-product',$data);
    }
    
    public function store(Request $request){
    	DB::transaction(function()use($request){
    		$this->validate($request,[
            'name' => 'required|unique:products,name',
            'color_id' => 'required',
            'size_id' => 'required'
	        ]);
	        $product = new Product();
	        $product->category_id 	= $request->category_id;
	        $product->brand_id 		= $request->brand_id;
	        $product->name 			= $request->name;
	        $product->slug 			= str_slug($request->name);
	        $product->price 		= $request->price;
	        $product->title 		= $request->title;
	        $product->desc 			= $request->desc;
	        $img = $request->file('image');
	        if($img){
	            $imgName = date('YmdHi').$img->getClientOriginalName();
	            $img->move('upload/product_img/',$imgName);
	            $product['image'] = $imgName;
             }
	        if($product->save()){
	        // sub image
	        	$files = $request->sub_image;
	        	if(!empty($files)){
	        		foreach ($files as $file) {
	        			$imgName = date('YmdHi').$file->getClientOriginalName();
			            $file->move('upload/product_img/product_sub_img/',$imgName);
			            $subImage['sub_image'] = $imgName;

			            $subImage = new ProductSubImage();
			            $subImage->product_id = $product->id;
			            $subImage->sub_image  = $imgName;
			            $subImage->save();
	        		}
	        	}
	        	//color-table
	        	$colors = $request->color_id;
	        	if(!empty($colors)){
	        		foreach($colors as $color){
	        			$mycolor = new ProductColor();
	        			$mycolor->product_id = $product->id;
	        			$mycolor->color_id = $color;
	        			$mycolor->save();
	        		}
	        	}
	        	$sizes = $request->size_id;
	        	if(!empty($sizes)){
	        		foreach ($sizes as $size) {
	        			$mysize = new ProductSize();
	        			$mysize->product_id = $product->id;
	        			$mysize->size_id    = $size;
	        			$mysize->save();
	        		}
	        	}
	        }else{
	        	return redirect()->back()->with('error','Your Product Data Is Not Save');
	        }
    	});
    	return redirect()->route('products.view')->with('success','Inserted Successful');
    }


    public function edit($id){
    	$data['editdata']= Product::find($id);
    	$data['categories'] = Category::all();
    	$data['brands'] = Brand::all();
    	$data['sizes'] = Size::all();
    	$data['colors'] = color::all();
    	$data['color_array'] = ProductColor::select('color_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get()->toArray();
    	$data['size_array'] = ProductSize::select('size_id')->where('product_id',$data['editdata']->id)->orderBy('id','asc')->get()->toArray();
    	return view('backend.products.add-product',$data);
    }

    public function update(ProductRequest $request,$id){
       DB::transaction(function()use($request,$id){
    		$this->validate($request,[
            'color_id' => 'required',
            'size_id' => 'required'
	        ]);
	        $product = Product::find($id);
	        $product->category_id 	= $request->category_id;
	        $product->brand_id 		= $request->brand_id;
	        $product->name 			= $request->name;
	        $product->slug 			= str_slug($request->name);
	        $product->price 		= $request->price;
	        $product->title 		= $request->title;
	        $product->desc 			= $request->desc;
	        $img = $request->file('image');
	        if($img){
	            $imgName = date('YmdHi').$img->getClientOriginalName();
	            $img->move('upload/product_img/',$imgName);
	            if(file_exists('upload/product_img/'.$product->image) AND ! empty($product->image)){
	            	unlink('upload/product_img/'.$product->image);
	            }
	            $product['image'] = $imgName;
             }
	        if($product->save()){
	        // sub image update
	        	$files = $request->sub_image;
	        	if(!empty($files)){
	        		$subimgs = ProductSubImage::where('product_id',$id)->get()->toArray();
	        		foreach($subimgs as $subimg){
	        			if(!empty($subimg)){
	        				unlink('upload/product_img/product_sub_img/'.$subimg['sub_image']);
	        			}
	        		}
	        		ProductSubImage::where('product_id',$id)->delete();
	        	}
	        	if(!empty($files)){
	        		foreach ($files as $file) {
	        			$imgName = date('YmdHi').$file->getClientOriginalName();
			            $file->move('upload/product_img/product_sub_img/',$imgName);
			            $subImage['sub_image'] = $imgName;

			            $subImage = new ProductSubImage();
			            $subImage->product_id = $product->id;
			            $subImage->sub_image  = $imgName;
			            $subImage->save();
	        		}
	        	}
	        	//color-table update
	        	$colors = $request->color_id;
	        	if(!empty($colors)){
	        		ProductColor::where('product_id',$id)->delete();
	        	}
	        	if(!empty($colors)){
	        		foreach($colors as $color){
	        			$mycolor = new ProductColor();
	        			$mycolor->product_id = $product->id;
	        			$mycolor->color_id = $color;
	        			$mycolor->save();
	        		}
	        	}
	        	//size table update
	        	$sizes = $request->size_id;
	        	if(!empty($sizes)){
	        		ProductSize::where('product_id',$id)->delete();
	        	}
	        	if(!empty($sizes)){
	        		foreach ($sizes as $size) {
	        			$mysize = new ProductSize();
	        			$mysize->product_id = $product->id;
	        			$mysize->size_id    = $size;
	        			$mysize->save();
	        		}
	        	}
	        }else{
	        	return redirect()->back()->with('error','Your Product Data Is Not Update');
	        }
    	});
    	return redirect()->route('products.view')->with('success','Update Successful');    
    }

    public function delete(Request $request){
    	$product = Product::find($request->id);
    	if(file_exists('upload/product_img/'.$product->image) AND ! empty($product->image)){
    		unlink('upload/product_img/'.$product->image);
    	}
    	$subimgs = ProductSubImage::where('product_id',$product->id)->get()->toArray();
    	if(!empty($subimgs)){
			foreach($subimgs as $subimg){
				if(!empty($subimg)){
					unlink('upload/product_img/product_sub_img/'.$subimg['sub_image']);
				}
			}
    	}
    	ProductSubImage::where('product_id',$product->id)->delete();
    	ProductColor::where('product_id',$product->id)->delete();
    	ProductSize::where('product_id',$product->id)->delete();
    	$product->delete();
    	return redirect()->back()->with('success','Delete Successful');
    }

    public function details($id){
    	$details = Product::find($id);
    	return view('backend.products.details-product',compact('details'));
    }
}
