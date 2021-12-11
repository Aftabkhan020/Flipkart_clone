<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Frontend\IndexController;
use App\Models\User;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\SubCategoryController;


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



Route::group(['prefix'=> 'admin', 'middleware'=>['admin:admin']], function(){
	Route::get('/login', [AdminController::class, 'loginForm']);
	Route::post('/login',[AdminController::class, 'store'])->name('admin.login');
});

// All Admin Routes

Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('/admin.logout');
Route::get('/admin/profile', [AdminProfileController::class, 'AdminProfile'])->name('admin.profile');
Route::get('/admin/profile/edit', [AdminProfileController::class, 'Adminprofileedit'])->name('admin.profile.edit');
Route::post('/admin/profile/store', [AdminProfileController::class, 'Adminprofilestore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminProfileController::class, 'passwordchange'])->name('admin.change.password');
Route::post('/admin/change/password', [AdminProfileController::class, 'AdminChangePassword'])->name('update.change.password');
//User Routes

Route::get('/', [IndexController::class, 'index']);
Route::get('/user/logout', [IndexController::class, 'UserLogout'])->name('user.logout');//user.profile
Route::get('/user/profile', [IndexController::class, 'UserProfile'])->name('user.profile');//user.update.profile
Route::post('/user/update/profile', [IndexController::class, 'UpdateProfile'])->name('user.update.profile');//{{route('user.changepassword')}}
Route::get('/user/change/password', [IndexController::class, 'UserPassword'])->name('user.changepassword');//user.change.password
Route::post('/user/password/change', [IndexController::class, 'UpdatePassword'])->name('user.change.password');//all.brand













Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
		$id = Auth::user()->id;
    	$data = User::find($id);
    return view('admin.index',compact('data'));
})->name('dashboard');



Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
	$id = Auth::user()->id;
    	$data = User::find($id);
    return view('dashboard',compact('data'));
})->name('dashboard');
//admin.logout






//Admin Brand All Route
Route::prefix('brand')->group(function(){
Route::get('/view', [BrandController::class, 'AllBrands'])->name('all.brand');//brand.edit
Route::post('/store', [BrandController::class, 'StoreBrands'])->name('brand-store');//brand-store
Route::get('/Edit/{id}', [BrandController::class, 'EditBrands'])->name('brand.edit');//brand.Update
Route::post('/Update', [BrandController::class, 'UpdateBrands'])->name('brand.Update');//brand.delete
Route::get('/Delete/{id}', [BrandController::class, 'DeleteBrands'])->name('brand.delete');//brand.Update

});

//Admin Category All Routes
Route::prefix('Category')->group(function(){
	Route::get('/view', [CategoryController::class, 'AllCategory'])->name('view.category');//brand.edit
	Route::post('/store', [CategoryController::class, 'CategoryStore'])->name('category-store');//brand-store
	Route::get('/Edit/{id}', [CategoryController::class, 'CategoryEdit'])->name('category.edit');//brand.Update
	Route::post('/Update', [CategoryController::class, 'UpdateCategory'])->name('category.Update');//brand.delete
	Route::get('/Delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');//brand.Update
	

//Admin SubCategory

Route::get('/view/subCategory', [SubCategoryController::class, 'AllSubCategory'])->name('All.SubCategory');//brand.edit


	Route::post('/sub/store', [SubCategoryController::class, 'SubCategoryStore'])->name('subcategory-store');//brand-store
	Route::get('/sub/Edit/{id}', [SubCategoryController::class, 'SubCategoryEdit'])->name('subcategory-edit');//brand.Update
	Route::post('/Sub/Update', [SubCategoryController::class, 'UpdateCategory'])->name('SubCategory.Update');//brand.delete
	Route::get('/Delete/{id}', [CategoryController::class, 'DeleteCategory'])->name('category.delete');//brand.Update
	


});


