<?php


namespace Modules\Shared\Traits;


use Illuminate\Support\Str;

trait UsesUUID
{
    protected static function bootUsesUUID()
    {
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::orderedUuid();
        });
    }
}
