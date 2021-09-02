<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use Image;

class ProductController extends Controller
{
    function productList(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('_', '');
        return view('backend.product.product-list',[
            'last'=>$last
        ]);
    }

    function productAdd(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('_', '');
        return view('backend.product.product-from',[
            'category'=>Category::orderBy('category_name', 'asc')->get(),
            'subcategory'=>Subcategory::orderBy('subcategory_name', 'asc')->get(),
            'last'=>$last,
        ]);
    }

    // Show Subcategory JS---
    // function subcatApi($id){
    //     $api=Subcategory::where('category_id', $id)->get();
    //     return response()->json($api);
    // }

    function productFrom(Request $request){
        $product=new Product;
        if($request->hasFile('thumbnail')){
            $image=$request->file('thumbnail');
            $ext=Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            Image::make($image)->save(public_path('images/'. $ext));
            $product->thumbnail=$ext;
        }
        $product->title=$request->title;
        $product->slug=$request->slug;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->summery=$request->summery;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();
        return back()->with('success','Insert Successfull');
    }

}
