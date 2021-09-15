<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\FrontendController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

                //------Frontend------//
Route::get('/', [FrontendController::class, 'frontend'])->name('frontend');
                //------ Category-------//
Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('category-add', [CategoryController::class, 'categoryAdd'])->name('categoryAdd');
Route::post('category-post', [CategoryController::class, 'categoryPost'])->name('categoryPost');
Route::get('category-list', [CategoryController::class, 'categoryList'])->name('categoryList');
Route::get('category-edit/{id}', [CategoryController::class, 'categoryEdit'])->name('categoryEdit');
Route::post('category-update', [CategoryController::class, 'categoryUpdate'])->name('categoryUpdate');
Route::get('category-delete/{id}', [CategoryController::class, 'categoryDelete'])->name('categoryDelete');
Route::get('trash-list', [CategoryController::class, 'categoryTrash'])->name('categoryTrash');
Route::get('trash-restore/{id}', [CategoryController::class, 'categoryRestor'])->name('categoryRestor');
Route::get('trash-delete/{id}', [CategoryController::class, 'trashDelete'])->name('trashDelete');

                // ------ Sub Category ------
Route::get('subcategory-add', [SubCategoryController::class, 'subcategoryAdd'])->name('subcategoryAdd');
Route::post('subcategory-post', [SubCategoryController::class, 'subcategoryPost'])->name('subcategoryPost');
Route::get('subcategory-list', [SubCategoryController::class, 'subcategoryList'])->name('subcategoryList');
Route::get('subtrash-list', [SubCategoryController::class, 'subtrashList'])->name('subtrashList');
Route::get('subcategory-edit/{id}', [SubCategoryController::class, 'subcategoryEdit'])->name('subcategoryEdit');
Route::post('subcategory-update', [SubCategoryController::class, 'subcategoryUpdate'])->name('subcategoryUpdate');
Route::get('subcategory-delete/{id}', [SubCategoryController::class, 'subcategoryDelete'])->name('subcategoryDelete');

                //------ Products ------
Route::get('product-add', [ProductController::class, 'productAdd'])->name('productAdd');
Route::POST('product-from', [ProductController::class, 'productFrom'])->name('productFrom');
// Route::get('subcat-id/{id}', [ProductController::class, 'subcatApi'])->name('subcatApi');
Route::get('product-list', [ProductController::class, 'productList'])->name('productList');
Route::get('product-trash', [ProductController::class, 'productTrash'])->name('productTrash');
Route::get('product-edit/{id}', [ProductController::class, 'productEdit'])->name('productEdit');
Route::POST('product-update', [ProductController::class, 'productUpdate'])->name('productUpdate');

