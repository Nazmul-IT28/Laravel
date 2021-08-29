<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;
use App\Models\Category;
use Str;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function subcategoryAdd(){
        return view('backend.subcategory.subcategory-add',[
            'category'=>Category::orderBy('category_name', 'asc')->get(),

        ]);
    }

    function subcategoryPost(Request $request){
        $request->validate([
            'subcategory_name'=>['required','unique:sub_categories'],
            'category_id'=>'required',
        ],[
            'category_id.required'=>'Please select category',
        ]);
        $scat=new Subcategory;
        $scat->subcategory_name=$request->subcategory_name;
        $scat->category_id=$request->category_id;
        $scat->slug=Str::slug($request->subcategory_name);
        $scat->save();
        return back();
    }

    function subcategoryList(){
        return view('backend.subcategory.subcategory-list',[
            'scat' =>SubCategory::latest()->simplepaginate(5),
            'lcat'=>SubCategory::count(),
        ]);
    }

    function subcategoryEdit($id){
        return view('backend.subcategory.subcategory-edit',[
            'scate'=>SubCategory::findOrFail($id),
            'category'=>Category::orderBy('category_name', 'asc')->get(),
        ]);
    }

    function subcategoryUpdate(Request $request){
        $request->validate([
            'subcategory_name'=>['required','unique:sub_categories'],
            'category_id'=>'required',
        ],[
            'category_id.required'=>'Please select category',
        ]);
        $scat=Subcategory::findOrFail($request->id);
        $scat->subcategory_name=$request->subcategory_name;
        $scat->category_id=$request->category_id;
        $scat->slug=Str::slug($request->subcategory_name);
        $scat->save();
        return redirect('subcategory-list')->with('success','Subcategory Updated Successfull');
    }

    function subtrashList(){
        return view('backend.subcategory.subtrash-list');
    }
}
