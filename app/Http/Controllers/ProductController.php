<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Category;

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
            'last'=>$last,
        ]);
    }
}
