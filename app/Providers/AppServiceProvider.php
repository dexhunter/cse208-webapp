<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Validator::extend('email_domain', function($attribute, $value, $parameters, $validator){
            $allowEmailDomains = ['student.xjtlu.edu.cn', 'xjtlu.edu.cn'];
            return in_array(explode('@',$parameters[0])[1], $allowEmailDomains);
        });
        // Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
