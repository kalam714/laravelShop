<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ClientController extends Controller
{
    public function index(){
        $products=Product::all();
        $randomActPro=Product::inRandomOrder()->limit(3)->get();
        $randomIds=[];
        foreach($randomActPro as $product){
            array_push($randomIds,$product->id);
        }
        $randomItemPro=Product::where('id','!=',$randomIds)->limit(3)->get();

        return view('client.index',compact('products','randomActPro','randomItemPro'));
    }
}
