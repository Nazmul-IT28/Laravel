<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class FrontendController extends Controller
{   
    function frontend(){
        return view('frontend.main',[
            'products'=>Product ::with('category')->latest()->get(),
        ]);
    }

    function Shop(){
        return view('frontend.pages.product',[
            'products'=>Product ::latest()->get(),
            // 'categories'=>Category ::orderBy('category_name', 'asc')->get(),
            // 'products'=>Product ::with('category')->latest()->get(),
        ]);
    }

    function singleProduct($slug){
        return view('frontend.product_details',[
            'products'=>Product::where('slug', $slug)->first(),
        ]);
    }
}
