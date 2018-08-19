<?php

namespace App\Providers;

use App\Services\Banner\CostCalculator;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
      \View::composer('*', function ($view) {
        if(auth()->check()){
          $subdomain_userid = auth()->user()->id;
        } else{
          $subdomain_userid = '';
        }




        $view->with([
          'subdomain_userid' => $subdomain_userid
        ]);
      });

    }

    public function register(): void
    {
        $this->app->singleton(CostCalculator::class, function (Application $app) {
            $config = $app->make('config')->get('banner');
            return new CostCalculator($config['price']);
        });

        Passport::ignoreMigrations();
    }
}
