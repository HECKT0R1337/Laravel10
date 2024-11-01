<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::any('', function () {
    return view('');
});


Route::options('', function () {
    return 'welcome to Match Route';
});


Route::match(['get', 'post', 'put', 'delete'], '/', function () {
    return 'welcome to Match Route';
});

Route::get('edit/{id?}', function ($id = null) {
    return 'hello the id = ' . $id;
    // })->where(['id' =>'[0-9]+']);
    // })->whereNumber('id');
})->whereAlpha('id');

Route::get('edit/{data}', function ($data = null) {
    return 'hello the id = ' . $data;
})->whereAlphaNumeric('data');


Route::get('edit/{name}', function ($name) {
    return 'hello the id = ' . $name;
})->whereIn('name', [
    'Book',
    'Animal',
    'Stars'
]);

/*
    this part can be added at RouteServiceProvider inside boot() method so we can remove the pattern from wep.php

    Route::pattern('id','[0-9]+');
    Route::pattern('name','[a-zA-Z]+');
*/

// Route::get('product/create',fn() => 'create product');
// Route::get('product/edit/{id}',fn($id) => 'Edit product' . $id);

// ------------------------------------------------------- Ways to make Route groups -------------------------------------------------------
Route::prefix('product')
    ->group(function () {
        Route::get('create', fn() => 'create product');
        Route::get('edit/{id}', fn($id) => 'Edit product' . $id);
    });

Route::group(['prefix' => 'product'], function () {
    Route::get('create', fn() => 'create product');
    Route::get('edit/{id}', fn($id) => 'Edit product' . $id);
});

Route::get('/', function () {
    return 'Main page';
});


Route::get('/', function () {  // will redirect to welcome blade
    return view('welcome');
});
Route::view('/','welcome'); // will redirect to welcome blade

Route::get('/',fn() => 'hello');

Route::fallback(function(){  // fallback will redirect to main page if link not found
    return redirect('/');
});

// ------------------------------------------------------- Ways to make Redirect to named route -------------------------------------------------------

Route::get('test/re', function () {  
    return 'hello';
})->name('re');


Route::get('/', function () {  
    return redirect()->route('re'); //method #1
    // return to_route('re'); //method #2
});