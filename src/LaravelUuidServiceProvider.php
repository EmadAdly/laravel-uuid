<?php

namespace Emadadly\LaravelUuid;

use Illuminate\Support\ServiceProvider;

class LaravelUuidServiceProvider extends ServiceProvider
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
  //
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
    }
}
