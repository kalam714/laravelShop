<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\User;
class OrderController extends Controller
{
    public function index(){
        $orders=Order::latest()->get();
        return view('admin.order.index',compact('orders'));
    }
    public function showOrderDetails($userId,$orderId){
        $user=User::find($userId);
        $orders = $user->orders->where('id',$orderId);
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('admin.order.view',compact('carts'));
    }
}
