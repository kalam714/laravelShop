<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate=$request->validate([
            'name'=>'required',
            'description'=>'required',
            'photo'=>'required',
            'category'=>'required'

        ]);
        $photo=$request->file('photo')->store('public/products');
        Product::create([
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory,
            'name'=>$request->name,
            'description'=>$request->description,
            'photo'=>$photo,
            'price'=>$request->price,
            'quantity'=>10,
            

        ]);

        notify()->success('Product Added  Successfully!');
        return redirect('/product');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=Product::find($id);
        return view('admin.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product=Product::find($id);
        $photo=$product->photo;
        if($request->file('photo')){
         $photo=$request->file('photo')->store('public/products');
         \Storage::delete($product->photo);
        
 
        }
        $product->name=$request->name;
        $product->category_id=$request->category;
        $product->subcategory_id=$request->subcategory;
        $product->description=$request->description;
        $product->photo=$photo;
        $product->price=$request->price;
        $product->quantity=10;
        $product->update();
        notify()->success('Product Update Successfully!');
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=Product::find($id);
        $path=$product->photo;
        $product->delete();
        \Storage::delete($path);
        notify()->success('Prodcut Deleted Successfully!');
        return redirect('/product');
    }
    public function loadsubcategoreis(Request $request,$id){
        $subcategory  = SubCategory::where('category_id',$id)->pluck('name','id');
        return response()->json($subcategory);
    }
}
