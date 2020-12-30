<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\About;
use App\model\communicate;
use App\model\Product;
use App\model\ProductSubImage;
use App\model\ProductColor;
use App\model\ProductSize;
use App\model\Size;
use App\model\Color;
use Cart;

class CartController extends Controller
{
    public function addCart(Request $request){
    	$this->validate($request,[
            'colorID' => 'required',
            'sizeID' => 'required'
        ]);
    	$product = Product::where('id',$request->id)->first();
    	$product_size =  Size::where('id',$request->sizeID)->first();
    	$product_color = Color::where('id',$request->colorID)->first();
    	Cart::add([
    		'id' 	=> $product->id,
    		'qty' 	=> $request->qty,
    		'price' => $product->price,
    		'name'  => $product->name,
    		'weight'=> 550,
    		'options' =>[
    			'size_id' 		=> $request->sizeID,
    			'size_name' 	=> $product_size->name,
    			'color_id' 		=> $request->colorID, 	
    			'color_name' 	=> $product_color->name,
    			'image' 		=> $product->image	
    		],
    	]);
    	return redirect()->route('insert.show')->with('success','product Added successfully');
    }

    public function showCart(){
    	$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
    	return view('frontend.single_pages.shopping-cart',$data);
    }

    public function updateCart(Request $request){
    	Cart::update($request->rowId,$request->qty);
    	return redirect()->route('insert.show')->with('success','Update successfully');
    }

    public function deleteCart($rowId){
    	Cart::remove($rowId);
    	return redirect()->route('insert.show')->with('success','Remove successfully');
    }

}
