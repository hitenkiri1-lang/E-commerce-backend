<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ProductDetailsController;
use App\Http\Controllers\Admin\NotificationController;

// User login controllers
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\User\ForgetController;
use App\Http\Controllers\User\ResetController;
use App\Http\Controllers\User\UserController;



// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

////////////////// User Login Api start ////////////////////

// Login Routes 
Route::post('/login',[AuthController::class, 'Login']);

 // Register Routes 
Route::post('/register',[AuthController::class, 'Register']);

 // Forget Password Routes 
Route::post('/forgetpassword',[ForgetController::class, 'ForgetPassword']);

// Reset Password Routes 
Route::post('/resetpassword',[ResetController::class, 'ResetPassword']);

 // Current User Route 
Route::get('/user',[UserController::class, 'User'])->middleware('auth:api');


////////////////// End User Login Api start ////////////////////

//get visitor route
Route::get('/getvisitor',[VisitorController::class,'GetVisitorDetails']);

//Contact page route
Route::post('/postcontact',[ContactController::class,'PostContactDetails']);

//Site info route
Route::get('/allsiteinfo',[SiteInfoController::class,'AllSiteinfo']);

//All category route
Route::get('/allcategory',[CategoryController::class,'AllCategory']);

//Product list route
Route::get('/productlistbyremark/{remark}',[ProductListController::class,'ProductListByRemark']);

Route::get('/productlistbycategory/{category}',[ProductListController::class,'ProductListByCategory']);

Route::get('/productlistbysubcategory/{category}/{subcategory}',[ProductListController::class,'ProductListBySubCategory']);

//Slider Route
Route::get('/allslider',[SliderController::class,'AllSlider']);

//Product details route
Route::get('/productdetails/{id}',[ProductDetailsController::class,'ProductDetails']);

//Notification history route
Route::get('/notification',[NotificationController::class,'NotificationHistory']);

//Search route
Route::get('/search/{key}',[ProductListController::class,'ProductBySearch']);