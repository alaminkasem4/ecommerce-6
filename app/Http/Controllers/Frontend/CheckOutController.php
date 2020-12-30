<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Logo;
use App\Model\Slider;
use App\Model\Contact;
use App\Model\About;
use App\Model\communicate;
use App\Model\Product;
use App\Model\ProductSubImage;
use App\Model\ProductColor;
use App\Model\ProductSize;
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;
use App\User;
use Mail;
use DB;
use Auth;
use Session;

class CheckOutController extends Controller
{
	public function customerlogin(){
		$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        return view('frontend.single_pages.login-customer',$data);
	}
	public function customerSignUP(){
		$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        return view('frontend.single_pages.singup-customer',$data);
	}

    public function signpuStore(Request $request){
    	DB::transaction(function() use($request){
    		$this->validate($request,[
        	'name' => 'required',
        	'email' => 'required|unique:users,email',
        	//'mobile' => ['required','unique:users,mobile','regex:/(^(\+8801|8801|01|008801))[1|5-9]{1}(\d){8}$'],
            'mobile' => 'required|unique:users,mobile|regex:/^([0-9\s\-\+\(\)]*)$/|min:11|max:11',
        	'password' => 'min:9|required_with:confrim_password|same:confrim_password',
        	'confrim_password' => 'min:9',
        	]);

	        $code = rand(0000,9999);
    		$user  = new User();
	        $user->name = $request->name;
	        $user->email = $request->email;
	        $user->mobile = $request->mobile;
	        $user->password = bcrypt($request->password);
	        $user->code = $code;
	        $user->status = '0';
	        $user->usertype  = 'customer';
	        $user->save();
	        // confrim Mail
	        $data = array(
	            'email'=> $request->email,
	            'code'=> $code
	        );

	        Mail::send('frontend.emails.varify-email', $data, function($message_mail) use($data){
	            $message_mail->from('laravel6sylhet@gmail.com','JK Furniture');
	             $message_mail->to($data['email']);
	             $message_mail->subject('Please Vartify Your Email Address');
	        });
    	});
	    return redirect()->route('email.varify')->with('success','Successfully Signup,Please Varifiy Your mail');
    }

    public function emailVarify(){
    	$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        return view('frontend.single_pages.email-varify',$data);
    }

    public function varifyStore(Request $request){
    	$this->validate($request,[
    		'email' => 'required',
    		'code' => 'required'
    	]);
    	$checkdata = User::where('email',$request->email)->where('code',$request->code)->first();
		if($checkdata){
			$checkdata->status = '1';
			$checkdata->save();
			return redirect()->route('login.customer')->with('success','Your Are Successfully Varifiy, please login');
		}else{
			return redirect()->back()->with('error','Sorry Your Email Or Varification Code Does not Match');
		}
    }

    public function checkout(){
    	$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        return view('frontend.single_pages.customer-check-out',$data);
    }

    public function storeCheckOut(Request $request){
    	$this->validate($request,[
    		'name' => 'required',
    		'mobile' => 'required|min:11|max:11',
    		'address' => 'required',
    	]);
    	$checkout = new Shipping();
    	$checkout->user_id = Auth::user()->id;
     	$checkout->name = $request->name;
    	$checkout->email = $request->email;
    	$checkout->mobile = $request->mobile;
    	$checkout->address = $request->address;
    	$checkout->save();
    	Session::put('shipping_id',$checkout->id);
    	return redirect()->route('customer.payment')->with('success','Data Save Successfull');
    }

}

