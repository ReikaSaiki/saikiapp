<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;

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

Auth::routes();
Route::get('/', [DisplayController::class, 'index']);
Route::get('/home',[DisplayController::class,'index'])->name('index');
Route::get('event/{id}/detail',[DisplayController::class,'eventdetail'])->name('event.detail');
Route::get('user/{id}/profile',[DisplayController::class,'userprofile'])->name('user.profile');

//GETイベント登録フォーム
Route::get('event/form',[RegistrationController::class,'eventform'])->name('event.form');

Route::get('confirm',[RegistrationController::class,'eventconfirm'])->name('event.confirm');
Route::post('confirm',[RegistrationController::class,'eventconfirm'])->name('event.confirm');

Route::post('event/register',[RegistrationController::class,'eventregister'])->name('event.register');




