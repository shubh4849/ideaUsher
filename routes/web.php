<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmailJobController;

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
Route::group(['middleware'=>'checkIfUser'], function () {
Route::match(['get','post'],'emailCheck',[UserController::class,'emailCheck']);
Route::match(['get','post'],'/',[UserController::class,'register']);
Route::match(['get','post'],'/login',[UserController::class,'login'])->name('login');
});
Route::group(['middleware'=>'checkIfNotUser'], function () {
Route::match(['get','post'],'/getUsers',[UserController::class,'index'])->name('users.index');
Route::get('/export-data', [UserController::class,'export'])->name('export-data');
Route::match(['get','post'],'/logout',[UserController::class,'logout']);
Route::get('email-jobs', [EmailJobController::class, 'index'])->name('live-status');
Route::get('/check-email-status', [EmailJobController::class, 'checkEmailStatus'])->name('check-email-status');
});