<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Carbon\Carbon;

class CategoryController extends Controller
{
    function categoryAdd(){
       return view('backend.category.category-add');
   } 

    // function categoryList(){
    //     $cat=Category::latest()->simplepaginate(5);
    //     $lcat=Category::count();
    //     return view('backend.category.category-list', compact('cat', 'lcat'));
    // }

    function categoryList(){
        return view('backend.category.category-list',[
            'cat' =>Category::latest()->simplepaginate(5),
            'lcat'=>Category::count(),
        ]);
    }

    function categoryPost(Request $request){
    $request->validate([
        'category_name'=>['required', 'unique:categories', 'min:5', 'max:25'],
    ]);
    //    $cat=new Category;
    //    $cat->category_name=$request->category_name;
    //    $cat->save();
    Category::insert([
        'category_name' => $request-> category_name,
        'created_at'=>Carbon::now(),
        // 'updated_at'=>Carbon::now(),
    ]);
    return redirect('category-list')->with('success','New Category Add Successfull');
   }

    function categoryEdit($id){
       return view('backend.category.editcategory',[
           'category'=>Category::findOrFail($id),
       ]);
   }

    function categoryUpdate(Request $request){
    // Category::findOrFail($request->category_id)->update([
    //     'category_name' => $request-> category_name,
    //     'updated_at'=>Carbon::now(),
    // ]);

       $cat=Category::findOrFail($request->category_id);
       $cat->category_name=$request->category_name;
       $cat->save();
       return redirect('category-list')->with('success','Edit Successfull');
   }

    function categoryDelete($id){
    Category::findOrFail($id)->delete();
    return back()->with('success','Delete Successfull');
   }

    function categoryTrash(){
       return view('backend.category.trash_list',[
           'trashcat'=>Category::onlyTrashed()->paginate(),
        //    'trashcou'=>Category::count(),
       ]);
   }

    function categoryRestor($id){
        Category::onlyTrashed()->findOrFail($id)->restore();
        return redirect('category-list')->with('success','Restor Successfull');
   }

    function trashDelete($id){
        Category::onlyTrashed()->findOrFail($id)->forceDelete();
        return back()->with('success','Delete Successfull');
   }

}
