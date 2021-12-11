<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Image;
class BrandController extends Controller
{
    public function AllBrands(){
    	$brand = Brand::latest()->get();
    	return view('Backend.Brand.brand_view',compact('brand'));
    }

    public function StoreBrands(Request $request){
    	$request->validate([
            'brand_name_en' =>'required',
            'brand_name_hin' =>'required',
            'brand_image' => 'required',
        ],[
            'brand_name_en.required' => 'Input Brand Name In English Is Required',
            'brand_name_hin.required' => 'Input Brand Name In Hindi Is Required',
        ]);
        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;




        Brand::insert([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_hin)),
            'brand_image' => $save_url,

        ]);
        return redirect()->back();
    }

    public function EditBrands($id){
        $brand = Brand::findorFail($id);
        return view('Backend.Brand.brand_Edit',compact('brand'));
    }
    public function UpdateBrands(Request $request){
        $brand_id = $request->id;
        $old_image = $request->old_image;

        if ($request->file('brand_image')) {
            unlink($old_image);
            
            $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;




        Brand::findorFail($brand_id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_hin)),
            'brand_image' => $save_url,
        ]);
        return redirect()->route('all.brand');
        } else {

            Brand::findorFail($brand_id)->update([
            'brand_name_en' => $request->brand_name_en,
            'brand_name_hin' => $request->brand_name_hin,
            'brand_slug_en' => strtolower(str_replace(' ', '-', $request->brand_name_en)),
            'brand_slug_hin' => strtolower(str_replace(' ', '-', $request->brand_name_hin)),
        ]);
        return redirect()->route('all.brand');

           
        }
        
    }

    public function DeleteBrands($id){

        $brand = Brand::findorFail($id);
        $img = $brand->brand_image;
        unlink($img);
        Brand::findorFail($id)->delete();
        return redirect()->back();


    }
}
