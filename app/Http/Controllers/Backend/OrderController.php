<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Shipping;
use App\Model\Payment;
use App\Model\Order;
use App\Model\OrderDetail;

class OrderController extends Controller
{
   public function pendinglist(){
   	$data['orders'] = Order::where('status','0')->get();
   	return view('backend.orders.pendig-list',$data);
   }
   public function approvallist(){
   	$data['orders'] = Order::where('status','1')->get();
   	return view('backend.orders.approval-list',$data);
   }
   public function details($id){
   	$data['order'] = Order::find($id);
   	return view('backend.orders.order-details',$data);
   }
  	public function approved(Request $request){
  		$order = Order::find($request->id);
  		$order->status = '1';
  		$order->save();
  	}
}
