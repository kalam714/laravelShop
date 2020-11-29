<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

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
}
