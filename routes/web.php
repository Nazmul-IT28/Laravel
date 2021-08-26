<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

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
