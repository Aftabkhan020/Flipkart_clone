<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Image;
class CategoryController extends Controller
{
    public function AllCategory(){
        $category = Category::latest()->get();
    	return view('Backend.Category.category_view',compact('category'));
    }
    //CategoryStore

    public function CategoryStore(Request $request){
    	$request->validate([
            'category_name_en' =>'required',
            'category_name_hin' =>'required',
            'category_icon' => 'required',
        ],[
            'category_name_en.required' => 'Input Category Name In English Is Required',
            'category_name_hinn.required' => 'Input Category Name In Hindi Is Required',
        ]);
        $image = $request->file('category_icon');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;
        
        Category::insert([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => strtolower(str_replace(' ', '-', $request->category_name_hin)),
            'category_icon' => $save_url,

        ]);
        return redirect()->back();
    }
    public function DeleteCategory($id){
        $category = Category::findorFail($id);
        $img = $category->category_icon;
        unlink($img);
        Category::findorFail($id)->delete();
        return redirect()->back();
    }
    public function CategoryEdit($id){
        $category = Category::findorFail($id);
    	return view('Backend.Category.CategoryEdit',compact('category'));
    }
    public function UpdateCategory(Request $request){
        $category_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('category_icon')) {
            unlink($old_image);
            
            $image = $request->file('category_icon');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/category/'.$name_gen);
        $save_url = 'upload/category/'.$name_gen;




        Category::findorFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => strtolower(str_replace(' ', '-', $request->category_name_hin)),
            'category_icon' => $save_url,
        ]);
        return redirect()->route('view.category');
        } else {

            Category::findorFail($category_id)->update([
            'category_name_en' => $request->category_name_en,
            'category_name_hin' => $request->category_name_hin,
            'category_slug_en' => strtolower(str_replace(' ', '-', $request->category_name_en)),
            'category_slug_hin' => strtolower(str_replace(' ', '-', $request->category_name_hin)),
        ]);
        return redirect()->route('view.category');

           
        }
        
    }

}
