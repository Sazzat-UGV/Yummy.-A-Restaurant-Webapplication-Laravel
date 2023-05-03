<?php

use App\Http\Controllers\backend\auth\loginController;
use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\backend\chefController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\eventController;
use App\Http\Controllers\backend\galleryController;
use App\Http\Controllers\backend\productController;
use App\Http\Controllers\backend\testimonialController;
use App\Http\Controllers\frontend\homeController;
use App\Http\Controllers\frontend\tableBooking;
use App\Http\Controllers\frontend\tableBookingController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::prefix('')->group(function(){
    Route::get('/',[homeController::class,'home'])->name('home');
    Route::post('book_table',[tableBookingController::class,'bookTable'])->name('user.tableBook');

});


/*admin auth route*/
Route::prefix('admin/')->group(function(){
    Route::get('login',[loginController::class,'loginPage'])->name('admin.loginPage');
    Route::post('login',[loginController::class,'login'])->name('admin.login');
    Route::get('logout',[loginController::class,'logout'])->name('admin.logout');

    Route::middleware(['auth','IsSystemAdmin'])->group(function(){
        /*other controller*/
        Route::get('dashboard',[dashboardController::class,'dashboard'])->name('admin.dashboard');
        Route::get('reservation',[tableBookingController::class,'showReservation'])->name('user.reservationIndex');
        Route::delete('reservation/{id}/',[tableBookingController::class,'deleteReservation'])->name('user.reservatdionDelete');
        Route::get('status/{id}/{status}',[tableBookingController::class,'changeStatus'])->name('user.reservatdionStatus');

        /*Resource Controller*/
        Route::resource('category',categoryController::class);
        Route::resource('product',productController::class);
        Route::resource('testimonial',testimonialController::class);
        Route::resource('event',eventController::class);
        Route::resource('chef',chefController::class);
        Route::resource('gallery',galleryController::class);

    });



});
