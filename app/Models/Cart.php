<?php

namespace App\Models;

class Cart{
    

    public $items = [];
	public $totalQty;
	public $totalPrice;


	public function __construct($cart=null){
		if($cart){
			$this->items = $cart->items;
			$this->totalPrice = $cart->totalPrice;
			$this->totalQty = $cart->totalQty;
		}else{
			$this->items=[];
			$this->totalQty=0;
			$this->totalPrice=0;
		}
	}

	public function add($product){
		$item = [
			'id'=>$product->id,
			'name'=>$product->name,
			'price'=>$product->price,
			'qty'=>0,
			'[photo]'=>$product->photo

		];
		if(!array_key_exists($product->id,$this->items)){
			$this->items[$product->id] = $item;
			$this->totalQty+=1;
			$this->totalPrice+=$product->price;
		}else{
			$this->totalQty+=1;
			$this->totalPrice+=$product->price;

		}
		$this->items[$product->id]['qty']+=1;
	}

}