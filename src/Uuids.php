<?php
namespace emadadly\larauuid;

use emadadly\larauuid\UUIDManager;

trait Uuids
{
    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = UUIDManager::generate();
        });
    }
}