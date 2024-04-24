<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait Multitenancy
{
    public static function bootMultitenancy()
    {
        if (auth()->check() && auth()->user()->user_type == 2 && isBackend()) {
            static::creating(function ($model) {
                $model->user_id = auth()->id();
            });

            static::addGlobalScope('user_id', function (Builder $builder) {
                $builder->where('user_id', auth()->id());
            });
        }
    }
}
