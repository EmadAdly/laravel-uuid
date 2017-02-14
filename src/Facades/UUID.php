<?php

namespace emadadly\larauuid\Facades;

use emadadly\larauuid\UUID;
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
      return UUID::class;
    }
}