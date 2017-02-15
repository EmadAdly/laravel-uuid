<?php

namespace emadadly\laraveluuid\Facades;

use emadadly\laraveluuid\UUIDManager;
use Illuminate\Support\Facades\Facade;

class UUID extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
      return UUIDManager::class;
    }
}