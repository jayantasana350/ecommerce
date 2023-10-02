<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    function Category(){
        $category_view = Category::paginate(5);
        $trushed_cat = Category::onlyTrashed()->get();
        return view('backend.category.categories',[
            'category_view' => $category_view,
            'trushed_cat' => $trushed_cat,
        ]);
    }

    function CategoryStore(Request $request){
        $categoryadd = new Category;
        $categoryadd->category_name = $request->category_name;
        $categoryadd->slug = Str::slug($request->category_name);
        $categoryadd->save();
        return back()->with('CategoryStore', "Category Added Successfully");
    }

    function CategoryUpdate(Request $cupdate){

        $catupdates = Category::find($cupdate->id);
        $catupdates->category_name = $cupdate->category_name;
        $catupdates->slug = Str::slug($cupdate->category_name);
        $catupdates->save();
        return back()->with('CategoryUpdate', "Category Update Successfully");
    }

    function CategoryDelete($id){
        Category::find($id)->delete();
        return back()->with('CategoryUpdate', "Category Update Successfully");
    }

    function CategoryRestore($id){
        Category::withTrashed()->find($id)->restore();
        return back();
    }

    function CategoryPdelete($id){
        Category::withTrashed()->find($id)->forceDelete();
        return back();
    }

}
