<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

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
// ----------------------------- macro -----------------------------
Route::get('/', function () {
    return view('welcome');
});


Route::resource('product',ProductController::class);
Route::delete('product/{bla}/soft-delete', [ProductController::class, 'softDelete'])->name('product.softDelete');
Route::post('product/{bla}/restore', [ProductController::class, 'restore'])->name('product.restore');


/*
    Get : index-show-edit
    Post Method(post): store
    Post Method(put): update
    Post Method(delete): destroy 

    product => index GET                route: product.index
    product/{id} => show GET            route: product.show
    product/create => create GET        route: product.create
    product/{id}/edit => edit GET       route: product.edit
    product/{id} => update PUT          route: product.update
    product/{id} => destroy DELETE      route: product.destroy

*/

// -----------------------------  Migration Commands -----------------------------

/*
| **Command**                                | **Description**                                                                                                         |
|--------------------------------------------|-------------------------------------------------------------------------------------------------------------------------|
| `php artisan migrate`                      | Runs all pending migrations in the `database/migrations` directory.                                                     |
| `php artisan migrate:rollback`             | Rolls back the last batch of migrations. Use `--step=N` to roll back the last `N` batches.                              |
| `php artisan migrate:reset`                | Rolls back **all** migrations by reverting all changes made by each migration file.                                     |
| `php artisan migrate:refresh`              | Rolls back all migrations and re-runs them, recreating the database structure from scratch.                             |
| `php artisan migrate:refresh --seed`       | Rolls back all migrations, re-runs them, and then seeds the database.                                                   |
| `php artisan migrate:fresh`                | Drops all tables and runs all migrations again, creating a completely new database setup.                               |
| `php artisan migrate:fresh --seed`         | Drops all tables, runs all migrations, and then seeds the database. Useful for testing or recreating database setups.   |
| `php artisan migrate:install`              | Creates the `migrations` table to track applied migrations. Usually runs automatically if needed.                       |
| `php artisan migrate:status`               | Shows the status of each migration file, indicating whether it has been run or is still pending.                        |
| `php artisan make:migration <name>`        | Creates a new migration file in `database/migrations`. Use `--table` or `--create` to specify the table being modified. |
|--------------------------------------------|-------------------------------------------------------------------------------------------------------------------------|
*/





