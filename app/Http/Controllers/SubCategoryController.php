<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    function SubCategory(){
        $subcategories = SubCategory::paginate(5);
        $categories = Category::all();
        $subcattrushed = SubCategory::onlyTrashed()->get();
        return view('backend.category.subcategories', [
            'subcategories' => $subcategories,
            'categories' => $categories,
            'subcattrushed' => $subcattrushed,
        ]);
    }

    function SubCategoryStore(Request $request){
        $subcategoryadd = new SubCategory;
        $subcategoryadd->subcategory_name = $request->subcategory_name;
        $subcategoryadd->slug = Str::slug($request->subcategory_name);
        $subcategoryadd->category_id = $request->category_id;
        $subcategoryadd->save();
        return back();
    }

    function SubCategoryUpdate(Request $subcatupdate){
        $subcategoryupdate = SubCategory::find($subcatupdate->id);
        $subcategoryupdate->subcategory_name = $subcatupdate->subcategory_name;
        $subcategoryupdate->slug = Str::slug($subcatupdate->subcategory_name);
        $subcategoryupdate->category_id = $subcatupdate->category_id;
        $subcategoryupdate->save();
        return back();
    }

    function SubCategoryDelete($id){
        SubCategory::find($id)->delete();
        return back();
    }
}
