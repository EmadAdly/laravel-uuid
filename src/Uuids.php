<?php
namespace Emadadly\LaravelUuid;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\ModelNotFoundException;

trait Uuids
{

    /**
     * Boot function from laravel.
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $column = config('uuid.default_uuid_column');

            if (!$model->{$column}) {
                $model->{$column} = strtoupper(Uuid::uuid4()->toString());
            }
        });

        static::saving(function ($model) {
            $column = config('uuid.default_uuid_column');

            $original_uuid = $model->getOriginal($column);
            if ($original_uuid !== $model->{$column}) {
                $model->{$column} = $original_uuid;
            }
        });
    }

    /**
     * Scope  by uuid
     * @param  string  uuid of the model.
     *
    */
    public function scopeUuid($query, $uuid, $first = true)
    {
        $match = preg_match('/^[0-9A-F]{8}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{4}-[0-9A-F]{12}$/', $uuid);

        if (!is_string($uuid) || $match !== 1)
        {
            throw (new ModelNotFoundException)->setModel(get_class($this));
        }

        $column = config('uuid.default_uuid_column');

        $results = $query->where($column, $uuid);

        return $first ? $results->firstOrFail() : $results;
    }

}
