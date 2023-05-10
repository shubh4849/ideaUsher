<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

Route::match(['get','post'],'emailCheck',[UserController::class,'emailCheck']);
Route::match(['get','post'],'/',[UserController::class,'register']);
Route::match(['get','post'],'log-in',[UserController::class,'login'])->name('login');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/qrcode', [UserController::class,'generateQRCode'])->middleware('auth');
Route::get('/profile', [UserController::class,'profile'])->middleware('auth');
Route::match(['get','post'],'/getUsers',[UserController::class,'index'])->name('users.index');
Route::match(['get','post'],'/userEdit/{id}',[UserController::class,'edit']);
Route::match(['get','post'],'/updateUser',[UserController::class,'updateUser']);
define('userImage','storage/app/public');

