<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;

class SubCategoryController extends Controller
{
    public function AllSubCategory(){
        // $category = Category::orderBy('category_name_en')->get();
        // $subcategory = SubCategory::latest()->get();
    	// return view('Backend.SubCategory.AllSubCategory',compact('category','subcategory'));



        $categories = Category::orderBy('category_name_en','ASC')->get();
    	$subcategory = SubCategory::latest()->get();
    	//return view('backend.category.subcategory_view',compact('subcategory'));
    	return view('Backend.SubCategory.AllSubCategory',compact('subcategory','categories'));
    }
    public function SubCategoryStore(Request $request){

        $request->validate([
            'category_id' =>'required',
            'subcategory_name_en' =>'required',
            'subcategory_name_hin' => 'required',
        ],[
            'category_id.required' => 'Select any category',
            'subcategory_name_en.required' => 'Input Subcategory English Name',
        ]);
        
        SubCategory::insert([
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_name_hin' => $request->subcategory_name_hin,
            'subcategory_slug_en' => strtolower(str_replace(' ', '-', $request->subcategory_name_en)),
            'subcategory_slug_hin' => strtolower(str_replace(' ', '-', $request->subcategory_name_hin)),
            'category_id' => $request->category_id,
        ]);
        return redirect()->back();

    }
    public function SubCategoryEdit($id){
        $subcategory = SubCategory::findorFail($id);
        $categories = Category::orderBy('category_name_en','ASC')->get();
    	return view('Backend.SubCategory.EditSubCategory',compact('subcategory','categories'));
    }
}
