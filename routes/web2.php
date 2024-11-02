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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/',[ExampleController::class,'index']);
Route::get('/','App\Http\Controllers\ExampleController@index');

    //HECKT0R added 2 lines at RouteServiceProvider and this line so we dont need to mention namespace in every route file
    /*
        protected $namespace ='App\Http\Controllers'; //HECKT0R added this line so we dont need to mention namespace in every route file

        and at boot method add 
        ->namespace($this->namespace)  
    */
Route::get('/','ExampleController@index');

Route::domain('{heck}.v1.test')->group(function () {
    Route::get('/','ExampleController@index');
});


// ------------------------------------------------------- Ways to make sub domain with laravel -------------------------------------------------------

Route::domain('{heck}.v1.test')->group(function ($heck) {
    Route::get('/','ExampleController@index');
});

Route::domain('{heck}.v1.test')->group(function () { // but we must add hec.v1.test at hosts file
    Route::get('/', 'ExampleController@index');
});


// ------------------------- how to define section in laravel --------------------------------
enum Section: string
{
    case HOME = 'home';
    case ABOUT = 'about';
    case CONTACT = 'contact';
    case WELCOME = 'welcome';

}

Route::get('/{section}',function(Section $section){
    // return $section->value;
    return view($section->value);

});
