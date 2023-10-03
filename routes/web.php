<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Use App\Models\Category;

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
    return view('frontend.front');
});

Auth::routes(['verify' => true ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'front'])->name('front');

Route::get('/categories', [App\Http\Controllers\CategoryController::class, 'Category'])->name('Category');
Route::post('/category-store', [App\Http\Controllers\CategoryController::class, 'CategoryStore'])->name('CategoryStore');
Route::post('/category-update', [App\Http\Controllers\CategoryController::class, 'CategoryUpdate'])->name('CategoryUpdate');
Route::get('/category-delete/{id}', [App\Http\Controllers\CategoryController::class,'CategoryDelete'])->name('CategoryDelete');
Route::get('/category-restore/{id}', [App\Http\Controllers\CategoryController::class,'CategoryRestore'])->name('CategoryRestore');
Route::get('/category-pdelete/{id}', [App\Http\Controllers\CategoryController::class,'CategoryPdelete'])->name('CategoryPdelete');


Route::get('/subcategories', [App\Http\Controllers\SubCategoryController::class, 'SubCategory'])->name('SubCategory');
Route::post('/subcategory-store', [App\Http\Controllers\SubCategoryController::class, 'SubCategoryStore'])->name('SubCategoryStore');
Route::post('/subcategory-udpate', [App\Http\Controllers\SubCategoryController::class, 'SubCategoryUpdate'])->name('SubCategoryUpdate');
Route::get('/subcategory-delete/{id}', [App\Http\Controllers\SubCategoryController::class, 'SubCategoryDelete'])->name('SubCategoryDelete');
Route::get('/subcategory-restore/{id}', [App\Http\Controllers\SubCategoryController::class, 'SubCategoryRestore'])->name('SubCategoryRestore');
Route::get('/subcategory-pdelete/{id}', [App\Http\Controllers\SubCategoryController::class, 'SubCategoryPdelete'])->name('SubCategoryPdelete');



Route::prefix('admin')->group(function () {
    Route::resource('color', 'App\Http\Controllers\ColorController');
});



