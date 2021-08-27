<?php

namespace App\Http\Controllers;
use App\Models\SubCategory;

use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    function subcategoryAdd(){
        return view('backend.subcategory.subcategory-add');
    }

    function subcategoryList(){
        return view('backend.subcategory.subcategory-list',[
            'scat' =>SubCategory::latest()->simplepaginate(5),
            'lcat'=>SubCategory::count(),
        ]);
    }
}
