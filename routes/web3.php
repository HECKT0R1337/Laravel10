<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
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
// ----------------------------- MiddleWare -------Any new middleware must be added in Kernel.php ----------------------
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->get('data',fn()=>'welcome to data'); // first way to write middleware
Route::get('data',fn()=>'welcome to data')->middleware('auth'); // other way to write middleware

Route::middleware('guest')->get('data',fn()=>'welcome to data'); // first way to write middleware
Route::get('data',fn()=>'welcome to data')->middleware('guest'); // other way to write middleware


Route::middleware('guest')->group(function(){
    Route::get('data',fn()=>'welcome to data'); // other way to write middleware
    Route::get('data2',fn()=>'welcome to data'); // other way to write middleware
});

Route::group(['middleware'=>['guest']],function(){
    Route::get('data',fn()=>'welcome to data'); // other way to write middleware
    Route::get('data2',fn()=>'welcome to data'); // other way to write middleware
});

Route::get('heck',fn()=>'welcome to data')->middleware('test')->name('data');


Route::get('heck1',[ExampleController::class,'index']);
Route::get('heck2',[ExampleController::class,'index2']);


// ----------------------------- Macro ------------------------------

//macro is a function that can be used in any route file or controller file in laravel 
// so myweb here is a macro that can be used in any route file
// and its called in RouteServiceProvider.php file at boot method .
Route::myweb('reuse'); // added part for  macro at RouteServiceProvider.php
