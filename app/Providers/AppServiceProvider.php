<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;   //added by HECKT0R to allow creating custom directives
use Illuminate\Support\Facades\View;    //added by HECKT0R to allow creating custom global variable
use Illuminate\View\View as MyView;     //added by HECKT0R to allow creating custom global variable

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {

        // ---------------------------- CUSTOM DIRECTIVES ---------------------------- added by HECKT0R
        Blade::directive('HECKT0R', function (string $expression) {
            return "<?=  date('y-m-d',$expression); ?>";
        });

        Blade::if('check', function (string $val) {
            //    return config('app.timezone');
            return "100" == $val;
        });

        Blade::if('checkConfig', function (string $val) {
            return config('app.timezone') == $val;
        });

        // How to Use : 

        /*
            @HECKT0R(time())

            <br>


            @check('101')
                wrong
            @elsecheck('102')
                correct
            @else
                no value
            @endcheck

            <br>
            @unlesscheck('102')
                wrongss
            @endcheck


            <br>

            @checkConfig('bla')
                wrong time zone
            @elsecheckConfig('UTC')
                correc time zone
            @else
                unknonw time zone
            @endcheckConfig
        */


        // ----------------------------  Create custom global variables ---------------------------- added by HECKT0R

        // add global variable to specific views using composer.
        View::composer(['index','product.index','product.show'],function(MyView $view){
            return $view->with(['myspecialvar' => 'Message from Composer Var ']);
        });

        // using * will make the global variable available to all views.
        View::composer('*',function(MyView $view){
            return $view->with(['myglobalvar' => 'Message from Composer Var ']);
        });

        // How to use : 
        /*
            {{$myspecialvar}}
            {{$myglobalvar}}
        */

    }
}
