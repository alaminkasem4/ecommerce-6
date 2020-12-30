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
use Mail;
use DB;


class FrontendController extends Controller
{
    // home
    public function index(){
        $data['logo']     = Logo::first();
        $data['sliders']  = Slider::all();
        $data['contact']  = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id','desc')->paginate(12);
    	return view('frontend.layouts.index',$data);
    }
    public function productList(){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::orderBy('id','desc')->paginate(12);
        return view('frontend.single_pages.product-list',$data);
    }
    public function categoryWiseProduct($category_id){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::where('category_id',$category_id)->orderBy('id','desc')->paginate(12);
        return view('frontend.single_pages.category-wise-product',$data);
    }
    public function brandWiseProduct($brand_id){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['categories'] = Product::select('category_id')->groupBy('category_id')->get();
        $data['brands'] = Product::select('brand_id')->groupBy('brand_id')->get();
        $data['products'] = Product::where('brand_id',$brand_id)->orderBy('id','desc')->paginate(12);
        return view('frontend.single_pages.brand-wise-product',$data);
    }
    public function ProductDetails($slug){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['product'] = Product::where('slug',$slug)->first();
        $data['product_sub_images'] = ProductSubImage::where('product_id',$data['product']->id)->get();
        $data['product_colors'] = ProductColor::where('product_id',$data['product']->id)->get();
        $data['product_sizes'] = ProductSize::where('product_id',$data['product']->id)->get();
        return view('frontend.single_pages.product-details',$data);
    }
    //about us
    public function about(){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['abouts']  = About::first();
    	return view('frontend.single_pages.about-us',$data);
    }

    public function ShoppingCart(){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['abouts']  = About::first();
        return view('frontend.single_pages.shopping-cart',$data);
    }

    //contact us
    public function ContactUs(){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
    	return view('frontend.single_pages.contact-us',$data);
    }
    

    public function contactSotre(Request $request){
        $contact  = new communicate();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->mobile_no = $request->mobile_no;
        $contact->address = $request->address;
        $contact->message = $request->message;
        $contact->save();

        // confrim Mail

        // $data = array(
        //     'name'=>$request->name,
        //     'email'=>$request->email,
        //     'mobile_no'=>$request->mobile_no,
        //     'address'=>$request->address,
        //     'message'=>$request->message
        // );

        // Mail::send('frontend.emails.contact', $data, function($message_mail) use($data){
        //     $message_mail->from('laravel6sylhet@gmail.com','Demo ProjectBD');
        //      $message_mail->to($data['email']);
        //      $message_mail->subject('Thanks For Contact Us');
        // });

        return redirect()->back()->with('success','Sent Your Message Successfull');
    }


    public function findProduct(Request $request){
        $slug = $request->slug;
        $data['product'] = Product::where('slug',$slug)->first();
        if($data['product']){
            $data['logo']     = Logo::first();
            $data['contact']  = Contact::first();
            $data['product'] = Product::where('slug',$slug)->first();
            $data['product_sub_images'] = ProductSubImage::where('product_id',$data['product']->id)->get();
            $data['product_colors'] = ProductColor::where('product_id',$data['product']->id)->get();
            $data['product_sizes'] = ProductSize::where('product_id',$data['product']->id)->get();
            return view('frontend.single_pages.find-product',$data);
        }else{
            return redirect()->back()->with('error','Product doest not match');
        }
        
    }

    public function getproduct(Request $request){
        $slug = $request->slug;
        $productData = DB::table('products')
                            ->where('slug', 'LIKE', '%'.$slug.'%')
                            ->get();
        $html = '';
        $html .= '<div> <ul>';
        if($productData){
            foreach ($productData as $value) {
                $html .= '<li>'.$value->slug.'</li>';
            }
        }
        $html .= '</ul> </div>';
        return response()->json($html);
    }


}
