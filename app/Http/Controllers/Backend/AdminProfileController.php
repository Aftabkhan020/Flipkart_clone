<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function AdminProfile(){
    	$admindata = Admin::find(1);
    	return view('admin.admin_profile_view',compact('admindata'));
    }
    public function Adminprofileedit(){
    	$editdata = Admin::find(1);
    	return view('admin.admin_profile_edit',compact('editdata'));
    }

    public function Adminprofilestore(Request $request){

    	$editdata = Admin::find(1);
    	$editdata->name = $request->name;
    	$editdata->email = $request->email;

    	if ($request->file('profile_photo_path')) {
    		$file = $request->file('profile_photo_path');
    		@unlink(public_path('upload/admin_images/'.$editdata->profile_photo_path));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/admin_images'),$filename);
    		$editdata['profile_photo_path'] = $filename;
    	}
    	$editdata->save();
    	return redirect()->route('admin.profile');

    }

    public function passwordchange(){
    	return view('admin.passwordChange');
    }
    public function AdminChangePassword(Request $request){

    	$validatedata = $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed' 

    	]);

    	$hashPassword = Admin::find(1)->password;
    	if (Hash::check($request->oldpassword,$hashPassword)) {
    		$admin = Admin::find(1);
    		$admin->password = Hash::make($request->password);
    		$admin->save();
    		Auth::logout();
    		return redirect()->route('/admin.logout');
    	}
    	else{
    		return redirect()->back();
    	}

    }
}
