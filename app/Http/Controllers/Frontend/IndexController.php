<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index(){
    	return view('frontend.index');
    }
    public function UserLogout(){
    	Auth::logout();
    	return Redirect()->route('login');
    }
    public function UserProfile(){
    	$id = Auth::user()->id;
    	$data = User::find($id);
    	return view('frontend.profile.userprofile',compact('data'));
    }


    public function UpdateProfile(Request $request){

    	$editdata = User::find(Auth::user()->id);
    	$editdata->name = $request->name;
    	$editdata->email = $request->email;
    	$editdata->phone = $request->phone;

    	if ($request->file('profile_photo_path')) {
    		$file = $request->file('profile_photo_path');
    		@unlink(public_path('upload/user_images'.$editdata->profile_photo_path));
    		$filename = date('YmdHi').$file->getClientOriginalName();
    		$file->move(public_path('upload/user_images'),$filename);
    		$editdata['profile_photo_path'] = $filename;
    	}
    	$editdata->save();
    	return redirect()->route('dashboard');

    }
    public function UserPassword(){
    	$id = Auth::user()->id;
    	$data = User::find($id);
    	return view('frontend.profile.userChangePassword',compact('data'));
    }


    public function UpdatePassword(Request $request){
    	$validatedata = $request->validate([
    		'oldpassword' => 'required',
    		'password' => 'required|confirmed'
    	]);
    	$hashPassword = Auth::user()->password;
    	if (Hash::check($request->oldpassword,$hashPassword)) {
    		$user = User::find(Auth::id());
    		$user->password = Hash::make($request->password);
    		$user->save();
    		Auth::logout();
    		return redirect()->route('user.logout');
    	}
    	else{
    		return redirect()->back();
    	}

    }
}
