<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LocalizationController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
})->name('guest');



Route::GET('sign-up',[AuthController::class,'signUpView'])->name('sign-up');

Route::POST('sign-up',[AuthController::class,'signUp'])->name('sign-up.post');
Route::POST('sign',[AuthController::class,'sign'])->name('sign-in.post');
Route::GET('sign',[AuthController::class,'signView'])->name('sign-in');
Route::get('home',[HomeController::class,'index'])->name('home');
Route::get('ebook/{id}',[HomeController::class,'ebbokDetail'])->name('ebook');
Route::get('logout',[AuthController::class,'logout'])->name('logout');
Route::get('logout-success',[AuthController::class,'logoutview'])->name('logout.view');

Route::get('cart',[HomeController::class,'cartView'])->name('cart.index');
Route::get('profile',[HomeController::class,'profile'])->name('profile');
Route::get('role-edit/{id}',[HomeController::class,'roleEdit'])->name('role.edit')->middleware('isAdmin');
Route::put('role-update',[HomeController::class,'roleUpdate'])->name('role.update');
Route::get('maintaince',[HomeController::class,'maintaince'])->name('maintaince')->middleware('isAdmin');
Route::PUT('profile',[HomeController::class,'profileUpdate'])->name('profile.update');
Route::post('cart',[HomeController::class,'cart'])->name('cart');
Route::DELETE('cart/{id}',[HomeController::class,'cartDestroy'])->name('cart.destroy');
Route::DELETE('user/{id}',[HomeController::class,'userDestroy'])->name('user.destroy');

Route::post('order',[HomeController::class,'order'])->name('order');

// Language
Route::get('lang/{language}', [LocalizationController::class,'switch'])->name('localization.switch');
 
