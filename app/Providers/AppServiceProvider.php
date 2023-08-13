<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Firebase\FirebaseAuthenticationService;

class AppServiceProvider extends ServiceProvider
{

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
    public function boot()
    {
        //require app_path('Attendize/constants.php');
        if(env('FORCE_HTTPS') == true)
        {
            $this->app['request']->server->set('HTTPS', true);
        }

        $this->app->bind('App\Services\FirebaseAuthenticationService', function () {
            return new FirebaseAuthenticationService();
        });

    }
              
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // Only load LaravelIdeHelper if we're in development mode
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }
    }
}
