<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Product;
use App\Models\Brand;
// use App\Models\ProductGallery;
use Image;

class ProductController extends Controller
{
    function productList(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('_', '');
        return view('backend.product.product-list',[
            'last'=>$last,
            'product'=>Product::with(['category'])->latest()->simplepaginate(),
            'count'=>Product::count(),
        ]);
    }

    function productAdd(){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('_', '');
        return view('backend.product.product-from',[
            'category'=>Category::orderBy('category_name', 'asc')->get(),
            'brands'=>Brand::orderBy('brand_name', 'asc')->get(),
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
        $request->validate([
            'title'=>['required'],
            'thumbnail'=>['required', 'image'],
        ]);
        $product=new Product;
        $product->title=$request->title;
        $product->slug=$request->slug;
        $product->category_id=$request->category_id;
        $product->brand_id=$request->brand_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->summery=$request->summery;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->save();

        if($request->hasFile('thumbnail')){
            $image=$request->file('thumbnail');
            $ext=Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $new=Product::findOrFail($product->id);
            $path=public_path('images/' .$new->created_at->format('Y/m/').$new->id.'/');
            File::makeDirectory($path, $mode=0777, true, true);
            Image::make($image)->save($path . $ext);
            $new->thumbnail=$ext;
            $new->save();
        }
        return back()->with('success','Insert Successfull');
    }

    function productEdit($id){
        $last_value=collect(request()->segments())->last();
        $last=Str::of($last_value)->replace('_', '');
        return view('backend.product.product-edit',[
            'category'=>Category::orderBy('category_name', 'asc')->get(),
            'subcategory'=>Subcategory::orderBy('subcategory_name', 'asc')->get(),
            'brands'=>Brand::orderBy('brand_name', 'asc')->get(),
            'last'=>$last,
            'product'=>Product::findOrFail($id),
        ]);
    }

    function productUpdate(Request $request){
        $request->validate([
            'title'=>['required'],
            'thumbnail'=>['required', 'image'],
        ]);
        $product=Product::findOrFail($request->product_id);
        $product->title=$request->title;
        $product->brand_id=$request->brand_id;
        $product->category_id=$request->category_id;
        $product->subcategory_id=$request->subcategory_id;
        $product->price=$request->price;
        if($request->hasFile('thumbnail')){
            $image=$request->file('thumbnail');
            $ext=Str::slug($request->title).'.'.$image->getClientOriginalExtension();
            $old_path=public_path('images/' .$product->created_at->format('Y/m/').$product->id.'/'.$product->thumbnail);

            if(file_exists($old_path)){
                unlink($old_path);
            }

            $path=public_path('images/' .$product->created_at->format('Y/m/').$product->id.'/');
            File::makeDirectory($path, $mode=0777, true, true);
            Image::make($image)->save($path . $ext);
            $product->thumbnail=$ext;
        }
        $product->save();
        return redirect('product-list')->with('success','Update Successfull');
    }

}