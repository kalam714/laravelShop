<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function create(){
        return view('admin.slider.create');
    }
    public function store(Request $request){
        $validate=$request->validate([
            'photo'=>'required'
        ]);
        $photo=$request->file('photo')->store('public/sliders');
        Slider::create([
            'photo'=>$photo
        ]);
        notify()->success('Slider Uploaded Successfully!');
        return redirect('/sliders');

    }
    public function index(){
        $sliders=Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }
    public function destroy($id){
        $slider=Slider::find($id);
        $path=$slider->photo;
        $slider->delete();
        \Storage::delete($path);
        notify()->success('Prodcut Deleted Successfully!');
        return redirect()->bacK();

    }
}
