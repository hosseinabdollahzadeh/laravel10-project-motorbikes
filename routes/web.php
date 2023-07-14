<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\MotorController;
use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Auth;
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

Route::prefix('/admin')->name('admin.')->middleware(['auth'])->group(function (){
    Route::resource('motors', MotorController::class);

    Route::get('/', [AdminController::class, 'index'])->name('dashboard');
});

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');
