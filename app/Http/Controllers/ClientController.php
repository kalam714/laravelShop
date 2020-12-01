<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;

class ClientController extends Controller
{
    public function index(){
        $products=Product::latest()->limit(6)->get();
        $randomActPro=Product::inRandomOrder()->limit(3)->get();
        $randomIds=[];
        foreach($randomActPro as $product){
            array_push($randomIds,$product->id);
        }
        $randomItemPro=Product::where('id','!=',$randomIds)->limit(3)->get();

        return view('client.index',compact('products','randomActPro','randomItemPro'));
    }

    public function singleProduct($id){
        $product=Product::find($id);
        $sameCatPro=Product::inRandomOrder()->where('category_id',$product->category_id)->where('id','!=',$product->id)->limit(3)->get();
        return view('client.show',compact('product','sameCatPro'));
    }
    public function allProductByCat($slug,Request $request){

        $category=Category::where('slug',$slug)->first();
        $categoryId=$category->id;
        if($request->subcategory){
            $products=$this->productFilter($request);
           
            
        }elseif($request->min ||$request->max){
            $products=$this->filterByPrice($request);

        }else{

        $products=Product::where('category_id',$category->id)->get();
       
        }
        $subcategories=SubCategory::where('category_id',$category->id)->get();
        $slug=$slug;
        
        return view('client.category',compact('products','subcategories','slug','categoryId'));
        

    }
    public function productFilter(Request $request){
        $subIds=[];
        $subcategories=SubCategory::whereIn('id',$request->subcategory)->get();
        foreach($subcategories as $subcategory){
            array_push($subIds,$subcategory->id);
        }
        $products=Product::whereIn('subcategory_id',$subIds)->get();
        return $products;


    }
    public function filterByPrice(Request $request){
        $categoryId=$request->categoryId;
        $product=Product::whereBetween('price',[$request->min,$request->max])->where('category_id',$categoryId)->get();
        return $product;

    }
    public function allProduct(Request $request){
        if($request->search){
            $products=Product::where('name','like','%'.$request->search.'%')->orWhere('description','like','%'.$request->search.'%')
            ->orWhere('price','like','%'.$request->search.'%')->paginate(10);
            return view('client.products',compact('products'));
        }
        $products=Product::latest()->paginate(10);
        return view('client.products',compact('products'));
    }

    
}
