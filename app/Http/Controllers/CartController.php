<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;
use App\Mail\Sendmail;
use Cartalyst\Stripe\Laravel\Facades\Stripe;


class CartController extends Controller
{
    public function AddProductToCart(Product $product){
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart = new Cart();
    	}
    	$cart->add($product);


    	session()->put('cart',$cart);
    	notify()->success('Product added to cart!');
        return redirect()->back();
    }
    public function showCartProduct(){
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart =null;
        }
    
       
        return view('client.cart',compact('cart'));
    }
    public function cartQtyUpdate(Request $request,Product $product){
        $validate=$request->validate([
              'qty'=>'required|min:1|numeric'

        ]);
        $cart=new Cart(session()->get('cart'));
        $cart->updateQty($product->id,$request->qty);
        session()->put('cart',$cart);
        notify()->success('Quantity Updated!');
        return redirect()->back();
    }
    public function removeProductfromCart(Product $product){
        $cart=new Cart(session()->get('cart'));
        $cart->remove($product->id);
        if($cart->totalQty <=0){
            session()->forget('cart');
        }else{
            session()->put('cart',$cart);
        }
        notify()->success('Producted Romoved From Cart!');
        return redirect()->back();

    }
    public function checkOut($amount){
        if(session()->has('cart')){
    		$cart = new Cart(session()->get('cart'));
    	}else{
    		$cart =null;
        }
        return view('client.checkout',compact('amount','cart'));
    }
    public function Charge(Request $request){
        $charge = Stripe::charges()->create([
            'currency'=>"USD",
            'source'=>$request->stripeToken,
            'amount'=>$request->amount,
            'description'=>'Test'
        ]);
        $chargeId = $charge['id'];
        /* to send mail uncomment this and setup your mail server in env file.
        if(session()->has('cart')){
            $cart = new Cart(session()->get('cart'));
        }else{
            $cart = null;
        } 
       \Mail::to(auth()->user()->email)->send(new Sendmail($cart));
       */

        if($chargeId){
            auth()->user()->orders()->create([

                'cart'=>serialize(session()->get('cart'))
            ]);

            session()->forget('cart');
            notify()->success('Payment completed!');
            return redirect()->to('/');

        }else{
            return redirect()->back();
        }
    }
    public function Orders(){
        $orders = auth()->user()->orders;
        $carts =$orders->transform(function($cart,$key){
            return unserialize($cart->cart);

        });
        return view('client.order',compact('carts'));
    }
}
