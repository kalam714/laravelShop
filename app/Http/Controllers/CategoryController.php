<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::all();
        return view('admin.category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            'name'=>'required|unique:categories',
            'description'=>'required'

        ]);
        $photo=$request->file('photo')->store('public/category');
        Category::create([

            'name'=>$request->name,
            'slug'=>Str::slug($request->name),
            'description'=>$request->description,
            'photo'=>$photo

        ]);
        notify()->success('Category Created Successfully!');
        return redirect('/category');

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
        $category=Category::find($id);
        return view('admin.edit',compact('category'));
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
       $category=Category::find($id);
       $photo=$category->photo;
       if($request->file('photo')){
        $photo=$request->file('photo')->store('public/category');
        \Storage::delete($category->photo);
       

       }
       $category->name=$request->name;
       $category->description=$request->description;
       $category->photo=$photo;
       $category->update();
       notify()->success('Category Update Successfully!');
       return redirect('/category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $category=Category::find($id);
       $path=$category->photo;
       $category->delete();
       \Storage::delete($path);
       notify()->success('Category Deleted Successfully!');
       return redirect('/category');
    }
}
