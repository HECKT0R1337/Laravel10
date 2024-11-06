<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to the "home" route for your application.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/';
    protected $namespace ='App\Http\Controllers'; //HECKT0R added this line so we dont need to mention namespace in every route file


    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {

        /*
            Route::macro('myweb',function($slug=''){
                Route::get($slug .'/web/1',fn() =>'welcome to my web1');
                Route::get($slug.'/web/2',fn() =>'welcome to my web2');
            });
        */

        Route::macro('myweb',function($slug=''){
            Route::group(['prefix' => $slug], function () {
                Route::get('/web/1',fn() =>'welcome to my web1');
                Route::get('/web/2',fn() =>'welcome to my web2');
            });
        });





        $this->configureRateLimiting();

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->namespace($this->namespace)   //HECKT0R added this line so we dont need to mention namespace in every route file
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->namespace($this->namespace)   //HECKT0R added this line so we dont need to mention namespace in every route file
                ->group(base_path('routes/web.php'));
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
