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
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;
use Mail;
use App\User;
use DB;
use Auth;
use Session;
use Cart;
use PDF;

class DeshboardController extends Controller
{
    public function deshboard(){
    	$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['user']	  = Auth::user();
        return view('frontend.single_pages.customer-deshboard',$data);
    }

    public function editprofile(){
    	$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $id	  = Auth::user()->id;
        $data['editdata']	  = User::find($id);
    	return view('frontend.single_pages.customer-eidt-profile',$data);
    }

    public function updateprofile(Request $request){
    	$user = User::find(Auth::user()->id);
    	$this->validate($request,[
        	'name' => 'required',
        ]);

    	$user->name = $request->name;
    	$user->address = $request->address;
    	$user->gender = $request->gender;
    	if($request->file('image')){
            $file = $request->file('image');
            @unlink(public_path('upload/user_img/'.$user->image));
            $filename = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_img/'),$filename);
            $user->image = $filename;
        }
        $user->save();
        return redirect()->route('deshboard')->with('success',"Your Profile Update");
    }

    public function passwordChange(){
    	$data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['user']	  = Auth::user();
        return view('frontend.single_pages.password-chache',$data);
    }

    public function passwordUpdate(Request $request){
    	$auth_id = Auth::user()->id; // auth user id
       if(Auth::attempt(['id'=>$auth_id,'password'=>$request->current_password])){
        $user = User::find($auth_id);
        $user->password = bcrypt($request->new_password);
        $user->save();
        return redirect()->route('deshboard')->with('success','Your Password Is Change');
       }else{
            return redirect()->back()->with('error','Sorry Your Current Password does not work');
       }
    }

    public function Payment(){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        return view('frontend.single_pages.customer-payment',$data);
    }

    public function PaymentStore(Request $request){
        if($request->product_id == NUll){
            return redirect()->back()->with('message','Select Any Product');
        }else{
            $this->validate($request,[
                'payment_method' => 'required'
                ]);
            if($request->payment_method == 'Bkash' && $request->transaction_no == null){
                return redirect()->back()->with('message','Please Enter Your Transaction Number');
            }
            DB::transaction(function() use($request){
               $payment = new Payment();
               $payment->payment_method = $request->payment_method;
               $payment->transaction_no = $request->transaction_no;
               $payment->save();

               $order = new Order();
               $order->user_id = Auth::user()->id;
               $order->shipping_id = Session::get('shipping_id');
               $order->payment_id = $payment->id;
               $order_data = Order::orderBy('id','desc')->first();
               if($order_data== null){
                $firstReg = '0';
                $order_no = $firstReg+1;
               }else{
                $order_data = Order::orderBy('id','desc')->first()->order_no;
                $order_no = $order_data+1;
               }
               $order->order_no = $order_no;
               $order->order_total = $request->order_total;
               $order->status = '0';
               $order->save();

               $contents = Cart::content();
               foreach ($contents as $content) { 
                    $order_details = new OrderDetail();
                    $order_details->order_id  = $order->id;
                    $order_details->product_id =$content->id;
                    $order_details->color_id  = $content->options->color_id;
                    $order_details->size_id  = $content->options->size_id;
                    $order_details->quantity  = $content->qty;
                    $order_details->save();
               }
            });
        }
        Cart::destroy();
        return redirect()->route('order.list')->with('success','Your Order Complate');
    }

    public function OrderList(){
        $data['logo']     = Logo::first();
        $data['contact']  = Contact::first();
        $data['orders']   = Order::where('user_id',Auth::user()->id)->get();
        return view('frontend.single_pages.customer-order-list',$data);
    }

    public function customerOrderDetails($id){
        $orderData = Order::find($id);
        $data['order'] = Order::where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
        if( $data['order'] == false){
            return redirect()->back()->with('error','do not try to over smart!!');
        }else{
            $data['logo']     = Logo::first();
            $data['contact']  = Contact::first();
            $data['order'] = Order::with(['orderdetails'])->where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
            return view('frontend.single_pages.customer-order-details',$data);
        }
    }

    public function OrderDetailsPrint($id){
        $orderData = Order::find($id);
        $data['order'] = Order::with(['orderdetails'])->where('id',$orderData->id)->where('user_id',Auth::user()->id)->first();
        $pdf = PDF::loadView('frontend.pdf.customer-order-details-pdf', $data);
        $pdf->SetProtection(['copy', 'print'], '', 'pass');
        return $pdf->stream('document.pdf');
    }

}
