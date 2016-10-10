<?php
namespace AbdullahObaid\Mobilyws-Laraval;

use Illuminate\Support\ServiceProvider;
use AbdullahObaid\Mobilyws-Laraval\Mobily;
use Config;
class MobilywsProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
     if(!file_exists(base_path('config').'/mobilysms.php'))
     {
      $this->publishes([
        __DIR__.'/config' => base_path('config'),
      ]);
     }   

     if(!file_exists(base_path('resources/lang/'.Config::get('app.locale').'/mobily.php')))
     {  
      $this->publishes([
        __DIR__.'/lang' => base_path('resources/lang/'.Config::get('app.locale')),
      ]);
     }

       
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
       
            $this->app['Mobily'] = $this->app->share(function($app)
            {
                return new Mobily();
            });

    }
}


 