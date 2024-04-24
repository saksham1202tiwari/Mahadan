<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Builder;

trait DonationTrait
{
    public static function bootDonationTrait()
    {
        if (auth()->check()) {
            static::addGlobalScope(function (Builder $builder) {
                if (auth()->user()->user_type == 2) {
                    $builder->where('beneficiary_id', auth()->id());
                }
                if (auth()->user()->user_type == 3) {
                    $builder->where('donor_id', auth()->id());
                }
            });
        }
    }
}
