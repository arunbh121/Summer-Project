<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\backend\StudentController;
//use App\Http\Controllers\fronted\FrontedController;
use App\Http\Controllers\Fronted\HomeController;
use App\Http\Controllers\backend\StaffController;
use App\Http\Controllers\backend\WardenController;
use App\http\controllers\backend\RoomController;
use App\Http\Controllers\backend\PaymentController;
use App\Http\Controllers\backend\OfferController;
use App\Http\Controllers\backend\RoomtypeController;
use App\Http\Controllers\backend\ServiceController;
Route::get('/', function () {
    return view('welcome');
});
//Route::get('/','FrontedController@index');
Route::get('/',[HomeController::class,'index'])->name('fronted.home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/student/store', [StudentController::class, 'store'])->name('home');
Route::resource('student',StudentController::class);
Route::resource('room',RoomController::class);
Route::resource('roomType',RoomtypeController::class);

Route::resource('staff',StaffController::class);
Route::resource('warden',WardenController::class);
Route::resource('payment',PaymentController::class);
Route::resource('offer',OfferController::class);
Route::resource('service',ServiceController::class);
Auth::routes();





