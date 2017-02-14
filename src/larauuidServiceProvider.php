<?php

namespace emadadly\larauuid;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class larauuidServiceProvider extends ServiceProvider
{
     /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
  

        
        // use this if your package needs a config file
        // $this->publishes([
        //         __DIR__.'/config/config.php' => config_path('larauuid.php'),
        // ]);
        
        // use the vendor configuration file as fallback
        // $this->mergeConfigFrom(
        //     __DIR__.'/config/config.php', 'larauuid'
        // );
    }



    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(UUIDManager::class, function () {
            return new UUIDManager();
        });
 /*       $this->app->bind('larauuid',function($app){
            return new UUID;
        });*/

      /*  $this->app->singleton(UuidService::class, function($app){
            return new UuidService;
        });*/
        // use this if your package has a config file
        // config([
        //         'config/larauuid.php',
        // ]);
     /*           $this->app['guid'] = $this->app->share(function($app) {
            return new GUID;
        });*/
     /*   $this->app->booting(function() {
            $loader = \Illuminate\Foundation\AliasLoader::getInstance();
            $loader->alias('UUID', 'emadadly\larauuid\Facades\UUID');
        });*/
    }




}
