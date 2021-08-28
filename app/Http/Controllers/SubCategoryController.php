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
}
