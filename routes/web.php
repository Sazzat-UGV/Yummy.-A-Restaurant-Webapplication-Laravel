<?php

use App\Http\Controllers\backend\auth\loginController;
use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\backend\dashboardController;
use App\Http\Controllers\backend\productController;
use App\Http\Controllers\frontend\homeController;
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
});


/*admin auth route*/
Route::prefix('admin/')->group(function(){
    Route::get('login',[loginController::class,'loginPage'])->name('admin.loginPage');
    Route::post('login',[loginController::class,'login'])->name('admin.login');
    Route::get('logout',[loginController::class,'logout'])->name('admin.logout');

    Route::middleware(['auth','IsSystemAdmin'])->group(function(){
        Route::get('dashboard',[dashboardController::class,'dashboard'])->name('admin.dashboard');

        /*Resource Controller*/
        Route::resource('category',categoryController::class);
        Route::resource('product',productController::class);

    });



});
