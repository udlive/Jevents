<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{

    /**
      * Bootstrap any application services.
      *
      * @return void
      */
      public function boot(UrlGenerator $url)
      {
              if (env('APP_ENV') !== 'local') {
                    $url->forceScheme('https');
              }
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
