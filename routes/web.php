<?php

use App\Http\Controllers\BeverageController;
use App\Http\Controllers\ConnController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\checkadmin;

/////////////////////////indexcontroller//////////////////////////////////////////////////////////////////
Route::get('/', [IndexController::class, 'welcomepage'])->name('drink');
Route::get('/special', [IndexController::class, 'special'])->name('special');
Route::get('/tru/{id}', [IndexController::class, 'tru'])->name('tru');
Route::get('/linkcategory/{id}', [IndexController::class, 'linkcategory'])->name('linkcategory');
Route::get('/about', [IndexController::class, 'about'])->name('about');
Route::get('/contact', [IndexController::class, 'contact'])->name('contact');

////////////////////////////////////////////////////////////
Auth::routes(['verify' => true]);

////////////////user controller//////////////
Route::middleware('verified')->group(function () {
    Route::get('/uos', [UserController::class, 'index'])->name('uos')->middleware(checkadmin::class);
    Route::get('/edituser/{id}', [UserController::class, 'edit'])->name('edituser')->middleware(checkadmin::class);
    Route::get('/show/{id}', [UserController::class, 'show'])->middleware('checkadmin');
    Route::get('/deleteuser/{id}', [UserController::class, 'deleteuser'])->middleware('checkadmin');
    Route::get('/usercreate', [UserController::class, 'create'])->name('usercreate')->middleware('checkadmin');
    Route::post('/userstore', [UserController::class, 'store'])->name('userstore')->middleware('checkadmin');
    Route::post('/updateuser/{id}', [UserController::class, 'update'])->name('updateuser')->middleware('checkadmin');
});
////////////////category controller/////////////////////
Route::middleware('verified')->group(function () {
    Route::get('/category', [CategoryController::class, 'index'])->name('category');
    Route::get('/editcategory/{id}', [CategoryController::class, 'edit'])->name('editcategory');
    Route::get('/deletecategory/{id}', [CategoryController::class, 'deletecategory']);
    Route::get('/destroy/{id}', [CategoryController::class, 'destroy']);
    Route::get('/categorycreate', [CategoryController::class, 'create'])->name('categorycreate');
    Route::post('/categorystore', [CategoryController::class, 'store'])->name('categorystore');
    Route::post('/updatecategory/{id}', [CategoryController::class, 'update'])->name('updatecategory');
});
//////////////////////////////////////////////beverage controller/////////////////////
Route::middleware('verified')->group(function () {
    Route::get('/beverage', [BeverageController::class, 'index'])->name('beverage');
    Route::get('/editbeverage/{id}', [BeverageController::class, 'edit'])->name('editbeverage');
    Route::get('/deletebeverage/{id}', [BeverageController::class, 'deletebeverage']);
    Route::get('/beveragecreate', [BeverageController::class, 'create'])->name('beveragecreate');
    Route::post('/beveragestore', [BeverageController::class, 'store'])->name('beveragestore');
    Route::post('/updatebeverage/{id}', [BeverageController::class, 'update'])->name('updatebeverage');
});
///////////////////////////////////message controller//////////////
Route::middleware('verified')->group(function () {
    Route::get('/message', [MessageController::class, 'index'])->name('message');
    Route::get('/showmessage/{id}', [MessageController::class, 'showmessage']);
    Route::get('/deletemessage/{id}', [MessageController::class, 'deletemessage']);
    Route::post('/messagestore', [MessageController::class, 'store'])->name('messagestore');
});
////////////////////////////////////home////////////////

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::get('/sendmail', [MessageController::class, 'sendmail'])->name('sendmail');
