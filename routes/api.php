<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\VisitorController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\CategoryController;


// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


//get visitor route
Route::get('/getvisitor',[VisitorController::class,'GetVisitorDetails']);

//Contact page route
Route::post('/postcontact',[ContactController::class,'PostContactDetails']);

//Site info route
Route::get('/allsiteinfo',[SiteInfoController::class,'AllSiteinfo']);

//All category route
Route::get('/allcategory',[CategoryController::class,'AllCategory']);